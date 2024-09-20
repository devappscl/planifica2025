<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class UserController extends ResourceController
{
    use ResponseTrait;

    public function register()
    {
        $rules = [
            'email' => 'required|valid_email|is_unique[db_usuarios.email]',
            'password' => 'required|min_length[8]',
            'nombres' => 'required',
            'papellido' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $userModel = new UserModel();
        $token = bin2hex(random_bytes(16)); // Generar el token de verificación
        $data = [
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'nombres' => $this->request->getVar('nombres'),
            'papellido' => $this->request->getVar('papellido'),
            'sapellido' => $this->request->getVar('sapellido'),
            'email_verification_token' => $token,
            'email_verified' => 0 // Usuario no verificado
        ];

        $userModel->insert($data);

        // Enviar email de verificación
        $this->sendVerificationEmail($data['email'], $token);

        return $this->respondCreated(['message' => 'User registered successfully. Please verify your email.']);
    }

    private function sendVerificationEmail($email, $token)
    {
        $verificationLink = base_url("api/verify-email/{$token}");
        $message = "Click the link to verify your email: {$verificationLink}";
        
        // Aquí envías el email (puedes usar PHPMailer o el sistema de correo de CodeIgniter)
    }

    public function verifyEmail($token)
    {
        $userModel = new UserModel();
        $user = $userModel->where('email_verification_token', $token)->first();

        if (!$user) {
            return $this->failNotFound('Invalid verification token');
        }

        $userModel->update($user['id_usuario'], [
            'email_verified' => 1, // Usuario verificado
            'email_verification_token' => null // Limpiar el token
        ]);

        return $this->respond(['message' => 'Email verified successfully']);
    }


    public function login()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        $user = $userModel->where('email', $email)->first();
    
        if (!$user || !password_verify($password, $user['password'])) {
            return $this->failUnauthorized('Credenciales incorrectas');
        }
    
        if ($user['email_verified'] == 0) {
            return $this->failUnauthorized('Por favor verifica tu correo antes de iniciar sesión.');
        }
    
        // Generar el token JWT
        $secretKey = getenv('JWT_SECRET');
        $payload = [
            'iat' => time(),
            'exp' => time() + 3600,  // El token expira en 1 hora
            'data' => [
                'id_usuario' => $user['id_usuario'],
                'email' => $user['email'],
                'nivel' => $user['nivel']
            ]
        ];
    
        $token = JWT::encode($payload, $secretKey, 'HS256');
    
        return $this->respond([
            'message' => 'Login successful',
            'token' => $token,
            'nivel' => $user['nivel']  // Devolver el nivel del usuario
        ]);
    }




    public function requestPasswordReset()
    {
        $rules = ['email' => 'required|valid_email'];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return $this->failNotFound('Email not found');
        }

        $resetToken = bin2hex(random_bytes(16));
        $userModel->update($user['id_usuario'], [
            'password_reset_token' => $resetToken,
            'password_reset_token_expiry' => date('Y-m-d H:i:s', strtotime('+1 hour'))
        ]);

        // Aquí podrías implementar el envío del email
        // sendPasswordResetEmail($email, $resetToken);

        return $this->respond(['message' => 'Password reset link sent to your email']);
    }

    public function resetPassword($token)
    {
        $userModel = new UserModel();
        $user = $userModel->where('password_reset_token', $token)->first();

        if (!$user || strtotime($user['password_reset_token_expiry']) < time()) {
            return $this->failUnauthorized('Invalid or expired token');
        }

        $rules = ['new_password' => 'required|min_length[8]'];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        $newPassword = password_hash($this->request->getVar('new_password'), PASSWORD_BCRYPT);
        $userModel->update($user['id_usuario'], [
            'password' => $newPassword,
            'password_reset_token' => null,
            'password_reset_token_expiry' => null
        ]);

        return $this->respond(['message' => 'Password reset successfully']);
    }



}

<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Firebase\JWT\JWT;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login/login');
    }

    public function authenticate()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        // Verificar si el usuario existe
        $user = $userModel->where('email', $email)->first();
    
        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Credenciales incorrectas');
        }
    
        // Generar el token JWT
        $secretKey = getenv('JWT_SECRET');
        $payload = [
            'iat' => time(),
            'exp' => time() + 3600,  // El token expira en 1 hora
            'data' => [
                'id_usuario' => $user['id_usuario'],
                'email' => $user['email'],
                'nivel' => $user['nivel']  // Incluir el nivel en el token
            ]
        ];
    
        $token = JWT::encode($payload, $secretKey, 'HS256');
    
        // Guardar el token en la sesión para ambas rutas (user y admin)
        session()->set('jwt_token', $token);
    
        // Verificar nivel de usuario
        if ($user['nivel'] == 7) {
            // Redirigir al home del administrador si el nivel es 7
            return redirect()->to('/admin/home')->with('token', $token);
        } else {
            // Redirigir al home regular
            return redirect()->to('/user/home')->with('token', $token);
        }
    }
    
    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/web/login');
    }
}

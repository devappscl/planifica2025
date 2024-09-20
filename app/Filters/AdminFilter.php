<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Obtener el token JWT del encabezado Authorization o de la sesión
        $authHeader = $request->getHeaderLine('Authorization');
        $token = session()->get('jwt_token');

        if (!$token && $authHeader) {
            // Extraer el token de "Bearer {token}"
            $token = explode(' ', $authHeader)[1];
        }

        if (!$token) {
            return redirect()->to('/web/login')->with('error', 'Authorization token missing');
        }

        // Verificar el token JWT
        $secretKey = getenv('JWT_SECRET');
        try {
            $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));
        } catch (\Exception $e) {
            return redirect()->to('/web/login')->with('error', 'Invalid or expired token');
        }

        // Verificar si el nivel del usuario es 7 (administrador)
        if ($decoded->data->nivel != 7) {
            return redirect()->to('/web/login')->with('error', 'Access restricted to administrators only');
        }

        // Log para debugging
        log_message('debug', 'Token validado, nivel: ' . $decoded->data->nivel);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se requiere lógica post-request
    }
}

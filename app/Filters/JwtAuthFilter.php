<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtAuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $token = session()->get('token');

        if (!$token) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        try {
            $key = "your_secret_key"; // Sama dengan kunci di AuthController
            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            // Cek role sesuai argumen filter
            if ($arguments && !in_array($decoded->role, $arguments)) {
                return redirect()->to('/items')->with('error', 'Akses ditolak');
            }
        } catch (\Exception $e) {
            session()->remove('token');
            session()->remove('role');
            return redirect()->to('/login')->with('error', 'Token tidak valid');
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}

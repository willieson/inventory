<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeeModel;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    protected $employeeModel;
    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }

    // Tampilkan halaman login
    public function login()
    {
        return view('auth/login');
    }

    // Proses login dan buat JWT
    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $employee = $this->employeeModel->where('username', $username)->first();

        if (!$employee) {
            return redirect()->back()->with('error', 'Username tidak ditemukan');
        }

        if (!password_verify($password, $employee['password'])) {
            return redirect()->back()->with('error', 'Password salah');
        }

        $key = env('jwt.secret_key'); // JWT key
        $payload = [
            'iss' => 'inventory-app',
            'sub' => $employee['id'],
            'role' => $employee['role'],
            'iat' => time(),
            'exp' => time() + 3600
        ];

        try {
            $jwt = JWT::encode($payload, $key, 'HS256');
            session()->set('token', $jwt);
            session()->set('role', $employee['role']);
            session()->set('username', $employee['username']); // Simpan username di session
            return redirect()->to('/')->with('success', 'Login berhasil'); // Arahkan ke dashboard
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal membuat token: ' . $e->getMessage());
        }
    }

    // Logout
    public function logout()
    {
        session()->remove('token');
        session()->remove('role');
        return redirect()->to('/login')->with('success', 'Logout berhasil');
    }
}

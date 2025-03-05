<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeeModel;
use CodeIgniter\HTTP\ResponseInterface;

class EmployeeController extends BaseController
{
    protected $employeeModel;
    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }

    public function index()
    {
        $data['employees'] = $this->employeeModel->findAll();
        return view('employees/index', $data);
    }

    public function create()
    {
        return view('employees/create');
    }

    public function store()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role')
        ];

        if ($this->employeeModel->insert($data)) {
            return redirect()->to('/employees')->with('success', 'Karyawan berhasil ditambahkan');
        }
        return redirect()->back()->with('error', 'Gagal menambah karyawan');
    }

    public function edit($id)
    {
        $data['employee'] = $this->employeeModel->find($id);
        return view('employees/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'role' => $this->request->getPost('role')
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        if ($this->employeeModel->update($id, $data)) {
            return redirect()->to('/employees')->with('success', 'Karyawan berhasil diperbarui');
        }
        return redirect()->back()->with('error', 'Gagal memperbarui karyawan');
    }

    public function delete($id)
    {
        if ($this->employeeModel->delete($id)) {
            return redirect()->to('/employees')->with('success', 'Karyawan berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Gagal menghapus karyawan');
    }
}

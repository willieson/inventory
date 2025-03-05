<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use CodeIgniter\HTTP\ResponseInterface;

class ItemController extends BaseController
{

    protected $itemModel;
    public function __construct()
    {
        $this->itemModel = new ItemModel();
    }



    public function index()
    {
        $data['items'] = $this->itemModel->findAll();
        $data['lowStockItems'] = $this->itemModel->where('quantity <', 5)->findAll(); // Ambil barang dengan stok < 5
        return view('items/index', $data);
    }

    // Form tambah barang
    public function create()
    {
        return view('items/create');
    }

    // Simpan barang baru
    public function store()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'quantity' => $this->request->getPost('quantity'),
            'description' => $this->request->getPost('description')
        ];

        if ($this->itemModel->insert($data)) {
            return redirect()->to('/items')->with('success', 'Barang berhasil ditambahkan');
        }
        return redirect()->back()->with('error', 'Gagal menambah barang');
    }

    // Form edit barang
    public function edit($id)
    {
        $data['item'] = $this->itemModel->find($id);
        return view('items/edit', $data);
    }

    // Update barang
    public function update($id)
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'quantity' => $this->request->getPost('quantity'),
            'description' => $this->request->getPost('description')
        ];

        if ($this->itemModel->update($id, $data)) {
            return redirect()->to('/items')->with('success', 'Barang berhasil diperbarui');
        }
        return redirect()->back()->with('error', 'Gagal memperbarui barang');
    }

    // Hapus barang
    public function delete($id)
    {
        if ($this->itemModel->delete($id)) {
            return redirect()->to('/items')->with('success', 'Barang berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Gagal menghapus barang');
    }
}

<?php

namespace App\Controllers;

use App\Models\Inventory_model;
use App\Models\Login_model;

class Inventory extends BaseController
{
    protected $inventoryModel;
    protected $loginModel;
    protected $session;
    protected $request;
    public function __construct()
    {

        $this->inventoryModel = new Inventory_model();
        $this->loginModel = new Login_model();
        $this->session = session();
        $this->request = \Config\Services::Request();
    }
    // public function index()
    // {
    //     $tiket = $this->stasiunModel->findAll();
    //     $data = [
    //         'title' => 'Dashboard Helpdesk',


    //         'tiket' => $tiket

    //     ];
    //     return view('pages/dashboard', $data);
    // }
    public function datainventory()
    {
        $inventory = $this->inventoryModel->findAll();
        $data = [
            'title' => 'Data Inventory',
            // 'username' => $this->session->get('user')->username,
            'inventory' => $inventory
        ];
        return view('inventory/datainventory', $data);
    }
    public function tambah()
    {
        session();
        $inventory = $this->inventoryModel->findAll();
        $data = [
            'title' => 'Tampilan Tambah Data Inventory',
            'validation' => \Config\Services::validation(),
            'inventory' => $inventory
        ];

        // $db = \Config\Database::connect();
        // $tb_ticket = $db->query("SELECT * FROM tb_ticket");
        // dd($tb_ticket);



        return view('inventory/tambahinventory', $data);
    }
    public function save()
    {
        // Validation masih error perlu diperbaiki 

        if (!$this->validate([
            'noinventaris' => 'required'
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/inventory/tambahinventory')->withInput()->with('validation', $validation);
        }

        $this->inventoryModel->save([

            'noinventaris' => $this->request->getVar('noinventaris'),
            'jenisperangkat' => $this->request->getVar('jenisperangkat'),
            'divisi' => $this->request->getVar('divisi')




        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');
        // dd($this->request->getVar());
        return redirect()->to('/inventory/datainventory');
    }

    public function delete($id)
    {

        // $news = new Tiket_model();
        // $news->delete($id);
        // session()->setFlashdata('pesan', 'Data berhasil Dihapus.');
        // return redirect()->to('/pages');


        $this->inventoryModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');
        return redirect()->to('/inventory/datainventory');
    }
    public function edit($id)
    {


        $data = [
            'title' => 'Form Ubah Data Inventory',
            'validation' => \Config\Services::validation(),
            'inventory' => $this->inventoryModel->getInventory($id)

        ];





        return view('inventory/editinventory', $data);
    }

    public function update($id)
    {
        // $id = url_title($this->request->getVar('judul'), '-', true);
        $this->inventoryModel->save([
            'id' => $id,
            'noinventaris' => $this->request->getVar('noinventaris'),
            'jenisperangkat' => $this->request->getVar('jenisperangkat'),
            'divisi' => $this->request->getVar('divisi')



        ]);

        session()->setFlashdata('pesan', 'Data berhasil Diubah.');
        // dd($this->request->getVar());
        return redirect()->to('inventory/datainventory');
    }
}

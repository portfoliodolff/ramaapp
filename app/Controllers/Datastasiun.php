<?php

namespace App\Controllers;

use App\Models\Datastasiun_model;
use App\Models\Login_model;

class Datastasiun extends BaseController
{
    protected $stasiunModel;
    protected $loginModel;
    protected $session;
    protected $request;
    public function __construct()
    {

        $this->stasiunModel = new Datastasiun_model();
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
    public function datastasiun()
    {
        $stasiun = $this->stasiunModel->findAll();
        $data = [
            'title' => 'Data Stasiun',
            // 'username' => $this->session->get('user')->username,
            'stasiun' => $stasiun
        ];
        return view('datastasiun/datastasiun', $data);
    }
    public function tambah()
    {
        session();
        $stasiun = $this->stasiunModel->findAll();
        $data = [
            'title' => 'Tampilan Tambah Data Stasiun',
            'validation' => \Config\Services::validation(),
            'stasiun' => $stasiun
        ];

        // $db = \Config\Database::connect();
        // $tb_ticket = $db->query("SELECT * FROM tb_ticket");
        // dd($tb_ticket);



        return view('datastasiun/tambahstasiun', $data);
    }
    public function save()
    {
        // Validation masih error perlu diperbaiki 

        if (!$this->validate([
            'kodestasiun' => 'required'
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/pages/tambah')->withInput()->with('validation', $validation);
        }

        $this->stasiunModel->save([

            'kodestasiun' => $this->request->getVar('kodestasiun'),
            'namastasiun' => $this->request->getVar('namastasiun'),
            'alamat' => $this->request->getVar('alamat')




        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');
        // dd($this->request->getVar());
        return redirect()->to('/datastasiun/datastasiun');
    }

    public function delete($id)
    {

        // $news = new Tiket_model();
        // $news->delete($id);
        // session()->setFlashdata('pesan', 'Data berhasil Dihapus.');
        // return redirect()->to('/pages');


        $this->stasiunModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');
        return redirect()->to('/datastasiun/datastasiun');
    }
    public function edit($id)
    {


        $data = [
            'title' => 'Form Ubah Data Stasiun',
            'validation' => \Config\Services::validation(),
            'stasiun' => $this->stasiunModel->getStasiun($id)

        ];





        return view('datastasiun/editstasiun', $data);
    }

    public function update($id)
    {
        // $id = url_title($this->request->getVar('judul'), '-', true);
        $this->stasiunModel->save([
            'id' => $id,
            'kodestasiun' => $this->request->getVar('kodestasiun'),
            'namastasiun' => $this->request->getVar('namastasiun'),
            'alamat' => $this->request->getVar('alamat')



        ]);

        session()->setFlashdata('pesan', 'Data berhasil Diubah.');
        // dd($this->request->getVar());
        return redirect()->to('/datastasiun/datastasiun');
    }
}

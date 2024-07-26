<?php

namespace App\Controllers;

use App\Models\Datateknisi_model;
use App\Models\Login_model;

class Datateknisi extends BaseController
{
    protected $teknisiModel;
    protected $loginModel;
    protected $session;
    protected $request;
    public function __construct()
    {

        $this->teknisiModel = new Datateknisi_model();
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
    public function datateknisi()
    {
        $teknisi = $this->teknisiModel->findAll();
        $data = [
            'title' => 'Data Teknisi',
            // 'username' => $this->session->get('user')->username,
            'teknisi' => $teknisi
        ];
        return view('datateknisi/datateknisi', $data);
    }
    public function datateknisiprofile()
    {
        $teknisi = $this->teknisiModel->findAll();
        $data = [
            'title' => 'Data Teknisi',
            // 'username' => $this->session->get('user')->username,
            'teknisi' => $teknisi
        ];
        return view('datateknisi/datateknisiprofil', $data);
    }
    public function cekprofile($id)
    {
        session();
        $data = [
            'title' => 'Profil Teknisi',
            // 'tiket' => $tiket
            'teknisi' => $this->teknisiModel->getTeknisi($id),



        ];
        return view('datateknisi/cekprofil', $data);
        // echo $id;
    }

    public function tambah()
    {
        session();
        $teknisi = $this->teknisiModel->findAll();
        $data = [
            'title' => 'Tampilan Tambah Data Teknisi',
            'validation' => \Config\Services::validation(),
            'teknisi' => $teknisi
        ];

        // $db = \Config\Database::connect();
        // $tb_ticket = $db->query("SELECT * FROM tb_ticket");
        // dd($tb_ticket);



        return view('datateknisi/tambahteknisi', $data);
    }
    public function save()
    {
        // Validation masih error perlu diperbaiki 

        if (!$this->validate([
            'nopegawai' => 'required'
        ])) {
            $validation = \Config\Services::validation();

            return redirect()->to('/datateknisi/tambah')->withInput()->with('validation', $validation);
        }

        $this->teknisiModel->save([

            'nopegawai' => $this->request->getVar('nopegawai'),
            'namateknisi' => $this->request->getVar('namateknisi'),
            'notlp' => $this->request->getVar('notlp')




        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');
        // dd($this->request->getVar());
        return redirect()->to('/datateknisi/datateknisi');
    }

    public function delete($id)
    {

        // $news = new Tiket_model();
        // $news->delete($id);
        // session()->setFlashdata('pesan', 'Data berhasil Dihapus.');
        // return redirect()->to('/pages');


        $this->teknisiModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');
        return redirect()->to('/datateknisi/datateknisi');
    }
    public function edit($id)
    {


        $data = [
            'title' => 'Form Ubah Data Teknisi',
            'validation' => \Config\Services::validation(),
            'teknisi' => $this->teknisiModel->getTeknisi($id)

        ];





        return view('datateknisi/editteknisi', $data);
    }

    public function update($id)
    {
        // $id = url_title($this->request->getVar('judul'), '-', true);
        $this->teknisiModel->save([
            'id' => $id,
            'nopegawai' => $this->request->getVar('nopegawai'),
            'namateknisi' => $this->request->getVar('namateknisi'),
            'notlp' => $this->request->getVar('notlp')


        ]);

        session()->setFlashdata('pesan', 'Data berhasil Diubah.');
        // dd($this->request->getVar());
        return redirect()->to('/datateknisi/datateknisi');
    }
}

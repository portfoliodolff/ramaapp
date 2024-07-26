<?php

namespace App\Controllers;

use App\Models\Tiket_model;
use App\Models\Login_model;

class Report extends BaseController
{
    protected $tiketModel;
    protected $loginModel;
    protected $session;
    protected $request;
    public function __construct()
    {
        helper(['form', 'url']);
        $this->tiketModel = new Tiket_model();
        $this->loginModel = new Login_model();
        $this->session = session();
        $this->request = \Config\Services::Request();
    }

    public function report()
    {
        session();
        $tiket = $this->tiketModel->findAll();
        $data = [
            'title' => 'Data Report',
            // 'username' => $this->session->get('user')->username,
            'tiket' => $tiket
        ];
        return view('report/tickettohandle', $data);
    }
    public function detail($id)
    {
        session();
        $tiket = $this->tiketModel->findAll();
        // $tiket = $this->tiketModel->where(['id' => $id])->first();
        // dd($tiket);
        $user = $this->loginModel->findAll();




        $data = [
            'title' => 'Detail Data Helpdesk',
            // 'tiket' => $tiket
            'tiket' => $this->tiketModel->getTiket($id),



        ];
        return view('report/detail', $data);
        // echo $id;
    }
    public function tambah()
    {
        session();
        $tiket = $this->tiketModel->findAll();
        $data = [
            'title' => 'Tampilan Tambah Tiket',
            'validation' => \Config\Services::validation(),
            'tiket' => $tiket
        ];

        // $db = \Config\Database::connect();
        // $tb_ticket = $db->query("SELECT * FROM tb_ticket");
        // dd($tb_ticket);



        return view('report/tambah', $data);
    }
    public function save()
    {
        // Validation masih error perlu diperbaiki 

        if (!$this->validate([
            'subject' => ['rules' => 'required'],
            'fotouser' => [
                'rules' => 'uploaded[fotouser]|max_size[fotouser,20000]|is_image[fotouser]|mime_in[fotouser,image/jpg,image/jpeg,image/png]',
            ]
        ])) {
            // $validation = \Config\Services::validation();

            // return redirect()->to('/user/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/report/tambah')->withInput();
        }

        $fileFotouser = $this->request->getFile('fotouser');
        $namaFotouser = $fileFotouser->getRandomName();
        // dd($fileFotouser);
        $fileFotouser->move('img', $namaFotouser);
        $this->tiketModel->save([

            'subject' => $this->request->getVar('subject'),
            'requestname' => $this->request->getVar('requestname'),
            'email' => $this->request->getVar('email'),
            'priority' => $this->request->getVar('priority'),
            'status' => $this->request->getVar('status'),
            'keterangan' => $this->request->getVar('keterangan'),
            'fotouser' => $namaFotouser



        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');
        // dd($this->request->getVar());
        return redirect()->to('/report/report');
    }

    public function delete($id)
    {

        // $news = new Tiket_model();
        // $news->delete($id);
        // session()->setFlashdata('pesan', 'Data berhasil Dihapus.');
        // return redirect()->to('/pages');
        $user = $this->tiketModel->find($id);

        if ($user['fotouser'] != 'user1.png') {

            //user1 adalah default gambar
            unlink('img/' . $user['fotouser']);
        };


        $this->tiketModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');
        return redirect()->to('/report/report');
    }
    public function edit($id)
    {


        $data = [
            'title' => 'Form Ubah Data Tiket',
            'validation' => \Config\Services::validation(),
            'tiket' => $this->tiketModel->getTiket($id)

        ];





        return view('report/edit', $data);
    }

    public function update($id)
    {

        if (!$this->validate([
            'subject' => ['rules' => 'required'],
            'fotouser' => [
                'rules' => 'uploaded[fotouser]|max_size[fotouser,20000]|is_image[fotouser]|mime_in[fotouser,image/jpg,image/jpeg,image/png,image/svg]',
            ]
        ])) {
            // $validation = \Config\Services::validation();

            // return redirect()->to('/user/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/report/edit/' . $this->request->getVar('id'))->withInput();
        }

        $fileFotouser = $this->request->getFile('fotouser');
        if ($fileFotouser->getError() == 4) {
            $namaFotouser = $this->request->getVar('fotoUserlama');
        } else {
            $namaFotouser = $fileFotouser->getRandomName();
            $fileFotouser->move('img', $namaFotouser);

            unlink('img/' . $this->request->getVar('fotoUserlama'));
        }


        // dd($fileFotouser);



        // $id = url_title($this->request->getVar('judul'), '-', true);
        $this->tiketModel->save([
            'id' => $id,
            'subject' => $this->request->getVar('subject'),
            'requestname' => $this->request->getVar('requestname'),
            'email' => $this->request->getVar('email'),
            'priority' => $this->request->getVar('priority'),
            'status' => $this->request->getVar('status'),
            'keterangan' => $this->request->getVar('keterangan'),
            'fotouser' => $namaFotouser



        ]);

        session()->setFlashdata('pesan', 'Data berhasil Diubah.');
        // dd($this->request->getVar());
        return redirect()->to('/report/report');
    }
}

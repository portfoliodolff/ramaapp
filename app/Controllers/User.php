<?php

namespace App\Controllers;

use App\Models\Datastasiun_model;
use App\Models\Login_model;
use App\Models\User_model;
use CodeIgniter\HTTP\Request;

class User extends BaseController
{
    protected $stasiunModel;
    protected $loginModel;
    protected $userModel;
    protected $session;
    protected $request;
    public function __construct()
    {

        $this->stasiunModel = new Datastasiun_model();
        $this->loginModel = new Login_model();
        $this->userModel = new User_model();
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
    public function datauser()
    {
        $user = $this->userModel->findAll();
        $data = [
            'title' => 'Data User',
            // 'username' => $this->session->get('user')->username,
            'user' => $user
        ];
        return view('user/datauser', $data);
    }
    public function tambah()
    {
        session();
        $user = $this->userModel->findAll();
        $data = [
            'title' => 'Tampilan Tambah Data User',
            'validation' => \Config\Services::validation(),
            'user' => $user
        ];

        // $db = \Config\Database::connect();
        // $tb_ticket = $db->query("SELECT * FROM tb_ticket");
        // dd($tb_ticket);



        return view('user/tambah', $data);
    }
    public function save()
    {
        // Validation masih error perlu diperbaiki 

        if (!$this->validate([
            'username' => ['rules' => 'required'],
            'fotouser' => [
                'rules' => 'uploaded[fotouser]|max_size[fotouser,20000]|is_image[fotouser]|mime_in[fotouser,image/jpg,image/jpeg,image/png]',
            ]
        ])) {
            // $validation = \Config\Services::validation();

            // return redirect()->to('/user/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/user/tambah')->withInput();
        }

        $fileFotouser = $this->request->getFile('fotouser');
        $namaFotouser = $fileFotouser->getRandomName();
        // dd($fileFotouser);
        $fileFotouser->move('img', $namaFotouser);

        // $namaFotouser = $fileFotouser->getName();
        $this->userModel->save([

            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'level' => $this->request->getVar('level'),
            'fotouser' => $namaFotouser




        ]);

        session()->setFlashdata('pesan', 'Data berhasil Ditambahkan.');
        // dd($this->request->getVar());
        return redirect()->to('/user/datauser');
    }

    public function delete($id)
    {

        // $news = new Tiket_model();
        // $news->delete($id);
        // session()->setFlashdata('pesan', 'Data berhasil Dihapus.');
        // return redirect()->to('/pages');
        $user = $this->userModel->find($id);

        if ($user['fotouser'] != 'user1.png') {

            //user1 adalah default gambar
            unlink('img/' . $user['fotouser']);
        };


        $this->userModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil Dihapus.');
        return redirect()->to('/user/datauser');
    }
    public function edit($id)
    {


        $data = [
            'title' => 'Form Ubah Data User',
            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->getUser($id)

        ];
        return view('user/edit', $data);
    }

    public function update($id)
    {
        // $id = url_title($this->request->getVar('judul'), '-', true);
        if (!$this->validate([
            'username' => ['rules' => 'required'],
            'fotouser' => [
                'rules' => 'uploaded[fotouser]|max_size[fotouser,20000]|is_image[fotouser]|mime_in[fotouser,image/jpg,image/jpeg,image/png,image/svg]',
            ]
        ])) {
            // $validation = \Config\Services::validation();

            // return redirect()->to('/user/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/user/edit/' . $this->request->getVar('id_user'))->withInput();
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

        $this->userModel->save([
            'id_user' => $id,
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'level' => $this->request->getVar('level'),
            'fotouser' => $namaFotouser



        ]);

        session()->setFlashdata('pesan', 'Data berhasil Diubah.');
        // dd($this->request->getVar());
        return redirect()->to('/user/datauser');
    }
}

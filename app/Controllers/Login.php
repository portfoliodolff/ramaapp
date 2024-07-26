<?php

namespace App\Controllers;

use App\Models\Login_model;

class Login extends BaseController
{
    protected $loginModel;
    protected $session;
    public function __construct()
    {

        helper(['form', 'url']);
        $this->loginModel = new Login_model();
        $this->session = session();
        $this->request = \Config\Services::Request();
    }
    public function index()
    {
        $login = $this->loginModel->findAll();
        $data = [
            'title' => 'LOGIN',
            // 'data' => $this->loginModel->getUsers()
            // 'username' => $this->session->get('user')->username,
            // 'login' => $login

        ];
        return view('login/login', $data);
    }
    // public function login()
    // {
    //     if ($this->request->getPost()) {
    //         if ($user = $this->loginModel->login($username = $this->request->getPost('username'), $password = $this->request->getPost('password'))) {
    //             $this->session->set('user', $user);
    //             $this->session->setFlashData('message', 'Valid Login');
    //             return redirect()->to('pages/dashboard')->withCookies();
    //         } else {
    //             $this->session->setFlashdata('message', 'Login Failed');
    //         }
    //     }
    //     $data['message'] = $this->session->getFlashdata('message');
    //     $data['username'] = form_input('username', $username ?? '', 'class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username..."');
    //     $data['password'] = form_input('password', $password ?? '', 'class="form-control form-control-user" id="exampleInputPassword" placeholder="Password"', 'password');
    //     return view('login/login', $data);
    // }

    public function login()
    {

        $data = array(
            'title' => 'Login',
        );
        return view('/login/login', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi dan tidak boleh kosong',
                ]
            ],
        ])) {

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->loginModel->login($username, $password);

            if ($cek) {
                session()->set('log', true);
                session()->set('username', $cek['username']);
                session()->set('level', $cek['level']);
                session()->set('fotouser', $cek['fotouser']);

                return redirect()->to('Pages/index');
            } else {
                session()->setFlashdata('pesan', 'Login Gagal !!, Username Atau Password Salah');
                return redirect()->to('Login/login');
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('Login/login');
        }
    }


    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('level');
        session()->remove('fotouser');
        session()->setFlashdata('pesan', 'Logout Berhasil !!');
        return redirect()->to('Login/login');
    }




    // public function save_register()
    // {
    //     if ($this->validate([
    //         'username' => [
    //             'label' => 'Nama User',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi dan tidak boleh kosong',
    //             ]
    //         ],
    //         'email' => [
    //             'label' => 'E-mail',
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} wajib diisi dan tidak boleh kosong',
    //             ]
    //         ]
    //     ])) {
    //     } else {
    //         session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
    //         return redirect()->to('Login/save_register');
    //     }
    // }


    // public function register()
    // {
    //     $login = $this->loginModel->findAll();
    //     $data = [
    //         'title' => 'Register',




    //     ];
    //     return view('login/register', $data);
    // }
}

<?php

namespace App\Controllers;

use App\Models\Tiket_model;
use App\Models\Login_model;
use App\Models\Onhold_model;

class Pages extends BaseController
{
    protected $tiketModel;
    protected $loginModel;
    protected $onholdModel;
    protected $session;
    protected $request;
    protected $table = 'Views_onhold';
    protected $table1 = 'views_complete';
    protected $table2 = 'views_pending';
    protected $db;
    public function __construct()
    {
        helper(['form', 'url']);
        $this->tiketModel = new Tiket_model();
        $this->loginModel = new Login_model();
        $this->session = session();
        $this->request = \Config\Services::Request();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        session();
        $tiket = $this->tiketModel->findAll();

        $user = $this->loginModel->findAll();
        // $onhold =  $this->tiketModel->getOnhold();




        // $db      = \Config\Database::connect();
        // $builder = $db->table('Views_onhold');
        // $builder->select('status');
        // $query = $builder->get();
        // $onhold = $this->tiketModel->selectdata('onhold')->result_array();


        $onhold = $this->db->table($this->table)->select('hitungan')->get()->getResultArray();
        $complete = $this->db->table($this->table1)->select('Complete')->get()->getResultArray();
        $pending = $this->db->table($this->table2)->select('Pending')->get()->getResultArray();
        // dd($onhold);


        $data = [
            'title' => 'Dashboard Helpdesk',
            'onhold' => $onhold,
            'complete' => $complete,
            'pending' => $pending,
            'tiket' => $tiket

        ];

        // dd($data);
        return view('pages/dashboard', $data);
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
        return view('pages/detail', $data);
        // echo $id;
    }

    public function menupetugas()
    {
    }
    public function menustaff()
    {
    }
    public function menumanager()
    {
    }
}

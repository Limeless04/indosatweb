<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beli extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Beli_model');

    }
    public function index(){
       $data['judul'] ="Data Customer"; 
       $this->form_validation->set_rules('nama_pelanggan','Nama Pelanggan','required');
       $this->form_validation->set_rules('nomor_wa','Nomor WA','required');
       $this->form_validation->set_rules('email','Email','required');
       $this->form_validation->set_rules('alamat_rumah','Alamat rumah','required');
       $this->form_validation->set_rules('depo','Depo','required');
       $this->form_validation->set_rules('produk','Produk','required');
       $this->form_validation->set_rules('msisdn','MSISDN','required'); 
       if($this->form_validation->run() == FALSE){
        $this->load->view('templates/header');
        $this->load->view('beli/index');
        $this->load->view('templates/footer');    
    }else{
        // $data=$this->input->post();
        // var_dump($data);die;
        $this->Beli_model->pesananBaru();
        // $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        // Berhasil ditambahkan
        // </div>');
        redirect('Beli/sukses');
    }
    }
    public function beli(){

    }
    public function sukses(){
        $this->load->view('templates/header');
        $this->load->view('beli/sukses');
        $this->load->view('templates/footer');
    }
}
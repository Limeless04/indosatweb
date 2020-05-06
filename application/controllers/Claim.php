<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Claim extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Claim_model');
        $this->load->library('email');
        $this->load->library('session');
        
    }

    public function index(){
        $data['judul'] ='Claim';
        $this->form_validation->set_rules('kode_hadiah','Kode Hadiah','required'); 
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('claim/index');
            $this->load->view('templates/footer');    
        }else{
            $cekStatus = $this->Claim_model->cekStatus();
            if(empty($cekStatus)){
                $this->session->set_flashdata('klaim','Maaf, Selesaikan proses pembelian sebelum mengkalim hadiah!');
                redirect('Claim');
            }else{
                $cekStatusClaim = $this->Claim_model->cekStatusClaim();
                if(empty($cekStatusClaim)){
                    $hadiah = $this->Claim_model->getRandomHadiah();
                    $this->Claim_model->updateTbMasuk($hadiah);
                    $this->Claim_model->updateKuota($hadiah);
                    $this->session->set_flashdata('sukses','Selamat Anda Mendapatkan');
                    redirect('Claim');
                }else{
                    $this->session->set_flashdata('klaim','Maaf, Claim Hadiah hanya dapat dilakukan Sekali!');
                    redirect('Claim');

                }
            }
        }
    } 

}
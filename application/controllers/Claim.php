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
                    $this->get_gambar($hadiah);
                    // var_dump($hadiah);die;
                    // foreach($hadiah as $h){
                    //     $this->Claim_model->updateTbMasuk($h);
                    //     $this->Claim_model->updateKuota($h);
                    //     $this->session->set_flashdata('sukses','<p>Selamat Anda Mendapatkan</p> <h3>'.$h->nama_hadiah.'</h3><img src="" alt="">');
                    //     redirect('Claim');
                    // }
                    foreach($hadiah as $h){
                        // $this->Claim_model->updateTbMasuk($h);
                        // $this->Claim_model->updateKuota($h);
                        $this->session->set_flashdata('sukses','<p>Selamat Anda Mendapatkan</p> <h3>'.$h->nama_hadiah.'</h3><img src="../assets/img/hadiah/'.$h->gambar.'" width="200px" height="200px">');
                        redirect('Claim');
                    }
                }else{
                    $this->session->set_flashdata('klaim','Maaf, Claim Hadiah hanya dapat dilakukan Sekali!');
                    redirect('Claim');

                }
            }
        }
    } 
    function get_gambar($hadiah){
        $gambar = $this->Claim_model->getGambar($hadiah);       
        echo json_encode($gambar);// konversi varibael $callback menjadi JSON
    }
}
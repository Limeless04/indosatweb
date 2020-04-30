<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beli extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Beli_model');
        $this->load->library('email');
        
    }
    public function index(){
        $data['judul'] ="Data Customer"; 
        $data['produk'] =$this->Beli_model->getAllDataProduk();
        //ambil data cluster
        $data['cluster'] =$this->Beli_model->getAllDataCluster();
        // $data['msisdn'] = $this->Home_mode->getAllMsisdn();
       $this->form_validation->set_rules('nama_pelanggan','Nama Pelanggan','required');
       $this->form_validation->set_rules('nomor_wa','Nomor WA','required');
       $this->form_validation->set_rules('email','Email','required');
       $this->form_validation->set_rules('alamat_rumah','Alamat rumah','required');
       $this->form_validation->set_rules('depo','Depo','required');
       $this->form_validation->set_rules('produk','Produk','required');
       $this->form_validation->set_rules('msisdn','MSISDN','required'); 
       if($this->form_validation->run() == FALSE){
        $this->load->view('templates/header',$data);
        $this->load->view('beli/index',$data);  
    }else{
        // $data=$this->input->post();
        // var_dump($data);die;
        $this->sendEmailToPelanggan();
        $msisdn = $this->input->post('msisdn',true);
        $this->Beli_model->pesananBaru();
        $this->Beli_model->hapusMsisdn($msisdn);
        // $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        // Berhasil ditambahkan
        // </div>');
        redirect('Beli/sukses');
    }
    }
	
    function get_msisdn(){
        $cluster= $this->input->post("depo");
		$msisdn = $this->Beli_model->getMsisdn($cluster);       
        echo json_encode($msisdn);// konversi varibael $callback menjadi JSON
	}
    public function sukses(){
        $this->load->view('templates/header');
        $this->load->view('beli/sukses');
        $this->load->view('templates/footer');
    }
    function sendEmailToPelanggan(){
        $this->load->library('email');
        $this->load->library('encryption');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'examplemai04l@gmail.com', // change it to yours
            'smtp_pass' => 'Xlim2504', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
            ); 
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $from_email = "examplemai04l@gmail.com";//email default
        $nama = $this->input->post('nama_pelanggan',true);
        $no_wa = $this->input->post('nomor_wa',true);
        $email = $this->input->post('email',true);
        $alamat= $this->input->post('alamat_rumah',true);
        $produk = $this->input->post('produk',true);
        $msisdn = $this->input->post('msisdn',true);
        $date = date('d-m-Y');
        $time  = date('h:i:s'); 
        $message = "Selamat pagi,
        Pada tanggal". $date.", Jam". $time. "telah masuk Order baru dengan data sebagai berikut :
        \r\nProduk: ".$produk."\r\n Msisdn: ".$msisdn."\r\nData Pelanggan: \r\nNama: ".$nama."\r\nAlamat: ".$alamat."\r\nNomor wa: ".$no_wa."\r\nEmail: ".$email."";

        //Load email library
        $this->email->from($from_email);
        $this->email->to($email);
        $this->email->subject('New Order');
        $this->email->message($message);
        //Send mail
        if($this->email->send()){
          echo "email sent";
        }else{
            show_error($this->email->print_debugger());
        }
     }
     function sendEmailToPic(){
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'examplemai04l@gmail.com', // change it to yours
            'smtp_pass' => 'MailMail04', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
            ); 
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $from_email = "examplemai04l@gmail.com";//email default
        $to_email = $this->Beli_model->getEmail();
        $nama = $this->input->post('nama_pelanggan',true);
        $no_wa = $this->input->post('nomor_wa',true);
        $email = $this->input->post('email',true);
        $alamat= $this->input->post('alamat_rumah',true);
        $produk = $this->input->post('produk',true);
        $msisdn = $this->input->post('msisdn',true);
        $date = date('d-m-Y');
        $time  = date('h:i:s'); 
        $htmlContent = "<p>Selamat pagi,
        Pada tanggal". $date.", Jam". $time. "telah masuk Order baru dengan data sebagai berikut :
        </p>\r\n";
        $htmlContent = "<p>Produk: ".$produk."</p>\r\n<p>Msisdn: ".$msisdn."</p>\r\n<p>Data Pelanggan: </p>\r\n<p>Nama: ".$nama."</p>\r\n<p>Alamat: ".$alamat."</p>\r\n<p>Nomor wa: ".$no_wa."</p>\r\n<p>Email: ".$email."</p>";

        //Load email library
        $this->email->setFrom($from_email, 'Identification');
        $this->email->setTO($to_email['email']);
        $this->email->setSubject('New Order');
        $this->email->message($htmlContent);
        //Send mail
    //     if($this->email->send())
    //         $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
    //     else
    //         $this->session->set_flashdata("email_sent","You have encountered an error");
    //     $this->load->view('contact_email_form');
     }
}
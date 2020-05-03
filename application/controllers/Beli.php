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
        $this->load->library('session');
        
    }
    public function index(){
        $data['judul'] ="Data Customer"; 
        $data['produk'] =$this->Beli_model->getAllDataProduk();
        //ambil data cluster
        $data['cluster'] =$this->Beli_model->getAllDataCluster();
        // $data['msisdn'] = $this->Home_mode->getAllMsisdn();
        $this->form_validation->set_rules('depo','Depo','required');
        $this->form_validation->set_rules('produk','Produk','required');
        $this->form_validation->set_rules('msisdn','MSISDN','required'); 
        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('beli/index',$data);
            $this->load->view('templates/footer',$data);
        }else{
            $form1 = [
                        'depo' => $this->input->post("depo"),
                        'produk' => $this->input->post("produk"),
                        'msisdn'=> $this->input->post("msisdn"),
                    ];
                    $session = $this->session->set_userdata('input1',$form1);
                    redirect("Beli/index2");

        }
    }

    function index2(){
        $data['judul'] ="Data Customer"; 
        $data['produk'] =$this->Beli_model->getAllDataProduk();
        //ambil data cluster
        $data['cluster'] =$this->Beli_model->getAllDataCluster();
        // $data['msisdn'] = $this->Home_mode->getAllMsisdn();
        $to_email = $this->Beli_model->getEmail();
        $this->form_validation->set_rules('nama_pelanggan','Nama Pelanggan','required');
        $this->form_validation->set_rules('nomor_wa','Nomor WA','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('alamat_rumah','Alamat rumah','required');
        if($this->form_validation->run()==FALSE){
            $this->load->view('templates/header',$data);
            $this->load->view('beli/index2',$data);
        }else{
            $data = $this->session->userdata('input1');
            $this->sendEmailToPelanggan();
            $to_email = $this->Beli_model->getEmail();
            foreach($to_email as $e){
                $this->sendEmailToPic($e);
            }
            $this->Beli_model->pesananBaru();
            $this->Beli_model->hapusMsisdn($data['msisdn']);
            redirect('Beli/sukses');
        }
    }
	
    function get_msisdn(){
        $depo= $this->input->post("depo");
		$msisdn = $this->Beli_model->getMsisdn($depo);       
        echo json_encode($msisdn);// konversi varibael $callback menjadi JSON
	}
    public function sukses(){
        $data['judul']="Sukses";
        $this->load->view('templates/header',$data);
        $this->load->view('beli/sukses');
        $this->load->view('templates/footer');
    }
    function sendEmailToPelanggan(){
        $this->load->library('email');
        $this->load->library('encryption');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_crypto'  =>'ssl',
            'smtp_user' => 'belim3ooredo@gmail.com', // change it to yours
            'smtp_pass' => 'Belim3now', // change it to yours
            'mailtype' => 'html',
            'smtp_timeout' =>'10',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
            'newline' => "\r\n",
            'validation' => TRUE
            ); 
        $this->email->initialize($config);
        $from_email = "examplemai04l@gmail.com";//email default
        $nama = $this->input->post('nama_pelanggan',true);
        $no_wa = $this->input->post('nomor_wa',true);
        $email = $this->input->post('email',true);
        $alamat= $this->input->post('alamat_rumah',true);
        $produk = $this->input->post('produk',true);
        $msisdn = $this->input->post('msisdn',true);
        date_default_timezone_set("Asia/Jakarta");
        $date = date('d-m-Y');
        $time  = date('h:i:s'); 
        $message = "<p>Pada tanggal, ". $date. " Jam ". $time . " telah masuk Order baru dengan data sebagai berikut : </>
        <p>Produk:".$produk."</p>\r\n<p>Msisdn: ".$msisdn."</p>\r\n<p>Data Pelanggan: </p>\r\n<p>Nama: ".$nama."</p>\r\n<p>Alamat: ".$alamat."</p>\r\n<p>Nomor wa: ".$no_wa."</p>\r\n<p>Email: ".$email."</p>";

        //Load email library
        $this->email->from($from_email);
        $this->email->to($email);
        $this->email->subject('Pesanan Masuk');
        $this->email->message($message);
        //Send mail
     }
     function sendEmailToPic($e){
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_crypto'  =>'ssl',
            'smtp_user' => 'belim3ooredo@gmail.com', // change it to yours
            'smtp_pass' => 'Belim3now', // change it to yours
            'mailtype' => 'html',
            'smtp_timeout' =>'10',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
            'newline' => "\r\n",
            'validation' => TRUE
            ); 
        $this->email->initialize($config);
        $from_email = "examplemai04l@gmail.com";//email default
        $nama = $this->input->post('nama_pelanggan',true);
        $no_wa = $this->input->post('nomor_wa',true);
        $email = $this->input->post('email',true);
        $alamat= $this->input->post('alamat_rumah',true);
        $produk = $this->input->post('produk',true);
        $msisdn = $this->input->post('msisdn',true);
        date_default_timezone_set("Asia/Jakarta");
        $date = date('d-m-Y');
        $time  = date('H:i:s'); 
        $htmlContent = "<p>Pada tanggal, ". $date. " Jam ". $time . " telah masuk Order baru dengan data sebagai berikut : </p>
        <p>Produk:".$produk."</p>\r\n<p>Msisdn: ".$msisdn."</p>\r\n<p>Data Pelanggan: </p>\r\n<p>Nama: ".$nama."</p>\r\n<p>Alamat: ".$alamat."</p>\r\n<p>Nomor wa: ".$no_wa."</p>\r\n<p>Email: ".$email."</p><a href='http://localhost/indosat/Cluster/konfirmasi'>Konfirmasi</a>";
        //Load email library
        $this->email->from($from_email, 'Orderan Baru');
        $this->email->to($e);
        $this->email->subject('New Order');
        $this->email->message($htmlContent);
        //Send mail
        if(!$this->email->send()){
            show_error($this->email->print_debugger());
          }
     }
}
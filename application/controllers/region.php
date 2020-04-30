<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model("Region_model");
        if($this->session->userdata('id_role')!=1){
            redirect('Auth');
        }

    }

    public function index(){
    $data['heading'] = "Dashboard";
    $this->load->view("templates/aheader");
    $this->load->view("templates/asidebar");
    $this->load->view("region/index",$data);
    $this->load->view("templates/afooter");
    }

    public function report(){
	    $data["heading"] ="Report";
        // $data['reportBlnIni'] = $this->Region_model->getDataReportBulanIni();
        // $data['reportBlnLalu'] = $this->Region_model->getDataReportBulanLalu();
        // $data['allReportData'] = $this->Region_model->getAllDataReport();
        $this->load->view("templates/aheader", $data);
        $this->load->view("templates/asidebar");
        $this->load->view("region/report",$data);
        $this->load->view("templates/afooter");
    }
    public function produk(){
        $data["heading"] ="Produk";
        $data["produk"] =$this->Region_model->getAllDataProduk();
        $this->load->view("templates/aheader",$data);
        $this->load->view("templates/asidebar");
        $this->load->view("region/produk",$data);
        $this->load->view("templates/afooter");
    }  
    public function pic(){
        $data['heading'] = 'Data Akun Region';
        $user = $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
        $data['userRegion'] = $this->Region_model->getDataByPropinsi($user);
        $this->load->view("templates/aheader");
        $this->load->view("templates/asidebar");
        $this->load->view("region/pic",$data);
        $this->load->view("templates/afooter");
    }
    public function pushEmail(){
        $this->load->view("templates/aheader");
        $this->load->view("templates/asidebar");
        $this->load->view("region/pushEmail");
        $this->load->view("templates/afooter");
    }

    function sendEmailToPelanggan(){
        $from_email = $this->session->userdata('email');
        $to_email = $this->input->post('email');
        //Load email library
        $this->email->from($from_email, 'Identification');
        $this->email->to($to_email);
        $this->email->subject('Notifkasi Pesanan Baru');
        $this->email->message('The email send using codeigniter library');
        //Send mail
        if($this->email->send())
            $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
        else
            $this->session->set_flashdata("email_sent","You have encountered an error");
        $this->load->view('contact_email_form');
    }



    public function createProduk(){
        $this->form_validation->set_rules('nama_produk','Nama Produk','required');
        $this->form_validation->set_rules('harga','Harga','required');
        $this->form_validation->set_rules('desc_produk','Deskripsi','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view("templates/aheader");
            $this->load->view("templates/asidebar");
            $this->load->view("region/createProduk");
            $this->load->view("templates/afooter");
     }else{
         // $data=$this->input->post();
         // var_dump($data);die;
         $this->Region_model->tambahProdukBaru();
         $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
         Berhasil ditambahkan
         </div>');
         redirect('region/produk');
     }
    }
    public function hapusProduk($id){
        $this->Region_model->hapusProduk($id);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert">
        Berhasil dihapus
        </div>');
        redirect('region/produk');
    }

    public function editProduk($id){
        $data['produk'] = $this->db->get_where('tb_produk',['id' => $id]) ->row_array();
        $this->form_validation->set_rules('nama_produk','Nama Produk','required');
        $this->form_validation->set_rules('harga','Harga','required');
        $this->form_validation->set_rules('desc_produk','Deskripsi','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view("templates/aheader");
            $this->load->view("templates/asidebar");
            $this->load->view("region/editProduk",$data);
            $this->load->view("templates/afooter");
        }else{
            // $data=$this->input->post();
            // var_dump($data);die;
            $this->Region_model->editProduk($id);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Berhasil ditambahkan
            </div>');
            redirect('region/produk');
        }
    }


    public function tambahUser(){
        if(!$this->session->userdata('email')){
            redirect('Auth');
        }
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[tb_user.email]');
        // $this->form_validation->set_rules('password','Password','required|trim|min_length[8]|matches[password2]',[
        //     'matches' => 'Password dont match!',
        //     'min_length' => 'Password too short!'
        //     ]);
        // $this->form_validation->set_rules('password2','Password','required|trim|matches[password]',[
        //     'matches' => 'Password dont match!',
        //     'min_length' => 'Password too short!'
        //     ]);
        $this->form_validation->set_rules('cluster','Cluster','required');
        $this->form_validation->set_rules('propinsi','Propinsi','required');
        // $this->form_validation->set_rules('role','Role','required');
        if($this->form_validation->run()==FALSE){
        $data['judul']='Daftar';
        $this->load->view('templates/aheader',$data);
        $this->load->view('templates/asidebar',$data);
        $this->load->view('region/tambahUser');
        $this->load->view('templates/afooter');
        }else{
        $this->Region_model->tambahDataUserRegion();
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert">
        Akunmu berhasil ditambahkan!
        </div>');
        redirect('Region/pic');
        }
    }
    public function editUserRegion($id){
        $data['user'] = $this->db->get_where('tb_user',['id' => $id]) ->row_array();
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[tb_user.email]');
        $this->form_validation->set_rules('password','Password','required|trim|min_length[8]|matches[password2]',[
        'matches' => 'Password dont match!',
        'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password]',[
        'matches' => 'Password dont match!',
        'min_length' => 'Password too short!'
        ]);
        if($this->form_validation->run() == FALSE){
            $this->load->view("templates/aheader");
            $this->load->view("templates/asidebar");
            $this->load->view("region/editUser",$data);
            $this->load->view("templates/afooter");
        }else{
            // $data=$this->input->post();
            // var_dump($data);die;
            $this->Region_model->editUserRegion($id);
            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert">
            Berhasil ditambahkan! Untuk Melihat Perubahan Silahkan Login Ulang.
            </div>');
            redirect('region/pic');
        }
    }

    public function hapusUserRegion($id){
        $this->Region_model->hapusUserRegion($id);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert">
        Berhasil dihapus
        </div>');
        redirect('Region/pic');
    }
    public function logOut(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('logOut','<div class="alert alert-danger" role="alert">
        Anda berhasil keluar!</div>');
        redirect('Home');
    }

    function get_cluster(){
        $propinsi= $this->input->post("propinsi");
        $cluster = $this->Region_model->getCluster($propinsi); 
        echo json_encode($cluster);// konversi varibael $callback menjadi JSON
    }
}


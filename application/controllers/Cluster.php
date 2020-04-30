<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cluster extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->model("Cluster_model");
        if($this->session->userdata('id_role')!=2){
            redirect('Auth');
        }
    }
    public function index(){
        $data['heading'] = "Dashboard Cluster";
        $data['notif'] =$this->Cluster_model->countMsisdn();
        $this->load->view("templates/aheader");
        $this->load->view("templates/csidebar");
        $this->load->view("cluster/index",$data);
        $this->load->view("templates/afooter");
    }
    public function reportOrder(){
        $data['heading'] = "Report Order";
        $data['notif'] =$this->Cluster_model->countMsisdn(); 
        $this->load->view("templates/aheader");
        $this->load->view("templates/csidebar");
        $this->load->view("Cluster/reportOrder",$data);
        $this->load->view("templates/afooter");
    }
    public function msisdn(){
        $data['heading'] = "Add/Update MSISDN";
        $data['notif'] =$this->Cluster_model->countMsisdn();
        $cluster = $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
        $data['msisdn'] =$this->Cluster_model->countMsisdn($cluster);
        $this->load->view("templates/aheader");
        $this->load->view("templates/csidebar");
        $this->load->view("Cluster/msisdn",$data);
        $this->load->view("templates/afooter");
    }
    public function email(){
        $data['heading'] = "Dashboard Cluster";
        $user = $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
        $data['userCluster'] = $this->Cluster_model->getDataByPropinsi($user);
        $data['notif'] =$this->Cluster_model->countMsisdn();
        $this->load->view("templates/aheader");
        $this->load->view("templates/csidebar");
        $this->load->view("cluster/email",$data);
        $this->load->view("templates/afooter");
    }
 
    public function addMsisdn(){
        $this->form_validation->set_rules('msisdn','MSISDn','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view("templates/aheader");
            $this->load->view("templates/csidebar");
            $this->load->view("cluster/addMsisdn");
            $this->load->view("templates/afooter");
     }else{
         // $data=$this->input->post();
         // var_dump($data);die;
         $this->Cluster_model->tambahMsisdnBaru();
         $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
         Berhasil ditambahkan
         </div>');
         redirect('cluster/msisdn');
     }
    }

    public function tambahUser(){
        if(!$this->session->userdata('id_rolw')!=2){
            redirect('Auth');
        }
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[tb_user.email]');
        $this->form_validation->set_rules('cluster','Cluster','required');
        // $this->form_validation->set_rules('password','Password','required|trim|min_length[8]|matches[password2]',[
        //     'matches' => 'Password dont match!',
        //     'min_length' => 'Password too short!'
        //     ]);
        // $this->form_validation->set_rules('password2','Password','required|trim|matches[password]',[
        //     'matches' => 'Password dont match!',
        //     'min_length' => 'Password too short!'
        //     ]);
        $this->form_validation->set_rules('propinsi','Propinsi','required');
        $this->form_validation->set_rules('role','Role','required');
        $data['judul']='Daftar';
        if($this->form_validation->run()==FALSE){
        $this->load->view('templates/aheader',$data);
        $this->load->view('templates/asidebar',$data);
        $this->load->view('cluster/tambahUser',$data);
        $this->load->view('templates/afooter');
        }else{
        $this->Cluster_model->tambahDataUserCluster();
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert">
        Akunmu berhasil ditambahkan!
        </div>');
        redirect('Region/pic');
        }
    }
    function get_cluster(){
        $propinsi= $this->input->post("propinsi");
		$cluster = $this->Cluster_model->getCluster($propinsi);       
        echo json_encode($cluster);// konversi varibael $callback menjadi JSON
    }
    function get_report(){
        $user= $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
		$report = $this->Cluster_model->getReport($user);       
        echo json_encode($report);// konversi varibael $callback menjadi JSON
    }


    function getAllReport(){
       header('Content-Type:application/json');
       echo $this->Cluster_model->getAllReportData();     
    }
    public function logOut(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('logOut','<div class="alert alert-danger" role="alert">
        Anda berhasil keluar!</div>');
        redirect('Home');
    }
}
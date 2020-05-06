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
        $data['judul'] ="Cluster";
        $data['heading'] = "Dashboard Cluster";
        $data['notif'] =$this->Cluster_model->countMsisdn();
        $this->load->view("templates/aheader",$data);
        $this->load->view("templates/csidebar");
        $this->load->view("cluster/index",$data);
        $this->load->view("templates/afooter");
    }
    public function reportOrder(){
        $data['judul'] ="Cluster";
        $data['heading'] = "Report Order";
        $data['notif'] =$this->Cluster_model->countMsisdn(); 
        $this->load->view("templates/aheader",$data);
        $this->load->view("templates/csidebar");
        $this->load->view("cluster/reportOrder",$data);
        $this->load->view("templates/afooter");
    }
    public function msisdn(){
        $data['judul'] ="Cluster";
        $data['heading'] = "Add/Update MSISDN";
        $data['notif'] =$this->Cluster_model->countMsisdn();
        $cluster = $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
        $data['msisdn'] =$this->Cluster_model->countMsisdn($cluster);
        $this->load->view("templates/aheader",$data);
        $this->load->view("templates/csidebar");
        $this->load->view("cluster/msisdn",$data);
        $this->load->view("templates/afooter");
    }
    public function email(){
        $data['judul'] ="Cluster";
        $data['heading'] = "Dashboard Cluster";
        $user = $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
        $data['userCluster'] = $this->Cluster_model->getDataByPropinsi($user);
        $data['notif'] =$this->Cluster_model->countMsisdn();
        $this->load->view("templates/aheader",$data);
        $this->load->view("templates/csidebar");
        $this->load->view("cluster/email",$data);
        $this->load->view("templates/afooter");
    }

 
    public function addMsisdn(){
        $data['judul'] ="Cluster";
        $this->form_validation->set_rules('msisdn','MSISDn','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view("templates/aheader",$data);
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
     function hapusMsisdn($id){
        $this->Cluster_model->hapusMsisdn($id);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
        Berhasil dihapus
        </div>');
        redirect('Cluster/msisdn');   
     }


    }
    public function editUser($id){
        $data['judul'] ="Region";
        $data['user'] = $this->db->get_where('tb_user',['id' => $id]) ->row_array();
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required|trim|min_length[8]|matches[password2]',[
        'matches' => 'Password dont match!',
        'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password]',[
        'matches' => 'Password dont match!',
        'min_length' => 'Password too short!'
        ]);
        if($this->form_validation->run() == FALSE){
            $this->load->view("templates/aheader",$data);
            $this->load->view("templates/csidebar");
            $this->load->view("cluster/editUser",$data);
            $this->load->view("templates/afooter");
        }else{
            // $data=$this->input->post();
            // var_dump($data);die;
            $this->Cluster_model->editUserCluster($id);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
            Berhasil diedit! Untuk Melihat Perubahan Silahkan Login Ulang.
            </div>');
            redirect('Cluster/email');
        }
    }

    public function tambahUser(){
        if($this->session->userdata('id_role')!=2){
            redirect('Auth');
        }
        $data['judul'] ="Cluster";
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[tb_user.email]');
        $this->form_validation->set_rules('cluster','Cluster','required');
        $this->form_validation->set_rules('propinsi','Propinsi','required');
        $data['judul']='Daftar';
        if($this->form_validation->run()==FALSE){
        $this->load->view('templates/aheader',$data);
        $this->load->view('templates/csidebar',$data);
        $this->load->view('cluster/tambahUser',$data);
        $this->load->view('templates/afooter');
        }else{
        $this->Cluster_model->tambahDataUserCluster();
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert">
        Akunmu berhasil ditambahkan!
        </div>');
        redirect('Cluster/email');
        }
    }
    public function hapusUser($id){
        $this->Cluster_model->hapusUserCluster($id);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
        Berhasil dihapus
        </div>');
        redirect('Cluster/email');
    }

    function get_cluster(){
        $propinsi= $this->input->post("propinsi");
		$cluster = $this->Cluster_model->getCluster($propinsi);       
        echo json_encode($cluster);// konversi varibael $callback menjadi JSON
    }
    // function get_report(){
    //     header('Content-Type:application/json');       
    //     echo $this->Cluster_model->getReport();// konversi varibael $callback menjadi JSON
    // }

 
    function getAllReport(){
       header('Content-Type:application/json');
       echo $this->Cluster_model->getAllReportData();     
    }
    public function logOut(){
         $this->session->sess_destroy();
        $this->session->set_flashdata('logOut','<div class="alert alert-danger" role="alert">
        Anda berhasil keluar!</div>');
        redirect('Auth');
    }
    function getReport(){
        $getReport = $this->Cluster_model->make_datatables();
        if(empty($getReport)){
            $data = array();
            foreach($getReport as $row){
            $sub_array = array();
            // $sub_array[]
            $sub_array[] = $row->nama_pelanggan;
            $sub_array[] = $row->no_wa;
            $sub_array[] = $row->alamat_rumah  ;
            $sub_array[] = $row->produk;
            $sub_array[] = $row->msisdn;
            $sub_array[] = $row->cluster;
            $sub_array[] = $row->status;
            $newDate = date("d-M-Y H:i",strtotime($row->dibuat));
            $sub_array[] = $newDate;
            $sub_array[] = $row->dikonfirm;
            $sub_array[] = $row->hadiah;    
            $sub_array[] = '<button class="badge badge-pill badge-info"><a style="text-decoration:none;color:white;" href="'.base_url('Cluster/editStatus/'.$row->id).'">edit Status</a></button><br><button class="badge badge-pill badge-info"><a style="text-decoration:none;color:white;" href="'.base_url('Cluster/editData/'.$row->id).'">edit Data</a></button>';
            $data[] = $sub_array;
        }          
        }else{
            $data = array();
            foreach($getReport as $row){
            $sub_array = array();
            // $sub_array[]
            $sub_array[] = $row->nama_pelanggan;
            $sub_array[] = $row->no_wa;
            $sub_array[] = $row->alamat_rumah  ;
            $sub_array[] = $row->produk;
            $sub_array[] = $row->msisdn;
            $sub_array[] = $row->cluster;
            $sub_array[] = $row->status;
            $sub_array[] = $row->dikonfirm;
            $sub_array[] = $row->hadiah;    
            $newDate = date("d-M-Y H:i",strtotime($row->dibuat));
            $sub_array[] = $newDate;
            $sub_array[] = '<button class="badge badge-pill badge-info"><a style="text-decoration:none;color:white;" href="'.base_url('Cluster/editStatus/'.$row->id).'">edit Status</a></button><br><button class="badge badge-pill badge-info"><a style="text-decoration:none;color:white;" href="'.base_url('Cluster/editData/'.$row->id).'">edit Data</a></button>';
            $data[] = $sub_array;
        }
    }
    $output = array(
        "draw" =>intval(@$_POST["draw"]),
        "recordsTotal"=>$this->Cluster_model->get_all_data(),
        "recordsFiltered" =>$this->Cluster_model->get_filtered(),
        "data" => $data
    );
    echo json_encode($output);
    }
    function getReportProgress(){
        $getReport = $this->Cluster_model->make_datatables_progress();
        if(empty($getReport)){
            $data = array();
            foreach($getReport as $row){
            $sub_array = array();
            // $sub_array[]
            $sub_array[] = $row->nama_pelanggan;
            $sub_array[] = $row->no_wa;
            $sub_array[] = $row->alamat_rumah  ;
            $sub_array[] = $row->produk;
            $sub_array[] = $row->msisdn;
            $sub_array[] = $row->cluster;
            $sub_array[] = $row->status;
            $newDate = date("d-M-Y H:i",strtotime($row->dibuat));
            $sub_array[] = $newDate;
            $sub_array[] = $row->dikonfirm;
            $sub_array[] = $row->hadiah;    
            $sub_array[] = '<button class="badge badge-pill badge-info"><a style="text-decoration:none;color:white;" href="'.base_url('Cluster/editStatus/'.$row->id).'">edit Status</a></button><br><button class="badge badge-pill badge-info"><a style="text-decoration:none;color:white;" href="'.base_url('Cluster/editData/'.$row->id).'">edit Data</a></button>';
            $data[] = $sub_array;
        }          
        }else{
            $data = array();
            foreach($getReport as $row){
            $sub_array = array();
            // $sub_array[]
            $sub_array[] = $row->nama_pelanggan;
            $sub_array[] = $row->no_wa;
            $sub_array[] = $row->alamat_rumah  ;
            $sub_array[] = $row->produk;
            $sub_array[] = $row->msisdn;
            $sub_array[] = $row->cluster;
            $sub_array[] = $row->status;
            $sub_array[] = $row->dikonfirm;
            $sub_array[] = $row->hadiah;    
            $newDate = date("d-M-Y H:i",strtotime($row->dibuat));
            $sub_array[] = $newDate;
            $sub_array[] = '<button class="badge badge-pill badge-info"><a style="text-decoration:none;color:white;" href="'.base_url('Cluster/editStatus/'.$row->id).'">edit Status</a></button><br><button class="badge badge-pill badge-info"><a style="text-decoration:none;color:white;" href="'.base_url('Cluster/editData/'.$row->id).'">edit Data</a></button>';
            $data[] = $sub_array;
        }
    }
    $output = array(
        "draw" =>intval(@$_POST["draw"]),
        "recordsTotal"=>$this->Cluster_model->get_all_data(),
        "recordsFiltered" =>$this->Cluster_model->get_filtered(),
        "data" => $data
    );
    echo json_encode($output);
    }
    function getReportReject(){
        $getReport = $this->Cluster_model->make_datatables_reject();
        if(empty($getReport)){
            $data = array();
            foreach($getReport as $row){
            $sub_array = array();
            // $sub_array[]
            $sub_array[] = $row->nama_pelanggan;
            $sub_array[] = $row->no_wa;
            $sub_array[] = $row->alamat_rumah  ;
            $sub_array[] = $row->produk;
            $sub_array[] = $row->msisdn;
            $sub_array[] = $row->cluster;
            $sub_array[] = $row->status;
            $newDate = date("d-M-Y H:i",strtotime($row->dibuat));
            $sub_array[] = $newDate;
            $sub_array[] = $row->dikonfirm;
            $sub_array[] = $row->hadiah;    
            $sub_array[] = '<button class="badge badge-pill badge-info"><a style="text-decoration:none;color:white;" href="'.base_url('Cluster/editStatus/'.$row->id).'">edit Status</a></button><br><button class="badge badge-pill badge-info"><a style="text-decoration:none;color:white;" href="'.base_url('Cluster/editData/'.$row->id).'">edit Data</a></button>';
            $data[] = $sub_array;
        }          
        }else{
            $data = array();
            foreach($getReport as $row){
            $sub_array = array();
            // $sub_array[]
            $sub_array[] = $row->nama_pelanggan;
            $sub_array[] = $row->no_wa;
            $sub_array[] = $row->alamat_rumah  ;
            $sub_array[] = $row->produk;
            $sub_array[] = $row->msisdn;
            $sub_array[] = $row->cluster;
            $sub_array[] = $row->status;
            $sub_array[] = $row->dikonfirm;
            $sub_array[] = $row->hadiah;    
            $newDate = date("d-M-Y H:i",strtotime($row->dibuat));
            $sub_array[] = $newDate;
            $sub_array[] = '<button class="badge badge-pill badge-info"><a style="text-decoration:none;color:white;" href="'.base_url('Cluster/editStatus/'.$row->id).'">edit Status</a></button><br><button class="badge badge-pill badge-info"><a style="text-decoration:none;color:white;" href="'.base_url('Cluster/editData/'.$row->id).'">edit Data</a></button>';
            $data[] = $sub_array;
        }
    }
    $output = array(
        "draw" =>intval(@$_POST["draw"]),
        "recordsTotal"=>$this->Cluster_model->get_all_data(),
        "recordsFiltered" =>$this->Cluster_model->get_filtered(),
        "data" => $data
    );
    echo json_encode($output);
    }


    function editData($id){
        $data['judul'] ="Cluster";
        $data['heading'] = "Dashboard Cluster";
        $data['edit'] = $this->Cluster_model->getDataById($id);
        $data['produk'] =$this->Cluster_model->getAllDataProduk();
        //ambil data cluster
        $data['cluster'] =$this->Cluster_model->getAllDataCluster();
        // $data['data'] = $this->Cluster_model->edtiData($id);
        // $user = $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
        // $data['userCluster'] = $this->Cluster_model->getDataByPropinsi($user);
        $data['notif'] =$this->Cluster_model->countMsisdn();
        $this->form_validation->set_rules('nama','Nama Lengkap','required');
        $this->form_validation->set_rules('no_wa','Nomor Wa','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('alamat_rumah','Alamat Rumah','required');    
        // $this->form_validation->set_rules('depo','depo','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view("templates/aheader",$data);
            $this->load->view("templates/csidebar");
            $this->load->view("cluster/editData",$data);
            $this->load->view("templates/afooter");
        }else{
            // $data=$this->input->post();
            // var_dump($data);die;
            $this->Cluster_model->editDataPelanggan($id);
            $this->session->set_flashdata('masuk','<div class="alert alert-success" role="alert">
            Berhasil diubah!</div>');
            redirect('Cluster/reportOrder');
        }
    }
    
    function editStatus($id){
        $data['judul'] ="Cluster";
        $data['heading'] = "Dashboard Cluster";
        $data['edit'] = $this->Cluster_model->getDataById($id);
        // $data['data'] = $this->Cluster_model->edtiData($id);
        // $user = $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
        // $data['userCluster'] = $this->Cluster_model->getDataByPropinsi($user);
        $data['notif'] =$this->Cluster_model->countMsisdn();
        $this->form_validation->set_rules('status','Status','required');
        if($this->input->post("status") =="reject"){
            $this->form_validation->set_rules('ket','Keterangan','required');
            $this->Cluster_model->tambahMsisdnBaru();
        }
        if($this->form_validation->run() == FALSE){
            $this->load->view("templates/aheader",$data);
            $this->load->view("templates/csidebar");
            $this->load->view("cluster/editStatus",$data);
            $this->load->view("templates/afooter");
        }else{
            // $data=$this->input->post();
            // var_dump($data);die;
            if($this->input->post("status")=="sukses"){
                $this->sendEmailToPelanggan();
                $this->Cluster_model->editClusterStatus($id);
                $this->session->set_flashdata('masuk','<div class="alert alert-success" role="alert">
                Berhasil diubah!</div>');
                redirect('Cluster/reportOrder');    
            }else{
                $this->Cluster_model->editClusterStatus($id);
                $this->session->set_flashdata('masuk','<div class="alert alert-success" role="alert">
                Berhasil diubah!</div>');
                redirect('Cluster/reportOrder');  
            }
        }
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
        $from_email = "belim3ooredo@gmail.com";//email default
        $nama = $this->input->post('nama_pelanggan',true);
        $no_wa = $this->input->post('nomor_wa',true);
        $email = $this->input->post('email',true);
        $data = $this->session->userdata('input1');
        date_default_timezone_set("Asia/Jakarta");
        $date = date('d-m-Y');
        $time  = date('h:i:s'); 
        $message = "<p>Pada tanggal, ". $date. " Jam ". $time . " telah masuk Order baru dengan data sebagai berikut : </>
        <p>Produk:".$data['produk']."</p>\r\n<p>Msisdn: ".$data['msisdn']."</p>\r\n<p>Data Pelanggan: </p>\r\n<p>Nama: ".$nama."</p>\r\n<p>Alamat: ".$alamat."</p>\r\n<p>Nomor wa: ".$no_wa."</p>\r\n<p>Email: ".$email."</p>";

        //Load email library
        $this->email->from($from_email);
        $this->email->to($email);
        $this->email->subject('Pesanan Masuk');
        $this->email->message($message);
        //Send mail
     }

    function getMsisdn(){
        $getMsisdn = $this->Cluster_model->make_datatables_msisdn();
        $data = array();
        foreach($getMsisdn as $row){
        $sub_array = array();
        // $sub_array[]
        $sub_array[] = $row->msisdn;
        $sub_array[] = $row->cluster  ;
        $sub_array[] = '<button data-toggle="modal" data-target="#mymodal" class="badge badge-pill badge-danger">Hapus</button>
         <!-- Modal -->
            <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Apakah anda Yakin mengahapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Msisdn:'.$row->msisdn.'</p>
                    <p>Cluster:'.$row->cluster.'</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger"><a  style="text-decoration:none;color:white;" href="'.base_url('Cluster/hapusMsisdn/'.$row->id).'">Hapus</a></button>
                </div>
                </div>
            </div>
            </div>';
        
        $data[] = $sub_array;
    }
    $output = array(
        "draw" =>intval(@$_POST["draw"]),
        "recordsTotal"=>$this->Cluster_model->get_all_data_msisdn(),
        "recordsFiltered" =>$this->Cluster_model->get_filtered_msisdn(),
        "data" => $data
    );
    echo json_encode($output);
    }
    function konfirmasi($msisdn){
        $data['judul'] ="Cluster";
        $data = $this->db->get_where('tb_user',['nama' => $this->session->userdata('nama')]) ->row_array();
        $s = $this->db->query("SELECT dikonfirm FROM tb_pmasuk where msisdn='".$msisdn."'")->num_rows();
    
        if($s != 0){
            $this->db->query("UPDATE tb_pmasuk SET dikonfirm'".$s."'");
            redirect('Cluster/sukses');
            }else{
                echo 'gagal terkonfirmasi';
            }
    }

    function sukses(){
        $this->load->view("templates/aheader");
        $this->load->view("templates/csidebar");
        $this->load->view("cluster/sukses");
        $this->load->view("templates/afooter");       
    }

}
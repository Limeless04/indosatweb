<?php
defined('BASEPATH') OR exit('No direct script access allowed');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Region extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model("Region_model");
        $this->load->library('upload');
        $this->load->library('email');
        if($this->session->userdata('id_role')!=1){
            redirect('Auth');
        }

    }

    public function index(){
        $data['judul'] ="Region";
        $data['heading'] = "Dashboard";
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");
        $dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM tb_visitor")->row(); 
        
        $pengunjunghariini  = $this->db->query("SELECT * FROM tb_visitor WHERE date='".$date."' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
        $totalpengunjung = isset($dbpengunjung->hits)?($dbpengunjung->hits):0; // hitung total pengunjung
        
        $bataswaktu = time() - 300;
        
        $pengunjungonline  = $this->db->query("SELECT * FROM tb_visitor WHERE online > '".$bataswaktu."'")->num_rows(); // hitung pengunjung online
        
        $data['visitortoday']=$pengunjunghariini;
        $data['totalvisitor']=$totalpengunjung;
        $data['onlinevisitor']=$pengunjungonline;
        $this->load->view("templates/aheader",$data);
        $this->load->view("templates/asidebar");
        $this->load->view("region/index",$data);
        $this->load->view("templates/afooter");
    }

    public function report(){
        $data['judul'] ="Region";
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
        $data['judul'] ="Region";
        $data["heading"] ="Produk";
        $data["produk"] =$this->Region_model->getAllDataProduk();
        $this->load->view("templates/aheader",$data);
        $this->load->view("templates/asidebar");
        $this->load->view("region/produk",$data);
        $this->load->view("templates/afooter");
    }  
    public function pic(){
        $data['judul'] ="Region";
        $data['heading'] = 'Data Akun Region';
        $user = $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
        $data['userRegion'] = $this->Region_model->getDataByPropinsi();
        $this->load->view("templates/aheader",$data);
        $this->load->view("templates/asidebar");
        $this->load->view("region/pic",$data);
        $this->load->view("templates/afooter");
    }
    public function pushReport(){
        $data['judul'] ="Region";
        $this->load->view("templates/aheader",$data);
        $this->load->view("templates/asidebar");
        $this->load->view("region/pushReport",$data);
        $this->load->view("templates/afooter");
    }

    function ExportExcelMonth(){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $data = $this->Region_model->getAllReportBulanIni();
        // var_dump($data);die;
        $sheet->setCellValue('A1','Nama Pelanggan');
        $sheet->setCellValue('B1','Nomor Wa');
        $sheet->setCellValue('C1','Email');
        $sheet->setCellValue('D1','Alamat Rumah');
        $sheet->setCellValue('E1','Produk');
        $sheet->setCellValue('F1','Cluster');
        $sheet->setCellValue('G1','MSISDN');
        $sheet->setCellValue('H1','Status');
        $sheet->setCellValue('I1','Keterangan');
        $sheet->setCellValue('J1','dibuat');
        $sheet->setCellValue('K1','Dikonfirm');
        $sheet->setCellValue('L1','kode_gan');
        $sheet->setCellValue('M1','hadiah');

        $i = 2;
        foreach($data as $d){
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$i,$d['nama_pelanggan'])->setCellValue('B'.$i,$d['no_wa'])->setCellValue('C'.$i,$d['email'])->setCellValue('D'.$i,$d['alamat_rumah'])->setCellValue('E'.$i,$d['produk'])->setCellValue('F'.$i,$d['cluster'])->setCellValue('G'.$i,$d['msisdn'])->setCellValue('H'.$i,$d['status'])->setCellValue('I'.$i,$d['ket'])->setCellValue('J'.$i,$d['dibuat'])->setCellValue('K'.$i,$d['dikonfirm'])->setCellValue('L'.$i,$d['kode_gan'])->setCellValue('M'.$i,$d['hadiah']);
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        date_default_timezone_set("Asia/Jakarta");
        $filename='reportOrder '.date("m-d-y");

        header('Content-Type:application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control:max-age=0');

        $writer->save('php://output');
    }
    function ExportExcelAll(){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $data = $this->Region_model->getAllReport();
        // var_dump($data);die;
        $sheet->setCellValue('A1','Nama Pelanggan');
        $sheet->setCellValue('B1','Nomor Wa');
        $sheet->setCellValue('C1','Email');
        $sheet->setCellValue('D1','Alamat Rumah');
        $sheet->setCellValue('E1','Produk');
        $sheet->setCellValue('F1','Cluster');
        $sheet->setCellValue('G1','MSISDN');
        $sheet->setCellValue('H1','Status');
        $sheet->setCellValue('I1','Keterangan');
        $sheet->setCellValue('J1','dibuat');
        $sheet->setCellValue('K1','Dikonfirm');
        $sheet->setCellValue('L1','kode_gan');
        $sheet->setCellValue('M1','hadiah');

        $i = 2;
        foreach($data as $d){
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$i,$d['nama_pelanggan'])->setCellValue('B'.$i,$d['no_wa'])->setCellValue('C'.$i,$d['email'])->setCellValue('D'.$i,$d['alamat_rumah'])->setCellValue('E'.$i,$d['produk'])->setCellValue('F'.$i,$d['cluster'])->setCellValue('G'.$i,$d['msisdn'])->setCellValue('H'.$i,$d['status'])->setCellValue('I'.$i,$d['ket'])->setCellValue('J'.$i,$d['dibuat'])->setCellValue('K'.$i,$d['dikonfirm'])->setCellValue('L'.$i,$d['kode_gan'])->setCellValue('M'.$i,$d['hadiah']);
            $i++;
        }
        $writer = new Xlsx($spreadsheet);
        date_default_timezone_set("Asia/Jakarta");
        $filename='reportAllOrder '.date("m-d-y");
        header('Content-Type:application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control:max-age=0');
        $writer->save("php://output");
    }
    function ExportExcelJawaban(){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $data = $this->Region_model->getAllJawaban();
        // var_dump($data);die;
        $sheet->setCellValue('A1','Nama Penjawab');
        $sheet->setCellValue('B1','Nomor Hp');
        $sheet->setCellValue('C1','Kabupaten/kota');
        $sheet->setCellValue('D1','Akun Fb');
        $sheet->setCellValue('E1','Jawaban');
        $i = 2;
        foreach($data as $d){
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$i,$d['nama'])->setCellValue('B'.$i,$d['no_hp'])->setCellValue('C'.$i,$d['kab_kota'])->setCellValue('D'.$i,$d['akun_fb'])->setCellValue('E'.$i,$d['jawaban']);
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        date_default_timezone_set("Asia/Jakarta");
        $filename='reportJawaban '.date("m-d-y");
        header('Content-Type:application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        header('Cache-Control:max-age=0');

        $writer->save('php://output');
    }
    
    function do_upload(){
        $config['upload_path']          = './assets/uploads/';
        $config['allowed_types']        = 'xlsx|xls';
        $config['max_size']             = 40000;
        $config['overwrite']             = TRUE;
        $this->upload->initialize($config);
        $data['judul'] ="Region";
        $to_email = $this->Region_model->getEmail();
         if (!$this->upload->do_upload('report'))
         {
                 $error = array('error' => $this->upload->display_errors());
                 $this->load->view("templates/aheader",$data);
                 $this->load->view("templates/asidebar");
                 $this->load->view("region/sendReport",$error);
                 $this->load->view("templates/afooter");
         }
         else
         {
             foreach($to_email as $e){
                $this->sendEmailToPic($e);
            }
                 $this->load->view("templates/aheader",$data);
                 $this->load->view("templates/asidebar");
                 $this->load->view("region/pushReport",$data);
                 $this->load->view("templates/afooter");
         }
        //  redirect('region/produk');
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
        $from_email = "belim3ooredo@gmail.com";//email default
        $nama = $this->input->post('nama_pelanggan',true);
        $no_wa = $this->input->post('nomor_wa',true);
        $email = $this->input->post('email',true);
        $alamat= $this->input->post('alamat_rumah',true);
        $produk = $this->input->post('produk',true);
        $msisdn = $this->input->post('msisdn',true);
        date_default_timezone_set("Asia/Jakarta");
        $date = date('d-m-Y');
        $time  = date('H:i:s'); 
        $htmlContent = "Report Bulanan Orderan Bulan ".data("M");
        $data = $this->upload->data();
        //Load email library
        $this->email->from($from_email, 'Report Bulanan');
        $this->email->to($e);
        $this->email->subject('New Order');
        $this->email->message($htmlContent);
        $this->email->attach("./assets/uploads/".$data["file_name"]);
        //Send mail
        if(!$this->email->send()){
            show_error($this->email->print_debugger());
        }
    }
    
    public function createProduk(){
        $data['judul'] ="Region";
        $this->form_validation->set_rules('nama_produk','Nama Produk','required');
        $this->form_validation->set_rules('harga','Harga','required');
        $this->form_validation->set_rules('desc_produk','Deskripsi','required');
        $this->form_validation->set_rules('url_video','Url Video','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view("templates/aheader",$data);
            $this->load->view("templates/asidebar");
            $this->load->view("region/createProduk");
            $this->load->view("templates/afooter");
        }else{
            // $data=$this->input->post();
            // var_dump($data);die;
        $this->do_upload_img();
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Berhasil ditambahkan
        </div>');
        redirect('region/produk');
    }
}

public function do_upload_img()
{
    $config['upload_path']          = './assets/img/produk/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 10024;
    $config['max_width']            = 6000;
    $config['overwrite']            = TRUE;
    $config['max_height']           = 6000;
    $this->upload->initialize($config);
    if ($this->upload->do_upload('userfile'))
    {
    $data = array('upload_data' => $this->upload->data());
    $this->Region_model->tambahProdukBaru($data);
        redirect('Region/produk');
    }
     else
     {
      $error = array('error' => $this->upload->display_errors());
      $this->load->view("templates/aheader");
      $this->load->view("templates/asidebar");
      $this->load->view("region/createProduk",$error);
      $this->load->view("templates/afooter");

      }
    }

    public function hapusProduk($id){
        $this->Region_model->hapusProduk($id);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert">
        Berhasil dihapus
        </div>');
        redirect('region/produk');
    }


    public function tambahUser(){
        $data['judul'] ="Region";
        if(!$this->session->userdata('email')){
            redirect('Auth');
        }
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[tb_user.email]');
        $this->form_validation->set_rules('cluster','Cluster','required');
        $this->form_validation->set_rules('propinsi','Propinsi','required');
        $this->form_validation->set_rules('role','Role','required');
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
    public function hapusUserRegion($id){
        $this->Region_model->hapusUserRegion($id);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert">
        Berhasil dihapus
        </div>');
        redirect('Region/pic');
    }

    public function hadiah(){
        $data['judul'] = 'Region';
        $data['hadiah'] = $this->Region_model->getAllHadiah();
        $this->load->view('templates/aheader',$data);
        $this->load->view('templates/asidebar');
        $this->load->view('region/hadiah',$data);
        $this->load->view('templates/afooter');
    }

    public function hapusHadiah($id){
        $this->Region_model->hapusDataHadiah($id);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert">
        Berhasil dihapus
        </div>');
        redirect('Region/hadiah');
    }

    public function tambahHadiah(){
        if(!$this->session->userdata('email')){
            redirect('Auth');
        }
        $this->form_validation->set_rules('nama_hadiah','Nama Hadiah','required|trim');
        $this->form_validation->set_rules('kuota','Kuota','required');
        if($this->form_validation->run()==FALSE){
        $data['judul']='Tambah hadiah';
        $this->load->view('templates/aheader',$data);
        $this->load->view('templates/asidebar',$data);
        $this->load->view('region/tambahHadiah');
        $this->load->view('templates/afooter');
        }else{
        $this->do_upload_img_hadiah();
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert">
        Hadiah bari Berhasil ditambahkan!
        </div>');
        redirect('Region/hadiah');
        }
    }

    public function do_upload_img_hadiah()
    {
    $config['upload_path']          = './assets/img/hadiah/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 10024;
    $config['overwrite']            = TRUE;
    $config['max_width']            = 6000;
    $config['max_height']           = 6000;
    $this->upload->initialize($config);
    if ($this->upload->do_upload('userfile'))
    {
    $data = array('upload_data' => $this->upload->data());
    $this->Region_model->tambahDataHadiah($data);
        redirect('Region/Hadiah');
    }
     else
     {
      $error = array('error' => $this->upload->display_errors());
      $this->load->view("templates/aheader");
      $this->load->view("templates/asidebar");
      $this->load->view("region/tambahHadiah",$error);
      $this->load->view("templates/afooter");
      }
    }

    public function logOut(){
        $this->session->sess_destroy();
        $this->session->set_flashdata('logOut','<div class="alert alert-danger" role="alert">
        Anda berhasil keluar!</div>');
        redirect('Auth');
    }

    function get_cluster(){
        $propinsi= $this->input->post("propinsi");
        $cluster = $this->Region_model->getCluster($propinsi); 
        echo json_encode($cluster);// konversi varibael $callback menjadi JSON
    }

    function getReport(){
        $getReport = $this->Region_model->make_datatables();
        $getReportS = $this->Region_model->make_datatables_sukses();
        $getReportR = $this->Region_model->make_datatables_reject();
        $getReportP = $this->Region_model->make_datatables_progress();
        $data = array();
        foreach($getReport as $row){
        $sub_array = array();
        $sub_array[] = $row->cluster;
        $sub_array[] = $row->order;
        if(empty($getReportS)){
            $sub_array[]="kosong";
        }else{
            foreach($getReportS as $row){
                $sub_array[] = $row->sukses;
            }
        }
        if(empty($getReportR)){
            $sub_array[]="kosong";
        }else{
            foreach($getReportR as $row){
                $sub_array[]=$row->reject;
            }
        }if(empty($getReportP)){
            $sub_array[]="kosong";            
        }else{
            foreach($getReportP as $row){
                $sub_array[]=$row->progress;
            }
        }
        $data[]=$sub_array;

        }
    $output = array(
        "draw" =>intval(@$_POST["draw"]),
        "recordsTotal"=>$this->Region_model->get_all_data(),
        "recordsFiltered" =>$this->Region_model->get_filtered(),
        "data" => $data
    );
    echo json_encode($output);
    }

    function contacts(){
        $data['judul'] = 'Region';
        $data['alamat'] = $this->Region_model->getContacts();
        $this->load->view("templates/aheader",$data);
        $this->load->view("templates/asidebar");
        $this->load->view("region/contact",$data);
        $this->load->view("templates/afooter");
    }
    function editContacts($id){
        $data['judul'] ="Region";
        $data['alamat'] = $this->Region_model->getContactsById($id);
        $this->form_validation->set_rules('alamat','Alamat','required');
        if($this->form_validation->run() == FALSE){
            $this->load->view("templates/aheader",$data);
            $this->load->view("templates/asidebar");
            $this->load->view("region/editContact",$data);
            $this->load->view("templates/afooter");
        }else{
            // $data=$this->input->post();
            // var_dump($data);die;
            $this->Region_model->editDataContact($id);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
            Berhasil diedit!
            </div>');
            redirect('Cluster/email');
        }
    }
    public function editUser($id){
        $data['judul'] ="Region";
        $data['user'] = $this->db->get_where('tb_user',['id' => $id]) ->row_array();
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
            $this->load->view("templates/asidebar");
            $this->load->view("region/editUser",$data);
            $this->load->view("templates/afooter");
        }else{
            // $data=$this->input->post();
            // var_dump($data);die;
            $this->Region_model->editUserPass($id);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
            Berhasil diedit! Untuk Melihat Perubahan Silahkan Login Ulang.
            </div>');
            redirect('Region/pic');
        }
    }

}


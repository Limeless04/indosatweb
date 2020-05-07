<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Home_model');
    }
	public function index()
	{
		$data['judul'] = 'BeliIm3';
		date_default_timezone_set("Asia/Jakarta");
		$ip = $this->input->ip_address();
		$date = date("Y-m-d");
		$waktu = time();
		$timeinsert = date("Y-m-d H:i:s");

	    $s = $this->db->query("SELECT* FROM tb_visitor where ip='".$ip."'And date='".$date."'")->num_rows();
   		 $ss = isset($s)?($s):0;

	    if($ss == 0){
        $this->db->query("INSERT INTO tb_visitor(ip, date, hits, online, time) VALUES('".$ip."','".$date."','1','".$waktu."','".$timeinsert."')");
        }
         
        // Jika sudah ada, update
        else{
        $this->db->query("UPDATE tb_visitor SET hits=hits+1, online='".$waktu."' WHERE ip='".$ip."' AND date='".$date."'");
        }

		$this->load->view('templates/header',$data);
		$this->load->view('home/index',$data);
		$this->load->view('templates/footer');
	}

	public function produk(){
		$data['judul'] ='Produk';
		$data['produk']= $this->Home_model->getAllProduk();
		$this->load->view('templates/header',$data);
		$this->load->view('home/produk',$data);
		$this->load->view('templates/footer');
	}
	public function contacts(){
		$data['judul'] = 'Contacts';
		$data['alamat'] = $this->Home_model->getContacts();
		$this->load->view('templates/header',$data);
		$this->load->view('home/contact',$data);
		$this->load->view('templates/footer');
	}
	function get_produk(){
		$nama= $this->input->post('nama_produk');
		$produk = $this->Home_model->getProduk($nama);       
		// var_dump($produk);
		// var_dump($id);
		echo json_encode($produk);// konversi varibael $callback menjadi JSON
	}
}

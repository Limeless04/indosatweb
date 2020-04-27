<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class region extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->helper(array('form', 'url'));

    }

    public function index(){
    $this->load->view("templates/aheader");
    $this->load->view("templates/asidebar");
    $this->load->view("region/index");
    $this->load->view("templates/afooter");
    }

    public function report(){
        $this->load->view("templates/aheader");
        $this->load->view("templates/asidebar");
        $this->load->view("region/report");
        $this->load->view("templates/afooter");
    }
    public function crudProduk(){
        $this->load->view("templates/aheader");
        $this->load->view("templates/asidebar");
        $this->load->view("region/crudProduk");
        $this->load->view("templates/afooter");
    }  
    public function pic(){
        $this->load->view("templates/aheader");
        $this->load->view("templates/asidebar");
        $this->load->view("region/pic");
        $this->load->view("templates/afooter");
    }
    public function pushEmail(){
        $this->load->view("templates/aheader");
        $this->load->view("templates/asidebar");
        $this->load->view("region/pushEmail");
        $this->load->view("templates/afooter");
    }
}


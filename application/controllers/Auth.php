<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
        
    }

    public function index(){
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        $data['judul'] = 'Login';
        if($this->form_validation->run()==FALSE){
        $this->load->view('auth/login',$data);
        } else{
            // validasi successs
            $this->_login(); 
        }
    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tb_user',['email'=>$email])->row_array();
        //jika usernya ad
        if($user){
            if($user['id_role']==1){
                if(password_verify($password,$user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'id_role' => $user['id_role'],
                        'propinsi'=> $user['propinsi'],
                        'cluster' =>$user['cluster']
                    ];
                    $this->session->set_userdata($data);
                    redirect('Region');
                }else{
                    $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert">
                    Password salah!
                    </div>');
                    redirect('Auth');
                }
            }elseif($user['id_role']==2){
                if(password_verify($password,$user['password'])){
                    $data = [
                        'email' => $user['email'],
                        'id_role' => $user['id_role'],
                        'propinsi'=> $user['propinsi'],
                        'cluster' =>$user['cluster']
                    ];
                    $this->session->set_userdata($data);
                    redirect('Cluster');
                }else{
                    $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert">
                    Password salah!
                    </div>');
                    redirect('Auth');
                }
            }else{
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert">
                User Tidak memiliki role!
                </div>');           
                redirect('Auth');
            }
        }
        else{
        $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert">
        Email tidak terdaftar!
        </div>');
        redirect('Auth');
        }
    }             
    
    
    public function daftar(){
        if(!$this->session->userdata('email')){
            redirect('auth');
        }
        $this->form_validation->set_rules('fullname','Name','required|trim');
        $this->form_validation->set_rules('mcc_id','MCC ID','required|trim|is_unique[user.mcc_id]');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','Password','required|trim|min_length[8]|matches[password2]',[
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
            ]);
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password]',[
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
            ]);
        if($this->form_validation->run()==FALSE){
        $data['judul']='Daftar';
        $this->load->view('templates/auth_header',$data);
        $this->load->view('auth/daftar');
        $this->load->view('templates/auth_footer');
        }else{
        $this->Auth_model->tambahdata();
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert">
        Akunmu berhasil ditambahkan!
        </div>');
        redirect('auth');
        }
    }

}
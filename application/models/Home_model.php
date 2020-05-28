<?php

class Home_model extends CI_model{

    function getProduk($nama){    
            $this->db->where('id',$nama);
            $query = $this->db->get('tb_produk');
            return $query->result_array();
    }
    function getAllProduk(){
        return $this->db->get('tb_produk')->result_array();
    }
    function getContacts(){
        return $this->db->get('tb_contacts')->result_array();
    }
    function jawabanQuiz(){
        $data=[
            'nama' => $this->input->post('nama_penjawab',true),
            'no_hp' => $this->input->post('no_hp',true),
            'kab_kota' => $this->input->post('kab_kota',true),
            'akun_fb' => $this->input->post('akun_fb',true),
            'jawaban' =>$this->input->post('jawaban',true)
        ];        
        $this->db->insert("tb_quiz",$data);
    }
}
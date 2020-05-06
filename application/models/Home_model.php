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
}
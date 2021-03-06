<?php
class Beli_model extends CI_model{

public function pesananBaru(){
    $this->load->helper('string');

    date_default_timezone_set("Asia/Jakarta");
    $data = $this->session->userdata('input1');
    if($data['msisdn'] == "bebas"){
        $data=[
            'nama_pelanggan' => $this->input->post('nama_pelanggan',true),
            'no_wa' => $this->input->post('nomor_wa',true),
            'email' => $this->input->post('email',true),
            'alamat_rumah' => $this->input->post('alamat_rumah',true),
            'produk' => $data["produk"],
            'cluster' => $data["depo"],
            'msisdn' => random_string('basic',10),
            'status' => "progress",
            'dibuat' => date("d-m-y H:i"),
            'kode_gan' => random_string('alnum',5)
        ];        
    }else{
            $data=[
             'nama_pelanggan' => $this->input->post('nama_pelanggan',true),
             'no_wa' => $this->input->post('nomor_wa',true),
             'email' => $this->input->post('email',true),
             'alamat_rumah' => $this->input->post('alamat_rumah',true),
             'produk' => $data["produk"],
             'cluster' => $data["depo"],
             'msisdn' => $data["msisdn"],
             'status' => "progress",
             'dibuat' => date("d-m-y H:i"),
             'kode_gan' => random_string('alnum',5)
         ];
    }
 $this->db->insert("tb_pmasuk",$data);
}
public function getAllDataProduk(){
    $this->db->order_by('dibuat',"asc");
    $query= $this->db->get('tb_produk');
    return $query->result_array();
}
public function getAllDataCluster(){
    $this->db->order_by('propinsi',"asc");
    $query= $this->db->get('tb_cluster');
    return $query->result_array();
}


function getMsisdn($depo,$produk){    
    $this->db->where('cluster',$depo);
    $this->db->where('nama_produk',$produk);
    $query = $this->db->get('tb_msisdn');
    return $query->result_array();
}
public function hapusMsisdn($msisdn){
 $this->db->where('msisdn',$msisdn);
 $this->db->delete('tb_msisdn');
}

function getEmail(){
    $data = $this->session->userdata('input1');
    return $this->db->where('id_role',2)->where('cluster',$data['depo'])->get('tb_user')->result_array();
}

function getMsisdnMail(){
    $data = $this->session->userdata('input1');
    $mail = [
        'msisdn' => $data['msisdn']
    ];
    $this->db->select('msisdn');
    $this->db->where($mail);
    $query = $this->db->get('tb_pmasuk');
    return $query->row_array();
}
}
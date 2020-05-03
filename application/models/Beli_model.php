<?php
class Beli_model extends CI_model{

public function pesananBaru(){
    date_default_timezone_set("Asia/Jakarta");
    $data = $this->session->userdata('input1');
    $data=[
     'nama_pelanggan' => $this->input->post('nama_pelanggan',true),
     'no_wa' => $this->input->post('nomor_wa',true),
     'email' => $this->input->post('email',true),
     'alamat_rumah' => $this->input->post('alamat_rumah',true),
     'produk' => $data["produk"],
     'cluster' => $data["depo"],
     'msisdn' => $data["msisdn"],
     'status' => "progress",
     'dibuat' => date("d-m-y H:i")
 ];
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


function getMsisdn($depo){
    $data=[
        'cluster' => $depo,
    ];    
    $this->db->where($data);
    $query = $this->db->get('tb_msisdn');
    return $query->result_array();
}
public function hapusMsisdn($msisdn){
 $this->db->where('msisdn',$msisdn);
 $this->db->delete('tb_msisdn');
}

function getEmail(){
    return $this->db->select('email')->where('id_role=2')->get('tb_user')->result_array();
}
}
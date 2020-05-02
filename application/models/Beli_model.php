<?php
class Beli_model extends CI_model{

public function pesananBaru(){
    date_default_timezone_set("Asia/Jakarta");
 $data=[
     'nama_pelanggan' => $this->input->post('nama_pelanggan',true),
     'no_wa' => $this->input->post('nomor_wa',true),
     'email' => $this->input->post('email',true),
     'alamat_rumah' => $this->input->post('alamat_rumah',true),
     'produk' => $this->input->post('produk',true),
     'cluster' => $this->input->post('depo',true),
     'produk' => $this->input->post('produk',true),
     'msisdn' => $this->input->post('msisdn',true),
     'pending' => $this->input->post('pending',true),
     
     'dibuat' => date()
 ];   
 $this->db->insert("tb_pmasuk",$data);
//  $lastId = $this->db->insert_id();
//  $query = $this->db->get('tb_msisdn')->result_array();
//  $this->db->set('id_msisdn',$query['id']); 
//  $this->db->where('id',$lastId);
//  $this->db->where('depo',$query['cluster']);
//  $this->db->where('msisdn',$query['msisdn']);
//  $this->db->update('tb_pmasuk');
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

// function getMsisdnById(){
//     $id=$this->db->insert_id();
//     $this->db->get('tb_pmasuk');
//     return $id;
// }
function getMsisdn($cluster){
    $this->db->where('cluster',$cluster);
    $query = $this->db->get('tb_msisdn');
    return $query->result_array();

}
public function hapusMsisdn($msisdn){
 $this->db->where('msisdn',$msisdn);
 $this->db->delete('tb_msisdn');
}

function getEmail(){
    return $this->db->select('email')->where('id_role=1')->get('tb_user')->result_array();
}
}
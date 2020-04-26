<?php
class Beli_model extends CI_model{

public function pesananBaru(){
 $data=[
     'nama_pelanggan' => $this->input->post('nama_pelanggan',true),
     'no_wa' => $this->input->post('nomor_wa',true),
     'email' => $this->input->post('email',true),
     'alamat_rumah' => $this->input->post('alamat_rumah',true),
     'produk' => $this->input->post('produk',true),
     'depo' => $this->input->post('depo',true),
     'produk' => $this->input->post('produk',true),
     'msisdn' => $this->input->post('msisdn',true)
 ];   
 $this->db->insert("tb_pmasuk",$data);
}

}
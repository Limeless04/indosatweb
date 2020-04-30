<?php

class Cluster_model extends CI_model{

public function countMsisdn(){
        $count = $this->db->count_all('tb_msisdn');
        if($count<10){
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert">
            Stock MSISDN kurang dari 10, Silahkan Melakukan re-stock</div>');
        }       

    }
    public function getDataByPropinsi($user){
        $this->db->select('*');
        $this->db->where('propinsi',$user['propinsi']);
        $this->db->where('cluster',$user['cluster']);
        $query = $this->db->get('tb_user');
        return $query->result_array();
    }
public function tambahMsisdnBaru(){
        $data=[
            'msisdn' => $this->input->post('msisdn',true),
        ];   
        $this->db->insert("tb_msisdn",$data);
    }

    function getAllReportData(){
        $this->datatables->select("nama_pelanggan,no_wa,produk,msisdn");
        $this->datatables->from("tb_pmasuk");
        // $this->datatables->add_column('')
        return $this->datatables->generate();
    }

    function getCluster($propinsi){
        $this->db->where('propinsi',$propinsi);
        $query = $this->db->get('tb_cluster');
        return $query->result_array();
    
    }
    function getMsisdn($cluster){
    $this->db->where('cluster',$cluster);
    $query = $this->db->get('tb_cluster');
    return $query->result_array();
    }
    function getReport($user){
        $this->db->where('depo',$user['cluster']);
        $query = $this->db->get('tb_pmasuk');
        return $query->result_array();
    }

    public function tambahDataUserCluster(){
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama',true)),
            'email' => htmlspecialchars($this->input->post('email',true)),
            'propinsi' => NULL,
            'password' => password_hash('1234abcd',PASSWORD_DEFAULT),
            'id_role' => '2',
            'cluster' => htmlspecialchars($this->input->post('cluster',true)),
            'dibuat' => date("Y-m-d H:i:s")
        ];
        $this->db->insert('tb_user',$data);
    }

}
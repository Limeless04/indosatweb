<?php
class Region_model extends CI_model{
    // var $table = "Report";
    // var $column_order = [null,'cluster','order','sukses','reject','progress'];
    // var $column_search = ['cluster','order','sukses','reject','progress'];
    // var $order = ['id' =>'asc'];
    // public function getDataReportBulanIni(){      
    //     $this->db->select("*,count(nama_pelanggan),count(sukses),count(reject),count(pending)");
    //     $this->db->where("MONTH(dibuat)",date('m'));
    //     $this->db->where("YEAR(dibuat)",date('Y'));
    //     $this->db->group_by('depo');    
    //     $this->db->order_by('dibuat','asc');
    //     $query= $this->db->get('tb_pmasuk');
    //     return $query->result_array();        
    // }
    // public function getDataReportBulanLalu(){
    //     $this->db->select("*,count(nama_pelanggan),count(sukses),count(reject),count(pending)"); 
    //     $this->db->where("MONTH(dibuat)",date('m',strtotime("-30 days")));
    //     $this->db->where("YEAR(dibuat)",date('y'));
    //     $this->db->group_by('depo');
    //     $this->db->order_by('dibuat','asc');
    //     $query= $this->db->get('tb_pmasuk');
    //     return $query->result_array();       
    // }
    // public function getAllDataReport(){
    //     $this->db->select("*,count(nama_pelanggan),count(sukses),count(reject),count(pending)"); 
    //     $this->db->group_by('depo');
    //     $this->db->order_by('dibuat','asc');
    //     $query= $this->db->get('tb_pmasuk');
    //     return $query->result_array();       
    // }
    public function getDataByPropinsi($user){
        $this->db->select('*');
        $this->db->where('propinsi',$user['propinsi']);
        $this->db->where('cluster',$user['cluster']);
        $query = $this->db->get('tb_user');
        return $query->result_array();
    }

    public function tambahProdukBaru(){
        $data=[
            'nama_produk' => $this->input->post('nama_produk',true),
            'harga' => $this->input->post('harga',true),
            'deskripsi' => $this->input->post('desc_produk',true),
        ];   
        $this->db->insert("tb_produk",$data);
    }

    public function getAllDataProduk(){
        $this->db->order_by('dibuat','asc');
        $query= $this->db->get('tb_produk');
        return $query->result_array();
    }

    Public function editProduk($id){
        $data=[
            'id'=>$id,
            'nama_produk'=> $this->input->post('nama_produk',true),
            'harga' => $this->input->post('harga',true),
            'deskripsi' => $this->input->post('desc_produk',true),
            'dibuat' => time(),
        ];
        $this->db->where('id',$id);
        $this->db->replace('tb_produk',$data);
    }
    Public function editUserRegion($id){
        $data=[
            'nama' => htmlspecialchars($this->input->post('nama',true)),
            'email' => htmlspecialchars($this->input->post('email',true)),
            'password' => password_hash($this->input->post('password',true),PASSWORD_DEFAULT),
        ];
        $this->db->where('id',$id);
        $this->db->update('tb_user',$data);
    }
    Public function hapusProduk($id){
        $data = [
            'id' => $id
        ];
        $this->db->where($data);
        $this->db->delete('tb_produk');
    }

    Public function hapusUserRegion($id){
        $data = [
            'id' => $id
        ];
        $this->db->where($data);
        $this->db->delete('tb_user');
    }

    public function tambahDataUserRegion(){
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama',true)),
            'email' => htmlspecialchars($this->input->post('email',true)),
            'propinsi' => htmlspecialchars($this->input->post('propinsi',true)),
            'password' => password_hash('1234abcd',PASSWORD_DEFAULT),
            'id_role' => '1',
            'cluster' => htmlspecialchars($this->input->post('cluster',true)),
            'dibuat' => date("Y-m-d H:i:s")
        ];
        $this->db->insert('tb_user',$data);
    }
    function getCluster($propinsi){
        $this->db->where('propinsi',$propinsi);
        $query = $this->db->get('tb_cluster');
        return $query->result_array();
    
    }
}
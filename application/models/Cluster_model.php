<?php

class Cluster_model extends CI_model{
    var $table = "tb_pmasuk";
    var $select_order = ['nama_pelanggan','no_wa','alamat_rumah','produk','msisdn','cluster','status','MONTH(NOW())'];
    var $select_column = ['nama_pelanggan','no_wa','cluster','dibuat','msisdn','alamat_rumah','id','produk','status'];
public function countMsisdn(){
        $count = $this->db->count_all('tb_msisdn');
        if($count<10){
            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert">
            Stock MSISDN kurang dari 10, Silahkan Melakukan re-stock</div>');
        }       

    }

   function make_query(){
       $user= $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
       $this->db->select($this->select_column);
       $this->db->where("cluster",$user['cluster']);
       $this->db->from($this->table);
       if(@$_POST["search"]["value"]){
           $this->db->like("nama_pelanggan",@$_POST["search"]["value"]);
           $this->db->or_like("no_wa",@$_POST["search"]["value"]);
           $this->db->or_like("msisdn",@$_POST["search"]["value"]);
           $this->db->or_like("produk",@$_POST["search"]["value"]);
           $this->db->or_like("dibuat",@$_POST["search"]["value"]);
           $this->db->or_like("alamat_rumah",@$_POST["search"]["value"]);
           $this->db->or_like("status",@$_POST["search"]["value"]);
        }
       if(@$_POST["order"]){
           $this->db->order_by($this->select_order[@$_POST['order']['0']['column']],@$_POST['order']['0']['dir']);
       }else{
           $this->db->order_by("id","DESC");
       }
   }

   function make_datatables(){
       $this->make_query();
       if(@$_POST["length"]!=-1)
       {
           $this->db->limit(@$_POST["length"],@$_POST["start"]);
       }
       $query = $this->db->get();
       return $query->result();
   }

   function get_filtered(){
       $this->make_query();
       $query = $this->db->get();
       return $query->num_rows();
   }
function get_all_data(){
   $this->db->select("*");
   $this->db->from($this->table);
   return $this->db->count_all_results();
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
    function getReport(){
        $user= $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
        $this->datatables->select("nama_pelanggan,no_wa,produk,msisdn");
        // $this->datatables->filter("nama_pelanggan,no_wa,produk,msisdn");
        $this->datatables->where("depo",$user['cluster']);
        $this->datatables->from("tb_pmasuk");
        return $this->datatables->generate();
    }

    public function tambahDataUserCluster(){
        date_default_timezone_set("Asia/Jakarta");
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama',true)),
            'email' => htmlspecialchars($this->input->post('email',true)),
            'propinsi' => htmlspecialchars($this->input->post('propinsi',true)),
            'password' => password_hash('1234abcd',PASSWORD_DEFAULT),
            'id_role' => '2',
            'cluster' => htmlspecialchars($this->input->post('cluster',true)),
            'dibuat' => date("Y-m-d H:i:s")
        ];
        $this->db->insert('tb_user',$data);
    }
    
    Public function editUserCluster($id){
        $data=[
            'nama' => htmlspecialchars($this->input->post('nama',true)),
            'email' => htmlspecialchars($this->input->post('email',true)),
            'password' => password_hash($this->input->post('password',true),PASSWORD_DEFAULT),
        ];
        $this->db->where('id',$id);
        $this->db->update('tb_user',$data);
    }
    Public function hapusUserCluster($id){
        $data = [
            'id' => $id
        ];
        $this->db->where($data);
        $this->db->delete('tb_user');
    }
    Public function hapusMsisdn($id){
        $data = [
            'id' => $id
        ];
        $this->db->where($data);
        $this->db->delete('tb_msisdn');
    }

    function getDataById($id){
        return $this->db->get_where('tb_pmasuk',['id'=>$id])->row_array();
    }
    function editClusterStatus($id){
        $data =[
            'status'=>$this->input->post('status')
        ];
        $this->db->where('id',$id);
        $this->db->update('tb_pmasuk',$data);
    }
    function editDataPelanggan($id){
        $data =[
            'nama_pelanggan'=>$this->input->post('nama'),
            'no_wa'=>$this->input->post('no_wa'),
            'email'=>$this->input->post('email'),
            'alamat_rumah'=>$this->input->post('alamat_rumah'),
            'cluster'=>$this->input->post('depo'),
        ];
        $this->db->where('id',$id);
        $this->db->update('tb_pmasuk',$data);
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

    //msisdn
    var $select_order_msisdn = ['msisdn'];
    function make_query_msisdn(){
        $user= $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
        $this->db->select("*");
        $this->db->where("cluster",$user['cluster']);
        $this->db->from("tb_msisdn");
        if(@$_POST["search"]["value"]){
            $this->db->like("msisdn",@$_POST["search"]["value"]);
            $this->db->or_like("cluster",@$_POST["search"]["value"]);         }
        if(@$_POST["order"]){
            $this->db->order_by($this->select_order[@$_POST['order']['0']['column']],@$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by("id","DESC");
        }
    }
 
    function make_datatables_msisdn(){
        $this->make_query_msisdn();
        if(@$_POST["length"]!=-1)
        {
            $this->db->limit(@$_POST["length"],@$_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }
 
    function get_filtered_msisdn(){
        $this->make_query_msisdn();
        $query = $this->db->get();
        return $query->num_rows();
    }
 function get_all_data_msisdn(){
     $user= $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
    $this->db->select("*");
    $this->db->where("cluster",$user['cluster']);
    $this->db->from("tb_msisdn");
    return $this->db->count_all_results();
 }


}
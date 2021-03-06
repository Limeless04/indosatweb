<?php
class Region_model extends CI_model{
     var $table = "tb_pmasuk,tb_cluster";
     var $select_order = [null,'nama_pelanggan','no_wa','msisdn',null,null];
     var $select_column = ['tb_pmasuk.nama_pelanggan','tb_pmasuk.no_wa','tb_pmasuk.cluster','tb_pmasuk.dibuat','tb_pmasuk.status','tb_pmasuk.msisdn','tb_pmasuk.alamat_rumah','tb_pmasuk.id','tb_pmasuk.produk','tb_cluster.propinsi','tb_cluster.cluster','COUNT("tb_pmasuk.nama_pelanggan") as "order"','COUNT("status") as sukses','COUNT("status") as reject','COUNT("status") as progress'];

    function make_query(){
        $this->db->select($this->select_column);
        $this->db->where("tb_pmasuk.cluster=tb_cluster.cluster");
        $this->db->group_by("tb_pmasuk.cluster");
        $this->db->from($this->table);
        if(@$_POST["search"]["value"]){
            $this->db->like("nama_pelanggan",@$_POST["search"]["value"]);
        }
        if(@$_POST["order"]){
            $this->db->order_by($this->select_order[@$_POST['order']['0']['column']],@$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by("id","DESC");
        }
    }
    function make_query_sukses(){
        $user= $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
        $this->db->select($this->select_column);
        $this->db->where("tb_pmasuk.cluster=tb_cluster.cluster");
        // $this->db->where("tb_cluster.propinsi",$user['propinsi']);
        $this->db->where("status","sukses");
        $this->db->group_by("tb_pmasuk.cluster");
        $this->db->from($this->table);
        if(@$_POST["search"]["value"]){
            $this->db->like("nama_pelanggan",@$_POST["search"]["value"]);
        }
        if(@$_POST["order"]){
            $this->db->order_by($this->select_order[@$_POST['order']['0']['column']],@$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by("id","DESC");
        }
    }
    function make_query_reject(){
        $user= $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
        $this->db->select($this->select_column);
        $this->db->where("tb_pmasuk.cluster=tb_cluster.cluster");
        // $this->db->where("tb_cluster.propinsi",$user['propinsi']);
        $this->db->where("status","reject");
        $this->db->group_by("tb_pmasuk.cluster");
        $this->db->from($this->table);
        if(@$_POST["search"]["value"]){
            $this->db->like("nama_pelanggan",@$_POST["search"]["value"]);
        }
        if(@$_POST["order"]){
            $this->db->order_by($this->select_order[@$_POST['order']['0']['column']],@$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by("id","DESC");
        }
    }
    function make_query_progress(){
        $user= $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
        $this->db->select($this->select_column);
        $this->db->where("tb_pmasuk.cluster=tb_cluster.cluster");
        // $this->db->where("tb_cluster.propinsi",$user['propinsi']);
        $this->db->where("status","progress");
        $this->db->group_by("tb_pmasuk.cluster");
        $this->db->from($this->table);
        if(@$_POST["search"]["value"]){
            $this->db->like("nama_pelanggan",@$_POST["search"]["value"]);
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
    function make_datatables_sukses(){
        $this->make_query_sukses();
        if(@$_POST["length"]!=-1)
        {
            $this->db->limit(@$_POST["length"],@$_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function make_datatables_reject(){
        $this->make_query_reject();
        if(@$_POST["length"]!=-1)
        {
            $this->db->limit(@$_POST["length"],@$_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function make_datatables_progress(){
        $this->make_query_progress();
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
    public function getDataByPropinsi(){
        $this->db->select('*');
        $query = $this->db->get('tb_user');
        return $query->result_array();
    }

    public function tambahProdukBaru($data){
        $data=[
            'nama_produk' => $this->input->post('nama_produk',true),
            'harga' => $this->input->post('harga',true),
            'deskripsi' => $this->input->post('desc_produk',true),
            'gambar' => $this->upload->data('file_name'),
            'url_video' =>$this->input->post('url_video')
        ];   
        $this->db->insert("tb_produk",$data);
    }

    public function getAllDataProduk(){
        $this->db->order_by('dibuat','asc');
        $query= $this->db->get('tb_produk');
        return $query->result_array();
    }
    public function getAllHadiah(){
        return $this->db->get('tb_hadiah')->result_array();
    }
    public function hapusDataHadiah($id){
        $this->db->where('id',$id);
        $this->db->delete('tb_hadiah');
    }
    public function tambahDataHadiah(){
        $data=[
            'nama_hadiah' => $this->input->post('nama_hadiah',true),
            'kuota' => $this->input->post('kuota',true),
            'gambar' => $this->upload->data('file_name'),
        ];   
        $this->db->insert("tb_hadiah",$data);
    }

    function updateKuotaHadiah(){
        
    }

    Public function editProduk($id){
        $data=[
            'nama_produk'=> $this->input->post('nama_produk',true),
            'harga' => $this->input->post('harga',true),
            'deskripsi' => $this->input->post('desc_produk',true),
        ];
        $this->db->where('id',$id);
        $this->db->update('tb_produk',$data);
    }
    Public function editUserPass($id){
        $data=[
            'password' => password_hash($this->input->post('password',true),PASSWORD_DEFAULT),
        ];
        $this->db->where('id',$id);
        $this->db->update('tb_user',$data);
    }
    Public function hapusProduk($id){
        $this->db->where('id',$id);
        $this->db->delete('tb_produk');
    }

    Public function hapusUserRegion($id){
        $this->db->where('id',$id);
        $this->db->delete('tb_user');
    }

    public function tambahDataUserRegion(){
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama',true)),
            'email' => htmlspecialchars($this->input->post('email',true)),
            'propinsi' => htmlspecialchars($this->input->post('propinsi',true)),
            'password' => password_hash('1234abcd',PASSWORD_DEFAULT),
            'id_role' => htmlspecialchars($this->input->post('role',true)),
            'cluster' => htmlspecialchars($this->input->post('cluster',true)),
            'dibuat' => date("Y-m-d H:i:s")
        ];
        $this->db->insert('tb_user',$data);
    }
    function getEmail(){
        return $this->db->select('email')->where('id_role=1')->get('tb_user')->result_array();
    }
    function getCluster($propinsi){
        $this->db->where('propinsi',$propinsi);
        $query = $this->db->get('tb_cluster');
        return $query->result_array();
    
    }

    function getAllReportBulanIni(){
        date_default_timezone_set("Asia/Jakarta");
        $user= $this->db->get_where('tb_user',['email' => $this->session->userdata('email')]) ->row_array();
        $this->db->select('tb_pmasuk.*,tb_cluster.*');
        $this->db->where('tb_pmasuk.cluster=tb_cluster.cluster');
        // $this->db->where('tb_cluster.propinsi',$user['propinsi']);
        $this->db->where('MONTH(dibuat)=MONTH(CURDATE())');
        $this->db->from('tb_pmasuk,tb_cluster');
        return $this->db->get()->result_array();
    }

    function getAllReport(){
        return $this->db->get("tb_pmasuk")->result_array();
    }
    function getAllJawaban(){
        return $this->db->get("tb_quiz")->result_array();
    }
   function getContacts(){
       return $this->db->get('tb_contacts')->result_array();
   }
   function getContactsById($id){
    $this->db->where('id',$id);
    $query = $this->db->get('tb_contacts');
    return $query->row_array();
    }

    function editDataContacts($id){
        $data=[
            'alamat'=>$this->input->post('alamat')
        ];
        $this->db->where('id',$id);
        $this->db->update('tb_contacts',$data);
    }
}
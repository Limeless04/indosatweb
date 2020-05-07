<?php
class Claim_model extends CI_model{


    function cekStatus(){
        $kodeHadiah= $this->input->post('kode_hadiah');
        $this->db->where('kode_gan',$kodeHadiah);
        $this->db->where('status="sukses"');
        $query = $this->db->get('tb_pmasuk');
        return $query->result_array();
    }

    function getRandomHadiah(){
        $this->db->select("id,nama_hadiah,gambar");
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get('tb_hadiah');
        return $query->result();
    }   

    function cekStatusClaim(){
        $kodeHadiah= $this->input->post('kode_hadiah');
        $this->db->where('kode_gan',$kodeHadiah);
        $this->db->where('hadiah IS NOT NULL',null,false);
        $query = $this->db->get('tb_pmasuk');
        return $query->result_array();
    }

    function updateKuota($h){
        $this->db->query("UPDATE tb_hadiah SET kuota=kuota-1 WHERE id='".$h->id."'");
    }
    function updateTbMasuk($h){
        $kodeHadiah= $this->input->post('kode_hadiah');
        $this->db->query("UPDATE tb_pmasuk SET hadiah='".$h->nama_hadiah."' WHERE kode_gan='".$kodeHadiah."'");
    }

    // function getGambar($hadiah){
    //     $data=[
    //         'gambar' => $hadiah['gambar'],
    //     ];    
    //     $this->db->where($data);
    //     $query = $this->db->get('tb_hadiah');
    // }
}

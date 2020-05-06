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
        $this->db->order_by('rand()');
        $this->db->limit(1);
        $query = $this->db->get('tb_hadiah');
        return $query->result_array();
    }   

    function cekStatusClaim(){
        $kodeHadiah= $this->input->post('kode_hadiah');
        $this->db->where('kode_gan',$kodeHadiah);
        $this->db->where('hadiah IS NOT NULL',null,false);
        $query = $this->db->get('tb_pmasuk');
        return $query->result_array();
    }

    function updateKuota($hadiah){
        $this->db->set('kuota','kuota-1',false);
        $this->db->where('id',$hadiah['id']);
        $this->db->update('tb_hadiah');
    }

    function updateTbMasuk($hadiah){
        $kodeHadiah= $this->input->post('kode_hadiah');
        $data= [
            'hadiah' => $hadiah['nama_hadiah']
        ];
        $this->db->where('kode_gan',$kodeHadiah);
        $this->db->update('tb_pmasuk',$data); 
    }
}

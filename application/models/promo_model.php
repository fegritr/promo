<?php

class promo_model extends CI_Model{
    public $tabelpromo = 'promo';
    public $tabelscraper = 'scraper';

    public function __construct(){
        $this->load->database();
    }

    public function updatepromo($toko, $kategori, $title, $gambar, $link){

        $data = array(
            'toko' => $toko,
            'kategori' => $kategori,
            'title' => $title,
            'gambar' => $gambar,
            'linkurl' => $link
        );

        $this->db->set($data);
        $this->db->insert($this->db->dbprefix . 'promo');
    }
 
    public function getDataPromo($tk, $kat){

        $query = $this->db->get_where('promo', array('toko' => $tk, 'kategori' => $kat));
        return $query->result_array();
    }

    public function get_data_row($table,$where){
		$this->db->where($where);
		$data=$this->db->get($table);
        return $data->result_array();
    }

    public function getPromo($kat){
        $query = $this->db->get_where('promo', array('kategori' => $kat));
        return $query->result_array();
    }

    public function getTable($table){
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function getPromoToko($tk){

        $query = $this->db->get_where('promo', array('toko' => $tk));
        return $query->result_array();
    }

    public function deleteData($title){
        $this->db->where('title', $title);
        $this->db->delete('promo');
    }

    public function deleteDataScraper($id_target){
        $this->db->where('id_target', $id_target);
        $this->db->delete('scraper');
    }

    public function get_data_array($table, $where){
        $this->db->where_in('id_promo', $where);
        $data=$this->db->get($table);
        return $data->result_array();
    }

    public function update_data($table,$data_update,$where){
		$this->db->update($table,$data_update, $where);
        return $this->db->affected_rows();
    }

    public function tambahData(){
        $data = array(
            'toko' => $this->input->post('toko'),
            'kategori' => $this->input->post('kategori'),
            'urltarget' => $this->input->post('urltarget'),
            'regextitle' => $this->input->post('regextitle'),            
            'regexgambar' => $this->input->post('regexgambar'),
            'addurlgambar' => $this->input->post('addurlgambar'),
            'regexlinkpromo' => $this->input->post('regexlinkpromo'),
            'addurllinkpromo' => $this->input->post('addurllinkpromo'),
        );

        return $this->db->insert('scraper', $data);
    }

    public function getPromoUrutan($kat, $urutan){
        $this->db->where(array('kategori'=> $kat));
        $this->db->order_by($urutan, 'DESC');
        $data=$this->db->get('promo');
        return $data->result_array();
    }

    public function getSearch($search){
        $this->db->like('title', $search);
        $data = $this->db->get('promo');
        return $data->result_array();
    }





}

?>






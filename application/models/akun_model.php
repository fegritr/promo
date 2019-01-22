<?php

class akun_model extends CI_Model{

    public $tabel = 'akun';

    public function __construct(){
        $this->load->database();

    }



    public function register($enc_password){
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'nama' => $this->input->post('nama'),
            'nohp' => $this->input->post('nohp'),            
            'email' => $this->input->post('email'),
            'id_promo' => 'a:1:{i:0;i:0;}',
            'subscribtion' => 'a:0:{}',
            'roles' => 'a:1:{i:0;s:1:"2"}',    
        );

        return $this->db->insert('akun', $data);
    }

    public function cek_username($username){
        $query = $this->db->get_where('akun', array('username' => $username));

        if(empty($query->row_array())){
            return true;
        }else{
            return false;
        }
    }

    public function cek_email($email){
        $query = $this->db->get_where('akun', array('email' => $email));

        if(empty($query->row_array())){
            return true;
        }else{
            return false;
        }
    }

    public function login($username, $password){
        //validasi
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get($this->tabel);

        if($result->num_rows() == 1){
            return $result->row(0)->id_akun;
        }else{
            return false;
        }
    
    }

    public function getUser($id){
        $query = $this->db->get_where($this->tabel, array('id_akun'=> $id));
        return $query->array_result();
    }
    public function get_data_row($where){
		$this->db->where($where);
		$data=$this->db->get($this->tabel);
        return $data->row();
    }
    
    public function update_data($data_update,$where){
		$this->db->update($this->tabel,$data_update, $where);
        return $this->db->affected_rows();
    }

    public function getTable(){
        $query = $this->db->get($this->tabel);
        return $query->result_array();
    }
    

}
<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class unit_testing extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library("unit_test");
    }

    private function savepromo($akun, $promo){
        $id_akun = $akun;
        $id_promo = $promo;

        $akun = $this->akun_model->get_data_row(array('id_akun'=>$id_akun));
        $saved_id_promo = unserialize($akun->id_promo);
        array_push($saved_id_promo, $id_promo);

        $ser_id_promo = serialize($saved_id_promo);
        $data_update=array(
            'id_promo' => $ser_id_promo,
        );

        $where = array(
            'id_akun'=> $id_akun,
        );
        $this->akun_model->update_data($data_update,$where);
        $akun1 = $this->akun_model->get_data_row(array('id_akun'=>$id_akun));
        $user_data=array(
            'id_promo' => $akun1->id_promo,
        );
        $this->session->set_userdata($user_data);
        redirect('index.php/c_main/view_'.$kategori);
    }
}

?>
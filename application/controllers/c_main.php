<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_main extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('promo_model');
        $this->load->model('akun_model');
        $this->load->helper('url_helper');
    }
    
    public function view_belanja(){
        $data['title'] = 'My Promo - Belanja';
        $urutan = 'id_promo';
        if(isset($_POST['sort'])){
            $urutan = $_POST['sort'];}
    
        $data['belanja'] = $this->promo_model->getPromoUrutan('belanja', $urutan);
         $this->load->view('templates/header',$data);
         $this->load->view('v_belanja', $data);
         $this->load->view('templates/footer');
    }

    public function view_tiket(){
        $data['title'] = 'MyPromo - Tiket';
        $urutan = 'id_promo';
        if(isset($_POST['sort'])){
            $urutan = $_POST['sort'];}
    
        $data['tiket'] = $this->promo_model->getPromoUrutan('tiket', $urutan);
        $this->load->view('templates/header',$data);
        $this->load->view('v_tiket', $data);
        $this->load->view('templates/footer');
    }

    public function view_bankkeuangan(){
        $data['title'] = 'MyPromo - Bank & Keuangan';
        $urutan = 'id_promo';
        if(isset($_POST['sort'])){
            $urutan = $_POST['sort'];}
    
        $data['bankkeuangan'] = $this->promo_model->getPromoUrutan('bankkeuangan', $urutan);
        $this->load->view('templates/header',$data);
        $this->load->view('v_bankkeuangan', $data);
        $this->load->view('templates/footer');
    }

    public function view_voucher(){
        $data['title'] = 'MyPromo - Voucher';
        $urutan = 'id_promo';
        if(isset($_POST['sort'])){
            $urutan = $_POST['sort'];}
    
        $data['voucher'] = $this->promo_model->getPromoUrutan('voucher', $urutan);
        $this->load->view('templates/header',$data);
        $this->load->view('v_voucher', $data);
        $this->load->view('templates/footer');
    }
    public function index(){
        $data['title'] = 'MyPromo';
        $data['belanja'] = $this->promo_model->getPromo('belanja');
        $data['voucher'] = $this->promo_model->getPromo('voucher');
        $data['tiket'] = $this->promo_model->getPromo('tiket');
        $data['tokopedia'] = $this->promo_model->getPromoToko('tokopedia');
        $data['shopee'] = $this->promo_model->getPromoToko('shopee');
        $data['traveloka'] = $this->promo_model->getPromoToko('traveloka');
        $data['bankkeuangan'] = $this->promo_model->getPromo('bankkeuangan');
        $data['bukalapak'] = $this->promo_model->getPromoToko('bukalapak');
        $this->load->view('templates/header',$data);
        $this->load->view('v_home', $data);
        $this->load->view('templates/footer');
    }
    
    public function view_profile(){
        $data['title'] = 'MyPromo - Profile';
        
        $id_akun = $this->session->userdata('id_akun');
        $akun = $this->akun_model->get_data_row(array('id_akun'=>$id_akun));
        $saved_id_promo = unserialize($akun->id_promo);

        $data['profil'] = $this->akun_model->get_data_row(array('id_akun'=>$id_akun));

        $data['savedpromo'] = $this->promo_model->get_data_array('promo', $saved_id_promo);

        $this->load->view('templates/header',$data);
        $this->load->view('v_profile',$data);
        $this->load->view('templates/footer');
    }

    public function view_wishlist(){
        $data['title'] = 'MyPromo - Wishlist';
        
        $id_akun = $this->session->userdata('id_akun');
        $akun = $this->akun_model->get_data_row(array('id_akun'=>$id_akun));
        $saved_id_promo = unserialize($akun->id_promo);

        $data['profil'] = $this->akun_model->get_data_row(array('id_akun'=>$id_akun));

        $data['savedpromo'] = $this->promo_model->get_data_array('promo', $saved_id_promo);

        $this->load->view('templates/header',$data);
        $this->load->view('v_wishlist',$data);
        $this->load->view('templates/footer');
    }

    public function view_editpromo(){
        $data['title'] = 'MyPromo - Edit Promo';
        $id_promo = $_POST['id_promo'];
        
        $data['promo'] = $this->promo_model->get_data_row("promo", array('id_promo'=>$id_promo));
        
        $this->load->view('v_editpromo',$data);
    }

    public function view_editakun(){
        $data['title'] = 'MyPromo - Edit Akun';
        $id_akun = $_POST['id_akun'];
        
        $data['akun'] = $this->promo_model->get_data_row("akun", array('id_akun'=>$id_akun));
        
        $this->load->view('v_editakun',$data);
    }

    public function view_edit_scrap(){
        $data['title'] = 'MyPromo - Edit Scrap';
        $id_target = $_POST['id_target'];

        $data['scrap'] = $this->promo_model->get_data_row("scraper", array('id_target'=>$id_target));
        $this->load->view('templates/header',$data);
        $this->load->view('v_edit_scrap',$data);
        $this->load->view('templates/footer');
    }

    public function view_admin(){
        $data['title'] = 'MyPromo - Admin';

        $data['scrap']= $this->promo_model->getTable('scraper');

        $this->load->view('templates/header',$data);
        $this->load->view('v_admin',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_scrap(){

        $data['title'] = 'MyPromo - Tambah Scrap';
        
        $this->form_validation->set_rules('toko', 'toko', 'required');
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
        $this->form_validation->set_rules('regextitle', 'regextitle', 'required');
        $this->form_validation->set_rules('regexgambar', 'regexgambar', 'required');
        $this->form_validation->set_rules('addurlgambar', 'addurlgambar'); 
        $this->form_validation->set_rules('regexlinkpromo', 'regexlinkpromo', 'required');
        $this->form_validation->set_rules('addurllinkpromo', 'addurllinkpromo');

            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header',$data);
                $this->load->view('v_tambah_scraper', $data);
                $this->load->view('templates/footer');
                $this->form_validation->set_message('add_scraper_failed', '<br><center><p class="alert alert-danger">Harap isi data yang diperlukan</p></center>');
            }else{
                $this->promo_model->tambahData();

                redirect('index.php/c_main/view_admin');
            } 
    }

    public function search(){
        $data['title'] = 'MyPromo - Search';
        $search = $_POST['search'];

        $data['search'] = $this->promo_model->getSearch($search);
        $this->load->view('templates/header',$data);
        $this->load->view('v_search',$data);
        $this->load->view('templates/footer');
         
    }

    
}


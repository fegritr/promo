 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_akun extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('akun_model');
        $this->load->model('promo_model');
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    


    public function register(){

        $data['title'] = 'MyPromo - Register';
        
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('username', 'username', 'required|callback_cek_username');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|callback_cek_email'); 
        $this->form_validation->set_rules('nohp', 'nohp', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('v_register1', $data);
            }else{
                $enc_password = md5($this->input->post('password'));
                $this->akun_model->register($enc_password);
                $this->session->set_flashdata('user_registered','You Are Now Registered');

                redirect('index.php/c_akun/login');
            } 
    }

    public function cek_username($username){
        $this->form_validation->set_message('cek_username', '<br><center><p class="alert alert-danger">username sudah digunakan</p></center>');
        if($this->akun_model->cek_username($username)){
            return true;
        }else{
            return false;
        }
    }
    public function cek_email($email){
        $this->form_validation->set_message('cek_email', '<br><center><p class="alert alert-danger">email sudah digunakan</p></center>');
        if($this->akun_model->cek_email($email)){
            return true;
        }else{
            return false;
        }
    }

    public function login(){

        $data['title'] = 'MyPromo - Login';

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

            if($this->form_validation->run() === FALSE){

                $this->load->view('v_login1', $data);
 
            }else{

                //Get Username
                $username = $this->input->post('username');
                //Get and Ecnrypt Password
                $password = md5($this->input->post('password'));

                $where = array(
                    'username' => $username,
                    'password' => $password
                );

                //Cek login
                $user_id = $this->akun_model->login($username, $password);

                

                if($user_id){
                    //Create Session
                    $data_akun = $this->akun_model->get_data_row($where);
                    $id_promo = unserialize($data_akun->id_promo); 
                    $user_data=array(
                        'user_id' => $user_id,
                        'username' => $username,
                        'nama' => $data_akun->nama,
                        'id_promo' => $data_akun->id_promo,
                        'email' => $data_akun->email,
                        'nohp' => $data_akun->nohp,
                        'id_akun' => $data_akun->id_akun,
                        'subscribtion' => $data_akun->subscribtion,
                        'roles' => $data_akun->roles,
                        'logged_in' => true,
                    );

                    $this->session->set_userdata($user_data);

                    $this->session->set_flashdata('user_loggedin','You Are Now Logged In');

                    redirect(base_url());
                    //Set Message
                } else{
                    $this->session->set_flashdata('login_failed','Login is Invalid');

                    redirect('index.php/c_akun/login');
                }


               
            } 
    }

    public function save_promo(){
        $id_akun = $this->session->userdata('id_akun');
        $id_promo = $_POST['id_promo'];
        $kategori = $_POST['kategori'];

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

    public function delete_promo(){
        $id_akun = $this->session->userdata('id_akun');
        $id_promo = $_POST['id_promo'];


        $akun = $this->akun_model->get_data_row(array('id_akun'=>$id_akun));
        $saved_id_promo = unserialize($akun->id_promo);
        $key = array_search($id_promo, $saved_id_promo);
        unset($saved_id_promo[$key]);

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
        redirect('index.php/c_main/view_wishlist');

    }
    public function subscribe(){
        $id_akun = $this->session->userdata('id_akun');
        $kategori = $_POST['kategori'];


        $akun = $this->akun_model->get_data_row(array('id_akun'=>$id_akun));
        $subs = unserialize($akun->subscribtion);
        array_push($subs, $kategori);

        $ser_subs = serialize($subs);
        $data_update=array(
            'subscribtion' => $ser_subs,
        );

        $where = array(
            'id_akun'=> $id_akun,
        );
        $this->akun_model->update_data($data_update,$where);
        $akun1 = $this->akun_model->get_data_row(array('id_akun'=>$id_akun));
        $user_data=array(
            'subscribtion' => $akun1->subscribtion,
        );
        $this->session->set_userdata($user_data);
        redirect('index.php/c_main/view_'.$kategori);

    }

    public function unsubscribe(){
        $id_akun = $this->session->userdata('id_akun');
        $kategori = $_POST['kategori'];

        $akun = $this->akun_model->get_data_row(array('id_akun'=>$id_akun));
        $subs = unserialize($akun->subscribtion);
        $key = array_search($kategori, $subs);
        unset($subs[$key]);

        $ser_subs = serialize($subs);
        $data_update=array(
            'subscribtion' => $ser_subs,
        );

        $where = array(
            'id_akun'=> $id_akun,
        );
        $this->akun_model->update_data($data_update,$where);
        $akun1 = $this->akun_model->get_data_row(array('id_akun'=>$id_akun));
        $user_data=array(
            'subscribtion' => $akun1->subscribtion,
        );
        $this->session->set_userdata($user_data);
        redirect('index.php/c_main/view_'.$kategori);

    }

    public function update_data(){
        $id_akun = $_POST['id_akun'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $nohp = $_POST['nohp'];
        $tanggallahir = $_POST['tanggallahir'];
        $jeniskelamin = $_POST['jeniskelamin'];


        $data_update=array(
            'nama' => $nama,
            'email' => $email,
            'email' => $email,
            'nohp' => $nohp,
            'tanggallahir' => $tanggallahir,
            'jeniskelamin' => $jeniskelamin,
        );

        $where = array(
            'id_akun'=> $id_akun,
        );
        $this->promo_model->update_data('akun',$data_update,$where);
        redirect('index.php/c_main/view_profile');

}

    public function logout(){
        //Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('user_loggedout','You Are Now logged Out');

        redirect(base_url());
    }

}
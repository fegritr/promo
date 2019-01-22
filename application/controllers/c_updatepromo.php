<?php

class c_updatepromo extends CI_Controller{


    function __construct(){
        parent::__construct();
        $this->load->model('promo_model');
        $this->load->model('akun_model');
        $this->load->helper('form', 'url');
        $this->load->library('email');

    }
   
    public function updatepromo(){
        $id_target = $_POST['id_target'];

        $data['scrap'] = $this->promo_model->get_data_row("scraper", array('id_target'=>$id_target));

        $curl = curl_init();
        $url = $data['scrap'][0]['urltarget'];

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        $promo = array();

        preg_match_all('!'.$data['scrap'][0]['regextitle'].'!', $result, $match);
        $promo['title'] = $match[1];

        preg_match_all('!'.$data['scrap'][0]['regexgambar'].'!', $result, $match);
        $promo['gambar'] = $match[1];

        preg_match_all('!'.$data['scrap'][0]['regexlinkpromo'].'!', $result, $match);
        $promo['linkurl'] = $match[1];

        $data['promo'] = $this->promo_model->getDataPromo($data['scrap'][0]['toko'], $data['scrap'][0]['kategori']);
        ini_set('max_execution_time', 300);
 
        for($i=0 ; $i<count($promo['gambar']);$i++){
            $promo['gambar'][$i] = $data['scrap'][0]['addurlgambar'].$promo['gambar'][$i];
            }
            
        for($i=0 ; $i<count($promo['linkurl']);$i++){
                $promo['linkurl'][$i] = $data['scrap'][0]['addurllinkpromo'].$promo['linkurl'][$i];
            }
        $countadd = 0;
        $countdel = 0;           

        for($i=0 ; $i<count($promo['title']);$i++){
            $title = $promo['title'][$i];
            $gambar = $promo['gambar'][$i];
            $link = $promo['linkurl'][$i];

            //cek duplikat promo
            if(in_array($title, array_column($data['promo'], 'title'))) {
                //do nothing
            }else{
                //menambahkan promo
                $this->promo_model->updatepromo($data['scrap'][0]['toko'], $data['scrap'][0]['kategori'], $title, $gambar, $link); 
                $countadd++;
                $data['user'] = $this->akun_model->getTable('akun'); 
               
                foreach($data['user'] as $akun){
                    if(strpos($akun['subscribtion'], $data['scrap'][0]['kategori']) !== false){    
                            $message = '
                                <table cellpadding="0" cellspacing="0" style="margin:auto;">
                                    <tr>
                                        <td class="pattern" width="450">
                                            <table cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td class="hero">
                                                        <a href='.$link.' target="_blank"><img src='.$gambar.' alt="" style="display: block; border: 0; width:100%;" /> </a>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td align="center" style="font-family: arial,sans-serif; color: #333;">
                                                        <h1>'.$title.'<br></h1>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" style="font-weight: normal; line-height: 20px !important; color: #666; padding-bottom: 20px;text-align: justify;font-family: monospace;color:#000;font-size: 12px;">
                                                    <singleline>Halo '.$akun['nama'].', jangan sampai ketinggalan promo dari kami, subscribe kategori lain untuk mendapatkan info promo terbaru!
                                                    </singleline>
                                                    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left">
                                                        
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>';                          
                                $this->email_send($akun['email'], $message);
                                } else{
                            }
                        }
                    }
                }
            //menghapus promo
            foreach($data['promo'] as $promoitem){
                if(in_array($promoitem['title'], $promo['title'])){

            }else{
                $itemm = $promoitem['title'];            
                    $this->promo_model->deleteData($itemm);
                    $countdel++;
                }
        }
        $lastupdate = date("Y-m-d H:i:s");   
        $data_update=array(
            'lastupdate' => $lastupdate,
        );
        $where = array(
            'toko'=> $data['scrap'][0]['toko'],
            'kategori'=> $data['scrap'][0]['kategori'],
        );
        $this->promo_model->update_data('scraper',$data_update,$where);
        $this->session->set_flashdata('promo_updated','success');
        $this->session->set_flashdata('toko', $data['scrap'][0]['toko']);
        $this->session->set_flashdata('kategori', $data['scrap'][0]['kategori']);
        $this->session->set_flashdata('count_add', $countadd);
        $this->session->set_flashdata('count_del', $countdel);
        redirect('index.php/c_main/view_admin');
    }


    public function update_data(){
                $id_promo = $_POST['id_promo'];
                $title = $_POST['title'];
                $kodepromo = $_POST['kodepromo'];
                $periode = $_POST['periode'];
                $bataspromo = $_POST['bataspromo'];
                $kategori = $_POST['kategori'];

                $data_update=array(
                    'title' => $title,
                    'kodepromo' => $kodepromo,
                    'periode' => $periode,
                    'kategori' => $kategori,
                    'bataspromo' => $bataspromo,
                );
        
                $where = array(
                    'id_promo'=> $id_promo,
                );
                $this->promo_model->update_data('promo',$data_update,$where);
                redirect('index.php/c_main/view_'.$kategori);

    }

    public function update_data_scrap(){
        $id_target = $_POST['id_target'];
        $toko = $_POST['toko'];
        $kategori = $_POST['kategori'];
        $urltarget = $_POST['urltarget'];
        $regextitle = $_POST['regextitle'];
        $regexgambar = $_POST['regexgambar'];
        $addurlgambar = $_POST['addurlgambar'];
        $regexlinkpromo = $_POST['regexlinkpromo'];
        $addurllinkpromo = $_POST['addurllinkpromo'];      

        $data_update=array(
            'toko' => $toko,
            'kategori' => $kategori,
            'urltarget' => $urltarget,
            'regextitle' => $regextitle,
            'regexgambar' => $regexgambar,
            'addurlgambar' => $addurlgambar,
            'regexlinkpromo' => $regexlinkpromo,
            'addurllinkpromo' => $addurllinkpromo,
        );

        $where = array(
            'id_target'=> $id_target,
        );
        $this->promo_model->update_data('scraper',$data_update,$where);
        redirect('index.php/c_main/view_admin');

    }

    public function delete_data_scrap(){
        $id_target = $_POST['id_target'];
        $this->promo_model->deleteDataScraper($id_target);

        redirect('index.php/c_main/view_admin');
    }

    function email_send($email, $message) {
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "smtp.gmail.com";
        $config['smtp_port'] = "587";
        $config['smtp_crypto'] = 'tls';
        $config['smtp_timeout'] = '600';
        $config['smtp_user'] = "mypromonotification@gmail.com"; 
        $config['smtp_pass'] = "wibowoo7";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
    
        $ci->email->initialize($config);
        $ci->email->from('mypromonotification@gmail', 'MY PROMO APPS');
        $ci->email->to($email);
        $ci->email->reply_to('mypromonotification@gmail.com', '');
        $ci->email->subject('PROMO TERBARU UNTUK ANDA!');
        $ci->email->message($message);
        $ci->email->send();


}
}








<style type="text/css">

    .button1 {
    background-color: transparent; 
    color: black; 
    border: 2px solid #fffff;
    
    }
    .button1:hover {
    background-color: #FF2965 ;
    color: white;
    }
    .top-right {
    position: absolute;
    top: 0px;
    right: 0px;
    width: 48px;
}

    </style>
   
    <!-- Page Content -->
    <div class="container">
    
<section id="categories">
<div class="container">
<div class="row">
<div class="col-sm-12 cat-column">
<div class="cat-list clearfix">

        
  <a href="<?php echo base_url().'index.php/c_main/view_belanja'?>" class="cat-list__item 
            active">
  <span class="cat-list__icon cat-list__icon-belanja"></span>
  <span class="cat-list__text">Belanja</span>
  </a>
  
        
  <a href="<?php echo base_url().'index.php/c_main/view_voucher'?>" class="cat-list__item 
            ">
  <span class="cat-list__icon cat-list__icon-produk-digital"></span>
  <span class="cat-list__text">Voucher dan Top Up</span>
  </a>
  
        
  <a href="<?php echo base_url().'index.php/c_main/view_bankkeuangan'?>" class="cat-list__item 
            ">
  <span class="cat-list__icon cat-list__icon-produk-keuangan"></span>
  <span class="cat-list__text">Bank dan Keuangan</span>
  </a>
  
        
  <a href="<?php echo base_url().'index.php/c_main/view_tiket'?>" class="cat-list__item 
            ">
  <span class="cat-list__icon cat-list__icon-tiket"></span>
  <span class="cat-list__text">Tiket</span>
  </a>
  
      
</div>
</div>
</div>
</div>
</section>
<!-- The text field -->
      
      <!-- Portfolio Section -->
      <br>
      <h2>Belanja</h2>
      
      <hr>
      <form action = "<?php echo base_url().'index.php/c_main/view_belanja'?>" method = "post">
      <select id="sort" name="sort" style="float: right;" onchange='if(this.value != 0) { this.form.submit(); }'>                      
                <option value="0">Sort By</option>
                <option value="id_promo">Last Update</option>
                <option value="title">Title</option>
                </select>
                
      </form>
      <?php $roles = unserialize($this->session->userdata('roles'));?>    
           
      <?php if($this->session->userdata('logged_in' )&& in_array("2", $roles)){?>
              <?php $subscribtion = unserialize($this->session->userdata('subscribtion'));?>
              <?php if(in_array("belanja", $subscribtion)){?>
                      <form method="post" action="<?php echo base_url().'index.php/c_akun/unsubscribe'?>">
                      <button type="submit"  class="btn" style="background-color:transparent;">
                      <input type="hidden" name="kategori" value="belanja">
                      <span class="btn-label"><i class="material-icons">notifications</i>Subscribed</span></button>
                      </form>
              <?php }else{?>
                <form method="post" action="<?php echo base_url().'index.php/c_akun/subscribe'?>">
                <button type="submit"  class="btn" style="background-color:transparent;">
                <input type="hidden" name="kategori" value="belanja">
                <span class="btn-label"><i class="material-icons">notifications_none</i>Subscribe</span></button> 
                </form>
              
              <?php }} ?>
             
     
      <?php $numOfCols = 3; 
      $rowCount = 0;
      $bootstrapColWidth = 12 / $numOfCols;?>

      <br><br>        
      <div class="row">
      <?php foreach($belanja as $item){?>
      
        <div class="col-lg-<?php echo $bootstrapColWidth;?> portfolio-item">
          <div class="card h-100 ">
          <?php if($this->session->userdata('logged_in') && in_array("2", $roles)){?>
              <?php $saved_id_promo = unserialize($this->session->userdata('id_promo'));?>
              <?php if(!in_array($item['id_promo'], $saved_id_promo)){?>
                      <form method="post" action="<?php echo base_url().'index.php/c_akun/save_promo'?>">
                      <button type="submit"  class="btn button1" style="position: absolute;">
                      <input type="hidden" name="id_promo" value="<?php echo $item['id_promo']?>">
                      <input type="hidden" name="kategori" value="belanja">
                      <span class="btn-label"><i class="fa fa-check" style="font-size: 20px;"></i></span></button>
                      </form>
                <?php } ?>

               <?php }else if($this->session->userdata('logged_in') && in_array("1", $roles)){?>
                  <form method="post" action="<?php echo base_url().'index.php/c_main/view_editpromo'?>">
                  <button type="submit"  class="btn button1" style="position: absolute;">
                  <input type="hidden" name="id_promo" value="<?php echo $item['id_promo']?>">
                  <span class="btn-label"><i class="fa fa-edit"></i></span></button>
                  </form>
                <?php }?>
          
                <?php if($item['toko'] == 'tokopedia'){ ?>
            <img class="card-img-top top-right" style="position:absolute; " src="<?php echo base_url()?>assets/img/tokopedia.png" >
            <?php }else if($item['toko'] == 'bukalapak'){ ?>
            <img class="card-img-top top-right" style="position:absolute; " src="<?php echo base_url()?>assets/img/bukalapak.png" >
            <?php }else if($item['toko'] == 'traveloka'){ ?>
            <img class="card-img-top top-right" style="position:absolute; " src="<?php echo base_url()?>assets/img/traveloka.png" >
            <?php }else if($item['toko'] == 'tiketcom'){ ?>
            <img class="card-img-top top-right" style="position:absolute; " src="<?php echo base_url()?>assets/img/tiketcom.png" >
            <?php }else if($item['toko'] == 'shopee'){ ?>
            <img class="card-img-top top-right" style="position:absolute; " src="<?php echo base_url()?>assets/img/shopee.png" ><?php }?>



            <a href="<?php echo $item['linkurl'];?>" target="_blank"><img class="card-img-top" src="<?php echo $item['gambar'];?>"height ="200" width="400" class="img-responsive img-full" alt=""></a>
            <div class="card-body d-flex flex-column">
              <h6 class="card-title">
              <h6 class="card-title" style="font-weight: bold;height:38px;"><?php echo $item['title'];?></h6><br>
              </h6><?php if($item['periode'] == null){ ?>
              <p class="card-text">Periode: Sedang Berlangsung</p>
              <?php }else{ ?><p class="card-text">Periode: <?php echo $item['periode'];?></p>
                <?php }?>
              <?php if($item['kodepromo'] == null){ ?>
              <p class="card-text"><small>Tanpa Kode Promo</small></p><br><br>
              <input type="text" id ="" value=" " readonly style="width: fit-content; border: none; font-size:13px; font-weight:bold; color:red;">
                <button onclick="" class="btn pull-right" style="width: fit-content; background-color:transparent;" id="right-panel-link"></button>
              <?php }else{ ?>
                <p class="card-text"><small>Kode Promo: </small></p>
                <input type="text" id ="<?php echo $item['kodepromo'];?>" value="<?php echo $item['kodepromo'];?>" readonly style="width: fit-content; border: none; font-size:13px; font-weight:bold; color:red;">
                <button onclick="copyButton('<?php echo $item['kodepromo'];?>')" class="btn pull-right" style="width: fit-content;" id="right-panel-link"><i class ="fa fa-copy"></i> Copy</button>
                
              <?php }?>
              <br></br>
              <?php 
              if($item['bataspromo'] != ''){?>
              <?php $today = date("Y-m-d H:i:s");    
              $start_date = new DateTime($today);
              $since_start = $start_date->diff(new DateTime($item['bataspromo']));
             
              if($since_start->m !== 0){?>
                
                <small class="mt-auto" style="position:absolute; bottom:55px;"><font color="red"><i class="fa fa-clock-o"> </i> <?php echo $since_start->m.' bulan ';?>
                <?php echo $since_start->d.' hari ';?>
                <?php echo $since_start->h.' jam';?></small></font>
                <?php }else if($since_start->d !== 0){ ?>
                <small class="mt-auto" style="position:absolute; bottom:55px;"><font color="red"><i class="fa fa-clock-o"> </i> <?php echo $since_start->d.' hari ';?>
                <?php echo $since_start->h.' jam'; ?></small></font>
                <?php }else{?>
                <small class="mt-auto" style="position:absolute; bottom:55px;"><font color="red"> <i class="fa fa-clock-o"> </i> <?php  echo $since_start->h.' jam'; ?> </small></font>
              
              
                   <?php }}?>
              

              <a href="<?php echo $item['linkurl'];?>"target="_blank" class="btn btn-primary btn-block mt-auto" style="background-color:#FF2965; border:none; ">Lihat Detail</a>
            </div>
          </div>
        </div>
        <?php $rowCount++;
          if($rowCount % $numOfCols == 0) echo '</div><div class="row">';


        ?>
      <?php }?>
      </div>
      </div>

      <script>
      function copyButton(element){
      
      var copyText = document.getElementById(element);
      copyText.select();
      document.execCommand("copy");

      }
</script>

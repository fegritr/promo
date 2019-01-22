<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url()?>assets/js/main.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/modern-business.css" rel="stylesheet">
  
  </head>

  <body>
  
      <!-- Navigation -->
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url()?>">MyPromo</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            

            <?php if(!$this->session->userdata('logged_in')){?>  
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url().'index.php/c_akun/login'?>">Login</a>
            </li>

             <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url().'index.php/c_akun/register'?>">Register</a>
            </li>
            <?php } else if($this->session->userdata('logged_in')){?>
            
              <?php if($this->session->userdata('username') == 'admin'){?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'index.php/c_updatepromo/scrap'?>">Update</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'index.php/c_main/view_admin'?>">Admin Page</a>
                </li>
                  
                  <?php } else{?>
                  <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url().'index.php/c_main/view_profile'?>">Profile</a>
                  </li>
                  
                  <?php }?>



             <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url().'index.php/c_akun/logout'?>">Logout</a>
            </li>
            <?php }?>
            
            
          </ul>
        </div>
      </div>
    </nav>


    <?php if($this->session->flashdata('user_registered')):?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>';?>
  <?php endif;?>
    <?php if($this->session->flashdata('post_created')):?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>';?>
  <?php endif;?>
    <?php if($this->session->flashdata('post_updated')):?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>';?>
  <?php endif;?>
    <?php if($this->session->flashdata('category_created')):?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>';?>
  <?php endif;?>
   <?php if($this->session->flashdata('post_deleted')):?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>';?>
  <?php endif;?>
 <?php if($this->session->flashdata('login_failed')):?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>';?>
  <?php endif;?>
   <?php if($this->session->flashdata('user_loggedin')):?>
    <?php $this->session->flashdata('user_loggedin');?>
  <?php endif;?>
  <?php if($this->session->flashdata('user_loggedout')):?>
    <?php $this->session->flashdata('user_loggedout');?>
  <?php endif;?>

    <!-- Page Content -->
    <div class="container">


    <nav class = "nav">
        <div class ="nav-mobile">
            <ul class="left">
            <li><a href ="#"> Home</a></li>
            <li><a href ="#"> Home</a></li>
            <li><a href ="#"> Home</a></li>
            <li><a href ="#"> Home</a></li>
            </ul>
        </div>
    </nav>

    
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
  
        
  <a href="<?php echo base_url().'index.php/c_main/view_keuangan'?>" class="cat-list__item 
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
      <br></br>
      <h2>Belanja</h2>
      
      <?php if($this->session->userdata('logged_in' )&& $this->session->userdata('username')!= 'admin'){?>
              <?php $subscribtion = unserialize($this->session->userdata('subscribtion'));?>
              <?php if(in_array("belanja", $subscribtion)){?>
                      <form method="post" action="<?php echo base_url().'index.php/c_akun/unsubscribe'?>">
                      <button type="submit"  class="btn btn-labeled btn-warning">
                      <input type="hidden" name="kategori" value="belanja">
                      <span class="btn-label"><i class="glyphicon glyphicon-bookmark"></i></span>Unsubscribe</button>
                      </form>
              <?php }else{?>
                <form method="post" action="<?php echo base_url().'index.php/c_akun/subscribe'?>">
                <button type="submit"  class="btn btn-labeled btn-warning">
                <input type="hidden" name="kategori" value="belanja">
                <span class="btn-label"><i class="fa fa-bookmark"></i></span>Subscribe</button>
                </form>
              
              <?php }} ?>

                <br></br>
      <?php $numOfCols = 3; 
      $rowCount = 0;
      $bootstrapColWidth = 12 / $numOfCols;?>
      <div class="row">
      <?php foreach($belanja as $item){?>
      
        <div class="col-lg-<?php echo $bootstrapColWidth;?> portfolio-item">
          <div class="card h-100 ">
          <?php if($this->session->userdata('logged_in') && $this->session->userdata('username')!= 'admin'){?>
              <?php $saved_id_promo = unserialize($this->session->userdata('id_promo'));?>
              <?php if(!in_array($item['id_promo'], $saved_id_promo)){?>
                      <form method="post" action="<?php echo base_url().'index.php/c_akun/save_promo'?>">
                      <button type="submit"  class="btn btn-labeled btn-warning" style="position: absolute;">
                      <input type="hidden" name="id_promo" value="<?php echo $item['id_promo']?>">
                      <input type="hidden" name="kategori" value="belanja">
                      <span class="btn-label"><i class="fa fa-bookmark"></i></span>Save</button>
                      </form>
                <?php } ?>

               <?php }else if($this->session->userdata('logged_in') && $this->session->userdata('username') == 'admin'){?>
                  <form method="post" action="<?php echo base_url().'index.php/c_main/view_editpromo'?>">
                  <button type="submit"  class="btn btn-labeled btn-warning" style="position: absolute;">
                  <input type="hidden" name="id_promo" value="<?php echo $item['id_promo']?>">
                  <span class="btn-label"><i class="glyphicon glyphicon-bookmark"></i></span>Edit</button>
                  </form>
                <?php }?>
          
          <!--<span class="btn-label"><i class="glyphicon glyphicon-bookmark"></i></span><?php echo $item['toko']?></button>-->
         <!-- <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/id/0/06/Blibli-logo.png" class="img-responsive img-full"> -->
            <a href="<?php echo $item['linkurl'];?>" target="_blank"><img class="card-img-top" src="<?php echo $item['gambar'];?>"height ="200" width="400" class="img-responsive img-full" alt=""></a>
            <div class="card-body d-flex flex-column">
              <h6 class="card-title">
              <h6 class="card-title"><?php echo $item['title'];?></h6><br>
              </h6>
              <p class="card-text">Periode: <?php echo $item['periode'];?></p>
              <?php if($item['kodepromo'] == null){ ?>
              <p class="card-text"><small>Tanpa Kode Promo</small></p>
              <?php }else{ ?>
                <p class="card-text"><small>Kode Promo: </small></p>
                <p class="card-text" id="<?php echo $item['id_promo'];?>"><small><?php echo $item['kodepromo'];?></small></p><button onclick="copyToClipboard('#<?php echo $item['id_promo'];?>')" class="btn"><i class ="fa fa-bookmark-o"></i>Copy</button>
                
              <?php }?>
              <br></br>
              <?php 
              if($item['bataspromo'] != ''){?>
              <small> Promo Habis Dalam: </small>
              <?php $today = date("Y-m-d H:i:s");    
              $start_date = new DateTime($today);
              $since_start = $start_date->diff(new DateTime($item['bataspromo']));
              if($since_start->m !== 0){?>
                <small><font color="red"><?php echo $since_start->m.' bulan ';?>
                <?php echo $since_start->d.' hari ';?>
                <?php echo $since_start->h.' jam';?></small></font>
                <?php }else if($since_start->d !== 0){ ?>
                <small><font color="red"><?php echo $since_start->d.' hari ';?>
                <?php echo $since_start->h.' jam'; ?></small></font>
                <?php }else{?>
                <small><font color="red"> <?php  echo $since_start->h.' jam'; ?> </small></font>
              
              
                   <?php }}?>
              

              <a href="<?php echo $item['linkurl'];?>"target="_blank" class="btn btn-primary btn-block mt-auto">Lihat Detail</a>
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
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>

<!-- Footer -->
<footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>



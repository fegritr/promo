<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    
    
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/datepicker.css" rel="stylesheet">
    <link rel='stylesheet' id='dashicons-css'  href='https://static.tokopedia.net/promo/wp-includes/css/dashicons.min.css?ver=4.9.7' type='text/css' media='all' />
    <link rel='stylesheet' id='slickcss-css'  href='https://ecs7.tokopedia.net/assets/css/slick.css?ver=4.9.7' type='text/css' media='all' />
    <link rel='stylesheet' id='stylesheet-css'  href='https://static.tokopedia.net/promo/wp-content/themes/tkpd-promo/style.css?ver=4.9.7' type='text/css' media='all' />
    <link rel='stylesheet' id='mediaquery-css'  href='https://static.tokopedia.net/promo/wp-content/themes/tkpd-promo/assets/css/mediaquery.css?ver=4.9.7' type='text/css' media='all' />
    <link rel='stylesheet' id='opensans-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700&#038;ver=4.9.7' type='text/css' media='all' />
    <link rel='stylesheet' id='jetpack-widget-social-icons-styles-css'  href='https://static.tokopedia.net/promo/wp-content/plugins/jetpack/modules/widgets/social-icons/social-icons.css?ver=20170506' type='text/css' media='all' />
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
    <script type='text/javascript' src='https://static.tokopedia.net/promo/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
    <script type='text/javascript' src='https://static.tokopedia.net/promo/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
    <script type='text/javascript' src='https://ecs7.tokopedia.net/assets/js/slick.min.js?ver=4.9.7'></script>
    <script type='text/javascript' src='//cdn.freshmarketer.com/222317/774992.js?ver=4.9.7'></script>
    <script src="<?php echo base_url()?>assets/js/main.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
          <script>  
         $(function(){  
          $('.datepicker').datepicker({
            format: "yyyy-mm-dd"
          });
         });
         </script>
    
   
    

   
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/modern-business.css" rel="stylesheet">
  
  </head>

  <body>
  
      <!-- Navigation -->
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" style="font-size:25px; font-weight:bold;"href="<?php echo base_url()?>">MyPromo</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form action = "<?php echo base_url().'index.php/c_main/search'?>" method="post">
        <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search" >
                </div>
                
            </div>
            </form>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          
            

            <?php if(!$this->session->userdata('logged_in')){?>  
            <li class="nav-item">
              <a class="nav-link" style="border:dashed; margin-right:10px;" href="<?php echo base_url().'index.php/c_akun/login'?>">Login </a>
            </li>

             <li class="nav-item">
              <a class="nav-link" style="border:dashed;margin-right:10px;" href="<?php echo base_url().'index.php/c_akun/register'?>">Register</a>
            </li>
            <?php } else if($this->session->userdata('logged_in')){?>
            
              <?php if($this->session->userdata('username') == 'admin'){?>
                <li class="nav-item">
                <a class="nav-link" style="border:dashed;margin-right:10px;" href="<?php echo base_url().'index.php/c_main/view_admin'?>">Admin Page</a>
                </li>
                  
                  <?php } else{?>
                  <li class="nav-item">
                  <a class="nav-link" style="border:dashed;margin-right:10px;" href="<?php echo base_url().'index.php/c_main/view_profile'?>">Profile</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" style="border:dashed;margin-right:10px;" href="<?php echo base_url().'index.php/c_main/view_wishlist'?>">My Wishlist</a>
                  </li>
                  
                  <?php }?>
                  



             <li class="nav-item">
              <a class="nav-link" style="border:dashed;" href="<?php echo base_url().'index.php/c_akun/logout'?>">Logout</a>
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




<div class="container">
<br>
<center><h1>Edit Promo</h1></center>
  	<hr><br>
      <?php foreach($promo as $item){?>    
      <!-- edit form column -->
      <form method="post" action="<?php echo base_url().'index.php/c_updatepromo/update_data'?>">
       <center><a href="<?php echo $item['linkurl'];?>" target="_blank"><img class="card-img-top" src="<?php echo $item['gambar'];?>"height ="200" width="200" class="img-responsive img-full" style="width: fit-content; height:fit-content; "alt=""></a>
      <br></br></center>
      <div class="col-md-9 personal-info">
        
        <form class="form-horizontal" role="form">
        <div class="form-group">
            <label class="col-lg-3 control-label">Toko:</label>
            <div class="col-lg-8">
              <input class="form-control" name="title" type="text" value="<?php echo $item['toko'];?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Title:</label>
            <div class="col-lg-8">
              <input class="form-control" name="title" type="text" value="<?php echo $item['title'];?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Kode Promo:</label>
            <div class="col-lg-8">
              <input class="form-control" name="kodepromo" type="text" value="<?php echo $item['kodepromo'];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Periode:</label>
            <div class="col-lg-8">
              <input class="form-control" name="periode" type="text" value="<?php echo $item['periode'];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Masa Berlaku:</label>
            <div class="col-lg-8">
              <input class="datepicker" type="text" name="bataspromo" value="<?php echo $item['bataspromo'];?>" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Kategori:</label>
            <div class="col-lg-8">
              <input class="form-control" name="kategori" type="text" value="<?php echo $item['kategori'];?>">
            </div>
          </div>
         
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" name="id_promo"class="btn btn-primary" value="Save Changes">
              <input type="hidden" name="id_promo"class="btn btn-primary" value="<?php echo $item['id_promo'];?>">
              <span></span>

            </div>
          </div>
        </form>
      </div>
  </div>
</div>
</form>
<hr>
<?php }?>


    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->

  </body>

</html>


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
    <link href="<?php echo base_url()?>assets/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
    <link rel='stylesheet' id='stylesheet-css'  href='<?php echo base_url()?>assets/css/tokopediastyles.css' type='text/css' media='all' />
    <link rel='stylesheet' id='mediaquery-css'  href='<?php echo base_url()?>assets/css/tokopediastyles2.css' type='text/css' media='all' />  
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="<?php echo base_url()?>assets/js/main.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.js"></script>
   
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
 <?php if($this->session->flashdata('login_failed')):?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>';?>
  <?php endif;?>
   <?php if($this->session->flashdata('user_loggedin')):?>
    <?php $this->session->flashdata('user_loggedin');?>
  <?php endif;?>
  <?php if($this->session->flashdata('user_loggedout')):?>
    <?php $this->session->flashdata('user_loggedout');?>
  <?php endif;?>


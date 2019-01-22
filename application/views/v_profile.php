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

</style>

<style type="text/css">
div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
    .button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #ff2965;
    }
    .button1:hover {
    background-color: #ff2965;
    color: white;
    }

    </style>
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->


      <!-- Intro Content -->
      <br><br>
    <center><h2><b>Profile</h2></center></b>
      <hr><br>

      <div class="row">
              
        <div class="col-lg-3">
        <br><br>
          <img class="img-fluid rounded mb-4" src="http://www.personalbrandingblog.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640-300x300.png" alt="">
        </div>
        
        <div class="col-lg-6">
        <br>
            <h4><b><?php echo $profil->nama; ?></b> </h4><hr>
            <h4><i class="fa fa-envelope"></i> : <?php echo $profil->email; ?> </h4><hr>
            <h4><i class="fa fa-address-card"></i> : <?php echo $profil->nohp; ?> </h4><hr>
            <h4><i class="fa fa-calendar"></i> : <?php echo $profil->tanggallahir; ?><h4><hr>
            <h4><i class="fa fa-transgender"></i> : <?php echo $profil->jeniskelamin; ?> </h4><hr>

        </div>
        <div class="col-lg-3" style="margin:auto; font-size:45px;">
        <form method="post" action="<?php echo base_url().'index.php/c_main/view_editakun'?>">
        <button type="submit"  class="btn button1" style="font-size: x-small;">
        <input type="hidden" name="id_akun" value="<?php echo $profil->id_akun; ?>">
        <span class="btn-label"><i class="fa fa-gear"></i></span> Edit</button></form>

      </div>
      <!-- /.row -->

      <!-- /.row -->


    </div>
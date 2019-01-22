<div class="container">
<br><br>
<center><b><h1>Tambah Scraper</h1></b></center>
  	<hr><br>
  	 
      <!-- edit form column -->
      <form method="post" action="<?php echo base_url().'index.php/c_main/tambah_scrap'?>">
      <div class="col-md-9 personal-info">
        
        <form class="form-horizontal" role="form">
        <div class="form-group">
            <label class="col-lg-6 control-label">Toko: <font color ="red">*</font></label>
            <div class="col-lg-8">
              <input class="form-control" name="toko" type="text" value="" required>
            </div>
          </div><div class="form-group">
            <label class="col-lg-6 control-label">Kategori: <font color ="red">*</font></label>
            <div class="col-lg-8">
              <input class="form-control" name="kategori" type="text" value='' required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-6 control-label">Url Target: <font color ="red">*</font></label>
            <div class="col-lg-8">
              <input class="form-control" name="urltarget" type="text" value="" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-6 control-label">Regex Title: <font color ="red">*</font></label>
            <div class="col-lg-8">
              <input class="form-control" name="regextitle" type="text" value='' required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-6 control-label">Regex Gambar: <font color ="red">*</font></label>
            <div class="col-lg-8">
              <input class="form-control" name="regexgambar" type="text" value='' required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-6 control-label">Add Url: (Jika Diperlukan)</label>
            <div class="col-lg-8">
              <input class="form-control" name="addurlgambar" type="text" value=''>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-6 control-label">Regex Link Promo: <font color ="red">*</font></label>
            <div class="col-lg-8">
              <input class="form-control" name="regexlinkpromo" type="text" value='' required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-6 control-label">Add Url: (Jika Diperlukan)</label>
            <div class="col-lg-8">
              <input class="form-control" name="addurllinkpromo" type="text" value=''>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
            
              <input type="submit" name="id_target"class="btn btn-primary" value="Tambah">
              <span></span>

            </div>
          </div>
        </form>
      </div>
  </div>
</div>
</form>
<hr>


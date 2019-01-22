<div class="container">
<br>
    <center><h1>Edit Scraper</h1></center>
  	<hr><br>
      <?php foreach($scrap as $item){?>    
      <!-- edit form column -->
      <form method="post" action="<?php echo base_url().'index.php/c_updatepromo/update_data_scrap'?>">

      <div class="col-md-9 personal-info">
        
        <form class="form-horizontal" role="form">
        <div class="form-group">
            <label class="col-lg-3 control-label">Toko:</label>
            <div class="col-lg-8">
              <input class="form-control" name="toko" type="text" value="<?php echo $item['toko'];?>" autocomplete="off" required>
            </div>
          </div><div class="form-group">
            <label class="col-lg-3 control-label">Kategori:</label>
            <div class="col-lg-8">
              <input class="form-control" name="kategori" type="text" value='<?php echo $item['kategori'];?>' autocomplete="off" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Url Target:</label>
            <div class="col-lg-8">
              <input class="form-control" name="urltarget" type="text" value="<?php echo $item['urltarget'];?>" autocomplete="off" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Regex Title:</label>
            <div class="col-lg-8">
              <input class="form-control" name="regextitle" type="text" value='<?php echo $item['regextitle'];?>' autocomplete="off" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Regex Gambar:</label>
            <div class="col-lg-8">
              <input class="form-control" name="regexgambar" type="text" value='<?php echo $item['regexgambar'];?>' autocomplete="off" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-6 control-label">Add Url: (Jika Diperlukan)</label>
            <div class="col-lg-8">
              <input class="form-control" name="addurlgambar" type="text" value='<?php echo $item['addurlgambar'];?>' autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Regex Link Promo:</label>
            <div class="col-lg-8">
              <input class="form-control" name="regexlinkpromo" type="text" value='<?php echo $item['regexlinkpromo'];?>' autocomplete="off" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-6 control-label">Add Url: (Jika Diperlukan)</label>
            <div class="col-lg-8">
              <input class="form-control" name="addurllinkpromo" type="text" value='<?php echo $item['addurllinkpromo'];?>' autocomplete="off">
            </div>
          </div>
         
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" name="id_target"class="btn btn-primary" value="Save Changes">
              <input type="hidden" name="id_target"class="btn btn-primary" value="<?php echo $item['id_target'];?>">
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

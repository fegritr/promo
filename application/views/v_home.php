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
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('https://ecs7.tokopedia.net/img/blog/promo/2018/03/02-Promo-microsite-1702x213.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Tokopedia</h3>
              <p>-</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('https://ecs7.tokopedia.net/img/blog/promo/2018/03/1702X213.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Tokopedia</h3>
              <p>-</p>
            </div>
          </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <section id="categories">
	<div class="container">
	  <div class="row">
		<div class="col-sm-12 cat-column">
		  <div class="cat-list clearfix">
			
						  
			  <a href="<?php echo base_url().'index.php/c_main/view_belanja'?>" class="cat-list__item 
									">
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
      <!-- Portfolio Section -->
      <br></br>
      <h2>Tokopedia</h2>
      <?php $numOfCols = 3; 
      $rowCount = 0;
      $i=0;
      $bootstrapColWidth = 12 / $numOfCols;?>
      <div class="row">

      <?php foreach($tokopedia as $item){?>
      
        <div class="col-lg-<?php echo $bootstrapColWidth;?> portfolio-item">
          <div class="card h-100">
          <?php if($this->session->userdata('logged_in') && $this->session->userdata('username')!= 'admin'){?>
              <?php $saved_id_promo = unserialize($this->session->userdata('id_promo'));?>
              <?php if(!in_array($item['id_promo'], $saved_id_promo)){?>
                      <form method="post" action="<?php echo base_url().'index.php/c_akun/save_promo'?>">
                      <button type="submit"  class="btn button1" style="position: absolute;">
                      <input type="hidden" name="id_promo" value="<?php echo $item['id_promo']?>">
                      <input type="hidden" name="kategori" value="<?php echo $item['kategori']?>">
                      <span class="btn-label"><i class="fa fa-check"></i></span></button>
                      </form>
                <?php } ?>

               <?php }else if($this->session->userdata('logged_in') && $this->session->userdata('username') == 'admin'){?>
                  <form method="post" action="<?php echo base_url().'index.php/c_main/view_editpromo'?>">
                  <button type="submit"  class="btn button1" style="position: absolute;">
                  <input type="hidden" name="id_promo" value="<?php echo $item['id_promo']?>">
                  <span class="btn-label"><i class="fa fa-edit"></i></span></button>
                  </form>
                <?php }?>
          
          
          <!--<span class="btn-label"><i class="glyphicon glyphicon-bookmark"></i></span><?php echo $item['toko']?></button>-->
         <!-- <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/id/0/06/Blibli-logo.png" class="img-responsive img-full"> -->
            <a href="<?php echo $item['linkurl'];?>"target="_blank"><img class="card-img-top" src="<?php echo $item['gambar'];?>"height ="200" width="400" class="img-responsive img-full" alt=""></a>
            <div class="card-body d-flex flex-column">
              <h6 class="card-title">
              <h6 class="card-title"style="font-weight: bold;height:38px;"><?php echo $item['title'];?></h6><br>
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
                <small><font color="red"><i class="fa fa-clock-o"> </i> <?php echo $since_start->m.' bulan ';?>
                <?php echo $since_start->d.' hari ';?>
                <?php echo $since_start->h.' jam';?></small></font>
                <?php }else if($since_start->d !== 0){ ?>
                <small><font color="red"><i class="fa fa-clock-o"> </i> <?php echo $since_start->d.' hari ';?>
                <?php echo $since_start->h.' jam'; ?></small></font>
                <?php }else{?>
                <small><font color="red"><i class="fa fa-clock-o"> </i>  <?php  echo $since_start->h.' jam'; ?> </small></font>
              
              
                   <?php }}?>
              <a href="<?php echo $item['linkurl'];?>"target="_blank" class="btn btn-primary btn-block mt-auto" style="background-color:#FF2965; border:none; ">Lihat Detail</a>
            </div>
          </div>
        </div>
        
        
        <?php $rowCount++; $i++;
          if($rowCount % $numOfCols == 0) echo '</div><div class="row">';?>
          <?php if($i == 3){
            break;
          }?>
        
      <?php }?>

        <br></br>
      <h2>Traveloka</h2>
      <?php $numOfCols = 3; 
      $rowCount = 0;
      $i=0;
      $bootstrapColWidth = 12 / $numOfCols;?>
      <div class="row">

      <?php foreach($traveloka as $item){?>
      
        <div class="col-lg-<?php echo $bootstrapColWidth;?> portfolio-item">
          <div class="card h-100">
          <?php if($this->session->userdata('logged_in') && $this->session->userdata('username')!= 'admin'){?>
              <?php $saved_id_promo = unserialize($this->session->userdata('id_promo'));?>
              <?php if(!in_array($item['id_promo'], $saved_id_promo)){?>
                      <form method="post" action="<?php echo base_url().'index.php/c_akun/save_promo'?>">
                      <button type="submit"  class="btn button1" style="position: absolute;">
                      <input type="hidden" name="id_promo" value="<?php echo $item['id_promo']?>">
                      <span class="btn-label"><i class="fa fa-check"></i></span></button>
                      </form>
                <?php } ?>

               <?php }else if($this->session->userdata('logged_in') && $this->session->userdata('username') == 'admin'){?>
                  <form method="post" action="<?php echo base_url().'index.php/c_main/view_editpromo'?>">
                  <button type="submit"  class="btn button1" style="position: absolute;">
                  <input type="hidden" name="id_promo" value="<?php echo $item['id_promo']?>">
                  <span class="btn-label"><i class="fa fa-edit"></i></span></button>
                  </form>
                <?php }?>
          
          <!--<span class="btn-label"><i class="glyphicon glyphicon-bookmark"></i></span><?php echo $item['toko']?></button>-->
         <!-- <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/id/0/06/Blibli-logo.png" class="img-responsive img-full"> -->
            <a href="<?php echo $item['linkurl'];?>"target="_blank"><img class="card-img-top" src="<?php echo $item['gambar'];?>"height ="200" width="400" class="img-responsive img-full" alt=""></a>
            <div class="card-body d-flex flex-column">
              <h6 class="card-title">
              <h6 class="card-title"style="font-weight: bold;height:38px;"><?php echo $item['title'];?></h6><br>
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
                <small><font color="red"><i class="fa fa-clock-o"> </i> <?php echo $since_start->m.' bulan ';?>
                <?php echo $since_start->d.' hari ';?>
                <?php echo $since_start->h.' jam';?></small></font>
                <?php }else if($since_start->d !== 0){ ?>
                <small><font color="red"><i class="fa fa-clock-o"> </i> <?php echo $since_start->d.' hari ';?>
                <?php echo $since_start->h.' jam'; ?></small></font>
                <?php }else{?>
                <small><font color="red"><i class="fa fa-clock-o"> </i>  <?php  echo $since_start->h.' jam'; ?> </small></font>
              
              
                   <?php }}?>
              <a href="<?php echo $item['linkurl'];?>"target="_blank" class="btn btn-primary btn-block mt-auto" style="background-color:#FF2965; border:none; ">Lihat Detail</a>
            </div>
          </div>
        </div>
        <?php $rowCount++; $i++;
          if($rowCount % $numOfCols == 0) echo '</div><div class="row">';?>
          <?php if($i == 3){
            break;
          }?>
        
      <?php }?>
        

      
       <br></br>
      <h2>Shopee</h2>
      <?php $numOfCols = 3; 
      $rowCount = 0;
      $i=0;
      $bootstrapColWidth = 12 / $numOfCols;?>
      <div class="row">

      <?php foreach($shopee as $item){?>
      
        <div class="col-lg-<?php echo $bootstrapColWidth;?> portfolio-item">
          <div class="card h-100">
          <?php if($this->session->userdata('logged_in') && $this->session->userdata('username')!= 'admin'){?>
              <?php $saved_id_promo = unserialize($this->session->userdata('id_promo'));?>
              <?php if(!in_array($item['id_promo'], $saved_id_promo)){?>
                      <form method="post" action="<?php echo base_url().'index.php/c_akun/save_promo'?>">
                      <button type="submit"  class="btn button1" style="position: absolute;">
                      <input type="hidden" name="id_promo" value="<?php echo $item['id_promo']?>">
                      <span class="btn-label"><i class="fa fa-check"></i></span></button>
                      </form>
                <?php } ?>

               <?php }else if($this->session->userdata('logged_in') && $this->session->userdata('username') == 'admin'){?>
                  <form method="post" action="<?php echo base_url().'index.php/c_main/view_editpromo'?>">
                  <button type="submit"  class="btn button1" style="position: absolute;">
                  <input type="hidden" name="id_promo" value="<?php echo $item['id_promo']?>">
                  <span class="btn-label"><i class="fa fa-edit"></i></span></button>
                  </form>
                <?php }?>
          
          <!--<span class="btn-label"><i class="glyphicon glyphicon-bookmark"></i></span><?php echo $item['toko']?></button>-->
         <!-- <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/id/0/06/Blibli-logo.png" class="img-responsive img-full"> -->
            <a href="<?php echo $item['linkurl'];?>" target="_blank"><img class="card-img-top" src="<?php echo $item['gambar'];?>"height ="200" width="400" class="img-responsive img-full" alt=""></a>
            <div class="card-body d-flex flex-column">
              <h6 class="card-title">
              <h6 class="card-title"style="font-weight: bold;height:38px;"><?php echo $item['title'];?></h6><br>
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
                <small><font color="red"><i class="fa fa-clock-o"> </i> <?php echo $since_start->m.' bulan ';?>
                <?php echo $since_start->d.' hari ';?>
                <?php echo $since_start->h.' jam';?></small></font>
                <?php }else if($since_start->d !== 0){ ?>
                <small><font color="red"><i class="fa fa-clock-o"> </i> <?php echo $since_start->d.' hari ';?>
                <?php echo $since_start->h.' jam'; ?></small></font>
                <?php }else{?>
                <small><font color="red"><i class="fa fa-clock-o"> </i>  <?php  echo $since_start->h.' jam'; ?> </small></font>
              
              
                   <?php }}?>
              <a href="<?php echo $item['linkurl'];?>"target="_blank" class="btn btn-primary btn-block mt-auto" style="background-color:#FF2965; border:none; ">Lihat Detail</a>
            </div>
          </div>
        </div>
        <?php $rowCount++; $i++;
          if($rowCount % $numOfCols == 0) echo '</div><div class="row">';?>
          <?php if($i == 3){
            break;
          }?>
        
      <?php }?>

      
      
            </div>
          </div>
      </div>
    </div>

     
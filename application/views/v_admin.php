
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
        
        <?php if($this->session->flashdata('promo_updated') == 'success'):?>
        <?php echo '<br><p class="alert alert-danger">'.$this->session->flashdata('count_add').' Promo Telah Ditambahkan dan '.$this->session->flashdata('count_del').' Promo Telah Dihapus ('.$this->session->flashdata('toko').' - '.$this->session->flashdata('kategori').')</p>';?>
        <?php endif;?>
<!-- Page wrapper  -->
<div class="page-wrapper">
            <!-- Bread crumb -->
            <br><br>
            <b><center><h2>ADMIN PAGE</h2></center></b> 
            <hr>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">                   
                <br>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-lg-12 main-chart">
                    <form method="post" action="<?php echo base_url().'index.php/c_main/tambah_scrap'?>">
                    <button type="submit"  class="btn button1">
                    <span class="btn-label"><i class="fa fa-plus"></i></span> Tambah</button></form>
                    <br>
                    
                        
                    <table id="example" class="display nowrap" style="width:100%">
                    
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Action</th>
                                            <th>Toko</th>
                                            <th>Kategori</th>
                                            <th>Last Update</th>
                                            <th>Url Target</th>
                                            <th>Regex Title</th>
                                            <th>Regex Gambar</th>
                                            <th>Added Url Gambar</th>
                                            <th>Regex Link Promo</th>
                                            <th>Added Url Link Promo</th>
                                            <th>Hapus</th>
                                            
                                            
                                        </tr>
                                    </thead>

                            <tbody>
                            <?php $i=1;
                                foreach ($scrap as $p) {
                                    $aktif = true;?>
                                <tr>
                                    <td><?php echo $i?></td>
                                    <td><form method="post" action="<?php echo base_url().'index.php/c_main/view_edit_scrap'?>">
                                    <button type="submit"  class="btn button1" style="font-size: x-small;">
                                    <input type="hidden" name="id_target" value="<?php echo $p['id_target']?>">
                                    <span class="btn-label"><i class="fa fa-edit"></i></span> Edit</button>
                                    </form>
                                    <form method="post" action="<?php echo base_url().'index.php/c_updatepromo/updatepromo'?>">
                                    <button type="submit"  class="btn button1" style="font-size: x-small;">
                                    <input type="hidden" name="id_target" value="<?php echo $p['id_target']?>">
                                    <span class="btn-label"><i class="fa fa-refresh"></i></span> Update</button>
                                    </form>
                                    </form>
                                    </td>
                                    <td><?php echo $p['toko'] ?></td>
                                    <td><?php echo $p['kategori'] ?></td>
                                    <td><?php echo $p['lastupdate'] ?></td>
                                    <td><?php echo $p['urltarget'] ?></td>
                                    <td><xmp><?php echo $p['regextitle'] ?></xmp></td>
                                    <td><xmp><?php echo $p['regexgambar'] ?></xmp></td>
                                    <td><?php echo $p['addurlgambar'] ?></td>
                                    <td><xmp><?php echo $p['regexlinkpromo'] ?></xmp></td>
                                    <td><?php echo $p['addurllinkpromo'] ?></td>
                                    <td><form method="post" action="<?php echo base_url().'index.php/c_updatepromo/delete_data_scrap'?>">
                                    <button type="submit"  class="btn button1" style="font-size: x-small;">
                                    <input type="hidden" name="id_target" value="<?php echo $p['id_target']?>">
                                    <span class="btn-label"><i class="fa fa-trash"></i></span> Delete</button>
                                    </form></td>
                                    
                                    
                                </tr>
                            <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>  
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. Template designed by Colorlib</footer>
            <!-- End footer -->
        </div>
        </script>
        <!-- End Page wrapper  -->
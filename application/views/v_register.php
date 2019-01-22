<?php echo validation_errors();?>

<?php echo form_open('c_akun/register'); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center">Register</h1>
			    <div class="form-group">
			    	<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
			    </div>
			    <div class="form-group">
			    	<input type="email" name="email" id="email" class="form-control" placeholder="Email">
			    </div>
			    <div class="form-group">
			    	<input type="text" name="nohp" id="nohp" class="form-control" placeholder="Nomor Handphone">
			    </div>

			    <div class="form-group">
			    	<input type="text" name="username" id="username" class="form-control" placeholder="Username">
                </div>
                            
                <div class="form-group">
			    	<input type="password" name="password" id="password" class="form-control" placeholder="Password">
			    </div>

			    			
			    			
			    <input type="submit" value="Register" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    	





<?php echo form_close(); ?>
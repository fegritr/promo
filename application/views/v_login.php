<?php echo form_open('c_akun/login');?>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center">Login</h1>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
</div>
</div>
<?php echo form_close();?>
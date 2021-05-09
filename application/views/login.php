<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
    </head>
<body>
	<div class="container">
		<h1 class="text-center"><span>Please do Login here</span></h1>

		<?php
		$success_msg= $this->session->flashdata('success_msg');
		$error_msg= $this->session->flashdata('error_msg');

		if($success_msg){
		?>
		<div class="alert alert-success">
			<?php echo $success_msg; ?>
		</div>
		<?php
			}
			if($error_msg){
			?>
			<div class="alert alert-danger">
				<?php echo $error_msg; ?>
			</div>
			<?php
			}
		?>
	 <form role="form" method="post" class="form-horizontal" action="<?php echo base_url('user/login_user'); ?>">
	 	<div class="col-sm-6 col-sm-offset-3">

		    <div class="form-group">
		      <label class="control-label col-sm-3">Email:</label>
		      <div class="col-sm-9">
		        <input class="form-control" placeholder="Please enter E-mail" name="email" type="email" autofocus>
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Password:</label>
		      <div class="col-sm-9">
		        <input class="form-control" placeholder="Enter Password" name="password" type="password" value="">
		      </div>
		    </div>

		    <div class="text-center form-group">
		    	<div class="col-sm-12">
		    	<input class="btn btn-lg btn-success btn-block" type="submit" value="Login" name="Login" >
		    	</div>
		    </div>

	 	</div>
	 </form>
	 </div>
	 <div class="container">
	 	<center><b>You are not registered ?</b> <br></b><a href="<?php echo base_url('user'); ?>">Register here</a></center>

	 </div>


	<script type="text/javascript" src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Categories</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
    </head>
    <div class="text-left">
    	<a href="<?php echo base_url('admin/show_category');?>" >  <button type="button" class="btn-primary">Manage categories</button></a>
    	<a href="<?php echo base_url('admin/show_vehical');?>" >  <button type="button" class="btn-primary">Manage vehicals</button></a>
    	<?php if($this->session->userdata('admin_type')=='super'){ ?>
    		<a href="<?php echo base_url('admin/show_bookings');?>" >  <button type="button" class="btn-primary">Manage Booking</button></a>
    	<?php } ?>
    </div>
    <div class="text-right">
    	<a href="<?php echo base_url('admin/user_logout');?>" >  <button type="button" class="btn-primary">Logout</button></a>
    </div>
<body>
	<div class="container">
		<h1 class="text-center"><span>Category List</span></h1>

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
		<table class="table table-bordered table-striped">
		    <tr>
		      <th colspan="2"><h4 class="text-center">Category list</h3></th>
		    </tr>
		    <tr>
		        <td><b>Id</b></td>
		        <td><b>Category Name</b></td>
		      </tr>
			<?php if(count($category_list)>0){
				foreach($category_list as $key => $val){ ?>
					<tr>
						<td><?php echo $val['id'];?></td>
						<td><a href="<?php echo base_url('user/booking_form/'.$val['id']); ?>"><?php echo $val['category_name'];?></a></td>
					</tr>
				<?php } ?>
			 <?php } ?>
		  </table>

	 </div>
	<script type="text/javascript" src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
</body>
</html>

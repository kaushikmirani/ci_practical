<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Booking</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
    </head>
    <div class="text-right">
    	<a href="<?php echo base_url('user/user_logout');?>" >  <button type="button" class="btn-primary">Logout</button></a>
    </div>
<body>
	<div class="container">
	 <h1 class="text-center"><span>Vehicle Booking</span></h1>

	 <form method="POST" class="form-horizontal" id="booking_form" action="<?php echo base_url('user/submit_booking_form'); ?>">
	 	<input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
	 	<div class="col-sm-6 col-sm-offset-3">
	 		<div class="form-group">
		      <label class="control-label col-sm-3">Select Vehicle:</label>
		      <div class="col-sm-9">
		        <select class="form-control required" name="vehicals">
		        	<option>-- Select --</option>
		        	<?php if(count($vehical_list)>0){
						foreach($vehical_list as $key => $val){ ?>
							<option value="<?php echo $val['id'];?>"><?php echo $val['vehical_name'];?></option>
						<?php } ?>
					 <?php } ?>
		        </select>
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Select Date:</label>
		      <div class="col-sm-9">
		        <input type="date" class="form-control required" placeholder="date" name="date">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Booking For:</label>
		      <div class="col-sm-9">
		        <select class="form-control required" id="book_for" name="booking_for">
		        	<option value="0">-- Select --</option>
		        	<option value="hourly">Hourly</option>
		        	<option value="full">Full Day</option>
		        	<option value="half">Half Day</option>
		        </select>
		      </div>
		    </div>

		    <div class="form-group" id="bk_session" style="display:none">
		      <label class="control-label col-sm-3">Booking session:</label>
		      <div class="col-sm-9">
		        <select class="form-control" name="booking_session">
		        	<option value="0">-- Select --</option>
		        	<option value="m">Morning</option>
		        	<option value="e">Evening</option>
		        </select>
		      </div>
		    </div>
		    <div class="form-group" id="bk_session_hourly" style="display:none">
		      <label class="control-label col-sm-3">Hours:</label>
		      <div class="col-sm-9">
		        <input type="number" class="form-control" placeholder="Enter Hours" name="hours">
		      </div>
		    </div>


		    <div class="form-group">
		      <label class="control-label col-sm-3">Name:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control required" placeholder="Enter Name" name="name" value="<?php echo $this->session->userdata('user_name');?>" readonly>
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Email:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control required" placeholder="Enter Email" name="email" value="<?php echo $this->session->userdata('email');?>" readonly>
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Phone:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control required" placeholder="Enter Phone Number" name="phone_number">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Date Of Birth:</label>
		      <div class="col-sm-9">
		        <!-- <input type="text" class="form-control required" placeholder="DD\MM\YYYY"> -->
		        <input type="date" class="form-control required" placeholder="Birth Date" name="birth_date">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Address:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control required" placeholder="Address" name="address">
		      </div>
		    </div>


		    <div class="form-group">
		      <label class="control-label col-sm-3">ZIP:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control required" placeholder="ZIP Code" name="zip_code">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">City:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control required" placeholder="City" name="city">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">State:</label>
		      <div class="col-sm-9">
		        <input type="text" class="form-control" placeholder="State" name="state">
		      </div>
		    </div>

		    <div class="text-center">
		    	<!-- <a href="#" class="btn btn-default">Submit</a> -->
		    	<input class="btn btn-lg btn-success btn-block" type="submit" value="Submit" name="Submit" >
		    </div>

	 	</div>
	 </form>
	 </div>


	<script type="text/javascript" src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
	 <script type="text/javascript">
	 	$("#book_for").change(function() {
			if($(this).val()=="half"){
				$("#bk_session").show();
				$("#bk_session_hourly").hide();
			}else if($(this).val()=="hourly"){
				$("#bk_session").hide();
				$("#bk_session_hourly").show();
			}else{
				$("#bk_session").hide();
				$("#bk_session_hourly").hide();
			}
		});

	 	$(document).ready(function() {
	 		$("#booking_form").validate();
	 	});
	 </script>
</body>
</html>

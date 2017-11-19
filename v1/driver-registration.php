<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DDebbie | Driver Sign Up</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php
	$msg = "";
	include_once("conf.php");
	if(isset($_POST['driver_name'])){
		$email = trim($_POST['email']);
		$driver_name = trim($_POST['driver_name'])." ".trim($_POST['driver_last_name']);
		$password = trim($_POST['password']);
		$licence_num = trim($_POST['licence_num']);
		$licence_type = trim($_POST['licence_type']);
		$postal_code = trim($_POST['postal_code']);
		$contact_number = trim($_POST['contact_number']);
		$address = trim($_POST['address']);
		$rdKeys = array();
		if(isset($_POST['headlight'])){
			foreach($_POST['headlight'] as $key=>$val){
				$rdKeys[] = $key;
			}
		}
		
		
		if(!empty($email) && !empty($driver_name) && !empty($password) && !empty($licence_num) && !empty($postal_code)){
			$emailExist = mysql_query("SELECT id FROM tbl_drivers where email='".addslashes($email)."'");
			if(mysql_num_rows($emailExist)>0){
				$msg = "Email already registered with us.";
			}else{
			
				$vefication_code = rand ( 111111 , 999999 );
			
				$dRe = mysql_query("INSERT INTO `tbl_drivers` (`email`, `driver_name`, `password`, `contact_number`, `address`, `licence_num`, `licence_type`, `postal_code`, `vefication_code`) VALUES 
				('".addslashes($email)."', '".addslashes($driver_name)."', '".addslashes(md5($password))."', '".addslashes($contact_number)."', '".addslashes($address)."', '".addslashes($licence_num)."','".addslashes($licence_type)."', '".addslashes($postal_code)."', '".$vefication_code."');");
				if($dRe){
					$driver_id = mysql_insert_id();
					foreach($_POST['vehicle_type'] as $key=>$val){
						$vInfo = array(	array(0=>1),
										array(1=>1),
										array(2=>1),
										array(3=>1),
										array(4=>1),
										array(5=>1),
										array(6=>1),
										array(7=>1),
										array(8=>1),
										array(9=>1),
										array(10=>1),
										array(11=>1),
										array(12=>1),
										array(13=>1),
										array(14=>1),
										array(15=>1),
										array(16=>1),
										array(17=>1),
										array(18=>1),
										array(19=>1),
										array(20=>1),
										array(21=>1),
										array(22=>1));
						if(isset($_POST['headlight'][$rdKeys[$key]])){
							$vInfo[0] = array(0 => $_POST['headlight'][$rdKeys[$key]]);
						}
						if(isset($_POST['taillight'][$rdKeys[$key]])){
							$vInfo[1] = array(1 => $_POST['taillight'][$rdKeys[$key]]);
						}
						if(isset($_POST['turnindicat'][$rdKeys[$key]])){
							$vInfo[2] = array(2 => $_POST['turnindicat'][$rdKeys[$key]]);
						}
						if(isset($_POST['rightfront'][$rdKeys[$key]])){
							$vInfo[3] = array(3 => $_POST['rightfront'][$rdKeys[$key]]);
						}
						if(isset($_POST['leftfront'][$rdKeys[$key]])){
							$vInfo[4] = array(4 => $_POST['leftfront'][$rdKeys[$key]]);
						}
						if(isset($_POST['rightrear'][$rdKeys[$key]])){
							$vInfo[5] = array(5 => $_POST['rightrear'][$rdKeys[$key]]);
						}
						if(isset($_POST['leftrear'][$rdKeys[$key]])){
							$vInfo[6] = array(6 => $_POST['leftrear'][$rdKeys[$key]]);
						}
						if(isset($_POST['parkingbreaks'][$rdKeys[$key]])){
							$vInfo[7] = array(7 => $_POST['parkingbreaks'][$rdKeys[$key]]);
						}
						if(isset($_POST['windowshield'][$rdKeys[$key]])){
							$vInfo[8] = array(8 => $_POST['windowshield'][$rdKeys[$key]]);
						}
						if(isset($_POST['wswipers'][$rdKeys[$key]])){
							$vInfo[9] = array(9 => $_POST['wswipers'][$rdKeys[$key]]);
						}
						if(isset($_POST['windows'][$rdKeys[$key]])){
							$vInfo[10] = array(10 => $_POST['windows'][$rdKeys[$key]]);
						}
						if(isset($_POST['doors'][$rdKeys[$key]])){
							$vInfo[11] = array(11 => $_POST['doors'][$rdKeys[$key]]);
						}
						if(isset($_POST['horn'][$rdKeys[$key]])){
							$vInfo[12] = array(12 => $_POST['horn'][$rdKeys[$key]]);
						}
						if(isset($_POST['speedometer'][$rdKeys[$key]])){
							$vInfo[13] = array(13 => $_POST['speedometer'][$rdKeys[$key]]);
						}
						if(isset($_POST['bumper'][$rdKeys[$key]])){
							$vInfo[14] = array(14 => $_POST['bumper'][$rdKeys[$key]]);
						}
						if(isset($_POST['mufflers'][$rdKeys[$key]])){
							$vInfo[15] = array(15 => $_POST['mufflers'][$rdKeys[$key]]);
						}
						if(isset($_POST['mirrors'][$rdKeys[$key]])){
							$vInfo[16] = array(16 => $_POST['mirrors'][$rdKeys[$key]]);
						}
						if(isset($_POST['seaftybelts'][$rdKeys[$key]])){
							$vInfo[17] = array(17 => $_POST['seaftybelts'][$rdKeys[$key]]);
						}
						if(isset($_POST['trightfront'][$rdKeys[$key]])){
							$vInfo[18] = array(18 => $_POST['trightfront'][$rdKeys[$key]]);
						}
						if(isset($_POST['tleftfront'][$rdKeys[$key]])){
							$vInfo[19] = array(19 => $_POST['tleftfront'][$rdKeys[$key]]);
						}
						if(isset($_POST['trightrear'][$rdKeys[$key]])){
							$vInfo[20] = array(20 => $_POST['trightrear'][$rdKeys[$key]]);
						}
						if(isset($_POST['tleftrear'][$rdKeys[$key]])){
							$vInfo[21] = array(21 => $_POST['tleftrear'][$rdKeys[$key]]);
						}
						$wheel_chair_facility = 0;
						if(isset($_POST['wheel_chair_facility'][$rdKeys[$key]])){
							$wheel_chair_facility = $_POST['wheel_chair_facility'][$rdKeys[$key]];
						}
						$inspectionDetails = json_encode($vInfo);
						$vehReg = mysql_query("INSERT INTO `tbl_driver_vehicles` (`vehicle_type`, `vehicle_number`, `year`, `model`, `num_of_doors`, `ownership`, `licensing`, `insurance_comp_name`, `inspection_details`, wheel_chair_facility, `driver_id`) VALUES 
				('".addslashes($val)."', '".addslashes(trim($_POST['vehicle_number'][$key]))."', '".addslashes(trim($_POST['year'][$key]))."', '".addslashes(trim($_POST['vehicles_model'][$key]))."', '".addslashes(trim($_POST['num_of_doors'][$key]))."', '".addslashes(trim($_POST['ownership'][$key]))."', '".addslashes(trim($_POST['licensing'][$key]))."', '".addslashes(trim($_POST['insurance_comp_name'][$key]))."','".$inspectionDetails."','".$wheel_chair_facility."','".$driver_id."');");
				
					}
					/**/
					$msg = "Registered successfully.";
					//$msg = "Registered successfully. Please check inbox of ".trim($_POST['email'])." for verification.";
				}else{
					$msg = "Internal error occurred please try again later.";
				}
			}
			
			
		}else{
			$msg = "Please enter all the fields marked with *.";
		}
	}
?>
<div class="navbar required-nav">
	<div class="col-lg-2">
		<div class="navbar-brand">
		<a href="index.html"><img src="img/logo.png" class="img-responsive logo"/></a>
		<div class="clearfix"></div>
		</div>
	<div class="clearfix"></div>
	</div>
	<div class="col-lg-10" style="padding-bottom: 10px;">
		<div class="col-lg-4" style="padding-right: 55px;"><img src="img/cars.png" class="img-responsive cars"/></div>
		<div class="col-lg-6 col-md-5 col-sm-5 col-xs-6 visible-lg topnav pull-right">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
				<a class="driver" href="driver.php"><h3>Driver Sign Up</h3></a> 
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
				<a class="customer" href="about.html"><h3>About Us</h3></a> 
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
				<a class="customer" href="contact.php"><h3>Contact Us</h3></a>
			</div>
		</div>
	</div>
</div>
    <!-- Navigation -->
    <div class="navigation12 hidden-lg">
  <!--  <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i>  Menu</a>-->
    <nav id="primary_nav">
  <a href="#" id="mobile_nav"><i class="glyphicon glyphicon-align-justify"></i></a>
  		<ul class="navside">
              <li><a href="driver.php">Driver Sign Up</a></li>
              <li><a href="about.html">About Us</a></li>
              <li><a href="contact.php">Contact Us</a></li>
  		</ul>
  	</nav>
</div>
    <!-- Header -->

<section>
	<form action="" method="post">
		<div class="container ">
			<div class="row form-div">
			  <div class="col-lg-12">
				<div class="col-lg-4">
				  
				</div>
				  <div class="col-lg-8">
					<h1>DRIVER'S SIGN UP FORM</h1>
				  </div>
			  </div>
			</div><!--ROW ENDS-->
			<div class="row form-div">
			  <!--<div class="col-lg-12 blue">
				<div class="col-lg-6">
				  <p class="blue">Bring this form to a Certified Auto Technician and have them complete it.<br/>When complete take a picture and upload it to Partners DDebbie.com</p>
				</div>
				  <div class="col-lg-6">
					<p class="blue">Visually inspect all items on the list Check Pass only if they are Deemed safe or Exceed Threshhold listed below<br>
						Email:  <a href="mailto:info@ddebbie.com" style="color:#fff;">info@ddebbie.com</a>
					</p>
				  </div>
			  </div>-->
			</div>
				<div class="row form-div">
					<div class="col-lg-12">
						<p><strong>Personal information</strong></p>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="driver_name">First Name*</label>
								<input type="text" class="form-control" id="driver_name" name="driver_name" required="required">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="driver_name">Last Name*</label>
								<input type="text" class="form-control" id="driver_last_name" name="driver_last_name" required="required">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="contact_number">Contact Number*</label>
								<input type="text" class="form-control" id="contact_number" name="contact_number" required="required">
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="email">Email*</label>
								<input type="email" class="form-control" id="email" name="email" required="required">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="password">Password*</label>
								<input type="password" class="form-control" id="password" name="password" required="required">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="confirm_password">Confirm password*</label>
								<input type="password" class="form-control" id="confirm_password" name="confirm_password" required="required">
							</div>
						</div>
					</div>
				</div>
				<div class="row form-div">
					<div class="col-lg-12">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="licence_num">Driver's License Number*</label>
								<input type="text" class="form-control" id="licence_num" name="licence_num" required="required">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="licence_num">Driver's License Type:*</label>
								<select class="form-control" id="licence_type" name="licence_type" required="required">
									<option>Dx License (SUV, Normal, Black)</option>
									<option>Taxi License</option>
									<option>Wheelchair License</option>
									<option>Towing License</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row form-div">
					<div class="col-lg-12">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="address">Address*</label>
								<textarea class="form-control" id="address" name="address" required="required"></textarea>
								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="postal_code">Postal Code*</label>
								<input type="text" class="form-control" id="postal_code" name="postal_code" required="required">
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="col-lg-4">
							<div class="form-group">
								<input type="checkbox" id="accept_terms" name="accept_terms" required="required">
								<label for="address" >I accept <a href="javascript:void(0)" data-toggle="modal" data-target="#temsCndModal">Terms and conditions</a>*</label>
								
							</div>
						</div>
					</div>
				</div>
				<div class="row form-div">
					<div class="col-lg-12">
						<p><strong>Vehicle information</strong></p>
					</div>
					<div id="vehiclesInfo">
						<div class="vehicleInfo">
							<div class="col-lg-12" style="display:none;" id="deldiv">
								<div class="col-lg-10">
								</div>
								<div class="col-lg-2">
								<button style="float: right;" onClick="delVI(this)" type="button" class="btn btn-danger btndelete" data-dismiss="vehicleInfo"><i class="fa fa-times"></i> Delete</button>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="vehicle_type">Vehicle Type*</label>
										<select id="vehicle_type" name="vehicle_type[]" class="form-control" required="required">
											<?php 
											
											$vehicleTypes = mysql_query("SELECT * FROM tbl_vehicle_types");
											while($vehicle = mysql_fetch_assoc($vehicleTypes)){
												echo '<option value="'.$vehicle['id'].'">'.$vehicle['title'].'</option>';
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="vehicle_number">Vehicle Number*</label>
										<input type="text" class="form-control" id="vehicle_number" name="vehicle_number[]" required="required">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="year">Year *</label>
										<input type="text" class="form-control" id="year" name="year[]" required="required">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="vehicle_type">Model*</label>
										<input type="text" id="vehicles_model" name="vehicles_model[]" class="form-control" required="required">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="num_of_doors">Num. Of Doors*</label>
										<input type="text" class="form-control" id="num_of_doors" name="num_of_doors[]">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="ownership">Ownership</label>
										<input type="text" class="form-control" id="ownership" name="ownership[]">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="licensing">Licensing</label>
										<input type="text" id="licensing" name="licensing[]" class="form-control">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="insurance_comp_name">Insurance Comp. Name</label>
										<input type="text" class="form-control" id="insurance_comp_name" name="insurance_comp_name[]">
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label for="insurance_comp_name">Wheel chair facility</label><br/>
										<label ><input type="radio" value="0" name="wheel_chair_facility[]"> No</label>&nbsp;&nbsp;
										<label><input type="radio" value="1" name="wheel_chair_facility[]"> Yes</label>
									</div>
								</div>
							</div>
							<!--<div class="col-lg-12">
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-lg-6"><strong>LIGHTS</strong></label>
										<label class="col-lg-3">PASS</label>
										<label class="col-lg-3">FAIL</label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">HEADLIGHT</label>
										<label class="col-lg-3"><input type="radio" value="1" name="headlight[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="headlight[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">TAILLIGHTS</label>
										<label class="col-lg-3"><input type="radio" value="1" name="taillight[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="taillight[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">TURN INDICATORS LIGHT</label>
										<label class="col-lg-3"><input type="radio" value="1" name="turnindicat[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="turnindicat[]"></label>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label><strong> BRAKES </strong>ALL PADS MUST BE MIN 2MM THICKNESS</label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">RIGHT FRONT</label>
										<label class="col-lg-3"><input type="radio" value="1" name="rightfront[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="rightfront[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">LEFT FRONT</label>
										<label class="col-lg-3"><input type="radio" value="1" name="leftfront[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="leftfront[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">RIGHT REAR</label>
										<label class="col-lg-3"><input type="radio" value="1" name="rightrear[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="rightrear[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">LEFT REAR</label>
										<label class="col-lg-3"><input type="radio" value="1" name="leftrear[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="leftrear[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">PARKING BRAKE</label>
										<label class="col-lg-3"><input type="radio" value="1" name="parkingbreaks[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="parkingbreaks[]"></label>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-lg-6"><strong>WINDOWS</strong></label>
										<label class="col-lg-3">PASS</label>
										<label class="col-lg-3">FAIL</label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">WINDSHIELD</label>
										<label class="col-lg-3"><input type="radio" value="1" name="windowshield[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="windowshield[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">WINDSHIELD WIPERS</label>
										<label class="col-lg-3"><input type="radio" value="1" name="wswipers[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="wswipers[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">WINDOWS</label>
										<label class="col-lg-3"><input type="radio" value="1" name="windows[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="windows[]"></label>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-lg-6"><strong>OTHERS</strong></label>
										<label class="col-lg-3">PASS</label>
										<label class="col-lg-3">FAIL</label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">DOORS</label>
										<label class="col-lg-3"><input type="radio" value="1" name="doors[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="doors[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">HORN</label>
										<label class="col-lg-3"><input type="radio" value="1" name="horn[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="horn[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">SPEEDOMETER</label>
										<label class="col-lg-3"><input type="radio" value="1" name="speedometer[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="speedometer[]"></label>
									</div>
									<div class="form-group clearfix">
										<label class="col-lg-6">BUMPER</label>
										<div class="col-lg-3"></div>
										<div class="col-lg-3"></div>
									</div>
									<div class="form-group clearfix">
										<label class="col-lg-6">RIGHT FRONT</label>
										<label class="col-lg-3"><input type="radio" value="1" name="bumper[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="bumper[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">MUFFLERS</label>
										<label class="col-lg-3"><input type="radio" value="1" name="mufflers[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="mufflers[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">MIRRORS</label>
										<label class="col-lg-3"><input type="radio" value="1" name="mirrors[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="mirrors[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">SAFETY BELTS</label>
										<label class="col-lg-3"><input type="radio" value="1" name="seaftybelts[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="seaftybelts[]"></label>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label>TYRES (ALL TYRES MUST HAVE MIN 3/32ND'S AND BE ABOVE WEAR BAR INDICATOR)</label>
									</div>
									<div class="form-group">
										<label class="col-lg-6"><strong> </strong></label>
										<label class="col-lg-3">PASS</label>
										<label class="col-lg-3">FAIL</label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">RIGHT FRONT</label>
										<label class="col-lg-3"><input type="radio" value="1" name="trightfront[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="trightfront[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">LEFT FRONT</label>
										<label class="col-lg-3"><input type="radio" value="1" name="tleftfront[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="tleftfront[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">RIGHT REAR</label>
										<label class="col-lg-3"><input type="radio" value="1" name="trightrear[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="trightrear[]"></label>
									</div>
									<div class="form-group">
										<label class="col-lg-6">LEFT REAR</label>
										<label class="col-lg-3"><input type="radio" value="1" name="tleftrear[]"></label>
										<label class="col-lg-3"><input type="radio" value="2" name="tleftrear[]"></label>
									</div>
								</div>
							</div>-->
							<div class="clearfix"></div>
							<hr/>
						</div>
					</div>
					<div id="vehiclesInfoDy"></div>
				</div>
				
                              <div align="center">
	<!--<a href="/website/ddebbie/Safty Inspection form in pdf.pdf"  download>
	
	
	<img src="safty-inspection-form.jpg"  height="700" width="550" align="center"/>
	
	</a>-->
	
	</div>       
             <br/>
	<br/>
	<div style="border: 1px solid #232323;border-radius: 5px;padding: 10px;">
	<form align"left">
	<h3>*Note: Please click on the Safety Inspection Form to download and send the scanned copy of the form  along with following documents:</h3>
	<h4><tr>Drivers Document: </tr>
	<tr> Drivers License, </tr>
	<tr> Proof of work Eligibility (Work Experience), </tr>
	<tr> Vehicle Types,  </tr>
	<tr> Vehicle Registration, </tr>
	<tr> Vehicle Insurance, </tr>
	<tr> Vehicle Safety Standard Certificate, </tr>
	<tr> Safety Standard Inspection Form, </tr><br/>
	<tr>Towing Truck: </tr>

	<tr> Drivers Document, </tr>
	<tr> Drivers Licence, </tr>
	<tr> Proof of work Eligibility (Work Experience), </tr>
	<tr> Towing Truck Documents, </tr>
	<tr> Vehicle Registration, </tr>
	<tr> Vehicle Registration, </tr>
	<tr> Vehicle Insurance, </tr>
	<tr> Vehicle Safety Standard Certificate, </tr>
	<tr> City of Metro Licence, </tr>
	<tr> Annual Inspection Report, </tr></h4>
	<h3 style="color:purple"><tr> ddebbietaxi@gmail.com</tr></h3>
	</form>
	</div>
	<br/>    
	<div class="row form-div">
				<div class="form-group"></div>
					<div class="col-lg-12 text-center"><br>
					<input type="submit" value="Submit" name="register" class="btn btn-success" style="font-size: 35px; padding-left: 60px; padding-right: 60px; float: none; margin: auto;"><br><br></div>
				</div>
			
		</div>                                                             
	</div>
		</form>

	</section>

    <footer>
        <div class="container">

        </div>
    </footer>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<?php
		//$msg = "Registered successfully.";
		if($msg!=""){
	?>
		<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Message</h4>
				  </div>
				  <div class="modal-body">
					<p><?php echo $msg; ?></p>
					<?php
						if($msg=="Registered successfully."){
							echo '<img src="img/driver-doc.png?t='.time().'" alt="" style="max-width: 100%;">';
						}
					?>
					
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  </div>
				</div>

			  </div>
			</div>
			<script>$(document).ready(function(){$("#myModal").modal('show');});</script>
	<?php
		}
	?>
	<div id="temsCndModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Terms and Conditions</h4>
		  </div>
		  <div class="modal-body">
			<iframe src="http://www.ddebbie.com/terms-and-conditions.html" style="border: 0px none; width: 100%;"></iframe>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>

	  </div>
	</div>
    <script>
	var vCoubter = 1;
    $(document).ready(function(){

		$("#add_vehicle").click(function(){
		var clone = $('.vehicleInfo:last').clone().find("input:text").val("").end();
		clone.find('#deldiv').show();
		
		$('.vehicleInfo:last').after('<div class="vehicleInfo"><div id="deldiv" class="col-lg-12"><div class="col-lg-10"></div><div class="col-lg-2"><button data-dismiss="vehicleInfo" class="btn btn-danger btndelete" type="button" onclick="delVI(this)" style="float: right;"><i class="fa fa-times"></i> Delete</button></div></div><div class="col-lg-12"><div class="col-lg-4"><div class="form-group"><label for="vehicle_type">Vehicle Type*</label><select required="required" class="form-control" name="vehicle_type[]" id="vehicle_type"><option value="1">Small</option><option value="2">Medium</option><option value="3">Limousine</option><option value="4">SUV</option></select></div></div><div class="col-lg-4"><div class="form-group"><label for="vehicle_number">Vehicle Number*</label><input type="text" required="required" name="vehicle_number[]" id="vehicle_number" class="form-control"></div></div><div class="col-lg-4"><div class="form-group"><label for="year">Year *</label><input type="text" required="required" name="year[]" id="year" class="form-control"></div></div></div><div class="col-lg-12"><div class="col-lg-4"><div class="form-group"><label for="vehicle_type">Model*</label><input type="text" required="required" class="form-control" name="vehicles_model[]" id="vehicles_model"></div></div><div class="col-lg-4"><div class="form-group"><label for="num_of_doors">Num. Of Doors*</label><input type="text" name="num_of_doors[]" id="num_of_doors" class="form-control"></div></div><div class="col-lg-4"><div class="form-group"><label for="ownership">Ownership</label><input type="text" name="ownership[]" id="ownership" class="form-control"></div></div></div><div class="col-lg-12"><div class="col-lg-4"><div class="form-group"><label for="licensing">Licensing</label><input type="text" class="form-control" name="licensing[]" id="licensing"></div></div><div class="col-lg-4"><div class="form-group"><label for="insurance_comp_name">Insurance Comp. Name</label><input type="text" name="insurance_comp_name[]" id="insurance_comp_name" class="form-control"></div></div><div class="col-lg-4"><div class="form-group"><label for="insurance_comp_name">Wheel chair facility</label><br><label><input type="radio" name="wheel_chair_facility['+vCoubter+']" value="0"> No</label>&nbsp;&nbsp;<label><input type="radio" name="wheel_chair_facility['+vCoubter+']" value="1"> Yes</label></div></div></div><div class="col-lg-12"><div class="col-lg-4"><div class="form-group"><label class="col-lg-6"><strong>LIGHTS</strong></label><label class="col-lg-3">PASS</label><label class="col-lg-3">FAIL</label></div><div class="form-group"><label class="col-lg-6">HEADLIGHT</label><label class="col-lg-3"><input type="radio" name="headlight['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="headlight['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">TAILLIGHTS</label><label class="col-lg-3"><input type="radio" name="taillight['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="taillight['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">TURN INDICATORS LIGHT</label><label class="col-lg-3"><input type="radio" name="turnindicat['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="turnindicat['+vCoubter+']" value="2"></label></div></div><div class="col-lg-4"><div class="form-group"><label><strong> BRAKES </strong>ALL PADS MUST BE MIN 2MM THICKNESS</label></div><div class="form-group"><label class="col-lg-6">RIGHT FRONT</label><label class="col-lg-3"><input type="radio" name="rightfront['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="rightfront['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">LEFT FRONT</label><label class="col-lg-3"><input type="radio" name="leftfront['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="leftfront['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">RIGHT REAR</label><label class="col-lg-3"><input type="radio" name="rightrear['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="rightrear['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">LEFT REAR</label><label class="col-lg-3"><input type="radio" name="leftrear['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="leftrear['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">PARKING BRAKE</label><label class="col-lg-3"><input type="radio" name="parkingbreaks['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="parkingbreaks['+vCoubter+']" value="2"></label></div></div><div class="col-lg-4"><div class="form-group"><label class="col-lg-6"><strong>WINDOWS</strong></label><label class="col-lg-3">PASS</label><label class="col-lg-3">FAIL</label></div><div class="form-group"><label class="col-lg-6">WINDSHIELD</label><label class="col-lg-3"><input type="radio" name="windowshield['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="windowshield['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">WINDSHIELD WIPERS</label><label class="col-lg-3"><input type="radio" name="wswipers['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="wswipers['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">WINDOWS</label><label class="col-lg-3"><input type="radio" name="windows['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="windows['+vCoubter+']" value="2"></label></div></div></div><div class="col-lg-12"><div class="col-lg-4"><div class="form-group"><label class="col-lg-6"><strong>OTHERS</strong></label><label class="col-lg-3">PASS</label><label class="col-lg-3">FAIL</label></div><div class="form-group"><label class="col-lg-6">DOORS</label><label class="col-lg-3"><input type="radio" name="doors['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="doors['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">HORN</label><label class="col-lg-3"><input type="radio" name="horn['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="horn['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">SPEEDOMETER</label><label class="col-lg-3"><input type="radio" name="speedometer['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="speedometer['+vCoubter+']" value="2"></label></div><div class="form-group clearfix"><label class="col-lg-6">BUMPER</label><div class="col-lg-3"></div><div class="col-lg-3"></div></div><div class="form-group clearfix"><label class="col-lg-6">RIGHT FRONT</label><label class="col-lg-3"><input type="radio" name="bumper['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="bumper['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">MUFFLERS</label><label class="col-lg-3"><input type="radio" name="mufflers['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="mufflers['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">MIRRORS</label><label class="col-lg-3"><input type="radio" name="mirrors['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="mirrors['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">SAFETY BELTS</label><label class="col-lg-3"><input type="radio" name="seaftybelts['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="seaftybelts['+vCoubter+']" value="2"></label></div></div><div class="col-lg-4"><div class="form-group"><label>TYRES (ALL TYRES MUST HAVE MIN 3/32ND\'S AND BE ABOVE WEAR BAR INDICATOR)</label></div><div class="form-group"><label class="col-lg-6"><strong> </strong></label><label class="col-lg-3">PASS</label><label class="col-lg-3">FAIL</label></div><div class="form-group"><label class="col-lg-6">RIGHT FRONT</label><label class="col-lg-3"><input type="radio" name="trightfront['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="trightfront['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">LEFT FRONT</label><label class="col-lg-3"><input type="radio" name="tleftfront['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="tleftfront['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">RIGHT REAR</label><label class="col-lg-3"><input type="radio" name="trightrear['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="trightrear['+vCoubter+']" value="2"></label></div><div class="form-group"><label class="col-lg-6">LEFT REAR</label><label class="col-lg-3"><input type="radio" name="tleftrear['+vCoubter+']" value="1"></label><label class="col-lg-3"><input type="radio" name="tleftrear['+vCoubter+']" value="2"></label></div></div></div><div class="clearfix"></div><hr></div>');
		vCoubter = vCoubter + 1;
			//var cloned = $("#vehiclesInfo").clone();
			//cloned.find("input:text").val("");
			//$("#vehiclesInfoDy").before('<div class="alert"><button type="button" class="btn btn-danger" data-dismiss="alert"><i class="fa fa-times"></i> Delete</button>'+cloned+'</div>');
		});
	$("#mobile_nav").click(function(){

    //toggles nav and ensures other elements play nice too
		if($("#primary_nav").css('left') < "0px"){
			$("#primary_nav").animate({left: "0px"}, 200);
			$("#wrapper_main_content").animate({left: "150px"}, 200);
			$("#wrapper_main_content").css("overflow-y","hidden");
			$("body").css("overflow-x","hidden");
			$("#primary_nav").css("overflow-y","hidden");
			$("#primary_nav").addClass("open");
		}else{
			$("#primary_nav").animate({left: "-115px"}, 200);
			$("#wrapper_main_content").animate({left: "0px"}, 200);
			$("#wrapper_main_content").css("overflow-y","hidden");
			$("body").css("overflow-x","hidden");
			$("#primary_nav").removeClass("open");

		}

	});

});//end
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
	function delVI(thObj){
		$(thObj).closest(".vehicleInfo").remove();
	}
    </script>

</body>

</html>
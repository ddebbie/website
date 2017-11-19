<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DDebbie | Contact Us</title>

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
				<a class="customer" href="driver.php"><h3>Quick Registration</h3></a> 
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
				<a class="customer" href="about.html"><h3>About Us</h3></a> 
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
				<a class="driver" href="contact.php"><h3>Contact Us</h3></a>
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
              <li><a href="driver.php">Quick Registration</a></li>
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
			  <div class="col-lg-12 text-center">
					<h1>CONTACT US</h1>
			  </div>
			</div>
				<div class="row col-lg-12">
					<div class="row col-lg-4" style="float: none; margin: auto;">
					<?php
						if(isset($_POST['contact_name'])){
							if(!empty($_POST['contact_name']) && !empty($_POST['contact_number']) && !empty($_POST['email']) && !empty($_POST['message']))
							{
								$to = 'ddebbietaxi@gmail.com';
								//$to = 'vishalbhosale5689@gmail.com';
								$email_subject = "Enquiry From Website";
								$email_body = "You have received a new message from website enquiry form.<br/><br/>".
								"Here are the details:<br/><br/>Name: ".$_POST['contact_name']."<br/><br/>Contact no.: ".$_POST['contact_number']."<br/><br/>Email: ".$_POST['email']."<br/><br/>Message: ".$_POST['message'];
							
								$separator = md5(time());
								$eol = PHP_EOL;
								$headers  = "From: Support Team <support@ddebbie.com>".$eol;
								$headers .= "MIME-Version: 1.0".$eol; 
								$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

								$body = "--".$separator.$eol;
								$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;

								$body .= "--".$separator.$eol;
								$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
								$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
								$body .= $email_body.$eol;

								$body .= "--".$separator."--";
								
								$mail_sent = @mail( $to, $email_subject, $body, $headers,"-f support@ddebbie.com");
								echo '<div class="col-lg-12">Thank you for contacting us. We will back to you shortly.</div>';
							}
						}
					?>
					<div class="row form-div">
						<div class="form-group">
							<div class="col-lg-12">
								<label for="contact_name">Name*</label>
								<input type="text" class="form-control" id="contact_name" name="contact_name" required="required">
							</div>
						</div>
					</div>
					<div class="row form-div">
						<div class="form-group">
							<div class="col-lg-12">
								<label for="contact_number">Contact Number*</label>
								<input type="text" class="form-control" id="contact_number" name="contact_number" required="required">
							</div>
						</div>
					</div>
					<div class="row form-div">
						<div class="form-group">
							<div class="col-lg-12">
								<label for="email">Email*</label>
								<input type="email" class="form-control" id="email" name="email" required="required">
							</div>
						</div>
					</div>
					<div class="row form-div">
						<div class="col-lg-12">
								<div class="form-group">
									<label for="message">Message*</label>
									<textarea class="form-control" id="message" name="message" required="required"></textarea>
								</div>
						</div>
					</div>
					<div class="row form-div">
						<div class="form-group">
							<div class="col-lg-12">
								<input type="submit" value="Submit" name="register" class="btn btn-success"><br></div>
							</div>
					</div>
					<div class="row form-div">
							<div class="form-group">
								<div class="col-lg-12"><br>
								Or Mail to: <a href="mailto:ddebbietaxi@gmail.com">ddebbietaxi@gmail.com</a>
								<br><br></div>
							</div>
						
					</div>
				</div>
			</div>
	</form>
</section>
    <footer>
        <div class="container">

        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <style>.vehicleInfo{border-bottom: 1px solid #000;margin-bottom: 25px;}</style>
	<script>
	
    $(document).ready(function(){
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
		$("#addvehicle").click(function(){
			$( ".vehicleInfo" ).clone().find("input:text").val("").end().appendTo( "#vehiclesInfo" );
		});

});//end
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

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
    </script>
</body>
</html>
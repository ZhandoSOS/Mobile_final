<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		
		 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
 
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Profile-user</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css-profile/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css-profile/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
        <!-- main css -->
        <link rel="stylesheet" href="css-profile/style.css">
        <link rel="stylesheet" href="css-profile/responsive.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html"><span>Traveland</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	         
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	         
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <?php
 try{

$myPDO = new PDO('pgsql:host=localhost;dbname=travel', 'admin', 'admin');
$first = "";
$second = "";
$patronic = "";
$address = "";
$email = "";
$dob = "2020-12-12";

$num = 0;
$summ = 0;

$sql1 = "SELECT * FROM customer where customer_id=$_COOKIE[id]";
foreach($myPDO->query($sql1)as $row){
$first = $row['customer_first_name'];
$second = $row['customer_last_name'];
$patronic = $row['customer_patronic_name'];
$address = $row['customer_address'];
$email = $row['customer_email'];
$dob =  $row['date_of_birth'];
$id = $_COOKIE['id'];
$photo = $row['photo'];
}

$sql2 = "SELECT COUNT(service_id) AS num, SUM (service.price) as summ FROM service INNER JOIN resting_place USING(rest_place_id) WHERE  customer_id = $id ";
if(($myPDO->query($sql2))->rowCount()){
  foreach($myPDO->query($sql2)as $row){
    $num = $row['num'];
    $summ = $row['summ'];
  }
}



 }catch(PDOException $e){
    echo $e->getMessage();
 }
 ?>
      
        
        <!--================Home Banner Area =================-->
        <section class="profile_area">
           	<div class="container">
           		<div class="profile_inner p_120">
					<div class="row">
						<div class="col-lg-5">
							<img class="img-fluid" src='<?php echo $photo; ?>' alt="">
						</div>
						<div class="col-lg-7">
							<div class="personal_text">
								<h3><?php echo $first; ?></h3>
								<h3><?php echo $second; ?></h3>
								<h3><?php echo $patronic; ?></h3>
								<ul class="list basic_info">
									<li><a href="#"><i class="lnr lnr-calendar-full"></i> <?php echo $address; ?></a></li>
									<li><a href="#"><i class="lnr lnr-text-align-justify"></i>  <?php echo $dob; ?></a></li>
									<li><a href="#"><i class="lnr lnr-envelope"></i> <?php echo $email; ?></a></li>
								</ul>
								</ul>
							</div>
						</div>
					</div>
           		</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
       
        <section class="welcome_area p_120">
        	<div class="container">
          
        		<div class="row welcome_inner">
              <h3>Change your profile photo</h3>
        			<div class="col-lg-6">
        				<form action="change_profile_photo.php" method="post" enctype="multipart/form-data">
		        	
                  <div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">Choose photo from library</label>
		        					<div class="form-field">
                      <input type="file" class="form-control-file" name="file" id="exampleInputFile" aria-describedby="fileHelp">
				              </div>
			              </div>
                  </div>
                  <div class="col-lg align-self-end">
		        				<div class="form-group">
		        					<div class="form-field">
				                <input type="submit" value="Submit" name="submit" class="form-control btn btn-primary">
				              </div>
			              </div>
		        			</div>
                    
</form>
				              </div>
			              </div>
		        			</div>
  
								
        </section>   


        
        <section class="ftco-section ftco-no-pb ftco-no-pt">
    	<div class="container">
      <h3>History of service</h3>
	    	<div class="row">

			<?php
  $id = $_COOKIE['id'];
  $sql = "SELECT * FROM service INNER JOIN resting_place USING(rest_place_id) WHERE  customer_id = $id ";
  if(($myPDO->query($sql))->rowCount()){
    foreach($myPDO->query($sql)as $row){
    $hotel_name = $row['hotel_name'];
    $features = $row['features'];
    $country = $row['country'];
    $sea_name = $row['sea_name'];
    $quantity = $row['place_quantity'];
    $price = $row['price'];
    $sales = $row['sales'];
    $start_date = $row['travel_start_date'];
    $end_date = $row['travel_end_date'];
    $photos = $row["photo"];

    echo "<div class='col-md-6 col-lg-4 ftco-animate'><div class='project'><div class='img'>
    <img src='$photos' class='img-fluid' alt='Colorlib Template'></div>
    <div class='text'>
    <div class='text'><span class='rate'><h5 href='#'>Duration " . $start_date ." - ". $end_date  . "</h5></span>
    </div>
    <h4 class='price'>" . $price . "tg</h4><h3><a href='#'>" .  $hotel_name . "</a></h3>
    <p> Features: " .  $features ."  |  " . $country." | " .  $sea_name ."</p>
                 
              </div>
              <a href='images/hotel-resto-1.jpg' class='icon image-popup d-flex justify-content-center align-items-center>
              <span class='icon-expand'></span></a></div></div>";
  
}
}else{
echo "<h4 class='price'>No booked services</h4>";
}  

?>
        </div>
    </div>
    </section>


        <!--================Welcome Area =================-->
        <section class="welcome_area p_120">
        	<div class="container">
        		<div class="row welcome_inner">
        			<div class="col-lg-6">
        				<div class="welcome_text">
        					<h4>Totals</h4>
        					<div class="row">
        						<div class="col-md-4">
        							<div class="wel_item">
        								<i class="lnr lnr-database"></i>
        								<h4><?php echo $num; ?></h4>
        								<p>Total number of services</p>
        							</div>
        						</div>
        						<div class="col-md-4">
        							<div class="wel_item">
        								<i class="lnr lnr-book"></i>
        								<h4><?php echo $summ . " tg"; ?></h4>
        								<p>Total sum</p>
        							</div>
        						</div>
        			
        					</div>
        				</div>
        			</div>
  
								
        </section>
        <!--================End Welcome Area =================-->
                

        
        
<footer class="ftco-footer ftco-footer-2 ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Traveland</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Infromation</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Online Enquiry</a></li>
                <li><a href="#" class="py-2 d-block">General Enquiries</a></li>
                <li><a href="#" class="py-2 d-block">Booking Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
                <li><a href="#" class="py-2 d-block">Refund Policy</a></li>
                <li><a href="#" class="py-2 d-block">Call Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Experience</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Adventure</a></li>
                <li><a href="#" class="py-2 d-block">Hotel and Restaurant</a></li>
                <li><a href="#" class="py-2 d-block">Beach</a></li>
                <li><a href="#" class="py-2 d-block">Nature</a></li>
                <li><a href="#" class="py-2 d-block">Camping</a></li>
                <li><a href="#" class="py-2 d-block">Party</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Manasa 34/1, Almaty, Kazakhstan </span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">87477436286</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@traveland.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
		  
		   <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made up by Makymetova and Sumbembayeva <i class="icon-heart color-danger" aria-hidden="true"></i> </a>
</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin panel </title>
    <meta charset="utf-8">
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

	          <li class="nav-item active"><a href="admin.php" class="nav-link">Hotels</a></li>
            <li class="nav-item"><a href="users.php" class="nav-link">Users</a></li>
            <li class="nav-item"><a href="index.php" class="nav-link">Go to Home Page</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate mt-5" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Admin panel</h1>
          </div>
        </div>
      </div>
    </div>

  
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Hotels </h2>
          
          </div>
        </div>

		<div class="row">


	<?php
 try{

$myPDO = new PDO('pgsql:host=localhost;dbname=travel', 'admin', 'admin');

$sql = "SELECT * FROM resting_place WHERE rest_place_id <> 0 ORDER BY price ASC";
foreach($myPDO->query($sql)as $row){
   
   $hotel_name = $row['hotel_name'];
   $features = $row['features'];
   $country = $row['country'];
   $sea_name = $row['sea_name'];
   $quantity = $row['place_quantity'];
   $price = $row['price'];
   $sales = $row['sales'];
   $photo = $row['photo'];
   echo "<div class='col-md-6 col-lg-4 ftco-animate'><div class='project'><div class='img'>
   <img src='$photo' class='img-fluid' alt='Colorlib Template'></div>
  <div class='text'><h4 class='price'>" . $price . "tg</h4><h3><a href='#'>" .  $hotel_name . "</a></h3>
  <p> Features: " .  $features ."</p><h5>  " . $country." </h5><p> " .  $sea_name ."</p>
						  <div class='star d-flex clearfix'>
							  <div class='mr-auto float-left'>
								  <span class='ion-ios-star'></span>
								  <span class='ion-ios-star'></span>
								  <span class='ion-ios-star'></span>
								  <span class='ion-ios-star'></span>
								  <span class='ion-ios-star'></span></div>
                <div class='float-right'><span class='rate'><a href='#'>" .  $quantity ." left" . "</a></span>
                

							  </div>
						  </div>
					  </div>
					  <a href='images/hotel-resto-1.jpg' class='icon image-popup d-flex justify-content-center align-items-center>
					  <span class='icon-expand'></span></a></div></div>";
}

 }catch(PDOException $e){
    echo $e->getMessage();
 }

?>

</div>
    		</div>
    	</div>
    </section>
    

	<section class="welcome_area p_120">
        	<div class="container">
        		<div class="row welcome_inner">
        			<div class="col-lg-6">
        				<form action="add_new.php" method="post" enctype="multipart/form-data">
                        <div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">Hotel Name</label>
		        					<div class="form-field">
				                <input type="text" class="form-control" placeholder="Ritz palace" name='hotel_name' required> 
				              </div>
			              </div>
                  </div>
                   <div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">Sea Name</label>
		        					<div class="form-field">
				                <input type="text" class="form-control" placeholder="Black sea" name='sea_name' required> 
				              </div>
			              </div>
                  </div>
                  <div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">Features</label>
		        					<div class="form-field">
				                <input type="text" class="form-control" placeholder="highest buildings" name='features' required> 
				              </div>
			              </div>
                  </div>
                  <div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">Country</label>
		        					<div class="form-field">
				                <input type="text" class="form-control" placeholder="Kazakhstan" name='country' required> 
				              </div>
			              </div>
                  </div>
                  <div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">Location</label>
		        					<div class="form-field">
				                <input type="text" class="form-control" placeholder="Long St." name='location' required> 
				              </div>
			              </div>
                  </div>
                  <div class="col-lg align-items-end">
		        				<div class="form-group">
		        					<label for="#">Price</label>
		        					<div class="form-field">
				                <input type="text" class="form-control" placeholder="190000.." name='price' required> 
				              </div>
			              </div>
                  </div>
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
				                <input type="submit" value="Add new place" name="add" class="form-control btn btn-primary">
				              </div>
			              </div>
		        			</div>
		        		</div>
 
		                      </select>
							</div>
</form>
				              </div>
			              </div>
		        			</div>
  
								
        </section> 
<br><br>
<br><br>
<br><br>




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
    
  </body>
</html>
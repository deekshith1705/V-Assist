
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>V assist | About</title>
		
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Titillium+Web:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="style.css">
		
		

	</head>


	<body>
		
		<div id="site-content">
			
			<header class="site-header">
				<div class="container">
					<a id="branding" href="index.php">
						<img src="images/logo.png" alt="Company Logo" class="logo">
						<h1 class="site-title">V <span> Assist</span></h1>
					</a>

					<nav class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item"><a href="index.php">Home</a></li>
							<li class="menu-item current-menu-item"><a href="about.php">About</a></li>
							<li class="menu-item"><a href="services.php">Services</a></li>
							
							 
							<li class="menu-item"><a href="requestservices.php">Request Service</a></li>
							<?php
							if($_SESSION['count']==True){ ?>
								<li class="menu-item"><a href="logout.php">Logout</a></li> 
							<?php } else{ ?>
							<li class="menu-item"><a href="login.php">Login</a></li> 
							<?php }?>
							
							<?php
							if($_SESSION['count1']==True){ ?>
							<li class="menu-item"><a href="logout.php">Logout</a></li> 
							<?php } else{ ?>
							<li class="menu-item"><a href="mlogin.php">Join as Mechanic</a></li>
							<?php }?>
						</ul>
					</nav>
					<nav class="mobile-navigation"></nav>
				</div>
			</header> <!-- .site-header -->

			<main class="main-content">
				
				<div class="fullwidth-block content">
					<div class="container">
						<h2 class="entry-title">V Assist is a company which helps its customers to provide easy assistance to their vehicles when their vehicle is in need of a mechanic for assistance</h2>
						
						<div class="team image-left">
							<figure class="team-image"><img src="images/12.jpg" alt=""></figure>
							<h3 class="team-name">Sai Deekshith</h3>
							<small class="team-desc">Website Manager</small>
							<p></p>
							<div class="team-social">
								<a href=""><i class="fa fa-facebook"></i></a>
								<a href=""><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
						</div>
					</div>
				

			</main> <!-- .main-content -->

			<footer class="site-footer">
				<div class="container">
					<div class="subscribe-form">
						<form action="#">
							<input type="text" placeholder="Enter your email to subscribe...">
							<button type="submit"><img src="images/icon-envelope-white.png" alt=""></button>
						</form>
					</div>
					<div class="social-links">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
					</div>
					<div class="copy">
						<p>Copyright 2019. All rights reserved.</p>
					</div>
				</div>
			</footer> <!-- .site-footer -->

		</div> <!-- #site-content -->

		

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		
	</body>

</html>
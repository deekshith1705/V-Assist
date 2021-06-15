<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>V Assist | Login</title>
		
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
							<li class="menu-item"><a href="about.php">About</a></li>
							<li class="menu-item"><a href="services.php">Services</a></li>
							
							 
							<li class="menu-item"><a href="requestservices.php">Request Service</a></li>
							<?php
							if($_SESSION['count']==True){ ?>
								<li class="menu-item"><a href="logout.php">Logout</a></li> 
							<?php } else{ ?>
							<li class="menu-item"><a href="login.php">Login</a></li> 
							<?php }?>
							
							
						</ul>
					</nav>
					<nav class="mobile-navigation"></nav>
				</div>
			</header> <!-- .site-header -->

			<main class="main-content">
				
				<div class="fullwidth-block content">
					<div class="container">
						<h2 class="entry-title">Already Registered</h2>
						
						<div class="row">
							<div class="col-md-5">
							<form action="login.php" class="contact-form">
								
									<input type="submit" value="Sign in">	
							</form>
							</div>
							<div class="col-md-6 col-md-offset-1">
								<div class="map-container">
									<form action="register1.php" method="post" class="contact-form">
                                        <input type="text" id="name" name="name" placeholder="NAME" onblur="validuser()">
										<span> (Name should start with a capital letter)</span><br><span id="t11"></span> <br>
                                        <input type="text" id="mail" name="mail" placeholder="Email" onblur="validmail()">
										<span id="t12"></span> <br>
										<input type="text" id="pno" name="phno" placeholder="Phone number" onblur="validphno()">
										<span></span><br><span id="t13"></span> <br>
                                        <input type="password" id="pass" name="pass" placeholder="password"required="required">
                                        <input type="password" id="cpass" name="cpass" placeholder="confirm password"required="required">
                                        <div class="text-center">
                                            <input type="submit" value="Register">
                                        </div>
                                    </form>
									
								</div>
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
						<p>Copyright 2020. All rights reserved.</p>
					</div>
				</div>
			</footer> <!-- .site-footer -->

		</div> <!-- #site-content -->

		

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
<script>
function validuser()
{
     var uname= document.getElementById("name").value;
     var u= new RegExp("^[A-Z][a-zA-Z0-9]+");
 if(u.test(uname))
{
  document.getElementById("t11").style="color:green";
 document.getElementById("t11").innerHTML="valid name";
 document.getElementById("mail").disabled=false;
}
else
{
 document.getElementById("t11").style="color:red";
 document.getElementById("t11").innerHTML="invalid name";
}
}

function validmail()
{
 var mail=document.getElementById("mail").value;
var m= new RegExp("^[a-zA-Z][0-9a-zA-Z]+[@](gmail|yahoo)[.](com|in)");
 if(m.test(mail))
{
  document.getElementById("t12").style="color:green";
 document.getElementById("t12").innerHTML="valid mail";
 document.getElementById("pno").disabled=false;
}
else
{
 document.getElementById("t12").style="color:red";
document.getElementById("t12").innerHTML="invalid mail";
}
}	

function validphno()
{
 var num=document.getElementById("pno").value;
var n= new RegExp("^[6789][0-9]{9}");
 if(n.test(num))
{
  document.getElementById("t13").style="color:green";
 document.getElementById("t13").innerHTML="valid phno";
 document.getElementById("pass").disabled=false;
}
else
{
 document.getElementById("t13").style="color:red";
document.getElementById("t13").innerHTML="invalid phno";
}
}

</script>
	</body>

</html>
<?php
session_start();
$email= $_SESSION["email"];
	// Database connection
	$conn = new mysqli('localhost','root','','vassist');
	if($conn->connect_error)
	{
		echo '$conn->connect_error';
		die('Connection Failed :'. $conn->connect_error);
	} 
?>
<?php
$sqlq=$conn->prepare("SELECT pincode from mechanic where email='".mysqli_real_escape_string($conn,$email)."'");
//$sqlq->bind_param("s",$email);
$sqlq->execute();
$res=$sqlq->get_result();
$row=$res->fetch_assoc();
$pin=$row['pincode'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		
		<title>V Assist | Request Service</title>
		
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
				<div class="btn-group btn-group-lg" style="float: right;">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-plus"></i>Add Alt Location</button>
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Location</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="addloc.php" method="post"> 
    <input type="text" class="form-control" name="altpin" id="apin" placeholder="Current Location(Pincode)">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="addloc" id="addloc"> Add Location </button>
      </div>
	  </form>
    </div>
  </div>
</div>
				</div><br><br><br>
				 <form action="delloc.php" method="post">
				<div class="btn-group btn-group-lg" style="float: right;">
					<button type="submit" class="btn btn-primary"  name="delete" id="delete">  	<i class="fa fa-trash-o"></i> Delete Location</button>
				</div>
				</form>
					<div class="container">
						<h2 class="entry-title">My Requests</h2>
						<div class="row">
							<div class="col-md-5">																																				
								<?php
$sqlq="SELECT sno,location,vehicle,address,problem FROM service where location='".mysqli_real_escape_string($conn,$pin)."'";
$result=$conn->query($sqlq)  or die($conn->error);
?>
 <table class="table table-hover" border="5">
    <thead>
      <tr>
	    <th>S.no</th>
        <!--th>Name</th-->
        <th>Location</th>
        <th>Vehicle</th>
        <th>Address</th>
        <th>Problem</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php
	$i=0;
	while($row=$result->fetch_assoc())
	{
		//$i=$i+1;
	?>
      <tr>
        <td><?=$row['sno'];?></td>
		<!--td><?=$row['name'];?></td-->
        <td><?=$row['location'];?></td>
        <td><?=$row['vehicle'];?></td>
        <td><?=$row['address'];?></td>
        <td><?=$row['problem'];?></td>
        <td><a href="accpet.php?accpet=<?=$row['sno'];?>" class="badge badge-primary p-2">Accept</a> | <a href="#" class="badge badge-danger p-2">Reject</a> 
        	
        </td>
      </tr>
	  <?php
	  }?>
    </tbody>
  </table>
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
		
	</body>

</html>
<?php
session_start();
$conn = new mysqli('localhost','root','','vassist');
	if($conn->connect_error)
	{
		echo '$conn->connect_error';
		die('Connection Failed :'. $conn->connect_error);
	}
$m=$_SESSION['mail'];
$ssssno=$_SESSION['sno'];
echo $ssssno;
//$c=$m;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
        
        <title>V Assist | Register</title>
        
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
 <?php         
	
$sqlq=$conn->prepare("SELECT status FROM service where sno=?");
$sqlq->bind_param("s",$ssssno);
$sqlq->execute();
$res=$sqlq->get_result();
$row=$res->fetch_assoc();
$statu=$row['status'];
$d="True";
$e="Registered"
        ?>   
		<main class="main-content">
                <div class="fullwidth-block content">
                    <div class="container">
					<?php if($statu==$d){?>
<!--div class="alert text-center alert-success alert-dismissible fade show">
 <!--button type="button" class="close" data-dismiss="alert">&times;</button-->
	<?php 				
$sqlq="SELECT sno,name,phno,repairs,address FROM mechanic where sno='".mysqli_real_escape_string($conn,$ssssno)."'";
$result=$conn->query($sqlq)  or die($conn->error);
?>
<h3 class="text-left text-info">Notified mechanic :</h3>
 <table class="table table-hover" border="5">
    <thead>
      <tr>
	    <th>s.no</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Repairs</th>
        <th>Address</th>
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
        <td><?=$row['name'];?></td>
        <td><?=$row['phno'];?></td>
        <td><?=$row['repairs'];?></td>
        <td><?=$row['address'];?></td>
       
        <td>
        </td>
      </tr>
	  <?php
		} }?>
    </tbody>
  </table>

                        <div class="row">
                            <div class="col-md-5">
                            <form action="login.php" class="contact-form">
                                <h2><?php $_SESSION['mail'] ;?></h2>
                                    <a href="lom.php"><input type="submit" value="Try other mechanic"></a>  
									<!--input type="text" id="location" name="rpin" value="<?php $m ?>" -->
                            </form>
                            </div>
                            <div class="col-md-6 col-md-offset-1">
                                <div class="map-container">
                                
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
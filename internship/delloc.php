<?php
session_start();
$em= $_SESSION["email"];
$zero=0;
	
	
	// Database connection
	$conn = new mysqli('localhost','root','','vassist');
	if($conn->connect_error)
	{
		echo '$conn->connect_error';
		die('Connection Failed :'. $conn->connect_error);
	} 
	else
{
	$stmt = $conn->prepare("Update mechanic SET altpin='".mysqli_real_escape_string($conn,$zero)."' WHERE email='".mysqli_real_escape_string($conn,$em)."'");
		//$stmt->bind_param("i",$apin);
		$stmt->execute();
		//echo "Location changed ...";
		header("Location:places.php");			
		$stmt->close();
		$conn->close();
}
	
?>
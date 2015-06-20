<?php

include("config.php");

$user_name = mysqli_real_escape_string($con,$_GET['id']);
$user_email = mysqli_real_escape_string($con,$_GET['id1']);
$user_mobile = mysqli_real_escape_string($con,$_GET['id2']);

//mail("mahesh.patil@iksula.com","Test 2015","121212121212");

	if($user_name != "" && $user_email != "" && $user_mobile != ""){

		$sql="INSERT INTO lp_user VALUES ('','$user_name', '$user_email', '$user_mobile')";

		if (!mysqli_query($con,$sql)) {
  			die('Error: ' . mysqli_error($con));
		}
		mysqli_close($con);

		$to = "mahesh.patil@iksula.com";

		//$headers .= "From: INCOM Enterprise<report@incomenterprise.com>" . "\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		$sub = "British Union Landading Page User Details ";

		$message = "";

		$message .= "Hi Admin,<br><br>";

		$message .= "Please find the details submited by the User <br>";		 

		$message .= "<table border='1'>";
		$message .= "<tr>";
		$message .= "<th> Name : </th>";
		$message .= "<td>".$user_name."</td>";
		$message .= "</tr>";
		$message .= "<tr>";
		$message .= "<th> Email : </th>";
		$message .= "<td>".$user_email."</td>";
		$message .= "</tr>";
		$message .= "<tr>";
		$message .= "<th> Mobile No : </th>";
		$message .= "<td>".$user_mobile."</td>";
		$message .= "</tr>";

		$message .= "</table>";


		if(mail($to,$sub,$message,$headers)){

			//echo 10;
		}
		else{

			//echo 11;
		}
		echo 1;
		
	}
	else{
		echo 0;
	}
?>
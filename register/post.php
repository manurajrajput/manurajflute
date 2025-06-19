<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Flute Classes Registeration </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<form action="post.php" method="POST">
				<?php
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$country=$_POST['country'];
		$msg=$_POST['msg'];

		$to='flutist.manuraj@gmail.com'; // Receiver Email ID, Replace with your email ID
		$subject='Mentoring Registeration';
		$message="The following student has registered for learning flute"."\n\n"."Name :".$name."\n"."E-Mail :".$email."\n"."Phone :".$phone."\n"."City :".$city."\n"."State :".$state."\n"."Country :".$country;
		$headers="From: ".$email;

		if(mail($to, $subject, $message, $headers)){
			echo "<center><h1>Registion Successful</h1><br><h4>Thank you"." ".$name."</h4><br><p>You will be contacted shortly!</h1></p></center>";
		}
		else{
			echo "Something went wrong!";
		}
	}
?>
</form>
			</div>
		</div>
		
	</body>
</html>
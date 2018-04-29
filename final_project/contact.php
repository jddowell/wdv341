<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Send Data</title>
	<?php
	session_start();
	
	include 'connect.php';
	
	if($_SESSION["valid_user"] = false)
	{
		header("Location: login.php");
	}
	else{
		$email = "";
		$emailErrMsg = "";
		
		$validForm = false;
		$contactMsg = "";
		
		if(isset($_POST["submit"]))
		{
			$email = $_POST['email'];
			
			function validateEmail($inEmail){
				global $validForm, $emailErrMsg;
				$emailErrMsg = "";
				
				if(!empty($inEmail)){
				// Validate e-mail
				$inEmail = filter_var($inEmail, FILTER_VALIDATE_EMAIL);

				if($inEmail === false)
				{
					$validForm = false;
					$emailErrMsg = "Invalid email. Match format: email@email.com"; 					
				}
				}
			}
		
		
		$validForm = true;
		
		validateEmail($email);
		
		if($validForm = true)
		{
			
			$contactMsg = "Your Message Has Been Sent!";
		}
		else
		{
				$contactMsg = "Your Message Was Not Sent!";
		}
		}
	}
	?>
	<style type="text/css">
		body{
			background-color: #4b5320;
		}
		#admin{
			margin: 0 auto;
			width: 40%;
			background-color: gray;
			padding: 1%;
			text-align: center;
			border: solid gold 5px;
			color: black;
			font-weight: bolder;
			box-shadow: 5px 10px 8px #000000;
		}
		span{
			color: red;
		}
		#nav{
			background-color: gray;
			font-size: 1.5em;
			width: 10%;
			margin: 0 auto;
			float: right;
			box-shadow: 5px 5px 8px #000000;
		}
		ul {
    		list-style-type: none;
			padding: 0 auto;
		}
		li{
			display: block;
			padding-bottom: 4%;
		}
	</style>
</head>

<body>
	<div id="nav">
	<ul>
		<li><a href="admin.php">Admin</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
	</div>
	<div id="admin"><form id="form1" name="form1" method="post" action="testemail.php">
		<h1>Send Records</h1>
		<p>Email:<input type="text" id="email" name="email"></p>
		<p>
			<input type="submit" name="submit" id="buton" value="Send Confirmation">
			<input type="reset" name="button2" id="button2" value="Clear">
		</p>
		<p><span><?php echo $contactMsg; ?></span></p>
		</form>
	</div>
</body>
</html>
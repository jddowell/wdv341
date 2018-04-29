<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<?php
		session_start();
		$_SESSION["valid_user"] = false;
		// remove all session variables
		session_unset(); 

		// destroy the session 
		session_destroy();
	
		//Redirects back to login page
		header("Location: login.php");
	?>
</head>

<body>
</body>
</html>
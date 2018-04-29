<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<?php
	session_start();
	include 'connect.php';
	
	if($_SESSION["valid_user"] = false)
	{
		header("Location: login.php");
	}
	?>
<title>Admin Page</title>
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
			opacity: .8;
			color: black;
			font-weight: bolder;
			box-shadow: 5px 10px 8px #000000;
		}
		h1{
			font-size: 3.5em;
		}
		h2{
			font-size: 2.5em;
		}
		#add{
			width: 80%;
			height: 30%;
			background-color: lightgray;
			margin: 0 auto;
			text-align: center;
			padding: 1%;
			border-radius: 50px;
			box-shadow: 5px 10px 8px #000000;
		}
		#select{
			width: 80%;
			height: 30%;
			background-color: lightgray;
			margin: 0 auto;
			margin-top: 5%;
			text-align: center;
			padding: 1%;
			border-radius: 50px;
			box-shadow: 5px 10px 8px #000000;
		}
		#contact{
			width: 80%;
			height: 30%;
			background-color: lightgray;
			margin: 0 auto;
			margin-top: 5%;
			text-align: center;
			padding: 1%;
			border-radius: 50px;
			box-shadow: 5px 10px 8px #000000;
		}
		a{
			color: black;
		}
	</style>
</head>

<body>
		<div id="admin">
		<h1>Welcome <?php echo $_SESSION["user_name"]; ?></h1>
			<div id="add"><h2><a href="add.php">Add New Record</a></h2></div>
			<div id="select"><h2><a href="select.php">View All Record</a></h2></div>
			<div id="contact"><h2><a href="contact.php">Send Data</a></h2></div>
			<h2><a href="logout.php">Logout</a></h2>
	</div>
</body>
</html>
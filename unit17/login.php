<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Page</title>
	<?php
		session_start();
		//Setting Up The Variables
		$login = "";
		$pass = "";
	
		//Error Message Variable
		$validErrMsg = "";
	
		include 'connect.php';
	
	
	
	if(isset($_POST["submit"]))
	{
		$login = $_POST['user'];
		$pass = $_POST['password'];
		
		//Binding Variables
		if(empty($login) || empty($pass))
		{
			$validErrMsg = "Must enter username and password";
		}
		else{
				$query = "SELECT * FROM event_user_table WHERE event_user_name  = :username AND event_user_password = :password";			
				$stmt = $conn->prepare($query);
				$stmt->execute(
					array(
					'username' => $login,
					'password' => $pass
					)
				);
			$count = $stmt->rowCount();
			if($count > 0)
			{
				$_SESSION["valid_user"] = true;
				header("location: select.php");
			}
			else{
				$validErrMsg = "Must enter valid username and password";
			}
		}



	}
	?>
	<style type="text/css">
		#login{
			margin: 0 auto;
			width: 20%;
			background-color: lightgray;
			padding: 1%;
			text-align: center;
		}
		span{
			color: red;
			font-weight: bolder;
		}
	</style>
</head>

<body>
	<div id="login">
	<form id="form1" name="form1" method="post">
		<p>Login:<input type="text" id="user" name="user" value="<?php echo $login; ?>"></p>
		<p>Password:<input type="text" id="password" name="password" value="<?php echo $pass; ?>"></p>
		<p><span><?php echo $validErrMsg; ?></span></p>
		<p>
			<input type="submit" name="submit" id="buton" value="Login">
			<input type="reset" name="button2" id="button2" value="Reset">
		</p>
	</form>
	</div>
</body>
</html>
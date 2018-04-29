<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Page</title>
	<?php	
		session_start();

		include 'connect.php';
	
		//Setting Up The Variables
		$login = "";
		$pass = "";
	
		//Error Message Variable
		$validErrMsg = "";
	
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
					$query = "SELECT * FROM user_login WHERE username  = :username AND password = :password";			
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
						$_SESSION["user_name"] = $login;
						header("location: admin.php");
					}
					else{
						$validErrMsg = "Must enter valid username and password";
						}
			}
	}
	?>

	<style type="text/css">
		body{
			background-image: url(army-pft-two-mile-run-score-chart.jpg);
			background-repeat: no-repeat;
		}
		#login{
			margin: 0 auto;
			width: 20%;
			background-color: gray;
			padding: 1%;
			text-align: center;
			border: solid gold 5px;
			opacity: .8;
			color: black;
			font-weight: bolder;
			box-shadow: 5px 10px 8px #000000;
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
		<p><img src="army_star_light_background.png" alt="Army" title="Army" width="200px" height="250px"></p>
		<p></p>
		<p>Login:<input type="text" id="user" name="user" value="<?php echo $login; ?>"></p>
		<p>Password:<input type="text" id="password" name="password" value="<?php echo $pass; ?>"></p>
		<p><span><?php echo $validErrMsg; ?></span></p>
		<p>
			<input type="submit" name="submit" id="buton" value="Login">
			<input type="reset" name="button2" id="button2" value="Clear">
		</p>
	</form>
	</div>
</body>
</html>
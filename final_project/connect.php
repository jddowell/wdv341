<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<?php
		$servername = "localhost";
		$username = "jddowell_final";
		$password = "richt132";
		$database = "jddowell_final";
	
		try {
    		$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    		// set the PDO error mode to exception
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		echo "Connected successfully";
    		}
			catch(PDOException $e)
    		{
    		echo "Connection failed: " . $e->getMessage();
    		}
	?>
</head>

<body>
</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "wdv341";

		try {
    		$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    		// set the PDO error mode to exception
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		echo "Connected successfully"; 
			
			    // prepare sql and bind parameters
    		//$stmt = $conn->prepare("SELECT * FROM wdv341_event");
			
			//while($row = $stmt->bindParam(PD))
    		//$stmt->bindParam(':event_name', $event_name);
    		//$stmt->bindParam(':event_description', $event_description);
    		//$stmt->bindParam(':event_presenter', $event_presenter);

    		// insert a row
    		//$event_name = "Army Day";
    		//$event_description = "A day to remember ";
    		//$email = "john@example.com";
			
			
    		//$stmt->execute();
    		}
			catch(PDOException $e)
    		{
    		echo "Connection failed: " . $e->getMessage();
    		}
?>
</body>
</html>
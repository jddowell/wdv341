<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<?php
	include 'connect.php';
	$deleteVariable = $_GET['eventId'];
	if($deleteVariable == $deleteVariable)
	{
		$stmt = $conn->prepare("DELETE FROM wdv341_event WHERE event_id = '$deleteVariable'");
		echo "<br>";
		echo "<h1>"."Record Event Id Was Deleted: ".$deleteVariable."</h1>";
		$stmt->execute();
		header("Location: select.php");
		
	}
	else
	{
		echo "<h1>Record was not deleted!</h1>";
	}
		
	?>
</head>

<body>
</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<?php
	include 'connect.php';
	$deleteVariable = $_GET['eventId'];
		$stmt = $conn->prepare("DELETE FROM wdv341_event WHERE event_id = '$deleteVariable'");
		echo "Record Event Id Was Deleted:".$deleteVariable;
		$stmt->execute();
	?>
</head>

<body>
</body>
</html>
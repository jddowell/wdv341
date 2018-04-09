<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<?php
	include 'connect.php';
		$recId = $_GET['event_id'];
		$stmt = $conn->prepare("DELETE From event_table WHERE event_id=?");
	?>
</head>

<body>
</body>
</html>
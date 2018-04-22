<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<?php
	include 'connect.php';
	session_start();
	if($_SESSION["valid_user"] = false)
	{
		header("Location: login.php");
	}
		$stmt = $conn->prepare("SELECT * FROM wdv341_event");
		$stmt->execute();
	?>
	<table border="1"
		<tr>
			<td>ID</td>
			<td>Presenter</td>
			<td>Name</td>
			<td>Description</td>
			<td>Update</td>
			<td>Delete</td>
		</tr>
	      
 	<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr>";
			echo "<td>".$row['event_id']."</td>";
			echo "<td>".$row['event_presenter']."</td>";
			echo "<td>".$row['event_name']."</td>";
			echo "<td>".$row['event_description']."</td>";
			echo "<td><a href='updateEventsForm.php?eventId=" .$row['event_id']."'>Update</a></td>";
			echo "<td><a href='deleteEvent.php?eventId=" .$row['event_id']."'>Delete</a></td>";
		 "</tr>";
	}		
		   ?>
	</table>
	<h2><a href="add.php">Add Event</a></h2>
	<h2><a href="logout.php">Logout</a></h2>
</head>

<body>
</body>
</html>
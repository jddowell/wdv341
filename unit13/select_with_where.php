<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<?php
	include 'connect.php';
		$stmt = $conn->prepare("SELECT * FROM wdv341_event WHERE event_id = 4");
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
			echo "<td><a href='updateEvent.php?eventId=" .$row['event_id']."'>Update</a></td>";
			echo "<td><a href='deleteEvent.php?eventId=" .$row['event_id']."'>Delete</a></td>";
		 "</tr>";
	}
		   ?>
	</table>
</head>

<body>
</body>
</html>
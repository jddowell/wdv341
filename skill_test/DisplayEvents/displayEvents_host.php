<?php
	//Get the Event data from the server.
	include 'connect_host.php';
		$stmt = $conn->prepare("SELECT * FROM wdv341_events");
		$stmt->execute();

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>WDV341 Intro PHP  - Display Events Example</title>
    <style>
		.eventBlock{
			width:500px;
			margin-left:auto;
			margin-right:auto;
			background-color:#CCC;	
		}
		
		.displayEvent{
			text_align:left;
			font-size:18px;	
		}
		
		.displayDescription {
			margin-left:100px;
		}
		td{
			background-color: gray;
			color: white;
		}
	</style>
</head>

<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Example Code - Display Events as formatted output blocks</h2>   
<table border="1"
		<tr>
			<td>Event ID</td>
			<td>Event Name</td>
			<td>Description</td>
			<td>Presenter</td>
			<td>Date</td>
			<td>Time</td>
		</tr>
	      
 	<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr>";
			echo "<td>".$row['event_id']."</td>";
			echo "<td>".$row['event_name']."</td>";
			echo "<td>".$row['event_description']."</td>";
			echo "<td>".$row['event_presenter']."</td>";
			echo "<td>".$row['event_day']."</td>";	
			echo "<td>".$row['event_time']."</td>";
		 "</tr>";
	}
		
		   ?>
	</table>
</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PT Records</title>
	<?php
	include 'connect.php';
	if($_SESSION["valid_user"] = false)
	{
		header("Location: login.php");
	}
	?>
	<style type="text/css">
		body{
			background-color: #4b5320;
		}
		#select{
			margin: 0 auto;
			width: 70%;
			background-color: gray;
			padding: 1%;
			text-align: center;
			border: solid gold 5px;
			opacity: .8;
			color: black;
			font-weight: bolder;
			box-shadow: 5px 10px 8px #000000;
		}
		h1{
			font-size: 3em;
		}
		table{
			width: 100%;
			border-collapse: collapse;
		}
		td{
			border: 3px solid white;
    		padding: 8px;
			font-weight: bolder;
			padding: .5%;
		}
		td.top{
			font-weight: bolder;
			font-size: 1.75em;
		}
		tr:nth-child(even){background-color: lightgray;}
		th{
		 	padding-top: 12px;
    		padding-bottom: 12px;
    		text-align: left;
    		background-color: #4CAF50;
    		color: white;
		}
		#nav{
			background-color: gray;
			font-size: 1.5em;
			width: 10%;
			margin: 0 auto;
			float: right;
			box-shadow: 5px 5px 8px #000000;
		}
		ul {
    		list-style-type: none;
			padding: 0 auto;
		}
		li{
			display: block;
			padding-bottom: 4%;
		}
	</style>
</head>

<body>
		<div id="nav">
		<ul>
			<li><a href="admin.php">Admin</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<div id="select">
		<h1>Pt Records</h1>
			<table
		<tr>
			<td class="top">ID</td>
			<td class="top">Gender</td>
			<td class="top">Age</td>
			<td class="top">Push Up</td>
			<td class="top">Sit Up</td>
			<td class="top">Run Score</td>
			<td class="top">Total Points</td>
			<td class="top">PT Date</td>
			<td class="top">View</td>
			<td class="top">Update</td>
			<td class="top">Delete</td>
		</tr>
	      
 	<?php 
	
		$stmt = $conn->prepare("SELECT * FROM pt_record");
		$stmt->execute();
	
	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['gender']."</td>";
			echo "<td>".$row['age']."</td>";
			echo "<td>".$row['push_up_score']."</td>";
			echo "<td>".$row['sit_up_score']."</td>";
			echo "<td>".$row['run_score']."</td>";
			echo "<td>".$row['total_points']."</td>";
			echo "<td>".$row['pt_date']."</td>";
			echo "<td><a href='select_with_where.php?Id=" .$row['soldier_id']."'>View</a></td>";
			echo "<td><a href='update.php?Id=" .$row['soldier_id']."'>Update</a></td>";
			echo "<td><a href='delete.php?Id=" .$row['soldier_id']."'>Delete</a></td>";
		 "</tr>";
	}		
		   ?>
	</table>
	</div>
</body>
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Single Record</title>
	<?php
	session_start();
	include 'connect.php';
	
	if($_SESSION["valid_user"] = false)
	{
		header("Location: login.php");
	}
	else{
		$name = "";
		$gender = "";
		$age = "";
		$push_up_score = "";
		$sit_up_score = "";
		$run_score = "";
		$formated_run_score = "";
		$total_points = "";
		$pt_date = "";
		$selectVariable = $_GET['Id'];
		if($selectVariable == $selectVariable)
		{
			$stmt = $conn->prepare("SELECT soldier_id, name, gender, age, push_up_score, sit_up_score, run_score, total_points, pt_date FROM pt_record WHERE soldier_id = '$selectVariable'");
			$stmt->execute();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				$name = $row['name'];
				$gender = $row['gender'];
				$age = $row['age'];
				$push_up_score = $row['push_up_score'];
				$sit_up_score = $row['sit_up_score'];
				$run_score = $row['run_score'];
				$total_points = $row['total_points'];
				$pt_date = $row['pt_date'];
			}
			$formated_run_score = str_replace(':','.',$run_score);
		}
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
		#barchart_material{
			margin: 0 auto;
			padding-top: 5%;
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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Scores','Push Up', 'Sit Up', 'Run Score' ,'Total Score'],
          ['Event', <?php echo $push_up_score;?>, <?php echo $sit_up_score;?>, <?php echo $formated_run_score;?>, <?php echo $total_points;?>],

        ]);

        var options = {
          chart: {
            title: 'PT Test Scores',
			subtitle: '<?php echo $name; ?>',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</head>

<body>
		<div id="nav">
		<ul>
			<li><a href="admin.php">Admin</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<div id="select">
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
	

		echo "<tr>";
			echo "<td>$name</td>";
			echo "<td>$gender</td>";
			echo "<td>$age</td>";
			echo "<td>$push_up_score</td>";
			echo "<td>$sit_up_score</td>";
			echo "<td>$run_score</td>";
			echo "<td>$total_points</td>";
			echo "<td>$pt_date</td>";
			echo "<td><a href='select_with_where.php?Id=$selectVariable'>View</a></td>";
			echo "<td><a href='update.php?Id=$selectVariable'>Update</a></td>";
			echo "<td><a href='delete.php?Id=$selectVariable'>Delete</a></td>";
		 "</tr>";	
		   ?>
	</table>
    <div id="barchart_material" style="width: 1000px; height: 500px;"></div>
	</div>
</body>
</html>
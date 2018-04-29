<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<?php
	session_start();
	include 'connect.php';
	
	if($_SESSION["valid_user"] = false)
	{
		header("Location: login.php");
	}
	else{
		//Defining Variables
		$name = "";
		$gender = "";
		$age = 0;
		$push_up = 0;
		$sit_up = 0;
		$run = "";
		$total_points = 0;
		$date = "";
		$updateVariable = $_GET['Id'];
		$updateMsg = "";
		
		if(isset($_POST["submit"]))
		{
			$name = $_POST['name'];
			$gender = $_POST['gender'];
			$age = $_POST['age'];
			$push_up = $_POST['push_up'];
			$sit_up = $_POST['sit_up'];
			$run = $_POST['run'];
			$total_points = $_POST['total_points'];
			$date = $_POST['date'];
			
        	$stmt = $conn->prepare("UPDATE pt_record
        	SET name = :name, gender = :gender, age = :age, push_up_score = :push_up_score, sit_up_score = :sit_up_score, run_score = :run_score, total_points = :total_points, pt_date = :pt_date WHERE soldier_id = '$updateVariable' ");
        	$stmt->bindParam(':name', $name);
        	$stmt->bindParam(':gender', $gender);
        	$stmt->bindParam(':age', $age);
        	$stmt->bindParam(':push_up_score', $push_up);
			$stmt->bindParam(':sit_up_score', $sit_up);
			$stmt->bindParam(':run_score', $run);
			$stmt->bindParam(':total_points', $total_points);
			$stmt->bindParam(':pt_date', $date);
			$stmt->execute();
		
		include 'select.php';
		      if($updateVariable == $updateVariable)
      $stmt = $conn->query("SELECT * FROM `pt_record` WHERE soldier_id = '$updateVariable' ");
      while ($row = $stmt->fetch())
        {
          $languageArray[$row[0]] = $row[1];
          $name = $row['name'];
          $gender = $row['gender'];
          $age = $row['age'];
          $push_up = $row['push_up'];
		  $sit_up = $row['sit_up'];
		  $run = $row['run'];
		  $total_points = $row['total_points'];
		  $date = $row['date'];
        }
			$updateMsg = "Record was successfully updated!";
			
		}
			$stmt = $conn->prepare("SELECT * FROM pt_record WHERE soldier_id = '$updateVariable'");
	$stmt->execute();
      while ($row = $stmt->fetch())
        {
          $languageArray[$row[0]] = $row[1];
          $name = $row['name'];
          $gender = $row['gender'];
          $age = $row['age'];
          $push_up = $row['push_up_score'];
		  $sit_up = $row['sit_up_score'];
		  $run = $row['run_score'];
		  $total_points = $row['total_points'];
		  $date = $row['pt_date'];
        }
	}
?>
<style type="text/css">
		body{
			background-color: #4b5320;
		}
		#update{
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
		.update{
			color: red;
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
	<div id="update">
	<form id="form1" name="form1" method="post" action="update.php?Id=<?=$updateVariable?>">
		<h1>Add New Record</h1>	
		<p>Name:<input type="text" id="name" name="name" value="<?php echo $name; ?>"></p>
		<p>Gender:<input type="text" id="gender" name="gender" value="<?php echo $gender; ?>"></p>
		<p>Age:<input type="text" id="age" name="age" value="<?php echo $age; ?>"></p>
		<p>Push Up:<input type="text" id="push_up" name="push_up" value="<?php echo $push_up; ?>"></p>
		<p>Sit Up:<input type="text" id="sit_up" name="sit_up" value="<?php echo $sit_up; ?>"></p>
		<p>Run Time:<input type="text" id="run" name="run" value="<?php echo $run; ?>"></p>
		<p>Total Points:<input type="text" id="total_points" name="total_points" value="<?php echo $total_points;?>"></p>
		<p>Date:<input type="date" id="date" name="date" value="<?php echo $date; ?>"></p>
		<p>
			<input type="submit" name="submit" id="buton" value="Update">
			<input type="reset" name="button2" id="button2" value="Clear">
		</p>
		
		<h1 class="update"><?php echo $updateMsg; ?></h1>
	</div>
</body>
</html>
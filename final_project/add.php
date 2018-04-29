<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Record</title>
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
		
		//Error Message Variables
		$nameErrMsg = "";
		$genderErrMsg = "";
		$ageErrMsg = "";
		$pushErrMsg = "";
		$sitErrMsg = "";
		$runErrMsg = "";
		$totalErrMsg = "";
		$dateErrMsg = "";
		
		//etra variable
		$validForm = false;
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
		
			function validateName($inName)
			{
				global $validForm, $nameErrMsg;	
				$nameErrMsg = "";
			
				if($inName == "")
				{
					$validForm = false;
					$nameErrMsg = "Name is Required";
				}
			}
			
			function validateGender($inGender)
			{
				global $validForm, $genderErrMsg;
				$genderErrMsg = "";
				
				if($inGender == "--Select An Option--")
				{
					$validForm = false;
					$genderErrMsg = "Gender cannot be default";
				}
			}
			
			function validateAge($inAge)
			{
				global $validForm, $ageErrMsg;
				$ageErrMsg = "";
				
				if(!preg_replace( '/[^0-9]/', '', $inAge ))
				{
					$validForm = false;
					$ageErrMsg = "Age Must be Numeric";
				}
			}

			function validatePushUp($inPushUp)
			{
				global $validForm, $pushErrMsg;
				$pushErrMsg = "";
				
				if(!preg_replace( '/[^0-9]/', '', $inPushUp ))
				{
					$validForm = false;
					$pushErrMsg = "Push Up Must be Numeric";
				}
			}
			
			function validateSitUp($inSitUp)
			{
				global $validForm, $sitErrMsg;
				$sitErrMsg = "";
				
				if(!preg_replace( '/[^0-9]/', '', $inSitUp ))
				{
					$validForm = false;
					$sitErrMsg = "Sit Up Must be Numeric";
				}
			}
			
			function validateRun($inRun)
			{
				global $validForm, $runErrMsg;
				$runErrMsg = "";
				
				if($inRun == "")
				{
					$validForm = false;
					$runErrMsg = "Run Time Must be entered as follows 99:99";
				}
			}
			
			function validateTotal($inTotal)
			{
				global $validForm, $totalErrMsg;
				$totalErrMsg = "";
				
				if(!preg_replace( '/[^0-9]/','', $inTotal))
				{
					$validForm = false;
					$totalErrMsg = "Total score must be numeric";
				}
			}
				
					$validForm = true;
		
					validateName($name);
					validateGender($gender);
					validateAge($age);
					validatePushUp($push_up);
					validateSitUp($sit_up);
					validateRun($run);
					validateTotal($total_points);
			if($validForm)
			{
      			$stmt = $conn->prepare("INSERT INTO pt_record (name, gender, age, push_up_score, sit_up_score, run_score, total_points, pt_date)
      			VALUES (:name, :gender, :age, :push_up_score, :sit_up_score, :run_score, :total_points, :pt_date)");
      			$stmt->bindParam(':name', $name);
	  			$stmt->bindParam(':gender', $gender);
	  			$stmt->bindParam(':age', $age);
				$stmt->bindParam(':push_up_score', $push_up);
				$stmt->bindParam(':sit_up_score', $sit_up);
				$stmt->bindParam(':run_score', $run);
				$stmt->bindParam(':total_points', $total_points);
				$stmt->bindParam(':pt_date', $date);
	  			$stmt->execute(); 
				$updateMsg = "Record Added Successfully";	
			}
			else
			{
				$updateMsg = "Record Was Not added";
			}
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
		h1{
			font-size: 2.5em;
		}
		span{
			color: red;
		}
		.update{
			color: red;
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
	<div id="update">
	<form id="form1" name="form1" method="post" action="add.php">
		<h1>Add New Record</h1>	
		<p>Name:<input type="text" id="name" name="name" value="<?php echo $name; ?>"><br><span><?php echo $nameErrMsg; ?></span></p>
		<p>Gender:<input type="text" id="gender" name="gender" value="<?php echo $gender; ?>"><br><span><?php echo $genderErrMsg;?></span></p>
		<p>Age:<input type="text" id="age" name="age" value="<?php echo $age; ?>"><br><span><?php echo $ageErrMsg; ?></span></p>
		<p>Push Up:<input type="text" id="push_up" name="push_up" value="<?php echo $push_up; ?>"><br><span><?php echo $pushErrMsg; ?></span></p>
		<p>Sit Up:<input type="text" id="sit_up" name="sit_up" value="<?php echo $sit_up; ?>"><br><span><?php echo $sitErrMsg; ?></span></p>
		<p>Run Time:<input type="text" id="run" name="run" value="<?php echo $run; ?>"><br><span><?php echo $runErrMsg; ?></span></p>
		<p>Total Points:<input type="text" id="total_points" name="total_points" value="<?php echo $total_points;?>"><br><span><?php echo $totalErrMsg; ?></span></p>
		<p>Date:<input type="date" id="date" name="date" value="<?php echo $date; ?>"><br><span><?php echo $dateErrMsg; ?></span></p>
		<p>
			<input type="submit" name="submit" id="buton" value="Add">
			<input type="reset" name="button2" id="button2" value="Clear">
		</p>
		
		<h1 class="update"><?php echo $updateMsg; ?></h1>
	</form>
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
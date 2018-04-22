<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<?php
	include 'connect.php';
	
	//Setting up the variables
	$event_name = "";
	$event_description = "";
	$event_presenter = "";
	$event_date = "";
	$event_time = "";
	
	//Setting validating variables
	$nameErrMsg = "";
	$descriptionErrMsg = "";
	$presenterErrMsg = "";
	$dateErrMsg = "";
	$timeErrMsg = "";
	
	//$validForm = false;
	
	$todaysDate = date("Y-m-d");
	
	$updateVariable = $_GET['eventId'];
	
	if(isset($_POST["submit"]))
	{
		$event_name = $_POST['event_name'];
		$event_description = $_POST['event_description'];
		$event_presenter = $_POST['event_presenter'];
		$event_date = $_POST['event_date'];
		$event_time = $_POST['event_time'];
		
        $stmt = $conn->prepare("UPDATE wdv341_event
        SET event_date =:event_date, event_description =:event_description, event_name =:event_name, event_presenter =:event_presenter, event_time = :event_time WHERE event_Id = '$updateVariable' ");
        $stmt->bindParam(':event_name', $event_name);
        $stmt->bindParam(':event_description', $event_description);
        $stmt->bindParam(':event_presenter', $event_presenter);
        $stmt->bindParam(':event_date', $event_date);
		$stmt->bindParam(':event_time', $event_time);
		$stmt->execute();
		
		include 'select.php';
		
      if($updateVariable == $updateVariable)
      $stmt = $conn->query("SELECT * FROM `wdv341_event` WHERE event_Id = '$updateVariable' ");
      while ($row = $stmt->fetch())
        {
          $languageArray[$row[0]] = $row[1];
          $event_name = $row['event_name'];
          $event_description = $row['event_description'];
          $event_presenter = $row['event_presenter'];
          $event_date = $row['event_date'];
		  $event_time = $row['event_time'];
        }
	}
	$stmt = $conn->prepare("SELECT * FROM wdv341_event WHERE event_Id = '$updateVariable'");
	$stmt->execute();
      while ($row = $stmt->fetch())
        {
          $languageArray[$row[0]] = $row[1];
          $event_name = $row['event_name'];
          $event_description = $row['event_description'];
          $event_presenter = $row['event_presenter'];
          $event_date = $row['event_date'];
		  $event_time = $row['event_time'];
        }

	//$validForm = true;
	?>
</head>

<body>
			<form id="form1" name="form1" method="post" action="updateEventsForm.php?eventId=<?=$updateVariable?>">
			<h1>Update Event Record</h1>
      <p>
			    <input type="text" name="event_name" id="event_name" placeholder="Event Name" value="<?php echo($event_name); ?>" />
      </p>
      <p>
			    <input type="text" name="event_description" id="event_description" placeholder="Description" value="<?php echo($event_description);?>" />
			</p>
      <p>
			    <input type="text" name="event_presenter" id="event_presenter" placeholder="Presenter Name" value="<?php echo($event_presenter); ?>" />
      </p>
      <p>
			    <input type="date" name="event_date" id="event_date" value="<?php echo($event_date); ?>" />
			</p>
      <p>Time:
      <br>
			    <input type="time" name="event_time" id="event_time" value="<?php echo($event_time); ?>" />
			</p>
			<p>
				<input type="submit" name="submit" id="button" value="Update" />
				<input type="reset" name="button2" id="button2" value="Clear" onClick="resetForm()" />
			</p>
      <br>
				<h2><a href="select.php">View Table</a></h2>
				<h2><a href="logout.php">Logout</a></h2>
		</form>
</body>
</html>
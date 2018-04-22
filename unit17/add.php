<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<?php	
	session_start();
	if($_SESSION["valid_user"] = false)
	{
		header("Location: login.php");
	}
	include 'connect.php';

	$event_name = "";
	$event_description = "";
	$event_presenter = "";

	if(isset($_POST["submit"]))
	{
		$event_name = $_POST['event_name'];
		$event_description = $_POST['event_description'];
		$event_presenter = $_POST['event_presenter'];
		
      $stmt = $conn->prepare("INSERT INTO wdv341_event (event_name, event_description, event_presenter)
      VALUES (:event_name, :event_description, :event_presenter)");
      $stmt->bindParam(':event_name', $event_name);
	  $stmt->bindParam(':event_description', $event_description);
	  $stmt->bindParam(':event_presenter', $event_presenter);
	  $stmt->execute(); 
		echo '<h2>new record added</h2>';
	}
	else{
		echo '<br>';
		echo '<h2>record could not be added</h2>';
	}
	?>
</head>

<body>
	<form id="form1" name="form1" method="post" action="add.php">
		<p>Event Name:<input type="text" id="event_name" name="event_name" value="<?php echo $event_name; ?>"></p>
		<p>Event Description:<input type="text" id="event_description" name="event_description" value="<?php echo $event_description; ?>"></p>
		<p>Event Presenter:<input type="text" id="event_presenter" name="event_presenter" value="<?php echo $event_presenter; ?>"></p>
			<input type="submit" name="submit" id="buton" value="ADD">
			<input type="reset" name="button2" id="button2" value="Reset">
		<h2><a href="select.php">Show Table</a></h2>
		<h2><a href="logout.php">Logout</a></h2>
	</form>
</body>
</html>
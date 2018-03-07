<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Funtions</title>
	
	<?php 
	
	function newDate(){
		
		$date=date_create_from_format("m-d-Y","09-29-1988");
		echo date_format($date,"m/d/Y");
	}
	
	function internationalDAte(){
		$date=date_create("2013-05-25",timezone_open("Europe/Paris"));
		echo date_format($date,"Y-m-d H:i:sP") . "<br>";
	}
	
	function stringVariable(){
		$armyVariable="Army Strong";
		echo strlen($armyVariable);
		echo "<br>";
		echo trim($armyVariable);
		echo "<br>";
		echo strtolower($armyVariable);
	}
	
	function forNumber(){
		$theNumber = 1234567890;
		echo number_format($theNumber,2);
	}
	

	function usCurrency(){
		$currency = 123456;
		printf("$%01.2f", $currency);
	}
	?>
</head>

<body>
	<?php echo "<h1>1. The best day on earth is: </h1>"; echo newDate(); ?>
	<?php echo "<h1>2. Time in Paris is: </h1>"; echo internationalDAte();?>
	<?php echo "<h1>3a. The length of Army Strong is</h1>"; echo stringVariable();?>
	<?php echo "<h1>4. Formatted Number: </h1>"; echo forNumber();?>
	<?php echo "<h1>5. US Formatted Currency of The Number is:</h1>"; echo usCurrency();?>
</body>
</html>
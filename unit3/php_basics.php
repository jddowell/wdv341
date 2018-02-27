<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Basics</title>
	<style>
		p{
			color: red;
			font-weight: bolder;
			font-size: 2em;
		}
	</style>
</head>

<body>
	<?php $yourName = "Justin Dowell"; ?>
	<?php $numberone = 45; ?>
	<?php $numbertwo = 30; ?>
	<?php $numberthree = 20; ?>
	
	<h1><?php echo "Assignment PHP Basics"; ?></h1>
	<h2><?php echo "My name is: " .$yourName ?></h2>
	<p></p>
	<p><?php echo $numberone; ?></p>
	<p><?php echo $numbertwo; ?></p>
	<p><?php echo $numberthree; ?></p>
	<p>Your total is: <?php echo $numberone + $numbertwo + $numberthree; ?></p>
</body>
</html>
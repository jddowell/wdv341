<?php


	include 'emailer.php';
	
	$newEmail = new Emailer(); //instantiate a new object/variable

	$newEmail->setSendTo("jddowell@dmacc.edu");
	
	echo $newEmail->getSendTo();
	
	echo "<br><br>";
	
	$newEmail->setEmailSubject("Test");
	
	echo $newEmail->getEmailSubject();
	
	echo "<br><br>";
		
	$newEmail->setEmailMsg("This is a test Email!");

	echo $newEmail->getEmailMsg();
		
	echo "<br><br>";

	$newEmail->setSentFrom("test@justindowell.net");
	
	echo $newEmail->getSentFrom("test@justindowell.net");
	
	$newEmail->sendEmail();

?>
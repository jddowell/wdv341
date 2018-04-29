<?php


	include 'emailer.php';

	include 'contact.php';
	
	$newEmail = new Emailer(); //instantiate a new object/variable

	$newEmail->setSendTo($email);
	
	echo $newEmail->getSendTo();
	
	echo "<br><br>";
	
	$newEmail->setEmailSubject("PT Scores");
	
	echo $newEmail->getEmailSubject();
	
	echo "<br><br>";
		
	$newEmail->setEmailMsg("Your Scores Have Been Successfully Sent!");

	echo $newEmail->getEmailMsg();
		
	echo "<br><br>";

	$newEmail->setSentFrom("test@justindowell.net");
	
	echo $newEmail->getSentFrom("test@justindowell.net");
	
	$newEmail->sendEmail();

?>
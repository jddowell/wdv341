<!DOCTYPE html>
<html>
<!-- <?php print_r($_POST); ?> -->
<head>
  <meta charset="utf-8">
  <title>DMACC Portfolio Day Bio Form</title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/normalize.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
  <!-- css3-mediaqueries.js for IE less than 9 -->

<script src="css3-mediaqueries.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
	//Variables
	$student_emailToLogin = "";
	$student_firstname = "";
	$student_lastname = "";
	$student_program = "";
	$student_program2 = "";
	$student_websiteAddress = "";
	$student_websiteAddress2 = "";
	$student_email = "";
	$student_linkedIn = "";
	$student_hometown = "";
	$student_careerGoals = "";
	$student_threeWords = "";
	
	//error variables
	$firstNameError = "";
	$lastNameError = "";
	$programError = "";
	$websiteAddressError = "";
	$websiteAddress2Error = "";
	$linkinError = "";
	$emailError = "";
	$hometownError = "";
	$careerGoalsError = "";
	$threeWordsError = "";
	$captchaError = "";
	
	$validForm = false;
	$message = "";
	
	if(isset($_POST["submit"]))
	{
		$student_emailToLogin = $_POST['emailToLogin'];
		$student_firstname = $_POST['firstName'];
		$student_lastname = $_POST['lastName'];
		$student_program = $_POST['program'];
		$student_program2 = $_POST['program2'];
		$student_websiteAddress = $_POST['websiteAddress'];
		$student_websiteAddress2 = $_POST['websiteAddress2'];
		$student_email = $_POST['email'];
		$student_linkedIn = $_POST['linkedIn'];
		$student_hometown = $_POST['hometown'];
		$student_careerGoals = $_POST['careerGoals'];
		$student_threeWords = $_POST['threeWords'];
		if(isset($_POST['g-recaptcha-response'])){
	      $captcha = $_POST['g-recaptcha-response'];
	    }
	
	
		function validateFirstName($inName)
		{
			global $validForm, $firstNameError;	
			$firstNameError = "";
			
			if($inName == "")
			{
				$validForm = false;
				$firstNameError = "First name is required";
			}else if(!preg_match('/^[A-Za-z0-9 ]*[A-Za-z0-9][A-Za-z0-9 ]*$/', $inName)){
				$validForm = false;
				$firstNameError = "First name cannot contain special characters";
			}
		}

		function validateLastName($inName)
		{
			global $validForm, $lastNameError;	
			$lastNameError = "";
			
			if($inName == "")
			{
				$validForm = false;
				$lastNameError = "Last name is required";
			}else if(!preg_match('/^[A-Za-z0-9 ]*[A-Za-z0-9][A-Za-z0-9 ]*$/', $inName)){
				$validForm = false;
				$lastNameError = "Last name cannot contain special characters";
			}
		}

		function validateProgram($program)
		{
			global $validForm, $programError;
			$programError = "";
			
			if($program == "default")
			{
				$validForm = false;
				$programError = "Must select an option";
			}
		}

		function validateWebsiteAddress($address)
		{
			global $validForm, $websiteAddressError;
			
			$websiteAddressError = "";
			
			if(!empty($address)){
				if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$address))
				{
					$validForm = false;
					$websiteAddressError = "Invalid URL";
				}
			}
		}

		function validateWebsiteAddress2($address2)
		{
			global $validForm, $websiteAddress2Error;
			
			$websiteAddressError2 = "";
			
			if(!empty($address2)){
				if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$address2))
				{
					$validForm = false;
					$websiteAddress2Error = "Invalid URL";
				}
			}
		}

		function validatelinkIn($linkedin)
		{
			global $validForm, $linkinError;
			//echo("here".$linkedin.strpos($linkedin , "linkedin.com"));
			if(!empty($linkedin)){
				if(!strstr($linkedin , "linkedin.com"))
				{
					$validForm = false;
					$linkinError = "Invalid LinkedIn URL";
				}
			}
		}

		function validateEmail($inEmail)
		{
			global $validForm, $emailError;			//Use the GLOBAL Version of these variables instead of making them local
			$emailError = "";							//Clear the error message. 
			
			// Remove all illegal characters from email
			$inEmail = filter_var($inEmail, FILTER_SANITIZE_EMAIL);

			if(!empty($inEmail)){
				// Validate e-mail
				$inEmail = filter_var($inEmail, FILTER_VALIDATE_EMAIL);

				if($inEmail === false)
				{
					$validForm = false;
					$emailError = "Invalid email. Match format: email@email.com"; 					
				}
			}
		}

		function validateHometown($hometown)
		{
			global $validForm, $hometownError;	
			$hometownError = "";
			
			if($hometown == "")
			{
				$validForm = false;
				$hometownError = "Hometown is required";
			}else if(!preg_match('/^[A-Za-z0-9 ,]*[A-Za-z0-9][A-Za-z0-9 ,]*$/', $hometown)){
				$validForm = false;
				$hometownError = "Hometown cannot contain special characters";
			}
		}

		function validateCareerGoals($career)
		{
			global $validForm, $careerGoalsError;	
			$careerGoalsError = "";
			
			if (strlen(trim($_POST['careerGoals']))){
				if(!preg_match('/^[A-Za-z0-9 ,\!\?\"\_\-\'.]*$/', $career)){
					$validForm = false;
					$careerGoalsError = "Career goals can only contains letters, numbers, and punctuation";
				}
			}
		}

		function validateThreeWords($words)
		{
			global $validForm, $threeWordsError;	
			$threeWordsError = "";
			
			if(!empty($words))
			{
				if(!preg_match('/^[A-Za-z0-9 ,\!\?\"\_\-\'.]*$/', $words)){
					$validForm = false;
					$threeWordsError = "Description can only contains letters, numbers, and punctuation";
				}
			}
		}

		// reCaptcha
	    function validateRecaptcha($captcha){
	    	global $validForm, $captchaError;

	    	$secretKey = "6Le3REoUAAAAAIVoaYSGnA23Jcft4Ey5IzvojUIo";
		    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha);
		    $responseKeys = json_decode($response,true);

		    if($responseKeys["success"] != true) {
		      $validForm = false;
		      $captchaError = "Please complete the reCaptcha";
		    }
		    
		    grecaptcha.reset();
	    }

		$validForm = true;		//switch for keeping track of any form validation errors
		
		validateFirstName($student_firstname);
		validateLastName($student_lastname);
		validateProgram($student_program);
		validateWebsiteAddress($student_websiteAddress);
		validateWebsiteAddress2($student_websiteAddress2);
		validatelinkIn($student_linkedIn);
		validateEmail($student_email);
		validateHometown($student_hometown);
		validateCareerGoals($student_careerGoals);
		validateThreeWords($student_threeWords);
		validateRecaptcha($captcha);
		
		if($validForm)
		{
			$message = "All good";	
		}
		else
		{
			$message = "Something went wrong";
		}
	}
	
?>
	<!-- Input Field validations. 

validateFirstName
	// valid first name should only include letters, numbers, and spaces
	// ... must be present


validateLastName
	// valid last name should only include letters, numbers and spaces
	// ... must be present

validateProgram
	//valid program must not be default options

validateWebsiteAddress
	//valid URL format

validateWebsiteAddress2
	//valid URL format	

validateLinkedIn
	//valid URL to linkedin.com

validateEmail
	//valid email should be in a proper format  
	//Matches: bob@aol.com | bob@wrox.co.uk | bob@domain.info |123@123.123
	//Non-Matches: a@b | notanemail | bob@@.

validateHometown
	// valid name should only include letters, numbers, spaces, and commas
	// ... must be present

validateCareerGoals
	//valid career goals should include only numbers, letters, spaces, and basic punctuation

validateThreeWords
	//valid three-words should include only numbers, letters, spaces, and basic punctuation

-->
<script>

	$(document).ready(function(){

		var programDropdown = document.getElementById("program");
		var selectedProgram = programDropdown.options[programDropdown.selectedIndex].value;

		var programDropdown2 = document.getElementById("program2");
		var selectedProgram2 = programDropdown2.options[programDropdown2.selectedIndex].value;

		if( selectedProgram == "webDevelopment" || selectedProgram2 == "webDevelopment")
		{
			$(".secondWeb").css("display", "inline");
		}
		else
		{
			$(".secondWeb").css("display", "none");
		}
		
		$("select#program").change(function(){
			var programDropdown = document.getElementById("program");
			var selectedProgram = programDropdown.options[programDropdown.selectedIndex].value;

			if( selectedProgram == "webDevelopment")
			{
				$(".secondWeb").css("display", "inline");
			}
			else
			{
				$(".secondWeb").css("display", "none");
			}
		});

		$("select#program2").change(function(){
			var programDropdown2 = document.getElementById("program2");
			var selectedProgram2 = programDropdown2.options[programDropdown2.selectedIndex].value;

			if(selectedProgram2 == "webDevelopment")
			{
				$(".secondWeb").css("display", "inline");
			}
			else
			{
				$(".secondWeb").css("display", "none");
			}
		});

		
		
	});

	function resetForm(){
			$("#firstName").val("");
			$("#lastName").val("");
			$("#program").val("default");
			$("#websiteAddress").val("");
			$("#websiteAddress2").val("");
			$("#email").val("");
			$("#hometown").val("");
			$("#careerGoals").val("");
			$("#threeWords").val("");
			$('.error').html("");
		}
	
	
	</script>
	<!-- reCaptcha -->
	<script src='https://www.google.com/recaptcha/api.js'></script>
  
  <style>
	img{
		display: block;
		margin: 0 auto;
	}
	.frame{
		background-image: url("orange popsicle.jpg");
		padding: 1em;	
	}
	.frame2{
		background-image: url("citrus.jpg");
		padding: 1.3em;	
	}	
	body{
		background-image: url("bodacious.png");
		margin: 1.5em;
	}
	
	.main {
		padding: 1em;
		background-color: white;
	}
	form{
		text-align: center;
	}
	h2 {
		text-align: center;
	}
	.robotic{
		display: none;
	}

	.form {
		background-color:white;
		padding-left: 5em;
	}
	p {
		align:left;
	}	
	.citrus{
		margin: auto;
		background-image: url("raspberry.jpg");
		padding: 1.3em;	
		width: 70%;
	}
	.bamboo{
		background-image: url("bamboo.jpg");
		padding: 1em;	
	}	
	.violet{
		background-image: url("ultra violet.png");
		padding: .5em;	
	}
	.secondWeb{
		display: none;
	}	
	table{
		margin: auto;
	}
	table td{
		padding-bottom: .75em;
	}
	.error{
		font-style: italic;
		color: #d42a58;
		font-weight: bold;
	}

@media only screen and (max-width:620px) {
  /* For mobile phones: */
  img {
    width:100%;
  }
  .form {
	width:100%; 
	padding-left: .1em;
	padding-top: .1em;
  }
  .citrus {
	background-image:none;  
  }
  .bamboo {
	background-image:none;  
  } 
  .violet {
	background-image:none;  
  }   
  table{
		margin: auto;
	}
  table td{
		padding-bottom: .5em;
	}
}
	
  </style>
  

  
</head>

<section class="orange">
<body>
<div class="frame2">
<div class="frame">

  <div class="main">
  <div><img src="madonna.gif" alt="Mix gif" ></div>
  <br>

<!--<a href = 'dmaccPortfolioDayLogout.php'>Log Out</a>-->

<section class="citrus">
<section class="bamboo">
<section class="violet">

	<div class="main form">
	
	<h2><?php echo $message; ?></h2>
	</table>
	<form id="portfolioBioForm" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
		
		<table>
		<tr>
		<td>Login Email:<br> <input type="text" id="emailToLogin" name="emailToLogin" value="<?php echo $student_emailToLogin;  ?>"/></td>
		</tr>
		<tr>
		<td>First Name:<br> <input type="text" id="firstName" name="firstName" value="<?php echo $student_firstname;  ?>"/><br><span class="error" id="firstNameError"><?php echo($firstNameError);?></span></td>
		</tr>
		<tr>
		<td>Last Name:<br> <input type="text" id="lastName" name="lastName" value="<?php echo $student_lastname;  ?>" /><br><span class="error" id="lastNameError"><?php echo($lastNameError);?></span></td>
		</tr>
		<tr>
		<td >Program:<br> <select id="program" name="program">
				<option value="default" >---Select Your Program---</option>
				<option value="animation" <?php if($student_program == "animation"){echo "selected=selected";}?>>Animation</option>
				<option value="graphicDesign" <?php if($student_program == "graphicDesign"){echo "selected=selected";}?>>Graphic Design</option>
				<option value="photography" <?php if($student_program == "photography"){echo "selected=selected";}?>>Photography</option>
				<option value="videoProduction" <?php if($student_program == "videoProduction"){echo "selected=selected";}?>>Video Production</option>
				<option value="webDevelopment" <?php if($student_program == "webDevelopment"){echo "selected=selected";}?>>Web Development</option>
			</select><br><span class="error" id="programError"><?php echo($programError);?></span><td>
		</tr>
		<tr>
		<td >Secondary Program:<br> <select id="program2" name="program2">
				<option value="none" >---No Secondary Program---</option>
				<option value="animation" <?php if($student_program2 == "animation"){echo "selected=selected";}?>>Animation</option>
				<option value="graphicDesign" <?php if($student_program2 == "graphicDesign"){echo "selected=selected";}?>>Graphic Design</option>
				<option value="photography" <?php if($student_program2 == "photography"){echo "selected=selected";}?>>Photography</option>
				<option value="videoProduction" <?php if($student_program2 == "videoProduction"){echo "selected=selected";}?>>Video Production</option>
				<option value="webDevelopment" <?php if($student_program2 == "webDevelopment"){echo "selected=selected";}?>>Web Development</option>
			</select><br><span class="error" id="program2Error"></span><td>
		</tr>
		<tr>
		<td>Website Address:<br> <input type="text" id="websiteAddress" name="websiteAddress" value="<?php echo $student_websiteAddress;  ?>"/><br><span class="error" id="websiteAddressError"><?php echo($websiteAddressError);?></span></td>
		</tr>
		<tr>
		<td class="secondWeb">Secondary Website Address (git repository, etc.):<br> <input type="text" id="websiteAddress2" name="websiteAddress2" value="<?php echo $student_websiteAddress2;  ?>"/><br><span class="error" id="websiteAddress2Error"><?php echo($websiteAddress2Error);?></span></td>
		</tr>
		<tr>
		<td>LinkedIn Profile:<br><input type="text" id="linkedIn" name="linkedIn" value="<?php echo $student_linkedIn;  ?>" /><br><span class="error" id="linkedInError"><?php echo($linkinError);?></span></td>
		</tr>
		<tr>
		<td>Personal Email:<br><input type="text" id="email" name="email" value="<?php echo $student_email;  ?>" /><br><span class="error" id="emailError"><?php echo($emailError); ?></span></td>
		</tr>
		<tr>
		<td>Hometown:<br> <input type="text" id="hometown" name="hometown" value="<?php echo $student_hometown;  ?>"/><br><span class="error" id="hometownError"><?php echo($hometownError); ?></span></td>
		</tr>
		<tr>
		<td>Career Goals:<br> <textarea id="careerGoals" name="careerGoals"><?php echo($student_careerGoals); ?></textarea><br><span class="error" id="careerGoalsError"><?php echo($careerGoalsError); ?></span></td>
		</tr>
		<tr>
		<td>3 Words that Describe You:<br> <input type="text" id="threeWords" name="threeWords" value="<?php echo $student_threeWords;  ?>"/><br><span class="error" id="threeWordsError"><?php echo($threeWordsError); ?></span></td>
		</tr>
		<!-- <p class="robotic" id="pot">
			<label>Leave Blank</label>
			<input type="hidden" name="inRobotest" id="inRobotest" class="inRobotest" />
		</p> -->
		<tr>
    	<td><div class="g-recaptcha" data-sitekey="6Le3REoUAAAAAEJ8etrsYzKL7ZM9ZwMRldJCQ8tz"></div>
    	<span class="error"><?php echo $captchaError; ?></span></td>
    	
		<input type="hidden" id="submitConfirm" name="submitConfirm" value="submitConfirm"/>
		</tr>
		<tr>
		<td><input type="submit" id="submitBio" name="submit" value="Submit Bio" /></td>
		<!-- </tr> -->
		<tr>
		<td><input type="reset" id="resetBio" name="resetBio" value="Reset Bio" onclick="resetForm()"/></td>
		</tr>
		</table>
	</form>

	</div>
	

</section>	
</section>
</section>
  
</div>

</body>
</section>


</html>
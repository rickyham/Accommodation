<?php
session_start();

$errors = array();
//$errors = [];


function sendMail(){
	if(isset($_POST['fullname'],$_POST['phonenumber'],$_POST['message'],$_POST['email'])){
		//init variables
		$fullname = $_POST['fullname'];
		$phonenumber = $_POST['phonenumber'];
		//filter message input
		$message =  stripslashes(htmlentities($_POST['message'], ENT_QUOTES, 'UTF-8', false));
		$email =  $_POST['email'];

		//validate each input and get errors from function output
		$numberfield = validateNumber($phonenumber);
		$emailField = validateEmail($email);
		$nameField = validateName($fullname);
		$messageField = validateMessage($message);

		echo $message;

		$validationResults = array(
			"name" => $nameField,
			"email" => $emailField,
			"message" => $messageField,
			"number" => $numberfield
		);

		foreach ($validationResults as $result => $resultMessage) {
			if(!empty($resultMessage)){
				$errors[] = $resultMessage;
			}
		}

		//if errors array is empty get ready to send 
		if(empty($errors)){
			//send email
			echo "ready to send";
            
			if(!empty($antiSpam)){
				echo "<p> Sorry, You Don't Like Spam </p>";
			}else{
					if(mailer($message,$localAuth,$email,$phonenumber,$fullname)){
						echo "mail sent";
					}else{
						echo "Something went wrong please try again later";
					}

					$_SESSION['success'] = "Thank you, for your enquiry, we will get in touch with you as soon as possible";
					unset($_POST['fullname'],$_POST['phonenumber'],$_POST['message'],$_POST['email'],$_POST['localauthority']);
					header("location: success.php");
			}
		}else{
			echo "<p> Please check that you have entered in all the required information properly. </p>";
		}	
	}
}

function validateEmail($address){
	if(!empty($address)){
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
		if (!preg_match($regex, $address)) {
			return "This is not a valid email";
		}
	}else{
		return "Please enter your email.";
	}
}


function validateNumber($number){
	if(!empty($number)){
		if(!is_numeric($number)){
			return "Only numbers are allowed in this field";
		}else if(strlen($number) != 11){
			return "This is not a valid Phone number, ensure you have the correct details";
		}
	}else{
		return "Please enter your contact number.";
	}
}


function validateName($name){
	if(!empty($name)){
		if(!ctype_alpha(str_replace(' ', '', $name))){
			return "Please enter your real name.";
		}
	}else{
		return "Please enter your name.";
	}
}


function validateMessage($mess){
	if(empty($mess)){
		return "Please enter your enquiry.";
	}
}

//set this feild value if it is set so the user dont hacve to re-renter values
function isEntered($field){
	if(isset($field)){
		echo $field;
	}
}

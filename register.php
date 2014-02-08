<?php
	$notSet = array();
	
	if (empty($_POST['firstname'])){
		$notSet['firstname'] = '<strong>First Name is a required field</strong>';
	}
	if (empty($_POST['surname'])){
		$notSet['surname'] = '<strong>Surname is a required field</strong>';
	}
	if (empty($_POST['username'])){
		$notSet['username'] = '<strong>Username is a required field</strong>';
	}
	if (empty($_POST['pwd'])){
		$notSet['pwd'] = '<strong>Password is a required field</strong>';
	}
	if (empty($_POST['email'])){
		$notSet['email'] = '<strong>email is a required field</strong>';
	}/* elseif (!ereg($_POST['email'], '^[a-zA-Z0-9_\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$')) {
		$notSet['email'] = '<strong>invalid email address, please try again</strong>';
	}*/
	
	if(!empty($notSet)) {
		$registrationPage = file('register.html');
		foreach($notSet as $key => $value) {
			for($j = 0; $j < count($registrationPage); ++$j){
				if(strpos($registrationPage[$j], 'name="'.$key.'"')) {
					$registrationPage[$j] = $registrationPage[$j].''.$value;
					break 1;
				}
			}
		}
		for($j = 0; $j < count($registrationPage); ++$j){
			echo $registrationPage[$j];
		}
	} else {
		$userFile = fopen('Users\\users.txt', 'a');
		fwrite($userFile, print_r($_POST, true)."\r\n");
		fclose($userFile);
	}
/*
	$_POST['firstname'];
	$_POST['surname'];
	$_POST['username'];
	$_POST['pwd'];
	$_POST['dob'];//date of birth
	$_POST['mob'];//month of birth
	$_POST['yob'];//year of birth
	// date would be dd / m / YY
	$_POST['genderMale'];
	$_POST{'genderFemale'];
	$_POST['email'];
	$_POST['address'];
	$_POST['membershipType'];
	$_POST['memberDuration'];
*/
?>
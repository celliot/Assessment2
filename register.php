<?php
	session_start();
	
	include "Functions/myFunctions.php";
	$notSet = array();
	
	$noYob = -1000;
	$minPasswordLength = 8;
	$_POST["startDate"] = date('Y-m-d');
	
	$username = "";
	$password = "";
	if (empty($_POST["yob"])) {
		$_POST["yob"] = $noYob;
	}
	if (empty($_POST["firstname"])){
		$notSet["firstname"] = "<strong>First Name is a required field</strong>";
	}
	if (empty($_POST["surname"])){
		$notSet["surname"] = "<strong>Surname is a required field</strong>";
	}
	if (empty($_POST["username"])){
		$notSet["username"] = "<strong>Username is a required field</strong>";
	} else {
		$username = $_POST["username"]; 
	}
	if (empty($_POST["password"])){
		$notSet["password"] = "<strong>Password is a required field</strong>";
	} else {
		$password = $_POST["password"];
		if (!ereg("[a-zA-Z!@#$%]*[0-9]+[a-zA-Z!@#$%]*[0-9]+[0-9a-zA-Z!@#$%]*", $password)) {
			$notSet["password"] = "<strong>Password must be at least 8 characters long and contain at least 2 digits</strong>";
		}
		if (strlen($password) < 8) {
			$notSet["password"] = "<strong>Password must be at least 8 characters long and contain at least 2 digits</strong>";
		}
	}
	if (empty($_POST["email"])){
		$notSet["email"] = "<strong>email is a required field</strong>";
	} elseif (!ereg("^[a-zA-Z0-9_\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$", $_POST["email"])) {
		$notSet["email"] = "<strong>invalid email address, please try again</strong>";
	}
	
	$user = getUser($username, $password);
		
	if (!empty($user)) {
		$notSet["username"] = "<strong>username is already taken</strong>";
	}
	
	if(!empty($notSet)) {
		$registrationPage = file("register.html");
		foreach($notSet as $key => $value) {
			for($j = 0; $j < count($registrationPage); ++$j) {
				if(strpos($registrationPage[$j], "name='".$key."'") !== false) {
					$registrationPage[$j] = $registrationPage[$j]."".$value;
					break 1;
				}
			}
		}
		for($j = 0; $j < count($registrationPage); ++$j){
			echo $registrationPage[$j];
		}
	} else {
		$userFile = fopen('Users\\users.txt', 'a');
		foreach($_POST as $key => $value) {
			$line = $key." ".$value;
			fwrite($userFile, $line."\r\n");
		}
		fwrite($userFile, "\r\n");
		fclose($userFile);
		
		//to auto log in after registration form successful
		echo "<form action='index.php' method='post' name='userForm'>";
		echo "<input type='hidden' name='username' value='".$username."'>";
		echo "<input type='hidden' name='password' value='".$password."'></form>";
		echo "<script type='text/javascript'> document.userForm.submit(); </script>";
	}

?>
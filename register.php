<?php
	session_start();
	include "Functions\\myFunctions.php";
	$notSet = array();
	
	$username = "";
	$password = "";
	
	if (empty($_POST["firstname"])){
		$notSet["firstname"] = "<strong>First Name is a required field</strong>";
	}
	if (empty($_POST["surname"])){
		$notSet["surname"] = "<strong>Surname is a required field</strong>";
	}
	if (empty($_POST["username"])){
		$notSet["username"] = "<strong>Username is a required field</strong>";
	} else { $username = $_POST["username"]; }
	if (empty($_POST["pwd"])){
		$notSet["pwd"] = "<strong>Password is a required field</strong>";
	} else { $password = $_POST["pwd"]; }
	if (empty($_POST["email"])){
		$notSet["email"] = "<strong>email is a required field</strong>";
	}/* elseif (!ereg($_POST["email"], "^[a-zA-Z0-9_\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$")) {
		$notSet["email"] = "<strong>invalid email address, please try again</strong>";
	}*/
	
	$user = getUser($username, $password);
	
	if (!empty($user)) {
		$notSet["username"] = "<strong>username is already taken</strong>";
	}
	
	if(!empty($notSet)) {
		$registrationPage = file("register.html");
		foreach($notSet as $key => $value) {
			for($j = 0; $j < count($registrationPage); ++$j) {
				if(strpos($registrationPage[$j], "name='".$key."'")) {
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
		fwrite($userFile, print_r($_POST, true)."\r\n");
		fclose($userFile);
		
		//to auto log in after registration form successful
		echo "<form action='index.php' method='post' name='userForm'>";
		echo "<input type='hidden' name='username' value='".$username."'></form>";
		echo "<input type='hidden' name='password' value='".$password."'></form>";
		echo "<script type='text/javascript'> document.userForm.submit(); </script>";
	}
?>
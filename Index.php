<?php
	session_start();
	include "Functions\\myFunctions.php";
	$logInText = "<a id='signin' href='#' onclick='loadSignIn()'>Sign In</a><a id='register' href='register.html'>Register</a>";
	
	
	if (!empty($_SESSION["loggedInUser"])) {
		$logInText = "Welcome ".ucfirst($_SESSION['loggedInUser']);
	}
	
	if (!empty($_POST["username"]) && !empty($_POST["password"])) {
		$user = getUser($_POST["username"], $_POST["password"]);
		if (!empty($user)) {
			$_SESSION["loggedInUser"] = $_POST["username"];
			var_dump($_SESSION);
			$logInText = "Welcome ".ucfirst($_SESSION["loggedInUser"]);
		}
	}
	$indexPage = fopen("HTML\\index.html", "r");
	
	while(!feof($indexPage)){
		$line = fgets($indexPage);
		if(putAfterLine($line, "<div class='writing' id='registration'>", $logInText)) continue;
		echo $line;
	}

?>

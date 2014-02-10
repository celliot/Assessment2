<?php
	session_start();
	include "Functions/myFunctions.php";
	$logInText = "<a id='signInBtn' href='#'>Sign In</a><a id='register' href='register.html'>Register</a>";
	$shoppingLink = "";
	$shoppingPage = "";
	$logout = 0;
	
	if(!empty($_POST["logout"])) $logout = $_POST["logout"];
	if ($logout == 1) {
		session_destroy();
	} 
	
	if (!empty($_SESSION["loggedInUser"])) {
		$logInText = "Welcome ".ucfirst($_SESSION['loggedInUser']);
		$shoppingLink = "<li><a id='shoppingBtn' class='menubarbtn' href='#'>Shopping</a></li>";
		$shoppingPage = file_get_contents("HTML/shopping.html");
	}
	
	if (!empty($_POST["username"]) && !empty($_POST["password"])) {
		$user = getUser($_POST["username"], $_POST["password"]);
		if (!empty($user)) {
			$_SESSION["loggedInUser"] = $_POST["username"];
			$logInText = "Welcome ".ucfirst($_SESSION["loggedInUser"]."<a href='logout.php' id='logout'>logout</a>");
			$shoppingLink = "<li><a id='shoppingBtn' class='menubarbtn' href='#'>Shopping</a></li>";
			$shoppingPage = file_get_contents("HTML/shopping.html");
		}
	}
	$indexPage = fopen("HTML/index.html", "r");
	
	while(!feof($indexPage)){
		$line = fgets($indexPage);
		if(putAfterLine($line, "<div class='writing' id='registration'>", $logInText)) continue;
		if(putAfterLine($line, "<li><a id='hallBtn' class='menubarbtn' href='#'>Hall of Fame</a></li>", $shoppingLink)) continue;
		if(putAfterLine($line, "<div id='shopping'>", $shoppingPage)) continue;
		
		echo $line;
	}

?>

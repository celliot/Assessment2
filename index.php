<?php
	session_start();
	include "Functions/myFunctions.php";
	$logInText = "<a id='signInBtn' href='#'>Sign In</a><a id='register' href='register.html'>Register</a>";
	$shoppingLink = "";
	$shoppingPage = "";
	$logout = 0;
	$user = array();
	
	if(!empty($_POST["logout"])) $logout = $_POST["logout"];
	if ($logout == 1) {
		session_destroy();
	} 
	
	if (!empty($_SESSION["loggedInUser"])) {
		$logInText = "Welcome ".ucfirst($_SESSION['loggedInUser']);
		$shoppingLink = "<li><a id='shoppingBtn' class='menubarbtn' href='#'>Shopping</a></li>";
		$shoppingPage = getShoppingPage();
	}
	
	if (!empty($_POST["username"]) && !empty($_POST["password"])) {
		$user = getUser($_POST["username"], $_POST["password"]);
		if (!empty($user)) {
			$_SESSION["loggedInUser"] = $_POST["username"];
			$logInText = "Welcome ".ucfirst($_SESSION["loggedInUser"]."<a href='logout.php' id='logout'>logout</a>");
			$shoppingLink = "<li><a id='shoppingBtn' class='menubarbtn' href='#'>Shopping</a></li>";
			$shoppingPage = getShoppingPage();
		}
	}
	$indexPage = fopen("HTML/index.html", "r");
	 
	$products = "";
	$productArray = getProducts();
	if(!empty($productArray)){
		$products = $products."<div>";
		for($i = 0; $i < count($productArray); ++$i) {
			$products = $products."<label class='cartList' for='".$productArray[$i][3]."'>".$productArray[$i][1]."</label><input type='number' id='".$productArray[$i][3]."' size='6' value='0'></input><br>";
		}
		$products = $products."</div>";
	}
	
	$orderSummary = "<p>Order Summary</p>";
	if(!empty($user)){
		$orderSummary = $orderSummary."<br>Name: ".$user["firstname"]." ".$user["surname"];
		$orderSummary = $orderSummary."<br>Email: ".$user["email"];
		$orderSummary = $orderSummary."<br>Credit Card Number: XXXX-XXXX-XXXX-XXXX";
		$orderSummary = $orderSummary."<br>Expiry Date: XX/XX";
		$orderSummary = $orderSummary."<br>Billing Address: ".$user["address"]."<br>";
	}
	
	while(!feof($indexPage)){
		$line = fgets($indexPage);
		if(putAfterLine($line, "<div class='writing' id='registration'>", $logInText)) continue;
		if(putAfterLine($line, "<li><a id='hallBtn' class='menubarbtn' href='#'>Hall of Fame</a></li>", $shoppingLink)) continue;
		if(putAfterLine($line, "<div id='shopping'>", $shoppingPage)) continue;
		if(putAfterLine($line, "<p><a href='#' class='shoppingBtn'>Back to Shopping</a></p>", $products)) continue;
		if(putAfterLine($line, "<div id='orderSummary'>", $orderSummary)) continue;
		echo $line;
	}

?>

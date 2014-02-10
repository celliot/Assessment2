<?php
	function getProducts() {
		$shoppingFile = fopen("products.txt", "r");
		$productInfo = array();
		$productQty = 0;
		
		while (!feof($shoppingFile)) {
			$productInfo[$productQty] = explode("-", fgets($shoppingFile));
			++$productQty;
		}
		return $productInfo;
	}
	
	function getShoppingPage() {
		$shoppingFile = fopen("products.txt", "r");
		$shoppingPage = "";
		if(!empty($shoppingFile)){
			$shoppingPage = $shoppingPage."<p id='topCenter'><a href='#' class='cart'>View Cart</a></p>";
		}
		while (!feof($shoppingFile)){
			$productInfo = explode("-", fgets($shoppingFile));
			$shoppingPage = $shoppingPage."<div class='img'>
  			<a href='#' class='".$productInfo[3]."'>
  				<img class='thumbnail' src='Images/".$productInfo[0]."' alt='".$productInfo[1]."' />
  			</a>
  			<p class='underPic'>".$productInfo[1]."</p>
  			<p class='underPic'>".$productInfo[2]."</p>
  			<p class='underPic'><a href='#' name='".$productInfo[3]."' class='cart' >Add to Cart</a></p>
  			</div>";
		}
  		return $shoppingPage;
  	}

	function getUser($username, $password) {
		$allUsers = getUsers();
		if(!empty($allUsers)) {
			for($i = 0; $i < count($allUsers); ++$i) {
				if (!empty($allUsers[$i]["username"]) && $allUsers[$i]["username"] == $username){
				 	if (!empty($allUsers[$i]["password"]) && $allUsers[$i]["password"] == $password) {
						$user = $allUsers[$i];
					} else $user = $allUsers[$i]["username"];
				}
			}
		}
		return isset($user) ? $user : array();
	}
	
	function getUsers() {
		$userFileRead = fopen("Users/users.txt", "r");
		$users = array();
		
		$userNum = 0;
		
		while (!feof($userFileRead)){
			
			$line = fgets($userFileRead);
			$line = explode(" ", trim($line));
			if (count($line) != 2){
				++$userNum;
				continue;
			}
			$users[$userNum][$line[0]] = $line[1];
					
		}
		fclose($userFileRead);
		return $users;
	}
	
	function putAfterLine($line, $match, $newLine) {
		$success = false;
		if (strpos($line, $match)){
			echo $line;
			echo $newLine;
			$success = true;
		}
		return $success;
	}

	
?>
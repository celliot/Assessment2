<?php
	function getUser($username, $password) {
		$allUsers = getUsers();
		for($i = 0; $i < count($allUsers); ++$i) {
			if ($allUsers[$i]["username"] == $username && $allUsers[$i]["password"] == $password){
				return $allUsers[$i];
			}
		}
		return false;
	}
	
	function getUsers() {
		$userFileRead = fopen("Users\\users.txt", "r");
		$users = array();
		
		$userNum = 0;
		
		while (!feof($userFileRead)){
			
			$line = fgets($userFileRead);
			if (ereg($line, "^\[[a-zA-Z0-9]+\] => [a-zA-Z0-9]*$")) {
				$userInfo = explode(" ", $line);
				$users[$userNum][substr($userInfo[0], 1, -1)] = $userInfo[2];
			}
			
			if (strlen(trim($line)) == 0) {
				++$userNum;
			}
			
		}
		fclose($userFileRead);
		return $users;
	}
	
?>
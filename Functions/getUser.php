<?php
	function getUser($username, $password) {
		$allUsers = getUsers();
		for($i = 0; $i < count($allUsers); ++$i) {
			if ($allUsers[$i]["username"] == $username){
				 if ($allUsers[$i]["password"] == $password) {
					$user = $allUsers[$i];
				}
				$user = $allUsers[$i]["username"];
			}
		}
		return isset($user) ? $user : array();
	}
	
	function getUsers() {
		$userFileRead = fopen("Users\\users.txt", "r");
		$users = array();
		
		$userNum = 0;
		
		while (!feof($userFileRead)){
			
			$line = fgets($userFileRead);
			if (ereg("^\[[a-zA-Z0-9]+\] => [a-zA-Z0-9]*$", $line)) {
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
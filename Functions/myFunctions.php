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
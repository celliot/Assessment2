<?php
	echo "<html><head><link rel='stylesheet' href='hobbit.css' type='text/css' /></head><body>";
	echo "<form action='index.php' method='post' name='userForm'>";
	echo "<input type='hidden' name='logout' value='1'>";
	echo "<script type='text/javascript'> document.userForm.submit(); </script>";
	echo "</body></html>";
?>
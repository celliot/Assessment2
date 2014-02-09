<?php
	session_start();
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Shopping</title>
	<link rel="stylesheet" href="frames.css" type="text/css" />
	<link rel="stylesheet" media="screen" href="http://openfontlibrary.org/face/leo-arrow" type="text/css" />
</head>
<body>
<div>
	<img id="background" src="Images/shopping.png" alt="Image of the dragon Smaug" />
	<div class="writing"><?php echo $_SESSION["loggedInUser"]; ?></div>
</div>
</body>
</html>

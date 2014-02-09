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
			$logInText = "Welcome ".ucfirst($_SESSION["loggedInUser"]);
		}
	}
	
	var_dump($_POST);
	
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>The Hobbit: The Desolation of Smaug</title>
	<link rel="stylesheet" href="hobbit.css" type="text/css" />
	<link rel="stylesheet" media="screen" href="http://openfontlibrary.org/face/leo-arrow" type="text/css" /> 
	<script type="text/javascript" src="Scripts/main.js"></script>
	<script type="text/javascript" src="Scripts/jquery-1.11.0.js"></script>
</head>
<body onload="loadHome()">
<div class="page">
	<div class="header">
		<div class="writing" id="registration">
			<?php echo $logInText ?>
		</div>
		<a href="#" onclick="loadHome()"><img id="logo" src="Images/logo.png" alt="The Hobbit Logo" /></a>
		<div id="menubar" class="writing">
		<ul>
			<li><a id="home" class="menubarbtn" href="#" onclick="loadHome()">Home</a></li>
			<li><a id="castCrew" class="menubarbtn" href="#" onclick="loadCastCrew()">Cast &amp; Crew</a></li>
			<li><a id="gallery" class="menubarbtn" href="#" onclick="loadGallery()">Gallery</a></li>
			<li><a id="shopping" class="menubarbtn" href="#" onclick="loadShopping()">Shopping</a></li>
			<li><a id="videos" class="menubarbtn" href="#" onclick="loadVideos()">Videos</a></li>
			<li><a id="hall" class="menubarbtn" href="#" onclick="loadHallofFame()">Hall of Fame</a></li>
		</ul>
		</div>
	</div>	
	<div class="main">
	<iframe id="currentFrame" src="" frameBorder="0" scrolling="No"></iframe>
	</div>
</div>
<div class="footer">
		<div class="creditsContainer">
		<img id="credits" src="Images/credits.png" alt="NEW LINE CINEMA and METRO-GOLDWYN PICTURES present a WINGNUT FILMS production 'THE HOBBIT: THE DESOLATION OF SMAUG' IAN McKELLEN MARTIN FREEMAN RICHARD ARMITAGE BENEDICT CUMBERPATCH EVANGELINE LILLY LEE PACE LUKE EVANS KEN SCOTT JAMES NESBITT and ORLANDO BLOOM as LEGOLAS music by HOWARD SHORE co-producers PHILLIPA BOYENS EILEEN MORAN armour, weapons, creatures, and special makeup by WETA WORKSHOP LTD. visual effects and anmation by WETA DIGITAL LTD senior visual effects supervisor JOE LETTERI edited by JABEZ OLSSEN production designer DAN HENNAH director of photography ANDREW LESNIE, acs, asc executive producers ALAN HORN TOBY EMERICK KEN KAMINS CAROLYN BLACKWOOD produced by CAROLYNNE CUNNINGHAM ZANE WEINER FRAN WALSH PETER JACKSON based on the novile by J.R.R. TOLKIEN screenplay by FRAN WALSHJ &amp; PHILLIPA BOYENS &amp;d GUILLERMO del TORO directed by PETER JACKSON, MGM, New Line Cinema, thehobbit.com #theHobbit facebook.com/TheHobbitMovie, rated: PG-13" />
		</div>
</div>
</body>
<script type="text/javascript">
	$('.shopping').click(function(tag) {
		tag.preventDefault();
		$(this).parents('form').submit();
	});
</script>
</html>

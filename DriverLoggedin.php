<?php

session_start();
// if(isset($_POST['submitlog'])){
//  	include 'database.php';
//  $usn=$_POST["username"];
//  $pswd=$_POST["password"];
// }
?>

<!DOCTYPE html>
<html>
<head>
	<title> Typing Mania</title>
	<link rel="stylesheet" type="text/css" href="driver-style-1.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gruppo|Montserrat|Unica One|Black Ops One">

</head>
<body>
	<div class="image">
		<img src="logo.png" width="400" height="300">
	</div>

	<nav class="navigation">
	  <ul class="menu">
	    <li><a href="#!">Home</a></li>
	    <li><a href="#!">About</a></li>
	    <li><a href="#!">Contact</a></li>
	    <li><a href="http://localhost/TypingManiaLogin/logout.php"><button class="logoutButton"> <span class="text"> Logout</span> </button></a></li>	    <!-- <li><a href="http://localhost/TypingManiaLogin/"><button class="loginButton"> <span class="text"> Login</span> </button></a></li> -->
	    <li class="username">
	    	<?php 
	    		// require'database.php';
 				$usn=$_SESSION['uuser'];
 
				// $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_id`='$_SESSION[user_id]'") or die(mysqli_error());
				// $fetch = mysqli_fetch_array($query);
 
				// echo "<h2 class='text-success'>".$fetch['username']."</h2>";
				echo "Hi ".$usn;
	    	?>
	    </li>

	  </ul>
	</nav>
	<div class="MainWrap">
		<div class="open">

			<div class="ins">
				<!-- <img src="key2.png" width="900" height="650"> -->
				<p class="first"><span>Typing Mania</span> brings you amazing speed typing games absolutely free</p>
				<p> You can practice typing on keyboard and speed up your game while enjoying.</p>
				<p> You will also know your score mistakes count and typing speed in word per minute formats.</p>
				<p><a href="#wrap"><button class="startbutton">Start Now</button></a> </p>
			</div>

			<div class="type"><img src="type.gif"></div>
			
		</div>

		<a id="wrap">
		<div class="wrapper">
			<p class="wrapHeading"> Your Gaming Zone</p>
			<a href="Game1Session.php">
				<div class="game1">
					
				</div>
			</a>
			<a href="Game2Session.php">
				<div class="game2">
					
				</div>
			</a>
		</div>
		</a>

		
		<!-- <div class="image2">
			<img src="keyboard.png" width="400" height="300">
		</div> -->
	</div>
	</body>
</html>
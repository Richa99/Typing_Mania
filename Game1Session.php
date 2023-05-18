<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Typing Speed Test</title>
	<link rel="stylesheet" type="text/css" href="Game1Sess-Style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gruppo|Montserrat|Unica One|Black Ops One|Tilt Prism">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
</head>
<body>
	<nav class="navigation">
	  <ul class="menu">
	    <li><a href="http://localhost/TypingManiaLogin/DriverLoggedin.php">Home</a></li>
	    <li><a href="#!">About</a></li>
	    <li><a href="#!">Contact</a></li>
	    <li><a href="http://localhost/TypingManiaLogin/logout.php"><button class="logoutButton"> <span class="text"> Logout</span> </button></a></li>
	    <!-- <li><a href="http://localhost/TypingManiaLogin/"><button class="loginButton"> <span class="text"> Login</span> </button></a></li> -->
	    <li class="username">
	    	<?php 
 				$usn=$_SESSION['uuser'];
				echo "Hi ".$usn;
	    	?>
	    </li>
	  </ul>
	</nav>

	<div class="wrapper">
		<p class="heading"> Typing Test Game </p>
		<input type="text" class="input_text">
		<div class="content-box">
			<div class="type_text">
				<p>
					
				</p>
			</div>
			<div class="bottom_content">
				
				<ul class="result_bar">
					<li class="time">
						<p>Time Left:</p> 
						<span>  <b> 60s</b> </span>
					</li>
					<li class="mistakes">
						<p>Mistakes:  </p>
						<span> 0 </span>
					</li>
					<li class="wpm">
						<p>WPM: </p>
						<span> 0 </span>
					</li>
					<li class="cpm">
						<p>CPM: </p>
						<span> 0 </span>
					</li>
				</ul>
				<button class="tryagain">Try Again</button>
				
			</div>
		</div>
		
	</div>

	<div class="Leaderboard">
		<p class="ScoreHead">Your Record</p><br>
		<span class="score">
		
			<?php 
 				$usn=$_SESSION['uuser'];
 				include('database.php');
				$sql="SELECT *FROM typingmaster WHERE userName='$usn'";
 				$result= mysqli_query($conn,$sql);
 				$row=mysqli_fetch_assoc($result);
 				$highestscore=$row['highestWPM'];
 				echo $highestscore;
	    	?>
	    </span>
	    <br><hr><br>
	    <span class="topscores"> Top Scorers</span>
	    	<div class="top1">
	    	<?php 
 				
 				include('database.php');
				$sql="SELECT * FROM typingmaster WHERE highestWPM=(SELECT MAX(highestWPM) FROM typingmaster)";
 				$result= mysqli_query($conn,$sql);
 				while($row=mysqli_fetch_assoc($result)){
 					echo $row['userName']."            ";
 					echo str_repeat('&nbsp;', 10);
 					echo $row['highestWPM'];
 				}
 				
	    	?>
	    	</div>
	    	<div class="top2">
	    	<?php 
 				
 				include('database.php');
				$sql="SELECT * FROM typingmaster WHERE highestWPM=(SELECT MAX(highestWPM) FROM typingmaster where highestWPM<(SELECT MAX(highestWPM) FROM typingmaster))";
 				$result= mysqli_query($conn,$sql);
 				while($row=mysqli_fetch_assoc($result)){
 					echo $row['userName'];
 					echo str_repeat('&nbsp;', 10);
 					echo $row['highestWPM'];
 					echo "\n";
 				}
 				
	    	?>
	    	</div>
	    
	</div>

	<script type="text/javascript" src="paragrapgh.js"></script>
	<script type="text/javascript" src="Game1Session-Script.js"></script>

</body>
</html>
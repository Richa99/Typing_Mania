<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Word Game</title>
	<link rel="stylesheet" type="text/css" href="Game2Sess-Style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine|Pacifico|Hanalei|Orbitron|Monoton|Gruppo|Montserrat|Unica One|Black Ops One|Tilt Prism">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>
	<nav class="navigation">
	  <ul class="menu">
	    <li><a href="http://localhost/TypingManiaLogin/DriverLoggedin.php">Home</a></li>
	    <li><a href="#!">About</a></li>
	    <li><a href="#!">Contact</a></li>
	    <li><a href="http://localhost/TypingManiaLogin/logout.php"><button class="logoutButton"> <span class="text"> Logout</span> </button></a></li>
	    
	    <li class="username">
	    	<?php 
 				$usn=$_SESSION['uuser'];
				echo "Hi ".$usn;
	    	?>
	    </li>
	  </ul>
	</nav>
	<div class = "wrapper">
		<p class="heading">Word Typing Game</p>
		<div class="btn">
			<button> START </button>
		 </div>
		 <div class= "mid">
			<div class="scoreTag">
				<p>Score </p>
				<span> 0 </span>
			</div>
			<div class ="time">
				<p>Time Left </p>
				<span>60<b>s</b></span>
			</div>
		</div>
		<input type="text" class="input-text">
		<div class="type-text">
			<p> AHEAD</p>
		</div>
	</div>

	<div class="Leaderboard">
		<p class="ScoreHead">Your Record</p><br>
		<span class="score">
		
			<?php 
 				$usn=$_SESSION['uuser'];
 				include('database.php');
				$sql="SELECT *FROM wordgame WHERE userName='$usn'";
 				$result= mysqli_query($conn,$sql);
 				$row=mysqli_fetch_assoc($result);
 				$highestscore=$row['highestscore'];
 				echo $highestscore;
	    	?>
	    </span>
	    <br><hr><br>
	    <span class="topscores"> Top Scorers</span>
	    	<div class="top1">
	    	<?php 
 				
 				include('database.php');
				$sql="SELECT * FROM wordgame WHERE highestscore=(SELECT MAX(highestscore) FROM wordgame)";
 				$result= mysqli_query($conn,$sql);
 				while($row=mysqli_fetch_assoc($result)){
 					echo $row['userName']."            ";
 					echo str_repeat('&nbsp;', 10);
 					echo $row['highestscore'];
 				}
 				
	    	?>
	    	</div>
	    	<div class="top2">
	    	<?php 
 				
 				include('database.php');
				$sql="SELECT * FROM wordgame WHERE highestscore=(SELECT MAX(highestscore) FROM wordgame where highestscore<(SELECT MAX(highestscore) FROM wordgame))";
 				$result= mysqli_query($conn,$sql);
 				while($row=mysqli_fetch_assoc($result)){
 					echo $row['userName'];
 					echo str_repeat('&nbsp;', 10);
 					echo $row['highestscore'];
 					echo "\n";
 				}
 				
	    	?>
	    	</div>
	    
	</div>

	<script type="text/javascript" src="words.js"></script>
	<script type="text/javascript" src="Game2Session-Script.js"></script>
</body>
</html>
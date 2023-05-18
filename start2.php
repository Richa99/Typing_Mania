<!DOCTYPE html>
<html>
<head>
	<title> Word Game</title>
	<link rel="stylesheet" type="text/css" href="style-game.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine|Pacifico|Hanalei|Orbitron|Monoton|Gruppo|Montserrat|Unica One|Black Ops One">


</head>
<body>
	<nav class="navigation">
	  <ul class="menu">
	    <li><a href="http://localhost/TypingManiaLogin/driver.php">Home</a></li>
	    <li><a href="#!">About</a></li>
	    <li><a href="#!">Contact</a></li>
	    <li><a href="#!">Faq</a></li>
	    <li><a href="http://localhost/TypingManiaLogin/"><button class="loginButton"> <span class="text"> Login</span> </button></a></li>
	  </ul>
	</nav>
	<div class = "wrapper">
		<p class="heading">Word Typing Game</p>
		<div class="btn">
			<button> START </button>
		 </div>
		 <div class= "mid">
			<div class="score">
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

	<script type="text/javascript" src="words.js"></script>
	<script type="text/javascript" src="game2.js"></script>
</body>
</html>
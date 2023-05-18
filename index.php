<?php
session_start();
?>

<html>
<head> 
<title></title>
<link rel="stylesheet" type="text/css" href="index-style1.css">
</head>
<body>

<div class='bold-line'></div>
<div class='container'>
  <div class='window'>
    <div class='overlay'></div>
    <div class='content'>
      <div class='welcome'>Hello There!</div>
      <div class='subtitle'>Welcome Back! Please Login to Continue or proceed to create a new account</div>
      <div class='input-fields'>
        <form name="loginform" action="login.php" method="post">
          <input type='text' placeholder='Username' name="username" class='input-line full-width'></input>
          <input type='password' placeholder='Password' name="password" class='input-line full-width'></input>
          <!-- <input type='submit' name="submitlog" value="Login" class='input-line full-width'></input> -->
        
          </div>
          <div class='spacing'>or Create Account for Free <span class='highlight'><a href="signup.php"> Signup</a></span></div>
          <div><button name="submitlog" class='ghost-round full-width'>Login</button></div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
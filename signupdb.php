<style>
body  {
  background-image: url("bg1.avif");
  background-repeat: no-repeat;
  background-size: cover;
/*  background-color: #cccccc;*/
  font-size: 30px;
  font-family: Georgia, sans-serif;
  font-weight: "bold";
  text-align: center;
}
input[type=button] {
  width: 15%;
  padding: 15px 8px;
  margin: 4px 0;
  box-sizing: 20px;
  border: 2px ;
  cursor: pointer;
  background-color: #8bb2f7;
  color: #fff;
  border-radius: 10px;

}
button.hover{
  color: #777a7f;
  background-color: transparent;
  //text-decoration: underline;
}
</style>
<?php
include_once 'database.php';
   
    $name=$_POST["Name"];
  	// $email=$_POST["email"];
  	$username=$_POST["username"];
  	$pwd=$_POST["password"];
    

    $fail=validate_name($name);
    // $fail.=validate_email($email);
    $fail.=validate_username($username,$conn);
    $fail.=validate_password($pwd);
     
   
    function validate_name($field)
    {
     	return ($field== "") ? "No Name was entered <br>":"";
    }
    
    function validate_username($field,$conn)
    {
     	if($field== "") return "No username was entered<br>";
     	elseif (preg_match("/[^a-zA-Z0-9_-]/", $field)) {

     		return "Only letters,numbers,- and _ in username<br>";
     	}

      $existSql = "SELECT * FROM `users` WHERE username = '$field'";
      $result = mysqli_query($conn,$existSql);
      $numExistRows = mysqli_num_rows($result);
      if($numExistRows > 0){
          // $exists = true;
          //$showError = "Username Already Exists";
          return "Username Already Exists<br>";
      }

     	return "";
    }
     
    function validate_password($field)
    {
     	if($field == "") return "No password was entered";
     	elseif (!preg_match("/[a-z]/", $field)|| !preg_match("/[A-Z]/", $field)|| !preg_match("/[0-9]/", $field)) {
     		return "Password require 1each of a-z,A-Z,0-9<br>";
     	}
        return "";
    }

    // function validate_email($field)
    // {
    //  	if ($field == "") {
    //  		return "No email was entered";
    //  	}
    //  	elseif (!((strpos($field,".")>0) && (strpos($field, "@")>0))|| preg_match("/[^a-zA-Z0-9.@_-]/", $field)) {
    //  		return "Email address is invalid<br>";
    //  	}
    //  	return "";
    // }

      if ($fail=="") {
        echo "Form data successfully validated<br>";
            
        $hashpwd=password_hash($pwd, PASSWORD_DEFAULT);

        $sql="INSERT INTO users(username,Name,Password) VALUES('$username','$name','$hashpwd')";

        if (!mysqli_query($conn,$sql)) {
          	echo "  Registration failed<br> ";
        }
        else{
          	echo "Registration successfull<br>";
        }

        $sql1="INSERT INTO typingmaster(userName) VALUES('$username')";
        $sql2="INSERT INTO wordgame(userName) VALUES('$username')";

        if (!mysqli_query($conn,$sql1)) {
          	echo " typingmaster table not entered ";
        }
        else{
          	echo " <br>";
        }

        if (!mysqli_query($conn,$sql2)) {
            echo " wordgame table not entered ";
        }
        else{
            echo " <br>";
        }
    }
    else{
    	echo $fail;
    }
 
   /* $result=mysqli_query($conn,$sql);
    if (!result) {
    	die("query failed :". mysqli_error());
    }*/
    


//header("refresh:3, url=first.php");	
// function ReturnHome()
// {
//   header("Location: file:///D:/IT%20project/driver.html");
//   exit();
// }
// if(isset($_POST['HomePage'])){
//   header("Location: file:///D:/IT%20project/driver.html");
//   exit();
// }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<br>
<br><br><br>
<form method="post">
<a href="driver.php">
  <input type="button" name="HomePage" value="Return to Home"></a>  
</form>
<!-- <script>
    var btn = document.getElementById('HomePage');
    btn.addEventListener('click', function() {
      document.location.href = '';
    });
  </script> -->

</body>
</html>
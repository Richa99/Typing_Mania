<?php
session_start();
 if(isset($_POST['submitlog'])){
 	include 'database.php';
 $usn=$_POST["username"];
 $pswd=$_POST["password"];
 if(empty($usn)||empty($pswd)){
 	header("Location: ../TypingManiaLogin?login=empty");
 }
 else{
 	$sql="SELECT *FROM users WHERE username='$usn'";
 	$result= mysqli_query($conn,$sql);
 	$resultcheck=mysqli_num_rows($result);
 	if ($resultcheck<1) {
 		header("Location: ../TypingManiaLogin?login=notfound");
 		exit();
 	}
 	else{
 		if($row=mysqli_fetch_assoc($result)){
 		   $hashedpwdcheck=password_verify($pswd,$row['Password']);
 		   if($hashedpwdcheck == false){
 		   	header("Location: ../TypingManiaLogin?login=hashnotmathed");
 		    exit();
 		   }elseif ($hashedpwdcheck==true) {
 		   	 $_SESSION['uname']=$row['Name'];
 		   	 //$_SESSION['uemail']=$row['email'];
 		   	 $_SESSION['uuser']=$row['username'];
 		   	 $_SESSION['upass']=$row['Password'];

 		   	 header("Location: ../TypingManiaLogin/DriverLoggedin.php?login=success");
 		     exit();
 		   }	
 		}
 	}
 }
 }
 
?>
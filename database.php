<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "typing mania";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	echo "Not connected to server";
}
if(!mysqli_select_db($conn,'typing mania')){
	echo "Database not selected";
}
// if($conn){
// 	echo " We are in ..!!!";
// }
	
?>
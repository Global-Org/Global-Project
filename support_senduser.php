<?php session_start();
include "connection.php";
 if(isset($_POST['msg'])) { 
 $sender = $_SESSION['uid'];
 $reciever=$_SESSION['artistchat'];
 $date=date("Y-m-d h:i:s");
 // Simple insert into chatapp database
 $msg = mysqli_real_escape_string($con, $_POST['msg']); 
 $sql = "INSERT INTO chatapp (sender,reciever,msg,date) VALUES ('$sender','$reciever','$msg','$date')";

if( mysqli_query($con, $sql)){
echo $slq;
}
 }
 ?>
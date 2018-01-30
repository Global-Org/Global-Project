<?php
   $connection = mysqli_connect('localhost', 'mtlawyer_junaid', 'junaid','mtlawyer_global');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'mtlawyer_global');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection)); 
}

$conservices=mysqli_connect('localhost', 'mtlawyer_btb', 'btb12345','mtlawyer_servicesglobal');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// Change database to "test"
mysqli_select_db($conservices,"mtlawyer_servicesglobal");
?> 

<?php
$con=mysqli_connect('localhost', 'mtlawyer_junaid', 'junaid','mtlawyer_globaladmin');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// Change database to "test"
mysqli_select_db($con,"mtlawyer_globaladmin");
?>
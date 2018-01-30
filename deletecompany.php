  <?php
session_start();
error_reporting(0);
$error= false;
  include("header.php");
  include("connection.php");  
  $id = $_GET['id'];
  
  $sql = "delete from `user_company` where `compid` = $id";
       $result = mysqli_query($connection,$sql);
       //$count = mysqli_num_rows($result);
	            if($result == true){ 
					$query = "delete from `user_headquarter` where `compid` = $id";
                    mysqli_query($connection,$query);
				}
  ?>
   <script>
  window.location.href="profile.php";
  </script>

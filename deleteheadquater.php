 <?php
session_start();
error_reporting(0);

 include("header.php");
  include("connection.php"); 
  $id = $_GET['id'];
  
  $sql = "delete from `user_headquarter` where `hqid` = $id";

  mysqli_query($connection,$sql);
  ?>
   <script>
  window.location.href="headquarterinfo.php";
  </script>

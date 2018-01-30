<?php

     include("header.php"); 
     include("connection.php");
	 //$uid = $_GET["id"];
 
     $uid = $_POST["userid"];
	 $compid = $_POST["compid"];
     $companyname=$_POST["companyname"];
	 $compnaysector=$_POST["compnaysector"];
	 $companycategory=$_POST["companycategory"];
	 $exposedcategory=$_POST["exposedcategory"];
	 $street=$_POST["street"];
	 $city=$_POST["city"];
	 $postalcode=$_POST["postalcode"];
	 $country=$_POST["country"];
	 $province=$_POST["province"];
	 $continent=$_POST["continent"];
	 $telephone=$_POST["telephone"];
	 $email=$_POST["email"];
	 $fax=$_POST["fax"];
	 $website=$_POST["website"];
  
   $sql="UPDATE `user_company` SET `company_name`='$companyname', `category`='$companycategory', `sector`='$compnaysector',`exposed_category`='$exposedcategory',`street`='$street',`city`='$city',`postal_code`='$postalcode',`province`='$province',`country`='$country',`continent`='$continent',`tel`='$telephone',`fax`='$fax',`email`='$email',`website`='$website' WHERE `compid`='$compid'";
  
  mysqli_query($connection,$sql);
  ?>
  <script>
  window.location.href="profile.php";
  </script>
  
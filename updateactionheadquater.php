<?php

     include("header.php"); 
     include("connection.php");

	 $hid=$_POST["hqid"];
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
	 $vatnumber=$_POST["vatnumber"];
	 $fiscalcode=$_POST["fiscalcode"];
	 $cciaanr=$_POST["cciaanr"];
	 $dateofregistration=$_POST["dateofregistration"];
	 $country1=$_POST["country1"];
	 $continent1=$_POST["continent1"];
	 $cooperategroup=$_POST["cooperategroup"];
	 $foundationdate=$_POST["foundationdate"];
	 $numofemployees=$_POST["numofemployees"];
	 $sharecapital=$_POST["sharecapital"];
	 $revenue=$_POST["revenue"];
	 $patentlicenses=$_POST["patentlicenses"];
     
	 $sector=$_POST["compnaysector"];
	 $category=$_POST["companycategory"];
	 $exposedcategory=$_POST["exposedcategory"];
  
   $sql="UPDATE `user_headquarter` SET `street`='$street', `city`='$city', `postal_code`='$postalcode', `country`='$country', `province`='$province', `continent`='$continent',  
  `telephone`='$telephone', `email`='$email', `fax`='$fax', `website`='$website', `vatnumber`='$vatnumber', `fiscalcode`='$fiscalcode',
  `cciaanr`='$cciaanr', `$dateofregistration`='$$dateofregistration', `country1`='$country1', `continent1`='$continent1', `cooperategroup`='$cooperategroup', `foundationdate`='$foundationdate', `numofemployees`='$numofemployees', `sharecapital`='$sharecapital',
  `revenue`='$revenue', `patentlicenses`='$patentlicenses', `sector`='$sector', `category`='$category',`exposed_category`='$exposedcategory' WHERE `hqid`='$hid'";
  
  mysqli_query($connection,$sql);
  ?>
  <script>
  window.location.href="headquarterinfo.php";
  </script>
  
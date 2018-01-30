<?php

 include("header.php");
 include("connection.php");  
 
  $show=0;
  
  $show=0;
  if(isset($_GET['deleteid'])){
	  $deleteid=$_GET['deleteid'];
	  $query="DELETE FROM `company_users` WHERE `cuserid`='$deleteid' ";
       if(mysqli_query($connection,$query)){

		   $show=1;
	
		   
		   
	   }else{
		     $show=2;
	   }
	  
	  
	  
	  
  }
 if(isset($_POST["name"])){
	 
	 $name=$_POST["name"];
	 $surename=$_POST["surename"];
	 $password=$_POST["password"];
	 $email=$_POST["email"];
	 $usertype=$_POST["usertype"];
	 $compid=$_POST['compid'];
	 $query="INSERT INTO `company_users`(`cuserid`,`compid`, `name`, `surename`, `email`, `password`,`usertype`) VALUES (NULL,'$compid','$name','$surename','$email','$password','$usertype')";
	 if(mysqli_query($connection,$query)){
		$show=1;
	 }else{
		 $show=2;
	 }
 }
 ?>
<div class="container pt60">

<?php include("profile-navigation.php"); ?>
<center><h3><b><u>Employee Details</u></b></h3></center>
	<br>
	<div class="col-md-10 offset-0 pl40 mb60">
		
		<!-- post -->
		<div class="col-md-12">
		<h4><b><u>Employees:</u></b></h4><br>
		<?php
		if($show==1){
	
              $smsg = '<div class="alert alert-success" id="suc">Employee details successfully deleted.</div>';
			  echo $smsg;
			  			 
        }
	if($show==2) {
              $smsg = '<div class="alert alert-danger" id="fail">Failed to delete employee details. Try Again !</div> ';
			  echo $smsg;
	}
?>
		
	
		<div class="col-md-12">
		
	<table class="table table-striped">
	    
	      <thead>
	        <tr>
	          <th>#</th>
	          <th>Company Name</th>
	          <th>Name</th>
	          <th>Surename</th>
			  <th>Email</th>
			  <th>Usertype</th>
			   <th></th>
	        </tr>
	      </thead>
	      <tbody>
		  
		  <?php 
		  $uid=$_SESSION['uid'];
		  $getcomp="select * from `user_company` where `userid`='$uid'";
		  
		  $resultcomp=mysqli_query($connection,$getcomp); 
		  while($rowcomp=mysqli_fetch_array($resultcomp)){
			  $compid=$rowcomp['compid'];
			  $companyname=$rowcomp['company_name'];
			  $getcompuser="select * from `company_users` where `compid`='$compid'";	
			  $getcompresult=mysqli_query($connection,$getcompuser);
			  $count=0;
			  while($rowcompuser=mysqli_fetch_array($getcompresult)){
				  $count=$count+1;
		  
		  ?>
		  
	        <tr>
	          <th scope="row"><?php echo $count; ?></th>
	          <td><?php echo  $companyname; ?></td>
	          <td><?php echo $rowcompuser['name']; ?></td>
	          <td><?php echo $rowcompuser['surename']; ?></td>
			  <td><?php echo $rowcompuser['email']; ?></td>
			  <td><?php echo $rowcompuser['usertype']; ?></td>
			  <!--<td><a href="updateuser.php?updateid=<?php //echo $rowcompuser[0]; ?>" ><button class="btn-info btn">Update</button></a></td>-->
			   <td><a href="profile-employeedetails.php?deleteid=<?php echo $rowcompuser[0]; ?>" ><button class="btn-danger btn">Delete</button></a></td>
	        </tr>
	        
			<?php
		  }}
		  ?>
	      </tbody>
	</table>
		
		</div>
		
		<!-- END CONTENT -->
		</div>
	</div>


</div>
<!-- FOOTER -->
<div id="footer" class="footer">
	<div class="container ptb50 cwhite">
		<div class="row">
			<div class="col-md-3">
				<h5 class="uppercase bold pb20 cwhite titlefont">About us</h5>
				<p>Aenean sodales eros ac scelerisque sagittis. Aliquam porta consectetur blandit. Nulla sed augue nisl. Vivamus pulvinar ullamcorper malesuada.</p>
			</div>
			<div class="col-md-3">
				<h5 class="uppercase bold pb20 cwhite titlefont">Services</h5>
				<ul>
					<li><a href="#">Awareness Planning</a></li>
					<li><a href="#">Connected Experiences</a></li>
					<li><a href="#">Mobile Application Development</a></li>
					<li><a href="#">Corporate Branding</a></li>
					<li><a href="#">Social Strategy</a></li>
					<li><a href="#">S.E.O.</a></li>
				</ul>
			</div>
			<div class="col-md-3">
				<h5 class="uppercase bold pb20 cwhite titlefont">Tweets</h5>
				<div id="twitter-feed" class="tweett"></div>
			</div>
			<div class="col-md-3">
				<h5 class="uppercase bold pb20 cwhite titlefont">Newsletter</h5>
				<p>Latest News Straight to your inbox</p>
				<input type="email" class="form-control newsletter" placeholder="Enter email">
				<button type="submit" class="btn newsletterbtn"><i class="icon-mail"></i></button>
			</div>
		</div>
	</div>
	
	<div class="clearfix"></div>
	<div class="separator100dark"></div>
	
	<div class="container ptb30 cwhite">
		<a href="#"><img src="images/avision-footer.png" class="w90" alt="avision logo" /></a>
		<div class="socialicons right">
			<ul>
				<li class="blue dgrey"><a href="#"><i class="icon-facebook"></i></a></li>
				<li class="lblue lgrey"><a href="#"><i class="icon-twitter-bird"></i></a></li>
				<li class="orange dgrey"><a href="#"><i class="icon-gplus"></i></a></li>
				<li class="pink lgrey"><a href="#"><i class="icon-dribbble"></i></a></li>
				<li class="red dgrey"><a href="#"><i class="icon-youtube"></i></a></li>
			</ul>
		</div>
	</div>
</div>
<!-- End of Footer -->

<p id="back-top"><a href="#top"><span class="ti-angle-up"></span></a></p>

<div class="newsletter-ani">
	<div class="circle-obj"></div>
	<div class="circle-obj2"><span class="ti-check"></span></div>
	<div class="circle-obj3 opensans xslim">Subscribed</div>
</div>

<!-- Include Footer -->
<?php include 'footer.php';?>

</body>
</html>
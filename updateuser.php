<?php

 include("header.php");
 include("connection.php");  
 
  $show=0; 
  if(isset($_SESSION["cuserid"])){
	  $id=$_SESSION["cuserid"];
  }else{
	  $id=$_SESSION['uid'];
  }
 
  $sql = "select * from `company_users` where `cuserid`='$id'";
  $result = mysqli_query($connection,$sql);
  $rowinfo = mysqli_fetch_array($result);
  
  if(isset($_POST['updateuser']))
  {
  
     $name=$_POST["name"];
	 $surename=$_POST["surename"];
	 $password=$_POST["password"];
	 $email=$_POST["email"];
	
	 
     $sql="UPDATE `company_users` SET `name`='$name', `surename`='$surename', `email`='$email',`password`='$password' WHERE `cuserid`='$id'";
  
  mysqli_query($connection,$sql);
  
  
  if($_SESSION['usertype']=='Employer'){
	   ?><script>
  window.location.href="profile.php";
  </script><?php
   }
   else if($_SESSION['usertype']=='Accountant'){
	   ?><script>
  window.location.href="Accountantview.php";
  </script><?php
   }
   else if($_SESSION['usertype']=='Company Owner'){
	  ?><script>
  window.location.href="Companyownerview.php";
  </script><?php
   }
   else{
  ?>
      <script>
  window.location.href="profile-employeedetails.php";
  </script>
  <?php
  }
  }
  
  ?>

<div class="container pt60">
	

<?php include("profile-navigation.php"); ?>
	<br>
	<div class="col-md-10 offset-0 pl40 mb60">
		
		<!-- post -->
		<div class="col-md-12">
		<h4><b><u>Update Account:</u></b></h4><br>
		<div class="col-md-1">
		</div>
		
<form method="post">		
		<div class="col-md-6">
		<?php 

if($show==1){
	
              $smsg = '<div class="alert alert-success" id="suc"><b>Account created succesfully. !</b></div>';
			  echo $smsg;
        }
	if($show==2) {
              $smsg = '<div class="alert alert-danger" id="fail"><b>Failed to create account. Try Again !</b></div>';
			  echo $smsg;
        }
		?>
		<input type="hidden" name="cuserid" required value="<?php echo $rowinfo['cuserid'] ?>" class="form-control" />
		<div class="col-md-12">
					<input type="text" value="<?php echo $rowinfo['name'] ?>" name="name" class="form-control formlarge mt17" placeholder="User Name" required>
				</div>
		<div class="col-md-12">
					<input type="text" value="<?php echo $rowinfo['surename'] ?>" name="surename" class="form-control formlarge mt17" placeholder="Surename" required>
				</div>
		<div class="col-md-12">
					<input type="text" value="<?php echo $rowinfo['email'] ?>" name="email" class="form-control formlarge mt17" placeholder="Email" required>
				</div>
		<div class="col-md-12">
					<input type="text" value="<?php echo $rowinfo['password'] ?>" name="password" class="form-control formlarge mt17" placeholder="Password" required>
				</div>
	
		<div class="clearfix"></div>
		<br/>
				<button name= "updateuser" class="btn btnwhite btn-default"><i class="icon-box"></i> Update Account</button>
		<div class="clearfix"></div>
		
		</div>
		
		</form>
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
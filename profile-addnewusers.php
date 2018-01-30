<?php

 include("header.php");
 include("connection.php");  
 $error=false;
  $show=0;
 if(isset($_POST["name"])){
	 
	 $name=$_POST["name"];
	 $surename=$_POST["surename"];
	 $password=$_POST["password"];
	 $email=$_POST["email"];
	 $usertype=$_POST["usertype"];
	 $compid=$_POST['compid'];
	 
	 $query="INSERT INTO `company_users`(`cuserid`,`compid`, `name`, `surename`, `email`, `password`,`usertype`) VALUES (NULL,'$compid','$name','$surename','$email','$password','$usertype')";
	  
	
	/* This part is used for sending email for new registered user(Done by shoaib) */
$to = "$email";
$subject = "User Email For Avision Portal";
$message = "
<html>
<head>
<title>User Email</title>
</head>
<body>
<p>This email contains Login Inforation for Avision Portal For User!</p>
<table>
<tr>
<th>UserName</th>
<th>Password</th>
</tr>
<tr>
<td>$email</td>
<td>$password</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: shoaibameer91@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);
	 if(mysqli_query($connection,$query)){
		$show=1;
	 }else{
		 $show=2;
	 } 
 }
 
 /* Email sending end */

?>




<div class="container pt60">
	

<?php include("profile-navigation.php"); ?>
<center><h3><b><u>Add New Users</u></b></h3></center>
	<br>
	<div class="col-md-10 offset-0 pl40 mb60">
		
		<!-- post -->
		<div class="col-md-12">
		<h4><b><u>Create new Account:</u></b></h4><br>
		<div class="col-md-1">
		</div>
		
<form action="profile-addnewusers.php" method="post">		
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
		<div class="col-md-12">
					<input type="text" name="name" class="form-control formlarge mt17" placeholder="User Name" required>
				</div>
		<div class="col-md-12">
					<input type="text" name="surename" class="form-control formlarge mt17" placeholder="Surename" required>
				</div>
		<div class="col-md-12">
					<input type="text" name="email" class="form-control formlarge mt17" placeholder="Email" required>
				</div>
		<div class="col-md-12">
					<input type="text" name="password" class="form-control formlarge mt17" placeholder="Password" required>
				</div>
				
		<div class="col-md-12"><br>
		            <b> User Type:</b>
					<select name="usertype" class="form-control formlarge mt17"  required>
					<option value="Employer">Employer</option>
					<option value="Accountant">Accountant</option>
					<option value="Company Owner">Company Owner</option>
					</select>
				</div>
		<div class="col-md-12"><br>
		            <b> User Company:</b>
					<select name="compid" class="form-control formlarge mt17"  required>
					<?php 
					$uid=$_SESSION['uid'];
					$getcompanies="select * from `user_company` where `userid`='$uid'";
					$resultcomp=mysqli_query($connection,$getcompanies);
					echo $rowcomp['company_name'];
					while($rowcomp=mysqli_fetch_array($resultcomp)){
					?>
				
					
					<option value="<?php echo $rowcomp[0]; ?>"><?php echo $rowcomp['company_name']; ?></option>
			
					<?php } ?>
					</select>
				</div>
		<div class="clearfix"></div>
		<br/>
				<button type="submit" class="btn btnwhite btn-default"><i class="icon-box"></i> Create Account</button>
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
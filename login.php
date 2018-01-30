<?php session_start();
session_unset();
 include("header.php"); 
 include("connection.php"); 

 $verified=0;
 if(isset($_GET['id'])){
	$destroyid=$_SESSION["uid"]; //$_GET['id'];
	 $updatelogout="update `user_profile` set `userstatus`='offline' where `id`='$destroyid'";
	 mysqli_query($connection,$updatelogout);
	 session_destroy();
	 ?>
	 <script>
	  window.location.href="login.php";
	 </script>
	 <?php
 }
 $show=0;
 if(isset($_POST["email"])){	 
	 $password=$_POST["pass"];
	 $email=$_POST["email"];
	 
	 //Get Details for the user if exists or not
	 $query="Select * from `user_profile` where `email`='$email' and `password`='$password'";
	 $result=mysqli_query($connection,$query);
	$row=mysqli_fetch_array($result);
	
	 if(mysqli_num_rows($result)>0){
		 if($row['verified']=='yes'){  
		 $_SESSION["name"]=$row["name"];
		 $_SESSION["uid"]=$row[0];
		 
		 //Update user status to 'Online'
		 $datetimenow=date("Y-m-d h:i:sa");
		 $uid=$row[0];
		 $updatestatus="update `user_profile` set `userstatus`='online',`lastactiveon`='$datetimenow' where `id`='$uid'";
		
		 mysqli_query($connection,$updatestatus);
		 
		 
		//Get Membership Details for the user
		 $checkmembership="select * from `user_membership` where `userid`='$row[0]'";
		 $resultmem=mysqli_query($connection,$checkmembership);
		 $rowmem=mysqli_fetch_array($resultmem);
		 if(mysqli_num_rows($resultmem)>0){
			 
			 $_SESSION['membership']=$rowmem['membership_type'];
		 }else{
			 $_SESSION['membership']="Free";
		 }
		$show=1;
	 }else{
		
		 $verified=1;
	
	}
	 }
	 else{
		 //$show=2;
		 
		 if(isset($_POST["email"])){
	 
	 $password=$_POST["pass"];
	 $email=$_POST["email"];
	 $usertype=$_POST["usertype"];
	 $query="Select * from `company_users` where `email`='$email' and `password`='$password'";
	 $result=mysqli_query($connection,$query);
	$row=mysqli_fetch_array($result);
	$usertype=$row['usertype'];
	
	 if(mysqli_num_rows($result)>0){
		 $_SESSION["uname"]=$row["name"];
		 $_SESSION["cuserid"]=$row[0];
		 
		$_SESSION['usertype']=$row[6];
		 

		
	 ?>
  <?php
 if($usertype =="Employer")
 {
	 ?>
	<script>
  window.location.href="Employeerview.php";
  </script>
	 <?php
 }
 else if($usertype =="Accountant")
 { 
?>
	 <script>
  window.location.href="Accountantview.php";
  </script>
  <?php
 }
 else if($usertype =="CompanyOwner")
 {
	 ?>
	 <script>
  window.location.href="Companyownerview.php";
  </script>
  <?php
 }

	 }
	 else{
		 $show=2;
	 }
	 

	 
	 
	 
	 
	 
 }
 }
 }

 ?>

<!-- Content -->

	

<!-- SECTION CONTACT -->
 <script>
  $(document).ready(function(){
    $("#suc").fadeIn(9000);
    $("#suc").fadeOut(9000);
});
</script>
<?php
 
 //////////////////////////FAcebook Login Area /////////////////////////
 // Include FB config file && User class
 require_once 'facebook/fbConfig.php';
require_once 'facebook/User.php';

if(isset($accessToken)){
	if(isset($_SESSION['facebook_access_token'])){
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}else{
		// Put short-lived access token in session
		$_SESSION['facebook_access_token'] = (string) $accessToken;
		
	  	// OAuth 2.0 client handler helps to manage access tokens
		$oAuth2Client = $fb->getOAuth2Client();
		
		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
		
		// Set default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}
	
	// Redirect the user back to the same page if url has "code" parameter in query string
	if(isset($_GET['code'])){
		header('Location:../registration.php');
	}
	
	// Getting user facebook profile info
	try {
		$profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture');
		$fbUserProfile = $profileRequest->getGraphNode()->asArray();
	} catch(FacebookResponseException $e) {
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// Redirect user back to app login page
		header("Location:logout.php");
		exit;
	} catch(FacebookSDKException $e) {
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
	// Initialize User class
	$user = new User();
	
	// Insert or update user data to the database
	$fbUserData = array(
		'oauth_provider'=> 'facebook',
		'oauth_uid' 	=> $fbUserProfile['id'],
		'first_name' 	=> $fbUserProfile['first_name'],
		'last_name' 	=> $fbUserProfile['last_name'],
		'email' 		=> $fbUserProfile['email'],
		'gender' 		=> $fbUserProfile['gender'],
		'locale' 		=> $fbUserProfile['locale'],
		'picture' 		=> $fbUserProfile['picture']['url'],
		'link' 			=> $fbUserProfile['link']
	);
	$userData = $user->checkUser($fbUserData);
	
	// Put user data into session
	$_SESSION['userData'] = $userData;
	
	// Get logout url
	$logoutURL = $helper->getLogoutUrl($accessToken, $redirectURL.'logout.php');
	
	// Render facebook profile data
	if(!empty($userData)){
		$output  = '<h1>Facebook Profile Details </h1>';
		$output .= '<img src="'.$userData['picture'].'">';
        $output .= '<br/>Facebook ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Facebook';
		$output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Facebook Page</a>';
        $output .= '<br/>Logout from <a href="'.$logoutURL.'">Facebook</a>'; 
		
	    $_SESSION['fbid']=$userData['oauth_uid'];
		
		$_SESSION['fname']=$userData['first_name'];
		$_SESSION['lname']=$userData['last_name'];
		$_SESSION['email']=$userData['email'];
		$_SESSION['gender']=$userData['gender'];
		?>
		<script>

		window.location.href="../registration.php?login=fb";
		</script>
		<?php
		
			
	
	}else{
		$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
	}	
}else{
	// Get login url
	$loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
	// Render facebook login button
	$output = '<a href="'.htmlspecialchars($loginURL).'"><img style="margin-top:30px;width:160px;height:44px" src="images/fb.jpeg"></a>';
}

 //////////////////////////////End of Facebook Login Area ////////////////////////

 ?>
<?php
 //////////////////////////Google Login Area ///////////////////////////////
 
 
 //include("google/index.php");

 ////////////////////////// END Google Login Area /////////////////////////

?> 
<form action="login.php" method="post">
<div class="bgwhite">

	<div class="container sspacing-title-button">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
<?php 

if($show==1){
	
              $smsg = '<div class="alert alert-success" id="suc">Login Successfull !</div>';
			  echo $smsg;
			  ?>
			  <script>
			  window.location.href="profile.php";
			  </script>
			  <?php
        }
	if($show==2) {
              $smsg = '<div class="alert alert-danger" id="fail">Failed to Login. Try Again !</div>';
			  echo $smsg;
        }
		?>
				<p class="size30 ml10 mb10 cdark pb20">User's Login</p>
			
				<div class="col-md-12">

				</div>
				<div class="col-md-12">
					<input type="text" name="email" class="form-control formlarge mt17" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  title="Invalid Email Format !" required>
				</div>
				<div class="col-md-12">
					<input type="password" name="pass" class="form-control formlarge mt17" placeholder="Password" required>
				</div>
				
				<div class="clearfix"></div>
				<button type="submit" class="btn btnwhitebig btn-default caps ml10 mt30"><i class="icon-box"></i> Login</button>
				 <!-- facebook login button -->
                 <a href="facebook/index.php" ><?php echo $output; ?></a>
				
                 <a href="google/index.php"><img src="../images/googlesignup.png" style="margin-top:30px;width:160px;height:44px" "/></a>

				<br><br><div class="clearfix"> <a href="#" style="padding-left:8px;">Forgot password?</a></div><br>
			<?php 
			if($verified==1){
			?>
			 <h5 style="color:darkred">  <b> Note: your account is not verified. click <a href="verify.php">here </a> to verify your account.</b></h5>
			<?php } ?>
		</div>
		<div class="col-md-3">			
		</div>
	</div>
</div>
</form>

<!-- END OF CONTACT -->
</div>
<?php include("footermain.php"); ?>
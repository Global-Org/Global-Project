<?php session_start();
include('connection.php');

$rowa = $userData['first_name'];
$_SESSION['uname'] = $rowa;
//Check Online or Offline Users and Populate DB 
$getUsers='select * from `user_profile`';
$resultUsers=mysqli_query($connection,$getUsers);
$totalUsers=mysqli_num_rows($resultUsers);
$offline=0;
$online=0;
while($rowUser=mysqli_fetch_array($resultUsers)){
	if($rowUser['userstatus']=='offline'){
		$offline++;
	}else{
		$online++;
	}
	
}
//Populate total online and offline users

$updateOnline="update `onoffeusers` set `numofuser`='$online' where `checkstatus`='online'";
$updateOffline="update `onoffeusers` set `numofuser`='$offline' where `checkstatus`='offline'";
mysqli_query($connection,$updateOffline);
mysqli_query($connection,$updateOnline);
include 'head.php';?>

<body class="">

<!-- start preloader -->

<!-- end preloader -->

<!-- THEMES PREVIEW -->


<!-- Navigation -->
<div ID="navoffset" class="secpage shadow-off bgwhite">
	<div class="topnavbar bgwhite">
		<div class="container">
			<div class="right top-links">
				<a href="Admin/login-helpsystem.php" class=""><span class="ti-help"></span>Help/Support</a> &nbsp;&nbsp;
				<?php if(!isset($_SESSION["uid"])){ ?>

				<a href="login.php" class=""><span class="ti-lock"></span>Login</a>
						<a href="registration.php" class=""><span class="ti-lock"></span>Signup</a>
				<?php }else{ ?>
									(<?php echo  $_SESSION["name"]; ?>)
								
	<a href="login.php?id=logout" class=""><span class="ti-lock"></span>Logout</a>
				<?php } ?>
			</div>
		</div> 
	</div>
	<div class="navigation dark">

		<div class="container">
			<div class="logo"><a href="index.php"><img src="images/spacer.png" class="mt5 relative z100" alt=""/></a></div>

			<?php include 'navigation-white.php';?>	

		</div>
	</div>

	<!-- SEARCH -->	
	<div class="fwsearch">
		
		
		<div class="csearch container">
			<input type="email" class="form-control fwsearchfield" placeholder="Search keyword">
			<button type="submit" class="btn fwsearchfieldbtn"><i class="ti-search"></i></button>
		</div>
		
	</div>
</div>
<!-- End of Navigation -->		

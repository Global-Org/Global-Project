<?php 
    
// Put user data into session

	//echo $rowa = $userData['email'];
	
	if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
	$queryprofile="select * from `user_profile` where `id`='$uid'";
	$result=mysqli_query($connection,$queryprofile);
	$row=mysqli_fetch_array($result);
	}
	else if($_SESSION['cuserid'])
	{
	$uid=$_SESSION['cuserid'];
	$queryprofile="select * from `company_users` where `cuserid`='$uid'";
	$result=mysqli_query($connection,$queryprofile);
	$row=mysqli_fetch_array($result);
		
	}
	?>
	<div class="row">
	<div class="col-md-1">
	</div>
	<div class="col-md-5">
	<h4>Name: <b><?php echo $row['name']; ?></b><?php echo $userData['first_name'];?></h4>
	<br>
	<h4>Surname: <b><?php echo $row['surename']; ?></b>	<?php echo $userData['last_name'];?></h4>
	</div>
	<div class="col-md-6">
	
	<h4>Email Address: <b><?php echo $row['email']; ?></b><?php echo $userData['email'];?></h4>
    <br>
		<?php 
        $percent="50";
		$uid=$_SESSION['uid'];
		$querycheck="select * from `user_company` where `userid`='$uid'";
		$resultprofile=mysqli_query($connection,$querycheck);
		$rowprofile=mysqli_fetch_array($resultprofile);
		$_SESSION['compid']=$rowprofile['compid'];
		if(mysqli_num_rows($resultprofile)>0){
			$percent="100";
		if($_SESSION['membership']!='Free'){
			
			if($rowprofile['street']==''){
				
				$percent="70";
			}
		}
		}
	 if($percent!="100"){ 

	 ?>
	 <?php
	 
	 $uid=$_SESSION['cuserid'];
	 $uerid=$_SESSION['usertype'];
	 
	 
	 ?>
	

	<?php 
	if($_SESSION['membership']=="Free"){
	?>
	<a href="registeredofficefree.php"><button style="float:right" class="btn-info btn" >Complete Profile Now </button></a>
	<?php }else {?>
	<a href="registeredoffice.php"><button style="float:right" class="btn-info btn" >Complete Profile Now </button></a>
	<?php }
		
		?>
			<?php } ?>
	
	</div>
	</div>
	<br>
	
	<?php 
        $percent="50";
		$uid=$_SESSION['uid'];
		$querycheck="select * from `user_company` where `userid`='$uid'";
		$resultprofile=mysqli_query($connection,$querycheck);
		$rowprofile=mysqli_fetch_array($resultprofile);
		$_SESSION['compid']=$rowprofile['compid'];
		if(mysqli_num_rows($resultprofile)>0){
			$percent="100";
		if($_SESSION['membership']!='Free'){
			
			if($rowprofile['street']==''){
				
				$percent="70";
			}
		}
		
			
		}
		
	
	?>
<?php 
    if($percent=="70"){
		
		?>
	<div class="progress flat nocorners">
	<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar" class="progress-bar progress-bar-orange" style="width: 70%;">

70% Complete
	 </div> </div>
	<?php
	}
	if($percent=="100"){
		
	?>
	<div class="progress flat nocorners">
  <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" role="progressbar" class="progress-bar progress-bar-green" style="width: 100%">

	100% Complete (success)
	  </div> </div>
	<?php }
	if($percent=="50"){ ?>
	<div class="progress flat nocorners">
	<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-red" style="width: 50%;">

50% Incomplete
	 </div> </div>
	<?php } ?>
<br>
	<div class="col-md-2 offset-0 pb50">
		<div class="leftmenu">
			<ul>
			    <?php 
				if($_SESSION['membership']=='Free'){
				?>
				<li class="title">Free User's Options</li>
				<li><a  href="profile.php">Company Information<span></span></a></li>
				<li><a  href="profile-membership.php">Membership<span></span></a></li>
				<li><a  href="profile-settings.php">Profile Profile<span></span></a></li>
				<li><a  href="support_chatusers.php">Help/Suport Chat<span></span></a></li>
				<li><a  href="http://anitsolutions.com/Projects/GlobalServices/index.php?uid=<?php echo $_SESSION['uid']; ?>">Services<span></span></a></li>
				<?php }
				else if($_SESSION['usertype']=='Employer'){
				?>
				<li class="title">Employer's Options</li>
				<li><a  href="EmployeeServices.php">My Services<span></span></a></li>
				<li><a  href="RequestServices.php">Requested Services<span></span></a></li>
				<li><a  href="updateuser.php">Update Profile<span></span></a></li>
				<li><a  href="#">Get a New Service<span></span></a></li>
				<?php
				}
				
				else if($_SESSION['usertype']=='Accountant'){
				?>
				<li class="title">Accountant's Options</li>
				<li><a  href="profile-paymentdetails.php">Payment Request<span></span></a></li>
				<li><a  href="profile-paymentdetails.php">Payment Details<span></span></a></li>
				<li><a  href="updateuser.php">Update Profile<span></span></a></li>
				<?php
				}
				
				else if($_SESSION['usertype']=='Company Owner'){
				?>
				<li class="title">Company Owner's Options</li>
				<li><a  href="profile-employeedetails.php">Employee Details<span></span></a></li>
				<li><a  href="profile-paymentdetails.php">Payment Details<span></span></a></li>
				<li><a  href="">All Services<span></span></a></li>
				<li><a  href="updateuser.php">>Update Profile<span></span></a></li>
				<li><a  href="#">Planning System<span></span></a></li>
				<?php
				}
				
				else{
					?>
					<li class="title">Master User's Options</li>
				<li><a  href="profile.php">Company Information<span></span></a></li>
				<li><a  href="headquarterinfo.php">Headquarter Information<span></span></a></li>
				<li><a  href="profile-membership.php">Membership<span></span></a></li>
				<li><a  href="profile-settings.php">Profile Setting<span></span></a></li>
				<li><a  href="profile-addnewusers.php">Add Users<span></span></a></li>
				
				<li><a  href="profile-servicesrequests.php">Services<span></span></a></li>
				<li><a  href="profile-paymentdetails.php">Transaction Details<span></span></a></li>
				<li><a  href="profile-employeedetails.php">Employee Details<span></span></a></li>
				<li><a  href="PlanningQuestionares.php">Planning<span></span></a></li>
				<li><a  href="support_chatusers.php">Help/Suport Chat<span></span></a></li>
			
					<?php
				}


				?>
				
			</ul>

		
			<div class="clearfix"></div>

		</div>
	</div>
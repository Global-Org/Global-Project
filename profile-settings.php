<?php

 include("header.php"); 
 include("connection.php"); 
 $show=0;
 if(isset($_POST["name"])){
	 
	 $name=$_POST["name"];
	 $surename=$_POST["surename"];
	 $password=$_POST["pass"];
	 $email=$_POST["email"];
	 $uid=$_SESSION['uid'];
  	 $query="Update `user_profile` set `name`='$name',`surename`='$surename', `email`='$email', `password`='$password' where `id`='$uid'";
	
	if(mysqli_query($connection,$query)){
		$show=1;
	 }else{
		 $show=2;
	 }
	 
	 
	 
	 
	 
	 
 }
 
 
 ?>

<!-- Content -->
 <script>
  $(document).ready(function(){
    setTimeout(function() {
    $('#suc,#fail').fadeOut('fast');
     }, 1000);
});
</script>
	

<!-- SECTION CONTACT -->

<form action="profile-settings.php" method="post">
<div class="bgwhite">
	<div class="container sspacing-title-button">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
<?php 

if($show==1){
	
              $smsg = '<div class="alert alert-success" id="suc">Profile Updated Successfully !</div>';
			  echo $smsg;
			  ?>
			  <a href="profile.php"> Click here </a> to go to your profile.<br>
			  <?php
        }
	if($show==2) {
              $smsg = '<div class="alert alert-danger" id="fail">Failed to Update Profile. Try Again !</div>';
			  echo $smsg;
        }
		?>
				<p class="size30 ml10 mb10 cdark pb20">User's Profile</p>
			
			
			
	<?php 
	$uid=$_SESSION['uid'];
    $getprofile="select * from `user_profile` where `id`='$uid'";
	$resultprofile=mysqli_query($connection,$getprofile);
	$rowprofile=mysqli_fetch_array($resultprofile);
	
?>	
				<div class="col-md-12">
					<input type="text" value="<?php echo $rowprofile['name']; ?>" name="name" class="form-control formlarge mt17" placeholder="Name" required>
				</div>
					<div class="col-md-12">
					<input type="text" value="<?php echo $rowprofile['surename']; ?>" name="surename" class="form-control formlarge mt17" placeholder="SureName" required>
				</div>
				<div class="col-md-12">
					<input type="text" value="<?php echo $rowprofile['email']; ?>" name="email" class="form-control formlarge mt17" placeholder="Email" required>
				</div>
				<div class="col-md-12">
					<input type="text" value="<?php echo $rowprofile['password']; ?>" name="pass" class="form-control formlarge mt17" placeholder="Password" required>
				</div>
				
				<div class="clearfix"></div>
				<button type="submit" class="btn btnwhitebig btn-default caps ml10 mt30"><i class="icon-box"></i> Submit</button>
				<div class="clearfix"></div>
            
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</div>
</form>
<!-- END OF CONTACT -->
</div>

<?php include("footermain.php"); ?>
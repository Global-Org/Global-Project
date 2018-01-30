<?php session_start();

 include("header.php"); 
 include("connection.php"); 
 $verified=0;
 if(isset($_GET['id'])){
	 session_destroy();
	 ?>
	 <script>
	 window.location.href="login.php";
	 </script>
	 <?php
 }

 
 ?>

<!-- Content -->

	

<!-- SECTION CONTACT -->
 <script>
  $(document).ready(function(){
    setTimeout(function() {
    $('#suc,#fail').fadeOut('fast');
     }, 1000);
});
</script>
<form action="login.php" method="post">
<div class="bgwhite">

	<div class="container sspacing-title-button">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
<?php
if($show==1){
	
              $smsg = '<div class="alert alert-success" id="suc">Company information has been entered successfully.</div>';
			  echo $smsg;
			  			  ?>
			<a href="profile.php"> Click here </a> to go to your Profile.<br>
			  <?php
        }
	if($show==2) {
              $smsg = '<div class="alert alert-danger" id="fail">Failed to add company information. Try Again !</div> ';
			  echo $smsg;
	}
?>
				<p class="size30 ml10 mb10 cdark pb20">User's Login</p>
			
				<div class="col-md-12">

				</div>
				<div class="col-md-12">
					<input type="text" name="email" class="form-control formlarge mt17" placeholder="Email" required>
				</div>
				<div class="col-md-12">
					<input type="password" name="pass" class="form-control formlarge mt17" placeholder="Password" required>
				</div>
				
				<div class="clearfix"></div>
				<button type="submit" class="btn btnwhitebig btn-default caps ml10 mt30"><i class="icon-box"></i> Login</button>
				<div class="clearfix"></div><br>
			<?php 
			if($verified==1){
			?>
			 <h5 style="color:darkred">  <b> Note: your account is not verified.. click <a href="verify.php">here </a> to verify your account.</b></h5>
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
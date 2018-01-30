<?php session_start();

 include("header.php"); 
 include("connection.php"); 
$show=0;
 if(isset($_POST["code"])){
	
	
        if($_POST['code']==$_SESSION['code']){
			$email=$_SESSION['email'];
	   $updatestatus="UPDATE `user_profile` SET `verified`='yes' WHERE `email`='$email'";
	   
	   mysqli_query($connection,$updatestatus);
			$show=1;
		}else{
$show=2;
		}
		}
 
 ?>

<!-- Content -->

	

<!-- SECTION CONTACT -->

<form action="entercode.php" method="post">
<div class="bgwhite">
	<div class="container sspacing-title-button">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
		<?php
if($show==1){
	
              $smsg = '<div class="alert alert-success" id="suc"><b>Congratulations!</b> your account has been activated and verified.</div>';
			  echo $smsg;
			  			  ?>
			<a href="login.php"> Click here </a> to login to your account.<br>
			  <?php
        }
	if($show==2) {
              $smsg = '<div class="alert alert-danger" id="fail">Failed to verify account. Incorrect code or Try Again !</div> ';
			  echo $smsg;
?>
			<a href="verify.php"> Click here </a> to recieve a new Code.<br>
			  <?php
        }
		?>
				<p class="size30 ml10 mb10 cdark pb20">Code Verification</p>
			
				<div class="col-md-12">

				</div>
				<div class="col-md-12">
					<input type="text" name="code" class="form-control formlarge mt17" placeholder="VERIFICATION Code here" required>
				</div>
			
				
				<div class="clearfix"></div>
				<button type="submit" class="btn btnwhitebig btn-default caps ml10 mt30"><i class="icon-box"></i> Verify</button>
				<div class="clearfix"></div><br>
			
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</div>
</form>
<!-- END OF CONTACT -->
</div>

<?php include("footermain.php"); ?>
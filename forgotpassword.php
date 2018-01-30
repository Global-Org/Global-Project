<?php session_start();
 include("header.php"); 
 include("connection.php"); 

 $show=0;
 if(isset($_POST["email"])){
	 
	 $email=$_POST["email"]; //Posting email field
	 $query="Select * from `user_profile` where `email`='$email'";
	 $result=mysqli_query($connection,$query);
	$row=mysqli_fetch_array($result);
	$recoverpasswrd=$row['password'];
	 if(mysqli_num_rows($result)>0){
		 
		$msg = "Your Password is below \n".$recoverpasswrd." ";

    
        $msg = wordwrap($msg,70); // use wordwrap() if lines are longer than 70 characters


   mail($email,"Password Recovery",$msg); // send email
		
		 $show=1;
	
	}
	else{
		 $show=2;
	 }
	
	 
	 
	 
	 
	 
 }
 
 
 ?>

<!-- Content -->

	

<!-- SECTION CONTACT -->
 <script>
  $(document).ready(function(){
    $('#suc,#fail').fadeIn('slow');
    $('#suc,#fail').fadeOut('slow');
     
});
</script>
<form action="forgotpassword.php" method="POST">
<div class="bgwhite">

	<div class="container sspacing-title-button">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
<?php  

if($show==1){
	
              $smsg = '<div class="alert alert-success" id="suc"> Password sent on your Email !</div>';
			  echo $smsg;
			  ?>
			  
			  <?php
        } 
	if($show==2) {
              $fmsg = '<div class="alert alert-danger" id="fail">Enter valid email !</div>';
			  echo $fmsg;
        }
		?>
				<p class="size30 ml10 mb10 cdark pb20">Password Recovery</p>
			
				<div class="col-md-12">

				</div>
				<div class="col-md-12">
					<input type="text" name="email" class="form-control formlarge mt17" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  title="Invalid Email Format !" required>
				</div>
				
				
				<div class="clearfix"></div>
				<button type="submit" class="btn btnwhitebig btn-default caps ml10 mt30"><i class="icon-box"></i> Recover</button>
				
		
			
			
			
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</div>
</form>
<!-- END OF CONTACT -->
</div>

<?php include("footermain.php"); ?>
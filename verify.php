<?php session_start();

 include("header.php"); 
 include("connection.php"); 
$show=0;
 if(isset($_POST["email"])){
	
	 $email=$_POST["email"];
	 $_SESSION['email']=$email;
	 $code=rand(100000,9999999);
	 $_SESSION['code']=$code;
	     $subject = "Account Verification";

        // Build the email content.
        $email_content = "Hi, \n\n Enter the verification code below to verify your account.\n\n";
	
		$email_content .= "--------------------------------------\n";
		  $email_content .= "VERIFICATION CODE: $code\n";
		  $email_content .= "--------------------------------------\n";
		  $email_content .= "\nNote: This code will be valid only for now .\n\n";
		  
        	
        
       
        
        // Build the email headers.
        $email_headers = "From: Global Project<info@anitsolutions.com>";

        // Send the email.
	 
	if(mail($email, $subject, $email_content, $email_headers)){
		
		$show =1;
	 
	 
 }else{
	 
	$show=2;
 }
 
 }
 ?>

<!-- Content -->

	

<!-- SECTION CONTACT -->

<form action="verify.php" method="post">
<div class="bgwhite">
	<div class="container sspacing-title-button">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
<?php 

if($show==1){
	
              $smsg = '<div class="alert alert-success" id="suc">An Email with verification code has been sent to you check your email!</div>';
			  echo $smsg;
			  			  ?>
			<a href="entercode.php"> Click here </a> and enter the code you get in email to activate account.  
			  <?php
        }
	if($show==2) {
              $smsg = '<div class="alert alert-danger" id="fail">Failed to send email. Try Again !</div> ';
			  echo $smsg;

        }
		?>
				<p class="size30 ml10 mb10 cdark pb20"> Email Verification</p>
			
				<div class="col-md-12">

				</div>
				<div class="col-md-12">
					<input type="text" name="email" class="form-control formlarge mt17" placeholder="Email" required>
				</div>
			
				
				<div class="clearfix"></div>
				<button type="submit" class="btn btnwhitebig btn-default caps ml10 mt30"><i class="icon-box"></i> Send Verification Email</button>
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
<?php

 include("header.php"); 
 include("connection.php"); 
 $show=0;
 if(isset($_POST["companyname"])){
	 
	 $companyname=$_POST["companyname"];
	 $companycategory=$_POST["companycategory"];
	 $companysector=$_POST["compnaysector"];
	 
	 $exposedcategory=$_POST["exposedcategory"];
	 $uid=$_SESSION['uid'];
	
	 $queryadd="INSERT INTO `user_company`(`compid`, `userid`, `company_name`, `category`, `sector`, `exposed_category`) VALUES (NULL,'$uid','$companyname','$companycategory','$companysector','$exposedcategory')";
	 if(mysqli_query($connection,$queryadd)){
		 $show=1;
	 }else{
		 $show=2;
	 }
	 
	 
	 
	 
	 
	 
 }
 
 
 ?>

<!-- Content -->

	

<!-- SECTION CONTACT -->

<form action="registeredofficefree.php" method="POST">
<div class="bgwhite">
	<div class="container sspacing-title-button">
		<div class="col-md-1">
			
		</div>
		<div class="col-md-10">
		<p class="size30 ml10 mb10 cdark pb20">Company Information</p>
	<div class="col-md-11">
				
			
				<div class="col-md-12">
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
<br>
					<input type="text" name="companyname" class="form-control formlarge mt17" placeholder="Name of Comapny" title="Company Name Contains only letters atleast  or greater than 4 !" pattern="[a-zA-Z][a-zA-Z ]{3,}" required>
				</div>
					<div class="col-md-12">
				
					<br><b>Company Sector:</b>
			
				
					<select name="compnaysector" class="form-control formlarge mt17" required>
					<option value="Agriculture">Agriculture</option>
					</select>
					</div>
					<div class="col-md-12">
					<input type="text" name="companycategory" class="form-control formlarge mt17" placeholder="Company Category" pattern="[a-zA-Z][a-zA-Z ]{3,}"  title="Category contains only letters greater than 4 ! "  required>
					</div>
							<div class="col-md-12">
					<input type="text" name="exposedcategory" class="form-control formlarge mt17" placeholder="Exposed Category" pattern="[a-zA-Z][a-zA-Z ]{3,}" title="Exposed Category Contains only letters greater than 4 !" required>
					</div>
				
			<div class="clearfix"></div>
				<button type="submit" class="btn btnwhitebig btn-default  ml10 mt30"><i class="icon-box"></i> Save </button>
				<div class="clearfix"></div>
		</div>
		<div class="col-md-1">
			
		</div>
	</div>
</div>
</form>
<!-- END OF CONTACT -->
</div>

<?php include("footermain.php"); ?>
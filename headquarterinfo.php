<?php

include("header.php");
include("connection.php");  
session_start();
error_reporting(0);

 
 ?>





<div class="container pt60">
	

<?php include("profile-navigation.php"); ?>
<center><h3><b><u>Headquarters Information</u></b></h3></center>
	<br>
	<div class="col-md-10 offset-0 pl40 mb60">
		
		<!-- post -->
		<div class="col-md-12">
		
		<?php 
		// Company information 
		$uid=$_SESSION['uid'];
		$getcompany="select * from `user_headquarter` where `userid`='$uid'";
		$resultcomp=mysqli_query($connection,$getcompany);
		
		if(mysqli_num_rows($resultcomp)>0){
				
			
				//$rowcomp=mysqli_fetch_array($resultcomp);
		?>
		<h4><b><u>Headquarters Details:</u></b></h4><br><a href="headquarteroffice.php"><button style="margin-left:700px;" class="btn btn-success">Add Headquarter</button></a>
		<?php	
				while($rowcomp=mysqli_fetch_array($resultcomp)){
		?>
		<div class="borderall inline plr20 ptb10" style="margin:20px;">		 
		<div class="col-md-6">
			<p>
		
		<b> Street:</b> <?php echo $rowcomp['street']; ?><br>
		<b> City:</b> <?php echo $rowcomp['city']; ?><br>
		<b> Postal Code:</b> <?php echo $rowcomp['postalcode']; ?><br>
		<b> Continent:</b> <?php echo $rowcomp['continent']; ?><br>
		
		<b> Province:</b> <?php echo $rowcomp['province']; ?><br><br>
			<b> Email:</b> <?php echo $rowcomp['email']; ?><br>
			
			<b> VAT Number:</b> <?php echo $rowcomp['vatnumber']; ?><br>
		<b> Fiscal Code:</b> <?php echo $rowcomp['fiscalcode']; ?><br>
		<b> REGISTER C.C.I.A.A. NR. REA:</b> <?php echo $rowcomp['cciaanr']; ?><br>
		<b> Date Of Registration:</b> <?php echo $rowcomp['dateofregistration']; ?><br><br>
			<b> COUNTRY:</b> <?php echo $rowcomp['country1']; ?><br>
				
		<b> CONTINET:</b> <?php echo $rowcomp['continent1']; ?><br><br>
		
		 </div>
			<div class="col-md-6">
	
	
		<b> Telephone:</b> <?php echo $rowcomp['tel']; ?><br>
		<b> Fax:</b> <?php echo $rowcomp['fax']; ?><br>
	<b> Website:</b> <?php echo $rowcomp['website']; ?><br>
	<b> Country:</b> <?php echo $rowcomp['country']; ?><br><br><br>
	
			<b> Cooperative Group:</b> <?php echo $rowcomp['cooperategroup']; ?><br>
			<b> Sector:</b> <?php echo $rowcomp['sector']; ?><br>
			<b> Category:</b> <?php echo $rowcomp['category']; ?><br>
			<b> Exposed Category:</b> <?php echo $rowcomp['exposedcategory']; ?><br>
		<b> Foundation Date:</b> <?php echo $rowcomp['foundationdate']; ?><br><br>
		<b> Number of Employees:</b> <?php echo $rowcomp['numofemployees']; ?><br>
		<b> Share Capital:</b> <?php echo $rowcomp['sharecapital']; ?><br>
			<b> Revenue:</b> <?php echo $rowcomp['revenue']; ?><br>
			
			
			<br>
			</p>			
			</div>
			<a href="updateheadquaterinformation.php?id=<?php echo $rowcomp['hqid']; ?>"><button class="btn btn-primary">Update</button></a><a href="deleteheadquater.php?id=<?php echo $rowcomp['hqid']; ?>"><button style="margin-left:20px;" class="btn-danger btn">Delete</button></a>
</div>
			<?php
				
				
				}
			
			?>
		
			<?php
			}else{ ?>
		
			<h5> No Headquarters record found. <a href="headquarteroffice.php"><b style="font-size:16px"> Click here</b></a> to add Headquarters Information.</h5>
			<br>
			
		<?php } ?>
		</div>
		
		<!-- END CONTENT -->
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
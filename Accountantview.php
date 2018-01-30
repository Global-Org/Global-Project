<?php

 include("header.php");
 include("connection.php");  ?>


<div class="container pt60">
	

<?php include("profile-navigation.php"); ?>
<center><h3><b><u>User Information</u></b></h3></center>
	<br>
	<div class="col-md-10 offset-0 pl40 mb60">
		
		<!-- post -->
		<div class="col-md-12">
		
		<?php 
		// Company information 
		$uid=$_SESSION['cuserid'];
		$getcompany="select * from `company_users` where `cuserid`='$uid'";
		$resultcomp=mysqli_query($connection,$getcompany);
		
		
		if(mysqli_num_rows($resultcomp)>0){
			
			//Display one company if Free Member
			if($_SESSION['membership']=="Free"){
				$rowcomp=mysqli_fetch_array($resultcomp);
		?>
		<h4><b><u>User Details:</u></b></h4><br>
		<div class="borderall inline plr20 ptb10" style="width:100%">		 
		<div class="col-md-6">
			<p>
			<b> User Name:</b> <?php echo $rowcomp['name']; ?><br>
			
		<b> Sur Name:</b> <?php echo $rowcomp['surename']; ?></b><br>

		 </div>
			<div class="col-md-6">
			
		<b>	 Email:</b> <?php echo $rowcomp['email']; ?></b><br>
		<b>	 User Type:</b> <?php echo $rowcomp['usertype']; ?></b><br>
		
			</p>
			<br>
		
			</div>
</div>
			<?php }else{
				
			
				$rowcomp=mysqli_fetch_array($resultcomp);
		?>
		<h4><b><u>User Details:</u></b></h4><br>
		<div class="borderall inline plr20 ptb10" style="width:100%">		 
		<div class="col-md-6">
			<p>
			<b> User Name:</b> <?php echo $rowcomp['name']; ?><br>
			
		<b> Sir Name:</b> <?php echo $rowcomp['surename']; ?></b><br>
		

		 </div>
			<div class="col-md-6">
			
		<b>	 Email:</b> <?php echo $rowcomp['email']; ?></b><br>
		<b>	 User Type:</b> <?php echo $rowcomp['usertype']; ?></b><br>
		
			</p>
			</div>
			<td><a href="updateuser.php?updateid=<?php echo $rowcomp[0]; ?>" ><button class="btn-danger btn">Update</button></a></td>
</div>
			<?php
				
				
				
			}
			?>
		
			<?php
			}else{ ?>
		
			<h5> No record found for your company </h5>
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
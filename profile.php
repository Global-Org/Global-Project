<?php
 include("header.php");
 include("connection.php");

 ?>



<div class="container pt60">
<?php include("profile-navigation.php"); ?>
<center><h3><b><u>Company Information</u></b></h3></center>
	<br>
	<div class="col-md-10 offset-0 pl40 mb60">
		
		<!-- post -->
		<div class="col-md-12">
		
		<?php 
		// Company information 
		$uid=$_SESSION['uid'];
		 $getcompany="select * from `user_company`  where `userid`='$uid'";
		$resultcomp=mysqli_query($connection,$getcompany);
		mysqli_num_rows($resultcomp);
		
		if(mysqli_num_rows($resultcomp)>0){
			
			//Display one company if Free Member
			if($_SESSION['membership']=="Free"){
				$rowcomp=mysqli_fetch_array($resultcomp);
		?>
		<h4><b><u>Company Details:</u></b></h4><br>
		<div class="borderall inline plr20 ptb10" style="width:100%" >		 
		<div class="col-md-6">
			<p>
			<b> Company Name:</b> <?php echo $rowcomp['company_name']; ?><br>
			
		<b> Company Category:</b> <?php echo $rowcomp['category']; ?></b><br>

		 </div>
			<div class="col-md-6">
		<b>	 Company Sector:</b> <?php echo $rowcomp['sector']; ?></b><br>
			
		<b>	 Exposed Category:</b> <?php echo $rowcomp['exposed_category']; ?></b><br>
		
			</p>
			<br>
		
			</div>
</div>
			<?php }else{
				?>
				<h4><b><u>Company Details:</u></b></h4><br><a href="registeredoffice.php"><button style="margin-left:630px;" class="btn btn-success">Add Company</button></a>
				<?php	
				//$rowcomp=mysqli_fetch_array($resultcomp);
				
				while($rowcomp=mysqli_fetch_array($resultcomp)){
					
		?>
		<div class="borderall inline plr20 ptb10" style="margin:10px">		 
		<div class="col-md-6">
			<p>
			<b> Company Name:</b> <?php echo $rowcomp['company_name']; ?><br>
			
		<b> Company Category:</b> <?php echo $rowcomp['category']; ?></b><br>
		<br>
		<b> Street:</b> <?php echo $rowcomp['street']; ?><br>
		<b> City:</b> <?php echo $rowcomp['city']; ?><br>
		<b> Postal Code:</b> <?php echo $rowcomp['postal_code']; ?><br>
		<b> Province:</b> <?php echo $rowcomp['province']; ?><br><br>
			<b> Email:</b> <?php echo $rowcomp['email']; ?><br>
		
		 </div>
			<div class="col-md-6">
		<b>	 Company Sector:</b> <?php echo $rowcomp['sector']; ?></b><br>
			
		<b>	 Exposed Category:</b> <?php echo $rowcomp['exposed_category']; ?></b><br>
		<br>
		<b> Country:</b> <?php echo $rowcomp['country']; ?><br>
		<b> Continent:</b> <?php echo $rowcomp['continent']; ?><br>
		<b> Telephone:</b> <?php echo $rowcomp['tel']; ?><br>
		<b> Fax:</b> <?php echo $rowcomp['fax']; ?><br><br>
	<b> Website:</b> <?php echo $rowcomp['website']; ?><br>
			</p>
			</div>
			<a href="updateCompanydetails.php?id=<?php echo $rowcomp['compid']; ?>"><button class="btn btn-primary">Update</button></a><a href="deletecompany.php?id=<?php echo $rowcomp['compid']; ?>"><button style="margin-left:20px;" class="btn-danger btn">Delete</button></a>
			
</div>
				
			<?php
				
				
				}	
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

<!-- Include Footer -->
<?php include 'footer.php';?>
</body>
</html>
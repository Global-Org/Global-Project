<?php

 include("header.php");
 include("connection.php");  ?>





<div class="container pt60">

<?php include("profile-navigation.php"); ?>
	<center><h3> <b><u>Membership</u></b></h3></center>
	<br>
	

	<div class="col-md-10 offset-0 pl40 mb60">
		
		<!-- post -->
		<div class="col-md-12">
		<div class="col-md-9"><h4><b><u>Membership Details:</u></b></h4><br></div>
		<div class="col-md-3">
<a href="upgrade-membership.php"><button class="btn-success btn">Upgrade Membership </button></a>
		</div></div>
			<?php 
		// Membership information 
		$uid=$_SESSION['uid'];
		 $getmem="SELECT * FROM `user_membership` where `userid`='$uid'";
		$resultmem=mysqli_query($connection,$getmem);
		 $nr =mysqli_num_rows($resultmem);
		if(mysqli_num_rows($resultmem)>0){
			
			//Display Membership info
			
				$rowmem=mysqli_fetch_array($resultmem);
		 	$rowmem['membership_type'];
				if($rowmem['membership_type']=='Simply'){
		?>
		
		<h5>Your current Membership is <b style="color:orange;font-size:16px"><?php echo $rowmem['membership_type']; ?></b>. Your membership contains features that are mentioned below. </h5>
			<br>
        <div class="col-md-9">
		<div class="borderall inline plr20 ptb10" style="width:100%">	
		<span class="ti-check"></span>&nbsp;&nbsp;Small Description <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services 100% <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Newsletter <br>
		<span class="ti-check"></span>&nbsp;&nbsp;1 Company <br>
		<span class="ti-check"></span>&nbsp;&nbsp;1 Country Access <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Price Plan GDP 1% <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Small Profile Page<br>
		<span class="ti-check"></span>&nbsp;&nbsp;Planning System(pay extra) <br>
		</div>
		</div>			
				<?php 
						
			}
			 $membership ="Member";
	 $rowmem['membership_type'];
						if($rowmem['membership_type']=='Member'){
		?>
		<h5>Your current Membership is <b style="color:orange;font-size:16px"><?php echo $rowmem['membership_type']; ?></b>. Your membership contains features that are mentioned below. </h5>
			<br>
        <div class="col-md-9">
		<div class="borderall inline plr20 ptb10" style="width:100%">	
		<span class="ti-check"></span>&nbsp;&nbsp;Full Contents <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services 100% <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services 10% Discount <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Newsletter <br>
		<span class="ti-check"></span>&nbsp;&nbsp;1 Company <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Multilevel Users&nbsp;(Master,Employer,Accountant,Company Owner)<br>
		<span class="ti-check"></span>&nbsp;&nbsp;Price Plan GDP 10% <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services prices plan start from 0.1% of GDP<br>
		<span class="ti-check"></span>&nbsp;&nbsp;Profile Pages<br>
		<span class="ti-check"></span>&nbsp;&nbsp;Planning System(pay extra) <br>
		</div>
		</div>			
				<?php 
				}
				
						if($rowmem['membership_type']=='Supporter'){
		?>
		<h5>Your current Membership is <b style="color:orange;font-size:16px"><?php echo $rowmem['membership_type']; ?></b>. Your membership contains features that are mentioned below. </h5>
			<br>
        <div class="col-md-9">
		<div class="borderall inline plr20 ptb10" style="width:100%">	
		<span class="ti-check"></span>&nbsp;&nbsp;Full Contents <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services 100% <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services 15% Discount <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Newsletter <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Multiple Company <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Multilevel Users&nbsp;(Master,Employer,Accountant,Company Owner)<br>
		<span class="ti-check"></span>&nbsp;&nbsp;Price Plan GDP 15% <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services prices plan start from 0.1% of GDP<br>
		<span class="ti-check"></span>&nbsp;&nbsp;Profile Pages<br>
		<span class="ti-check"></span>&nbsp;&nbsp;Planning System(pay extra) <br>
		</div>
		</div>			
				<?php 
				}
					if($rowmem['membership_type']=='Counsellor'){
		?>
		<h5>Your current Membership is <b style="color:orange;font-size:16px"><?php echo $rowmem['membership_type']; ?></b>. Your membership contains features that are mentioned below. </h5>
			<br>
        <div class="col-md-9">
		<div class="borderall inline plr20 ptb10" style="width:100%">	
		<span class="ti-check"></span>&nbsp;&nbsp;Full Contents <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services 100% <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services 15% Discount <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Newsletter <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Multiple Company <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Multilevel Users&nbsp;(Master,Employer,Accountant,Company Owner)<br>
		<span class="ti-check"></span>&nbsp;&nbsp;Price Plan GDP 15% <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services prices plan start from 0.1% of GDP<br>
		<span class="ti-check"></span>&nbsp;&nbsp;Profile Pages<br>
		<span class="ti-check"></span>&nbsp;&nbsp;Planning System(pay extra) <br>
		</div>
		</div>			
				<?php 
				}
				
				if($rowmem['membership_type']=='Ordinary Branch Office'){
		?>
		<h5>Your current Membership is <b style="color:orange;font-size:16px"><?php echo $rowmem['membership_type']; ?></b>. Your membership contains features that are mentioned below. </h5>
			<br>
        <div class="col-md-9">
		<div class="borderall inline plr20 ptb10" style="width:100%">	
		<span class="ti-check"></span>&nbsp;&nbsp;Full Contents <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services 100% <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services 15% Discount <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Newsletter <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Multiple Company <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Multilevel Users&nbsp;(Master,Employer,Accountant,Company Owner)<br>
		<span class="ti-check"></span>&nbsp;&nbsp;Price Plan GDP 15% <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services prices plan start from 100% of GDP<br>
		<span class="ti-check"></span>&nbsp;&nbsp;Profile Pages<br>
		<span class="ti-check"></span>&nbsp;&nbsp;Planning System(pay extra) <br>
		</div>
		</div>			
				<?php 
				}
				  $rowmem['membership_type'];
				if($rowmem['membership_type']=='Founder Exclusivity'){
		?>
		<h5>Your current Membership is <b style="color:orange;font-size:16px"><?php echo $rowmem['membership_type']; ?></b>. Your membership contains features that are mentioned below. </h5>
			<br>
        <div class="col-md-9">
		<div class="borderall inline plr20 ptb10" style="width:100%">	
		<span class="ti-check"></span>&nbsp;&nbsp;Full Contents <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services 100% <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services 15% Discount <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Newsletter <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Multiple Company <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Multilevel Users&nbsp;(Master,Employer,Accountant,Company Owner)<br>
		<span class="ti-check"></span>&nbsp;&nbsp;Price Plan GDP 15% <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services prices plan start from 0.1% of GDP<br>
	
		</div>
		</div>			
				<?php 
				}
				
				} else { ?>
			<h5>Your current Membership is <b style="color:Green;font-size:16px">Free Basic</b>. Your membership contains features that are mentioned below. </h5>
			<br>	 
		<div class="col-md-9">
		<div class="borderall inline plr20 ptb10" style="width:100%">	
		<span class="ti-check"></span>&nbsp;&nbsp;Small Description <br>
		<span class="ti-check"></span>&nbsp;&nbsp;Services 100% <br>
		<span class="ti-check"></span>&nbsp;&nbsp;1 Country Access <br>
		</div>
		</div>
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
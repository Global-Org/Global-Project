<?php

 include("header.php");
 include("connection.php");  
 
  $show=0;


 ?>
<div class="container pt60">

<?php include("profile-navigation.php"); ?>
<center><h3><b><u>Services</u></b></h3></center>
	<br>
	<div class="col-md-10 offset-0 pl40 mb60">
		
		<!-- post -->
		<div class="col-md-12">
		<h4><b><u>Services Requests:</u></b></h4><br>
		<?php
		if($show==1){
	
              $smsg = '<div class="alert alert-success" id="suc">Payment information successfully deleted.</div>';
			  echo $smsg;
			  			 
        }
	if($show==2) {
              $smsg = '<div class="alert alert-danger" id="fail">Failed to delete payment information. Try Again !</div> ';
			  echo $smsg;
	}
?>
		
	 
		<div class="col-md-12">
		<?php //http://anitsolutions.com/Projects/GlobalServices/index.php?uid=<?php echo $_SESSION['uid'];  ?>
		<div class="row">
		
		<?php 
		$userid=$_SESSION['uid'];
	    $getservicerequest="SELECT * FROM `service_requests` where `user_id`='$userid'";
		$requestsresult=mysqli_query($conservices,$getservicerequest);
	    while($rowrequest=mysqli_fetch_array($requestsresult)){
		?>
		
		<div class="col-md-4" data-scroll-reveal="enter top over 1s and move 50px after 0.5s" style="margin-top:10px">
		
				<div class="player offset-0" data-scrollreveal="enter top" >
				<?php if($rowrequest['request_status']=="Need Answers"){ ?>
				<div class="alert p15 alert-warning" role="alert" style="color:white;height:50px;font-size:15px;width:80%;background-color: #46b8da;">
				Status:<b> <u>Need Answers</u></b></div> 
				<?php }
				if($rowrequest['request_status']=="Pending"){ ?>
				
			<div class="alert p15 alert-warning" role="alert" style="color:white;font-size:15px;width:65%;background-color:#cc6666;">
				Status:<b> <u>Pending</u></b></div> 
				<?php } 
				if($rowrequest['request_status']=="Resolved"){ ?>
				
			<div class="alert p15 alert-warning" role="alert" style="color:white;font-size:15px;width:65%;background-color:green;">
				Status:<b> <u>Resolved</u></b></div> 
				<?php } ?>
					
					<div class="socialiconswhite m20" >
					<h5 style="height:50px"><b><?php echo $rowrequest['service_request_title'];?></b></h5><br>
					
					<h5>Date:<b><?php echo $rowrequest['request_datetime']; ?></b></h5><br>
						<ul>
							
							<?php if($rowrequest['request_status']=="Need Answers"){ ?>
							<center><li class="lblue"><a href="http://anitsolutions.com/Projects/GlobalServices/index.php?reqid=<?php echo $rowrequest[0];  ?>">Continue to Service</a></li></center>
							<?Php } ?>
							
						</ul>
						<div class="clearfix"></div>
					</div>					
				</div>		
			</div>
		<?php } ?>
		
		<a   href="http://anitsolutions.com/Projects/GlobalServices/index.php?uid=<?php echo $_SESSION['uid'];  ?>">
		<div class="col-md-4" data-scroll-reveal="enter top over 1s and move 50px after 0.5s" style="margin-top:10px">
		
				<div class="player offset-0" data-scrollreveal="enter top" style="background-color:#a7a5a5" >
				
					
					<div class="socialiconswhite m20" >
				
					
					
							<center><img src="images/plus.png" style="height:40%;width:45%;"/><center><br>
							<h3 style="color:white;text-decoration:none"> <b>Request a new Service</b> </h3>
							
					
						<div class="clearfix"></div>
					</div>					
				</div>		
			</div>
			</a>
	      
		</div>
		
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
<?php include 'footer.php';?>

</body>
</html>
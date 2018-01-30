<?php include 'head.php';
$show=0;
if(isset($_POST['btcontact'])){
$uzrname=$_POST['uname'];
$mail=$_POST['mail'];
$to = $mail;
$subject = "related contact";
$message = $_POST['msg'];
$headers = "From: ".$mail."\r\n" ." ";
$mailreslt=mail($to,$subject,$message,$headers);  // For email sending..
echo $mailreslt;
if($mailreslt){
//$smsg = '<div class="alert alert-success" id="suc"> Sent successfully!</div>';
	// echo $smsg;
	$show=1;
}
else{
$show=2;	
}
}

?>
<body class="bglight loadmap">

<!-- start preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!-- end preloader -->

<!-- THEMES PREVIEW -->
<?php include 'tmprev.php';?>

<!-- Navigation -->
<div ID="navoffset" class="secpage shadow-off bgwhite">
	<div class="topnavbar bgwhite">
		<div class="container">

			<ul class="top-socials">
				<li class="left mr10"><a href="#"><i class="icon-facebook"></i></a></li>
				<li class="left mr10"><a href="#"><i class="icon-twitter-bird"></i></a></li>
				<li class="left mr10"><a href="#"><i class="icon-gplus"></i></a></li>
				<li class="left mr10"><a href="#"><i class="icon-dribbble"></i></a></li>
				<li class="left mr10"><a href="#"><i class="icon-youtube"></i></a></li>
			</ul>

			<div class="right top-links">
				<a href="#" class="c999 bold"><span class="ti-mobile"></span> 0 1800 1800 1234 </a> <span class="plr5">|</span>
				<a href="#" class=""><span class="ti-email"></span> E-mail </a> <span class="plr5">|</span>
				<a href="#" class=""><span class="ti-lock"></span>Login</a>
			</div>
		</div>
	</div>
	<div class="navigation dark">

		<div class="container">
			<div class="logo"><a href="index.php"><img src="images/spacer.png" class="mt5 relative z100" alt=""/></a></div>

			<?php include 'navigation-white.php';?>	

		</div>
	</div>

	<!-- SEARCH -->	
	<div class="fwsearch">
		<div class="size30"><span class="escape">Press [ esc ] or close</span><a href="#" class="closesearch">+</a></div>
		
		<div class="csearch container">
			<input type="email" class="form-control fwsearchfield" placeholder="Search keyword">
			<button type="submit" class="btn fwsearchfieldbtn"><i class="ti-search"></i></button>
		</div>
		
	</div>
</div>
<!-- End of Navigation -->		

<div class="bgwhite space20 relative z20"></div>

<?php	
           if($show==1){
	
              $smsg = '<div class="col-md-6"> </div><div class="alert alert-success col-md-4" id="suc"> Successfully sent !</div>';
			  echo $smsg;
			}
			if($show==2) {
              $fmsg = '<div class="alert alert-danger col-md-4" id="fail">Failed Try Again !</div>';
			  echo $fmsg;
        }
		?>



<!-- SECTION CONTACT -->
<div class="bgwhite">
	<div class="container sspacing-title-button">
		<div class="col-md-4">
			<div class="space30"></div>
			<span class="fontproximabold cdark caps"> Company Details</span>
			<div class="divider mtb20"></div>
			
			<strong class="fontproximabold cdark size18">Avision</strong>
			<p class="cdark">
				4676 Devonshire Drive <br/>
				Ravenna, OH 44266
			</p>
			<div class="divider mtb20"></div>
			<strong class="fontproximabold cdark">Email</strong>
			<p>
				<span class="ti-email mr10"></span>  
				<a href="mailto:hello@avision.com">hello@avision.com</a>
			</p>
			<div class="divider mtb20"></div>
			<strong class="fontproximabold cdark">Customer Support</strong>
			<p>
				<span class="ti-mobile mr10"></span>
				<span class="cdark">0 1800 1800 1234</span>
			</p>


		</div>
		<div class="col-md-8">
          <form method="POST" action="contact.php">
				<p class="size30 ml10 mb10 cdark pb20">Send us your feedback</p>
				
				<div class="col-md-6">
					<input type="text" class="form-control formlarge" placeholder="Name" name="uname">
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control formlarge" placeholder="Email" name="mail">
				</div>
				<!-- <div class="col-md-12">
					<input type="text" class="form-control formlarge mt17" placeholder="Phone">
				</div>  -->
				<div class="col-md-12">
					<textarea class="form-control formstyle mt17" rows="7" placeholder="Message" name="msg"></textarea>
				</div>
				<div class="clearfix"></div>
				<button type="submit" class="btn btnwhitebig btn-default caps ml10 mt30" name="btcontact"><i class="icon-mail"></i> Send Message</button>
				<div class="clearfix"></div>

		</div>
	</div>
</div>
<!-- END OF CONTACT -->

<!-- FOOTER -->
<div class="footer">
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

<!-- Include Footer -->
<?php include 'footer.php';?>

<!-- GOOGLE MAPS -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js/googlemaps.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script>
$(document).ready(function(){
        $("#suc").fadeIn(9000);
        $("#suc").fadeOut(9000);
    
   
});
</script>

</body>
</html>
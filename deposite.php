<?php
session_start();
 include("header.php");
 include("connection.php");

 $uid = $_SESSION['uid'];

 if($uid == "")
{
?>
<script>
alert("Please Login To Continue..");
window.location.href="login.php";
</script>
<?php
}$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr';

//PayPal Business Email
$paypalID = 'InsertPayPalBusinessEmail';
 ?>
<script
  src="https://code.jquery.com/jquery-1.11.1.js"
  integrity="sha256-MCmDSoIMecFUw3f1LicZ/D/yonYAoHrgiep/3pCH9rw="
  crossorigin="anonymous"></script>
<script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
	document.getElementById("currency").value =x;
	//document.getElementById("amount").value="";
		document.getElementById("error").innerHTML="";
	
	
	
	if(x =="USD")
	{
	var y='$';
	}
	else if(x=="EUR")
	{
	var y='€';
	}
	else if(x=="AUD")
	{
    var y = 'A$';	
	}
	else
{
var y ='$';
}
	var amount="00.00";
	var am=y+amount; 
		document.getElementById("sign").value =y;
    	document.getElementById("total").innerHTML = am;
	document.getElementById("sign").value =  y;
	var price="Confirm 00.00";
	var button = price +  " " + x;
		document.getElementById("btn").value =  button;
document.getElementById("signvalue").innerHTML = y;
		
}
</script>
<script>
function myFunction1() {
var x = document.getElementById("mySelect").value;
document.getElementById("currency").value =x;


    var amount = document.getElementById("amount").value;
    document.getElementById("CurrencyCode").value=x;
	document.getElementById("itemprice").value=amount;

	if(x =="USD")
	{
	var y='$';
	}
	else if(x=="EUR")
	{
	var y='€';
	}
	else if(x=="AUD")
	{
    var y = 'A$';	
	}
else
{
var y ='$';
}

	document.getElementById("sign").value =y;
	var am=y+amount; 
    	document.getElementById("total").innerHTML = am;
			var price="Confirm";
			
	var button = price + " "+ amount + " "+ x;
		document.getElementById("btn").value =  button;


}
</script>

<div class="container pt60 ">
<div class="col-md-12 bglight">

	<br>
	
	<div class="col-md-1 offset-0 pl40 mb60">
	</div>
	<div class="col-md-10 offset-0 pl40 mb60 ">
	
	<br>
	<br>

	<br>
		<h2>Payment Method</h2>
		<!-- post -->
		<div class="col-md-6" >
	
		<br>
		<br>
		
		<div class="bgwhite" style="border: 5px solid #f7f7f7;  height:100px;">
		<input style="margin-top:35px;margin-left:20px;"  type="radio" ><b style="margin-top:35px;margin-left:20px;">PayPal</b><img  style="width:70px;height:30px; margin-left:200px;"src="images/paypal.png" />
	
		</div>
		</div>
			<!-- post -->
		<div class="col-md-6">

		<div class="bgwhite"  style="border: 5px solid #f7f7f7;  height:400px;">
		
		<form method="post" action="proces.php?paypal=checkout">
	<input type="hidden" name="itemname" value="GLOBAL PROJECTS" /> 
	<input type="hidden" name="itemnumber" value="10000" /> 
    <input type="hidden" name="itemdesc" value="Capture all your special moments with the Canon EOS Rebel XS/1000D DSLR camera and cherish the memories over and over again." /> 
	<input type="hidden" id="itemprice" name="itemprice" value="<?php echo $_GET['money']; ?>" />
	<input type="hidden" id="CurrencyCode" name="CurrencyCode" value="USD">
    		
	<p style="color:#ff1223;" id="error" value="" ></p> 
	<select onchange="myFunction()" id="mySelect" style="margin-top:45px;margin-left:50px;width:330px" name="currency_code" class="form-control formlarge mt15">

<option value="">Select Currency</option> 
<option value="USD">USD</option> 
<option value="EUR">EUR</option> 
<option value="AUD">AUD</option> 
</select>
<input   type="hidden" id="currency" value="USD"  >
<input   type="hidden" id="signature"  value="$">
</hr>
</br>
<label style="margin-top:40px;margin-left:40px; color:#A9A9A9" >Deposit Amount</label>
<?php
if($_GET['money']!="")
{
?>
<input  onblur="myFunction1()" class="form-control" id="amount" name="amount" style=" width:100px; float:right;margin-top:35px;margin-right:40px;" value="<?php echo $_GET['money']; ?>" type="text" >
<?php
}
else
{
?>
<input  onblur="myFunction1()" class="form-control" id="amount" name="amount" style=" width:100px; float:right;margin-top:35px;margin-right:40px;"  type="text" >

<?php
}?>
<input class="form-control" disabled id="sign" value="$" style="background-color:#f7f7f7; width:50px;  float:right;margin-top:35px;"  type="text" >
<br>
<br>
<br>

<hr>
	<label style="margin-top:10px;margin-left:40px; color:#A9A9A9" >Total</label>
	<?php
if($_GET['money']!="")
{
?>
	<input disabled style="border: none; background-color:#fff; margin-top:10px;float:right;margin-right:10px;  width:100px; color:#A9A9A9" id="total1" value="$<?php echo $_GET['money']; ?>"></input>
<?php
}
else
{
?>
	<input disabled style="border: none; background-color:#fff; margin-top:10px;float:right;margin-right:10px;  width:100px; color:#A9A9A9" id="total1" value="$00.00"></input>

<?php
}?>
	<br>
<br>
	<?php
if($_GET['money']!="")
{
?>
<input type="submit" id="btn" style="margin-top:10px;background-color:#33B2FF; color:#fff;margin-left:100px; width:250px; height:50px;" 
  value="Confirm <?php echo $_GET['money']; ?> USD"></input>

<?php
}
else
{
?>
<input type="submit" id="btn" style="margin-top:10px;background-color:#33B2FF; color:#fff;margin-left:100px; width:250px; height:50px;" 
  value="Confirm 00.00 USD"></input>
<?php
}?>
<script>
$(function(){
    var $amount = $('#amount');
    var $btn = $('#btn');
	
	var $total1 = $('#total1');
	  var $currency = $('#currency');
	  var $sign = $('#sign');
	
    function onChange() {
		$amountvalue = "Confirm " +$amount.val() + " " + $currency.val() ;
$totalvalue =$sign.val() + $amount.val() ;

        $btn.val($amountvalue);
		$total1.val($totalvalue);
    };
    $('#amount')
        .change(onChange)
        .keyup(onChange);
});
</script>
  <!-- Identify your business so that you can collect the payments. -->
 
  <!-- Display the payment button. -->
 
  

</form>
<br>		</div>
		</div>
		
		<!-- END CONTENT -->
		
	</div>

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
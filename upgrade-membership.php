<?php session_start();

 include("header.php"); 

 ?>

<!-- Content -->
<div class="container sspacing">
<div id="showpartIdd">
	</div>
<center><h2> Membership Plans</h2></center><br>
		<?php
			$show =$_SESSION['show1'];
			$plan =$_GET['membership'];	
if($show==1 AND $plan != ""){
	
              $smsg = '<div class="alert alert-success" id="suc" >Congratulations!! Your membership has been upgraded to<b> '.$plan.' </b>successfully.</div>';
			  echo $smsg;
			  			  ?>
			<a href="profile-membership.php"> Click here </a> to go to your profile.<br>
			  <?php
        }
	if($show==2) {
              $smsg = '<div class="alert alert-danger" id="fail">Failed to upgrade membership. Incorrect code or Try Again !</div> ';
			  echo $smsg;

        }
		?>
		
	
<div  style="display: none" id="showpartId">
<form method="POST" action="upgrade-membership_action.php">
<h4>MemberShip Plan </h4><p id="title_show"></p>
<input type="hidden" id="titleplan" name="titleplan" value="">

<div class="plistrow2"><span class="h4"> Price Plan </span><p id="title_value"></p>
<input type="hidden" id="price" name="price" value="">
</div><h3> Please Confirm By Click on Below Button To Buy this Membership </h3>
<input type="submit" class="btn btn-success" value="BUY NOW" name="submit">
</form>
</div>
<style>
#showpartId {
    width: 70%;
    padding: 10px 0;
    text-align: center;
    background-color: #f1f1f1;
    margin-top: 10px;
	  margin-bottom: 20px;
	    margin-left: 200px;
		 margin-right: 100px;0
}
</style>
		<br>
	<div class="pricelist-wrapper dark col3">
	  <ul>
	   <li>
	      <div class="plistrow1">Simply</div>
	      <div class="plistrow2"><span class="h9">Price Plan</span><br><span class="smallp">GDP 1%</span></div>
	      <div class="plistrowbg ">Small Description </div> 
		   <div class="plistrow">Services 100% </div>
		    <div class="plistrowbg">Newsletter </div>
			  <div class="plistrow">1 Country Access</div>
			   <div class="plistrowbg">Small Profile page </div>
			 <div class="plistrow">1 Company </div>
			
		 <div class="plistrowbg">Pay extra Planing system </div>
	      <div class="plistrow"></div>
	       <?php
		  $title="Simply";
		  ?>
			
	      <div class="plistrow2"><div class="button_ok"><button id="title" value="<?php echo $title; ?>,$100" onclick="myFunction()" class="btn btn-primary">BUY NOW</button></div></div>
	    </li>
	    <li>
	      <div class="plistrow1">Member</div>
	      <div class="plistrow2"><span class="h9">Price Plan</span><br><span class="smallp">GDP 10%</span></div>
	      <div class="plistrowbg ">Full Contents </div> 
		   <div class="plistrow">Services 10% Discount </div>
		    <div class="plistrowbg">Newsletter </div>
			  <div class="plistrow">Multiple User Levels </div>
			   <div class="plistrowbg">Services prices plan start from 0,1% of GDP </div>
			 <div class="plistrow">1 Company </div>
			  <div class="plistrowbg">Profile Pages	 </div>
		 <div class="plistrow">Planing system </div>
	     
	       <?php
		  $title1="Member";
		  ?>
			
	      <div class="plistrow2"><div class="button_ok"><button id="title1" value="<?php echo $title1; ?>,$100" onclick="myFunction1()" class="btn btn-primary">BUY NOW</button></div></div>
	    </li>
		    <li>
	      <div class="plistrow1">Supporter</div>
	      <div class="plistrow2"><span class="h9">Price Plan</span><br><span class="smallp">GDP 15%</span></div>
	      <div class="plistrowbg ">Full Contents </div  > 
		   <div class="plistrow">Services 15% Discount</div>
		    <div class="plistrowbg">Newsletter </div>
			  <div class="plistrow">Multiple User Levels </div>
			   <div class="plistrowbg">Services prices plan start from 0,1% of GDP </div>
			 <div class="plistrow">Multiple Companies </div>
			  <div class="plistrowbg">Profile Pages	 </div>
		 <div class="plistrow">Planing system </div>
	     
	       <?php
		  $title2="Supporter";
		  ?>
			
	      <div class="plistrow2"><div class="button_ok"><button id="title2" value="<?php echo $title2; ?>,$100" onclick="myFunction2()" class="btn btn-primary">BUY NOW</button></div></div>
	    </li>
		</ul>
		</div>
		<br><br>
		<br>
	
<br>
		<div class="pricelist-wrapper dark col3">
		<ul>
		<li>
	      <div class="plistrow1">Counsellor</div>
	      <div class="plistrow2"><span class="h9">Price Plan</span><br><span class="smallp">GDP 15%</span></div>
	      <div class="plistrowbg ">Full Contents </div> 
		   <div class="plistrow">Services 15% Discount</div>
		    <div class="plistrowbg">Newsletter </div>
			  <div class="plistrow">Multiple User Levels </div>
			   <div class="plistrowbg">Services prices plan start from 0,1% of GDP </div>
			 <div class="plistrow">Multiple Companies </div>
			  <div class="plistrowbg">Profile Pages	 </div>
		 <div class="plistrow">Planing system </div>
	     
	       <?php
		  $title3="Counsellor";
		  ?>
			
	      <div class="plistrow2"><div class="button_ok"><button id="title3" value="<?php echo $title3; ?>,$100" onclick="myFunction3()" class="btn btn-primary">BUY NOW</button></div></div>
	    </li>
			<li>
	      <div class="plistrow1">Ordinary Branch Office</div>
	      <div class="plistrow2"><span class="h9">Price Plan</span><br><span class="smallp">GDP 15%</span></div>
	      <div class="plistrowbg ">Full Contents </div> 
		   <div class="plistrow">Services 15% Discount</div>
		    <div class="plistrowbg">Newsletter </div>
			  <div class="plistrow">Multiple User Levels </div>
			   <div class="plistrowbg">Services prices plan start from 100% of GDP </div>
			 <div class="plistrow">Multiple Companies </div>
			  <div class="plistrowbg">Profile Pages	 </div>
		 <div class="plistrow">Planing system </div>
	        <?php
		  $title4="Ordinary Branch Office";
		  ?>
	      <div class="plistrow2"><div class="button_ok"><button id="title4" value="<?php echo $title4; ?>,$100" onclick="myFunction4()" class="btn btn-primary">BUY NOW</button></div></div>
	    </li>
		<li>
	      <div class="plistrow1">Founder Exclusivity</div>
	      <div class="plistrow2"><span class="h9">Price Plan</span><br><span class="smallp">GDP 15%</span></div>
	      <div class="plistrowbg ">Full Contents </div> 
		   <div class="plistrow">Services 15% Discount</div>
		    <div class="plistrowbg">Newsletter </div>
			  <div class="plistrow">Multiple User Levels </div>
			   <div class="plistrowbg">Services prices plan start from 0,1% of GDP </div>
			 <div class="plistrow">Multiple Companies </div>
			  <div class="plistrowbg">Profile Pages	 </div>
		 <div class="plistrow">Planing system </div>
			   <?php
		  $title5="Founder Exclusivity";
		  ?>
			
	      <div class="plistrow2"><div class="button_ok"><button id="title5" value="<?php echo $title5; ?>,$100" onclick="myFunction5()" class="btn btn-primary">BUY NOW</button></div></div>
		
		
	    </li>
		</ul>
	</div>
</div>

<script>

function myFunction() {
 var value = document.getElementById("showpartId");
    if (value.style.display === "block") {
        value.style.display = "none";
    }
    if (value.style.display === "none") {
        value.style.display = "block";
    } else {
        value.style.display = "none";
    }
    var x = document.getElementById("title").value;
	var parts = x.split(',');
    var one = parts[0];
    var two = parts[1];
	//alert(two);
    document.getElementById("title_show").innerHTML =one;
	  document.getElementById("titleplan").value =one;
	 document.getElementById("title_value").innerHTML = two;
	    document.getElementById("price").value =two;
			 $('html, body').animate({
        scrollTop: $("#showpartIdd").offset().top
    }, 2000);
	  
}
</script>
<script>
function myFunction1() {
 var value = document.getElementById("showpartId");
    if (value.style.display === "block") {
        value.style.display = "none";
    }
    if (value.style.display === "none") {
        value.style.display = "block";
    } else {
        value.style.display = "none";
    }
    var x = document.getElementById("title1").value;
	var parts = x.split(',');
    var one = parts[0];
    var two = parts[1];
	//alert(two);
       document.getElementById("title_show").innerHTML =one;
	  document.getElementById("titleplan").value =one;
	 document.getElementById("title_value").innerHTML = two;
	    document.getElementById("price").value =two;
		 $('html, body').animate({
    scrollTop: $("#showpartIdd").offset().top
	}, 2000);
	  
}
</script>
<script>
function myFunction2() {
 var value = document.getElementById("showpartId");
    if (value.style.display === "block") {
        value.style.display = "none";
    }
    if (value.style.display === "none") {
        value.style.display = "block";
    } else {
        value.style.display = "none";
    }
    var x = document.getElementById("title2").value;
	var parts = x.split(',');
    var one = parts[0];
    var two = parts[1];
	//alert(two);
       document.getElementById("title_show").innerHTML =one;
	  document.getElementById("titleplan").value =one;
	 document.getElementById("title_value").innerHTML = two;
	    document.getElementById("price").value =two;
			 $('html, body').animate({
 scrollTop: $("#showpartIdd").offset().top    }, 2000);
	  
	  
}
</script>
<script>
function myFunction3() {
 var value = document.getElementById("showpartId");
    if (value.style.display === "block") {
        value.style.display = "none";
    }
    if (value.style.display === "none") {
        value.style.display = "block";
    } else {
        value.style.display = "none";
    }
    var x = document.getElementById("title3").value;
	var parts = x.split(',');
    var one = parts[0];
    var two = parts[1];
	//alert(two);
       document.getElementById("title_show").innerHTML =one;
	  document.getElementById("titleplan").value =one;
	 document.getElementById("title_value").innerHTML = two;
	    document.getElementById("price").value =two;
			 $('html, body').animate({
 scrollTop: $("#showpartIdd").offset().top
    }, 2000);
	  
	  
}
</script>
<script>
function myFunction4() {
 var value = document.getElementById("showpartId");
    if (value.style.display === "block") {
        value.style.display = "none";
    }
    if (value.style.display === "none") {
        value.style.display = "block";
    } else {
        value.style.display = "none";
    }
    var x = document.getElementById("title4").value;
	var parts = x.split(',');
    var one = parts[0];
    var two = parts[1];
	//alert(two);
       document.getElementById("title_show").innerHTML =one;
	  document.getElementById("titleplan").value =one;
	 document.getElementById("title_value").innerHTML = two;
	    document.getElementById("price").value =two;
			 $('html, body').animate({
 scrollTop: $("#showpartIdd").offset().top
 }, 2000);
	  
	  
}
</script>
<script>
function myFunction5() {
 var value = document.getElementById("showpartId");
    if (value.style.display === "block") {
        value.style.display = "none";
    }
    if (value.style.display === "none") {
        value.style.display = "block";
    } else {
        value.style.display = "none";
    }
    var x = document.getElementById("title5").value;
	var parts = x.split(',');
    var one = parts[0];
    var two = parts[1];
	//alert(two);
       document.getElementById("title_show").innerHTML =one;
	  document.getElementById("titleplan").value =one;
	 document.getElementById("title_value").innerHTML = two;
	    document.getElementById("price").value =two;
			 $('html, body').animate({
  scrollTop: $("#showpartIdd").offset().top
  }, 2000);
	  
	  
}
</script>

<?php include("footermain.php"); ?>
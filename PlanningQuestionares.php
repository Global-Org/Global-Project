<?php

 include("header.php"); 
 include("connection.php"); 
 $show=0;
 
 if(!isset($_SESSION['uid']) && !isset($_SESSION['userid'])){
	 ?>
	 <script>
	 window.location.href="login.php";
	 </script>
	 <?php
 }
 if(isset($_POST["name"])){
	 
	 $name=$_POST["name"];
	 $surename=$_POST["surename"];
	 $password=$_POST["pass"];
	 $email=$_POST["email"];
	 $uid=$_SESSION['uid'];
  	 $query="Update `user_profile` set `name`='$name',`surename`='$surename', `email`='$email', `password`='$password' where `id`='$uid'";
	
	if(mysqli_query($connection,$query)){
		$show=1;
	 }else{
		 $show=2;
	 } 
 }

 ?>

<!-- Content -->
 <script>
  $(document).ready(function(){
    setTimeout(function() {
    $('#suc,#fail').fadeOut('fast');
     }, 1000);
});

function saveAnswer(value){
	
	var answer1=$("input[name='"+value+"']:checked").val();

	var answer2=$("#"+value).val();
	var answer="";
	
	//check if an answer is from a radio button or from a text field 
    if(answer1){
		answer=answer1;
	}
	if( $('#'+value).is('input:text') ){
		answer=answer2;
	}
	var vals="questionid="+value+"&answer="+answer;
	
	//Send Answer to save it to DB
$.ajax({
    type: "POST",
    url: "addPlanningAnswer.php",
    data:vals,
    success: function(response) {   
         //alert(response);
    }
});
}

</script>
	

<!-- SECTION CONTACT -->

<form action="profile-settings.php" method="post">
<div class="bgwhite">
	<div class="container sspacing-title-button">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
<?php 

if($show==1){
	
              $smsg = '<div class="alert alert-success" id="suc">Profile Updated Successfully !</div>';
			  echo $smsg;
			  ?>
			  <a href="profile.php"> Click here </a> to go to your profile.<br>
			  <?php
        }
	if($show==2) {
              $smsg = '<div class="alert alert-danger" id="fail">Failed to Update Profile. Try Again !</div>';
			  echo $smsg;
        }
		?>
				<p class="size30 ml10 mb10 cdark pb20">Planing Questionare</p>
			
			
			
	<?php 
	$uid=$_SESSION['uid'];
    $getprofile="select * from `user_profile` where `id`='$uid'";
	$resultprofile=mysqli_query($connection,$getprofile);
	$rowprofile=mysqli_fetch_array($resultprofile);
	
?>	

<?php
/*
1.Getting supplier questions from database and showing 
2.Getting Answers and saving those to database
*/

$queryGetQuestions='select * from `supplier_questions`';
$resultQuestions=mysqli_query($connection,$queryGetQuestions);




?>


<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th colspan="2">Questionare</th>
      <th colspan="2">Answer</th>
    </tr>
  </thead>
  <tbody>
  
  <?php 
  $count=0;
  while($rowQuestion=mysqli_fetch_array($resultQuestions)){
	  $count++;
	  
	  // check if question's answer will be an input text field
	  if($rowQuestion['type']=='insert'){
  ?>
  
  
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td colspan="2"><?php echo $rowQuestion['question']; ?></td>
      <td colspan="2"><input onblur="saveAnswer(this.id)" type="text" id="<?php echo $rowQuestion['question_id']; ?>" name="<?php echo $rowQuestion['question_id']; ?>" Placeholder="Answer"><br></td>
    </tr>
	
	  <?php 
	  }
	  //check if answer will be a choice than
	  if($rowQuestion['type']=='choice'){
	  ?>
	  
	<tr>
      <th scope="row"><?php echo $count; ?></th>
      <td colspan="2"><?php echo $rowQuestion['question']; ?></td>
	  
	  <?php  if($rowQuestion['choice1']!='' ){
	  ?>
      <td><input type="radio" onblur="saveAnswer(this.id)" id="<?php echo $rowQuestion['question_id']; ?>" name="<?php echo $rowQuestion['question_id']; ?>" value="<?php echo $rowQuestion['choice1']; ?>"> <?php echo $rowQuestion['choice1']; ?><br></td>
	  <?php
	  }  if($rowQuestion['choice2']!=''){
	  ?>
      <td><input type="radio" onblur="saveAnswer(this.id)" id="<?php echo $rowQuestion['question_id']; ?>" name="<?php echo $rowQuestion['question_id']; ?>" value="<?php echo $rowQuestion['choice2']; ?>"> <?php echo $rowQuestion['choice2']; ?><br></td>
	  <?php 
	  } 
	  if($rowQuestion['choice3']!=''){
	  ?>
      <td><input type="radio" onblur="saveAnswer(this.id)" id="<?php echo $rowQuestion['question_id']; ?>" name="<?php echo $rowQuestion['question_id']; ?>" value="<?php echo $rowQuestion['choice3']; ?>"> <?php echo $rowQuestion['choice3']; ?><br></td>
	  <?php 
	  } if($rowQuestion['choice4']!=''){
	  ?>
      <td><input type="radio" onblur="saveAnswer(this.id)" id="<?php echo $rowQuestion['question_id']; ?>" name="<?php echo $rowQuestion['question_id']; ?>" value="<?php echo $rowQuestion['choice4']; ?>"> <?php echo $rowQuestion['choice4']; ?><br></td>
	  <?php 
	  } ?>
    </tr>
	
	<?php 
	  }
  } ?>
	
	
  </tbody>
</table>
            
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</div>
</form>
<!-- END OF CONTACT -->
</div>

<?php include("footermain.php"); ?>
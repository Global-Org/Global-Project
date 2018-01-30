<?php session_start();
include("connection.php"); 
$questionid= $_POST['questionid'];
$answer= $_POST['answer'];
if(isset($_SESSION['uid'])){
$userid=$_SESSION['uid'];
}else{
$userid=$_SESSION['userid'];
}

//Add answer of a supplier in supplier_question_answer

$addAnswer="INSERT INTO `supplier_questions_answers`(`question_id`, `user_id`, `answer`) VALUES ('$questionid','$userid','$answer')";
if(mysqli_query($connection,$addAnswer)){

}else{
//If its not adding record means a question is already answered by the same user so we can just update the answer

$updateAnswer="update `supplier_questions_answers` set `answer`='$answer' where `question_id`='$questionid' and `user_id`='$userid'";
mysqli_query($connection,$updateAnswer);
}


?>
<?php session_start();
include_once 'connection.php';
?>
 
  
<div>
<?php
  $sender=$_SESSION['uid'];
  $reciever=$_SESSION['artistchat'];
   // Simple selecting data from chatapp database
  $query = "SELECT sender,msg, date FROM chatapp where sender='$sender' or reciever='$sender' order by `date` Asc";
  $result =(mysqli_query($con, $query));
   ?>
  
   <ul>
   <?php
  while($row = mysqli_fetch_array($result))
  {
	  if($row['sender']==$sender){
			  ?>                      
	             <li class="sent">
					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
					 <p><?php echo $row['msg']; ?></br></br><?php echo $row['date']; ?></p></br>
				</li>
				
	
<?php }
	$reciever=$_SESSION['artistchat'];
	if($row['sender']==$reciever)
	  {
		  ?>
	  
	             <li class="replies">
					<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
					<p><?php echo $row['msg']; ?></br></br><?php echo $row['date']; ?></p></br>
				</li>
	                            
     <?php
   }
  }?>
  </ul>
   <br>
<br>
       
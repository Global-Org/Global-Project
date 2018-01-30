<?php session_start();
$show=0;
 include("header.php"); 
 include("connection.php");
 if(isset($_POST['submit'])){
 
 
 
	 if(!isset($_SESSION['uid'])){
	?>
	<script>
	alert("To Upgrade Membership you have to login first..");
	window.location.href="login.php";
	</script>
	<?php
}
else
{	 
    $price =$_POST['price'];
    $paymentprice = str_replace('$','',$price);
     $paymentprice;
	 $uid=$_SESSION['uid'];

		  $querya="select * from `user_account` where `user_id`='$uid'";
	    $resulta	=mysqli_query($connection,$querya);
          $rowa =mysqli_fetch_array($resulta);
		  $accountbalance= $rowa['account_balance'];
		  
		  if($accountbalance < $paymentprice)
		  {
		  ?>
		  <script>
		  alert("Insufficient Balance Deposite Money First");
		  window.location.href="deposite.php?money=<?php echo $paymentprice; ?>";
		  </script>
		  <?php
		  }
		  else
		  {
		  
	 //$plan=$_GET['id'];
	
	
		// $paymentprice="100";
		 $price =$_POST['price'];
		   $plan =$_POST['titleplan'];
		    $_SESSION['membership']=$plan;

		 $title="Debit for membership upgradation to <b>".$plan." with price  $ ".$paymentprice."</b>";
		 	 $startdate=date("Y-m-d H:i:s");
		 $paymentdate=$startdate;
		 $paymentstatus="Debit";
		 
		  $queryaccount="select * from `user_account` where `user_id`='$uid'";
	    $resultaccount	=mysqli_query($connection,$queryaccount);
          $rowaccount =mysqli_fetch_array($resultaccount);
		  $accountId= $rowaccount['account_id'];
	 
	 $querycheck="select * from `user_membership` where `userid`='$uid'";
	 $resultcheck=mysqli_query($connection,$querycheck);
	 if(mysqli_num_rows($resultcheck)>0){
		  
		 $rowcheck=mysqli_fetch_array($resultcheck);
		 $memid=$rowcheck[0];
		 $updatemembership="update `user_membership` set `membership_type`='$plan',`startingdate`='$startdate' where `userid`=$uid";
		 $addpayments="INSERT INTO `account_transactions`(`user_id`, `account_id`, `transaction_title`, `transaction_amount`, `transaction_status`, `transaction_currency`, `transaction_date`, `confirmation_date`) VALUES ('$uid','$accountId','$title','$paymentprice','$paymentstatus','USD','$paymentdate','$paymentdate')";
		
		
		 if(mysqli_query($connection,$updatemembership) && mysqli_query($connection,$addpayments)){
			 //////////////////////////Update Balance in User Account  ////////////////////////
			 $sql = "SELECT * FROM `user_account` WHERE user_id ='$uid'";
			$result=mysqli_query($connection,$sql);
				$nr =	mysqli_num_rows($result);
				if($nr > 0)
				{
					$row = mysqli_fetch_array($result);
					$accountbalance = $row['account_balance'];
					$updateBalance = $accountbalance-$paymentprice;
					
			  $query="UPDATE `user_account` SET `account_balance`='$updateBalance' WHERE user_id='$uid'";
	          $stmt = $connection->prepare($query);
					if($stmt === false) {
						trigger_error('Wrong SQL: ' . $query . ' Error: ' . $connection->error, E_USER_ERROR);
					}
					if($stmt->execute())
					{
					$show=1;
					$_SESSION['show1']=$show;
					?>
					<script>
					window.location.href="upgrade-membership.php?membership=<?php echo $plan; ?>";
					</script>
					<?php
				}
				}
		
	
		 
		 	 /////////////////////////////End Balance Updation ///////////////////////////
	
		 }else{
			 $show=2;
			 	$_SESSION['show1']=$show;
				
		 }
		 
	 }else{
		
		 $startdate=date("Y-m-d H:i:s");
		 $addmembership="INSERT INTO `user_membership`(`memid`, `userid`, `membership_type`, `startingdate`) VALUES (NULL,'$uid','$plan','$startdate')";
	
          $addpayments="INSERT INTO `account_transactions`(`user_id`, `account_id`, `transaction_title`, `transaction_amount`, `transaction_status`, `transaction_currency`, `transaction_date`, `confirmation_date`) VALUES ('$uid','$accountId','$title','$paymentprice','$paymentstatus','USD','$paymentdate','$paymentdate')";
		  
		if(mysqli_query($connection,$addmembership) && mysqli_query($connection,$addpayments)){
			 //////////////////////////Update Balance in User Account  ////////////////////////
			 $sql = "SELECT * FROM `user_account` WHERE user_id ='$uid'";
			$result=mysqli_query($connection,$sql);
				$nr =	mysqli_num_rows($result);
				if($nr > 0)
				{
					$row = mysqli_fetch_array($result);
					$accountbalance = $row['account_balance'];
					$updateBalance = $accountbalance-$paymentprice;
					
			  $query="UPDATE `user_account` SET `account_balance`='$updateBalance' WHERE user_id='$uid'";
	          $stmt = $connection->prepare($query);
					if($stmt === false) {
						trigger_error('Wrong SQL: ' . $query . ' Error: ' . $connection->error, E_USER_ERROR);
					}
					if($stmt->execute())
					{
					$show=1;
						$_SESSION['show1']=$show;
				
					?>
					<script>
					window.location.href="upgrade-membership.php?membership=<?php echo $plan; ?>";
					</script>
					<?php
					}
					
				}
		
	
		 
		 	 /////////////////////////////End Balance Updation ///////////////////////////
			 
		 }else{
			 $show=2;
			 	$_SESSION['show1']=$show;
				
		 }
	 }
 }
 }
 }

 ?>
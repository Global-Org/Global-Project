<?php
session_start();
include("connection.php");
 $id =$_GET['id'];
if($id =="Success")
{

  $currency =$_SESSION['CurrencyCode'];
  $toCurrency ="USD";
$datetimenow=date("Y-m-d h:i:sa");
      $userId= $_SESSION["uid"];
	
	  $balance =$_SESSION['itemprice'];
  ///////////////////////////Currency Conversion /////////////////////////////
   include("convertedCurrency.php");
		 $from_currency = trim($currency);
		 $to_currency = trim($toCurrency);
		 $amount = trim($balance);	
		if($from_currency == $to_currency) {
	 
	}
	   $converted_currency=currencyConverter($from_currency, $to_currency, $amount);

  $converted_amount =$_SESSION['converted_amount'];
	// Print outout
 ///////////////////////////End Conversion ///////////////////////////////////
 
	 $sql = "SELECT * FROM `user_account` WHERE user_id ='$userId'";
	$result=mysqli_query($connection,$sql);
	   $nr =	mysqli_num_rows($result);
	 if($nr > 0)
	 {
	    $row = mysqli_fetch_array($result);
		$accountbalance = $row['account_balance'];
		$accountId = $row['account_id'];
		$updateBalance = $accountbalance + $converted_amount ;
	 $query="UPDATE `user_account` SET `user_id`='$userId',`account_balance`='$updateBalance',`account_currency`='$toCurrency' WHERE account_id ='$accountId'";
	     $stmt = $connection->prepare($query);
					if($stmt === false) {    
						trigger_error('Wrong SQL: ' . $query . ' Error: ' . $connection->error, E_USER_ERROR);
					}
	
		 
		 if($stmt->execute())
			{  
			$paymentstatus="Credit";
			////////////////////////////Transaction Creation ///////////
			if($currency =="USD")
			{
			$title="Credit Into Your account <b> $".$balance." </b>";
		   }
		   else
		   {
		 	$title="Credit Into Your account <b> Currency Conversion From  ".$balance ." ".$currency." To ".$converted_amount." USD </b>";
		  
		   }
	$addpayments="INSERT INTO `account_transactions`(`user_id`, `account_id`, `transaction_title`, `transaction_amount`, `transaction_status`, `transaction_currency`, `transaction_date`, `confirmation_date`) VALUES ('$userId','$accountId','$title','$converted_amount','$paymentstatus','USD','$datetimenow','$datetimenow')";
		       mysqli_query($connection,$addpayments);
		
			////////////////////////////////End transactions//////////////////
			
		?>
		<script>
		alert("Update Balance of Your Account");
		window.location.href="profile.php";
	
		</script>
	    <?php
		}
	 
	 }
	 else
	 {
 $sql="INSERT INTO `user_account`(`user_id`, `account_balance`, `account_currency`, `creation_date`) VALUES ($userId,'$converted_amount','$toCurrency','$datetimenow')";
	  $stmt = $connection->prepare($sql);
					if($stmt === false) {
						trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
					}
	
		 
		 if($stmt->execute())
			{  
				$paymentstatus="Credit";
			////////////////////////////Transaction Creation ///////////
			$sql = "SELECT * FROM `user_account` WHERE user_id ='$userId'";
			$result=mysqli_query($connection,$sql);
			$row = mysqli_fetch_array($result);
			$accountId = $row['account_id'];
			if($currency =="USD")
			{
			$title="Credit Into Your account <b> $".$balance." </b>";
		   }
		   else
		   {
		 	$title="Credit Into Your account <b> Currency Conversion From  ".$balance ." ".$currency." To ".$converted_amount." USD </b>";
		  
		   }
			  $addpayments="INSERT INTO `account_transactions`(`user_id`, `account_id`, `transaction_title`, `transaction_amount`, `transaction_status`, `transaction_currency`, `transaction_date`, `confirmation_date`) VALUES ('$userId','$accountId','$title','$converted_amount','$paymentstatus','USD','$datetimenow','$datetimenow')";
		       mysqli_query($connection,$addpayments);
		
			////////////////////////////////End transactions//////////////////
			
		?>
		<script>
		alert("Balance Deposited to Your Account");
		window.location.href="profile.php";
	
			
		</script>
	    <?php
		}
		else
		{
		?>
		<script>
		alert("Error in Payment Deposite");
		window.location.href="profile.php";
		
		</script>
	    <?php
		
		}
	 }
	
}
else
{
?>
		<script>
		alert("Payment Deposited Not successful");
	window.location.href="profile.php";
	
		</script>
	    <?php
	

}
?>
<?php
include('../config.php');
$shoppingsql="SELECT * from shoppingmaster where sessionid='".session_id()."'";
$countresult=mysqli_query($conn,$shoppingsql);
$totalitam=mysqli_num_rows($countresult);
$amtsql="SELECT shoppingmaster.*,productmaster.productname,productmaster.rate,productmaster.imagename FROM shoppingmaster INNER JOIN productmaster ON shoppingmaster.productid = productmaster.productid where shoppingmaster.sessionid='".session_id()."'";
$fnamt=0;
$amtresult=mysqli_query($conn,$amtsql);if(mysqli_num_rows($amtresult)!=0){
	$fnamt=0;
	while($fproduct=mysqli_fetch_array($amtresult)){
		$famt=0;
		$p=$fproduct["rate"]*0.8;
		$famt=round($fproduct["quantity"] * $p);
		$fnamt = $fnamt + $famt;
	}
}?>
	
		
		  
		    <?Php echo $totalitam;?> ITEMS <a href="view-shopping.php" title="Shopping Summary"><img src="images/cart_icon.gif" alt="" width="50" height="30">
		    </a>
	
	  
   






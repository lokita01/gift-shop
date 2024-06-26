<?php 

include('config.php');

include('include/header.php');
 

?>

<body>
  <br><br><br>
  <div id="loader">
<div class="loader-inner semi-circle-spin">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
    </div>
      <div class="text-center"><h1>Shopping summary</h1></div>
      
  <div class="product" style="width:50%;margin:0 auto;background-color: none;">



          <table border="0" cellpadding="5" cellspacing="0" class="table table-striped tbl" >
            <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;">
              <th>Sr No</th>
              <th>Image</th>
              <th>Product Name</th>
              <th>Rate</th>
              <th>Quantity</th>
              <th>Amount with 20%discount</th>
              <th>Delete</th>
			  <th></th>
                   
    </tr>
  <?Php 
 

			
			$productsql="SELECT shoppingmaster.*,productmaster.productname,productmaster.rate,productmaster.imagename FROM shoppingmaster INNER JOIN productmaster ON shoppingmaster.productid = productmaster.productid where shoppingmaster.sessionid='".session_id()."'";
			$productresult=mysqli_query($conn,$productsql);
      if(mysqli_num_rows($productresult)!=0){
				$pno=0;
				$namt=0;
				while($product=mysqli_fetch_array($productresult)){$pno++;
				$amt=0;
				$productRate=$product["rate"];
			 $discountRate=$productRate*0.8;
				$TotalAmount=round($product["quantity"] * $discountRate);
				$namt = $namt + $TotalAmount;
				?>
            <tr style bgcolor="#FFFFFF">
              <td><?Php echo $pno;?></td>
              <td><img src="product-master/<?Php echo $product["imagename"];?>" height="45" width="45" />
                </th>
              <td><?Php echo $product["productname"];?></td>
              <td><?Php echo $productRate;?></td>
              <td><?Php echo $product["quantity"];?></td>
              <td><?Php echo $namt;?></td>
             
              <td><a href="deletecartitem.php?rid=<?Php echo $product["shoppingid"];?>" title="Delete" class="btn btn-danger">Delete</a></td>
			  <td></td>
            </tr>
            <?Php }?>
            <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;">
              <th colspan="7" align="right">Total :- </th>
              <th><?Php echo $namt;?></th>
            </tr>
            <tr style="background-color:#CCC; color:#FFF;font-weight:bold;font-size:12px;">
              <th colspan="8"> <a href="checkout.php" style="color:#FFF;font-weight:bold;font-size:12px;text-transform:uppercase;" class="btn btn-success">Checkout</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="shopping-cancel.php" style="color:#FFF;font-weight:bold;font-size:12px;text-transform:uppercase;" class="btn btn-danger">Cancel</a></th>
            </tr>
            <?php }else{echo '<tr><th colspan="7">No Shopping Summary Found</th></tr>';}?>
          </table>
  
        <div class="bottom_prod_box_big"></div>
 </body>
</html>
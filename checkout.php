<script type="text/javascript">


function validateForm(){

  var phone = $('#mobile').val();

  var phcheck = /^[6789][0-9]{9}$/;

  if(phcheck.test(phone)){

       document.getElementById('ph_error').innerHTML = " valid";
       return true;
       
       }else{
           document.getElementById('ph_error').innerHTML = "* Phone is Invalid";
           return false;
           
       } 
}

</script>


<?php 

include('config.php');



include('include/header.php');


$msg='';
if(isset($_POST["btn_update"])){
  
  $ordersql="INSERT INTO ordermaster(orderdate,membername,address,email,mobileno,netamount)VALUES('".date("Y-m-d H:i:s")."','".$_POST["membername"]."','".$_POST["address"]."','".$_POST["email"]."','".$_POST["mobileno"]."','".$_POST["netamount"]."')";
  if(mysqli_query($conn,$ordersql)){
    $orderid=mysqli_insert_id($conn);
    
    $orderDsql="SELECT shoppingmaster.*,productmaster.productname,productmaster.rate,productmaster.imagename FROM shoppingmaster INNER JOIN productmaster ON shoppingmaster.productid = productmaster.productid where shoppingmaster.sessionid='".session_id()."'";
    $orderDresult=mysqli_query($conn,$orderDsql);
    while($order=mysqli_fetch_array($orderDresult)){
      $amt=0;
      $amt=round($order["quantity"] * $order["rate"]);
      $orderDetails="INSERT INTO orderdetails(productid,quantity,rate,amount,orderid)VALUES(".$order["productid"].",".$order["quantity"].",".$order["rate"].",".$amt.",".$orderid.")";

      mysqli_query($conn,$orderDetails);

      $prdId=$order["productid"];
      $sql="select quantity from productmaster where productid='$prdId'";
      $res=mysqli_query($conn,$sql);
      $result = mysqli_fetch_array($res);
      $updateQuantity = $result['quantity']-$order["quantity"];
      $update="UPDATE `productmaster` SET `quantity` = '$updateQuantity' WHERE `productmaster`.`productid` = '$prdId'";
      mysqli_query($conn,$update);

    }
    $Ssql="delete from shoppingmaster where sessionid='".session_id()."'";
    if(mysqli_query($conn,$Ssql))
    {
      header('location:bill.php?oid='.$orderid);
    }
      
  }else{
    echo mysql_error();
  }
}
?>


</head>
<body style="margin-top:100px;">

  
      <div class="text-center"><h1>Shopping summary</h1></div>
    
  <div class="product" style="width:50%;margin:0 auto;">


          <table border="0" cellpadding="5" cellspacing="0" class="table tbl table-striped" >
            <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;">
              <th>Sr No</th>
              <th>Image</th>
              <th>Product Name</th>
              <th>Rate</th>
              <th>Quantity</th>
              <th>Amount with 20%discount</th>
              <th>Delete</th>
                   
            
            </tr>
            <?Php
      
      $productsql="SELECT shoppingmaster.*,productmaster.productname,productmaster.rate,productmaster.imagename FROM shoppingmaster INNER JOIN productmaster ON shoppingmaster.productid = productmaster.productid where shoppingmaster.sessionid='".session_id()."'";
      $productresult=mysqli_query($conn,$productsql);if(mysqli_num_rows($productresult)!=0){
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
              <td><img src="product-master/<?Php echo $product['imagename'];?>" height="45" width="45" /></td>

              <td><?Php echo $product["productname"];?></td>
              <td><?Php echo $productRate?></td>
              <td><?Php echo $product["quantity"];?></td>
              <td><?Php echo $namt;?></td>
             
              <td><a href="deletecartitem.php?rid=<?Php echo $product['shoppingid'];?>" title="Delete" class="btn btn-danger">Delete</a></td>

            </tr>

            <?Php }?>
            <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;">
              <th colspan="6" align="right">Total :- </th>
              <th><?Php echo $namt?></th>
            </tr>
            
            <?php }else{echo '<tr><th colspan="7">No Shopping Summary Found</th></tr>';}?>
          </table>
       
      </div>
       <br>
        <br>
<form method="post" id ="myform" onSubmit="return validateForm()">
  <h3 class="text-center">Receivers Address</h3>

<?Php

  if(isset($_SESSION['fname'])){

    $fname=$_SESSION['fname'];
    $selectQuery="SELECT * from user where fname='$fname'";
    $query=mysqli_query($conn,$selectQuery);
    $row=mysqli_fetch_array($query);
    $_SESSION['user']=$row;
  }
  else {
    echo "<center>You are not registered.</center>";
  }

?>  
<div class="modal-content" style="width:500px;margin:0 auto;padding:10px;">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="membername" class="form-control input-group"  placeholder="Name" id="name" value="<?php echo $row['fname'];?>" required />

  </div>

  <div class="form-group">
    <label for="name">Address</label>
   <input type="text" name="address" class="form-control input-group" class="form-control" placeholder="Address" required/>

  </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input id="email" type="email" name="email" class="form-control input-group"  placeholder="you@gmail.com" value="<?php echo $row['email'];?>" required/>

  </div>

  <div class="form-group">
      <label for="mobile">Mobile</label>
      <input id="mobile" type="text" name="mobileno" max-width="10" class="form-control input-group"  placeholder="mobile" value="<?php echo $row['mobile'];?>" />
      <span id="ph_error"></span>
  </div>
  

  <div class="row">
  <div class="col-sm-6">
  
    <input type="submit" name="btn_update" value="Checkout" class="btn btn-lg btn-success" id="btnSubmit"/>
    
  </div> 
  <div class="col-sm-6">
    
    <input type="hidden" name="netamount" id="netamount" value="<?Php echo $namt;?>" />
                  &nbsp; <a href="shopping-cancel.php" align="center" class="btn btn-danger">Cancel</a>
    
  </div> 

  </div>
</div>
</form>
</div></div></div></body>
  <?Php include('include/footer.php');?>

</body>
</html>


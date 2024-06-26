
<?php include('config.php');

include('include/header.php');
?>
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

<body style="margin-top:50px;">


  <div class="row" style="width:100%;">
    
    <div class="col-md-8">
      <div class="text-center"><h1>Bill Summary</h1></div>
        <div class="product" style="width:90%;margin:0 auto;">
      
      <?php 

      if(isset($_GET["oid"]) && $_GET["oid"]!="" && is_numeric($_GET["oid"]))
        $orderid=mysqli_real_escape_string($conn,$_GET["oid"]);
      else
      $orderid=0;
      $ordersql="SELECT * from ordermaster where orderid=".$orderid."";
      $orderresult=mysqli_query($conn,$ordersql);

      if(mysqli_num_rows($orderresult)!=0){
          $order=mysqli_fetch_array($orderresult);
          ?>


          <table class="table">
            <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;">
              <th colspan="4">Bill</th>
            </tr>
            <tr>
              <th>Bill No:-</th>
              <td><?Php echo $order["orderid"];?></td>
              <th>Name:-</th>
              <td><?Php echo $order["membername"];?></td>
            </tr>
            <tr>
              <th>Bill Date:-</th>
              <td><?php echo date("d-m-Y",strtotime($order['orderdate']));?></td>
              <th>Address:-</th>
              <td><?Php echo $order["address"];?></td>
            </tr>
            <tr>
              <th>Email:-</th>
              <td><?php echo $order['email'];?></td>
              <th>Mobile No:-</th>
              <td><?Php echo $order["mobileno"];?></td>
            </tr>
           
          </table>
          <table class="table table-striped">
            <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;">
              <th>Sr No</th>
              <th>Image</th>
              <th>Product Name</th>
              <th>Rate</th>
              <th>Quantity</th>
              <th>Amount</th>
            </tr>
            <?Php 
      $productsql="SELECT orderdetails.*,productmaster.productname,productmaster.imagename FROM orderdetails INNER JOIN productmaster ON orderdetails.productid = productmaster.productid where orderdetails.orderid=".$_GET["oid"]."";
      $productresult=mysqli_query($conn,$productsql);if(mysqli_num_rows($productresult)!=0){
        $pno=0;
        $namt=0;
        while($product=mysqli_fetch_array($productresult)){$pno++;
        $amt=0;
        $a=$product["rate"]*0.8;
        $amt=round($product["quantity"] * $a);
        $namt = $namt + $amt;
        $shipCharges=$namt+150;
        ?>
            <tr style bgcolor="#FFFFFF">
              <td><?Php echo $pno;?></td>
              <td><img src="product-master/<?Php echo $product["imagename"];?>" height="45" width="45" />
                </td>
              <td><?Php echo $product["productname"];?></td>
              <td><?Php echo $a;?></td>
              <td><?Php echo $product["quantity"];?></td>
              <td><?Php echo $amt;?></td>
            </tr>
            <?Php }?>
            <tr style="background-color:#999; color:#FFF;font-weight:bold;font-size:12px;">
              <th colspan="5" align="right">Net Amount:- </th>
              <th><?Php echo $namt;?></th>
         
            </tr>
            <tr style="font-weight:bold;font-size:12px;">
      
              <th colspan="8"> <a href="#" style="font-weight:bold;font-size:12px;text-transform:uppercase;" onclick="window.print();" >Print</a></th>
        <tr><th colspan="10" width="12px"><?Php echo"<br/> Including Shipping Charges 150 &nbsp;&nbsp;&nbsp;",$shipCharges;?>  </th></tr>
            </tr>
            <?php $_SESSION['totAmount']=$shipCharges; ?>
            <?php }else{echo '<tr><th colspan="7">No Shopping Summary Found</th></tr>';}?>
          </table>
          <?php }else{echo '<h3> No Order Details Found...</h3>';}?>
        </div>
      </div>

      <div class="col-md-4">  
        
        <div class="modal-header"><h1>Buying Options</h1></div><br>

        <center><a href="notify.php" class="btn btn-info">Cash on delivery</a></center><br>

        <center><a href="pay.php" class="btn btn-success">Pay Now</a></center>
  
      
      </div>
    </div>

      
    
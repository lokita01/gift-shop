<?php 
include("config.php");
include('header.php');
$msg='';

$user = $_SESSION['id'];

	$versql="select * from cart where userID='$user'";
	$res=mysqli_query($conn,$versql);
  $result=mysqli_fetch_array($res);
  $productID=$result['productid'];
  $productQuantity = $_POST['quantity'];

  if(isset($_POST['btnSubmit'])){

    $sql="INSERT INTO shoppingmaster (productid,quantity,sessionid) VALUES('$productID','$productQuantity','$user')";
    if(mysqli_query($conn,$sql)){
      header('location:checkout.php');
    }else{
      echo mysql_error();
    }
  }
	

?>
    <?Php 

    include('include/header.php');?><br><br><br>
    <div id="loader">
<div class="loader-inner semi-circle-spin">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
    </div>
<div id="container">

    <div class="row">

        <div class="col-md-4">
          <div class="left">
              <?php include('include/leftbar.php');?>
          </div>



        </div>
        
        <div class="col-md-8">

          <div class="product">

      <?Php if(isset($productID) && $productID!="" && is_numeric($productID))
      {
        $productsql="SELECT * FROM productmaster where productid=".$productID."";
        $productresult=mysqli_query($conn,$productsql);
        $product=mysqli_fetch_array($productresult);?>
      
            <div class="card mb-3">
              <div class="row no-gutters">
              <div class="col-md-4">
                <img src="product-master/<?Php echo $product["imagename"];?>" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body cardbody2">
                  <h5 class="card-title">Name:<?Php echo $product["productname"];?></h5>
                  <p class="card-text"> Description: <?Php echo $product["description"];?></p>
                  <p class="card-text"> Rate: Rs. <?Php $a=$product["rate"];$p=$a*0.8;echo $a?></p>
                  <p class="card-text"> Discount: <?php echo $p?></p>
                  
                  <form name="frm" action="#" method="post" class="form-group">
                    <div class="form-group">
                        <label for="quantity"><strong>Quantity:</strong></label>
                        <select name="quantity" id="quantity" class="form-control">
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                          </select>
                        </div>
                        <div class="form_row">
                          <input type="hidden" name="productid"  value="<?Php echo $product["productid"];?>" />
                          <i class="fa fa-cart"></i><input type="submit" name="btnSubmit" id="btnSubmit" value="BUY" class="btn btn-success"/>
                        </div>

                          <p><?Php echo $msg;?></p>
                      </form>
                    </div>
                  </div>
                  <?php }
                  else {
                    echo "Product not found";
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php include('include/footer.php'); ?>
</body>
</html>
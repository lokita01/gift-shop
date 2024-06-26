<?Php 
include("config.php");

include('include/header.php'); 
?>
<div id="loader" style="z-index:2;">
<div class="loader-inner semi-circle-spin">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
    </div>  
<br><br><br>
<?php 


$msg='';
if(isset($_POST["btnSubmit"])){
	$versql="select * from shoppingmaster where productid=".$_POST["productid"]." AND sessionid='".session_id()."'";
	$res=mysqli_query($conn,$versql);
	if(mysqli_num_rows($res)!=0){
		$msg="You have already buy this product please update quantity";
	}else{
		$sql="INSERT INTO shoppingmaster(productid,quantity,sessionid)VALUES('".$_POST["productid"]."',".$_POST["quantity"].",'".session_id()."')";
		if(mysqli_query($conn,$sql)){
			header('location:view-shopping.php');
		}else{
			echo mysql_error();
		}
	}
}

?>

<body>


<div id="container">

    <div class="row">

        <div class="col-md-4">
          <div class="left">
              <?php include('include/leftbar.php');?>
          </div>



        </div>
        
        <div class="col-md-8">

          <div class="product">

      <?Php if(isset($_GET["pid"]) && $_GET["pid"]!="" && is_numeric($_GET["pid"]))
      {
        $productsql="SELECT * FROM productmaster where productid=".$_GET["pid"]."";
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
                          <i class="fas fa-cart"></i><input type="submit" name="btnSubmit" id="btnSubmit" value="Add To Cart" class="btn btn-success"/>
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
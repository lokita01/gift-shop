<div id="loader">
<div class="loader-inner line-scale">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
    </div>

<?php
	include('config.php');

	include('include/header.php');  
	
?>
<body>
	

<section class="img_text" style="position: absolute;">
	<div class="card-body" style="color:red;
		font-weight: bold;
		font-size: 30px;
		margin:60px;

	">Get the best products to gift your loved ones! <br>
	<button class="btn btn-info" style="font-size: 20px;" data-toggle="product" data-target="#main">
	Call to Explore: 1800978764</button>
	

</div>

</section>  	
<div class="image-section">
  
  <img src="images/cover-image.jpg" alt="cover-image">

</div>
<br />
<div class="row" >
	<div class="col-md-2">
		<div class="left">
       	 	<?php include('include/leftbar.php');?>
		</div>


	</div>
	

	<div class="col-md-10">
		
	<div class="product" border="1px">
      <div class="text-bold text-center"><h1>Products</h1></div><br>
		<?php
		  if(isset($_GET["cid"]) && $_GET["cid"]!="" && is_numeric($_GET["cid"])){
			  $productsql="SELECT * FROM productmaster where categoryid=".$_GET["cid"]." ORDER BY productid ASC";
			  	  $productresult=mysqli_query($conn,$productsql);

			}else{
				  $productsql="SELECT * FROM productmaster ORDER BY productid ASC";
				  	  $productresult=mysqli_query($conn,$productsql);

		  }
		  if(mysqli_num_rows($productresult)!=0)
		  {
			  $pno=0;
			  while($product=mysqli_fetch_array($productresult))
			  {
				  $pno++;
				?>
		  
	      <div class="row">
			
		  	<div class="col-md-3">
			  	<div class="card" style="width: 12rem;">
			  		<a href="product-details.php?pid=<?Php echo $product["productid"];?>"><img src="product-master/<?Php echo $product["imagename"];?>" width="190" height="150"/></a>
					  	<div class="card-body">
					    <h5 class="card-title"><?php echo $product['productname'];?></h5>
					    <span style="font-weight:bold;">Rate: Rs. <?php echo $product['rate'];?></span>
					    <h6 class="card-subtitle mb-2 text-muted">
								<?php 
								$disc=$product['rate']*0.8;
								echo "Discount:".$disc;
								;?>
						<?php if($product['quantity']>0){

						?>

						<h5 class="text-success">In Stock</h5>
				
						<?php }else {
						
							echo "<h5 class='text-danger'>Out of Stock</h5>";
						}			
							?>
								</h6>
					    
					    <p class="card-text"></p>
					    <a href="product-details.php?pid=<?Php echo $product['productid'];?>" class="btn btn-primary">Buy</a>

					    <a href="product-details.php?pid=<?Php echo $product['productid'];?>" class="prod_details btn btn-success" >Cart</a>

			  		</div>
		  		</div>
		  	</div>
		</div>
		<?php  }
			}
		?>

	</div>




	</div>
</div>
	<?php include 'include/footer.php';?>

</body>
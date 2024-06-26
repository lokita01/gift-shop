<?php include('config.php');

include('include/header.php');
?>


<body style="margin-top:50px;">


  <div class="row" style="width:100%;">
    
    <div class="col-md-8">
      <div class="text-center"><h1>My orders</h1></div>
        <div class="product" style="width:90%;margin:0 auto;">
			<table class="table">
				<thead>
					<th>Order ID</th>
					<th>Product Name</th>
					<th>Price</th>
				</thead>
				<tbody>
					
					<?php

					$name=$_SESSION['fname'];

						$query="select orderid from ordermaster where membername='$name'";
						$result=mysqli_query($conn,$query);
						
						while($row=mysqli_fetch_array($result)){
							$data['order']=$row['orderid'];

							$query2="select productid from orderdetails where orderid='$data[order]";
							$result=mysqli_query($conn,$query2);
							$data=mysqli_fetch_array($result);
							print_r($data);


						}



					?>


					
				</tbody>


			</table>


      </div>
  </div>
</div>
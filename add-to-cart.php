<?php 
include("config.php");
$user=$_SESSION['id'];
if(isset($_GET["pid"]) && $_GET["pid"]!="" && is_numeric($_GET["pid"]))
{

  $productsql="SELECT * FROM productmaster where productid=".$_GET["pid"]."";
  $productresult=mysqli_query($conn,$productsql);
  $product=mysqli_fetch_array($productresult);

  $category=$product['categoryid'];
  $description=$product['description'];
  $imagename=$product['imagename'];
  $productid=$product['productid'];
  $productname=$product['productname'];
  $rate=$product['rate'];

  $sql="INSERT INTO cart (userID,categoryid,description,imagename,productid,productname,rate,quantity) VALUES('$user','$category','$description','$imagename','$productid','$productname','$rate')";
    if(mysqli_query($conn,$sql)){
      
    }else{
      echo mysqli_error();
    }
    
}

?>
      
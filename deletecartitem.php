<?Php include('config.php');
$sql="DELETE FROM shoppingmaster WHERE shoppingid=".$_GET["rid"]."";
if(mysqli_query($conn,$sql)){
	header('location:view-shopping.php');
}else{
	echo mysqli_error();
}?>
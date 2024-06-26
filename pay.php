<?php 
include('config.php');
include('include/header.php');
if(isset($_POST['payButton'])) {

if(isset($_POST['cardNo']) && isset($_POST['pay']))
  {
    $cardNo = $_POST['cardNo'];
    

    $query="INSERT INTO ordermaster(cardno) values('$cardNo')";
    $result=mysqli_query($conn,$query);
    if($result){

            header('Location:payment-portal.php');
    }
  }
else{
  echo "<script>alert('Please fill all fields');</script>";
}
} 
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
    <div class="pay" style="width:70%;margin:0 auto;">
        
        
      <div class="modal-header">
        <h1>Pay Using<br></h1></div>
        <form action="#" method="POST">
          <input type="radio" value="debit" name="pay">Debit Card<br>
          <input type="radio" value="credit" name="pay">Credit Card<br>
          <!-- <input type="radio" value="debit" name="pay">Cash on delivery<br> -->
          <div class="row">
            <div class="col-md-12">

              <label for="card-number">Card number</label>
              <input type="number" max-length="16" id="card" class="form-control input-group" style="width:400px;" name="cardNo">

            </div>
          </div>
          <div class="row">
            
            <div class="col-md-6">
              
              <label for="validity">Validity</label>
              <input type="number" id="validity" class="form-control input-group" style="width:180px;"><br>

            </div>

            <div class="col-md-6">

              <label for="cvv">CVV</label>
              <input type="number" id="cvv" class="form-control input-group" style="width:180px;"><br>
               
            </div>
            <input type="submit" value="Pay Now" class="btn btn-success" name="payButton">
          </div>    
      </form>
          </div>
      
      </div>

    </div>
    
   
  <?php include('include/footer.php');

  ?>
    
<?php 

    include('config.php');
    include('include/header.php');

?>
<div id="loader">
<div class="loader-inner semi-circle-spin">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
    </div>
    <div class="container">

        <br><br>
	<div class="page-header">
     <p class="lead">Payment gateway</p>
    </div>
	<h3 style="color:#6da552">Thank You, Payment success!</h3>
<?php
    
    echo "<h4>Purpose: " .$_SESSION['response']['purpose'] . "</h4>" ;
    
    echo "<h4>Buyer Name: " .$_SESSION['response']['buyer_name'] . "</h4>" ;
    echo "<h4>Buyer Email: " .$_SESSION['response']['email'] ."</h4>" ;
    echo "<h4>Buyer Phone: " . $_SESSION['response']['phone']. "</h4>" ;
    echo "<h4>Amount: " .$_SESSION['response']['amount'] . "</h4>" ;


   print_r($response);
echo "</pre>";

?>
</div> <!-- /container -->


<?php include('config.php');?>
<div id="main_container">
  <?Php 

  include('include/header.php');?>
  
  <div id="main_content">
  
  <div id="main_container">
 

      <?Php $sql="delete from shoppingmaster where sessionid='".session_id()."'";
      if(mysqli_query($conn,$sql)){?>
      <br><br><br>
      <p style="margin-left:120px;margin-top:50px;">Your shopping has been canceled. </p>
      <br />
      <p style="margin-left:120px;margin-top:50px;"><a href="index.php">Return to Home</a> </p>
      <?Php }?>
    </div>
      </div>
</body>
</html>
<?php 
include('config.php');
include('include/header.php');


$MSG='';

if(isset($_POST["btnSubmit"])){	
	$sql="SELECT * FROM user WHERE email='".$_POST["username"]."' AND password='".$_POST["password"]."'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)!=0){
		$row=mysqli_fetch_array($result);
		$_SESSION["id"]=$row["id"];
		$_SESSION["fname"]=$row["fname"];	
   
		  header('location:home.php');		
	}else{
	   echo "<script>alert('Invalid Username and Password');</script>";
	}
}?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Panel :Login</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />


<style>
  body{
    background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
  }
.modal-dialog {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.modal-dialog:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}


</style>
</head>
<body><br><br><br>
<div id="loader" style="z-index:2;">
<div class="loader-inner semi-circle-spin">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
    </div>
    <form method="POST">
                
                  <?Php if(isset($MSG)){echo $MSG;}?>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4>User Login</h4>


          </div>
          
          <div class="modal-body">
            <div class="form-group">
              <label for="username">User Name</label>
              <input type="text" name="username" id="username" class="input-group form-control" AUTOCOMPLETE="off" tabindex="1"> 
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="input-group form-control">  
            </div>
          
              <input type="submit" name="btnSubmit" value="Submit" class="btn btn-success">
              <a href="forgot-password.php" class="btn btn-info">Forgot Password</a>
          </div>
         </div>
       </div>
   
      </form>
 
</body>
</html>

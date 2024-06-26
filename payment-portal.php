

<?php

	include('config.php');
	include('include/header.php');


?>

<script>

function validForm(){

	var name = document.getElementById('name').value;
	var phone = document.getElementById('phone').value;
	var email = document.getElementById('email').value;
	
	var usercheck = /^[A-Za-z]{2,30}$/;
	var emailcheck = /^[A-Za-z0-9_.]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z.]{2,6}$/;
	var phcheck = /^\d{10}$/;;
	
	if(usercheck.test(name)){
	document.getElementById('name_error').innerHTML = " ";
	   
	}else{
		document.getElementById('name_error').innerHTML = "* Name is Invalid";
		return false;
		   
	}
	
	if(phcheck.test(phone)){
	document.getElementById('phone_error').innerHTML = " ";
	   
	}else{
		document.getElementById('phone_error').innerHTML = "* Phone is Invalid";
		return false;
		   
	}
	
	if(emailcheck.test(email)){
	document.getElementById('mail_error').innerHTML = " ";
	   
	}else{
		document.getElementById('mail_error').innerHTML = "* Mail is Invalid";
		return false;
		   
	}

}

</script>
<div id="loader">
<div class="loader-inner semi-circle-spin">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
    </div>
<br><br><br>
    <div class="container">
	<div class="page-header">
        <h1>Payment</h1>
		<form action="pay2.php" method="POST" accept-charset="utf-8" onSubmit="return validForm()">
			<input type="hidden" name="product_name" value="<?php echo $prd_name; ?>"> 
			<input type="hidden" name="product_price" value="<?php echo $prd_price; ?>"> 
			<div class="form-group">
			<label>Your Name</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
			<span id="name_error"></span>	 
			</div>
			<div class="form-group">
			<label>Your Phone</label>
			<input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your phone number"> 
			<span id="phone_error"></span>	 

			</div>
			<div class="form-group">
			<label>Your Email</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="Enter you email"> 
			<span id="mail_error"></span>	 

			</div>
			<div class="form-group">
			<label>Amount</label>
			<input type="email" class="form-control" name="amount" Value="<?php echo $_SESSION['totAmount'];?> " readonly required>
			</div>
			<p><input type="submit" class="btn btn-success btn-lg" id="btnSubmit" value="Click here to Pay"></p>
		</form>
 
    
    </div> <!-- /container -->
		</div>

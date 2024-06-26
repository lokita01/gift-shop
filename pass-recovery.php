<?php 

    include('config.php');
    include('include/header.php');

?>
<script>

 function validate(){

    var pass=$('#password').val();
    var cpass=$('#cpassword').val();
    if(pass==cpass){
        return true;
    }
    else {
        $('#error').html('Passwords not matching');
        return false;
    }

 }



</script>
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
    <form method="POST" onSubmit="return validate()">
                
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4>Forgot-Password</h4>
        </div>
          
        <div class="modal-body">
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="input-group form-control" AUTOCOMPLETE="off" tabindex="1" required> 
            </div>

            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="cpassword" name="cpassword" id="cpassword" class="input-group form-control" AUTOCOMPLETE="off" tabindex="1" required> 
                <span id="error"></span>
            </div>

            <button type="submit" class="btn btn-primary">Reset password</button>

        </div>
        </div>
        <?php

            if(!empty($_POST["password"]))
            {
                $email=$_SESSION['email'];
            
                $password=$_POST['password'];

                $sql1 = "UPDATE `user` SET `password` = '$password' WHERE `email` = '$email'";
                $res=mysqli_query($conn, $sql1);
                $row=mysqli_fetch_array($res);
                    
            if($res)
            {
                $msg="Password reset Successfull";
                echo "<script>alert('$msg');</script>";
                header('location:login.php');
            }
            else {
                
                $msg="Error in password recovery";
                echo "<script>alert('$msg');</script>";

            }
        }
            ?>
            
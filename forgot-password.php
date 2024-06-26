<?php 

    include('config.php');
    include('include/header.php');

?>

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
                
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4>Forgot-Password</h4>
        </div>
          
        <div class="modal-body">
            <div class="form-group">
            <label for="username">Email ID</label>
            <input type="email" name="username" id="username" class="input-group form-control" AUTOCOMPLETE="off" tabindex="1" required><br> 
            <button type="submit" class="btn btn-primary">Verify Email</button>
            </div>
        </div>
        </div>
        <?php

            if(!empty($_POST["username"]))
            {
            $sql1 = "SELECT `email` FROM `user` WHERE `email`='$_POST[username]'";
                $res=mysqli_query($conn, $sql1);
                $row=mysqli_fetch_array($res);
                    
            if(!empty($row))
            {
                $_SESSION['email']=$row['email'];
                $msg="Mail Found";
                echo "<script>alert('$msg');</script>";
                header('location:pass-recovery.php');
            }
            else {
                
                $msg="Mail id not Exists";
                echo "<script>alert('$msg');</script>";

            }
        }
            ?>
            
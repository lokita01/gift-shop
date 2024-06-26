<?php
include('config.php');
include('include/header.php');


if(isset($_POST["submit"]))
{
    $fnam=$_POST['fname'];
    $lnam=$_POST['lname'];
   
   
    $mobile=$_POST['phone'];
    $email=$_POST['email'];
    $password = $_POST['password'];

if(!empty($fnam) && !empty($lnam) && !empty($mobile) && !empty($email) && !empty($password) )    
    {
        $q="INSERT INTO `user` (`fname`,`lname`, `mobile`, `email`, `password`) VALUES ('$fnam', '$lnam', '$mobile', '$email','$password')";
        if($result=mysqli_query($conn, $q))
        {
            echo "<script>alert('Great!You are registered');</script>";
           header("location:login.php");
        } 
        else{
            echo "<script>alert('oops you enterd some wrong details or check your email id is same as previous')</script>";
        }

    }
    else{
        echo "<script>alert('All fields required')</script>";
    }

}   
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
<div class="container" style="margin-top:100px;">
    <form onSubmit="return validate()" method="POST">
       	<div class="modal-dialog" >
       		<div class="modal-content" style="padding:10px;">
                <p class="text-center modal-header display-4">Register</p><br><br>
                <p>Note: All Fields are mandatory.</p>
       	    <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" > 
                    <span id="ferror" class="danger" font-weight="bold"></span>
                           
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname"  name="lname" class="form-control" placeholder="Last Name" >
                    <span id="lerror" class="danger" font-weight="bold"></span>
                </div>
            </div>
        </div>
        

        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label for="ph_id">Phone</label>
                    <input type="text" id="ph_id"  name="phone" class="form-control" placeholder="Phone"> 
                    <span id="pherror" class="danger" font-weight="bold"></span> 
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="em_id">Email</label>
                    <input type="email" id="em_id" name="email" class="form-control" placeholder="Email"> 
                    <span id="emerror" class="danger" font-weight="bold"></span> 
                </div>
            </div>
        </div>        

        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password"  name="password" class="form-control" placeholder="Password"> 
                    <span id="passerror" class="danger" font-weight="bold"></span> 
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="cpass">Confirm Password</label>
                    <input type="password" id="cpass" name="cpass" class="form-control" placeholder="Confirm Password"> 
                    <span id="cpasserror" class="danger" font-weight="bold"></span> 
                </div>
            </div>


        </div>                
              <input type="submit" class="btn btn-lg btn-success" name="submit" value="Submit"> 
        </div>
            
        </div>
            
        </div>
     </form>
 </div>   
                
</div>

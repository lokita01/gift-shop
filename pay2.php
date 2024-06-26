<?php 
    include('config.php');
    
     $purpose = "Payment";
    $amount = $_POST["amount"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $response = array(
        "purpose" => $purpose,
        "amount" => $amount,
        "buyer_name" => $name,
        "phone" => $phone,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => "thankyou.php",

        );
        $_SESSION['response']=$response;
        $pay_ulr = $response['redirect_url'];
        header("Location: $pay_ulr");


 ?>

   

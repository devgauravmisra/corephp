<?php
$razorpay_signature = "*****"; // signature received from successful transaction
$order_id  = "****8";
$razorpay_payment_id = "*****";
$secret = "*****";  // merchant secret key
$generated_signature = hash_hmac("sha256",$order_id."|".$razorpay_payment_id, $secret);  // gennerate signature
//echo $generated_signature;die('test');
  if ($generated_signature == $razorpay_signature) {
    echo"payment successful";
  }else{
  echo "Payment failed";
  }
  ?>

  
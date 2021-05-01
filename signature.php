<?php
$razorpay_signature = "5f8d8073b70c50d9b0e32b557ae216c13644617c81e0ac1cbd6107e84c9ad7da"; // signature received from successful transaction
$order_id  = "order_H53Ec49jILwMjA";
$razorpay_payment_id = "pay_H53F3Df1rOBm50";
$secret = "djTVxJ9hxMpspmmE1D9xUeL5";  // merchant secret key
$generated_signature = hash_hmac("sha256",$order_id."|".$razorpay_payment_id, $secret);  // gennerate signature
//echo $generated_signature;die('test');
  if ($generated_signature == $razorpay_signature) {
    echo"payment successful";
  }else{
  echo "Payment failed";
  }
  ?>

  
<!DOCTYPE html>
<html>
<head>
	<title>Payment Response</title>
</head>
<body style="backdrop-filter: blur(5px);text-align:center">

<h3 style="color:green;text-align:center">Payment Response</h3>
<?php

$responseData = $_REQUEST;

if($responseData['razorpay_payment_id'] == 	null){

    echo "Payment failed";
	
  }else{

    $razorpay_signature = $responseData['razorpay_signature'];
	$order_id  = $responseData['razorpay_order_id'];
	$razorpay_payment_id = $responseData['razorpay_payment_id'];
	$secret = "djTVxJ9hxMpspmmE1D9xUeL5";  // merchant secret key
	$generated_signature = hash_hmac("sha256",$order_id."|".$razorpay_payment_id, $secret);  

  if ($generated_signature == $razorpay_signature) {

   echo "Your Payment is successful";
   echo "<br>";
   echo "Payment id : ".$responseData['razorpay_payment_id'];
   echo "<br>";
   echo "Order id :  ".$responseData['razorpay_order_id'];
   echo "<br>";
   echo "Signature : ".$responseData['razorpay_signature'];
  
  }else{

  	echo "Signature varification failed.Payment failed!!!";
	
  }
}


?>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Create Order</title>
</head>
<body>
	 <form method="post" action="" >
	  <table>
	  	      <tr>
	  	      	  <td>Amount</td><td><input type="text" name="amount" placeholder="please enter amount" required="required"></td>
	  	      </tr>
	  	      <tr>
	  	      	  <td>Receipt</td><td><input type="text" name="rcpt" placeholder="please enter receipt" ></td>
	  	      </tr>
	  	       <tr>
	  	      	  <td><input type="submit" name="submit" value="Submit"></td>
	  	      </tr>

	  </table>
  </form>

</body>
</html>

<?php
if(isset($_POST['submit'])){
$amt = 	$_POST['amount'];
$amounts = $amt*100          // Need to convert amount into paise
$rcpt = $_POST['rcpt'];

$frmData  = array('amount' =>$amounts , 'receipt'=>$rcpt, 'currency'=>'INR');
$data = json_encode($frmData);
$api_key = "rzp_test_***";
$password = "***";
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/orders");
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $api_key.':'.$password);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: application/json', 'Content-Type: application/json')
);

$result = curl_exec($ch); 
$returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
//print_r($result);echo ('json');

$resp = json_decode($result, true);
//print_r($resp);die ('array');
        $data = $resp['id'];
       echo "Order id:". $data;
       echo "<br>";
       echo "Amount in paise:".$resp['amount'];
       
    }
}
?>
<?php
$data ='';
if(isset( $_POST['submit'] ) && $_POST['amount']!=''){
$amounts = $_POST['amount'];
$rcpt = $_POST['receipts'];
$amt = $amounts*100;

$data = array( "amount"=> $amt, "currency"=> "INR", "receipt"=> $rcpt); 
$data_string = json_encode($data);
$api_key = "rzp_test_mDSwnekBBSpC7F";
$password = "djTVxJ9hxMpspmmE1D9xUeL5";
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/orders");
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $api_key.':'.$password);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: application/json', 'Content-Type: application/json')
);

$result = curl_exec($ch); $returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE); curl_close($ch);
//print_r($result);echo ('json');

$resp = json_decode($result, true);
//print_r($resp);die ('array');
        $data = $resp['id'];
       
       
    }
        ?>

<!------Order creation---------------------------->
  <!DOCTYPE html>
<html>
<head>
	<title>Core PHP Integration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta
</head>
<body>
	<div style="width: 500;height:200; border: 2px solid silver;"> 
		<h3 align="center">Core PHP Integration</h3>
		<form method="post" action="">
		   <table>
		   	<th align="center">Create Order </th>
		   	<tr>
		   		 <td>Amount</td><td><input type="text" name="amount" placeholder="please enter amount" required="required">
		   	</tr>
		  <tr>
		   		 <td>Receipt</td><td><input type="text" name="receipts" placeholder="please enter receipt"></td>
		   	</tr> 
		   	  <tr>
		   		 <td>Currenccy</td><td><input type="text" name="currency" value="INR" readonly="readonly"></td>
		   	</tr> 
		   	<tr><?php 
		   	           if($data !="")
                    {
				   	           echo $data; }?>
                    </tr>
		   
		   	<tr><td></td><td><input type="submit" name="submit" value="Submit"></td><td></tr>
		   </table>

</form>
	</div>

</body>
</html>
<!--------------Order creation End------------------->
<!-------------- Checkout Started------------------------->

<!DOCTYPE html>
<html>
<head>
	<title>Core PHP Integration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta
</head>
<body>
	
<form action="charge.php" method="POST">
<script
		    src="https://checkout.razorpay.com/v1/checkout.js"
		    data-key="rzp_test_mDSwnekBBSpC7F"   
		    data-amount="100" 
		    data-currency="INR"
		    data-order_id = "<?php echo $data;?>"
		    data-buttontext="Pay with Razorpay"
		    data-name="Gaurav Shoping Center"
		    data-description="Test transaction"
		    data-image="website log url"
		    data-prefill.name="Gaurav"
		    data-prefill.email="gauravphpdev@gmail.com"
		    data-prefill.contact="9044789347"
		    data-theme.color="#F37254"
		    data-retry="false"
		    
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>
</body>
</html>
<!-------------- Checkout End------------------------->

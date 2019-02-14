<?php  
error_reporting(E_ALL);
ini_set('display_errors', 1);

$url = 'https://pay.skrill.com';
$parameters = array();

$parameters['pay_to_email'] = 'multicurrency2@payreto.com';
$parameters['recipient_description'] = 'Shop Receipient';
$parameters['transaction_id'] = '18112212019113201067705805121';
$parameters['return_url'] = 'http://dev.payreto.solutions:8088/skrill_simple/return.php';
$parameters['status_url'] = 'http://dev.payreto.solutions:8088/skrill_simple/status.php'; 
$parameters['status_url2'] = 'mailto:whibi9999@gmail.com';
$parameters['cancel_url'] = 'http://dev.payreto.solutions:8088/skrill_simple/cancel.php';
$parameters['language'] = 'IT';
$parameters['logo_url'] = 'https://www.skrill.com/fileadmin/content/images/brand_centre/Skrill_Logos/skrill-200x87_en.gif';
$parameters['prepare_only'] = 1;
$parameters['pay_from_email'] = 'pluginsales@payreto.eu'; 
$parameters['firstname'] = 'plugin';
$parameters['lastname'] = 'sales';
$parameters['address'] = 'Beuthener Straße 25';
$parameters['postal_code'] = '90471';
$parameters['city'] = 'Nürnberg';
$parameters['country'] = 'ITA';
$parameters['amount'] = 30.94;
$parameters['currency'] = 'EUR';
$parameters['detail1_description'] = 'Payment to:';
$parameters['detail1_text'] = 'Shop Receipient';
$parameters['detail2_description'] = 'Order amount:';
$parameters['detail2_text'] = '30.94 EUR';
$parameters['detail3_description'] = 'Shipping:';
$parameters['detail3_text'] = '0.00 EUR';
$parameters['merchant_fields'] = 'platform,developer';
$parameters['platform'] = '21445510';
$parameters['developer'] = 'Payreto';
$parameters['payment_methods'] = 'PCH';

$fields_string = http_build_query($parameters);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLINFO_HEADER_OUT, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/x-www-form-urlencoded;charset=UTF-8'));
curl_setopt($curl, CURLOPT_FAILONERROR, 1);
curl_setopt($curl, CURLOPT_POST, count($parameters));
curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);

$result = curl_exec($curl);
curl_close($curl);

$redirect_url = $url .'?sid='.$result;
// header('Location:'.$redirect_url);
// echo $redirect_url;
?>
<iframe style = "border:none; width:100%; height:1000px;" src="<?php echo $redirect_url; ?>"></iframe>

<?php
session_start();
error_reporting(1);
include('connect2.php');
include('connect.php');

 
$stmt = $dbh->query("SELECT * FROM websiteinfo");
$row_website = $stmt->fetch();
$logo=$row_website['logo'] ;
$favicon=$row_website['logo'] ;

$email=$row_website['email'] ;
$url=$row_website['website'] ;
$phone1=$row_website['phone1'] ;
$phone2=$row_website['phone2'] ;
$address=$row_website['address'] ;
$sms_username=$row_website['sms_username'] ;
$sms_password=$row_website['sms_password'] ;


date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');


//sms details
$username=$sms_username;//Note: urlencodemust be added forusernameand 
$password=$sms_password;// passwordas encryption code for security purpose.

//$url = "http://portal.nigeriabulksms.com/api/?username=".$username."&password=".$password."&message=".$message."&sender=".$senderID."&mobiles=".$phone;
			$url_bal = "http://portal.nigeriabulksms.com/api/?username=".$username."&password=".$password."&action=balance";

$ch_bal = curl_init();
curl_setopt($ch_bal,CURLOPT_URL, $url_bal);
curl_setopt($ch_bal, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_bal, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch_bal, CURLOPT_HEADER, 0);

$response = curl_exec($ch_bal);
$response = json_decode($response);
//echo $response->balance;

$err = curl_error($ch_bal);

curl_close($ch_bal);

if ($err) {
  echo "cURL Error #:" . $err;
} 

?> 

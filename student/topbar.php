<?php
session_start();
error_reporting(1);
include('../Admin/connect2.php');
include('../Admin/connect.php');

 
$stmt = $dbh->query("SELECT * FROM websiteinfo");
$row_website = $stmt->fetch();
$logo=$row_website['logo'] ;
$favicon=$row_website['logo'] ;
$email=$row_website['email'] ;
$url=$row_website['website'] ;
$phone1=$row_website['phone1'] ;
$phone2=$row_website['phone2'] ;
$address=$row_website['address'] ;
$secretkey=$row_website['payment_secretkey'] ;
$sms_username=$row_website['sms_username'] ;
$sms_password=$row_website['sms_password'] ;

date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');
?> 

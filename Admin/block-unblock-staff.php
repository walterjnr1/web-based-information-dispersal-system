<?php
error_reporting(1);
include('topbar.php');

if(empty($_SESSION['login_username']))
    {   
    header("Location: ../index.php"); 
    }
    else{
	}
      
$username = $_SESSION["login_username"];
 // for Block User   	
if(isset($_GET['id']))
{
$id=intval($_GET['id']);


mysqli_query($conn,"update tblstaff set status='0' where ID='$id'");
header("location: add-staff.php");
}

// for unBlock user
if(isset($_GET['uid']))
{
$uid=intval($_GET['uid']);

mysqli_query($conn,"update tblstaff set status='1' where ID='$uid'");
header("location: add-staff.php");

}

?>
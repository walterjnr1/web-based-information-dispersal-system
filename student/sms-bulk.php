<?php
include('topbar.php');

if(empty($_SESSION['login_regnum']))
    {   
    header("Location: ../index.php"); 
    }
    else{
	}
      
$regnum = $_SESSION["login_regnum"];

		
$sql = "select * from tblstudent where regnum='$regnum'"; 
$result = $conn->query($sql);
$rowaccess = mysqli_fetch_array($result);
$sms_balance=$rowaccess['unit'];
$fullname=$rowaccess['fullname'];

if(isset($_POST["btnsend"]))
{

$message=$_POST['txtmsg'];
$senderID=$_POST['txtsenderID'];

//Fetch AllPhone numbers
$sql = "SELECT * FROM tblstudent"; 
if ($res = mysqli_query($conn, $sql)) { 
   if (mysqli_num_rows($res) > 0) { 
      while ($row_sms = mysqli_fetch_array($res)) { 
         $recipients[] = $row_sms['phone'];
      }
   }
}
$phone = implode(',', $recipients);
if( $message == "" || $senderID == ""){
	$error='Textfield Must not be Empty';
}else if($sms_balance < 3){
	$error='Your SMS Unit/balance is too low. Top up';
}else if(  $message !== "" || $senderID !== "" ){


$host_name = 'www.yahoo.com';
$port_no = '80';

$st = (bool)@fsockopen($host_name, $port_no, $err_no, $err_str, 10);
if ($st) {

$username=$sms_username;//Note: urlencodemust be added forusernameand 
$password=$sms_password;// passwordas encryption code for security purpose.

$api_url  = 'https://portal.nigeriabulksms.com/api/';

//Create the message data

$data = array('username'=>$username, 'password'=>$password,'sender'=>$senderID, 'message'=>$message, 'mobiles'=>$phone);

//URL encode the message data

$data = http_build_query($data);

//Send the message
$request = $api_url.'?'.$data;

$result  = file_get_contents($request);

$result  = json_decode($result);


if(isset($result->status) && strtoupper($result->status) == 'OK')
{

	//deduct from sms unit/balance
$sql = "update  tblstudent set unit = (unit) - $result->price  where regnum= '$regnum'";
if (mysqli_query($conn, $sql)) {

   //save SMS details
$status=$result->status;
$sql = 'INSERT INTO tblsms(sms_type,senderID,sendername,sender,msg,phone,date_sent,status) VALUES(:sms_type,:senderID,:sendername,:sender,:msg,:phone,:date_sent,:status)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':sms_type' => 'Bulk SMS',
	':senderID' => $senderID,
	':sendername' => $fullname,
	':sender' => $regnum,
	':msg' => $message,
	':phone' => $phone,
	':date_sent' => $current_date,
	':status' => $status

]);
header( "refresh:4;url= sms.php" );
$success= 'Message sent at N'.$result->price;
}
else if(isset($result->error))
{
// Message failed, check reason.
$error =  'Message failed - error: '.$result->error;
}
else
{
// Could not determine the message response.
$error = 'Unable to process request';
}
}else if(isset($result->error)){
$error='Sorry, you are not connected Online';
}
}
}
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Send Bulk SMS -  WEB-BASED INFROMATION DISPERSAL MANAGEMENT SYSTEM FOR TERTIARY INSTITUTIONS</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="assets/vendors/flatpickr/flatpickr.min.css">
	<link rel="stylesheet" href="assets/vendors/jquery-tags-input/jquery.tagsinput.min.css">

	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="assets/css/demo2/style.css">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Dispersal<span>System</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      
      <?php
      include('sidebar.php');
      ?>
    </nav>
   
		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
			
            <?php
      include('navbar.php');
      ?>

			<!-- partial -->

			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Compose Bulk SMS</li>
					</ol>
					
 <p><?php if($success){?>
 <div class="alert alert-success" role="alert">	<i data-feather="alert-circle"></i> <?php echo ($success); ?></div>
  <?php }else if($error){?>
  <div class="alert alert-danger" role="alert">	<i data-feather="alert-circle"></i> <?php echo ($error); ?></div>
 <?php } ?></p>
				</nav>

				<div class="row">
					
			<div class="col-lg-6 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Compose Bulk SMS</h4>
								
								<form role="form" method="POST">


									<div class="row mb-3">
									<div class="col-lg-3">
										<label for="defaultconfig-4" class="col-form-label">Sender ID</label>
									</div>
									<div class="col-lg-8">
									<input type="text" name="txtsenderID" placeholder="Enter Sender ID" maxlength="11" class="form-control" required="">
									</div>
								</div>

								<div class="row mb-3">
									<div class="col-lg-3">
									<span >SMS Balance</span>
									</div>
									<div class="col-lg-8">
									<span class="badge bg-info">NGN<?php echo number_format((float) $row_student['unit'] ,2); ?></span>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-3">
										<label for="defaultconfig-4" class="col-form-label">Message</label>
									</div>
									<div class="col-lg-8">
										<textarea id="maxlength-textarea" name="txtmsg" class="form-control" id="defaultconfig-4" maxlength="320" rows="8" placeholder="This textarea has a limit of 320 characters."></textarea>
									</div>
								</div>
								<span></span>
          <span></span>
          <span></span>
		  	<button type="submit" name="btnsend" class="btn btn-primary btn-icon-text">	<i class="btn-icon-prepend" data-feather="check-square"></i>
	Send </button>
	</form>

							</div>
						
            </div>
					</div>
					
				</div>
			
			</div>

			<!-- partial:partials/_footer.html -->
			<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
            <?php
      include('footer.php');
      ?>
			</footer>
			<!-- partial -->
		
		</div>
	</div>

	<!-- core:js -->
	<script src="assets/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="assets/vendors/flatpickr/flatpickr.min.js"></script>
  <script src="assets/js/bootstrap-maxlength.js"></script>
  <script src="assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

  <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="assets/vendors/feather-icons/feather.min.js"></script>
	<script src="assets/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="assets/js/dashboard-dark.js"></script>
	<!-- End custom js for this page -->

</body>
</html>    
<?php
include('topbar.php');

if(empty($_SESSION['login_staffID']))
    {   
    header("Location: ../index.php"); 
    }
    else{
	}
      
$staffID = $_SESSION["login_staffID"];

		
$sql = "select * from tblstaff where staffID='$staffID'"; 
$result = $conn->query($sql);
$rowaccess = mysqli_fetch_array($result);
$fullname=$rowaccess['fullname'];

if(isset($_POST["btnbuy"]))
{

$amt=$_POST['txtamt'];

if($amt == ""){

$error='Textfield Must not be Empty';

}else if($amt !== ""){


 //save payment details
$status=$result->status;
$sql = 'INSERT INTO tblpayment(amount,userid,user,date_paid) VALUES(:amount,:userid,:user,:date_paid)';
$statement = $dbh->prepare($sql);
$statement->execute([
	':amount' => $amt,
	':userid' => $staffID,
	':user' => $fullname,
	':date_paid' => $current_date

]);

$sql = "update  tblstaff set unit = unit + $amt  where staffID= '$staffID'";
if (mysqli_query($conn, $sql)) {

    header( "refresh:4;url= buy-unit.php" );
$success= 'Payment Was Done successfully';
    }else{
		$error='Problem buying Unit';

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

	<title>Buy SMS Unit -  WEB-BASED INFROMATION DISPERSAL MANAGEMENT SYSTEM FOR TERTIARY INSTITUTIONS</title>

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
						<li class="breadcrumb-item active" aria-current="page">Buy SMS unit</li>
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
								<h4 class="card-title">Buy SMS unit</h4>
								
								<form role="form" method="POST">


									<div class="row mb-3">
									<div class="col-lg-3">
										<label for="defaultconfig-4" class="col-form-label">SMS Balance</label>
									</div>
									<div class="col-lg-8">
									<input type="text" name="txtbalance"  value="NGN<?php echo number_format((float) $rowaccess['unit'] ,2); ?>" class="form-control" disabled="">
									</div>
								</div>

								<div class="row mb-3">
									<div class="col-lg-3">
										<label for="defaultconfig-4" class="col-form-label">Amount</label>
									</div>
									<div class="col-lg-8">
									<input type="number" name="txtamt" placeholder="Enter Amount" class="form-control" required="">
									</div>
								</div>



								
		  	<button type="submit" name="btnbuy" class="btn btn-primary btn-icon-text">Buy unit </button>
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
<?php
error_reporting(1);
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
$db_pass=$rowaccess['password'];


 if(isset($_POST["btnchange"])){
$old = mysqli_real_escape_string($conn,$_POST['txtold_password']);
$pass_new = mysqli_real_escape_string($conn,$_POST['txtnew_password']);
$confirm_new = mysqli_real_escape_string($conn,$_POST['txtconfirm_password']);

  
  if($db_pass!=$old){ ?> 
    <?php $error='Old Password not matched';?>
   <!--  <script>
    alert('OLD Paasword not matched');
    </script> -->
  <?php } else if($pass_new!=$confirm_new){ ?> 
    <?php $error='NEW Password and CONFIRM password not Matched';?>
   <!--  <script>
    alert('NEW Password and CONFIRM password not Matched');
    </script> -->
  <?php } else {
    //$pass = md5($_POST['password']);
   $sql = "update  tblstaff set `password`='$confirm_new' where staffID= '".$_SESSION['login_staffID']."'";
  $res = $conn->query($sql);
  ?>
   <?php 
       		
    header( "refresh:5;url= logout.php" );
   
   $success='Password changed Successfully...';
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

	<title>Dashboard -  WEB-BASED INFROMATION DISPERSAL MANAGEMENT SYSTEM FOR TERTIARY INSTITUTIONS</title>

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
          <span></span>        </div>
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
						<li class="breadcrumb-item active" aria-current="page">Change Password</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">

								<h6 class="card-title">Change Password</h6>
								<p class="card-title">&nbsp;</p>
<p><?php if($success){?>
 <div class="alert alert-success" role="alert">	<i data-feather="alert-circle"></i> <?php echo ($success); ?></div>
  <?php }else if($error){?>
  <div class="alert alert-danger" role="alert">	<i data-feather="alert-circle"></i> <?php echo ($error); ?></div>
 <?php } ?></p>								
 
 								<form  action="" method="POST" >
									<div class="mb-3">
										<label for="exampleInputUsername1"  class="form-label">Old Password</label>
										<input type="text" name="txtold_password" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Old Password">
									</div>
									<div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">New password</label>
										<input type="text" class="form-control" name="txtnew_password" id="exampleInputEmail1" placeholder="New Password">
									</div>
									<div class="mb-3">
										<label for="exampleInputPassword1" class="form-label">Confirm Password</label>
										<input type="text" class="form-control" name="txtconfirm_password" id="exampleInputPassword1" autocomplete="off" placeholder="Confirm Password">
									</div>
									
									<button type="submit" name="btnchange" class="btn btn-primary me-2">Change</button>
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
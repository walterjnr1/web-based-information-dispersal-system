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

 if(isset($_POST["btnedit"])){
  

   $sql = "update tblstaff set fullname='".$_POST['txtfullname']."',sex='".$_POST['cmdsex']."',phone='".$_POST['txtphone']."',staff_type='".$_POST['cmdtype']."',date_appointment='".$_POST['txtdate']."',qualification='".$_POST['txtqualification']."' where staffID= '$staffID'";
   if (mysqli_query($conn, $sql)) {
          
    $success='Profile Edited Successfully...';
    }else{
		$error='Problem editing profile';

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

	<title>Edit profile -  WEB-BASED INFROMATION DISPERSAL MANAGEMENT SYSTEM FOR TERTIARY INSTITUTIONS</title>

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
						<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
					</ol>
				
 
 <p><?php if($success){?>
 <div class="alert alert-success" role="alert">	<i data-feather="alert-circle"></i> <?php echo ($success); ?></div>
  <?php }else if($error){?>
  <div class="alert alert-danger" role="alert">	<i data-feather="alert-circle"></i> <?php echo ($error); ?></div>
 <?php } ?></p>
 
				</nav>

				<div class="row">
					<div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">

								<h6 class="card-title">Edit Profile</h6>

                                <form role="form" method="POST">
									<div class="mb-3">
										<label for="exampleInputUsername1" name="txtfullname" class="form-label">Fullname</label>
										<input type="text" name="txtfullname" value="<?php echo $rowaccess['fullname']; ?>"  class="form-control" required="">

									</div>
									<div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Sex</label>
										<select name="cmdsex" class="form-control" id="sex" >
          <option value="<?php echo $rowaccess['sex']; ?>"><?php echo $rowaccess['sex']; ?></option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          
        </select>       
	    	</div>

			<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">phone</label>
			<input type="text" class="form-control" name="txtphone" id="exampleInputPassword1"  value="<?php echo $rowaccess['phone']; ?>">
				</div>

			<div class="mb-3">
			<label for="exampleInputEmail1" class="form-label">Staff Type</label>
			<select name="cmdtype" class="form-control" id="type" >
          <option value="<?php echo $rowaccess['staff_type']; ?>"><?php echo $rowaccess['staff_type']; ?></option>
          <option value="Lecturer">Lecturer</option>
          <option value="Non-Academic">Non-Academic</option>
          
        </select>       
	    	</div>

			<div class="mb-3">
		<label for="exampleInputPassword1" class="form-label">Date of First Appointment</label>
				<input type="date" class="form-control" name="txtdate" id="exampleInputPassword1"  value="<?php echo $rowaccess['date_appointment']; ?>">
			</div>				
						
			<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Qualification</label>
				<input type="text" class="form-control" name="txtqualification" id="exampleInputPassword1"  value="<?php echo $rowaccess['qualification']; ?>">
				</div>						

			<button type="submit" name="btnedit" class="btn btn-primary me-2">Change</button>
				<button class="btn btn-secondary">Cancel</button>
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
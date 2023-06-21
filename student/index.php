<?php
include('topbar.php');
if(empty($_SESSION['login_regnum'] ))
    {   
      header("Location: login.php"); 
    }
    else{
	}
      
$regnum = $_SESSION["login_regnum"];

 $sql = "select * from tblstudent where regnum ='$regnum'"; 
$result = $conn->query($sql);
$row_student = mysqli_fetch_array($result);

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

	<title>Student Dashboard -  WEB-BASED INFROMATION DISPERSAL MANAGEMENT SYSTEM FOR TERTIARY INSTITUTIONS</title>

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

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Welcome <?php echo $row_student['fullname'] ?> </h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
            
            
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
              
           
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">No. of SMS</h6>
                      <?php
$query = "SELECT * FROM tblsms where sender='$regnum' "; 
$result = mysqli_query($conn, $query); 

if ($result) 
{ 
 // it return number of rows in the table. 
 $row_sms = mysqli_num_rows($result); 
   
}
 
 
  ?>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h4 class="mb-2"><?php  echo $row_sms;   ?></h4>
                        <div class="d-flex align-items-baseline">
                          <p class="text-success">
                            <span></span>
                            
                          </p>
                        </div>
                      </div>
                 </div>
                  </div>
                </div>
              </div>
            

              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h3 class="card-title mb-0">SMS Balance</h3>
                      
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h4 class="mb-2">NGN<?php echo number_format((float) $row_student['unit'] ,2); ?></h4>
                        <div class="d-flex align-items-baseline">
                          <p class="text-success">
                            <span></span>                          </p>
                          
                        </div>
                      </div>
                 </div>
                  </div>
                </div>
              </div>

          </div>
        </div> <!-- row -->

			</div>
      <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
                          <p class="text-success">&nbsp;</p>
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
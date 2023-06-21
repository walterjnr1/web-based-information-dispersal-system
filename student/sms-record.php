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

	<title> SMS Record -  WEB-BASED INFROMATION DISPERSAL MANAGEMENT SYSTEM FOR TERTIARY INSTITUTIONS</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
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
						<li class="breadcrumb-item"><a href="#">Record</a></li>
						<li class="breadcrumb-item active" aria-current="page">SMS Record</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">SMS Record</h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
					  <th>#</th>
                        <th>SMS Type</th>
                        <th>Sender ID</th>
                        <th>Message</th>
                        <th>Phone Number</th>
                        <th>Date</th>
                        <th>SMS Status</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php 
                                          $sql = "SELECT * FROM tblsms where sender='$regnum' order by ID ASC";
                                           $result = $conn->query($sql);
										   $cnt=1;
                                           while($row = $result->fetch_assoc()) {
											 ?>
                      <tr>
                        <td><?php echo $cnt;  ?></td>
                        <td><?php echo $row['sms_type'];  ?></td>
                        <td><?php echo $row['senderID'];  ?></td>
                        <td><?php echo $row['msg'];  ?></td>
                        <td><?php echo $row['phone'];  ?></td>
                        <td><?php echo $row['date_sent'];  ?></td>
						<td>
						<?php if (($row['status'])==(('OK')))  { ?>
							<span class="badge bg-success"><?php echo $row['status'];  ?></span>
					  <?php } else {?>
						<span class="badge bg-danger"><?php echo $row['status'];  ?></span>	
						 <?php } ?>
							</td>











                      </tr>
					  <?php $cnt=$cnt+1;} ?>

                    </tbody>
                  </table>
                </div>
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
  <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="assets/vendors/feather-icons/feather.min.js"></script>
	<script src="assets/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="assets/js/data-table.js"></script>
	<!-- End custom js for this page -->

</body>
</html>
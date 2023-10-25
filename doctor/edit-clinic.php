<?php
include('include/config.php');

$did=intval($_GET['id']);// get doctor id
if(isset($_POST['submit']))
{	
	$docName = $_POST['docName'];
	$patName = $_POST['patName'];
	$cliDate = $_POST['cliDate'];
	$cliTime = $_POST['cliTime'];
	$cliVenue = $_POST['cliVenue'];
	$docSpecialization = $_POST['docSpecialization'];
	

    $sql = "UPDATE clinicschedule 
    SET docName = ?, patName = ?, cliDate = ?, cliTime = ?, cliVenue = ?, docSpecialization = ? 
    WHERE cid = $did";

if ($stmt = mysqli_prepare($con, $sql)) {
mysqli_stmt_bind_param($stmt, "ssssss", $docName, $patName, $cliDate, $cliTime, $cliVenue, $docSpecialization);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Clinic Schedule info updated Successfully');</script>";
    echo "<script>window.location.href = 'manage-clinicSchedule.php'</script>";
} else {
    echo "Error updating clinic schedule: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
} else {
echo "Error preparing the update statement: " . mysqli_error($con);
}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>MedLabAdmin | Edit Medicine Stocks</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Doctor | Add Clinic Schedule</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Doctor</span>
									</li>
									<li class="active">
										<span>Add Clinic Schedule</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Add Clinic Schedule</h5>
												</div>
												<div class="panel-body">
                                                <?php $sql=mysqli_query($con,"select * from clinicschedule where $did = cid");
													while($data=mysqli_fetch_array($sql))
													{
													?>
									
													<form role="form" name="addMedStock" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="medicineName">
																Doctor Name
															</label>
															<input type="text" name="docName" class="form-control" value="<?php echo htmlentities($data['docName']);?>">
														</div>
														<div class="form-group">
															<label for="medicineSupplier">
																Patient Name
															</label>
															<input type="text" name="patName" class="form-control" value="<?php echo htmlentities($data['patName']);?>">
														</div><div class="form-group">
															<label for="medicineSupplier">
																Clinic Date
															</label>
															<input type="Date" name="cliDate" class="form-control" value="<?php echo htmlentities($data['cliDate']);?>">
														</div>
														<div class="form-group">
															<label for="medicineSupplier">
																Clinic Time
															</label>
															<input type="time" name="cliTime" class="form-control" value="<?php echo htmlentities($data['cliTime']);?>">
														</div>
														<div class="form-group">
															<label for="medicineSupplier">
																Cilinic Venue
															</label>
															<input type="text" name="cliVenue" class="form-control" value="<?php echo htmlentities($data['cliVenue']);?>">
														</div>
														<div class="form-group">
															<label for="medicineSupplier">
																Doctor Specialization
															</label>
															<input type="text" name="docSpecialization" class="form-control" value="<?php echo htmlentities($data['docSpecialization']);?>">
														</div>
														
														
														
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Update
														</button>
													</form>
                                                    <?php } ?>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['id']==0)) {
 header('location:logout.php');
  } else{

if(isset($_POST['submit']))
{	
    $rid = $_POST['rid'];
	$pid = $_POST['pid'];
	$pName = $_POST['pName'];
	$pAge = $_POST['pAge'];
	$pGender = $_POST['pGender'];
	$cDate = $_POST['cDate'];
	$cTime = $_POST['cTime'];
	$sName = $_POST['sName'];
    $wbc = $_POST['wbc'];
    $rbc = $_POST['rbc'];
    $hb = $_POST['hb'];
    $plates = $_POST['plates'];
    $neutrophils = $_POST['neutrophils'];
    $lymphocytes = $_POST['lymphocytes'];
    $monocytes = $_POST['monocytes'];
    $magnesium = $_POST['magnesium'];
    $calcium = $_POST['calcium'];
    $hematocrit = $_POST['hematocrit'];



		$sql = mysqli_query($con, "insert into labreport(rid, pid, pName, pAge, pGender, cDate, cTime, sName, wbc, rbc, hb, plates, neutrophils, lymphocytes, monocytes, magnesium, calcium, hematocrit) values('$rid', '$pid', '$pName', '$pAge', '$pGender', '$cDate', '$cTime', '$sName', '$wbc', '$rbc', '$hb', '$plates', '$neutrophils', '$lymphocytes', '$monocytes', '$magnesium', '$calcium', '$hematocrit')");
		if($sql)
		{
			echo "<script>alert('Patient Lab Report added Successfully');</script>";
			echo "<script>window.location.href ='manage-users.php'</script>";

		}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>MedLabAdmin | Add Lab Report</title>
		
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
									<h1 class="mainTitle">MedLabAdmin | Add Lab Report</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>MedLabAdmin</span>
									</li>
									<li class="active">
										<span>Add Lab Report</span>
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
													<h5 class="panel-title">General Details</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" name="addLabReport" method="post" onSubmit="return valid();">
                                                    <div class="form-group">
															<label for="reportID">
																Report ID
															</label>
															<input type="text" name="rid" class="form-control"  placeholder="Enter Report ID" required="true">
														</div>
														<div class="form-group">
															<label for="patientID">
																Patient ID
															</label>
															<input type="text" name="pid" class="form-control"  placeholder="Enter Patient ID" required="true">
														</div>
														<div class="form-group">
															<label for="patientName">
																Patient Name
															</label>
															<input type="text" name="pName" class="form-control"  placeholder="Enter Patient Name" required="true">
														</div>
                                                        <div class="form-group">
															<label for="patientAge">
																Patient Age
															</label>
															<input type="text" name="pAge" class="form-control"  placeholder="Enter Patient Age" required="true">
														</div>
														<div class="form-group">
															<label for="patientGender">
																Patient Gender
															</label>
															<select name="pGender" class="form-control"  required="true">
																<option value=""></option>
																<option value="Male">
																	Male
																</option>
																<option value="Female">
																	Female
																</option>
																<option value="Other">
																	Other
																</option>																
															</select>
														</div>
														<div class="form-group">
															<label for="testConductedDate">
																Test Conducted Date
															</label>
														<input type="date" name="cDate" class="form-control"  placeholder="Enter Test Conducted Date" required="required" data-date-format="yyyy-mm-dd">
														</div>
														<div class="form-group">
															<label for="testConductedTime">
																Test Conducted Time
															</label>
														<input type="time" name="cTime" class="form-control"  placeholder="Enter Test Conducted Time" required="true">
														</div>
														<div class="form-group">
															<label for="staffName">
																Staff Name
															</label>
														<input type="text" name="sName" class="form-control"  placeholder="Test Conducted By" required="true">
														</div>
													</form>
												</div>
											</div>

                                            <!--
                                            <div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Lab Report Details</h5>
												</div>
												<div class="panel-body">
                                                -->
														<div class="form-group">
															<label for="WBCs">
																WBCs(billion/L)
															</label>
															<input type="text" name="wbc" class="form-control"  placeholder="Enter WBC Count" required="true">
														</div>
														<div class="form-group">
															<label for="RBCs">
																RBCs(trillion/L)
															</label>
															<input type="text" name="rbc" class="form-control"  placeholder="Enter RBC Count" required="true">
														</div>
                                                        <div class="form-group">
															<label for="HB">
																HB(g/dL)
															</label>
															<input type="text" name="hb" class="form-control"  placeholder="Enter HB Count" required="true">
														</div>
														<div class="form-group">
															<label for="Plates">
																Plates(billion/L)
															</label>
														<input type="text" name="plates" class="form-control"  placeholder="Enter Plates Count" required="required">
														</div>
														<div class="form-group">
															<label for="Neutrophils">
                                                                Neutrophils(%)
															</label>
														<input type="text" name="neutrophils" class="form-control"  placeholder="Enter Neutrophils Count" required="true">
														</div>
														<div class="form-group">
															<label for="Lymphocytes">
                                                                Lymphocytes(%)
															</label>
														<input type="text" name="lymphocytes" class="form-control"  placeholder="Enter Lymphocytes Count" required="true">
														</div>
                                                        <div class="form-group">
															<label for="Monocytes">
                                                                Monocytes(%)
															</label>
														<input type="text" name="monocytes" class="form-control"  placeholder="Enter Monocytes Count" required="true">
														</div>
                                                        <div class="form-group">
															<label for="Magnesium">
                                                                Magnesium(mmol/L)
															</label>
														<input type="text" name="magnesium" class="form-control"  placeholder="Enter Magnesium Count" required="true">
														</div>
                                                        <div class="form-group">
															<label for="Calcium">
                                                                Calcium(mmol/L)
															</label>
														<input type="text" name="calcium" class="form-control"  placeholder="Enter Calcium Count" required="true">
														</div>
                                                        <div class="form-group">
															<label for="Hematocrit">
                                                                Hematocrit(%)
															</label>
														<input type="text" name="hematocrit" class="form-control"  placeholder="Enter Hematocrit Count" required="true">
														</div>
																												
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
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
<?php } ?>
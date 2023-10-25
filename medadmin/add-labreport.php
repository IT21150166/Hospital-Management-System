<?php

include('include/config.php');

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
    
		$sql=mysqli_query($con, "insert into labreport(rid, pid, pName, pAge, pGender, cDate, cTime, sName, wbc, rbc, hb, plates, neutrophils, lymphocytes, monocytes, magnesium, calcium, hematocrit) values('$rid', '$pid', '$pName', '$pAge', '$pGender', '$cDate', '$cTime', '$sName', '$wbc', '$rbc', '$hb', '$plates', '$neutrophils', '$lymphocytes', '$monocytes', '$magnesium', '$calcium', '$hematocrit')");
		if($sql)
		{
			echo "<script>alert('Lab Report info added Successfully');</script>";
			echo "<script>window.location.href ='manage-labreport.php'</script>";

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
										<span>Add Lab Reports</span>
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
													<h5 class="panel-title">General Information</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" name="addMedStock" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="reportID">
																Report ID
															</label>
															<input type="text" name="rid" class="form-control"  placeholder="Enter Medicine Name" required="true">
														</div>
														<div class="form-group">
															<label for="patientID">
																Patient ID
															</label>
															<input type="text" name="pid" class="form-control"  placeholder="Enter Medicine Supplier Name" required="true">
														</div>
                                                        <div class="form-group">
															<label for="patienName">
																Patient Name
															</label>
															<input type="text" name="pName" class="form-control"  placeholder="Enter Medicine Supplier Name" required="true">
														</div>
                                                        <div class="form-group">
															<label for="patienAge">
																Patient Age
															</label>
															<input type="text" name="pAge" class="form-control"  placeholder="Enter Medicine Supplier Name" required="true">
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
																<option value="Others">
																	Others
																</option>
																
															</select>
														</div>
														<div class="form-group">
															<label for="conductedDat">
																Conducted Date
															</label>
														<input type="date" name="cDate" class="form-control"  placeholder="Enter Medicine Stock Quantity in Numbers" required="true">
														</div>
														<div class="form-group">
															<label for="conductedTime">
																Conducted Time
															</label>
														<input type="time" name="cTime" class="form-control"  placeholder="Enter Medicine Cost per Unit" required="true">
														</div>
														<div class="form-group">
															<label for="staffName">
																Staff Name
															</label>
														<input type="text" name="sName" class="form-control"  placeholder="Enter Total Cost" required="true">
														</div>

                                                        <div class="panel-heading">
													        <h5 class="panel-title">Report Details</h5>
												        </div><br/>
														
														<div class="form-group">
															<label for="wbc">
																WBCs
															</label>
															<input type="text" class="form-control" name="wbc" placeholder="Select WBCs Count" required="true">
														</div>
                                                        <div class="form-group">
															<label for="rbc">
																RBCs
															</label>
															<input type="text" class="form-control" name="rbc" placeholder="Select RBCs Count" required="true">
														</div>
														<div class="form-group">
															<label for="hb">
																HB
															</label>
															<input type="text" class="form-control" name="hb" placeholder="Select HBs Count" required="true">
														</div>
                                                        <div class="form-group">
															<label for="plates">
																Plates
															</label>
															<input type="text" class="form-control" name="plates" placeholder="Select Plates Count" required="true">
														</div>
                                                        <div class="form-group">
															<label for="neutrophils">
                                                                Neutrophils
															</label>
															<input type="text" class="form-control" name="neutrophils" placeholder="Select Neutrophils Count" required="true">
														</div>
                                                        <div class="form-group">
															<label for="lymphocytes">
                                                                Lymphocytes
															</label>
															<input type="text" class="form-control" name="lymphocytes" placeholder="Select Lymphocytes Count" required="true">
														</div>
                                                        <div class="form-group">
															<label for="monocytes">
                                                                Monocytes
															</label>
															<input type="text" class="form-control" name="monocytes" placeholder="Select Monocytes Count" required="true">
														</div>
                                                        <div class="form-group">
															<label for="magnesium">
                                                                Magnesium
															</label>
															<input type="text" class="form-control" name="magnesium" placeholder="Select Magnesium Count" required="true">
														</div>
                                                        <div class="form-group">
															<label for="calcium">
                                                                Calcium
															</label>
															<input type="text" class="form-control" name="calcium" placeholder="Select Calcium Count" required="true">
														</div>
                                                        <div class="form-group">
															<label for="hematocrit">
                                                                Hematocrit
															</label>
															<input type="text" class="form-control" name="hematocrit" placeholder="Select Hematocrit Count" required="true">
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

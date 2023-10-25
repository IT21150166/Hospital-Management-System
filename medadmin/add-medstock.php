<?php

include('include/config.php');

if(isset($_POST['submit']))
{	
	$medID = $_POST['medID'];
	$medName = $_POST['medName'];
	$medSupplier = $_POST['medSupplier'];
	$medType = $_POST['medType'];
	$medQuantity = $_POST['medQuantity'];
	$medCost = $_POST['medCost'];
	$totalCost = $_POST['totalCost'];
	$purDate = $_POST['purDate'];
	$expDate = $_POST['expDate'];
	$medNote = $_POST['medNote'];

		$sql=mysqli_query($con,"insert into medstock(medID, medName, medSupplier, medType, medQuantity, medCost, totalCost, purDate, expDate, medNote) values('$medID', '$medName', '$medSupplier', '$medType', '$medQuantity', '$medCost', '$totalCost', '$purDate', '$expDate', '$medNote')");
		if($sql)
		{
			echo "<script>alert('Medicine Stock info added Successfully');</script>";
			echo "<script>window.location.href ='manage-medstock.php'</script>";

		}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>MedLabAdmin | Add Medicine Stocks</title>
		
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
									<h1 class="mainTitle">MedLabAdmin | Add Medicine Stocks</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>MedLabAdmin</span>
									</li>
									<li class="active">
										<span>Add Medicine Stocks</span>
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
													<h5 class="panel-title">Add Medicine Stocks</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" name="addMedStock" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="medicineID">
																Medicine ID
															</label>
															<input type="text" name="medID" class="form-control"  placeholder="Enter Medicine ID" required="true">
														</div>
														<div class="form-group">
															<label for="medicineName">
																Medicine Name
															</label>
															<input type="text" name="medName" class="form-control"  placeholder="Enter Medicine Name" required="true">
														</div>
														<div class="form-group">
															<label for="medicineSupplier">
																Medicine Supplier
															</label>
															<input type="text" name="medSupplier" class="form-control"  placeholder="Enter Medicine Supplier Name" required="true">
														</div>
														<div class="form-group">
															<label for="medicineType">
																Medicine Type
															</label>
															<select name="medType" class="form-control"  required="true">
																<option value=""></option>
																<option value="Liquid">
																	Liquid
																</option>
																<option value="Capsules">
																	Capsules
																</option>
																<option value="Tablet">
																	Tablet
																</option>
																<option value="Sappositories">
																	Sappositories
																</option>
																<option value="Drops">
																	Drops
																</option>
																<option value="Inhalers">
																	Inhalers
																</option>
																<option value="Injections">
																	Injections
																</option>
																<option value="Implants or Patches">
																	Implants or Patches
																</option>
																<option value="Sublingual">
																	Sublingual tablets
																</option>
																
															</select>
														</div>
														<div class="form-group">
															<label for="medicineQuantity">
																 Medicine Quantity
															</label>
														<input type="text" name="medQuantity" class="form-control"  placeholder="Enter Medicine Stock Quantity in Numbers" required="true">
														</div>
														<div class="form-group">
															<label for="medicineCost">
																 Medicine Cost(For One Unit)
															</label>
														<input type="text" name="medCost" class="form-control"  placeholder="Enter Medicine Cost per Unit" required="true">
														</div>
														<div class="form-group">
															<label for="totalCost">
																 Total Cost
															</label>
														<input type="text" name="totalCost" class="form-control"  placeholder="Enter Total Cost" required="true">
														</div>
														
														<div class="form-group">
															<label for="purchaseDate">
																Purchase Date
															</label>
															<input class="form-control datepicker" name="purDate" placeholder="Select stock purchase Date" required="required" data-date-format="yyyy-mm-dd">
														</div>
														<div class="form-group">
															<label for="expiryDate">
																Expiry Date
															</label>
															<input class="form-control datepicker" name="expDate" placeholder="Select stock Expiry Date"  required="required" data-date-format="yyyy-mm-dd">
														</div>
														<div class="form-group">
															<label for="medicineNote">
																Medicine Note
															</label>
															<textarea name="medNote" class="form-control"  placeholder="Mention any Measurable Notes" required="true"></textarea>
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
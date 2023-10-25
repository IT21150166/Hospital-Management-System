<?php

include('include/config.php');

if (isset($_GET['del'])) {
    $medID = $_GET['id']; // Corrected variable name
    $medID = mysqli_real_escape_string($con, $medID);
    $sql = "DELETE FROM medStock WHERE medID = '$id'";
    
    if (mysqli_query($con, $sql)) {
        session_start(); // Start the session if not started
        $_SESSION['msg'] = "Data deleted successfully!";
    } else {
        session_start(); // Start the session if not started
        $_SESSION['msg'] = "Error deleting data: " . mysqli_error($con);
    }
    
    header("Location: manage-medstock.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>MedAdmin | Manage Medicine Stocks</title>
		
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
									<h1 class="mainTitle">MedAdmin | Manage Medicine Stocks</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>MedAdmin</span>
									</li>
									<li class="active">
										<span>Manage Medicine Stocks</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Medicine Stocks</span></span></span></h5>
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th>ID</th>
												<th class="hidden-xs">Name</th>
												<th>Supplier</th>
												<th>Type</th>
												<th>Quantity</th>
												<th>Cost/Unit</th>
												<th>Total</th>
												<th>Purchase</th>
												<th>Expiry</th>
												<th>Note</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$sql=mysqli_query($con,"select * from medstock");
											$cnt=1;
											while($row=mysqli_fetch_array($sql))
											{
											?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['medID'];?></td>
												<td><?php echo $row['medName'];?></td>
												<td><?php echo $row['medSupplier'];?></td>
												<td><?php echo $row['medType'];?></td>
												<td><?php echo $row['medQuantity'];?></td>
												<td><?php echo $row['medCost'];?></td>
												<td><?php echo $row['totalCost'];?></td>
												<td><?php echo $row['purDate'];?></td>
												<td><?php echo $row['expDate'];?></td>
												<td><?php echo $row['medNote'];?></td>												
												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<a href="edit-medstock.php?id=<?php echo $row['medID'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
														<a href="manage-medstock.php?id=<?php echo $row['medID'];?>&del=delete" onClick="return confirm('Are you sure you want to delete this stock item?')" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
														<!--<a href="manage-medstock.php?id=<?php //echo $row['medID'];?>&del=delete" onClick="return confirm('Are you sure you want to delete the stock ?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>-->
													</div>
												</td>
											</tr>
											<?php 
												$cnt=$cnt+1; 
											}?>
										</tbody>
									</table>
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
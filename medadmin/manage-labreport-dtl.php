<?php

include('include/config.php');

$did = intval($_GET['id']); // get doctor id

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>MedAdmin | Manage Lab Report</title>
		
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
									<h1 class="mainTitle">MedAdmin | Manage Lab Report</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>MedAdmin</span>
									</li>
									<li class="active">
										<span>Manage Lab Report</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Lab Report</span></span></span></span></h5><br/>
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
								<?php
									$sql=mysqli_query($con,"SELECT pid, pName, pAge, pGender, cDate, cTime, sName, createdAt FROM labreport WHERE rid = $did");
									while($row=mysqli_fetch_array($sql))
									{
								?>
								<h4><?php echo htmlentities($row['pName']); ?>'s Report | Lab Report Details</h4>
								<p><b>Report Registered Date: </b><?php echo htmlentities($row['createdAt']); ?></p>
								<p style="color: Black;"><b>Patient ID: </b><?php echo htmlentities($row['pid']); ?></p>
								<p style="color: Black;"><b>Age: </b><?php echo htmlentities($row['pAge']); ?></p>
								<p style="color: Black;"><b>Gender: </b><?php echo htmlentities($row['pGender']); ?></p>
								<p style="color: Black;"><b>Date: </b><?php echo htmlentities($row['cDate']); ?></p>
								<p style="color: Black;"><b>Time: </b><?php echo htmlentities($row['cTime']); ?></p>
								<p style="color: Black;"><b>Conducted By: </b><?php echo htmlentities($row['sName']); ?></p><br/><br/>
								<?php } ?>
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th>WBCs</th>
												<th>RBCs</th>
												<th>HB</th>
												<th>Plates</th>
												<th>Neutrophils</th>
												<th>Lymphocytes</th>
												<th>Monocytes</th>
												<th>Magnesium</th>
												<th>calcium</th>
												<th>Hematocrit</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$sql=mysqli_query($con,"select * from labreport");
											$cnt=1;
											while($row=mysqli_fetch_array($sql))
											{
										?>

											<tr>
												<td><?php echo $row['wbc'];?></td>
												<td><?php echo $row['rbc'];?></td>
												<td><?php echo $row['hb'];?></td>
												<td><?php echo $row['plates'];?></td>
												<td><?php echo $row['neutrophils'];?></td>
												<td><?php echo $row['lymphocytes'];?></td>
												<td><?php echo $row['monocytes'];?></td>
												<td><?php echo $row['magnesium'];?></td>
												<td><?php echo $row['calcium'];?></td>											
												<td><?php echo $row['hematocrit'];?></td>											
												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<a href="edit-labreport-dtl.php?id=<?php echo $row['rid'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
													</div>
												</td>
											</tr>
                                            <?php } ?>
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
<?php

include('include/config.php');

if (isset($_GET['del']) && isset($_GET['id'])) {
    $rid = $_GET['id'];
    $rid = mysqli_real_escape_string($con, $rid);

    $checkQuery = "SELECT * FROM labreport WHERE rid = '$rid'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $deleteQuery = "DELETE FROM labreport WHERE rid = '$rid'";

        if (mysqli_query($con, $deleteQuery)) {
            $_SESSION['msg'] = "Lab Report deleted successfully!";
        } else {
            $_SESSION['msg'] = "Error deleting data: " . mysqli_error($con);
        }
    } else {
        $_SESSION['msg'] = "Lab Report not found!";
    }

    header("Location: manage-labreport.php");
    exit();
}
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
									<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Lab Report</span></span></span></span></h5>
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th>Report ID</th>
												<th>Patient ID</th>
												<th>Name</th>
												<th>Age</th>
												<th>Gender</th>
												<th>Date</th>
												<th>Time</th>
												<th>Conducted By</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$sql=mysqli_query($con,"select rid, pid, pName, pAge, pGender, cDate, cTime, sName from labreport");
											$cnt=1;
											while($row=mysqli_fetch_array($sql))
											{
											?>

											<tr>
												<td><?php echo $row['rid'];?></td>
												<td><?php echo $row['pid'];?></td>
												<td><?php echo $row['pName'];?></td>
												<td><?php echo $row['pAge'];?></td>
												<td><?php echo $row['pGender'];?></td>
												<td><?php echo $row['cDate'];?></td>
												<td><?php echo $row['cTime'];?></td>
												<td><?php echo $row['sName'];?></td>											
												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<a href="edit-labreport.php?id=<?php echo $row['rid'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>||
                                                        <a href="manage-labreport-dtl.php?id=<?php echo $row['rid'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-eye"></i></a>||
														<a href="manage-labreport.php?id=<?php echo $row['rid'];?>&del=delete" onClick="return confirm('Are you sure you want to delete the Lab report ?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
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
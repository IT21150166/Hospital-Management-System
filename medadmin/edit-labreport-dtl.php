<?php
include('include/config.php');

$did = intval($_GET['id']); // get doctor id

if (isset($_POST['submit'])) {
	
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
    
    /*$sql = mysqli_query($con, "UPDATE labreport SET pid = '$pid', pName = '$pName', pAge = '$pAge', pGender = '$pGender', cDate = '$cDate', cTime = '$cTime', sName = '$sName' WHERE rid = '$did'");
    if ($sql) {
        $msg = "Lab Report Updated Successfully";
    }*/
	$sql = "UPDATE labreport 
        SET wbc = ?, rbc = ?, hb = ?, plates = ?, neutrophils = ?, lymphocytes = ?, monocytes = ?, magnesium = ?, calcium = ?, hematocrit = ?
        WHERE rid = $did";

if ($stmt = mysqli_prepare($con, $sql)) {
    mysqli_stmt_bind_param($stmt, "iiiiiiiiii", $wbc, $rbc, $hb, $plates, $neutrophils, $lymphocytes, $monocytes, $magnesium, $calcium, $hematocrit);

    if (mysqli_stmt_execute($stmt)) {
        $msg = "Test Details Updated Successfully";
    } else {
        $msg = "Error updating lab report: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
} else {
    $msg = "Error preparing the update statement: " . mysqli_error($con);
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>MedLabAdmin | Edit Lab Report [General Details]</title>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>
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
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color"/>
</head>
<body>
<div id="app">
    <?php include('include/sidebar.php'); ?>
    <div class="app-content">
        <?php include('include/header.php'); ?>
        <div class="main-content">
            <div class="wrap-content container" id="container">
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="mainTitle">MedLabAdmin | Edit Lab Report | Test Details</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>MedLabAdmin</span>
                            </li>
                            <li class="active">
                                <span>Edit Test Details</span>
                            </li>
                        </ol>
                    </div>
                </section>
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 style="color: green; font-size:18px;">
                                <?php if ($msg) {
                                    echo htmlentities($msg);
                                } ?> </h5>
                            <div class="row margin-top-30">
                                <div class="col-lg-8 col-md-12">
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">Edit Test Details</h5>
                                        </div>
                                        <div class="panel-body">
                                            <?php
                                            $sql = mysqli_query($con, "SELECT pName, createdAt, wbc, rbc, hb, plates, neutrophils, lymphocytes, monocytes, magnesium, calcium, hematocrit FROM labreport WHERE rid = $did");
                                            while ($data = mysqli_fetch_array($sql)) {
                                                ?>
                                                <h4><?php echo htmlentities($data['pName']); ?>'s Report | General Details
                                                </h4>
                                                <p><b>Report Registered Date: </b><?php echo htmlentities($data['createdAt']); ?></p>
                                                <hr/>
                                                <form role="form" name="editLabReport" method="post" onSubmit="return valid();">
        
                                                <div class="form-group">
															<label for="wbc">
																WBCs
															</label>
															<input type="text" class="form-control" name="wbc" value="<?php echo htmlentities($data['wbc']); ?>">
														</div>
                                                        <div class="form-group">
															<label for="rbc">
																RBCs
															</label>
															<input type="text" class="form-control" name="rbc" value="<?php echo htmlentities($data['rbc']); ?>">
														</div>
														<div class="form-group">
															<label for="hb">
																HB
															</label>
															<input type="text" class="form-control" name="hb" value="<?php echo htmlentities($data['hb']); ?>">
														</div>
                                                        <div class="form-group">
															<label for="plates">
																Plates
															</label>
															<input type="text" class="form-control" name="plates" value="<?php echo htmlentities($data['plates']); ?>">
														</div>
                                                        <div class="form-group">
															<label for="neutrophils">
                                                                Neutrophils
															</label>
															<input type="text" class="form-control" name="neutrophils" value="<?php echo htmlentities($data['neutrophils']); ?>">
														</div>
                                                        <div class="form-group">
															<label for="lymphocytes">
                                                                Lymphocytes
															</label>
															<input type="text" class="form-control" name="lymphocytes" value="<?php echo htmlentities($data['lymphocytes']); ?>">
														</div>
                                                        <div class="form-group">
															<label for="monocytes">
                                                                Monocytes
															</label>
															<input type="text" class="form-control" name="monocytes" value="<?php echo htmlentities($data['monocytes']); ?>">
														</div>
                                                        <div class="form-group">
															<label for="magnesium">
                                                                Magnesium
															</label>
															<input type="text" class="form-control" name="magnesium" value="<?php echo htmlentities($data['magnesium']); ?>">
														</div>
                                                        <div class="form-group">
															<label for="calcium">
                                                                Calcium
															</label>
															<input type="text" class="form-control" name="calcium" value="<?php echo htmlentities($data['calcium']); ?>">
														</div>
                                                        <div class="form-group">
															<label for="hematocrit">
                                                                Hematocrit
															</label>
															<input type="text" class="form-control" name="hematocrit" value="<?php echo htmlentities($data['hematocrit']); ?>">
														</div>

                                                    <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                        Update
                                                    </button>
                                                </form>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('include/footer.php'); ?>
            <?php include('include/setting.php'); ?>
        </div>
    </div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="vendor/autosize/autosize.min.js"></script>
<script src="vendor/selectFx/classie.js"></script>
<script src="vendor/selectFx/selectFx.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/form-elements.js"></script>
<script>
    jQuery(document).ready(function () {
        Main.init();
        FormElements.init();
    });
</script>
</body>
</html>

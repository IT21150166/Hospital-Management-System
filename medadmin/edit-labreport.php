<?php
include('include/config.php');

$did = intval($_GET['id']); // get doctor id

if (isset($_POST['submit'])) {
	
    $pid = $_POST['pid'];
    $pName = $_POST['pName'];
    $pAge = $_POST['pAge'];
    $pGender = $_POST['pGender'];
    $cDate = $_POST['cDate'];
    $cTime = $_POST['cTime'];
    $sName = $_POST['sName'];

    /*$sql = mysqli_query($con, "UPDATE labreport SET pid = '$pid', pName = '$pName', pAge = '$pAge', pGender = '$pGender', cDate = '$cDate', cTime = '$cTime', sName = '$sName' WHERE rid = '$did'");
    if ($sql) {
        $msg = "Lab Report Updated Successfully";
    }*/
	$sql = "UPDATE labreport 
        SET pid = ?, pName = ?, pAge = ?, pGender = ?, cDate = ?, cTime = ?, sName = ? 
        WHERE rid = $did";

if ($stmt = mysqli_prepare($con, $sql)) {
    mysqli_stmt_bind_param($stmt, "sssssss", $pid, $pName, $pAge, $pGender, $cDate, $cTime, $sName);

    if (mysqli_stmt_execute($stmt)) {
        $msg = "Lab Report Updated Successfully";
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
                            <h1 class="mainTitle">MedLabAdmin | Edit Lab Report | Personal Details</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>MedLabAdmin</span>
                            </li>
                            <li class="active">
                                <span>Edit General Details</span>
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
                                            <h5 class="panel-title">Edit General Details</h5>
                                        </div>
                                        <div class="panel-body">
                                            <?php
                                            $sql = mysqli_query($con, "SELECT pid, pName, pAge, pGender, cDate, cTime, sName, createdAt FROM labreport WHERE rid = $did");
                                            while ($data = mysqli_fetch_array($sql)) {
                                                ?>
                                                <h4><?php echo htmlentities($data['pName']); ?>'s Report | General Details
                                                </h4>
                                                <p><b>Report Registered Date: </b><?php echo htmlentities($data['createdAt']); ?></p>
                                                <hr/>
                                                <form role="form" name="editLabReport" method="post" onSubmit="return valid();">
        
                                                    <div class="form-group">
                                                        <label for="patientID">
                                                            Patient ID
                                                        </label>
                                                        <input type="text" name="pid" class="form-control"
                                                               value="<?php echo htmlentities($data['pid']); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="patienName">
                                                            Patient Name
                                                        </label>
                                                        <input type="text" name="pName" class="form-control"
                                                               value="<?php echo htmlentities($data['pName']); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="patienAge">
                                                            Patient Age
                                                        </label>
                                                        <input type="text" name="pAge" class="form-control" value="<?php echo htmlentities($data['pAge']); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="patientGender">
                                                            Patient Gender
                                                        </label>
                                                        <select name="pGender" class="form-control">
                                                            <option value="<?php echo htmlentities($data['pGender']); ?>">
                                                                <?php echo htmlentities($data['pGender']); ?>
                                                            </option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                            <option value="Others">Others</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="conductedDat">
                                                            Conducted Date
                                                        </label>
                                                        <input type="date" name="cDate" class="form-control"
                                                               value="<?php echo htmlentities($data['cDate']); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="conductedTime">
                                                            Conducted Time
                                                        </label>
                                                        <input type="time" name="cTime" class="form-control"
                                                               value="<?php echo htmlentities($data['cTime']); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="staffName">
                                                            Staff Name
                                                        </label>
                                                        <input type="text" name="sName" class="form-control"
                                                               value="<?php echo htmlentities($data['sName']); ?>">
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

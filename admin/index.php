<?php
session_start();
include ('include/DBController.php');
$db = new DBController();

if(!isset($_SESSION['admin'])){
    echo "
    <script>
    window.location.href = 'Login';
</script>
    ";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>YT - Admin Dashboard</title>
    <?php include ('include/css.php');?>

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <?php include ('include/preloader.php');?>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include ('include/navbar_header.php');?>
        <!--**********************************
            Nav header end
        ***********************************-->

		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Dashboard
                            </div>
                        </div>
                        <?php include ('include/header.php');?>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include ('include/sidebar.php');?>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-xxl-12">
						<div class="row">
							<div class="col-sm-4">
								<div class="card avtivity-card">
									<div class="card-body">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="fs-14 mb-2">No of Category</p>
												<span class="title text-black font-w600">
                                                    <?php
                                                    $fetch_no_cat = $db->numRows("select * from category");
                                                    echo $fetch_no_cat;
                                                    ?>
                                                </span>
											</div>
										</div>
										<div class="progress" style="height:5px;">
											<div class="progress-bar bg-success" style="width: 100%; height:5px;" role="progressbar">
											</div>
										</div>
									</div>
									<div class="effect bg-success"></div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="card avtivity-card">
									<div class="card-body">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="fs-14 mb-2">No of Sub-Category</p>
												<span class="title text-black font-w600">
                                                    <?php
                                                    $fetch_no_sub_cat = $db->numRows("select * from sub_category");
                                                    echo $fetch_no_sub_cat;
                                                    ?>
                                                </span>
											</div>
										</div>
										<div class="progress" style="height:5px;">
											<div class="progress-bar bg-secondary" style="width: 100%; height:5px;" role="progressbar">
											</div>
										</div>
									</div>
									<div class="effect bg-secondary"></div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="card avtivity-card">
									<div class="card-body">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="fs-14 mb-2">No of Industry Type</p>
												<span class="title text-black font-w600">
                                                    <?php
                                                    $fetch_no_industry = $db->numRows("select * from industry_type");
                                                    echo $fetch_no_industry;
                                                    ?>
                                                </span>
											</div>
										</div>
										<div class="progress" style="height:5px;">
											<div class="progress-bar bg-danger" style="width: 100%; height:5px;" role="progressbar">
											</div>
										</div>
									</div>
									<div class="effect bg-danger"></div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="card avtivity-card">
									<div class="card-body">
										<div class="media align-items-center">
											<div class="media-body">
												<p class="fs-14 mb-2">No of Company</p>
												<span class="title text-black font-w600">
                                                    <?php
                                                    $fetch_no_company = $db->numRows("select * from company");
                                                    echo $fetch_no_company;
                                                    ?>
                                                </span>
											</div>
										</div>
										<div class="progress" style="height:5px;">
											<div class="progress-bar bg-warning" style="width: 100%; height:5px;" role="progressbar">
											</div>
										</div>
									</div>
									<div class="effect bg-warning"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <?php include ('include/footer.php');?>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
<?php include ('include/js.php');?>
</body>

</html>
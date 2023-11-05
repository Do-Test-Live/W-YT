<?php
include('admin/include/DBController.php');
$db = new DBController();
if(isset($_GET['industry'])){
    $industry = $_GET['industry'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YT</title>

    <!-- favicons and shortcut icons -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/slick/slick.css">
    <link rel="stylesheet" href="assets/vendors/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/vendors/editable-select/jquery-editable-select.css">
    <link rel="stylesheet" href="assets/vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="ctn-preloader" class="ctn-preloader">
        <div class="round_spinner">
            <div class="spinner"></div>
            <div class="text">
                <img class="mx-auto" src="assets/img/logo-black.png" alt="Logo"/>
            </div>
        </div>
    </div>
</div>
<!-- Header Area -->
<header class="header-area">
    <nav class="navbar navbar-expand-lg header-menu">
        <div class="container">
            <a class="navbar-brand sticky_logo" href="index.php">
                <img class="main" src="assets/img/logo.png" srcset="assets/img/logo@2x.png 2x" alt="logo">
                <img class="sticky" src="assets/img/logo-black.png" srcset="assets/img/logo-black@2x.png 2x" alt="logo">
            </a>
        </div>
    </nav>
</header>
<!-- Header Area -->

<main>
    <!-- Banner Area -->
    <section class="breadcrumb-area" style="background-image: url(assets/img/banner/banner-job.png);">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-9 mx-auto text-center">
                    <h1 class="banner-title">公司 </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area -->

    <!-- Job posts start -->
    <section class="pt-110 pb-130 bg_disable">
        <div class="container">
            <div class="row">
                <!-- Right bar -->
                <div class="col-lg-12">
                    <div class="job-post-widget">
                        <div class="sidebar-header d-flex justify-content-between align-items-center mt-4 mt-lg-0">
                            <div class="sidebar-title">
                                <h4 class="wow fadeInRight" style="font-size: 40px;">公司 </h4>
                            </div>
                        </div>
                        <?php
                        $fetch_company = $db->runQuery("select * from company where industry_type_id = '$industry' order by company_id desc");
                        $no_fetch_company  = $db->numRows("select * from company where industry_type_id = '$industry' order by company_id desc");
                        for ($j=0; $j < $no_fetch_company; $j++){
                            ?>
                            <div class="single-job-post me-1 wow fadeInUp mt-25">
                                <div class="post-header">
                                    <div>
                                        <h6 class="job-title"><a href="#"><?php echo $fetch_company[$j]['company_name'];?></a> </h6>
                                        <div class="d-flex flex-wrap">
                                            <div class="job-location"> <i
                                                    class="las la-phone"></i>
                                                <?php echo $fetch_company[$j]['phone'];?>
                                            </div>
                                            <div class="job-location"> <i
                                                    class="las la-map-marker-alt"></i>
                                                <?php echo $fetch_company[$j]['location'];?>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <div class="job-location"> <i
                                                    class="las la-print"></i>
                                                <?php echo $fetch_company[$j]['fax'];?>
                                            </div>
                                            <div class="job-location"> <i
                                                    class="las la-home"></i><a target="_blank" href="<?php echo $fetch_company[$j]['website'];?>">
                                                    <?php echo $fetch_company[$j]['website'];?>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Job posts end -->
</main>

<!-- Footer Area -->
<section class="footer-area pt-130 pb-100">
    <div class="container">
        <div class="footer-content-top pb-70">
            <a class="wow fadeInRight" href="index.html"><img src="assets/img/logo.png" alt="Logo"/></a>
            <div class="d-flex flex-wrap justify-content-xl-between justify-content-center wow fadeInRight"
                 data-wow-delay="0.3s">
                <div class="right-content mt-3">
                    <div class="footer-search-form wow fadeInLeft">
                        <p class="Subscribe-title mb-20">Quick Support</p>
                        <form action="#">
                            <div class="d-sm-flex justify-content-end footer-search">
                                <div>
                                    <input type="text" class="form-control email-form"
                                           placeholder="Your email address"/>
                                </div>
                                <button class="btn-Subscribe" type="submit">
                                    Subscribe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-30 footer-content d-flex flex-lg-row flex-column wow fadeInUp" data-wow-delay="0.5">
            <div class="footer-terms">
                <a href="#">Terms & Conditions</a>
                <a href="#">Privacy</a>
                <a href="#">Feedbacks</a>
            </div>
            <div class="social-icon text-center">
                <a href="#"><i class="lab la-facebook-f"></i></a>
                <a href="#"><i class="lab la-twitter"></i></a>
                <a href="#"><i class="lab la-instagram"></i></a>
                <a href="#"><i class="lab la-linkedin-in"></i></a>
            </div>
            <div class="text-end">
                <p>Copyright © 2023 YT</p>
            </div>
        </div>
    </div>
</section>
<!-- Footer Area -->

<!-- Back to top button -->
<a id="back-to-top" title="Back to Top"><i class="las la-angle-up"></i></a>

<!-- scripts -->
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendors/slick/slick.min.js"></script>
<script src="assets/vendors/nice-select/jquery.nice-select.min.js"></script>
<script src="assets/vendors/editable-select/jquery-editable-select.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/script.js"></script>
</body>

</html>
<?php
include('admin/include/DBController.php');
$db = new DBController();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>YT</title>

    <!-- favicons and shortcut icons -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon"/>

    <!-- stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/line-awesome.min.css"/>
    <link rel="stylesheet" href="assets/vendors/slick/slick.css"/>
    <link rel="stylesheet" href="assets/vendors/slick/slick-theme.css"/>
    <link rel="stylesheet" href="assets/css/animate.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="assets/css/responsive.css"/>
    <style>
        .horizontal-list {
            list-style: none;
            padding: 0;
        }

        .horizontal-list li {
            display: inline-block; /* Display items side by side */
            margin-right: 10%; /* Add some spacing between items */
        }
    </style>
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
    <section class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-10 mx-auto text-center">
                    <h1 class="banner-title wow fadeInUp">要搜索什麼</h1>
                    <div class="listing-search-form mt-50 wow fadeInUp" data-wow-delay="0.5s">
                        <form action="#" class="d-flex text-center wrapper-form">
                            <div class="input-group">
                                <input type="text" class="form-control geoLocationInp" placeholder="組織名稱"/>
                                <span class="input-group-text"></span>
                            </div>
                            <button class="btn" type="submit"><i class="las la-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area -->


    <!-- Categoris Area -->
    <section class="pt-5 pb-5">
        <div class="container">
                            <div class="row text-center">
                                <div class="col-xl-12">
                                    <ul class="horizontal-list">
                                        <?php
                                        $fetch_cat = $db->runQuery("select * from category order by category_id desc");
                                        $no_fetch_cat = $db->numRows("select * from category order by category_id desc");
                                        for($i=0; $i < $no_fetch_cat; $i++){
                                            ?>
                                            <li>
                                                <a href="category_details.php?cat=<?php echo $fetch_cat[$i]['category_id'];?>"><i class="las la-caret-right"></i><?php echo $fetch_cat[$i]['category_name'];?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
    </section>
    <!-- Categoris Area -->

    <!-- section-divider -->
    <div class="bg-gray">
        <div class="container section-divider"></div>
    </div>
    <!-- section-divider -->


    <!-- Business Process Area -->
    <section class="business-process-area pt-lg-115 pb-lg-130 pt-80 pb-90 wow fadeInUp">
        <div class="container">
            <div class="text-center mb-85">
                <h2 class="section-title">About Us</h2>
            </div>
            <div class="row gy-lg-0 gy-5">
                <div class="col-lg-3 offset-lg-1 col-md-6">
                    <div class="business-process-item">
                        <p class="process-number">1</p>

                        <h4 class="process-title">Over 60 years</h4>
                        <p class="para-2">
                            Serving Hong Kong
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6">
                    <div class="business-process-item">
                        <p class="process-number">2</p>

                        <h4 class="process-title">More than 250,000</h4>
                        <p class="para-2">
                            Local company information
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6 mx-auto mx-lg-0">
                    <div class="business-process-item">
                        <p class="process-number">3</p>

                        <h4 class="process-title">More than 15 years</h4>
                        <p class="para-2">
                            Multimedia marketing experience
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Business Process Area -->

    <!-- CTA Area -->
    <section class="cta-area pt-100 pb-100 ">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-8">
                    <h2 class="wow fadeInRight">Join Our Community</h2>
                    <p class="sub-regular-1 wow fadeInRight" data-wow-delay="0.3s">
                        Earn extra income and unlock new opportunities by advertising
                        your business
                    </p>
                    <a href="#" class="btn btn-brand btn-brand-2 wow fadeInRight" data-wow-delay="0.6s">BECOME A
                        HOST</a>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Area -->

    <!-- Articles & Tips Area -->
    <section class="article-area pt-lg-115 pb-lg-100 pt-80 pb-90">
        <div class="container">
            <div class="text-center mb-70">
                <h2 class="section-title">Latest News</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-10 mx-auto wow fadeInUp" data-wow-delay="0.1s">
                    <div class="article-widget pb-40">
                        <img src="assets/img/articles/articles-img.png" alt="articles-img"/>
                        <a href="blog-details.html">
                            <h5 class="article-title hover-underlibne pt-30 mb-20">
                                Internet Banner Advertising Most Reliable
                            </h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 mx-auto wow fadeInUp" data-wow-delay="0.3s">
                    <div class="article-widget pb-40">
                        <img src="assets/img/articles/articles-img.png" alt="articles-img"/>
                        <a href="blog-details.html">
                            <h5 class="article-title hover-underlibne pt-30 mb-20">
                                Is It Worth Buying A Premium Form Builder
                            </h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 mx-auto wow fadeInUp" data-wow-delay="0.5s">
                    <div class="article-widget pb-40">
                        <img src="assets/img/articles/articles-img.png" alt="articles-img"/>
                        <a href="blog-details.html">
                            <h5 class="article-title hover-underlibne pt-30 mb-20">
                                Top 15 Romantic Date Ideas for Toronto Couples
                            </h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 mx-auto wow fadeInUp" data-wow-delay="0.1s">
                    <div class="article-widget pb-40">
                        <img src="assets/img/articles/articles-img.png" alt="articles-img"/>
                        <a href="blog-details.html">
                            <h5 class="article-title hover-underlibne pt-30 mb-20">
                                Internet Banner Advertising Most Reliable
                            </h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 mx-auto wow fadeInUp" data-wow-delay="0.3s">
                    <div class="article-widget pb-40">
                        <img src="assets/img/articles/articles-img.png" alt="articles-img"/>
                        <a href="blog-details.html">
                            <h5 class="article-title hover-underlibne pt-30 mb-20">
                                Is It Worth Buying A Premium Form Builder
                            </h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 mx-auto wow fadeInUp" data-wow-delay="0.5s">
                    <div class="article-widget pb-40">
                        <img src="assets/img/articles/articles-img.png" alt="articles-img"/>
                        <a href="blog-details.html">
                            <h5 class="article-title hover-underlibne pt-30 mb-20">
                                Top 15 Romantic Date Ideas for Toronto Couples
                            </h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Articles & Tips Area -->

    <!-- Brand Area -->
    <section class="brand-area bg-gray pt-80 pb-80">
        <div class="container">
            <div>
                <h2 class="text-center" style="padding-bottom: 50px">Our Clients</h2>
            </div>
            <div class="row brand-item gy-lg-0 gy-3">
                <div class="col-lg-3 col-sm-4 col-6 ">
                    <img src="assets/img/icons/brand-logo-01.png" alt="Logo"/>
                </div>
                <div class="col-lg-3  col-sm-4 col-6">
                    <img src="assets/img/icons/brand-logo-02.png" alt="Logo"/>
                </div>
                <div class="col-lg-3  col-sm-4 col-6">
                    <img src="assets/img/icons/brand-logo-03.png" alt="Logo"/>
                </div>
                <div class="col-lg-3  col-sm-4 col-6">
                    <img src="assets/img/icons/brand-logo-04.png" alt="Logo"/>
                </div>
                <div class="col-lg-3 col-sm-4 col-6 pt-5">
                    <img src="assets/img/icons/brand-logo-01.png" alt="Logo"/>
                </div>
                <div class="col-lg-3  col-sm-4 col-6 pt-5">
                    <img src="assets/img/icons/brand-logo-02.png" alt="Logo"/>
                </div>
                <div class="col-lg-3  col-sm-4 col-6 pt-5">
                    <img src="assets/img/icons/brand-logo-03.png" alt="Logo"/>
                </div>
                <div class="col-lg-3  col-sm-4 col-6 pt-5">
                    <img src="assets/img/icons/brand-logo-04.png" alt="Logo"/>
                </div>

            </div>
        </div>
    </section>
    <!-- Brand Area -->
</main>

<!-- Footer Area -->
<section class="footer-area pt-130 pb-10">
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
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="../../unpkg.com/ionicons%405.4.0/dist/ionicons.js"></script>
</body>


</html>
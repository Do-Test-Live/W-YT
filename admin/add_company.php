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
                            Add Company
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
                    <!--main content goes here-->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Company</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="Insert" method="POST">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Select Category Name</label>
                                        <div class="col-sm-9">
                                            <select class="form-control default-select" required name="cat_id" id="catSelect">
                                                <option value="0">Select Category</option>
                                                <?php
                                                $fetch_cat = $db->runQuery("select * from category order by category_id desc");
                                                $no_fetch_cat = $db->numRows("select * from category order by category_id desc");
                                                for ($i=0; $i<$no_fetch_cat; $i++){
                                                    ?>
                                                    <option value="<?php echo $fetch_cat[$i]['category_id'];?>"><?php echo $fetch_cat[$i]['category_name'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Select Category Name</label>
                                        <div class="col-sm-9">
                                            <select class="form-control default-select" id="subCatSelect" required name="sub_cat">
                                                <option value="0">Select SubCategory</option>
                                                <?php
                                                $fetch_sub_cat = $db->runQuery("select * from sub_category order by cat_id desc");
                                                $no_fetch_sub_cat = $db->numRows("select * from sub_category order by cat_id desc");
                                                for ($i=0; $i<$no_fetch_sub_cat; $i++){
                                                    ?>
                                                    <option value="<?php echo $fetch_sub_cat[$i]['sub_cat_id'];?>"><?php echo $fetch_sub_cat[$i]['sub_cat_name'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Select Industry Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control default-select" required name="industry_type">
                                                <option value="0">Select Industry Type</option>
                                                <?php
                                                $fetch_industry = $db->runQuery("select * from industry_type order by industry_type_id desc");
                                                $no_fetch_industry = $db->numRows("select * from industry_type order by industry_type_id desc");
                                                for ($i=0; $i<$no_fetch_industry; $i++){
                                                    ?>
                                                    <option value="<?php echo $fetch_industry[$i]['industry_type_id'];?>"><?php echo $fetch_industry[$i]['industry_name'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Company Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="company_name" class="form-control" placeholder="Company Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Fax</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="fax" class="form-control" placeholder="Fax Number" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Website</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="website" class="form-control" placeholder="https://xyz.com" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="address" class="form-control" placeholder="Address" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="add_company" class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                </form>
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
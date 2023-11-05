<?php
session_start();
include('include/DBController.php');
$db = new DBController();

if (!isset($_SESSION['admin'])) {
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
    <?php include('include/css.php'); ?>

</head>
<body>

<!--*******************
    Preloader start
********************-->
<?php include('include/preloader.php'); ?>
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
    <?php include('include/navbar_header.php'); ?>
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
                            Company Details
                        </div>
                    </div>
                    <?php include('include/header.php'); ?>
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
    <?php include('include/sidebar.php'); ?>
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
                    <?php
                    if (isset($_GET['edit'])) {
                        $id = $_GET['edit'];
                        $fetch_company_details = $db->runQuery("select * from company where company_id = '$id'");
                        $cat_id = $fetch_company_details[0]['cat_id'];
                        $sub_cat_id = $fetch_company_details[0]['sub_cat_id'];
                        $industry_type_id = $fetch_company_details[0]['industry_type_id'];
                        $fetch_cat_name = $db->runQuery("select * from category where category_id = '$cat_id'");
                        $fetch_sub_cat_name = $db->runQuery("select * from sub_category where sub_cat_id = '$sub_cat_id'");
                        $fetch_industry_type = $db->runQuery("select * from industry_type where industry_type_id = '$industry_type_id'");
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Company</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="Update" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Select Category Name</label>
                                            <div class="col-sm-9">
                                                <select class="form-control default-select" id="sel1" required name="cat_id">
                                                    <option value="<?php echo $cat_id;?>"><?php echo $fetch_cat_name[0]['category_name'];?></option>
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
                                            <label class="col-sm-3 col-form-label">Select SubCategory Name</label>
                                            <div class="col-sm-9">
                                                <select class="form-control default-select" id="sel1" required name="sub_cat_id">
                                                    <option value="<?php echo $sub_cat_id;?>"><?php echo $fetch_sub_cat_name[0]['sub_cat_name'];?></option>
                                                    <?php
                                                    $fetch_sub_cat = $db->runQuery("select * from sub_category order by sub_cat_id desc");
                                                    $no_fetch_sub_cat = $db->numRows("select * from sub_category order by sub_cat_id desc");
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
                                                <select class="form-control default-select" id="sel1" required name="industry_type">
                                                    <option value="<?php echo $industry_type_id;?>"><?php echo $fetch_industry_type[0]['industry_name'];?></option>
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
                                                <input type="text" name="company_name" class="form-control"
                                                       value="<?php echo $fetch_company_details[0]['company_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="phone" class="form-control"
                                                       value="<?php echo $fetch_company_details[0]['phone']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Fax</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="fax" class="form-control"
                                                       value="<?php echo $fetch_company_details[0]['fax']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Website</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="website" class="form-control"
                                                       value="<?php echo $fetch_company_details[0]['website']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="address" class="form-control"
                                                       value="<?php echo $fetch_company_details[0]['location']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" name="update_company" class="btn btn-primary">Update
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Company List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display min-w850">
                                        <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Category Name</th>
                                            <th>SubCategory Name</th>
                                            <th>Industry Type</th>
                                            <th>Company Name</th>
                                            <th>Phone</th>
                                            <th>Fax</th>
                                            <th>Website</th>
                                            <th>Location</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $fetch_company = $db->runQuery("select * from category,sub_category,industry_type,company where category.category_id = company.cat_id and sub_category.sub_cat_id = company.sub_cat_id and industry_type.industry_type_id = company.industry_type_id order by industry_type.cat_id desc;");
                                        $no_fetch_company = $db->numRows("select * from category,sub_category,industry_type,company where category.category_id = company.cat_id and sub_category.sub_cat_id = company.sub_cat_id and industry_type.industry_type_id = company.industry_type_id order by industry_type.cat_id desc;");
                                        for ($i = 0; $i < $no_fetch_company; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $fetch_company[$i]['category_name']; ?></td>
                                                <td><?php echo $fetch_company[$i]['sub_cat_name']; ?></td>
                                                <td><?php echo $fetch_company[$i]['industry_name']; ?></td>
                                                <td><?php echo $fetch_company[$i]['company_name']; ?></td>
                                                <td><?php echo $fetch_company[$i]['phone']; ?></td>
                                                <td><?php echo $fetch_company[$i]['fax']; ?></td>
                                                <td><?php echo $fetch_company[$i]['website']; ?></td>
                                                <td><?php echo $fetch_company[$i]['location']; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="View_Company?edit=<?php echo $fetch_company[$i]['company_id']; ?>"
                                                           class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="Delete?company_id=<?php echo $fetch_company[$i]['company_id'];?>"
                                                           class="btn btn-danger shadow btn-xs sharp"><i
                                                                class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <!--main content goes here-->

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
    <?php include('include/footer.php'); ?>
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

<?php include('include/js.php'); ?>

</body>

</html>
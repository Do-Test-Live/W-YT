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
                            SubCategory Details
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
                        $fetch_industry_details = $db->runQuery("select * from industry_type where industry_type_id = '$id'");
                        $cat_id = $fetch_industry_details[0]['cat_id'];
                        $sub_cat_id = $fetch_industry_details[0]['sub_cat_id'];
                        $fetch_cat_name = $db->runQuery("select * from category where category_id = '$cat_id'");
                        $fetch_sub_cat_name = $db->runQuery("select * from sub_category where sub_cat_id = '$sub_cat_id'");
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Industry</h4>
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
                                            <label class="col-sm-3 col-form-label">SubCategory Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="industry_name" class="form-control"
                                                       value="<?php echo $fetch_industry_details[0]['industry_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" name="update_industry" class="btn btn-primary">Update
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
                                <h4 class="card-title">Industry List</h4>
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
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $fetch_industry = $db->runQuery("select * from category,sub_category,industry_type where category.category_id = industry_type.cat_id and sub_category.sub_cat_id = industry_type.sub_cat_id order by industry_type.cat_id desc");
                                        $no_fetch_industry = $db->numRows("select * from category,sub_category,industry_type where category.category_id = industry_type.cat_id and sub_category.sub_cat_id = industry_type.sub_cat_id order by industry_type.cat_id desc");
                                        for ($i = 0; $i < $no_fetch_industry; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $fetch_industry[$i]['category_name']; ?></td>
                                                <td><?php echo $fetch_industry[$i]['sub_cat_name']; ?></td>
                                                <td><?php echo $fetch_industry[$i]['industry_name']; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="View_Industry?edit=<?php echo $fetch_industry[$i]['industry_type_id']; ?>"
                                                           class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="Delete?industry_id=<?php echo $fetch_industry[$i]['industry_type_id'];?>"
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
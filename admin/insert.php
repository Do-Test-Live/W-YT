<?php
session_start();
include ('include/DBController.php');
$db = new DBController();
date_default_timezone_set("Asia/Hong_Kong");

if(!isset($_SESSION['admin'])){
    echo "
    <script>
    window.location.href = 'Login';
</script>
    ";
}

/*add category*/
if(isset($_POST['add_cat'])){
    $cat_name = $db->checkValue($_POST['cat_name']);
    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db->insertQuery("INSERT INTO `category`(`category_name`, `created_at`) VALUES ('$cat_name','$inserted_at')");
    if($insert){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Category';
                </script>";
    } else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Add-Category';
                </script>";
    }
}

/*add subcategory*/
if(isset($_POST['add_subcat'])){
    $cat_id = $db->checkValue($_POST['cat_id']);
    $subcat_name = $db->checkValue($_POST['subcat_name']);
    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db->insertQuery("INSERT INTO `sub_category`(`cat_id`, `sub_cat_name`, `created_at`) VALUES ('$cat_id','$subcat_name','$inserted_at')");
    if($insert){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add_SubCategory';
                </script>";
    } else {
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Add_SubCategory';
                </script>";
    }
}


/*add industry*/
if(isset($_POST['add_industry'])){
    $cat_id = $db->checkValue($_POST['cat_id']);
    $sub_cat = $db->checkValue($_POST['sub_cat']);
    $industry_name = $db->checkValue($_POST['industry_name']);
    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db->insertQuery("INSERT INTO `industry_type`(`industry_name`, `cat_id`, `sub_cat_id`, `created_at`) VALUES ('$industry_name','$cat_id','$sub_cat','$inserted_at')");
    if($insert){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add_Industry';
                </script>";
    }else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Add_Industry';
                </script>";
    }
}


/*add company*/
if(isset($_POST['add_company'])){
    $cat_id = $db->checkValue($_POST['cat_id']);
    $sub_cat = $db->checkValue($_POST['sub_cat']);
    $industry_type = $db->checkValue($_POST['industry_type']);
    $company_name = $db->checkValue($_POST['company_name']);
    $phone = $db->checkValue($_POST['phone']);
    $fax = $db->checkValue($_POST['fax']);
    $website = $db->checkValue($_POST['website']);
    $address = $db->checkValue($_POST['address']);
    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db->insertQuery("INSERT INTO `company`(`cat_id`, `sub_cat_id`, `industry_type_id`, `company_name`, `phone`, `fax`, `website`, `location`, `inserted_at`) VALUES ('$cat_id','$sub_cat','$industry_type','$company_name','$phone','$fax','$website','$address','$inserted_at')");
    if($insert){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add_Company';
                </script>";
    }else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Add_Company';
                </script>";
    }
}
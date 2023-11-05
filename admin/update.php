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

/*update category*/
if(isset($_POST['update_cat'])){
    $id = $db->checkValue($_POST['id']);
    $cat_name = $db->checkValue($_POST['cat_name']);
    $updated_at = date("Y-m-d H:i:s");

    $update = $db->insertQuery("UPDATE `category` SET `category_name`='$cat_name',`updated_at`='$updated_at' WHERE category_id = '$id'");
    if($update){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='View_Category';
                </script>";
    } else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='View_Category';
                </script>";
    }
}


/*update subcategory*/
if(isset($_POST['update_sub_cat'])){
    $id = $db->checkValue($_POST['id']);
    $cat_id = $db->checkValue($_POST['cat_id']);
    $sub_cat_name = $db->checkValue($_POST['sub_cat_name']);
    $updated_at = date("Y-m-d H:i:s");

    $update = $db->insertQuery("UPDATE `sub_category` SET `cat_id`='$cat_id',`sub_cat_name`='$sub_cat_name',`updated_at`='$updated_at' WHERE `sub_cat_id` = '$id'");
    if($update){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='View_SubCategory';
                </script>";
    }else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='View_SubCategory';
                </script>";
    }
}


/*update industry*/
if(isset($_POST['update_industry'])){
    $id = $db->checkValue($_POST['id']);
    $cat_id = $db->checkValue($_POST['cat_id']);
    $sub_cat_id = $db->checkValue($_POST['sub_cat_id']);
    $industry_name = $db->checkValue($_POST['industry_name']);
    $updated_at = date("Y-m-d H:i:s");

    $update = $db->insertQuery("UPDATE `industry_type` SET `industry_name`='$industry_name',`cat_id`='$cat_id',`sub_cat_id`='$sub_cat_id',`updated_at`='$updated_at' WHERE industry_type_id = '$id'");
    if($update){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='View_Industry';
                </script>";
    }else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='View_Industry';
                </script>";
    }
}


/*update company*/
if(isset($_POST['update_company'])){
    $id = $db->checkValue($_POST['id']);
    $cat_id = $db->checkValue($_POST['cat_id']);
    $sub_cat_id = $db->checkValue($_POST['sub_cat_id']);
    $industry_type = $db->checkValue($_POST['industry_type']);
    $company_name = $db->checkValue($_POST['company_name']);
    $phone = $db->checkValue($_POST['phone']);
    $fax = $db->checkValue($_POST['fax']);
    $website = $db->checkValue($_POST['website']);
    $address = $db->checkValue($_POST['address']);
    $updated_at = date("Y-m-d H:i:s");

    $update = $db->insertQuery("UPDATE `company` SET `cat_id`='$cat_id',`sub_cat_id`='$sub_cat_id',`industry_type_id`='$industry_type',`company_name`='$company_name',`phone`='$phone',`fax`='$fax',`website`='$website',`location`='$address',`updated_at`='$updated_at' WHERE company_id = '$id'");
    if($update){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='View_Company';
                </script>";
    }else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='View_Company';
                </script>";
    }
}

/*update password*/
if(isset($_POST['update_password'])){
    $old_password = $db->checkValue($_POST['old_pass']);
    $new_password = $db->checkValue($_POST['new_pass']);

    $fetch_old_pass = $db->runQuery("select * from admin where id = {$_SESSION['admin']}");
    $pass = $fetch_old_pass[0]['admin_pass'];

    if($old_password == $pass){
        $update = $db->insertQuery("UPDATE `admin` SET `admin_pass`='$new_password' WHERE `id` = {$_SESSION['admin']}");
        if($update){
            echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Profile';
                </script>";
        } else{
            echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Profile';
                </script>";
        }
    } else{
        echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Profile';
                </script>";
    }
}
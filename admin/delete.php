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


/*Delete Category*/
if(isset($_GET['categoryId'])){
    $id = $_GET['categoryId'];
    $delete_cat = $db->insertQuery("delete from category where category_id = '$id'");
    if($delete_cat){
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


/*delete sub-category*/
if(isset($_GET['sub_category_id'])){
    $id = $_GET['sub_category_id'];
    $delete_sub_cat = $db->insertQuery("DELETE FROM `sub_category` WHERE sub_cat_id = '$id'");
    if($delete_sub_cat){
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


/*delete industry*/
if(isset($_GET['industry_id'])){
    $id = $_GET['industry_id'];
    $delete_industry = $db->insertQuery("DELETE FROM `industry_type` WHERE industry_type_id = '$id'");
    if($delete_industry){
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


/*delete company*/
if(isset($_GET['company_id'])){
    $id = $_GET['company_id'];
    $delete_industry = $db->insertQuery("DELETE FROM `company` WHERE company_id = '$id'");
    if($delete_industry){
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
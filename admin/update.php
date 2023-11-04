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
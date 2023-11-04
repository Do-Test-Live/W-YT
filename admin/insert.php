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
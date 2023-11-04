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
<?php
session_start();
include ('include/DBController.php');
$db = new DBController();

if(isset($_SESSION['admin'])){
    echo "
    <script>
    window.location.href = 'Dashboard';
</script>
    ";
}

if(isset($_POST['login'])){
    $email = $db->checkValue($_POST['email']);
    $password = $db->checkValue($_POST['password']);

    $login_query = $db->runQuery("select * from admin where admin_email = '$email' and admin_pass = '$password'");
    $no = $db->numRows("select * from admin where admin_email = '$email' and admin_pass = '$password'");
    if($no == 1){
        session_start();
        $_SESSION['admin'] = $login_query[0]['id'];
        echo "
        <script>
        document.cookie = 'alert = 1;';
        window.location.href = 'Dashboard';
</script>
        ";
    } else{
        echo "
        <script>
        document.cookie = 'alert = 5;';
        window.location.href = 'Login';
</script>
        ";
    }
}


?>

<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>YT - Admin Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Toastr -->
    <link rel="stylesheet" href="vendor/toastr/css/toastr.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
</head>

<body class="h-100">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <h1 class="text-white">YT</h1>

                                </div>
                                <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Email</strong></label>
                                        <input type="email" name="email" class="form-control" placeholder="hello@example.com">
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1 text-white"><strong>Password</strong></label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn bg-white text-primary btn-block" name="login">Sign Me In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="vendor/global/global.min.js"></script>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/deznav-init.js"></script>

<!-- Toastr -->
<script src="vendor/toastr/js/toastr.min.js"></script>

<!-- All init script -->
<script src="js/plugins-init/toastr-init.js"></script>
</body>

</html>
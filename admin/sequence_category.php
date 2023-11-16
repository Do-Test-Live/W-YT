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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <style>
        #sortable-list li{
            border: 1px solid black;
            font-size: 20px;
            font-weight: 700;
            margin: 10px 0 0 10px;
            padding: 10px;
        }
    </style>

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
                            Category Sequence
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
                    <div class="row">
                        <div class="col-12">
                            <h3>Drag the box in the order you want and save</h3>
                        </div>
                        <div class="col-4 text-center">
                            <ul id="sortable-list">
                                <?php
                                $fetch_cat = $db->runQuery("SELECT * FROM `category` ORDER BY sequence");
                                $no_fetch_cat = $db->numRows("SELECT * FROM `category` ORDER BY sequence");
                                for ($i = 0; $i < $no_fetch_cat; $i++){
                                    ?>
                                    <li data-id="<?php echo $fetch_cat[$i]['category_id'];?>"><?php echo $fetch_cat[$i]['sequence'];?> - <?php echo $fetch_cat[$i]['category_name'];?></li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <div class="text-center">
                                <button id="save-button" class="btn btn-primary w-50 mt-5">Submit</button>
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sortableList = document.getElementById("sortable-list");
        const saveButton = document.getElementById("save-button");

        // Initialize sortable
        const sortable = new Sortable(sortableList, {
            animation: 150,
            ghostClass: "sortable-ghost",
        });

        // Save the new order
        saveButton.addEventListener("click", function() {
            const itemElements = sortableList.querySelectorAll("li");
            const newOrder = Array.from(itemElements).map(item => item.getAttribute("data-id"));

            // Send the new order to the backend
            saveOrderToBackend(newOrder);
        });

        // Send order to PHP backend using Fetch API
        async function saveOrderToBackend(newOrder) {
            try {
                const response = await fetch("save_category_order.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ order: newOrder }),
                });

                if (response.ok) {
                    const data = await response.json();
                    console.log(data.message); // Response from the server
                    alert("Order saved!");
                } else {
                    console.error("Response Error:", response.statusText);
                }
            } catch (error) {
                console.error("Fetch Error:", error);
            }
        }
    });



</script>
</body>

</html>
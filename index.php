<?php
session_start();

$username = $_SESSION['username'];
$status_user = $_SESSION['status_user'];
$id_pengguna = $_SESSION['id_pengguna'];
$id_user = $_SESSION['id_user'];

if ($status_user !== 'admin') {
    echo "
			<script>
				window.location.href = 'login.php'
			</script>
		";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Pangeran Labura</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="img/favicon.png" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css" />
    <!-- EOF CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container page-container">

        <!-- START PAGE SIDEBAR -->
        <?php
        require_once 'assets/menu.php';
        ?>
        <!-- END PAGE SIDEBAR -->

        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <?php
            require_once 'assets/header.php';
            ?>
            <!-- END X-NAVIGATION VERTICAL -->

            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">
<!--                 <li><a href="#">Home</a></li>
                <li class="active">Dashboard</li> -->
            </ul>
            <!-- END BREADCRUMB -->

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">

                <!-- START WIDGETS -->
                <div class="row">
                    <?php
                    if ($_GET) {
                        $page = $_GET['page'];
                        include 'include/' . $page;
                    } else {
                        include 'assets/content.php';
                    }
                    ?>
                </div>
                <!-- END WIDGETS -->
            </div>
            <!-- END PAGE CONTENT WRAPPER -->

        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <?php
    require_once 'assets/footer.php';
    ?>
</body>

</html>
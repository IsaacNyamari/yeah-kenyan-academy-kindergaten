<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$fname = $_SESSION['fname'];
?>

<head>
    <meta charset="utf-8">
    <title>Dashboard - Role Based</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">
    <link rel="shortcut icon" href="../image.png" type="image/x-icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- include fontawesome cdn here -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/v4-shims.min.css" rel="stylesheet">
    <!-- Flaticon Font -->
    <link href="../lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <!-- bootstrap cdn -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">
        <div class="row nav-app-container" style="height: 100vh;">
            <div class="col-sm-2 bg-dark text-white nav-app p-0">
                <div class="logo">
                    <img src="../image.png" alt="Logo" class="img-fluid logo mx-auto d-block mb-2 mt-2">
                </div>
                <ul class="nav-bar sideBar mt-2">
                    <li class="nav-item">
                        <a class="nav-link" title="dashboard" href="#"><i class="fa fa-dashboard" aria-hidden="true"></i> <span class="menu-name">Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="progress" href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <span class="menu-name">Progress</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" title="time-table" href="#"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <span class="menu-name">Time-table</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="me" href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <span class="menu-name">Me</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="settings" href="#"><i class="fa fa-tools" aria-hidden="true"></i> <span class="menu-name">Settings</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="exit" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> <span class="menu-name">Exit</span></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-10 pl-2 pr-2 main-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 ml-0 bg-dark dataDiv text-white">
                            <h1 class="text-center mt-2">Welcome to the Dashboard <?php echo $fname ? $fname : "" ?>!</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tourToggler">
        <div class="tourStartBtn" id="tourStartBtn">
            <p><i class="fa fa-play"></i> Guide</p>
        </div>
    </div>
    <script src="./tour.js"> </script>
</body>

</html>
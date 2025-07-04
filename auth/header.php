<!DOCTYPE html>
<html lang="en">
<?php
require "protect.php";
if (!empty($_SESSION)) {
    $fname = $_SESSION['fname'];
    $role = $_SESSION['role'];
}
require "../includes/functions.php";
$view = new User();
$view_student_result = $view->viewUsers(null,"students");
$view_time_table_result = $view->timeTables();
foreach($view_time_table_result as $timeTable){
   $monday = json_decode($timeTable["monday"],true);
   $tuesday = json_decode($timeTable["tuesday"],true);
   $wednesday = json_decode($timeTable["wednesday"],true);
   $thursday = json_decode($timeTable["thursday"],true);
   $friday = json_decode($timeTable["friday"],true);
}
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
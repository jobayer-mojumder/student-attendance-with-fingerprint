<?php
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="css/tab_layout.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
          rel='stylesheet'>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">Edmin </a>
            <div class="nav-collapse collapse navbar-inverse-collapse">


                <ul class="nav pull-right">
                    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="images/user.png" class="nav-avatar" />
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Your Profile</a></li>
                            <li><a href="#">Edit Profile</a></li>
                            <li><a href="#">Account Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="?page=logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </div>
    </div>
    <!-- /navbar-inner -->
</div>
<!-- /navbar -->
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="sidebar">

                    <?php
                    if($_SESSION['user_type']=='school_admin' OR $_SESSION['user_type']=='school_teacher'){
                    ?>
                    <!--School Admin View-->
                    <ul class="widget widget-menu unstyled">
                        <li class="active"><a href="index.php"><i class="menu-icon icon-dashboard"></i>Dashboard
                            </a></li>

                        <li><a href="?page=students"><i class="menu-icon icon-user"></i>Add Students </a></li>
                        <li><a href="?page=view_students"><i class="menu-icon icon-user-md"></i>View Students </a></li>
                        <li><a href="?page=fingerprint"><i class="menu-icon icon-inbox"></i>Assign Fingerprint <b class="label green pull-right">
                                    11</b> </a></li>
                        <li><a href="?page=attendance"><i class="menu-icon icon-tasks"></i>View Attendance</a></li>
                    </ul>
                    <?php } ?>

                    <?php
                        if($_SESSION['user_type']=='super_admin'){
                    ?>
                    <!--/.Super Admin-nav-->
                    <ul class="widget widget-menu unstyled">
                        <li><a href="?page=institute_reg"><i class="menu-icon icon-user"></i>Institute Registration</a></li>
                        <li><a href="?page=institute_view"><i class="menu-icon icon-user"></i>View Institute</a></li>
                    </ul>
                    <?php } ?>

                    <!--School Admin View-->
                    <?php
                    if($_SESSION['user_type']=='school_admin'){
                        ?>
                    <ul class="widget widget-menu unstyled">
                        <li><a href="?page=operator"><i class="menu-icon icon-bold"></i> Teacher/Operator </a></li>
                        <li><a href="?page=view_operator"><i class="menu-icon icon-book"></i>View Teacher/Operator </a></li>
                    </ul>
                    <?php } ?>
                </div>
                <!--/.sidebar-->
            </div>
<?php
session_start();
require_once("logic/pastor/createpastor.php"); // Adjust the path accordingly
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pastor - Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="home.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>O</b>BC</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Olive</b>BC</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <?php include_once('navigation.php'); ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <small>Welcome Administrator!</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Pastor</h3>
                    </div>
                    <div class="box-body">
                        <form action="addpastor.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="biography">Biography:</label>
                                <textarea id="biography" name="biography" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo:</label>
                                <input type="file" id="photo" name="photo" class="form-control" accept="image/*" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="tel" id="phone" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook URL:</label>
                                <input type="url" id="facebook" name="facebook" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter URL:</label>
                                <input type="url" id="twitter" name="twitter" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram URL:</label>
                                <input type="url" id="instagram" name="instagram" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Add Pastor</button>
                            <a href="adminpastor.php" class="btn btn-primary">Back</a>
                        </form>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /.wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>&copy; 2024 Olive Baptist Church. All rights reserved.</strong>
    </footer>

    <div class="control-sidebar-bg"></div>

    <!-- jQuery 2.1.4 -->
    <script src="assets/js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="assets/js/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>
</html>

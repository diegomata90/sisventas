<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Diego's | WEB </title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
 
  <link rel="stylesheet" type="text/css" href="<?= PATH_ASSETS . '/bower_components/bootstrap/dist/css/bootstrap.min.css' ?>" />  <!-- Tell the browser to be responsive to screen width -->
  <link rel="stylesheet" type="text/css" href="<?= PATH_ASSETS . '/bower_components/font-awesome/css/font-awesome.min.css' ?>" /> <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="<?= PATH_ASSETS . '/bower_components/Ionicons/css/ionicons.min.css' ?>" /> <!-- Ionicons -->
  <link rel="stylesheet" type="text/css" href="<?= PATH_ASSETS . '/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css' ?>" /><!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="<?= PATH_ASSETS . '/dist/css/AdminLTE.min.css' ?>" /> <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="<?= PATH_ASSETS . '/dist/css/skins/_all-skins.min.css' ?>" /> <!-- AdminLTE Skins. Choose a skin from the css/skins -->
  <link rel="stylesheet" type="text/css" href="<?= PATH_ASSETS . '/bower_components/morris.js/morris.css' ?>" /> <!-- Morris chart -->
  <link rel="stylesheet" type="text/css" href="<?= PATH_ASSETS . '/bower_components/jvectormap/jquery-jvectormap.css' ?>" /> <!-- jvectormap -->
  <link rel="stylesheet" type="text/css" href="<?= PATH_ASSETS . '/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' ?>" /> <!-- Date Picker -->
  <link rel="stylesheet" type="text/css" href="<?= PATH_ASSETS . '/bower_components/bootstrap-daterangepicker/daterangepicker.css' ?>" /> <!-- Daterange picker -->
  <link rel="stylesheet" type="text/css" href="<?= PATH_ASSETS . '/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css' ?>" /> <!-- bootstrap wysihtml5 - text editor -->

  <link rel="stylesheet" type="text/css" href="<?= PATH_ASSETS . '/css/bootstrap-select.min.css' ?>" /> <!-- Bootstrap Select  -->

  <!-- Google Font -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <script src="<?= PATH_ASSETS . '/bower_components/jquery/dist/jquery.min.js' ?>" type="text/javascript"></script> 


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?= FOLDER_PATH .'/main' ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>MT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sistema</b> | MaTa</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
        
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?= PATH_ASSETS . 'dist/img/'.$avatar ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?= $email ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?= PATH_ASSETS . 'dist/img/'.$avatar ?>" class="img-circle" alt="User Image">

                <p>
                  <?= $email ?> - Web
                  <small>
                  <?php 
                    if ($rol == 1) {
                      echo "Administrador";
                    } 
                    elseif ($rol == 2) {
                      echo "Usuario";
                    };
                   ?>                    
                  </small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= FOLDER_PATH . '/main/logout' ?>"class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->  
             <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= PATH_ASSETS . 'dist/img/'.$avatar ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $email ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php 
      if ($rol == 1) {
        require 'app/views/Main/menuadmin.php';  
      }elseif ($rol == 2) {
        require 'app/views/Main/menuser.php';
      }      

      ?>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
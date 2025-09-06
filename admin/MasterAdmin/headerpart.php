<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sukrishna</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="customestyle.css">
    <style>
        .brand-link {
            background-color: #8cdde1;
            display: block;
            font-size: 1.25rem;
            line-height: 1.5;
            padding: 1.12rem 0.5rem !important;
            transition: width .3s ease-in-out;
            white-space: nowrap;
        }

        .brand-link .brand-image {
            float: initial;
            line-height: .8 !important;
            margin-left: -0.2rem;
            /* margin-right: 0.5rem; */
            margin-top: -14px !important;
            max-height: 80px;
            width: 100% !important;
        }

        [class*=sidebar-dark-] {
            background-color: #203c55 !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
-->
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-teal navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav font-weight-bold">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index" class="brand-link">
                <img src="../../images/offlicial__logo.png" alt="Admin_logo" class="brand-image elevation-3 bg-white">

            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2 py-md-0">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false" style="height:700px">
                        <li class="nav-item">
                            <a href="index" class="nav-link <?php if ($page == 'index')
                                echo ' active'; ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($page == 'location')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-database"></i>
                                <p>
                                    Location Directory
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Master/Country" class="nav-link <?php if ($innerpage == 'masterpage')
                                        echo ' active'; ?>">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Country</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Master/State" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>State</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Master/District" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>District</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="Master/scrollnews" class="nav-link <?php if ($page == 'snews')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-newspaper"></i>
                                <p>
                                    Scroll News
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="Master/contact" class="nav-link <?php if ($page == 'contact')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-envelope"></i>
                                <p>
                                    Contact's Enquiry
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="Master/download_users" class="nav-link <?php if ($page == 'download_users')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    QR Code Scanner-Data 10th
                                </p>
                            </a>

                        </li>

                        <!--<li class="nav-item">
                            <a href="Master/enquiry" class="nav-link <?php if ($page == 'enquiry')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-envelope"></i>
                                <p>
                                   Student's Enquiry
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            
                        </li>-->

                        <li class="nav-item">
                            <a href="Master/query" class="nav-link <?php if ($page == 'query')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-envelope"></i>
                                <p>
                                    Admission Enquiry
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="Master/scholarship" class="nav-link <?php if ($page == 'scholarship')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-envelope"></i>
                                <p>
                                    Scholarship Enquiry
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="Master/registration" class="nav-link <?php if ($page == 'registration')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    Online Registration
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($page == 'test')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-check"></i>
                                <p>
                                    General Test
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="Master/create-test" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Create Test</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Master/view-test" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>View Test</p>
                                    </a>
                                </li>

                            </ul>
                        </li>



                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($page == 'slider')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-image"></i>
                                <p>
                                    Slider
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="Master/slider" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Slider</p>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($page == 'category')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-edit"></i>
                                <p>
                                    Category Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="Master/category" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($page == 'result')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-newspaper"></i>
                                <p>
                                    Result Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="Master/resultcat" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Create Category/Year</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Create Result</p>
                                    </a>
                                </li>


                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($page == 'news')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-newspaper"></i>
                                <p>
                                    News Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="Master/news" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>News</p>
                                    </a>
                                </li>




                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($page == 'gallery')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-image"></i>
                                <p>
                                    Gallery
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="Master/photo" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Photo Gallery</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Master/video" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Video Gallery</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Master/event" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Event Gallery</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Master/press" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Press Gallery</p>
                                    </a>
                                </li>



                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($page == 'testimonial')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-image"></i>
                                <p>
                                    Testimonial
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="Master/testi-category" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="Master/testimonial" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Testimonial</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="Logout" class="nav-link bg-danger">
                                <i class="nav-icon fas fa-arrow-circle-right"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
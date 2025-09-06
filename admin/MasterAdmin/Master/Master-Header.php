<?php include_once('../../dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Master Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../customestyle.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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

<body class="hold-transition sidebar-mini">
    <noscript>
        <style>
            body,
            html {
                overflow: hidden
            }

            #JsEnable {
                display: none
            }

            #enable-javascript {
                font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif !important;
                background: rgba(0, 0, 0, .5);
                backdrop-filter: saturate(180%) blur(10px);
                padding: 0;
                position: fixed;
                bottom: 0;
                left: 0;
                top: -100px;
                right: 0;
                z-index: 1000;
                opacity: 1;
                visibility: visible;
                height: auto
            }

            #enable-javascript svg {
                width: 100px;
                height: 100px
            }

            #enable-javascript svg path {
                fill: #fff
            }

            #enable-javascript .noscript-style1 {
                background-color: #1434a4;
                color: #fff;
                position: absolute;
                text-align: center;
                padding: 0 30px 30px 30px;
                margin: auto;
                top: 30%;
                left: 0;
                right: 0;
                font-size: 16px;
                font-weight: 400;
                line-height: 1.5em;
                max-width: 670px;
                box-shadow: 0 20px 10px -10px rgba(0, 0, 0, .15);
                border: 15px solid rgba(0, 0, 0, .07);
                overflow: hidden;
                transition: all .6s cubic-bezier(.25, .8, .25, 1);
                -webkit-transform: translateZ(0);
                transform: translateZ(0);
                backface-visibility: visible;
                transition: all .2s ease-in-out, visibility 0s;
                transform-origin: bottom center;
                pointer-events: auto;
                transform: rotateX(0) rotateY(0) rotateZ(0) scale(1);
                opacity: 1;
                animation: Fade .5s;
                -moz-animation: Fade .5s;
                -webkit-animation: Fade .5s;
                -o-animation: Fade .5s
            }

            #enable-javascript .noscript-style1:hover {
                box-shadow: 0 20px 10px -10px rgba(0, 0, 0, .2)
            }

            #enable-javascript .noscript-style1 .JSEnable,
            #enable-javascript .noscript-style1 h4 {
                display: inline-block;
                background: rgba(0, 0, 0, .07);
                padding: 5px 25px 15px 25px;
                font-size: 1.5rem;
                font-weight: 700;
                margin-bottom: 20px
            }
        </style>
        <div id='enable-javascript'>
            <div class='noscript-style1'>
                <span class='JSEnable'>Enable JavaScript</span><br />
                <svg viewBox='0 0 24 24'>
                    <path
                        d='M3,3H21V21H3V3M7.73,18.04C8.13,18.89 8.92,19.59 10.27,19.59C11.77,19.59 12.8,18.79 12.8,17.04V11.26H11.1V17C11.1,17.86 10.75,18.08 10.2,18.08C9.62,18.08 9.38,17.68 9.11,17.21L7.73,18.04M13.71,17.86C14.21,18.84 15.22,19.59 16.8,19.59C18.4,19.59 19.6,18.76 19.6,17.23C19.6,15.82 18.79,15.19 17.35,14.57L16.93,14.39C16.2,14.08 15.89,13.87 15.89,13.37C15.89,12.96 16.2,12.64 16.7,12.64C17.18,12.64 17.5,12.85 17.79,13.37L19.1,12.5C18.55,11.54 17.77,11.17 16.7,11.17C15.19,11.17 14.22,12.13 14.22,13.4C14.22,14.78 15.03,15.43 16.25,15.95L16.67,16.13C17.45,16.47 17.91,16.68 17.91,17.26C17.91,17.74 17.46,18.09 16.76,18.09C15.93,18.09 15.45,17.66 15.09,17.06L13.71,17.86Z' />
                </svg><br />Javascript is disabled on your Browser. To browse this webpage enable javascript from the
                browsers settings.
            </div>
        </div>
    </noscript>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
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
            <a href="../index" class="brand-link">
                <img src="../Images/offli__logo.png" alt="Admin_logo" class="brand-image elevation-3 bg-white">

            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2 py-md-0">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false" style="height:700px">
                        <li class="nav-item">
                            <a href="../index" class="nav-link <?php if ($page == 'index')
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
                                    <a href="Country" class="nav-link <?php if ($innerpage == 'masterpage')
                                        echo ' active'; ?>">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Country</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="State" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>State</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="District" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>District</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="scrollnews" class="nav-link <?php if ($page == 'snews')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-newspaper"></i>
                                <p>
                                    Scroll News
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="contact" class="nav-link <?php if ($page == 'contact')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-envelope"></i>
                                <p>
                                    Contact's Enquiry
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="download_users" class="nav-link <?php if ($page == 'download_users')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    QR Code Scanner-Data 10th
                                </p>
                            </a>

                        </li>

                        <!--<li class="nav-item">
                            <a href="enquiry" class="nav-link <?php if ($page == 'enquiry')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-envelope"></i>
                                <p>
                                   Student's Enquiry
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            
                        </li>-->

                        <li class="nav-item">
                            <a href="query" class="nav-link <?php if ($page == 'query')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-envelope"></i>
                                <p>
                                    Admission Enquiry
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="scholarship" class="nav-link <?php if ($page == 'scholarship')
                                echo ' active'; ?>">
                                <i class="nav-icon fa fa-envelope"></i>
                                <p>
                                    Scholarship Enquiry
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="registration" class="nav-link <?php if ($page == 'registration')
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
                                    <a href="create-test" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Create Test</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="view-test" class="nav-link">
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
                                    <a href="slider" class="nav-link">
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
                                    <a href="category" class="nav-link">
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
                                    <a href="resultcat" class="nav-link">
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
                                    <a href="news" class="nav-link">
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
                                    <a href="photo" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Photo Gallery</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="video" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Video Gallery</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="event" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Event Gallery</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="press" class="nav-link">
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
                                    <a href="testi-category" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="testimonial" class="nav-link">
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
<?php include_once ('dbconnect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Master Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../customestyle.css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
  <link rel="stylesheet" href="../plugins/chosen/chosen.css">
	<!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<noscript><style>body,html{overflow:hidden}#JsEnable{display:none}#enable-javascript{font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen-Sans,Ubuntu,Cantarell,Helvetica Neue,sans-serif!important;background:rgba(0,0,0,.5);backdrop-filter:saturate(180%) blur(10px);padding:0;position:fixed;bottom:0;left:0;top:-100px;right:0;z-index:1000;opacity:1;visibility:visible;height:auto}#enable-javascript svg{width:100px;height:100px}#enable-javascript svg path{fill:#fff}#enable-javascript .noscript-style1{background-color:#1434a4;color:#fff;position:absolute;text-align:center;padding:0 30px 30px 30px;margin:auto;top:30%;left:0;right:0;font-size:16px;font-weight:400;line-height:1.5em;max-width:670px;box-shadow:0 20px 10px -10px rgba(0,0,0,.15);border:15px solid rgba(0,0,0,.07);overflow:hidden;transition:all .6s cubic-bezier(.25,.8,.25,1);-webkit-transform:translateZ(0);transform:translateZ(0);backface-visibility:visible;transition:all .2s ease-in-out,visibility 0s;transform-origin:bottom center;pointer-events:auto;transform:rotateX(0) rotateY(0) rotateZ(0) scale(1);opacity:1;animation:Fade .5s;-moz-animation:Fade .5s;-webkit-animation:Fade .5s;-o-animation:Fade .5s}#enable-javascript .noscript-style1:hover{box-shadow:0 20px 10px -10px rgba(0,0,0,.2)}#enable-javascript .noscript-style1 .JSEnable,#enable-javascript .noscript-style1 h4{display:inline-block;background:rgba(0,0,0,.07);padding:5px 25px 15px 25px;font-size:1.5rem;font-weight:700;margin-bottom:20px}</style>
<div id='enable-javascript'>
<div class='noscript-style1'>
<span class='JSEnable'>Enable JavaScript</span><br/>
<svg viewBox='0 0 24 24'><path d='M3,3H21V21H3V3M7.73,18.04C8.13,18.89 8.92,19.59 10.27,19.59C11.77,19.59 12.8,18.79 12.8,17.04V11.26H11.1V17C11.1,17.86 10.75,18.08 10.2,18.08C9.62,18.08 9.38,17.68 9.11,17.21L7.73,18.04M13.71,17.86C14.21,18.84 15.22,19.59 16.8,19.59C18.4,19.59 19.6,18.76 19.6,17.23C19.6,15.82 18.79,15.19 17.35,14.57L16.93,14.39C16.2,14.08 15.89,13.87 15.89,13.37C15.89,12.96 16.2,12.64 16.7,12.64C17.18,12.64 17.5,12.85 17.79,13.37L19.1,12.5C18.55,11.54 17.77,11.17 16.7,11.17C15.19,11.17 14.22,12.13 14.22,13.4C14.22,14.78 15.03,15.43 16.25,15.95L16.67,16.13C17.45,16.47 17.91,16.68 17.91,17.26C17.91,17.74 17.46,18.09 16.76,18.09C15.93,18.09 15.45,17.66 15.09,17.06L13.71,17.86Z'/></svg><br/>Javascript is disabled on your Browser. To browse this webpage enable javascript from the browsers settings.</div></div>
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4"> 
	<a href="../index" class="brand-link">
      <img src="../dist/img/user2-160x160.jpg" alt="Admin_logo" class="brand-image img-circle elevation-3"> 
      <span class="brand-text font-weight-bold">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">  
      <!-- Sidebar Menu -->
      <nav class="mt-2 py-md-0">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="../index" class="nav-link <?php if($page=='index') echo ' active';?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
		  <li class="nav-item <?php if($page=='location') echo ' menu-open';?>">
            <a href="#" class="nav-link <?php if($page=='location') echo ' active';?>">
              <i class="nav-icon fa fa-database"></i>
              <p>
               Location Directory
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Master/Country" class="nav-link">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Country</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Master/State" class="nav-link ">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>State</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Master/District" class="nav-link ">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>District</p>
                </a>
              </li>              
            </ul>
          </li>
          
		  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-university"></i>
              <p>
               College Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../College-Master/Add-College" class="nav-link">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Add College</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../College-Master/College-List" class="nav-link">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>College List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../College-Master/College-View" class="nav-link <?php if($innerpage=='collegeview') echo ' active';?>">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>College View</p>
                </a>
              </li>              
            </ul>
          </li>
          <li class="nav-item">
                            <a href="#" class="nav-link <?php if ($page == 'universitymaster') echo ' active'; ?>">
                                <i class="nav-icon fa fa-university"></i>
                                <p>
                                    University Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!--<li class="nav-item">
                                    <a href="College-Master/Add-College" class="nav-link">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Add College</p>
                                    </a>
                                </li>-->
                                <li class="nav-item">
                                    <a href="../College-Master/University-List" class="nav-link <?php if($innerpage=='universitylist') echo ' active';?>">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>University List</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
		  <li class="nav-item <?php if($page=='exammaster') echo ' menu-open';?>">
			<a href="#" class="nav-link <?php if ($page == 'exammaster') echo ' active'; ?>">
				<i class="nav-icon fa fa-university"></i>
				<p>
					Exam Master
					<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">
				<li class="nav-item">
					<a href="../Exam-Master/Exam-Level" class="nav-link <?php if($innerpage=='examlevel') echo ' active';?>">
						<i class="fa fa-caret-right nav-icon"></i>
						<p>Exam Level</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="../Exam-Master/Add-Exam" class="nav-link <?php if($innerpage=='addexam') echo ' active';?>">
						<i class="fa fa-caret-right nav-icon"></i>
						<p>Add Exam</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="../Exam-Master/Exam-List" class="nav-link <?php if($innerpage=='examlist') echo ' active';?>">
						<i class="fa fa-caret-right nav-icon"></i>
						<p>Exam List</p>
					</a>
				</li>                           
			</ul>
		</li>
		<li class="nav-item <?php if($page=='adv') echo ' menu-open';?>">
			<a href="#" class="nav-link  <?php if($page=='adv') echo ' active';?>">
				<i class="nav-icon fa fa-ad"></i>
				<p>
					Adv. Master
					<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview"> 
				<li class="nav-item">
					<a href="Add-Adv" class="nav-link <?php if($innerpage=='newadv') echo ' active';?>">
						<i class="fa fa-caret-right nav-icon"></i>
						<p>New Adv.</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="Adv-List" class="nav-link <?php if($innerpage=='advlist') echo ' active';?>">
						<i class="fa fa-caret-right nav-icon"></i>
						<p>Adv List</p>
					</a>
				</li>                           
			</ul>
		</li>
		
		<li class="nav-item">
                            <a href="#" class="nav-link <?php if($page=='notification') echo ' active';?>">
                                <i class="nav-icon fa fa-ad"></i>
                                <p>
                                    Latest Notification
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"> 
                                <li class="nav-item">
                                    <a href="../Master/category" class="nav-link <?php if($innerpage=='category') echo ' active';?>">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Add Category</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../Master/notification" class="nav-link <?php if($innerpage=='notification') echo ' active';?>">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Latest Notification</p>
                                    </a>
                                </li>                           
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link <?php if($page=='testimonial') echo ' active';?>">
                                <i class="nav-icon fa fa-ad"></i>
                                <p>
                                    Student testimonial
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview"> 
                                
                                <li class="nav-item">
                                    <a href="../Master/testimonial" class="nav-link <?php if($innerpage=='testimonial') echo ' active';?>">
                                        <i class="fa fa-caret-right nav-icon"></i>
                                        <p>Student testimonial</p>
                                    </a>
                                </li>                           
                            </ul>
                        </li>
        
		<li class="nav-item  <?php if($page=='enquiry') echo ' menu-open';?>">
			<a href="#" class="nav-link <?php if($page=='enquiry') echo ' active';?>">
				<i class="nav-icon fa fa-users"></i>
				<p>
				   Enquiry Data
					<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview"> 
				<li class="nav-item">
					<a href="Registration-Data" class="nav-link  <?php if($innerpage == 'reg') echo ' active';?>">
						<i class="fa fa-caret-right nav-icon"></i>
						<p>Registration Data</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="Signup-Data" class="nav-link  <?php if($innerpage == 'signup') echo ' active';?>">
						<i class="fa fa-caret-right nav-icon"></i>
						<p>Signup Data</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="Enquiry-Data" class="nav-link  <?php if($innerpage == 'login') echo ' active';?>">
						<i class="fa fa-caret-right nav-icon"></i>
						<p>Enquiry Data</p>
					</a>
				</li>                           
			</ul>
		</li>
	    <li class="nav-item <?php if($page=='extrapage') echo ' menu-open';?>">
			<a href="#" class="nav-link <?php if($page=='extrapage') echo ' active';?>">
				<i class="nav-icon fa fa-cogs"></i>
				<p>
				   Extra Pages
					<i class="right fas fa-angle-left"></i>
				</p>
			</a>
			<ul class="nav nav-treeview"> 
				<li class="nav-item">
					<a href="Page-Create" class="nav-link <?php if($innerpage == 'pagecreate') echo ' active';?>">
						<i class="fa fa-caret-right nav-icon"></i>
						<p>Page Create</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="Page-List" class="nav-link <?php if($innerpage == 'pagelist') echo ' active';?>">
						<i class="fa fa-caret-right nav-icon"></i>
						<p>Page List</p>
					</a>
				</li>
											 
			</ul>
		</li>
		<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../Master/Stream" class="nav-link ">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Stream</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Master/Course-Type" class="nav-link">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Degree Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Master/Course-Name" class="nav-link  ">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Course Name</p>
                </a>
              </li> 
              </li>
              <li class="nav-item">
                <a href="../Master/Course-Name-Branch" class="nav-link ">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Sub-Course Branch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Master/Course-Duration" class="nav-link ">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Course Duration</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Master/Affiliation-Name" class="nav-link">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Affiliation Name</p>
                </a>
              </li>
			  <li class="nav-item">
				<a href="../Master/Approved-By" class="nav-link  ">
					<i class="fa fa-caret-right nav-icon"></i>
					<p>Approved Through</p>
				</a>
			  </li>
              <li class="nav-item">
                <a href="../Master/Exam-Type" class="nav-link">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Exam Through</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Master/Ranking" class="nav-link">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Ranking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Master/Ownership" class="nav-link ">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>Ownership</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../Master/College-Facilities" class="nav-link">
                  <i class="fa fa-caret-right nav-icon"></i>
                  <p>College-Facilities</p>
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
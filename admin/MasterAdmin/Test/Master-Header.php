<?php include_once ('dbconnect.php');?>
<!DOCTYPE html> 
<html lang="en" >
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxiocns CDN Link -->
	<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> 
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> 
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<link rel="stylesheet" href="../customestyle.css">
   </head>
   <noscript><style>body,html{overflow:hidden}#JsEnable{display:none}#enable-javascript{font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen-Sans,Ubuntu,Cantarell,Helvetica Neue,sans-serif!important;background:rgba(0,0,0,.5);backdrop-filter:saturate(180%) blur(10px);padding:0;position:fixed;bottom:0;left:0;top:-100px;right:0;z-index:1000;opacity:1;visibility:visible;height:auto}#enable-javascript svg{width:100px;height:100px}#enable-javascript svg path{fill:#fff}#enable-javascript .noscript-style1{background-color:#1434a4;color:#fff;position:absolute;text-align:center;padding:0 30px 30px 30px;margin:auto;top:30%;left:0;right:0;font-size:16px;font-weight:400;line-height:1.5em;max-width:670px;box-shadow:0 20px 10px -10px rgba(0,0,0,.15);border:15px solid rgba(0,0,0,.07);overflow:hidden;transition:all .6s cubic-bezier(.25,.8,.25,1);-webkit-transform:translateZ(0);transform:translateZ(0);backface-visibility:visible;transition:all .2s ease-in-out,visibility 0s;transform-origin:bottom center;pointer-events:auto;transform:rotateX(0) rotateY(0) rotateZ(0) scale(1);opacity:1;animation:Fade .5s;-moz-animation:Fade .5s;-webkit-animation:Fade .5s;-o-animation:Fade .5s}#enable-javascript .noscript-style1:hover{box-shadow:0 20px 10px -10px rgba(0,0,0,.2)}#enable-javascript .noscript-style1 .JSEnable,#enable-javascript .noscript-style1 h4{display:inline-block;background:rgba(0,0,0,.07);padding:5px 25px 15px 25px;font-size:1.5rem;font-weight:700;margin-bottom:20px}</style>
<div id='enable-javascript'>
<div class='noscript-style1'>
<span class='JSEnable'>Enable JavaScript</span><br/>
<svg viewBox='0 0 24 24'><path d='M3,3H21V21H3V3M7.73,18.04C8.13,18.89 8.92,19.59 10.27,19.59C11.77,19.59 12.8,18.79 12.8,17.04V11.26H11.1V17C11.1,17.86 10.75,18.08 10.2,18.08C9.62,18.08 9.38,17.68 9.11,17.21L7.73,18.04M13.71,17.86C14.21,18.84 15.22,19.59 16.8,19.59C18.4,19.59 19.6,18.76 19.6,17.23C19.6,15.82 18.79,15.19 17.35,14.57L16.93,14.39C16.2,14.08 15.89,13.87 15.89,13.37C15.89,12.96 16.2,12.64 16.7,12.64C17.18,12.64 17.5,12.85 17.79,13.37L19.1,12.5C18.55,11.54 17.77,11.17 16.7,11.17C15.19,11.17 14.22,12.13 14.22,13.4C14.22,14.78 15.03,15.43 16.25,15.95L16.67,16.13C17.45,16.47 17.91,16.68 17.91,17.26C17.91,17.74 17.46,18.09 16.76,18.09C15.93,18.09 15.45,17.66 15.09,17.06L13.71,17.86Z'/></svg><br/>Javascript is disabled on your Browser. To browse this webpage enable javascript from the browsers settings.</div></div>
</noscript>
<body style="overflow-x:hidden;">

  <div class="sidebar ">
    <div class="logo-details ">
      <i class='fa fa-home'></i>
      <span class="logo_name">Admin Panel</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="../index">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Location </span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Locations Directory</a></li>
          <li><a href="../Master/Country">Country</a></li>
          <li><a href="../Master/State">State</a></li>
          <li><a href="../Master/District">District</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Master Data</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Master Data</a></li>
          <li><a href="../Master/Stream">Stream</a></li>
          <li><a href="../Master/Course-Type">Course Type</a></li>
          <li><a href="../Master/Course-Name">Course Name</a></li>
          <li><a href="../Master/Course-Name-Branch">Sub-Course Branch</a></li>
          <li><a href="../Master/Course-Duration">Course Duration</a></li>
          <li><a href="../Master/Affiliation-Name">Affiliation Name</a></li>
          <li><a href="../Master/Exam-Type">Exam Type</a></li>
          <li><a href="../Master/Ranking">Ranking</a></li>
          <li><a href="../Master/Ownership">Ownership</a></li>
          <li><a href="../Master/College-Facilities">College-Facilities</a></li>
        </ul>
      </li>
	  <li>
        <div class="iocn-link">
          <a href="#">
            <i class='fa fa-university' ></i>
            <span class="link_name">College Master </span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">College Master</a></li>
          <li><a href="Add-College">Add College</a></li>
          <li><a href="College-List">College List</a></li>
          <li><a href="College-View">College View</a></li>
        </ul>
      </li>
	  
	  
       
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      
</ul>
</div>
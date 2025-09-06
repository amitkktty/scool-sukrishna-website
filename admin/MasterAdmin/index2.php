<?php 
$page='index';
include_once ('logincheck.php');
unset($_SESSION['no_of_record']);
unset($_SESSION['sn']);
$q0="select count(*) as totalcountry from country_data ";
$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
$r0=mysqli_fetch_object($qr0);
$totalcountry=$r0->totalcountry ; 

$q1="select count(*) as totalstate from state_data ";
$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
$r1=mysqli_fetch_object($qr1);
$totalstate=$r1->totalstate ; 
$q2="select count(*) as totaldist from district_data ";
$qr2=mysqli_query($conn, $q2) or die($q2.mysqli_error($conn));
$r2=mysqli_fetch_object($qr2);
$totaldist=$r2->totaldist ;
$q1="select count(*) as totalstream from stream ";
$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
$r1=mysqli_fetch_object($qr1);
$totalstream=$r1->totalstream ;

$q2="select count(*) as totalcoursetype from course_type ";
$qr2=mysqli_query($conn, $q2) or die($q2.mysqli_error($conn));
$r2=mysqli_fetch_object($qr2);
$totalcoursetype=$r2->totalcoursetype ;

$q1="select count(*) as totalcoursename from course_name ";
$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
$r1=mysqli_fetch_object($qr1);
$totalcoursename=$r1->totalcoursename ;

$q2="select count(*) as totalcoursenamebranch from course_name_branch ";
$qr2=mysqli_query($conn, $q2) or die($q2.mysqli_error($conn));
$r2=mysqli_fetch_object($qr2);
$totalcoursenamebranch=$r2->totalcoursenamebranch ;

$q1="select count(*) as totalcourseduration from course_duration ";
$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
$r1=mysqli_fetch_object($qr1);
$totalcourseduration=$r1->totalcourseduration ;
 
$q2="select count(*) as totalaffiliation from affiliation_name ";
$qr2=mysqli_query($conn, $q2) or die($q2.mysqli_error($conn));
$r2=mysqli_fetch_object($qr2);
$totalaffiliation=$r2->totalaffiliation ;

$q1="select count(*) as totalexamtype from exam_type ";
$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
$r1=mysqli_fetch_object($qr1);
$totalexamtype=$r1->totalexamtype ;

$q2="select count(*) as totalranking from ranking_type ";
$qr2=mysqli_query($conn, $q2) or die($q2.mysqli_error($conn));
$r2=mysqli_fetch_object($qr2);
$totalranking=$r2->totalranking ;

$q1="select count(*) as totalonwership from ownership_data ";
$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
$r1=mysqli_fetch_object($qr1);
$totalonwership=$r1->totalonwership ;

$q2="select count(*) as totalfacilites from college_facilities ";
$qr2=mysqli_query($conn, $q2) or die($q2.mysqli_error($conn));
$r2=mysqli_fetch_object($qr2);
$totalfacilites=$r2->totalfacilites ;

$q1="select count(*) as totalcollege from college_data ";
$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
$r1=mysqli_fetch_object($qr1);
$totalcollege=$r1->totalcollege ;
 
include_once ('headerpart.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            <h1 class="m-0 text-danger"> <i class="fas fa-tachometer-alt" aria-hidden="true"></i> Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div> 
        </div> 
      </div> 
    </div> 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="d-flex justify-content-start flex-wrap">  
          <div class="col-lg-3 col-md-4 p-1 px-3 "> 
            <div class="row"  style='background:#0CAA1F; color:White;' >
              <div class="col-8 pl-3">
                <span style='font-size:2.5rem;'><?php echo $totalcountry;?> </span>
                <p>Country</p>
              </div>
              <div class="col-4 ">
                <img src="icons/country.png" alt="" width='100%' />
              </div>
			  <div class="col-12" style='background:#0B6416;'>
              <a href="Master/Country" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a></div>
            </div>
		  </div> 
		 
		  <div class="col-lg-3 col-md-4 p-1 px-3 "> 
            <div class="row"style='background:#ff471a; color:White;' >
              <div class="col-8 pl-3">
                <span style='font-size:2.5rem;'><?php echo $totalstate;?> </span>
                <p>State</p>
              </div>
              <div class="col-4">
                <img src="icons/state.png" alt="" width='100%' />
              </div>
			  <div class="col-12" style='background:#b32400;'>
              <a href="Master/State" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a></div>
            </div>
		  </div> 
		  
		  <div class="col-lg-3 col-md-4 p-1 px-3 "> 
            <div class="row"style='background:#0CAA1F; color:White;' >
              <div class="col-8 pl-3">
                <span style='font-size:2.5rem;'><?php echo $totaldist;?> </span>
                <p>District</p>
              </div>
              <div class="col-4">
                <img src="icons/district.png" alt="" width='100%' />
              </div>
			  <div class="col-12" style='background:#0B6416;'>
              <a href="Master/District" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a></div>
            </div>
		  </div> 
		  
		  <div class="col-lg-3 col-md-4 p-1 px-3 "> 
            <div class="row"style='background:#ff471a; color:White;' >
              <div class="col-8 pl-3">
                <span style='font-size:2.5rem;'><?php echo $totalstream;?> </span>
                <p>Stream</p>
              </div>
              <div class="col-4">
                <img src="icons/stream1.png" alt="" width='100%' />
              </div>
			  <div class="col-12" style='background:#b32400;'>
              <a href="Master/Stream" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a></div>
            </div>
		  </div>  
		  
		  <div class="col-lg-3 col-md-4 p-1 px-3 "> 
            <div class="row"style='background:#ff471a; color:White;' >
              <div class="col-8 pl-3">
                <span style='font-size:2.5rem;'><?php echo $totalcoursetype;?> </span>
                <p>Degree Type</p>
              </div>
              <div class="col-4">
                <img src="icons/coursetype.png" alt="" width='100%' />
              </div>
			  <div class="col-12" style='background:#b32400;'>
              <a href="Master/Course-Type" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a></div>
            </div>
		  </div>  
		  
		  <div class="col-lg-3 col-md-4 p-1 px-3 "> 
            <div class="row"style='background:#0CAA1F; color:White;' >
              <div class="col-8 pl-3">
                <span style='font-size:2.5rem;'><?php echo $totalcoursename;?> </span>
                <p>Course Name</p>
              </div>
              <div class="col-4">
                <img src="icons/onlinelearning.png" alt="" width='100%' />
              </div>
			  <div class="col-12" style='background:#0B6416;'>
              <a href="Master/Course-Name" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a></div>
            </div>
		  </div>  
		  
		  <div class="col-lg-3 col-md-4 p-1 px-3 "> 
            <div class="row"style='background:#ff471a; color:White;' >
              <div class="col-8 pl-3">
                <span style='font-size:2.5rem;'><?php echo $totalcoursenamebranch;?> </span>
                <p>Sub-Course Branch</p>
              </div>
              <div class="col-4">
                <img src="icons/sub-course.png" alt="" width='100%' />
              </div>
			  <div class="col-12" style='background:#b32400;'>
              <a href="Master/Course-Name-Branch" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a></div>
            </div>
		  </div>  
		   
		  <div class="col-lg-3 col-md-4 p-1 px-3 "> 
            <div class="row"style='background:#0CAA1F; color:White;' >
              <div class="col-8 pl-3">
                <span style='font-size:2.5rem;'><?php echo $totalcourseduration;?> </span>
                <p>Course Duration</p>
              </div>
              <div class="col-4">
                <img src="icons/duration1.png" alt="" width='100%' />
              </div>
			  <div class="col-12" style='background:#0B6416;'>
              <a href="Master/Course-Duration" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a></div>
            </div>
		  </div>  
		   
		  <div class="col-lg-3 col-md-4 p-1 px-3 "> 
            <div class="row"style='background:#0CAA1F; color:White;' >
              <div class="col-8 pl-3">
                <span style='font-size:2.5rem;'><?php echo $totalcourseduration;?> </span>
                <p>Affiliation Details</p>
              </div>
              <div class="col-4">
                <img src="icons/affiliation.png" alt="" width='100%' />
              </div>
			  <div class="col-12" style='background:#0B6416;'>
              <a href="Master/Affiliation-Name" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a></div>
            </div>
		  </div>  
		  
		  <div class="col-lg-3 col-md-4 p-1 px-3 "> 
            <div class="row"style='background:#ff471a; color:White;' >
              <div class="col-8 pl-3">
                <span style='font-size:2.5rem;'><?php echo $totalexamtype;?> </span>
                <p>Exam Type</p>
              </div>
              <div class="col-4">
                <img src="icons/examtype1.png" alt="" width='100%' />
              </div>
			  <div class="col-12" style='background:#b32400;'>
              <a href="Master/Exam-Type" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a></div>
            </div>
		  </div>  
		   
		  <div class="col-lg-3 col-md-4 p-1 px-3 "> 
            <div class="row"style='background:#0CAA1F; color:White;' >
              <div class="col-8 pl-3">
                <span style='font-size:2.5rem;'><?php echo $totalranking;?> </span>
                <p>Rankinge</p>
              </div>
              <div class="col-4">
                <img src="icons/ranking1.png" alt="" width='100%' />
              </div>
			  <div class="col-12" style='background:#0B6416;'>
              <a href="Master/Ranking" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a></div>
            </div>
		  </div> 
		  
		  <div class="col-lg-3 col-md-4 p-1 px-3 "> 
            <div class="row"style='background:#ff471a; color:White;' >
              <div class="col-8 pl-3">
                <span style='font-size:2.5rem;'><?php echo $totalonwership;?> </span>
                <p>Ownership</p>
              </div>
              <div class="col-4">
                <img src="icons/ownership1.png" alt="" width='100%' />
              </div>
			  <div class="col-12" style='background:#b32400;'>
              <a href="Master/Ownership" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a></div>
            </div>
		  </div>  
		   
		  <div class="col-lg-3 col-md-4 p-1 px-3 "> 
            <div class="row"style='background:#ff471a; color:White;' >
              <div class="col-8 pl-3">
                <span style='font-size:2.5rem;'><?php echo $totalfacilites;?> </span>
                <p>College Facilities</p>
              </div>
              <div class="col-4">
                <img src="icons/collegefacilities.png" alt="" width='100%' />
              </div>
			  <div class="col-12" style='background:#b32400;'>
				<a href="Master/College-Facilities" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a>
			  </div>
            </div>
		  </div>  
		    
		  <div class="col-lg-3 col-md-4 p-1 px-3 "> 
            <div class="row"style='background:#0CAA1F; color:white;' >
              <div class="col-8 pl-3">
                <span style='font-size:2.5rem;'><?php echo $totalcollege;?> </span>
                <p>College List</p>
              </div>
              <div class="col-4">
                <img src="icons/collegelist.png" alt="" width='100%' />
              </div>
			  
			  <div class="col-12" style='background:#0B6416;'>
				<a href="College-Master/College-List" class="small-box-footer text-white">More info <i class="fas fa-arrow-circle-right"></i></a>
			  </div> 
            </div>
		  </div>  
		   
		      
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
         
      </div> <br><br><br>
    </section> 
  </div>
  
  <?php include_once ('footerpart.php');?>
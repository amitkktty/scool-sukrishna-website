<?php
$page = 'index';
include_once('logincheck.php');
unset($_SESSION['no_of_record']);
unset($_SESSION['sn']);
$q0 = "select count(*) as totalcountry from country_data ";
$qr0 = mysqli_query($conn, $q0) or die($q0 . mysqli_error($conn));
$r0 = mysqli_fetch_object($qr0);
$totalcountry = $r0->totalcountry;

$q1 = "select count(*) as totalstate from state_data ";
$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
$r1 = mysqli_fetch_object($qr1);
$totalstate = $r1->totalstate;
$q2 = "select count(*) as totaldist from district_data ";
$qr2 = mysqli_query($conn, $q2) or die($q2 . mysqli_error($conn));
$r2 = mysqli_fetch_object($qr2);
$totaldist = $r2->totaldist;
$q3 = "select count(*) as totalcont from contact ";
$qr3 = mysqli_query($conn, $q3) or die($q3 . mysqli_error($conn));
$r3 = mysqli_fetch_object($qr3);
$totalcont = $r3->totalcont;
$q4 = "select count(*) as totalq from enuiry ";
$qr4 = mysqli_query($conn, $q4) or die($q4 . mysqli_error($conn));
$r4 = mysqli_fetch_object($qr4);
$totalq = $r4->totalq;
$q5 = "select count(*) as totalor from online_register ";
$qr5 = mysqli_query($conn, $q5) or die($q5 . mysqli_error($conn));
$r5 = mysqli_fetch_object($qr5);
$totalor = $r5->totalor;



include_once('headerpart.php');
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
            <li class="breadcrumb-item"><a href="./">Home</a></li>
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
        <div class="col-lg-3 col-md-4 p-2 px-3 ">
          <div class="bg-info row pt-3">
            <div class="col-7 pl-3">
              <span style='font-size:1.3rem;'>Country </span>
            </div>
            <div class="col-5 text-center ">
              <span style='font-size:2rem;'><?php echo $totalcountry; ?> </span>
            </div>
            <div class="col-12 mt-3 " style='background:#006080;'>
              <a href="Master/Country" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 p-2 px-3 ">
          <div class="row pt-3" style='background:#ffad33; color:White;'>
            <div class="col-7 pl-3">
              <span style='font-size:1.3rem;'>State</span>

            </div>
            <div class="col-5 text-center">
              <span style='font-size:2rem;'><?php echo $totalstate; ?> </span>
            </div>
            <div class="col-12 mt-3" style='background:#995c00;'>
              <a href="Master/State" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 p-2 px-3 ">
          <div class="row pt-3" style='background:#6666ff; color:White;'>
            <div class="col-7 pl-3">
              <span style='font-size:1.3rem;'>District </span>
            </div>
            <div class="col-5 text-center">
              <span style='font-size:2rem;'><?php echo $totaldist; ?> </span>
            </div>
            <div class="col-12 mt-3" style='background:#000080;'>
              <a href="Master/District" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 p-2 px-3 ">
          <div class="row pt-3" style='background:#FF8557; color:White;'>
            <div class="col-7 pl-3">
              <span style='font-size:1.3rem;'>Contact Enq. </span>
            </div>
            <div class="col-5 text-center">
              <span style='font-size:2rem;'><?php echo $totalcont; ?> </span>
            </div>
            <div class="col-12 mt-3" style='background:#FF4600;'>
              <a href="Master/contact" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 p-2 px-3 ">
          <div class="row pt-3" style='background:#0CAA1F; color:White;'>
            <div class="col-7 pl-3">
              <span style='font-size:1.3rem;'>Admission Enq. </span>
            </div>
            <div class="col-5 text-center">
              <span style='font-size:2rem;'><?php echo $totalq; ?> </span>
            </div>
            <div class="col-12 mt-3" style='background:#0B6416;'>
              <a href="Master/query" class="text-white pl-4">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 p-2 px-3 ">
          <div class="row pt-3" style='background:#E645E8; color:White;'>
            <div class="col-7 pl-3">
              <span style='font-size:1.3rem;'>Online Registration </span>
            </div>
            <div class="col-5 text-center">
              <span style='font-size:2rem;'><?php echo $totalor; ?> </span>
            </div>
            <div class="col-12 mt-3" style='background:#8B0B8D;'>
              <a href="Master/registration" class="text-white pl-4">More info <i
                  class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>




        <!-- ./col -->
      </div>
      <hr>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <h4 align="center">Recent Contact Enquiry</h4>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="7%" class='text-center'>#</th>
                <th>Enquiry Type</th>
                <th>Name</th>

                <th>Mobile</th>
                <th>Email</th>
                <th>Course</th>
                <th>Location</th>
                <th>Message</th>
                <th>Date</th>


                <!--<th width="20%" class='text-center'>Action</th>-->
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $date = date('Y-m-d');
              $sql = mysqli_query($conn, "select * from contact order by id desc limit 10");
              while ($res = mysqli_fetch_object($sql)) {
                ?>
                <tr class="header">
                  <td class='text-center'><?php echo $i++; ?></td>
                  <td><?php echo $res->form_type; ?></td>
                  <td><?php echo $res->name; ?></td>

                  <td><?php echo $res->phone; ?></td>
                <td><?php echo $res->email; ?></td>
                  <td><?php echo $res->subject; ?></td>
                  <td><?php echo $res->city; ?></td>
                  <td><?php echo $res->message; ?></td>
                  <td><?php echo date('d-M-Y', strtotime($res->date)); ?></td>
                  <!--<td class='text-center'><a href="contact?dele=<?php echo $res->id; ?>" onclick="return confirm('Are you sure ?')" class='badge badge-danger p-2 px-3'><i class="fa fa-trash" aria-hidden="true"></i></a></td>-->
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <h4 align="center">Recent Admission Enquiry</h4>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="7%" class='text-center'>#</th>
                <th>Name</th>

                <th>Mobile</th>
                <th>Course</th>
                <th>Location</th>
                <th>Message</th>
                <th>Date</th>


                <!--<th width="20%" class='text-center'>Action</th>-->
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $date = date('Y-m-d');
              $sql = mysqli_query($conn, "select * from enuiry order by id desc limit 10");
              while ($res = mysqli_fetch_object($sql)) {
                ?>
                <tr class="header">
                  <td class='text-center'><?php echo $i++; ?></td>
                  <td><?php echo $res->fname; ?></td>

                  <td>
                    <?php echo $res->number; ?>
                  </td>
                  <td><?php echo $res->subject; ?></td>
                  <td><?php echo $res->city; ?></td>
                  <td><?php echo $res->message; ?></td>
                  <td><?php echo date('d-M-Y', strtotime($res->date)); ?></td>
                  <!--<td class='text-center'><a href="query?dele=<?php echo $res->id; ?>" onclick="return confirm('Are you sure ?')" class='badge badge-danger p-2 px-3'><i class="fa fa-trash" aria-hidden="true"></i></a></td>-->
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <h4 align="center">Recent Online Registration</h4>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="7%" class='text-center'>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Course</th>
                <th>Board</th>
                <th>Location</th>
                <th>Message</th>
                <!-- <th>Status</th> -->
                <th>Date</th>

                <th width="20%" class='text-center'>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              $date = date('Y-m-d');
              $sql = mysqli_query($conn, "select * from online_register order by id desc limit 10");
              while ($res = mysqli_fetch_object($sql)) {
                ?>
                <tr class="header">
                  <td class='text-center'><?php echo $i++; ?></td>
                  <td><?php echo $res->name; ?></td>
                  <td><?php echo $res->phone; ?></td>
                  <td> <?php echo $res->email; ?></td>
                  <td><?php echo $res->course; ?></td>
                  <td><?php echo $res->board; ?></td>
                  <td><?php echo $res->location; ?></td>
                  <td><?php echo $res->message; ?></td>

                  <td><?php echo date('d-M-Y', strtotime($res->date)); ?></td>

                  <td class='text-center'><a href="registration?dele=<?php echo $res->reg_id; ?>"
                      onclick="return confirm('Are you sure ?')" class='badge badge-danger p-2 px-3'><i
                        class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Main row -->

    </div> <br><br><br>
  </section>
</div>

<?php include_once('footerpart.php'); ?>
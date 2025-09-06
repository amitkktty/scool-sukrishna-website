<?php 
$page='test'; $innerpage='test';
include_once('Master-Header.php'); 
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section >
      <div class="container-fluid text-uppercase ">
	   <div class="row bg-white p-2" style='box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;'>
	    <div>
		  <i class="fa fa-database text-danger fa-3x pl-1 pr-3" aria-hidden="true"></i> 
		</div>
	    <div>
		  <h3 class='bold text-danger'> Scholarship Test Enquiry
		  <h6 class='text-primary bold mt-n3'>View Enquiry</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
		
			<!--<div class='container-fluid '>-->
			<!-- <div class="row bold">-->
			<!--	<div class="col-6"> <a href="create-test" class='bg-info px-3 py-1 ml-n2 rounded sd-12'>-->
			<!--		<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>-->
			<!--	</div>-->
			<!--	<div class="col-6 text-right"> <a href="view-test" class='bg-info px-3 py-1 ml-n2 rounded sd-1'>-->
			<!--	<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>-->
			<!--	</div>-->
			<!--  </div> -->
			<!--</div>-->
			<br>
			<?php
                if(isset($_REQUEST['dele']))
                {
                    $delc = $_REQUEST['dele'];
                    $delQ = "DELETE FROM `scholarship_data` WHERE `id` = $delc";
                    mysqli_query($conn, $delQ);
                    header("location: scholarship");
                } ?>
		   <table id="example1" class="table table-bordered table-striped">
			 <thead>
				<tr>
				<th width="7%" class='text-center'>#</th>
				<th>Name</th> 
				<th>E-mail</th>
				<th>Mobile</th>
				<th>Course</th>
				<th>Test Date</th>
				<th>Date Of Birth</th>
				<th>Coaching Name</th>
				<th>Current Class</th>
				<th>Board</th>
				<th>Test Mode</th>
				<th>Guardian Name</th>
				<th>address</th>
				<th>Enquiry At</th> 
				<th width="20%" class='text-center'>Action</th>
				</tr>
			 </thead>
			 <tbody>  
			<?php 
			$sn =1;
			// $q1="select * from state_data order by statename limit $startfrom, $per_page_record";
			$q1="select * from scholarship_data order by id DESC";
			$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
			while($r1=mysqli_fetch_object($qr1))
			{ 
			   $test_id=$r1->id;
			    
			?>
			<tr class="header">
			<td class='text-center'><?php echo $sn;?></td>
				<td><?php echo $r1->name; ?></td>
				<td><?php echo $r1->email; ?></td>
				<td><?php echo $r1->mobile; ?></td>
				<td><?php echo $r1->course; ?></td>
				<td><?php echo $r1->testDate; ?></td>
				<td><?php echo $r1->dob; ?></td>
				<td><?php echo $r1->coachingName; ?></td>
				<td><?php echo $r1->currentClass; ?></td>
				<td><?php echo $r1->board; ?></td>
				<td><?php echo $r1->testDate; ?></td>
				<td><?php echo $r1->guardianName; ?></td>
				<td><?php echo $r1->address; ?></td>
				<td><?php echo $r1->enquiry_at; ?></td>
				<td class='text-center'><a href="scholarship?dele=<?php echo $r1->id;?>" onclick="return confirm('Are you sure ?')" class='badge badge-danger p-2 px-3'><i class="fa fa-trash" aria-hidden="true"></i></a></td> 
			</tr>

			<?php
			$sn++;
			}

			?>
			  </tbody>
			</table>  		 
		</div>
    </section> <br><br>
  </div>
  <!-- /.content-wrapper -->
   
<?php include_once('Master-Footer.php');?>


<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script type="text/javascript">
$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

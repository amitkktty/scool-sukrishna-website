<?php 
$page='exammaster'; $innerpage='examlist';
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
		  <h3 class='bold text-danger'> Exam Master  
	  <h6 class='text-primary bold mt-n3'>Exam List</h6></h3></h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
		
			<div class='container-fluid '>
			 <div class="row bold">
				<div class="col-6"> <a href="Add-Exam" class='bg-info px-3 ml-n2 py-1  rounded sd-1'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
				</div>
				<div class="col-6 text-right"> <a href="Exam-List" class='bg-info px-3 mr-n2 py-1 rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
				</div>
			  </div>
			</div>
			<br>
				<?php
                if(isset($_REQUEST['dele']))
                {
                    $delc = $_REQUEST['dele'];
                    $delQ = "DELETE FROM `exam_detail` WHERE `ex_id` = $delc";
                    mysqli_query($conn, $delQ);
                    header("location: Exam-List");
                } ?>
			<table id="example1" class="table table-bordered table-striped">
			 <thead>
				<tr>
				<th width="7%" class='text-center'>#</th>
				<th>Stream</th> 
			
				<th>Exam Full Name</th> 
				<th>Short Name</th>
				<th>Last Date</th>
				<th width="20%" class='text-center'>Action</th>
				</tr>
			 </thead>
			 <tbody>   
			<?php  
			$sn =1; 
			$q1="select * from exam_detail ";
			$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
			while($r1=mysqli_fetch_object($qr1))
			{ 
			$id=$r1->ex_id;
			$stream_id=$r1->stream_id ;
		
			$exam_name_id=$r1->exam_name_id;
			$exam_fullname=$r1->exam_fullname;
			$short_name=$r1->short_name;
			$app_edate=$r1->app_end_date;
			
			$q0="select * from stream where stream_id = $stream_id";
			$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
			$r0=mysqli_fetch_object($qr0);
			$stream_name=$r0->stream_name ; 
			
			
			
			$q0="select * from exam_type where exam_type_id = $exam_name_id ";
			$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
			$r0=mysqli_fetch_object($qr0);
			$exam_name=$r0->exam_name ; 
			  
			?>
			<tr class="header">
			<td class='text-center'><?php echo $sn;?></td>
				<td><?php echo $stream_name;?></td>
			
				<td><?php echo $exam_fullname;?></td>	
				<td><?php echo $short_name;?></td>	
				<td><?php echo $app_edate;?></td>
				<td class='text-center'><a href="Exam-Modify?id=<?php echo $id;?>" class='badge badge-primary p-2 px-3'><i class="fa fa-edit" aria-hidden="true"></i></a> 
				<a href="Exam-List?dele=<?php echo $id;?>" class='btn btn-sm btn-outline-danger px-3' onclick="return confirm('Are you sure ?')"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
				
			</tr>

			<?php
			$sn++;
			} 
			?> 
			  </tbody>
			</table>   	 
		</div><br><br><br><br>
    </section> 
  </div>
  <!-- /.content-wrapper -->
</script> 
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
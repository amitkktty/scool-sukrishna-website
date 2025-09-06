<?php 
$page='enquiry'; $innerpage='signup';
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
		  <h3 class='bold text-danger'> Enquiry Dirctory 
		  <h6 class='text-primary bold mt-n3'>Login</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'> <br>
			<div id="display_data">
			<h4 class='text-center bg-info'>List of Added Data (Sign Up Details)</h4>
			<table id="example1" class="table table-bordered table-striped">
			  <thead>
                  <tr>
                    <th width="5%" align='center'>#</th>
                    <th>Name</th>  
                    <th>Mobile</th>  
                    <th>Email</th>  
                    <th>EntryDate</th>   
                  </tr>
                  </thead>
			  <tbody>
			<?php
			$sn =1;
			$q1="select * from login_data order by id desc";
			$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
			while($r1=mysqli_fetch_object($qr1))
			{  
			$name1=$r1->name; 
			$mobile=$r1->mobile; 
			$uname=$r1->uname; 
			$EntryDate=$r1->EntryDate; 
			?>
			<tr class="header">
			<td  class="text-center"><?php echo $sn;?></td>
				<td><?php echo $name1;?></td>
				<td><?php echo $mobile;?></td>
				<td><?php echo $uname;?></td>
				<td><?php echo $EntryDate;?></td>
				 
			</tr>

			<?php
			$sn++;
			}

			?>
			   </tbody>
			</table> 			
			 </div>		 
		</div><br><br><br>
    </section> 
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
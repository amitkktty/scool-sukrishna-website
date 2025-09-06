<?php 
$page='location'; $innerpage='district';
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
		  <h3 class='bold text-danger'> Location Dirctory 
		  <h6 class='text-primary bold mt-n3'>District</h6></h3>
		</div>	   
	   </div><br>		
      </div>  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-12 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
		
			<div class='container-fluid '>
			 <div class="row bold">
				<div class="col-6"> <a href="District-Add" class='bg-info px-3 py-1 ml-n2 rounded sd-1'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
				</div>
				<div class="col-6 text-right"> <a href="District" class='bg-info px-3 py-1 ml-n2 rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
				</div>
			  </div> 
			</div>
			<br>
			<?php
                if(isset($_REQUEST['dele']))
                {
                    $delc = $_REQUEST['dele'];
                    $delQ = "DELETE FROM `district_data` WHERE `district_id` = $delc";
                    mysqli_query($conn, $delQ);
                    header("location: District");
                } ?>
			<table id="example1" class="table table-bordered table-striped">
			 <thead>
				<tr>
				<th width="7%" class='text-center'>#</th>
				<th>Country Name</th> 
				<th>State Name</th> 
				<th>District Name</th>   
				<th width="20%" class='text-center'>Action</th>
				</tr>
			 </thead>
			 <tbody>   
			<?php 
			$sn =1;
			$q1="select * from district_data order by state_id ";
			$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
			while($r1=mysqli_fetch_object($qr1))
			{ 
			   $country_id1=$r1->country_id ;
			   $state_id1=$r1->state_id ;
			   $district_id1=$r1->district_id ;
			    $q0="select * from country_data where country_id ='$country_id1'";
				$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
				$r0=mysqli_fetch_object($qr0);
				$country_name=$r0->name ; 
				$q0="select * from state_data where state_id = $state_id1";
				$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
				$r0=mysqli_fetch_object($qr0);
				$state_name=$r0->statename ;  
			$name1=$r1->district_name;   
			?>
			<tr class="header">
			<td class='text-center'><?php echo $sn;?></td>
				<td><?php echo $country_name;?></td>
				<td><?php echo $state_name;?></td>
				<td><?php echo $name1;?></td>
				 
				<td class='text-center'><a href="District-Modify?id=<?php echo $district_id1;?>" class='badge badge-primary p-2 px-3'><i class="fa fa-edit" aria-hidden="true"></i></a> <a href="District?dele=<?php echo $district_id1;?>" onclick="return confirm('Are you sure ?')" class='badge badge-danger p-2 px-3'><i class="fa fa-trash" aria-hidden="true"></i></a></td> 
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
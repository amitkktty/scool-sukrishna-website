<?php 
$page='location'; $innerpage='state';
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
		  <h6 class='text-primary bold mt-n3'>State</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
		
			<div class='container-fluid '>
			 <div class="row bold">
				<div class="col-6"> <a href="State-Add" class='bg-info px-3 py-1 ml-n2 rounded sd-12'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
				</div>
				<div class="col-6 text-right"> <a href="State" class='bg-info px-3 py-1 ml-n2 rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
				</div>
			  </div> 
			</div>
			<br>
			<?php
                if(isset($_REQUEST['dele']))
                {
                    $delc = $_REQUEST['dele'];
                    $delQ = "DELETE FROM `state_data` WHERE `state_id` = $delc";
                    mysqli_query($conn, $delQ);
                    header("location: State");
                } ?>
		   <table id="example1" class="table table-bordered table-striped">
			 <thead>
				<tr>
				<th width="7%" class='text-center'>#</th>
				<th>Country Name</th> 
				<th>State Name</th> 
				<th width="10%" class='text-center'>Logo</th>  
				<th width="20%" class='text-center'>Action</th>
				</tr>
			 </thead>
			 <tbody>  
			<?php 
			$sn =1;
			// $q1="select * from state_data order by statename limit $startfrom, $per_page_record";
			$q1="select * from state_data order by statename ";
			$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
			while($r1=mysqli_fetch_object($qr1))
			{ 
			   $country_id1=$r1->country_id ;
			    $q0="select * from country_data where country_id = $country_id1";
				$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
				$r0=mysqli_fetch_object($qr0);
				$country_name=$r0->name ; 
			$state_id1=$r1->state_id ;
			$name1=$r1->statename;
			$state_logo1=$r1->state_logo; 
			if(empty($state_logo1))			
				$logofile='Images/nologo.jpg';  
			else
				$logofile='State_Logo/'.$state_logo1;  
			?>
			<tr class="header">
			<td class='text-center'><?php echo $sn;?></td>
				<td><?php echo $country_name;?></td>
				<td><?php echo $name1;?></td>
				<td class="text-center"><img src="<?php echo $logofile;?>" alt="" style='width:50px; height:50px;'/></td>
				<td class='text-center'><a href="State-Modify?id=<?php echo $state_id1;?>" class='badge badge-primary p-2 px-3'><i class="fa fa-edit" aria-hidden="true"></i></a> <a href="State?dele=<?php echo $state_id1;?>" onclick="return confirm('Are you sure ?')" class='badge badge-danger p-2 px-3'><i class="fa fa-trash" aria-hidden="true"></i></a></td> 
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
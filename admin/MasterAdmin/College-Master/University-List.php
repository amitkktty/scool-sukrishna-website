<?php 
$page='university'; $innerpage='universitylist';
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
		  <h3 class='bold text-danger'> University Master 
		  <h6 class='text-primary bold mt-n3'>University List</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-12 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
		
			<div class='container-fluid '>
			 <div class="row bold">
				<div class="col-6"> <a href="Add-University" class='bg-info px-3 ml-n2 py-1 rounded sd-1'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add University </a>
				</div>
				<div class="col-6 text-right"> <a href="University-List" class='bg-info px-3 mr-n2 py-1 rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> University List </a>
				</div>
			  </div> 
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
			 <thead>
				<tr>
				<th width="7%" class='text-center'>#</th>
				<th>University Name</th> 
				<th>Location</th> 
				<th>Logo</th>   
			   
				<th width="20%" class='text-center'>Action</th>
				</tr>
			 </thead>
			 <tbody>    
			<?php 
			$sn =1;
			$q1="select * from college_data where college_type='University' order by college_name  ";
			//$q1="select * from college_data order by college_name limit 0, $no_of_record";
			$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
			while($r1=mysqli_fetch_object($qr1))
			{ 
			$c_id=$r1->c_id ;
			$state1=$r1->state1 ;
			$district1=$r1->district1 ;
			$name1=$r1->college_name;
			$q0="select * from state_data where state_id = $state1";
			$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
			$r0=mysqli_fetch_object($qr0);
			$state_name=$r0->statename ; 
			$q0="select * from district_data where district_id = $district1";
			$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
			$r0=mysqli_fetch_object($qr0);
			$district_name=$r0->district_name ;  		
			$location=$district_name.', '.$state_name;
			$college_logo1=$r1->college_logo; 
			if(empty($college_logo1))			
				$logofile='Images/nologo.jpg';  
			else
				$logofile='College_Logo/'.$college_logo1;  
			?>
			<tr class="header">
			<td class="text-center"><?php echo $sn;?></td>
				<td><?php echo $name1;?></td>
				<td><?php echo $location;?></td>
				<td class="text-center"><img src="<?php echo $logofile;?>" alt="" style='width:50px; height:50px;'/></td>
				
				
				<td class='text-center'><a href="universityNotification?c_id=<?php echo $c_id;?>" class='btn btn-sm btn-outline-danger'><i class="fa fa-bell" aria-hidden="true"></i></a>  <a href="Modify-University?c_id=<?php echo $c_id;?>" class='badge badge-primary p-2 px-3'><i class="fa fa-edit" aria-hidden="true"></i></a> </td> 
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
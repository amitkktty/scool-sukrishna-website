<?php 
$page='testimonial'; $innerpage='testimonial';
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
		  <h3 class='bold text-danger'>Student Testimonial 
		  <h6 class='text-primary bold mt-n3'>Student Testimonial</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-12 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
		
			<div class='container-fluid '>
			 <div class="row bold pb-2">
				<div class="col-6"> <a href="Testimonial-Add" class='bg-info px-3 ml-n2 py-1 rounded sd-1'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Testimonial </a>
				</div>
				<div class="col-6 text-right"> <a href="testimonial" class='bg-info px-3 mr-n2 py-1 rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Testimonial List </a>
				</div>
			  </div> 
			</div>
			<br>
			<?php
                if(isset($_REQUEST['dele']))
                {
                    $delc = $_REQUEST['dele'];
                    $delQ = "DELETE FROM `testimonial` WHERE `testim_id` = $delc";
                    mysqli_query($conn, $delQ);
                    header("location: testimonial");
                } ?>
			<table id="example1" class="table table-bordered table-striped">
			 <thead>
				<tr>
				<th width="7%" class='text-center'>#</th>
				<th>Category</th>
				<th>Student Name</th> 
				<th>Photo</th> 
				<th>Comment</th>
				
				
				<th width="20%" class='text-center'>Action</th>
				</tr>
			 </thead>
			 <tbody>  
			<?php
			$i=1;
			$sql=mysqli_query($conn,"select * from testimonial order by testim_id desc");
			while($row=mysqli_fetch_object($sql))
			{
			?>
			<tr class="header">
			<td class='text-center'><?php echo $i++;?></td>
				<td><?php echo $row->category;?></td>
				<td><?php echo $row->name;?></td>
				<td>
				    <?php
				    if($row->photo==NULL)
				    {
				        
				    }
				    else
				    { ?>
				    <img src="<?php echo $row->photo;?>" style="width:50px;height:50px">
				        
				   <?php }
				    ?>
				</td>
				<td><textarea><?php echo $row->comment;?></textarea></td>
				
				<td class='text-center'><a href="testimonial-modify?id=<?php echo $row->testim_id; ?>"
                                class='badge badge-primary p-2 px-3'><i class="fa fa-edit" aria-hidden="true"></i></a><a href="testimonial?dele=<?php echo $row->testim_id;?>" onclick="return confirm('Are you sure ?')" class='badge badge-danger p-2 px-3'><i class="fa fa-trash" aria-hidden="true"></i></a></td> 
			</tr>
		<?php } ?>
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
<?php 
$page='extrapage'; $innerpage='pagelist';
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
		  <h3 class='bold text-danger'> Extra Page Section 
		  <h6 class='text-primary bold mt-n3'>Page List</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
	    <div class='container-fluid '>
			 <div class="row bold">
				<div class="col-6"> <a href="Page-Create" class='bg-info px-3 ml-n2 py-1 rounded sd-1'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
				</div>
				<div class="col-6 text-right"> <a href="State" class='bg-info px-3 mr-n2 py-1  rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
				</div>
			  </div>
			</div> <br>
			<div id="display_data"> 
			<table id="example1" class="table table-bordered table-striped">
			  <thead>
                  <tr>
                    <th width="5%" align='center'>#</th> 
                    <th width='8%'>Action</th> 
                    <th>Page Title</th>  
                    <th>Sub-Title</th>  
                    <th>Header</th>   
                    <th>Description</th>    
                  </tr>
                  </thead>
			  <tbody>
			<?php
			$sn =1;
			$q1="select * from page_data order by  page_title ";
			$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
			while($r1=mysqli_fetch_object($qr1))
			{  
			$page_id=$r1->page_id; 
			$page_title=$r1->page_title; 
			$sub_title=$r1->sub_title; 
			$heading1=$r1->heading1; 
			$desc1=$r1->desc1;   
			$desc1=strip_tags($desc1)  ;
			?>
			<tr class="header">
			<td  class="text-center"><?php echo $sn;?></td>
				<td><a href="Page-Modify?page_id=<?php echo $page_id;?>" class='badge badge-primary p-2 px-3'><i class="fa fa-edit" aria-hidden="true"></i></a></td> 
				<td><?php echo $page_title;?></td>
				<td><?php echo $sub_title;?></td>
				<td><?php echo $heading1;?></td>
				<td class="text-truncate"><?php echo $desc1 .$desc1 .$desc1.$desc1;?></td> 
				
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
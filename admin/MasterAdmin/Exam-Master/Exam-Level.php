<?php 
$page='exammaster'; $innerpage='examlevel';
include_once('Master-Header.php');

if (isset($_POST['submit'])) 
{
	$errors = array();

	if (empty($exam_level_name))
		$errors[exam_level_name] = "<span class='text-danger'>Empty!</span>";
	else
	{
		$length = strlen($exam_level_name);
		if ($length > 255)
		$errors[exam_level_name] = "<span class='text-danger'>Too Long!</span>";
		else{
			$q10 = "select * from exam_level where exam_level_name  ='$exam_level_name'";
			$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
			$data_found=mysqli_num_rows($qr10);
			if($data_found <> 0)
			{
				$errors[exam_level_name] = "<span class='text-danger'>Already Added</span>";
			}
		}
	    
	}
	
	if(empty($errors))
	{	 
		$exam_level_name = ucwords(mysqli_real_escape_string($conn, $exam_level_name));
		
		$q = "insert into exam_level values(null,'$exam_level_name','','' )";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		}
		else
		{		
			echo "<script>Swal.fire(
				  'Success!',
				  'Your record saved successfully!',
				  'success'
				)
				.then(function() {
				window.location = 'Exam-Level';
				});			
				</script>";   			  
		}	  
  	}	
} 
?>

<div class="content-wrapper"> 
  <div class="container-fluid text-uppercase ">
   <div class="row bg-white p-2" style='box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;'>
	<div>
	  <i class="fa fa-database text-danger fa-3x pl-1 pr-3" aria-hidden="true"></i> 
	</div>
	<div>
	  <h3 class='bold text-danger'> Exam Master  
	  <h6 class='text-primary bold mt-n3'>Exam Level</h6></h3>
	</div>	   
   </div><br>		
  </div>
	  
 <div class="container-fluid px-4 ">
   <div class="col-md-8 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>

	<div class='container-fluid '>	
	 <div class="row bold">
		<div class="col-12"> <a href="Exam-Level" class='bg-info px-3 ml-n2 py-1  rounded sd-1'>
			<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
		</div> 
	  </div>
	</div> 
	
	<div>
	  <form action="Exam-Level" method="POST" enctype="multipart/form-data">
		<div class="row bold">
		  <div class="col-md-8 my-2">
		  Level Name * : <?php echo $errors[exam_level_name];?>
		  <input type="text" class='form-control form-control-sm'  required='' name='exam_level_name' value='<?php echo $exam_level_name;?>' />	  
		  </div>
		  
		  <div class="col-md-4 my-2 text-center"> <br>			
			<input type="submit" value='Submit' name='submit' class='mx-2 bold  btn btn-sm btn-block bg-info px-3'/> 
		  </div>		  
		</div>			
	  </form> 
	</div>
<?php
$sn = 1;
$q1 = "select * from exam_level order by exam_level_name";
$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
$found_data=mysqli_num_rows($qr1);
if($found_data > 0)
{
	?>
	<table class='table table-sm bg-white mt-3' id='stream_list'>
	<tr class='bg-cyanlt bold'>
		<td width="10%" class='text-center'>#</td>
		<td>Exam Name</td>
		<td class='text-center' width="20%">Action</td>
	</tr>
	<?php 
	
	while ($r1 = mysqli_fetch_object($qr1)) 
	{
		$exam_level_name  = $r1->exam_level_name ;
		$exm_id  = $r1->exm_id ;
	?>
	<tr class="header">
		<td class='text-center'><?php echo $sn; ?></td>  
		<td><?php echo $exam_level_name ; ?></td>
		<td class='text-center'>
		  <a href="Exam-Level-Modify?id=<?php echo $exm_id;?>" class='px-3 mx-1 btn btn-sm btn-success bold'><i class="fa fa-edit"></i></a>
		  <a href="deleteExamLevel?id=<?php echo $exm_id;?>" onclick="return confirm('Are you sure?')" class='px-2 mx-1 btn btn-sm btn-danger bold'><i class="fa fa-trash"></i></a>
		</td>
	</tr>
	<?php
	$sn++;
}
	?>
</table>
<?php
}
?>	
   </div><br><br><br><br>
 </div>
</div>
  <!-- /.content-wrapper -->
  
  
<script> 
<?php include_once('Master-Footer.php');?>
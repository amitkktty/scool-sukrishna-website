<?php 
$page='college'; $innerpage='seat';
include_once('Master-Header.php');
?>

<div class="content-wrapper">
    <section >
      <div class="container-fluid text-uppercase ">
	   <div class="row bg-white p-2" style='box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;'>
	    <div>
		  <i class="fa fa-database text-danger fa-3x pl-1 pr-3" aria-hidden="true"></i> 
		</div>
	    <div>
		  <h3 class='bold text-danger'> College Master  
		  <h6 class='text-primary bold mt-n3'>Add Seat Matrix</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
   <div class="container-fluid px-4 ">
   <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>

	<div class='container-fluid '>	
	 <div class="row bold">
		<div class="col-5"> <a href="Add-College" class='bg-info px-3 ml-n2 py-1  rounded sd-1'>
			<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add College </a>
		</div>
		<div class="col-7 text-right"> 
		
		
		<a href="College-List" class='bg-info px-3 mr-n2 py-1  rounded sd-1'>
		<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> College List </a>		
		</div>
	  </div>
	</div> 
	
	<div>
	  <form action="" method="POST" enctype="multipart/form-data">
		<div class="row bold mt-3">
		  <div class="col-md-12 ">Select College * :
		 <select required='' id='college_name' name="college_name" onchange='setCollege(this.value)' class='form-control form-control-sm chosen-select py-2'>
						<option value="">-- Select --</option>
						<?php 
						$q10 = "select * from college_data order by college_name ";
						$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
						while ($r10 = mysqli_fetch_object($qr10)) {
							$c_id  = $r10->c_id;
							$college_name1 = $r10->college_name;
							
								$q101 = "select * from college_approved_data where college_id = 
								'$c_id' ";
								$qr101 = mysqli_query($conn, $q101) or die($q101 . mysqli_error($conn));
								$collegefound= mysqli_num_rows($qr101);
								if($collegefound) { $st=' - [Added]'; $bgcolor='bg-orangelight';}
								else { $st=' '; $bgcolor='bold ';} 
						?>
							<option value=<?php echo $c_id; ?> <?php if ($college_name == $c_id) echo ' selected'; ?> class='<?= $bgcolor ?>'>
								<?php echo $college_name1. $st ; ?>
							</option>
						<?php
						}
						?>
					</select>
		  </div>
		  <div class="col-md-6">Select Course  : 
		 <select class="form-control" name="course" required>
		     <option value="">Select Course</option>
		     <?php
		     $sql=mysqli_query($conn,"select * from course_name");
		     while($row=mysqli_fetch_object($sql))
		     {
		     ?>
		     <option value="<?php echo $row->course_id;?>"><?php echo $row->course_name;?></option>
		     <?php } ?>
		 </select>				  
		  </div>
		  <div class="col-md-6">Seat  :
		  <input type="text" class='form-control form-control-sm' name='seat'/>				  
		  </div>
		  <div class="col-md-6 ">Fee Tution (In Lakh)  :
		  <input type="number" class='form-control form-control-sm' name='fee' />				  
		  </div>
	
	
		  
		  <div class="col-md-12 mt-4 text-center"> 			
			<input type="submit" value='Submit' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/>
			<a href='seat-matrix' class="bold btn btn-sm bg-info px-3 mx-2">Reset </a>
		  </div>		  
		</div>			
	  </form> 
	</div>		 
   </div><br><br><br><br>
   </div>
</div>
  <!-- /.content-wrapper -->
  
  

	
<?php include_once('Master-Footer.php');?>

<script type="text/javascript">
$(document).ready(function()
{
 CKEDITOR.replace('aboutcollege',{ height  : '150px' });
});
var x;  
$(document).ready(function()
{
 CKEDITOR.replace('description');
 x=1; 
});

$(document).delegate('#adds', 'click', function(event) 
{ 
   x=x+1;  
	 var html='<div><fieldset class="mb-1"><div class="form-group form-group-floating row"><div class="col-11"><div class="position-relative"><label class="label-floating">Section Title (Optional)</label><input type="text" class="form-control form-control-outline" placeholder="Section Title" name="title[]"></div></div><div class="col-1"><br><button id="remove" class="btn btn-danger mt-2"><i class="fa fa-trash" aria-hidden="true"></i></button></div></div></fieldset><fieldset class="mb-1"><div class="form-group form-group-floating row"><div class="col-12"><div class="position-relative"><textarea class="form-control form-control-outline" placeholder="Section Description" name="description[]" id="description'+x+'"></textarea></div></div></div></fieldset></div>';
  
	   $('#containerss').append(html);
	   var textarea = document.getElementById('description'+x);  
	   CKEDITOR.replace(textarea, { height  : '150px' });  
		return false;  
});
  
	   
</script>
<script type="text/javascript">
$(document).ready(function()
{
	$('.mytextarea').each(function(){
	CKEDITOR.replace($(this).attr('id')); 
	})	   
  
	$("#containerss").on('click','#remove',function(e)
	{  
	  if(confirm("Are You Want to Sure Remove a Section ?"))
  	  {
  
	$(this).parent('div').parent('div').parent('fieldset').parent('div').remove();
  
	return false;
  
	  }
  
   });
  
	 });	   
</script>
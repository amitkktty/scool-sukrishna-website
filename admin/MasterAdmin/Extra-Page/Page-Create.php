<?php 
$page='extrapage'; $innerpage='pagecreate';
include_once('Master-Header.php');
if (isset($_POST['submit'])) 
{
	$errors = array();

	if (empty($page_title))
		$errors[page_title] = "<span class='text-danger'>Empty!</span>";
	else
	{
		$slug = trim($page_title); 
		$slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug );  
		$slug= str_replace(' ','-', $slug);   
		$slug= strtolower($slug); 		
	    $slug = mysqli_real_escape_string($conn, $slug); 	
		
		$q11="select * from page_data where page_seo_url ='$slug'"; 
		$qr11=mysqli_query($conn, $q11) or die($q11.mysqli_error($conn)); 
		$founddata=mysqli_num_rows($qr11);
		if($founddata > 0)
		{	
	      $errors[page_title] = "<span class='text-danger'>Already Added!</span>";
		}
	}
	if (empty($page_sub_title))
		$errors[page_sub_title] = "<span class='text-danger'>Empty!</span>";
	if (empty($title[0]))
		$errors[title] = "<span class='text-danger'>Empty!</span>";
	if (empty($description[0]))
		$errors[description] = "<span class='text-danger'>Empty!</span>";
	
	if(empty($errors))
	{
 
	 $page_title = mysqli_real_escape_string($conn, $page_title); 
	 $page_sub_title = mysqli_real_escape_string($conn, $page_sub_title);
	 $head1=$title[0];	
	 $desc1=$description[0];	
	 $head1 = mysqli_real_escape_string($conn, $head1); 
	 $desc1 = mysqli_real_escape_string($conn, $desc1);
		
		$q = "insert into page_data values(null,'$page_title','$page_sub_title','$head1','$desc1','$currentdt','$slug','','','')";
		if (!mysqli_query($conn, $q)) 
		{
		$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
		echo $message;
		}
		else
		{
		  $pageid= mysqli_insert_id($conn);
		  $q2 = "delete from page_data_extra where page_id ='$pageid'";
		  mysqli_query($conn, $q2);

		foreach ($_POST['title'] as $key => $value)
		{
			$title_head=$value;
			$description = $_POST['description'][$key];
			$title_head = mysqli_real_escape_string($conn, $title_head);
			$description = mysqli_real_escape_string($conn, $description);
			if(empty($title_head) AND empty ($description))
			{
			}
			else
			{
				$q3 = "insert into page_data_extra values(null,'$pageid','$title_head','$description','$currentdt','','','','')";
				mysqli_query($conn, $q3);
			}
		} 
			
			echo "<script>alert('Your record saved successfully!');</script>";
			echo "<form action='Page-Create' method=post name=main></form>
			<script>document.main.submit(); </script>";
		} 		
	} 
} 
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
		  <h6 class='text-primary bold mt-n3'>Page Create</h6></h3>
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
				<div class="col-6 text-right"> <a href="Page-List" class='bg-info px-3 mr-n2 py-1  rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
				</div>
			  </div>
			</div> 
			
			<div>
			<form action="Page-Create" method="POST" enctype="multipart/form-data">
				<div class="row bold">
				  <div class="col-md-6 my-2	">Page Title Name* :  
				   <?php echo $errors[page_title];?>
				   <input type="text" class='form-control form-control-sm' name='page_title' value='<?php echo $page_title;?>'/>				  
				  </div> 
				  <div class="col-md-6 my-2	">Page Sub Title :  
				   <span id='err'><?php echo $errors[page_sub_title];?></span>
				  <input type="text" class='form-control form-control-sm' name='page_sub_title' value='<?php echo $page_sub_title;?>'/>				  
				  </div>  
				  
				  <div class="col-md-12"> 
					<div id="containerss">
						<fieldset class="mb-1">
						   <div class="form-group form-group-floating row">
							  <div class="col-12">
								 <label class="label-floating">Section Title  <?php echo $errors[title];?></label>
								 <div class="position-relative">
									<input type="text" class="form-control form-control-outline" placeholder="Section Title" name="title[]" value='<?= $title[0];?>'>
									
								 </div>
							  </div>
						   </div>
						</fieldset>
						<fieldset class="mb-1">
						   <div class="form-group form-group-floating row">
							  <div class="col-12">
							  <?php echo $errors[description];?>
								 <div class="position-relative">
									<textarea class="form-control form-control-outline" placeholder="Section Description" name="description[]" id="description"><?= $description[0];?></textarea>
								 </div>
							  </div>
						   </div>
						</fieldset>
					 </div>
					 <div class="mb-3 text-right mt-n3"><a href="javascript:void();" id="adds" class="badge badge-success py-2 px-2 badge-pill">+ Add New Section</a></div>
				  </div>
				  <div class="col-md-12 my-2 text-center"> 
					
					<input type="submit" value='Submit' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/>
					<a href='Page-Create' class="bold btn btn-sm bg-info px-3 mx-2">Reset </a>
				  </div>				  
				</div>			
			</form>
			
			
			</div>		 
		</div><br><br><br><br>
      </div>	  
    </section> 
  </div>   
<?php include_once('Master-Footer.php');?> 
<script type="text/javascript">
$(document).ready(function()
{
 CKEDITOR.replace('sub_title',{ height  : '150px' });
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
	 var html='<div><fieldset class="mb-1"><div class="form-group form-group-floating row"><div class="col-11"><div class="position-relative"><label class="label-floating">Section Title</label><input type="text" class="form-control form-control-outline" placeholder="Section Title" name="title[]"></div></div><div class="col-1"><br><button id="remove" class="btn btn-danger mt-2"><i class="fa fa-trash" aria-hidden="true"></i></button></div></div></fieldset><fieldset class="mb-1"><div class="form-group form-group-floating row"><div class="col-12"><div class="position-relative"><textarea class="form-control form-control-outline" placeholder="Section Description" name="description[]" id="description'+x+'"></textarea></div></div></div></fieldset></div>';
  
	   $('#containerss').append(html);
	   var textarea = document.getElementById('description'+x);  
	   CKEDITOR.replace(textarea, { height  : '100px' });  
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



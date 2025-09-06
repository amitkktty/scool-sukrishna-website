<?php 
$page='extrapage'; $innerpage='page-list';
include_once('Master-Header.php');
$page_id =$_GET['page_id'];
if(empty($page_id ))
{ 
  echo "<script>window.location.href='Page-List';</script>";
}
else
{
	$sql="select * from page_data where page_id =$page_id ";
	$sql_qr=mysqli_query($conn, $sql);
	$found_data=mysqli_num_rows($sql_qr);
	if($found_data <> 1)
	 echo "<script>window.location.href='Page-List';</script>";
}

if (isset($_POST['submit'])) 
{
	if (empty($page_title))
		$errors[page_title] = "<span class='text-danger'>Empty!</span>";
	else
	{
		$slug = trim($page_title); 
		$slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug );  
		$slug= str_replace(' ','-', $slug);   
		$slug= strtolower($slug); 		
	    $slug = mysqli_real_escape_string($conn, $slug); 	
		
		$q11="select * from page_data where page_seo_url ='$slug' AND page_id != '$apge_id'"; 
		$qr11=mysqli_query($conn, $q11) or die($q11.mysqli_error($conn)); 
		$founddata=mysqli_num_rows($qr11);
		if($founddata > 1)
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

		$q = "update page_data set page_title = '$page_title', sub_title = '$page_sub_title', heading1 = '$head1', desc1 = '$desc1', page_seo_url = '$slug' where page_id =$page_id ";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		}
		else
		{
			move_uploaded_file($_FILES ['logofile']['tmp_name'], $logo_move);
			move_uploaded_file($_FILES ['mapfile']['tmp_name'], $map_move); 
			
		$q2 = "delete from page_data_extra where page_id ='$page_id'";
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
				$q3 = "insert into page_data_extra values(null,'$page_id','$title_head','$description','$currentdt','','','','')";
				mysqli_query($conn, $q3);
			}
		  }
			echo "<script>alert('Your record update successfully!');</script>";
			echo "<form action='Page-List' method=post name=main></form>
			<script>document.main.submit(); </script>";		  
		} 			
	}	
}
else
{
	$rr = mysqli_fetch_object($sql_qr); 
	$page_title  	= $rr->page_title;
	$page_sub_title  	= $rr->sub_title; 
	 
	$sql1="select * from page_data_extra where page_id='$page_id' ";
	$sql_qr1=mysqli_query($conn, $sql1);
	$pagefound=mysqli_num_rows($sql_qr1);	
	
	
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
		  <h6 class='text-primary bold mt-n3'>Page Modify</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
		
			<div class='container-fluid '>
			 <div class="row bold">
				<div class="col-6"> <a href="State-Add" class='bg-info px-3 ml-n2 py-1 ml-n2 rounded sd-1'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
				</div>
				<div class="col-6 text-right"> <a href="Page-List" class='bg-info px-3 mr-n2 py-1   rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
				</div>
			  </div>
			</div> 
			
			<div>
			<form action="Page-Modify?page_id=<?= $page_id;?>" method="POST" enctype="multipart/form-data">
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
				<?php  
				if($pagefound > 0)
				{
					$id=1;	
					while($rr1 = mysqli_fetch_object($sql_qr1))
					{
					$title 			= $rr1->ex_title;
					$description 	= $rr1->ex_desc;
					?>
				<div>
				   <fieldset class="mb-1">
					  <div class="form-group form-group-floating row">
						 <div class="col-11">
							<div class="position-relative"><label class="label-floating">Section Title</label><input type="text" class="form-control form-control-outline" placeholder="Section Title" name="title[]" value='<?= $title;?>'></div>
						 </div>
						 <div class="col-1"><br><button id="remove" class="btn btn-danger mt-2"><i class="fa fa-trash" aria-hidden="true"></i></button></div>
					  </div>
				   </fieldset>
				   <fieldset class="mb-1">
					  <div class="form-group form-group-floating row">
						 <div class="col-12">
							<div class="position-relative"><textarea class="form-control form-control-outline id_value<?=$id;?>" placeholder="Section Description" name="description[]" id="description<?=$id;?>"><?= $description;?></textarea> </div>
						 </div>
					  </div>
				   </fieldset>
				</div> 
					<?php
					$id++;
					} 
				}
				else
				{
					?>
						<fieldset class="mb-1">
						   <div class="form-group form-group-floating row">
							  <div class="col-12">
								 <label class="label-floating">Section Title</label>
								 <div class="position-relative">
									<input type="text" class="form-control form-control-outline" placeholder="Section Title" name="title[]">
									
								 </div>
							  </div>
						   </div>
						</fieldset>
						<fieldset class="mb-1">
						   <div class="form-group form-group-floating row">
							  <div class="col-12">
								 <div class="position-relative">
									<textarea class="form-control form-control-outline" placeholder="Section Description" name="description[]" id="description"><?=$description;?></textarea>
								 </div>
							  </div>
						   </div>
						</fieldset>
					<?php
					}
					?>				
					 </div>
					 <div class="mb-3 text-right mt-n3"><a href="javascript:void();" id="adds" class="badge badge-success py-2 px-2 badge-pill">+ Add New Section</a></div>
				  </div>
				  <div class="col-md-12 my-2 text-center"> 
					
					<input type="submit" value='Update' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/>
					<a href='Page-Create' class="bold btn btn-sm bg-info px-3 mx-2">Back </a>
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
 CKEDITOR.replace('aboutcountry',{ height  : '150px' }); 
});
var y=<?= $id;?>;
for(let i=1; i<y; i++)
{
	CKEDITOR.replace('description'+i);
}






var x = <?= $id;?>;  
$(document).ready(function()
{
 CKEDITOR.replace('description');  
});

$(document).delegate('#adds', 'click', function(event) 
{ 
   x=x+1;  
   
	 var html='<div><fieldset class="mb-1"><div class="form-group form-group-floating row"><div class="col-11"><div class="position-relative"><label class="label-floating">Section Title</label><input type="text" class="form-control form-control-outline" placeholder="Section Title" name="title[]"></div></div><div class="col-1"><br><button id="remove" class="btn btn-danger mt-2"><i class="fa fa-trash" aria-hidden="true"></i></button></div></div></fieldset><fieldset class="mb-1"><div class="form-group form-group-floating row"><div class="col-12"><div class="position-relative"><textarea class="form-control form-control-outline" placeholder="Section Description" name="description[]" id="description'+x+'"></textarea></div></div></div></fieldset></div>';
  
	   $('#containerss').append(html);
	   var textarea = document.getElementById('description'+x);  
	   CKEDITOR.replace(textarea, { height  : '150px' });  
		return false;  
});
  
	   
</script>
<script type="text/javascript">
$(document).ready(function()
{
	$('.mytextarea').each(function()
	{
	CKEDITOR.replace($(this).attr('id')); 
	});	   
  
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



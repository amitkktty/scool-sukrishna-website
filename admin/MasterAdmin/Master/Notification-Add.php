<?php 
$page='notification'; $innerpage='notification';
include_once('Master-Header.php');
if (isset($_POST['submit'])) 
{
$errors = array();
	
if(!empty($_FILES ['logofile']['name']))
	{		
		$target_logo_file = basename ($_FILES ['logofile']['name']); 
		$LogoFileType = strtolower(pathinfo($target_logo_file,PATHINFO_EXTENSION));
		if($LogoFileType != "jpg"  &&  $LogoFileType != "png" && $LogoFileType !=  "jpeg" )
		{	
			$errors[logofile]="<span class='text-danger'> Only JPEG, PNG </span>"; 
		}
		else
		{
			if ($_FILES ['logofile']['size'] > .5*1024*1024) 
			{
				$errors[logofile] = "<span class='text-danger'> Max 500 kb!</span>";
			}
		}
	}
	if(!empty($_FILES ['banner']['name']))
	{		
		$target_banner_file = basename ($_FILES ['banner']['name']); 
		$BannerFileType = strtolower(pathinfo($target_banner_file,PATHINFO_EXTENSION));
		if($BannerFileType != "jpg"  &&  $BannerFileType != "png" && $BannerFileType !=  "jpeg" )
		{	
			$errors[banner]="<span class='text-danger'> Only JPEG, PNG </span>"; 
		}
		else
		{
			if ($_FILES ['banner']['size'] > .5*1024*1024) 
			{
				$errors[banner] = "<span class='text-danger'> Max 500 kb!</span>";
			}
		}
	}
	
	if(!empty($_FILES ['document']['name']))
	{		
		$target_doc_file = basename ($_FILES ['document']['name']); 
		$DocFileType = strtolower(pathinfo($target_doc_file,PATHINFO_EXTENSION));
		if($DocFileType != "pdf")
		{	
			$errors[document]="<span class='text-danger'> Only PDF </span>"; 
		}
		else
		{
			if ($_FILES ['document']['size'] > .5*1024*1024) 
			{
				$errors[document] = "<span class='text-danger'> Max 500 kb!</span>";
			}
		}
	}
	
	if(empty($errors))
	{
	 
		$title = mysqli_real_escape_string($conn, $title);
	  
		$description = mysqli_real_escape_string($conn, $description);
		$cat_name = mysqli_real_escape_string($conn, $cat_name);
		
		if(!empty($_FILES ['logofile']['name']))
		  {
			$logo_file_name ='Logo-Pic-'. rand().'.'.$LogoFileType;
			$target_dir1 = "Course_Logo/";
			if(is_dir($target_dir1) === false )   	
			{        
			mkdir($target_dir1);   
			}	 
			$logo_move=$target_dir1 . basename($logo_file_name); 
		  }
		  
		  if(!empty($_FILES ['banner']['name']))
		  {
			$banner_file_name ='Banner-Pic-'. rand().'.'.$BannerFileType;
			$target_dir1 = "Course_Banner/";
			if(is_dir($target_dir1) === false )   	
			{        
			mkdir($target_dir1);   
			}	 
			$banner_move=$target_dir1 . basename($banner_file_name); 
		  }
		  
		  if(!empty($_FILES ['document']['name']))
		  {
			$doc_file_name ='Doc-'. rand().'.'.$BannerFileType;
			$target_dir1 = "Course_Banner/";
			if(is_dir($target_dir1) === false )   	
			{        
			mkdir($target_dir1);   
			}	 
			$doc_move=$target_dir1 . basename($doc_file_name); 
		  }
		  $pdate=date('d-m-Y',strtotime($pdate));
		  $date=date('d-m-Y');
	  
		$q = "insert into notification values(null,'$title','$description','$cat_name','$logo_file_name','$banner_file_name','$doc_file_name','$pdate','$date')";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		}
		else
		{
			$employeeid= mysqli_insert_id($conn);
		move_uploaded_file($_FILES ['logofile']['tmp_name'], $logo_move);
		move_uploaded_file($_FILES ['banner']['tmp_name'], $banner_move);
		move_uploaded_file($_FILES ['document']['tmp_name'], $doc_move);
		 	echo "<script>Swal.fire(
				  'Success!',
				  'Your record saved successfully!',
				  'success'
				)
				.then(function() {
				window.location = 'Notification-Add';
				});			
				</script>";   
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
		  <h3 class='bold text-danger'> Latest Notification 
		  <h6 class='text-primary bold mt-n3'>Add Latest Notification</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>		
			<div class='container-fluid '>
			 <div class="row bold pb-2">
				<div class="col-6"> <a href="Notification-Add" class='bg-info px-3 ml-n2 py-1 rounded sd-1'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Latest Notification </a>
				</div>
				<div class="col-6 text-right"> <a href="notification" class='bg-info px-3 mr-n2 py-1 rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Latest Notification List </a>
				</div>
			  </div>
			</div> 
			
			<div>
			<form action="Notification-Add" method="POST" enctype="multipart/form-data">
				<div class="row bold">
				
				  <div class="col-md-12 my-2	">Title* :  
				   <span id='err'></span>
				  <input type="text" class='form-control form-control-sm'  required='' value='<?php echo $title;?>' name='title' onkeyup='checkName(this.form)'/>				  
				  </div>
				  
				  
				  
				  
				  <div class="col-md-12 my-2">Description* :   
				  <textarea name="description" id='editor' class='form-control form-control-sm' rows="5"  ><?php echo $description;?></textarea>			  
				  </div>
				  <div class="col-md-4 my-2	">Category* :  
				   <span id='err'></span>
				 <select required='' id='category' name="cat_name" class='form-control form-control-sm'  >
				    <option value="">-- Select --</option>
					<?php
					$q10="select * from category order by category_name ";
					$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
					while($r10=mysqli_fetch_object($qr10))
					{ 
					$cat_id1=$r10->cat_id ;
					$category_name=$r10->category_name ;
					?>
					<option value="<?php echo $category_name;?> <?php if($cat_name == $category_name ) echo ' selected';?>"><?php echo $category_name;?></option>
				<?php	}
					?>

				   </select>			  
				  </div>
				  <div class="col-md-4 my-2	">Logo* :  
				   <?php echo $errors[logofile];?>
				  <input type="file" class='form-control form-control-sm'  name='logofile' />				  
				  </div>
				  <div class="col-md-4 my-2	">Banner* :  
				  <?php echo $errors[banner];?>
				  <input type="file" class='form-control form-control-sm'  name='banner' />				  
				  </div>
				  <div class="col-md-6 my-2	">Document (in pdf)* :  
				  <?php echo $errors[documnet];?>
				  <input type="file" class='form-control form-control-sm'  name='document' />				  
				  </div>
				  <div class="col-md-6 my-2	">Publish Date* :  
				   <span id='err'></span>
				  <input type="date" class='form-control form-control-sm'  name='pdate' value="<?php $pdate;?>" />				  
				  </div>
				  <div class="col-md-12 my-2 text-center"> 
					
					<input type="submit" value='Submit' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/>
					<a href='Course-Name-Branch-Add' class="bold btn btn-sm bg-info px-3 mx-2">Reset </a>
				  </div>				  
				</div>			
			</form>
			
			
			</div>		 
		</div>
      </div>	  
    </section> 
  </div>
 <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>  
<script>

ClassicEditor
	.create( document.querySelector( '#editor' ) )
	.catch( error => {
		console.error( error );
	} );
			
function checkName(f)
{
  var stream_id = f.stream.value;
  var course_type_id = f.course_category.value;
  var course_name_id = f.course_name.value;
  var branch_name = f.branch_name.value;
  var course_duration = f.duration.value; 
  if (branch_name) {
	$.ajax({
		type: 'post',
		url: 'branchNameCheck.php',
		data: {
			stream_id: stream_id,
			course_type_id: course_type_id,
			course_name_id: course_name_id,
			branch_name: branch_name,
			course_duration: course_duration,
		},
		success: function(response) {
			$('#err').html(response);
		}
	});
   }    
} 
function getCourseName1(f)
{
$( '#err' ).html('');	
 var stream_id=f.stream.value;	
 var course_id=f.course_category.value;	 
 if((stream_id) && (course_id))
 {
  $.ajax({
	  type: 'post',
	  url: 'getCourseName.php',
	  data: {
	   course_id:course_id,
	   stream_id:stream_id,
	  },
	  success: function (response) {
	   $( '#course_name' ).html(response);
	  }
  });  
 }  
} 
function getCourseName2(f)
{
$( '#err' ).html('');	
 var stream_id=f.stream.value;	
 var course_id=f.course_category.value;	
 
 if((stream_id) && (course_id))
 {
  $.ajax({
	  type: 'post',
	  url: 'getCourseName.php',
	  data: {
	   course_id:course_id,
	   stream_id:stream_id,
	  },
	  success: function (response) {
	   $( '#course_name' ).html(response);
	  }
  });  
 }  
} 
</script>
<?php include_once('Master-Footer.php');?>
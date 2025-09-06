<?php 
$page='exammaster'; $innerpage='addexam';
include_once('Master-Header.php');

if (isset($_POST['submit'])) 
{
	echo 'sdfsdfs';
	$errors = array();

	if (empty($stream_name))
		$errors[stream_name] = "<span class='text-danger' id='streamerr'>Empty!</span>";
	
	if (empty($exam_name))
		$errors[exam_name] = "<span class='text-danger' id='examerr'>Empty!</span>";
	else
	{
		$sql3="select * from exam_type where exam_type_id ='$exam_name'";
		$qr3=mysqli_query($conn, $sql3) or die($sql3.mysqli_error($conn));
		$r3=mysqli_fetch_object($qr3);
		$exam_name1=$r3->exam_name ;
		$exam_slug = trim($exam_name1); 
		$exam_slug= preg_replace('/[^a-zA-Z0-9 -]/','',$exam_slug );  
		$exam_slug= str_replace(' ','-', $exam_slug);   
		$exam_slug= strtolower($exam_slug); 
	}
	if (empty($accepting))
		$errors[accepting] = "<span class='text-danger'>Empty!</span>";
	else
	{   $accept='';
		foreach ($_POST['accepting'] as $namesac)
		{
			$accept .= $namesac .',';
		}
		$accept = trim($accept,',');
	
	}
	if (empty($exam_title))
		$errors[exam_title] = "<span class='text-danger' id='titleerr'>Empty!</span>";
	else
	{ 
	  $length = strlen($exam_title);
	  if ($length > 500)
	  $errors[exam_title] = "<span class='text-danger' id='titleerr'>Too Long!</span>";	
	  else
	  {
		$slug = trim($exam_title); 
		$slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug );  
		$slug= str_replace(' ','-', $slug);   
		$slug= strtolower($slug); 
	  }
	}
	
	if(!is_numeric($app_fee) AND !empty($app_fee))
		$errors[app_fee] = "<span class='text-danger'  id='fee_err'> Invalid  !</span>";
	if (empty($app_date))
		$errors[app_date] = "<span class='text-danger' id='ap_dt_err'>Empty!</span>";
	else
	{ 
	  $app_date = date('d-m-Y', strtotime($app_date));
	}
	if (empty($exam_date))
		$errors[exam_date] = "<span class='text-danger' id='ex_dt_err'>Empty!</span>";
	else
	{ 
	  $ex_date = date('d-m-Y', strtotime($exam_date));
	}
	if (empty($result_date))
		$errors[result_date] = "<span class='text-danger' id='rs_dt_err'>Empty!</span>";
	else
	{ 
	  $rs_date = date('d-m-Y', strtotime($result_date));
	}
	
	
	if(!empty($_FILES ['logoImg']['name']))
	{		
		$target_logo_file = basename ($_FILES ['logoImg']['name']); 
		$LogoFileType = strtolower(pathinfo($target_logo_file,PATHINFO_EXTENSION));
		if($LogoFileType != "jpg"  &&  $LogoFileType != "png" && $LogoFileType !=  "jpeg" )
		{	
			$errors[logoImg]="<span class='text-danger' id='logo_err'> Only JPEG, PNG </span>"; 
		}
		else
		{
			if ($_FILES ['logoImg']['size'] > .5*1024*1024) 
			{
				$errors[logoImg] = "<span class='text-danger' id='logo_err'> Max 500 kb!</span>";
			}
		}
	} 
	

	
	if(empty($errors))
	{
$q1="select * from exam_detail where stream_id ='$stream_name' AND  exam_name_id ='$exam_name' "; 
$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn)); 
$found_data=mysqli_num_rows($qr1);
if($found_data == 0)
{
 		
		$exam_title = ucwords(mysqli_real_escape_string($conn, $exam_title));
		$slug = mysqli_real_escape_string($conn, $slug);
		$short_name = mysqli_real_escape_string($conn, $short_name);
		$popular_name = mysqli_real_escape_string($conn, $popular_name);
		$overview = mysqli_real_escape_string($conn, $overview);
		$eligibility = mysqli_real_escape_string($conn, $eligibility);
		$exam_pattern = mysqli_real_escape_string($conn, $exam_pattern);
		$application_edate = date('d-m-Y', strtotime($application_edate));
		$app_fee = mysqli_real_escape_string($conn, $app_fee);
		$website = mysqli_real_escape_string($conn, $website);
		
		
		if(!empty($_FILES ['logoImg']['name']))
		{
			$logo_file_name ='Logo-'. rand().'.'.$LogoFileType;
			$target_dir1 = "Exam_Logo/";
			if(is_dir($target_dir1) === false )   	
			{        
			mkdir($target_dir1);   
			}	 
			$logo_move=$target_dir1 . basename($logo_file_name); 
		}
		
	
		
		$q = "insert into exam_detail values(null,'$stream_name','$exam_name','$exam_slug','$exam_title','$slug','$short_name','$popular_name','$app_date','$application_edate','$ex_date','$rs_date','$counselling_date','$app_fee','$logo_file_name','$accept','$overview','$eligibility','$exam_pattern','$currentdt','$website','','')";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		}
		else
		{	 
			$exam_added_id= mysqli_insert_id($conn);
			move_uploaded_file($_FILES ['logoImg']['tmp_name'], $logo_move); 
			move_uploaded_file($_FILES ['brochure']['tmp_name'], $brochure_move); 

			/* echo "<script>Swal.fire(
				  'Success!',
				  'Your record saved successfully!',
				  'success'
				)
				.then(function() {
				window.location = 'Add-Exam';
				});			
				</script>";    */ 
				/* $q2 = "delete from exam_detail_extra where exam_id ='$exam_added_id'";
				mysqli_query($conn, $q2); */

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
						$q3 = "insert into exam_detail_extra values(null,'$exam_added_id','$exam_slug','$title_head','$description','$currentdt','$slug','','','')";
						mysqli_query($conn, $q3);
					}
				}
				echo "<script>alert('Your record saved successfully!');</script>";
				echo "<script>window.location.href='Add-Exam' ; </script>";
		} 
} 
else
$errors[exam_name] = "<span class='text-danger' id='examerr'>Already Added</span>"; 	 	
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
	  <h6 class='text-primary bold mt-n3'>Add Exam</h6></h3>
	</div>	   
   </div><br>		
  </div>
	  
 <div class="container-fluid px-4 ">
   <div class="col-md-12 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>

	<div class='container-fluid '>	
	 <div class="row bold">
		<div class="col-6"> <a href="Add-Exam" class='bg-info px-3 ml-n2 py-1  rounded sd-1'>
			<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
		</div> 
		<div class="col-6 text-right"> <a href="Exam-List" class='bg-info px-3 mr-n2 py-1  rounded sd-1'>
			<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
		</div>
	  </div>
	</div> 
	
	<div>
	  <form action="Add-Exam" method="POST" enctype="multipart/form-data">
		<div class="row bold">
		  <div class="col-md-4 my-2">
		  Stream * :  <?php echo $errors[stream_name];?> 
		   <select  id='stream_name' name="stream_name" class='form-control form-control-sm' onchange='loadCourse(this.value)'>
			<option value="">-- Select --</option>
			<?php
			$q10 = "select * from stream order by stream_name ";
			$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
			while ($r10 = mysqli_fetch_object($qr10)) {
				$stream_id   = $r10->stream_id ;
				$streamname = $r10->stream_name;
			?>
				<option value="<?php echo $stream_id ; ?>" <?php if($stream_name == $stream_id) echo ' selected';?>>
					<?php echo $streamname; ?>
				</option>
			<?php
			}
			?>
			</select>
		  </div>
		  
		  <!--<div class="col-md-4 my-2">Course Name :  <?php echo $errors[course_name];?>  
			<select class='form-control form-control-sm' name='course_name' id='course_name'>
			<option value="">-- Select --</option> 
			<?php 
				$q1 = "select * from course_name where stream_id='$stream_name' order by course_name";
				$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
				$found_data=mysqli_num_rows($qr1);
				if($found_data > 0)
				{
					while ($r1 = mysqli_fetch_object($qr1)) 
					{
					$course_id1  = $r1->course_id  ;
					$coursename = $r1->course_name;
					?>
					<option value="<?php echo $course_id1;?>" <?php if($course_name == $course_id1) echo ' selected';?> ><?php echo $coursename;?></option> 

					<?php 
					} 
				} 
			?>			
			</select> 			  
		  </div>--> 
		  
		  <div class="col-md-4 my-2">
		  Exam Name * :  <?php echo $errors[exam_name];?> 
		   <select  id='exam_name' name="exam_name" class='form-control form-control-sm' onchange='checkExamName(this.value);'  required=''>
			<option value="">-- Select --</option>
			<?php
			$q10 = "select * from exam_type order by exam_name ";
			$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
			while ($r10 = mysqli_fetch_object($qr10)) {
				$exam_type_id    = $r10->exam_type_id  ;
				$examname = $r10->exam_name;
			?>
				<option value="<?php echo $exam_type_id  ; ?>" <?php if($exam_name == $exam_type_id) echo ' selected';?>>
					<?php echo $examname; ?>
				</option>
			<?php
			}
			?>
			</select>
		  </div>
		  
		  <div class="col-md-4 my-2">
		  Exam Full Name :  <?php echo $errors[exam_title];?> 
		    <input type="text" class='form-control form-control-sm' name="exam_title" value="<?php echo $exam_title;?>"  required=''/>
		  </div>
		  <div class="col-md-4 my-2">
		  Exam Short Name : 
		    <input type="text" class='form-control form-control-sm' name="short_name" value="<?php echo $short_name;?>"  required=''/>
		  </div>
		  <div class="col-md-4 my-2">
		  Exam Popular Name : 
		    <input type="text" class='form-control form-control-sm' name="popular_name" value="<?php echo $popular_name;?>"  required=''/>
		  </div>
		  <div class="col-md-4 my-2">
		  Website (Optional):  
		  <input type="text" class='form-control form-control-sm' name="website" value="<?php echo $website;?>" placeholder='Website' />
		  </div>
		 
		  <div class="col-md-4 my-2">
		    Application start Date  :  <?php echo $errors[app_date];?> 
		    <input type="date" class='form-control form-control-sm' name="app_date" value='<?php echo $app_date;?>'  />
		  </div>
		  
		   <div class="col-md-4 my-2">
		    Application End Date  :  
		    <input type="date" class='form-control form-control-sm' name="application_edate" value='<?php echo $application_edate;?>'  />
		  </div>
		  <div class="col-md-4 my-2">
		    Result Date  :  <?php echo $errors[result_date];?> 
		    <input type="date" class='form-control form-control-sm' name="result_date" value='<?php echo $result_date;?>' />
		  </div>
		   <div class="col-md-4 my-2">
		    Exam Date  :  <?php echo $errors[exam_date];?> 
		    <input type="date" class='form-control form-control-sm' name="exam_date" value='<?php echo $exam_date;?>' />
		  </div>
		    <div class="col-md-4 my-2">
		    Counselling Start Date  :  
		    <input type="date" class='form-control form-control-sm' name="counselling_date" value='<?php echo $counselling_date;?>' />
		  </div>
		  <div class="col-md-4 my-2">
		    Application Fee :  <?php echo $errors[app_fee];?> 
		    <input type="text" onkeypress="return isNumber(event)" placeholder='0' maxlength='10' class='form-control form-control-sm' name="app_fee" value="<?php echo $app_fee;?>" />
		  </div>
		  
		  
		  
		 
		  
		  
		  
		
		  
		  <!--<div class="col-md-3 my-2">
		  Exam Level * :  <?php echo $errors[exam_level];?> 
		   <select  id='exam_level' name="exam_level" class='form-control form-control-sm' >
			<option value="">-- Select --</option>
			<?php
			$q10 = "select * from exam_level order by exam_level_name ";
			$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
			while ($r10 = mysqli_fetch_object($qr10)) {
				$exm_id     = $r10->exm_id   ;
				$examlevelname = $r10->exam_level_name;
			?>
				<option value="<?php echo $exm_id  ; ?>" <?php if($exam_level == $exm_id ) echo '  selected';?> > <?php echo $examlevelname; ?>
				</option>
			<?php
			}
			?>
			</select>
		  </div>-->
		  
		  <!--<div class="col-md-3 my-2">
		    Exam Type  :  <?php echo $errors[exam_type];?> 
		    <select id='exam_type' name="exam_type" class='form-control form-control-sm' >
			  <option value="">-- Select --</option>
			  <option value="Online Mode" <?php if($exam_type == 'Online Mode' ) echo ' selected';?> > Online Mode
			  <option value="Offline Mode" <?php if($exam_type == 'Offline Mode' ) echo ' selected';?> > Offline Mode
			  </option>
			</select>
		  </div>-->
		  
		  <!--<div class="col-md-3 my-2">
		  State * :  <?php echo $errors[exam_state];?> 
		   <select id='exam_state' name="exam_state" class='form-control form-control-sm' >
			<option value="">-- Select --</option>
			<?php
			$q10 = "select * from state_data where country_id = '101' order by statename ";
			$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
			while ($r10 = mysqli_fetch_object($qr10)) {
				$state_id     = $r10->state_id   ;
				$statename = $r10->statename;
			?>
				<option value="<?php echo $state_id  ; ?>" <?php if($exam_state == $state_id ) echo '  selected';?> > <?php echo $statename; ?>
				</option>
			<?php
			}
			?>
			</select>
		  </div>-->
		  <div class="col-md-6 my-2	">Upload Logo : <?php echo $errors[logoImg];?> 
			<input type="file"  name="logoImg"  class="form-control form-control-sm" onchange="logoImgCheck(this)" value="<?php echo $logoImg ;?>" id="logoImg"  accept="image/*">
		  </div>
		  
		  <!--<div class="col-md-3 my-2	">Upload PDF : <?php echo $errors[brochure];?>
			<input type="file"  name="brochure"  class="form-control form-control-sm" onchange="brocherCheck(this)" value="<?php echo $brochure ;?>" id="brochure"  accept="application/pdf">
		  </div>--> 
		  
		  <div class="col-md-6 	my-2">Top College through accepting CLAT:   <br> 
		   <select id='affiliation' name="accepting[]" class="chosen-select form-control form-control-sm" multiple='multiple' data-placeholder="-- Select --" > 
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
		  
		  <div class="col-md-12 my-2">Overview  :  <?php echo $errors[overview];?>			  
			  <textarea name="overview" id="overview" style='resize:none;' class='form-control form-control-sm' rows="5"><?php echo $overview;?></textarea>		  
		  </div>
		   <div class="col-md-12 my-2">Eligibility  : 			  
			  <textarea name="eligibility" id="eligibility" style='resize:none;' class='form-control form-control-sm' rows="5"><?php echo $eligibility;?></textarea>		  
		  </div>
		   <div class="col-md-12 my-2">Pattern of Exam  : 			  
			  <textarea name="exam_pattern" id="exam_pattern" style='resize:none;' class='form-control form-control-sm' rows="5"><?php echo $exam_pattern;?></textarea>		  
		  </div>
		  <div class="col-md-12">
			<br>
			<div id="containerss">
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
							<textarea class="form-control form-control-outline" placeholder="Section Description" name="description[]" id="description"></textarea>
						 </div>
					  </div>
				   </div>
				</fieldset>
			 </div>
			 <div class="mb-3 text-right mt-n3"><a href="javascript:void();" id="adds" class="badge badge-success py-2 px-2 badge-pill">+ Add New Section</a></div>
		  </div>
		  
		  
		  
		  
		  
		  <div class="col-md-12 my-2 text-center"> <br>			
			<input type="submit" value='Submit' name='submit' id='saverecord' class='mx-2 bold  btn btn-sm bg-info px-4'/>
			<a href='Add-Exam' class="bold btn btn-sm bg-info px-4 mx-2">Reset </a>
		  </div>		  
		</div>			
	  </form> 
	</div> 
   </div><br><br><br><br>
 </div>
</div>
  <!-- /.content-wrapper -->
  
 
<?php include_once('Master-Footer.php');?> 
<script>
function loadCourse(f)
{
  $( '#streamerr' ).html(''); 
 var streamid = f; 
 if(streamid)
 {
    $.ajax({
	type: 'post',
	url: 'loadCourseData.php',
	data: {
		streamid: streamid,
		},
		success: function(response) { 
		$('#course_name').html(response);
		$('#exam_name').val(''); 
	}
  });
 }
 else
  {
	 $('#course_name').html('<option value="">-- Select --</option>'); 
	 $('#exam_name').val('');  
  }
}
 
function checkExamName()
{
   $('#examerr').html(''); 
  var streamid= $( '#stream_name' ).val(); 
  var courseid= $( '#course_name' ).val(); 
  var examid= $( '#exam_name' ).val();  
  if ((streamid) && (courseid) && (examid) ) 
	{		
		 $.ajax({
			type: 'post',
			url: 'examNameCheck.php',
			data: {				
				streamid: streamid,
				courseid: courseid,
				examid: examid, 
			},
			success: function(response) { 			
			  if (response === 'added') {
				Swal.fire('Already Added');	  
			  $( "#saverecord" ).prop( "disabled", false );
			  } 
			}
		}); 
		
	}
}
function logoImgCheck()
{	 
	var oFile = document.getElementById("logoImg").files[0]; 

	if (oFile.size > 512000) // 2 MiB for bytes.
	{
		alert("File size must under 500 KB!");
		document.getElementById("logoImg").value = ''; 	
		return;
	}
	else
	{
		var fileInput = document.getElementById('logoImg');

		var filePath = fileInput.value;

		// Allowing file type
		var allowedExtensions = 
		/(\.jpg|\.jpeg|\.png|\.JPG|\.PNG|\.JPEG)$/i;

		if (!allowedExtensions.exec(filePath)) 
		{
			alert('Invalid File Type. Only Image file allow!');
			fileInput.value = ''; 		
			return false;
		}
		else
		{			 
			document.getElementById("logoImg").innerHTML = "";			
		}	
	}
}

function brocherCheck()
{	 
	var oFile = document.getElementById("brochure").files[0]; 

	if (oFile.size > 2048000) // 2 MiB for bytes.
	{
		alert("File size must under 2 MB!");
		document.getElementById("brochure").value = ''; 	
		return;
	}
	else
	{
		var fileInput = document.getElementById('brochure');

		var filePath = fileInput.value;

		// Allowing file type
		var allowedExtensions = 
		/(\.pdf|\.PDF)$/i;

		if (!allowedExtensions.exec(filePath)) 
		{
			alert('Invalid File Type. Only PDF file allow!');
			fileInput.value = ''; 			
			return false;
		}
		else
		{			 	
			document.getElementById("brochure").innerHTML = "";			
		}	
	}
}
</script> 
<script type="text/javascript">
$(document).ready(function()
{
 CKEDITOR.replace('overview',{ height  : '150px' });
});
$(document).ready(function()
{
 CKEDITOR.replace('eligibility',{ height  : '150px' });
});
$(document).ready(function()
{
 CKEDITOR.replace('pattern',{ height  : '150px' });
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
<?php 
$page='exammaster'; $innerpage='examlevel';
include_once('Master-Header.php');
$examid=$_GET['id'];
if(empty($examid ))
{ 
  echo "<script>window.location.href='Exam-List';</script>";
}
else
{
	$sql="select * from exam_detail where ex_id =$examid ";
	$sql_qr=mysqli_query($conn, $sql);
	$found_data=mysqli_num_rows($sql_qr);
	if($found_data <> 1)
	 echo "<script>window.location.href='Exam-List';</script>";
}

	if (empty($accepting))
		$errors[accepting] = "<span class='text-danger'>Empty!</span>";
	else
	{   $accept='';
		foreach ($_POST['accepting'] as $anames)
		{
			$accept .= $anames .',';
		}
		$accept = trim($accept,',');
	}

if (isset($_POST['submit'])) 
{
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
	
	if(!is_numeric($app_fee) AND !empty($app_fee))
		$errors[app_fee] = "<span class='text-danger'  id='fee_err'> Invalid  !</span>";


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
	
	if (empty($app_date))
		$errors[app_date] = "<span class='text-danger' id='ap_dt_err'>Empty!</span>";
	else
	{ 
	  $ap_date = date('d-m-Y', strtotime($app_date));
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
	
	if (empty($application_edate))
		$errors[application_edate] = "<span class='text-danger' id='rs_dt_err'>Empty!</span>";
	else
	{ 
	  $app_edate = date('d-m-Y', strtotime($application_edate));
	}
	
		if (empty($counselling_date))
		$errors[counselling_date] = "<span class='text-danger' id='rs_dt_err'>Empty!</span>";
	else
	{ 
	  $co_date = date('Y-m-d', strtotime($counselling_date));
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
/*
			$q1="select * from exam_detail where stream_id ='$stream_name' AND  course_id ='$course_name' AND  exam_name_id ='$exam_name' AND title_url ='$slug' AND exam_slug ='$exam_slug'";  
			$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn)); 
			echo 'sdfsf'.$found_data=mysqli_num_rows($qr1);
			if($found_data == 0 or $found_data == 1 )
			{ 
				$exam_title = ucwords(mysqli_real_escape_string($conn, $exam_title));
				$slug = mysqli_real_escape_string($conn, $slug);
				$purpose = mysqli_real_escape_string($conn, $purpose);
				$overview = mysqli_real_escape_string($conn, $overview);
				$howtoapply = mysqli_real_escape_string($conn, $howtoapply);
				$howtoprepare = mysqli_real_escape_string($conn, $howtoprepare);
				$syllabus = mysqli_real_escape_string($conn, $syllabus);
				
				if(!empty($_FILES ['logoImg']['name']))
				{
					if(empty($oldlogo)) 
					$logo_file_name ='Logo-'. rand().'.'.$LogoFileType;
					else
					$logo_file_name =$oldlogo;
					
					$target_dir1 = "Exam_Logo/";
					if(is_dir($target_dir1) === false )   	
					{        
					mkdir($target_dir1);   
					}	 
					$logo_move=$target_dir1 . basename($logo_file_name); 
				}
				else
					$logo_file_name =$oldlogo;
				
				if(!empty($_FILES ['brochure']['name']))
				{
					if(empty($oldlogo)) 			
					$brochure_file_name ='Doc-'. rand().'.'.$BrochureFileType;
					else
					$brochure_file_name =$oldbrochure; 
					$target_dir3 = "Exam_Document/";
					if(is_dir($target_dir3) === false )   	
					{        
					mkdir($target_dir3);   
					}	
					$brochure_move=$target_dir3 . basename($brochure_file_name);
				}
				else
					$brochure_file_name =$oldbrochure; 
				
				$q = "update exam_detail set stream_id = '$stream_name', course_id = '$course_name', course_branch_id = '$branch_name', exam_name_id = '$exam_name', exam_title = '$exam_title', title_url = '$slug', total_seat = '$no_application', exam_purpose = '$purpose', app_fee = '$application_fee', app_date = '$app_date', exam_date ='$ex_date', result_date = '$rs_date', exam_level_id = '$exam_level', exam_type_id = '$exam_type', state_id = '$exam_state',exam_logo = '$logo_file_name', exam_doc = '$brochure_file_name', exam_overview = '$overview', apply_process = '$howtoapply', syllabus  = '$syllabus',prepare_process = '$howtoprepare' where ex_id  = '$examid' ";
				if (!mysqli_query($conn, $q)) 
				{
					$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
					echo $message;
				}
				else
				{	 
					move_uploaded_file($_FILES ['logoImg']['tmp_name'], $logo_move); 
					move_uploaded_file($_FILES ['brochure']['tmp_name'], $brochure_move); 

				$q2 = "delete from exam_detail_extra where exam_id ='$examid' ";
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
						$q13 = "insert into exam_detail_extra values(null,'$examid','$exam_slug','$title_head','$description','$currentdt','$slug','','','')";
						mysqli_query($conn, $q13);
					}
				}




							echo "<script>Swal.fire(
								'Success!',
								'Your record update successfully!',
								'success'
						)
								.then(function() {
						window.location = 'Exam-List';
						});	  	
						</script>";   	  
				} 	  
		}
	else if($found_data > 1)  
		$errors[exam_name] = "<span class='text-danger' id='examerr'>Already Added</span>"; 	
	} */
	
	 
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
					if(empty($oldlogo)) 
					$logo_file_name ='Logo-'. rand().'.'.$LogoFileType;
					else
					$logo_file_name =$oldlogo;
					
					$target_dir1 = "Exam_Logo/";
					if(is_dir($target_dir1) === false )   	
					{        
					mkdir($target_dir1);   
					}	 
					$logo_move=$target_dir1 . basename($logo_file_name); 
				}
				else
					$logo_file_name =$oldlogo;
				
			
				
				$q = "update exam_detail set stream_id = '$stream_name', exam_name_id = '$exam_name', exam_slug = '$exam_slug',exam_fullname='$exam_title', title_url = '$slug', short_name = '$short_name', popular_name = '$popular_name', app_fee = '$application_fee', app_start_date = '$ap_date',app_end_date='$app_edate', exam_date ='$ex_date', result_date = '$rs_date', counselling_date = '$co_date', app_fee = '$app_fee',exam_logo = '$logo_file_name',accept_clat='$accept', exam_overview = '$overview', eligibility = '$eligibility', exam_pattern  = '$exam_pattern',website = '$website' where ex_id  = '$examid' ";
				if (!mysqli_query($conn, $q)) 
				{
					$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
					echo $message;
				}
				else
				{	 
					move_uploaded_file($_FILES ['logoImg']['tmp_name'], $logo_move); 
				

				$q2 = "delete from exam_detail_extra where exam_id ='$examid' ";
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
						$q13 = "insert into exam_detail_extra values(null,'$examid','$exam_slug','$title_head','$description','$currentdt','$slug','','','')";
						mysqli_query($conn, $q13);
					}
				}
 
							echo "<script>Swal.fire(
								'Success!',
								'Your record update successfully!',
								'success'
						)
								.then(function() {
						window.location = 'Exam-List';
						});	  	
						</script>";   	  
				} 
	
  }
}
else
{
	$rr = mysqli_fetch_object($sql_qr);
	$ex_id    	= $rr->ex_id  ; 
	$stream_name    	= $rr->stream_id  ; 
	$course_name  	= $rr->course_id;    
	$branch_name  	= $rr->course_branch_id; 	
	$exam_name  	= $rr->exam_name_id; 	
	$exam_title  	= $rr->exam_fullname; 	
	$no_application  	= $rr->total_seat; 	
	$exam_pattern  	= $rr->exam_pattern; 
	$app_fee  	= $rr->app_fee;   	
	$application_date  	= $rr->app_start_date;
	$app_edate  	= $rr->app_end_date; 
	$res_date  	= $rr->result_date;
	$ex_date  	= $rr->exam_date;
	$coun_date  	= $rr->counselling_date;
	$app_date	=date('Y-m-d', strtotime($application_date));
	$application_edate	=date('Y-m-d', strtotime($app_edate));
	$exam_date	=date('Y-m-d', strtotime($ex_date));
	$result_date	=date('Y-m-d', strtotime($res_date));
	$counselling_date	=date('Y-m-d', strtotime($coun_date));
	$exam_level  	= $rr->exam_level_id; 	
	$exam_type 	= $rr->exam_type_id; 	
	$exam_state  	= $rr->state_id; 	
	$district_id1  	= $rr->district1; 	
	$pincode1  	= $rr->pincode1; 	
	$contact_no  	= $rr->college_contact; 	
	$email_id  	= $rr->college_email; 	
	$website  	= $rr->college_website; 	
	$affiliation1  	= $rr->college_affiliation; 	
	$description  	= $rr->about_college; 	
	$oldlogo  	= $rr->exam_logo;   	
	$oldbrochure  	= $rr->exam_doc;  
	$overview  	= $rr->exam_overview;  
	$syllabus  	= $rr->syllabus;  
	$howtoapply  	= $rr->apply_process;  
	$howtoprepare  	= $rr->prepare_process; 		
	$displayrank  	= $rr->displayrank;
	$short_name  	= $rr->short_name; 
	$popular_name  	= $rr->popular_name;
	$eligibility  	= $rr->eligibility;
	$acceptance1  	= $rr->accept_clat; 
    $accepting = explode(',',$acceptance1);
} 	

	$sql1="select * from exam_detail_extra where exam_id='$examid'";
	$sql_qr1=mysqli_query($conn, $sql1);
	$examfound=mysqli_num_rows($sql_qr1);
?>

<div class="content-wrapper"> 
  <div class="container-fluid text-uppercase ">
   <div class="row bg-white p-2" style='box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;'>
	<div>
	  <i class="fa fa-database text-danger fa-3x pl-1 pr-3" aria-hidden="true"></i> 
	</div>
	<div>
	  <h3 class='bold text-danger'> Exam Master  
	  <h6 class='text-primary bold mt-n3'>Exam List</h6></h3>
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
	  <form action="Exam-Modify?id=<?php echo $examid;?>" method="POST" enctype="multipart/form-data">
		<div class="row bold">
		<input type="hidden" value='<?php echo $examid;?>' id='old_exam_id' />
		  <div class="col-md-4 my-2">
		  Stream * :  <?php echo $errors[stream_name];?> 
		   <select  required='' id='stream_name' name="stream_name" class='form-control form-control-sm' onchange='loadCourse(this.value)'>
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
			<select class='form-control form-control-sm' name='course_name' id='course_name'  required=''>
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
		  <div class="col-md-6 my-2	">Upload Logo : <?php echo $errors[logoImg];?> 
			<input type="file"  name="logoImg"  class="form-control form-control-sm" onchange="logoImgCheck(this)" value="<?php echo $logoImg ;?>" id="logoImg"  accept="image/*">
			<input type="hidden" class='form-control form-control-sm' value='<?php echo $oldlogo;?>' name='oldlogo'/>
		  </div>
		  
		   <div class="col-md-6 	my-2">Top College through accepting CLAT:   <br> 
		   
		    <select  required='' id='accepting' name="accepting[]" class="chosen-select form-control form-control-sm " multiple='multiple' data-placeholder="-- Select --" > 
			<?php
			$q10="select * from college_data order by college_name ";
			$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
			while($r10=mysqli_fetch_object($qr10))
			{ 
			$affiliation_id0 =$r10->c_id   ;
			$affiliation_name0=$r10->college_name ; 
			?>	
			<option value='<?php echo $affiliation_id0;?>' 
			<?php if(in_array($affiliation_id0, $accepting)) echo ' selected';?>
			> <?php echo $affiliation_name0;?>
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
				<?php  
				if($examfound > 0)
				{
					$id=1;	
					while($rr1 = mysqli_fetch_object($sql_qr1))
					{
					$title 			= $rr1->ex_tilte;
					$description 	= $rr1->ex_details;
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










		  
		   
		   
		   
		   
		  
		  
		  <div class="col-md-12 my-2 text-center"> <br>		
			<input type="submit" value='Update' name='submit' class='mx-2 bold  btn btn-sm bg-info px-4'/>
			<a href='Exam-List' class="bold btn btn-sm bg-info px-4 mx-2">Back </a>
		  </div>		  
		</div>			
	  </form> 
	</div> 
   </div><br><br><br><br>
 </div>
</div>
  <!-- /.content-wrapper -->
  
  
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
	 $('#exam_name').val()='';  
  }
}
function checkExamName()
{
   $('#examerr').html(''); 
  var streamid= $( '#stream_name' ).val(); 
  var courseid= $( '#course_name' ).val(); 
  var exam_name= $( '#exam_name' ).val();  
  var old_exam_id= $( '#old_exam_id' ).val();  
  if ((streamid) && (courseid) && (exam_name) && (old_exam_id) ) 
	{		
		 $.ajax({
			type: 'post',
			url: 'examNameCheckModify.php',
			data: {				
				streamid: streamid,
				courseid: courseid,
				exam_name: exam_name, 
				old_exam_id: old_exam_id, 
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
<?php include_once('Master-Footer.php');?>
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
 CKEDITOR.replace('exam_pattern',{ height  : '150px' }); 
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
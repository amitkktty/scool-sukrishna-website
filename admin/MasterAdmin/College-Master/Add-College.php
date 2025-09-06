<?php 
$page='college'; $innerpage='addcollege';
include_once('Master-Header.php');

if (isset($_POST['submit'])) 
{
	$errors = array();

	if (empty($college_name))
		$errors[college_name] = "<span class='text-danger'>Empty!</span>";
	else
	{
		$length = strlen($college_name);
		if ($length > 255)
		$errors[college_name] = "<span class='text-danger'>Too Long!</span>";
	    
	}
	if (empty($estd_year))
		$errors[estd_year] = "<span class='text-danger'>Empty!</span>";
	else
	{
		$length = strlen($estd_year);
		if ($length <> 4)
		$errors[estd_year] = "<span class='text-danger'>Invalid </span>";

	}
	if (empty($ownership_id))
		$errors[ownership_id] = "<span class='text-danger'>Empty!</span>";
	
	if (empty($affiliation))
		$errors[affiliation] = "<span class='text-danger'>Empty!</span>";
	else
	{   $affiliat='';
		foreach ($_POST['affiliation'] as $names)
		{
			$affiliat .= $names .',';
		}
	$affiliat = trim($affiliat,',');
	}
	
	if (empty($acceptence))
		$errors[acceptence] = "<span class='text-danger'>Empty!</span>";
	else
	{   $accept='';
		foreach ($_POST['acceptence'] as $namesac)
		{
			$accept .= $namesac .',';
		}
		$accept = trim($accept,',');
	
	}
	
	if (empty($address1))
		$errors[address1] = "<span class='text-danger'>Empty!</span>";
	else
	{
		$length = strlen($address1);
		if ($length > 255)
		$errors[address1] = "<span class='text-danger'>Too Long!</span>";	    
	}
	if (empty($country_id1))
		$errors[country_id1] = "<span class='text-danger'>Empty!</span>"; 
	if (empty($state_id1))
		$errors[state_id1] = "<span class='text-danger'>Empty!</span>";
	if (empty($district_id1))
		$errors[district_id1] = "<span class='text-danger'>Empty!</span>";
	else
	{
		$q1="select * from district_data where district_id='$district_id1' ";
		$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
		$r1=mysqli_fetch_object($qr1);
		$district_name=$r1->district_name ; 
	}
	
	if (empty($pincode1))
		$errors[pincode1] = "<span class='text-danger'>Empty!</span>";
	else
	{
		if(!is_numeric($pincode1))
		$errors[pincode1] = "<span class='text-danger'> Invalid  !</span>";
		else
		{
			$length = strlen($pincode1);
			if ($length <> 6)
			$errors[pincode1] = "<span class='text-danger'>Invalid </span>";	
		}		
	}
	
	if (!empty($contact_no))
	{
		if(!is_numeric($contact_no))
		$errors[contact_no] = "<span class='text-danger'> Invalid  !</span>";
		else
		{
			$length = strlen($contact_no);
			if ($length <> 10)
			$errors[contact_no] = "<span class='text-danger'>Invalid </span>";	
		}		
	}
	if (!empty($email_id))
	{
		 if (!filter_var($email_id, FILTER_VALIDATE_EMAIL))
		$errors[email_id] = "<span class='text-danger'> Invalid  !</span>";
		else
		{
			$length = strlen($email_id);
			if ($length > 255)
			$errors[email_id] = "<span class='text-danger'>Invalid </span>";	
		}		
	} 
	if(!empty($_FILES ['logoImg']['name']))
	{		
		$target_logo_file = basename ($_FILES ['logoImg']['name']); 
		$LogoFileType = strtolower(pathinfo($target_logo_file,PATHINFO_EXTENSION));
		if ($_FILES ['logoImg']['size'] > 2*1024*1024) 
		{
			$errors[logoImg] = "<span class='text-danger'> Max 2 mb!</span>";
		}
	}
	
	if(!empty($_FILES ['bannerImg']['name']))
	{		
		$target_banner_file = basename ($_FILES ['bannerImg']['name']); 
		$BannerFileType = strtolower(pathinfo($target_banner_file,PATHINFO_EXTENSION));
		if ($_FILES ['bannerImg']['size'] > 2*1024*1024) 
		{
			$errors[bannerImg] = "<span class='text-danger'> Max 2 mb!</span>";
		}
	}
	
	if(!empty($_FILES ['brochure']['name']))
	{		
		$target_brochure_file = basename ($_FILES ['brochure']['name']); 
		$BrochureFileType = strtolower(pathinfo($target_brochure_file,PATHINFO_EXTENSION));
		if ($_FILES ['brochure']['size'] > 2*1024*1024) 
		{
			$errors[brochure] = "<span class='text-danger'> Max 2 mb!</span>";
		}
	}
	 
	if (empty($aboutcollege))
		$errors[aboutcollege] = "<span class='text-danger'>Empty!</span>";
	

		$college_name = mysqli_real_escape_string($conn, $college_name);
		$popular_name = mysqli_real_escape_string($conn, $popular_name);
		$also_known = mysqli_real_escape_string($conn, $also_known);
		$short_name = mysqli_real_escape_string($conn, $short_name);
		$address1 = mysqli_real_escape_string($conn, $address1);
		$address2 = mysqli_real_escape_string($conn, $address2);
		$address3 = mysqli_real_escape_string($conn, $address3);
		$mobile2 = mysqli_real_escape_string($conn, $mobile2);
		$mobile3 = mysqli_real_escape_string($conn, $mobile3);
		$email_id = mysqli_real_escape_string($conn, $email_id);
		$website = mysqli_real_escape_string($conn, $website);
		$aboutcollege = mysqli_real_escape_string($conn, $aboutcollege);

		$slug = trim($college_name); 
		$slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug );  
		$slug= str_replace(' ','-', $slug); 
		$district_name_slug= str_replace(' ','-', $district_name); 
		$slug= $slug.'-'.$district_name_slug;
		$slug= strtolower($slug); 

		if(!empty($_FILES ['logoImg']['name']))
		{
		$logo_file_name ='Logo-'. rand().'.'.$LogoFileType;
		$target_dir1 = "College_Logo/";
		if(is_dir($target_dir1) === false )   	
		{        
		mkdir($target_dir1);   
		}	 
		$logo_move=$target_dir1 . basename($logo_file_name); 
		}
		if(!empty($_FILES ['bannerImg']['name']))
		{
			$banner_file_name ='Banner-'. rand().'.'.$BannerFileType;
			$target_dir2 = "College_Banner/";
			if(is_dir($target_dir2) === false )   	
			{        
			  mkdir($target_dir2);   
			}
			$banner_move=$target_dir2 . basename($banner_file_name);	  
		}	   

		if(!empty($_FILES ['brochure']['name']))
		{
			$brochure_file_name ='Brochure-'. rand().'.'.$BrochureFileType;
			$target_dir3 = "College_Brochure/";
			if(is_dir($target_dir3) === false )   	
			{        
				mkdir($target_dir3);   
			}	
			$brochure_move=$target_dir3 . basename($brochure_file_name);
		}
		
		$q11="select * from college_data where college_seo_url ='$slug'"; 
		$qr11=mysqli_query($conn, $q11) or die($q11.mysqli_error($conn)); 
		$founddata=mysqli_num_rows($qr11);
		if($founddata == 0)
		{		
		
			 $q = "insert into college_data values(null,'$college_name','$popular_name','$short_name','$slug','College','$estd_year','$ownership_id','$affiliat','$accept','$address1','101','$state_id1','$district_id1','$pincode1','$contact_no','$email_id','$website','$aboutcollege','$logo_file_name','$banner_file_name','$brochure_file_name','fa fa-university','$currentdt','$displayrank','','','','','','','','$also_known','$address2','$address3','$mobile2','$mobile3' )";
			if (!mysqli_query($conn, $q)) 
			{
				$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
				echo $message;
			}
			else
			{ 
				move_uploaded_file($_FILES ['logoImg']['tmp_name'], $logo_move);
				move_uploaded_file($_FILES ['brochure']['tmp_name'], $brochure_move);
				move_uploaded_file($_FILES ['bannerImg']['tmp_name'], $banner_move);   
				$cid= mysqli_insert_id($conn);
				
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
						$q3 = "insert into college_data_extra values(null,'$cid','$college_name','$slug','$title_head','$description','$currentdt','','','','')"; 
						if (!mysqli_query($conn, $q3)) 
						{
							$message = "Error description:  " . $q3 . "<br>" . mysqli_error($conn);
							echo $message;
						}
					}
				}
					/* echo "<script>Swal.fire(
					'Success!',
					'Your record saved successfully!',
					'success'
					)
					.then(function() {
					window.location = 'Add-College';
					});			
					</script>";   */ 
					echo "<script>alert('Your record saved successfully!');</script>";
					echo "<form action='Add-College' method=post name=main></form>
					<script>document.main.submit(); </script>";	  
			}	  
		}
		else
			$errors[college_name] = "<span class='text-danger'>Already Added</span>";
	
} 
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
		  <h6 class='text-primary bold mt-n3'>Add College</h6></h3>
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
		<a href="Import-College" class='bg-info px-3 mr-2 py-1  rounded sd-1'>
		<i class="px-2 fa fa-file-excel" aria-hidden="true"></i> Import College </a>
		
		<a href="College-List" class='bg-info px-3 mr-n2 py-1  rounded sd-1'>
		<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> College List </a>		
		</div>
	  </div>
	</div> 
	
	<div>
	  <form action="Add-College" method="POST" enctype="multipart/form-data">
		<div class="row bold mt-3">
		  <div class="col-md-12 ">College Name * : <?php echo $errors[college_name];?>
		  <input type="text" required='' class='form-control form-control-sm'   name='college_name' value='<?php echo $college_name;?>' />	  
		  </div>
		  <div class="col-md-6">Also Known As  : 
		  <input type="text" class='form-control form-control-sm' name='also_known' value='<?php echo $also_known;?>'  />				  
		  </div>
		  <div class="col-md-6">College Short Name  :  
		  <input type="text" class='form-control form-control-sm' name='short_name' value='<?php echo $short_name;?>'  />				  
		  </div>
		  <div class="col-md-8 ">Popular Name  :  <?php echo $errors[popular_name];?>
		  <input type="text" class='form-control form-control-sm' name='popular_name' value='<?php echo $popular_name;?>'  />				  
		  </div>
		  
		  
		  
		  <div class="col-md-4 	">Estd. Year * : <?php echo $errors[estd_year];?>   
			 <input type="text" class='form-control form-control-sm' required='' name='estd_year' value='<?php echo $estd_year;?>'/>	
		   </select>				  
		  </div>
		  
		  <div class="col-md-6 	">Ownership * : <?php echo $errors[ownership_id];?>    
		   <select  required='' id='ownership_id' name="ownership_id" class='chosen form-control form-control-sm' >
			<option value="">-- Select --</option>
			<?php
			$q10="select * from ownership_data order by ownership_name ";
			$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
			while($r10=mysqli_fetch_object($qr10))
			{ 
			$ownership_id0 =$r10->ownership_id   ;
			$ownership_name0=$r10->ownership_name ; 
			?>	
			<option value=<?php echo $ownership_id0;?> <?php if($ownership_id == $ownership_id0 )echo ' selected';?>> <?php echo $ownership_name0;?>
			</option>
			<?php	
			}
			?>
		   </select>			  
		  </div>
		  
		  <div class="col-md-6 	">Affiliated From * : <?php echo $errors[affiliation];?>  <br> 
		   <select  required='' id='affiliation' name="affiliation[]" class="chosen-select form-control form-control-sm " multiple='multiple' data-placeholder="-- Select --" > 
			<?php
			$q10="select * from college_data where college_type='University' order by college_name ";
			$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
			while($r10=mysqli_fetch_object($qr10))
			{ 
			$affiliation_id0 =$r10->c_id   ;
			$affiliation_name0=$r10->college_name ; 
			?>	
			<option value='<?php echo $affiliation_id0;?>' 
			<?php if(in_array($affiliation_id0, $affiliation)) echo ' selected';?>
			> <?php echo $affiliation_name0;?>
			</option>
			<?php
			}
			?>
		   </select>			  
		  </div>
		  
		  <div class="col-md-12">Exam Acceptence * :  <br> 
		   <select  required='' id='acceptence' name="acceptence[]" class="chosen-select form-control form-control-sm " multiple='multiple' data-placeholder="-- Select --" > 
			<?php
			$q10="select * from exam_type order by exam_name ";
			$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
			while($r10=mysqli_fetch_object($qr10))
			{ 
			$affiliation_id0 =$r10->exam_type_id   ;
			$affiliation_name0=$r10->exam_name ; 
			?>	
			<option value='<?php echo $affiliation_id0;?>' 
			<?php if(in_array($affiliation_id0, $affiliation)) echo ' selected';?>
			> <?php echo $affiliation_name0;?>
			</option>
			<?php
			}
			?>
		   </select>			  
		  </div>
		  
		  <div class="col-md-12  ">Address Line 1 :<?php echo $errors[address1];?>  
			<div class="row">
				<div class="col-md-12 ">
				    <input type="text" required='' class='form-control form-control-sm'   name='address1' value='<?php echo $address1;?>' />  
				</div>
				<div class="col-md-12 ">Address Line 2  :
				    <input type="text" required='' class='form-control form-control-sm'   name='address2' value='<?php echo $address2;?>' />  
				</div>
				<div class="col-md-12 ">Address Line 3  : 
				    <input type="text" required='' class='form-control form-control-sm'   name='address3' value='<?php echo $address3;?>' />  
				</div>
				<!--<div class="col-md-3 ">  
				Country * :<?php echo $errors[country_id1];?>      
				<select  required='' id='country_id1' name="country_id1" class='form-control form-control-sm' onchange='getState1(this.value);' >
				    <option value="">-- Select --</option>
					<?php
					$q10="select * from country_data order by name ";
					$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
					while($r10=mysqli_fetch_object($qr10))
					{ 
					$country_id0=$r10->country_id ;
					$district_name0=$r10->name ;0
					?>	
					<option value=<?php echo $country_id0;?> <?php if($country_id1 == $country_id0 )echo ' selected';?>> <?php echo $district_name0;?>
					</option>
					<?php
					}
					?>
				   </select>	
				</div>-->
				<div class="col-md-4 ">  
				State * : <?php echo $errors[state_id1];?>   
				<select class='form-control form-control-sm' name='state_id1' id='state1'   required=''  onchange='getDistrict11(this.value);'>
				   <option value="">-- Select --</option>
					<?php
									 
						$q10="select * from state_data order by statename";
						$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
						while($r10=mysqli_fetch_object($qr10))
						{ 
							$state_id0=$r10->state_id ;
							$state_name0=$r10->statename ;
						?>	
						<option value=<?php echo $state_id0;?> <?php if($state_id1 == $state_id0 )echo ' selected';?>> <?php echo $state_name0;?>
						</option>
						<?php	
						} 
				
					?>				   
				</select>	
				</div>
				<div class="col-md-4 ">  
				District * :  <?php echo $errors[district_id1];?>   
				<select class='form-control form-control-sm' name='district_id1' id='district1'  required='' >
				   <option value="">-- Select --</option>
				   <?php
					if(!empty($state_id1))
					{					 
						$q10="select * from district_data where state_id ='$state_id1' order by district_name";
						$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
						while($r10=mysqli_fetch_object($qr10))
						{ 
							$district_id0 =$r10->district_id  ;
							$district_name0=$r10->district_name ; 
						?>	
						<option value=<?php echo $district_id0;?> <?php if($district_id1 == $district_id0 )echo ' selected';?>> <?php echo $district_name0;?>
						</option>
						<?php	
						} 
					}
					?>
				</select>	
				</div>
				<div class="col-md-4 ">  
				Pincode * :   <?php echo $errors[pincode1];?>
				<input type="text" class='form-control form-control-sm'  required='' name='pincode1' value='<?php echo $pincode1;?>'/>	
				</div>				
			</div>			  
		  </div> 
		  
		   
		  <div class="col-md-4 ">Mobile 1  :  <?php echo $errors[contact_no];?>  
		  <input type="text" class='form-control form-control-sm'  maxlength='10' name='contact_no' value='<?php echo $contact_no;?>'  />	  
		  </div>
		   <div class="col-md-4 ">Mobile 2  :   
		  <input type="text" class='form-control form-control-sm'  maxlength='10' name='mobile2' value='<?php echo $mobile2;?>'  />	  
		  </div>  
		   <div class="col-md-4 ">Mobile 3  :   
		  <input type="text" class='form-control form-control-sm'  maxlength='10' name='mobile3' value='<?php echo $mobile3;?>'  />	  
		  </div>  
		  
		  <div class="col-md-4 ">Email Id :  <?php echo $errors[email_id];?> 
		  <input type="text" class='form-control form-control-sm'  name='email_id' value='<?php echo $email_id;?>'  />		  
		  </div>
		  
		  <div class="col-md-4 ">Website :  <?php echo $errors[website];?> 
		  <input type="text" class='form-control form-control-sm'   name='website' value='<?php echo $website;?>'  />		  
		  </div>
		  <div class="col-md-4">
		  Advertisement Rank (Optional):  
		  <input type="number" class="form-control" name="displayrank" value="<?php echo $displayrank;?>"  placeholder="Enter Number Only" />
		    <!--<select name="displayrank" class='form-control form-control-sm'>
			<option value="0" <?php if($displayrank == '0') echo ' Selected';?>>0</option>
			<option value="1" <?php if($displayrank == '1') echo ' Selected';?>>1</option>
			</select>-->
		  </div>
		  
		  <div class="col-md-12 ">About College :  <?php echo $errors[aboutcollege];?> 
			<textarea name="aboutcollege"  id='editor'  class='form-control form-control-sm' rows="3"><?php echo $aboutcollege;?></textarea>  
			</div>
		  <div class="col-md-4 	">College Logo : <?php echo $errors[logoImg];?> 
			<input type="file"  name="logoImg"  class="form-control form-control-sm" onchange="logoImgCheck(this)" value="<?php echo $logoImg ;?>" id="logoImg"  accept="image/*">
			<img id="logoThumb" src="images/noimage.jpg" width="100%" height="120px" draggable="false"/>						  
		  </div>
		  <div class="col-md-4 	">College Banner : <?php echo $errors[bannerImg];?> 
			<input type="file"  name="bannerImg"  class="form-control form-control-sm" onchange="bannerImgCheck(this)" value="<?php echo $bannerImg ;?>" id="bannerImg"  accept="image/*">
			<img id="bannerThumb" src="images/noimage.jpg" width="100%" height="120px" draggable="false"/>	  
		  </div>		  
		  <div class="col-md-4 	">College Brochure : <?php echo $errors[brochure];?>
			<input type="file"  name="brochure"  class="form-control form-control-sm" onchange="brocherCheck(this)" value="<?php echo $brochure ;?>" id="brochure"  accept="application/pdf">
			<img id="brochureThumb" src="images/noimage.jpg" width="100%" height="120px" draggable="false"/>	  
		  </div>
		<div class="col-md-12">
					<br>
					<div id="containerss">
						<fieldset class="mb-1">
						   <div class="form-group form-group-floating row">
							  <div class="col-12">
								 <label class="label-floating">Section Title (Optional)</label>
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
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  <div class="col-md-12 mt-4 text-center"> 			
			<input type="submit" value='Submit' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/>
			<a href='Add-College' class="bold btn btn-sm bg-info px-3 mx-2">Reset </a>
		  </div>		  
		</div>			
	  </form> 
	</div>		 
   </div><br><br><br><br>
   </div>
</div>
  <!-- /.content-wrapper -->
  
  
<script> 

function logoImgCheck()
{	 
	var oFile = document.getElementById("logoImg").files[0]; 

	if (oFile.size > 2048000) // 2 MiB for bytes.
	{
		alert("File size must under 2 MB!");
		document.getElementById("logoImg").value = '';
		logoThumb.src='images/noimage.jpg';		
		return;
	}
	else
	{
		logoThumb.src=URL.createObjectURL(event.target.files[0]);
		document.getElementById("logoImg").innerHTML = "";		
	}
}
function bannerImgCheck()
{	 
	var oFile = document.getElementById("bannerImg").files[0]; 

	if (oFile.size > 2048000) // 2 MiB for bytes.
	{
		alert("File size must under 2 MB!");
		document.getElementById("bannerImg").value = '';
		bannerThumb.src='images/noimage.jpg';		
		return;
	}
	else
	{
		bannerThumb.src=URL.createObjectURL(event.target.files[0]);
		document.getElementById("bannerImg").innerHTML = "";		
	}
}

function brocherCheck()
{	 
	var oFile = document.getElementById("brochure").files[0]; 

	if (oFile.size > 2048000) // 2 MiB for bytes.
	{
		alert("File size must under 2 MB!");
		document.getElementById("brochure").value = '';
		brochureThumb.src='images/noimage.jpg';		
		return;
	}
	else
	{
		brochureThumb.src='images/pdfimg.png';	
		document.getElementById("brochure").innerHTML = "";	
	}
}


ClassicEditor
	.create( document.querySelector( '#editor' ) )

function getState1(f)
{
 var country_id1=f;   
 if(country_id1)
 {
  $.ajax({
	  type: 'post',
	  url: 'getStateData1.php',
	  data: {
	   country_id:country_id1,
	  },
	  success: function (response) {
	   $( '#state1' ).html(response);
	  }
  });
 } 
} 
function getDistrict11(f)
{
 var state_id1=f; 
 if(state_id1)
 {
  $.post({
	  type: 'post',
	  url: 'getDistrictData1.php',
	  data: {
	   state_id1:state_id1,
	  },
	  success: function (response) {
	   $( '#district1' ).html(response);
	  }
  });
 } 
} 

function getState2(f)
{
 var country_id1=f;  
 if(country_id1)
 {
  $.ajax({
	  type: 'post',
	  url: 'getStateData2.php',
	  data: {
	   country_id:country_id1,
	  },
	  success: function (response) {
	   $( '#state2' ).html(response);
	  }
  });
 } 
} 
function getDistrict12(f)
{
 var state_id1=f; 
 if(state_id1)
 {
  $.ajax({
	  type: 'post',
	  url: 'getDistrictData2.php',
	  data: {
	   state_id1:state_id1,
	  },
	  success: function (response) {
	   $( '#district2' ).html(response);
	  }
  });
 } 
} 



/* 	
function checkName(f)
{
	var chechName=f; 	
	if(chechName)
	{
		$.ajax({
			type: 'post',
			url: 'countryNameCheck.php',
			data: {
				chechName:chechName,
				},
			success: function (response) {
				$( '#err' ).html(response);
			}
		});
	} 
} */ 
</script>
	
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
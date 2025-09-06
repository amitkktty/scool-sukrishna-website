<?php 
$page='college'; $innerpage='addcollege';
include_once('Master-Header.php');
$c_id=$_GET['c_id'];
if(empty($c_id ))
{ 
  echo "<script>window.location.href='College-List';</script>";
}
else
{
	$sql="select * from college_data where c_id =$c_id ";
	$sql_qr=mysqli_query($conn, $sql);
	$found_data=mysqli_num_rows($sql_qr);
	if($found_data <> 1)
	 echo "<script>window.location.href='College-List';</script>";
}

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
		$errors[acceptance] = "<span class='text-danger'>Empty!</span>";
	else
	{   $accept='';
		foreach ($_POST['acceptence'] as $anames)
		{
			$accept .= $anames .',';
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
			if ($length > 6)
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
	
	if(empty($errors))
	{
	 
		$college_name = mysqli_real_escape_string($conn, $college_name);
		$known_name = mysqli_real_escape_string($conn, $known_name);
		$short_name = mysqli_real_escape_string($conn, $short_name);
		$polpular_name = mysqli_real_escape_string($conn, $polpular_name);
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
		$q22="select * from college_data where college_seo_url ='$slug' AND c_id !='$c_id'"; 
		$qr22=mysqli_query($conn, $q22) or die($q22.mysqli_error($conn)); 
		$founddata=mysqli_num_rows($qr22);
		if($founddata == 0)
		{
if(!empty($_FILES ['logoImg']['name']))
		{
			if(empty($oldlogo)) 
			$logo_file_name ='Logo-Pic-'. rand().'.'.$LogoFileType; 
			else
			$logo_file_name =$oldlogo;		
			$target_dir1 = "College_Logo/";
			if(is_dir($target_dir1) === false )   	
			{        
			  mkdir($target_dir1);   
			}	 
			$logo_move=$target_dir1 . basename($logo_file_name); 
		}
		else
			$logo_file_name =$oldlogo;	
			
		if(!empty($_FILES ['bannerImg']['name']))
		{
			if(empty($oldlogo)) 
			$banner_file_name ='Banner-Pic-'. rand().'.'.$BannerFileType;
			else
			$banner_file_name =$oldbanner; 
		
			$target_dir2 = "College_Banner/";
			if(is_dir($target_dir2) === false )   	
			{        
			mkdir($target_dir2);   
			}
			$banner_move=$target_dir2 . basename($banner_file_name);	  
		}
		else
			$banner_file_name =$oldbanner; 		

		if(!empty($_FILES ['brochure']['name']))
		{
			if(empty($oldlogo)) 
			$brochure_file_name ='Brochure-Pic-'. rand().'.'.$BrochureFileType;
			else
			$brochure_file_name =$oldbrochure; 
	
			$target_dir3 = "Country_Brochure/";
			if(is_dir($target_dir3) === false )   	
			{        
			mkdir($target_dir3);   
			}	
			$brochure_move=$target_dir3 . basename($brochure_file_name);
		}		
		else
		 $brochure_file_name =$oldbrochure; 	
		 $q = "update college_data set college_name= '$college_name',college_nick_name = '$polpular_name',short_name='$short_name', college_seo_url  = '$slug', college_type = '$college_type', college_estd = '$estd_year', college_ownership = '$ownership_id', college_affiliation = '$affiliat',exam_acceptance='$accept', address1= '$address1',also_known='$also_known',address2='$address2',address3='$address3',mobile2='$mobile2',mobile3='$mobile3', country1 = '101', state1 = '$state_id1', district1 = '$district_id1', pincode1 = '$pincode1', college_contact = '$contact_no', college_email = '$email_id', college_website = '$website', about_college = '$aboutcollege', college_logo = '$logo_file_name', college_banner = '$banner_file_name', college_brochure = '$brochure_file_name', displayrank = '$displayrank' where c_id='$c_id'";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		}
		else
		{
			$employeeid= mysqli_insert_id($conn);
			move_uploaded_file($_FILES ['logoImg']['tmp_name'], $logo_move);
			move_uploaded_file($_FILES ['brochure']['tmp_name'], $brochure_move);
			move_uploaded_file($_FILES ['bannerImg']['tmp_name'], $banner_move);   
			if(empty($logo_file_name))
			$logosrc='images/noimage.jpg';
			else
			$logosrc='College_Logo/'.$logo_file_name;
			if(empty($banner_file_name))
			$bannersrc='images/noimage.jpg';
			else
			$bannersrc='College_Banner/'.$banner_file_name;
			if(empty($brochure_file_name))
			$brochuresrc='images/noimage.jpg';
			else
			$brochuresrc='images/pdfimg.png';
		
		$q2 = "delete from college_data_extra where college_id ='$c_id' ";
		mysqli_query($conn, $q2);
		$mpt=0;
		foreach ($_POST['title'] as $key => $value)
		{
			$title_head=$value;
			$description = $_POST['description'][$key];
			$title_head = mysqli_real_escape_string($conn, $title_head);
			$description = mysqli_real_escape_string($conn, $description);
			$sql6="select * from college_data_extra where college_id='$c_id' AND ex_title='$title_head'  AND ex_details='$description' ";
			$sql_qr6=mysqli_query($conn, $sql6);
			$ttlfound=mysqli_num_rows($sql_qr6);
			
			if($ttlfound == 0)
			{
				$q3 = "insert into college_data_extra values(null,'$c_id','$college_name','$slug','$title_head','$description','$currentdt','','','','')"; 
				if (!mysqli_query($conn, $q3)) 
				{
				$message = "Error description:  " . $q3 . "<br>" . mysqli_error($conn);
				echo $message;
				}
				$mpt = $mpt +1;
				
			}
			else
			{
				if(empty($title_head) AND empty ($description))
				{
				}
				else
				{
					$q3 = "insert into college_data_extra values(null,'$c_id','$college_name','$slug','$title_head','$description','$currentdt','','','','')"; 
					if (!mysqli_query($conn, $q3)) 
					{
					$message = "Error description:  " . $q3 . "<br>" . mysqli_error($conn);
					echo $message;
					}
				}
			} 
		}
	 
			   /* echo "<script>Swal.fire(
				  'Success!',
				  'Your record update successfully!',
				  'success'
				)
				  .then(function() {
				window.location = 'College-List';
				});	  	
				</script>";  */
				
					echo "<script>alert('Your record update successfully!');</script>";
					echo "<form action='Modify-College' method=post name=main></form>
					<script>document.main.submit(); </script>";	
		}	 
		}		
		else
			$errors[college_name] = "<span class='text-danger'>Already Added!</span>"; 
  	}	
}
else
{
	$rr = mysqli_fetch_object($sql_qr);
	$college_name    	= $rr->college_name;
	$also_known      	= $rr->also_known;
	$short_name    	    = $rr->short_name;
	$polpular_name  	= $rr->college_nick_name;    
	$college_type  	= $rr->college_type; 	
	$estd_year  	= $rr->college_estd; 	
	$ownership_id  	= $rr->college_ownership; 	
	$affiliation1  	= $rr->college_affiliation; 
    $affiliation = explode(',',$affiliation1); 
    $acceptance1  	= $rr->exam_acceptance; 
    $acceptance = explode(',',$acceptance1);
	$address1  	= $rr->address1; 	
	$country_id1  	= $rr->country1; 	
	$state_id1  	= $rr->state1; 	
	$district_id1  	= $rr->district1; 	
	$pincode1  	= $rr->pincode1; 	
	$contact_no  	= $rr->college_contact; 	
	$email_id  	= $rr->college_email; 	
	$website  	= $rr->college_website; 	
	$affiliation1  	= $rr->college_affiliation; 	
	$aboutcollege  	= $rr->about_college; 	
	$displayrank  	= $rr->displayrank; 	
	$oldlogo  	= $rr->college_logo; 
	if(empty($oldlogo))
		$logosrc='images/noimage.jpg';
	else
		$logosrc='College_Logo/'.$oldlogo;

	$oldbanner  	= $rr->college_banner;
	if(empty($oldbanner))
		$bannersrc='images/noimage.jpg';
	else
		$bannersrc='College_Banner/'.$oldbanner;
 	
	$oldbrochure  	= $rr->college_brochure; 
	if(empty($oldbrochure))
		$brochuresrc='images/noimage.jpg';
	else
		$brochuresrc='images/pdfimg.png';
} 
$sql5="select * from college_data_extra where college_id='$c_id'";
$sql_qr5=mysqli_query($conn, $sql5);
$cfound=mysqli_num_rows($sql_qr5);	
?>
<div class="content-wrapper">
    <section >
      <div class="container-fluid text-uppercase ">
	   <div class="row bg-white p-2" style='box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;'>
	    <div>
		  <i class="fa fa-database text-danger fa-3x pl-1 pr-3" aria-hidden="true"></i> 
		</div>
	    <div>
		  <h3 class='bold text-danger'> Location Dirctory 
		  <h6 class='text-primary bold mt-n3'>Modify College</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
   <div class="container-fluid px-4 ">
   <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
   
   <div class='container-fluid '>	
	 <div class="row bold">
		<div class="col-6"> <a href="Add-College" class='bg-info px-3 ml-n2 py-1  rounded sd-1'>
			<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
		</div>
		<div class="col-6 text-right"> <a href="College-List" class='bg-info px-3 mr-n2 py-1  rounded sd-1'>
		<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
		</div>
	  </div>
	</div> 
	
	<div>
	  <form action="Modify-College?c_id=<?php echo $c_id;?>" method="POST" enctype="multipart/form-data">
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
		  <div class="col-md-8 ">Popular Name  :  <?php echo $errors[polpular_name];?>
		  <input type="text"  required='' class='form-control form-control-sm'name='polpular_name' value='<?php echo $polpular_name;?>'  />				  
		  </div>
		  <?php
		  $college_type="College";
		  ?>
		  <input type="hidden" class='form-control form-control-sm' name='college_type' value='<?php echo $college_type;?>'  />	
		  
		  
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
			$q10="select * from affiliation_name order by affiliation_name ";
			$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
			while($r10=mysqli_fetch_object($qr10))
			{ 
			$affiliation_id0 =$r10->affiliation_id   ;
			$affiliation_name0=$r10->affiliation_name ; 
				 
				
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
		  
		  <div class="col-md-12  ">Address 1 :<?php echo $errors[address1];?>  
			<div class="row">
				<div class="col-md-12 ">  
				
				<input type="text" required='' class='form-control form-control-sm'   name='address1' value='<?php echo $address1;?>' />  
				</div>
				<div class="col-md-12 ">Address Line 2  :
				    <input type="text" class='form-control form-control-sm'   name='address2' value='<?php echo $address2;?>' />  
				</div>
				<div class="col-md-12 ">Address Line 3  : 
				    <input type="text" class='form-control form-control-sm'   name='address3' value='<?php echo $address3;?>' />  
				</div>
				<!--<div class="col-md-6 ">  
				Country * :<?php echo $errors[country_id1];?>      
				<select  required=''  id='country_id1' name="country_id1" class='form-control form-control-sm' onchange='getState1(this.value);' >
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
				<div class="col-md-4">  
				State * : <?php echo $errors[state_id1];?>   
				<select class='form-control form-control-sm' name='state_id1' id='state1'  required='' onchange='getDistrict11(this.value);'>
				   <option value="">-- Select --</option>
					<?php
										 
						$q10="select * from state_data where country_id ='101' order by statename";
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
				<div class="col-md-4">  
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
				<div class="col-md-4">  
				Pincode * :   <?php echo $errors[pincode1];?>
				<input type="text" class='form-control form-control-sm'  required=''  name='pincode1' value='<?php echo $pincode1;?>'/>	
				</div>				
			</div>			  
		  </div> 
		  
		   
		  <div class="col-md-4">Mobile 1  :  <?php echo $errors[contact_no];?>  
		  <input type="text" class='form-control form-control-sm'   maxlength='10' name='contact_no' value='<?php echo $contact_no;?>'  />	  
		  </div>
		   <div class="col-md-4 ">Mobile 2  :   
		  <input type="text" class='form-control form-control-sm'  maxlength='10' name='mobile2' value='<?php echo $mobile2;?>'  />	  
		  </div>  
		   <div class="col-md-4 ">Mobile 3  :   
		  <input type="text" class='form-control form-control-sm'  maxlength='10' name='mobile3' value='<?php echo $mobile3;?>'  />	  
		  </div> 
		  
		  <div class="col-md-4">Email Id :  <?php echo $errors[email_id];?> 
		  <input type="text" class='form-control form-control-sm'   name='email_id' value='<?php echo $email_id;?>'  />		  
		  </div>
		  
		  <div class="col-md-4">Website :  <?php echo $errors[website];?> 
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
			<textarea name="aboutcollege" class='form-control form-control-sm' rows="3"><?php echo $aboutcollege;?></textarea>  
			</div>
		  <div class="col-md-4">College Logo : <?php echo $errors[logoImg];?> 
			<input type="file"  name="logoImg"  class="form-control form-control-sm" onchange="logoImgCheck(this)" value="<?php echo $logoImg ;?>" id="logoImg"  accept="image/*">
			<input type="hidden" class='form-control form-control-sm' value='<?php echo $oldlogo;?>' name='oldlogo'/>
			<img id="logoThumb" src="<?php echo $logosrc;?>" width="100%" height="120px" draggable="false"/>						  
		  </div>
		  <div class="col-md-4">College Banner : <?php echo $errors[bannerImg];?> 
			<input type="file"  name="bannerImg"  class="form-control form-control-sm" onchange="bannerImgCheck(this)" value="<?php echo $bannerImg ;?>" id="bannerImg"  accept="image/*"><input type="hidden" class='form-control form-control-sm' value='<?php echo $oldbanner;?>' name='oldbanner'/>
			<img id="bannerThumb" src="<?php echo $bannersrc;?>" width="100%" height="120px" draggable="false"/>	  
		  </div>		  
		  <div class="col-md-4">College Brochure : <?php echo $errors[brochure];?>
			<input type="file"  name="brochure"  class="form-control form-control-sm" onchange="brocherCheck(this)" value="<?php echo $brochure ;?>" id="brochure"  accept="application/pdf"><input type="hidden" class='form-control form-control-sm' value='<?php echo $oldbrochure;?>' name='oldbrochure'/>
			<img id="brochureThumb" src="<?php echo $brochuresrc;?>" width="100%" height="120px" draggable="false"/>	  
		  </div>
		  
		  <div class="col-md-12">
					<br>
					<div id="containerss">
				<?php  
				if($cfound > 0)
				{
					$extra_id=1;	
					while($rr5 = mysqli_fetch_object($sql_qr5))
					{
					$title 			= $rr5->ex_title;
					$description 	= $rr5->ex_details;
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
							<div class="position-relative"><textarea class="form-control form-control-outline id_value<?=$extra_id;?>" placeholder="Section Description" name="description[]" id="description<?=$extra_id;?>"><?= $description;?></textarea> </div>
						 </div>
					  </div>
				   </fieldset>
				</div> 
					<?php
					$extra_id++;
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
		  
		  
		  
		  
		  
		  
		  
		  <div class="col-md-12  text-center"> 			
			<input type="submit" value='Update' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/>
			<a href='College-List' class="bold btn btn-sm bg-info px-3 mx-2">Back </a>
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
<?php 
$page='location'; $innerpage='district';
include_once('Master-Header.php');
if (isset($_POST['submit'])) 
{
	$errors = array();

	if (empty($country_id))
		$errors[country_id] = "<span class='text-danger'>Empty!</span>";
	
	if (empty($state_id))
		$errors[state_id] = "<span class='text-danger'>Empty!</span>";
	
	if (empty($district_name))
		$errors[district_name] = "<span class='text-danger'>Empty!</span>";
	else
	{
		$length = strlen($district_name);
		if ($length > 255)
		$errors[district_name] = "<span class='text-danger'>Too Long!</span>";
	} 
	
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
	
	if(!empty($_FILES ['bannerfile']['name']))
	{		
		$target_banner_file = basename ($_FILES ['bannerfile']['name']); 
		$BannerFileType = strtolower(pathinfo($target_banner_file,PATHINFO_EXTENSION));
		if($BannerFileType != "jpg"  &&  $BannerFileType != "png" && $BannerFileType !=  "jpeg" )
		{	
			$errors[bannerfile]="<span class='text-danger'> Only JPEG, PNG </span>"; 
		}
		else
		{
			if ($_FILES ['bannerfile']['size'] > .5*1024*1024) 
			{
				$errors[bannerfile] = "<span class='text-danger'> Max 500 kb!</span>";
			}
		}
	}
	
	if(empty($errors))
	{
		$district_name = mysqli_real_escape_string($conn, $district_name);
		$district_description = mysqli_real_escape_string($conn, $district_description);
		$slug = trim($district_name); 
		$slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug );  
		$slug= str_replace(' ','-', $slug);   
		$slug= strtolower($slug); 
		if(!empty($_FILES ['logofile']['name']))
	  {
		$logo_file_name ='Logo-Pic-'. rand().'.'.$LogoFileType;
		$target_dir1 = "District_Logo/";
		if(is_dir($target_dir1) === false )   	
		{        
		mkdir($target_dir1);   
		}	 
		$logo_move=$target_dir1 . basename($logo_file_name); 
	  }
	  if(!empty($_FILES ['bannerfile']['name']))
	  {
		$banner_file_name ='Banner-Pic-'. rand().'.'.$BannerFileType;
		$target_dir2 = "District_Banner/";
		if(is_dir($target_dir2) === false )   	
		{        
		mkdir($target_dir2);   
		}
		$banner_move=$target_dir2 . basename($banner_file_name);	  
	  }
		
		$q1="select count(*) as totalfound from district_data where country_id='$country_id' AND state_id=$state_id AND district_name='$district_name'"; 
		$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
		$r1=mysqli_fetch_object($qr1);
		$totalfound=$r1->totalfound ; 
		if($totalfound <> 0)
		{
			echo "<script>Swal.fire(  'Error!', 'Trying to Add Duplicate Record','error' )	.then(function() {window.location = 'District-Add';	});	</script>";   
		}
		else
		{	
			$q = "insert into district_data values(null,'$district_name',$state_id,'$country_id','$district_description','$banner_file_name','$currentdt', '$logo_file_name', '', '', '', '','' )";
			if (!mysqli_query($conn, $q)) 
			{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
			}
			else
			{
			    $lastid= mysqli_insert_id($conn);
			move_uploaded_file($_FILES ['logofile']['tmp_name'], $logo_move);
		
			move_uploaded_file($_FILES ['bannerfile']['tmp_name'], $banner_move);
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
						$q3 = "insert into district_detail values(null,'$lastid','$slug','$title_head','$description','$currentdt','$slug','','','')";
						mysqli_query($conn, $q3);
					}
				}
		
			echo "<script>Swal.fire(  'Success!', 'Your record saved successfully!','success' )	.then(function() {window.location = 'District-Add';	});	</script>";   
			}
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
		  <h3 class='bold text-danger'> Location Dirctory 
		  <h6 class='text-primary bold mt-n3'>District</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-10 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
		
			<div class='container-fluid '>
			 <div class="row bold">
				<div class="col-6"> <a href="District-Add" class='bg-info px-3 ml-n2 py-1  rounded sd-1'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
				</div>
				<div class="col-6 text-right"> <a href="District" class='bg-info px-3 mr-n2 py-1  rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
				</div>
			  </div>
			</div> 
			
			<div>
			<form action="District-Add" method="POST" enctype="multipart/form-data">
				<div class="row bold">
				  <div class="col-md-6 my-2	">Country Name* :  
				   <?php echo $errors[country_id];?>
				   <select required='' id='country_id' name="country_id" class='form-control form-control-sm' onchange='getState(this.value);' >
				    <option value="">-- Select --</option>
					<?php
					$q10="select * from country_data order by name ";
					$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
					while($r10=mysqli_fetch_object($qr10))
					{ 
					$country_id1=$r10->country_id ;
					$district_name=$r10->name ;
					echo '<option value="'.$country_id1.'">'.$district_name.'</option>';
					}
					?>

				   </select>			  
				  </div> 
				  <div class="col-md-6 my-2	">State Name* :  
				   <?php echo $errors[state_id];?>
				   <span id="state_id">
				   <select class='form-control form-control-sm' name='state_id' id='state1'  required=''>
				   <option value="">-- Select --</option>
					</select></span> 					
				  </div> 
				  
				  <div class="col-md-4 my-2">District Name :  
				   <span id='err'><?php echo $errors[district_name];?></span>
				  <input required=''  type="text" class='form-control form-control-sm' name='district_name' onkeyup='checkName(this.form)' />				  
				  </div>
				  <div class="col-md-4 my-2">Logo :  
				   
				  <input type="file" class='form-control form-control-sm' name='logofile' onkeyup='checkName(this.form)' />				  
				  </div>
				  <div class="col-md-4 my-2">Banner (Map):  
				   
				  <input type="file" class='form-control form-control-sm' name='bannerfile' onkeyup='checkName(this.form)' />				  
				  </div>
				  
				  <div class="col-md-12 my-2">About District* :  
				  <textarea name="district_description" id="district_description" class='form-control form-control-sm' rows="5"><?php echo $district_description;?></textarea>			  
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
				  <div class="col-md-12 my-2 text-center"> 
					
					<input type="submit" value='Submit' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/>
					<a href='District-Add' class="bold btn btn-sm bg-info px-3 mx-2">Reset </a>
				  </div>
				</div>			
			</form>			
			</div>		 
		</div>
      </div>	  
    </section> 
  </div> 
  
  <?php include_once('Master-Footer.php');?>
<script>

function checkName(f)
{
 var country_id= f.country_id.value;
 var state_id= f.state_id.value;
 var districtName= f.district_name.value; 
 if((districtName) && (country_id) && (state_id))
 { 
  $.ajax({
  type: 'post',
  url: 'districtNameCheck.php',
  data: {
   country:country_id, 
   state_id:state_id, 
   districtName:districtName, 
  },
  success: function (response) {
   $( '#err' ).html(response);
  }
  });
 }  
}

 
function getState(f)
{
 var country_id=f; 	
 if(country_id)
 {
  $.ajax({
	  type: 'post',
	  url: 'getStateData.php',
	  data: {
	   country_id:country_id,
	  },
	  success: function (response) {
	   $( '#state1' ).html(response);
	  }
  });
 } 
}   

</script>

<script type="text/javascript">
$(document).ready(function()
{
 CKEDITOR.replace('district_description',{ height  : '150px' });
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

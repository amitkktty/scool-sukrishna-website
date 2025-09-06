<?php 
$page='location'; $innerpage='country';
include_once('Master-Header.php');
if (isset($_POST['submit'])) 
{
	$errors = array();

	if (empty($country_name))
		$errors[country_name] = "<span class='text-danger'>Empty!</span>";
	else
	{
		$length = strlen($country_name);
		if ($length > 255)
		$errors[country_name] = "<span class='text-danger'>Too Long!</span>";
		else
		{
			$q1="select count(*) as totalfound from country_data where name='$country_name'"; 
			$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
			$r1=mysqli_fetch_object($qr1);
			$totalfound=$r1->totalfound ; 
			if($totalfound <> 0)
			{
				$errors[country_name] = "<span class='text-danger' id='err'>Already Added</span>";   
			}
		}	    
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
	
	if(!empty($_FILES ['mapfile']['name']))
	{		
		$target_map_file = basename ($_FILES ['mapfile']['name']); 
		$MapFileType = strtolower(pathinfo($target_map_file,PATHINFO_EXTENSION));
		if($MapFileType != "jpg"  &&  $MapFileType != "png" && $MapFileType !=  "jpeg" )
		{	
			$errors[mapfile]="<span class='text-danger'> Only JPEG, PNG </span>"; 
		}
		else
		{
			if ($_FILES ['mapfile']['size'] > .5*1024*1024) 
			{
				$errors[mapfile] = "<span class='text-danger'> Max 500 kb!</span>";
			}
		}
	}
	if(!empty($_FILES ['flagefile']['name']))
	{		
		$target_flage_file = basename ($_FILES ['flagefile']['name']); 
		$FlageFileType = strtolower(pathinfo($target_flage_file,PATHINFO_EXTENSION));
		if($FlageFileType != "jpg"  &&  $FlageFileType != "png" && $FlageFileType !=  "jpeg" )
		{	
			$errors[mapfile]="<span class='text-danger'> Only JPEG, PNG </span>"; 
		}
		else
		{
			if ($_FILES ['mapfile']['size'] > .5*1024*1024) 
			{
				$errors[mapfile] = "<span class='text-danger'> Max 500 kb!</span>";
			}
		}
	}
	if (empty($country_description))
		$errors[country_description] = "<span class='text-danger'>Empty!</span>";
	
	
	
	if(empty($errors))
	{
	  $country_name = mysqli_real_escape_string($conn, $country_name);
	  
	  $short_name=substr($country_name, 0, 3);
	  
	  $country_description = mysqli_real_escape_string($conn, $country_description);
	  if(!empty($_FILES ['logofile']['name']))
	  {
		$logo_file_name ='Logo-Pic-'. rand().'.'.$LogoFileType;
		$target_dir1 = "Country_Logo/";
		if(is_dir($target_dir1) === false )   	
		{        
		mkdir($target_dir1);   
		}	 
		$logo_move=$target_dir1 . basename($logo_file_name); 
	  }
	  if(!empty($_FILES ['bannerfile']['name']))
	  {
		$banner_file_name ='Banner-Pic-'. rand().'.'.$BannerFileType;
		$target_dir2 = "Country_Banner/";
		if(is_dir($target_dir2) === false )   	
		{        
		mkdir($target_dir2);   
		}
		$banner_move=$target_dir2 . basename($banner_file_name);	  
	  }
	  
	  if(!empty($_FILES ['mapfile']['name']))
	  {
		$map_file_name ='Map-Pic-'. rand().'.'.$MapFileType;
		$target_dir3 = "Country_Map/";
		if(is_dir($target_dir3) === false )   	
		{        
		mkdir($target_dir3);   
		}
		$map_move=$target_dir3 . basename($map_file_name);	  
	  }
	  
	  if(!empty($_FILES ['flagefile']['name']))
	  {
		$flage_file_name ='Flage-Pic-'. rand().'.'.$FlageFileType;
		$target_dir4 = "Country_Flage/";
		if(is_dir($target_dir4) === false )   	
		{        
		mkdir($target_dir4);   
		}	
		$flag_move=$target_dir4 . basename($flage_file_name);
	  }
	   $country_name = mysqli_real_escape_string($conn, $country_name);
		$q = "insert into country_data values(null,'$short_name','$country_name','$country_code','$logo_file_name','$banner_file_name','$country_description','$map_file_name','$flage_file_name','$currentdt','','','','')";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		}
		else
		{
			$employeeid= mysqli_insert_id($conn);
			move_uploaded_file($_FILES ['logofile']['tmp_name'], $logo_move);
			move_uploaded_file($_FILES ['mapfile']['tmp_name'], $map_move);
			move_uploaded_file($_FILES ['bannerfile']['tmp_name'], $banner_move);  
			move_uploaded_file($_FILES ['flagefile']['tmp_name'], $flag_move);  
			
		 	echo "<script>Swal.fire(
				  'Success!',
				  'Your record saved successfully!',
				  'success'
				)
				.then(function() {
				window.location = 'Country-Add';
				});			
				</script>";  
			/* echo "<form action='Country-Add' method=post name=main></form>
			<script>document.main.submit(); </script>";			 */ 
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
		  <h6 class='text-primary bold mt-n3'>Country</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
		
			<div class='container-fluid '>
			 <div class="row bold">
				<div class="col-6"> <a href="Country-Add" class='bg-info px-3 ml-n2 py-1  rounded sd-1'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
				</div>
				<div class="col-6 text-right"> <a href="Country" class='bg-info px-3 mr-n2 py-1  rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
				</div>
			  </div>
			</div> 
			
			<div>
			<form action="Country-Add" method="POST" enctype="multipart/form-data">
				<div class="row bold">
				  <div class="col-md-8 my-2	">Country Name* :  
				   <span id='err'><?php echo $errors[country_name];?></span>
				  <input type="text" class='form-control form-control-sm' value='<?php echo $country_name;?>'  name='country_name' onkeyup='checkName(this.value)'/>				  
				  </div>
				  
				  <div class="col-md-4 my-2	">Country Code :  
				   <?php echo $errors[country_code];?>
				  <input type="number" min='0' max='99999' class='form-control form-control-sm' value='<?php echo $country_code;?>' name='country_code'/>				  
				  </div>
				  
				  <div class="col-md-6 my-2	">Country Logo :
					<?php echo $errors[logofile];?>			  
				  <input type="file" class='form-control form-control-sm' name='logofile'/>				  
				  </div>
				  <div class="col-md-6 my-2	">Country Banner : <?php echo $errors[bannerfile];?>	
				  <input type="file" class='form-control form-control-sm' name='bannerfile'/>				  
				  </div>
				  <div class="col-md-6 my-2	">Country Map : <?php echo $errors[mapfile];?> 
				  <input type="file" class='form-control form-control-sm' name='mapfile'/>				  
				  </div>
				  <div class="col-md-6 my-2	">Country Flag : <?php echo $errors[flagefile];?> 
				  <input type="file" class='form-control form-control-sm' name='flagefile'/>				  
				  </div>
				  <div class="col-md-12 my-2">Description* :  <?php echo $errors[country_description];?> 
				  <textarea name="country_description" id="editor"   class='form-control form-control-sm' rows="5"><?php echo $country_description;?></textarea>			  
				  </div>
				  <div class="col-md-12 my-2 text-center"> 
					
					<input type="submit" value='Submit' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/>
					<a href='Country-Add'  class="bold btn btn-sm bg-info px-3 mx-2">Reset </a>
				  </div>
				</div>			
			</form>			
			</div>	 
		</div><br><br><br>	
      </div>	  
    </section> 
  </div>
 <?php include_once('Master-Footer.php');?> 
<script>
    $(document).ready(function()
{  
 CKEDITOR.replace('country_description',{ height  : '150px' });
 
}); 
function checkName(f)
{
 var checkName=f; 	
 if(checkName)
 {
  $.ajax({
  type: 'post',
  url: 'countryNameCheck.php',
  data: {
   checkName:checkName,
  },
  success: function (response) {
   $( '#err' ).html(response);
  }
  });
 } 
}
</script>

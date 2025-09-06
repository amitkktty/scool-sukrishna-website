<?php 
$page='location'; $innerpage='country';
include_once('Master-Header.php');
$country_id=$_GET['id'];
if(empty($country_id))
{ 
  echo "<script>window.location.href='Country';</script>";
}
else
{
	$sql="select * from country_data where country_id=$country_id";
	$sql_qr=mysqli_query($conn, $sql);
	$found_data=mysqli_num_rows($sql_qr);
	if($found_data <> 1)
	 echo "<script>window.location.href='Country';</script>";
}

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
			$q1="select count(*) as totalfound from country_data where name='$country_name' AND country_id != $country_id"; 
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
	
	
	
	
	if(empty($errors))
	{
	  $country_name = mysqli_real_escape_string($conn, $country_name);
	  
	  $short_name=substr($country_name, 0, 3);
	  
	  $country_description = mysqli_real_escape_string($conn, $country_description);
	  if(!empty($_FILES ['logofile']['name']))
	  {
		if(empty($oldlogofile)) 
			$logo_file_name ='Logo-Pic-'. rand().'.'.$LogoFileType;	 
		else
			$logo_file_name =$oldlogofile;
	
		$target_dir1 = "Country_Logo/";
		if(is_dir($target_dir1) === false )   	
		{        
			mkdir($target_dir1);   
		}	 
		$logo_move=$target_dir1.basename($logo_file_name);
	  }
	  else
			$logo_file_name =$oldlogofile;
		  
	  if(!empty($_FILES ['bannerfile']['name']))
	  {
		if(empty($oldbannerfile)) 
			$banner_file_name ='Banner-Pic-'. rand().'.'.$BannerFileType; 
		else 
			$banner_file_name =$oldbannerfile;
		
		$target_dir2 = "Country_Banner/";
		if(is_dir($target_dir2) === false )   	
		{        
			mkdir($target_dir2);   
		}
		$banner_move=$target_dir2 . basename($banner_file_name);		
	  }
	  else 
		$banner_file_name =$oldbannerfile;
	  
	  if(!empty($_FILES ['mapfile']['name']))
	  {
		if(empty($oldbannerfile))
			$map_file_name ='Map-Pic-'. rand().'.'.$MapFileType;
		else
			$map_file_name =$oldmapfile;
		$target_dir3 = "Country_Map/";
		if(is_dir($target_dir3) === false )   	
		{        
			mkdir($target_dir3);   
		}
		$map_move=$target_dir3 . basename($map_file_name);
	  }
	  else
		$map_file_name =$oldmapfile;
	  
	  if(!empty($_FILES ['flagefile']['name']))
	  {
		if(empty($oldflagefile))
			$flage_file_name ='Flage-Pic-'. rand().'.'.$FlageFileType; 
		else 
			$flage_file_name =$oldflagefile;
		$target_dir4 = "Country_Flage/";
		if(is_dir($target_dir4) === false )   	
		{        
			mkdir($target_dir4);   
		}	
		$flag_move=$target_dir4 . basename($flage_file_name);
	  }
	  else 
		$flage_file_name =$oldflagefile;
	  
		$q = "update country_data set sortname = '$short_name', name = '$country_name', phonecode = '$country_code', country_logo = '$logo_file_name', country_banner = '$banner_file_name', country_description = '$country_description', country_map = '$map_file_name', country_flag = '$flage_file_name' where country_id=$country_id";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		}
		else
		{
			move_uploaded_file($_FILES ['logofile']['tmp_name'], $logo_move);
			move_uploaded_file($_FILES ['mapfile']['tmp_name'], $map_move);
			move_uploaded_file($_FILES ['bannerfile']['tmp_name'], $banner_move);  
			move_uploaded_file($_FILES ['flagefile']['tmp_name'], $flag_move);  
			 
				 
		 	 echo "<script>Swal.fire(
				  'Success!',
				  'Your record update successfully!',
				  'success'
				)
				.then(function() {
				window.location = 'Country';
				});			
				</script>";   
		}		
	}	
}
else{
	$rr = mysqli_fetch_object($sql_qr);
	$country_name  	= $rr->name;
	$country_code  	= $rr->phonecode;
	$oldlogofile  		= $rr->country_logo;
	$oldbannerfile  	= $rr->country_banner;
	$oldmapfile  		= $rr->country_map;
	$oldflagefile  	= $rr->country_flag;
	$country_description  = $rr->country_description;
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
				<div class="col-6"> <a href="Country-Add" class='bg-info px-3 py-1 ml-n2 rounded sd-1 '>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
				</div>
				<div class="col-6 text-right"> <a href="Country" class='bg-info px-3 mr-n2 py-1  rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
				</div>
			  </div>
			</div> 
			
			<div>
			<form action="Country-Modify?id=<?php echo $country_id;?>" method="POST" enctype="multipart/form-data">
				<div class="row bold">
				  <div class="col-md-8 my-2	">Country Name* :  
				   <?php echo $errors[country_name];?>
				  <input type="text" class='form-control form-control-sm' name='country_name' value='<?php echo $country_name;?>' required='' />				  
				  </div>
				  
				  <div class="col-md-4 my-2	">Country Code :  
				   <?php echo $errors[country_code];?>
				  <input type="number" min='0' max='99999' class='form-control form-control-sm' name='country_code' value='<?php echo $country_code;?>'/>				  
				  </div>
				  
				  <div class="col-md-6 my-2	">Country Logo :
					<?php echo $errors[logofile];?>			  
				    <input type="file" class='form-control form-control-sm' name='logofile'/>		  
				    <input type="hidden" class='form-control form-control-sm' value='<?php echo $oldlogofile;?>' readonly name='oldlogofile'/>				  
				  </div>
				  <div class="col-md-6 my-2	">Country Banner : <?php echo $errors[bannerfile];?>	
				  <input type="file" class='form-control form-control-sm' name='bannerfile'/>		  
				    <input type="hidden" class='form-control form-control-sm' value='<?php echo $oldbannerfile;?>' name='oldbannerfile'/>				  
				  </div>
				  <div class="col-md-6 my-2	">Country Map : <?php echo $errors[mapfile];?> 
				  <input type="file" class='form-control form-control-sm' name='mapfile'/>		  
				    <input type="hidden" class='form-control form-control-sm' value='<?php echo $oldmapfile;?>' readonly name='oldmapfile'/>				  
				  </div>
				  <div class="col-md-6 my-2	">Country Flag : <?php echo $errors[flagefile];?> 
				  <input type="file" class='form-control form-control-sm' name='flagefile'/>		  
				    <input type="hidden" class='form-control form-control-sm' value='<?php echo $oldflagefile;?>' name='oldflagefile'/>				  
				  </div>
				  <div class="col-md-12 my-2">Description* :  <?php echo $errors[country_description];?> 
				  <textarea name="country_description" id="editor" class='form-control form-control-sm' rows="8"><?php echo $country_description;?></textarea>			  
				  </div>
				  <div class="col-md-12 my-2 text-center"> 
					
					<input type="submit" value='Update' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/>
					<a href='Country' class="bold btn btn-sm bg-info px-3 mx-2"> Back </a>
				  </div>
				  
				  
				</div>			
			</form>
			
			
			</div>		 
		</div>
      </div><br><br><br>	  
    </section> 
  </div>  
  <?php include_once('Master-Footer.php');?>
<script>
   $(document).ready(function()
{  
 CKEDITOR.replace('country_description',{ height  : '150px' });
 
}); 
</script>

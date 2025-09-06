<?php 
$page='location'; $innerpage='district';
include_once('Master-Header.php');
$district_id=$_GET['id'];
if(empty($district_id))
{ 
  echo "<script>window.location.href='District';</script>";
}
else
{
	$sql="select * from district_data where district_id=$district_id";
	$sql_qr=mysqli_query($conn, $sql);
	echo $num= mysqli_num_rows($sql_qr);
	$res=mysqli_fetch_object($sql_qr);
	$rr = mysqli_fetch_object($sql_qr);
	$country_id  	= $rr->country_id;
	$state_id  		= $rr->state_id;
	$district_name  	= $res->district_name;  
	$oldlogo = $res->logo;
	$oldbanner = $res->dist_map;
	$found_data=mysqli_num_rows($sql_qr);
		$sql1="select * from district_detail where dist_id='$district_id'";
	$sql_qr1=mysqli_query($conn, $sql1);
	$distfound=mysqli_num_rows($sql_qr1);
	if($found_data <> 1)
	 echo "<script>window.location.href='District';</script>";
}

if (isset($_POST['submit'])) 
{
	$errors = array();

	if (empty($country_id))
		$errors[country_id] = "<span class='text-danger'>Empty!</span>";
	
	if (empty($state_id))
		$errors[state_id] = "<span class='text-danger'>Empty!</span>";
	
	if (empty($district_name))
		$errors[district_name] = "<span class='text-danger' id='err'>Empty!</span>";
	else
	{
		$length = strlen($district_name);
		if ($length > 255)
		$errors[district_name] = "<span class='text-danger' id='err'>Too Long!</span>";
		else{
		    $district_name = mysqli_real_escape_string($conn, $district_name);
			$q1="select count(*) as totalfound from district_data where country_id='$country_id' AND state_id=$state_id AND district_name='$district_name' AND district_id !=$district_id"; 
			$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
			$r1=mysqli_fetch_object($qr1);
			$totalfound=$r1->totalfound ; 
			if($totalfound <> 0)
			{
				$errors[district_name] = "<span class='text-danger' id='err'>Duplicate Record</span>";  
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
					if(empty($oldlogo)) 
					$logo_file_name ='Logo-Pic-'. rand().'.'.$LogoFileType;
					else
					$logo_file_name =$oldlogo;
					
					$target_dir1 = "District_Logo/";
					if(is_dir($target_dir1) === false )   	
					{        
					mkdir($target_dir1);   
					}	 
					$logo_move=$target_dir1 . basename($logo_file_name); 
				}
				else
					$logo_file_name =$oldlogo;
				
				if(!empty($_FILES ['bannerfile']['name']))
				{
					if(empty($oldbanner)) 			
					$banner_file_name ='Banner-Pic-'. rand().'.'.$BannerFileType;
					else
					$banner_file_name =$oldbanner; 
					$target_dir3 = "District_Banner/";
					if(is_dir($target_dir3) === false )   	
					{        
					mkdir($target_dir3);   
					}	
					$banner_move=$target_dir3 . basename($banner_file_name);
				}
				else
					$banner_file_name =$oldbanner;
		 $q = "update district_data set district_name = '$district_name',state_id = $state_id, country_id = '$country_id',dist_map='$banner_file_name',logo='$logo_file_name',dist_description='$district_description' where district_id = $district_id";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		}
		else
		{
		    	    move_uploaded_file($_FILES ['logofile']['tmp_name'], $logo_move); 
					move_uploaded_file($_FILES ['bannerfile']['tmp_name'], $banner_move);
					
					$q2 = "delete from district_detail where dist_id ='$district_id' ";
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
						$q13 = "insert into district_detail values(null,'$district_id','$slug','$title_head','$description','$currentdt','$slug','','','')";
						mysqli_query($conn, $q13);
					}
				}
		 	echo "<script>Swal.fire(  'Success!', 'Your record update successfully!','success' )	.then(function() {window.location = 'District';	});	</script>";   
		}  
		
	} 
} 
else
{
	
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
				<div class="col-6"> <a href="District-Add" class='bg-info px-3 py-1 ml-n2 rounded sd-1'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
				</div>
				<div class="col-6 text-right"> <a href="District" class='bg-info px-3 mr-n2 py-1 rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
				</div>
			  </div>
			</div> 
			
			<div>
			<form action="District-Modify?id=<?php echo $district_id;?>" method="POST" enctype="multipart/form-data">
				<div class="row bold">
				  <div class="col-md-6 my-2	">Country Name* :  
				   <?php echo $errors[country_id];?>
				   <select required='' name="country_id" class='form-control form-control-sm' onchange='getState(this.value);' >
				    
					<?php
					$q10="select * from country_data order by name ";
					$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
					while($r10=mysqli_fetch_object($qr10))
					{ 
					$country_id1=$r10->country_id ;
					$country_name=$r10->name ;
					?>
					<option value=<?php echo $country_id1;?> <?php if($country_id1 == $country_id )echo ' selected';?>> <?php echo $country_name;?></option>
					<?php		
					}
					?>
					</select>			  
				  </div> 
				  <div class="col-md-6 my-2	">State Name* :  
				   <?php echo $errors[state_id];?> 				   
					<select required='' name="state_id" id='state' class='form-control form-control-sm' onchange='stateNameSet(this.value)'>
					
					<?php
					$q10="select * from state_data where country_id ='$country_id' order by statename";
					$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
					while($r10=mysqli_fetch_object($qr10))
					{ 
						$state_id1=$r10->state_id ;
						$state_name=$r10->statename ;
					?>
					<option value=<?php echo $state_id1;?> <?php if($state_id == $state_id1 )echo ' selected';?>> <?php echo $state_name;?></option>
					<?php		
					}
					?>
				</select> 				
				  </div> 
				  
				  <div class="col-md-4 my-2">District Name :  
				   <?php echo $errors[district_name];?>
				  <input  required=''  type="text" class='form-control form-control-sm' value='<?php echo $district_name;?>' onkeyup='checkName(this.form)' name='district_name'/>				  
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
				<?php  
				if($distfound > 0)
				{
					$id=1;	
					while($rr1 = mysqli_fetch_object($sql_qr1))
					{
					$title 			= $rr1->dist_tilte;
					$description 	= $rr1->dist_details;
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
					<a href='District' class="bold btn btn-sm bg-info px-3 mx-2">Back </a>
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
$('#err').html(''); 	
 var country_id= f.country_id.value;
 var state_id= f.state_id.value;
 var districtName= f.district_name.value; 
 
 if(districtName)
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
	   $( '#state' ).html(response);
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

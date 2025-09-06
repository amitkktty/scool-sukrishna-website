<?php 
$page='location'; $innerpage='state';
include_once('Master-Header.php');
if (isset($_POST['submit'])) 
{
	$errors = array();

	if (empty($country_id))
		$errors[country_id] = "<span class='text-danger'>Empty!</span>";
	if (empty($state_name))
		$errors[state_name] = "<span class='text-danger'>Empty!</span>";
	else
	{
		$length = strlen($state_name);
		if ($length > 255)
		$errors[state_name] = "<span class='text-danger'>Too Long!</span>"; 
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
	/* if (empty($aboutcountry))
		$errors[aboutcountry] = "<span class='text-danger'>Empty!</span>";
	 */	
	if(empty($errors))
	{
	 $state_name = mysqli_real_escape_string($conn, $state_name); 
	 $aboutcountry = mysqli_real_escape_string($conn, $aboutcountry);
	 $q1="select count(*) as totalfound from state_data where country_id='$country_id' AND statename='$state_name'"; 
	 $qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
	 $r1=mysqli_fetch_object($qr1);
	 $totalfound=$r1->totalfound ; 
	 if($totalfound <> 0)
	  $errors[state_name] = "<span class='text-danger' id='err'>Already Added</span>"; 
	 else
	 {
		if(!empty($_FILES ['logofile']['name']))
		{
			$logo_file_name ='Logo-Pic-'. rand().'.'.$LogoFileType;
			$target_dir1 = "State_Logo/";
			if(is_dir($target_dir1) === false )   	
			{        
			mkdir($target_dir1);   
			}	 
			$logo_move=$target_dir1 . basename($logo_file_name); 
		}
		if(!empty($_FILES ['mapfile']['name']))
		{
			$map_file_name ='Map-Pic-'. rand().'.'.$MapFileType;
			$target_dir3 = "State_Map/";
			if(is_dir($target_dir3) === false )   	
			{        
			mkdir($target_dir3);   
			}
			$map_move=$target_dir3 . basename($map_file_name);	  
		}

		$q = "insert into state_data values(null,'$country_id','$state_name','$logo_file_name','$map_file_name','$aboutcountry','$currentdt','','','','','','')";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		}
		else
		{
			//$employeeid= mysqli_insert_id($conn);
			move_uploaded_file($_FILES ['logofile']['tmp_name'], $logo_move);
			move_uploaded_file($_FILES ['mapfile']['tmp_name'], $map_move);
	    
		$q2 = "delete from state_data_extra where state_name ='$state_name' AND country_id ='$country_id'";
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
				$q3 = "insert into state_data_extra values(null,'$country_id','$state_name','$title_head','$description','$currentdt','','','','')";
				mysqli_query($conn, $q3);
			}
		}			
			/* echo "<script>Swal.fire(
				  'Success!',
				  'Your record saved successfully!',
				  'success'
				)
				.then(function() {
				window.location = 'State-Add';
				});			
				</script>";   */
				
				echo "<script>alert('Your record saved successfully!');</script>";
				echo "<form action='State-Add' method=post name=main></form>
				<script>document.main.submit(); </script>";
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
		  <h6 class='text-primary bold mt-n3'>State</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
		
			<div class='container-fluid '>
			 <div class="row bold">
				<div class="col-6"> <a href="State-Add" class='bg-info px-3 ml-n2 py-1 rounded sd-1'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
				</div>
				<div class="col-6 text-right"> <a href="State" class='bg-info px-3 mr-n2 py-1  rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
				</div>
			  </div>
			</div> 
			
			<div>
			<form action="State-Add" method="POST" enctype="multipart/form-data">
				<div class="row bold">
				  <div class="col-md-6 my-2	">Country Name* :  
				   <?php echo $errors[country_id];?>
				   <select required id='country_id' name="country_id" class='form-control form-control-sm' >
				    <option value="">-- Select --</option>
					<?php
					$q10="select * from country_data order by name ";
					$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
					while($r10=mysqli_fetch_object($qr10))
					{ 
					$country_id1=$r10->country_id ;
					$country_name=$r10->name ;
					?>
					<option value="<?php echo $country_id1;?>" <?php if($country_id == $country_id1) echo ' selected';?>><?php echo $country_name;?></option>
					<?php 
					}
					?>
				   </select>			  
				  </div> 
				  <div class="col-md-6 my-2	">State Name* :  
				   <span id='err'><?php echo $errors[state_name];?></span>
				  <input required type="text" class='form-control form-control-sm' onkeyup='checkName(this.form)'   name='state_name' value='<?php echo $state_name;?>'/>				  
				  </div> 
				  
				  <div class="col-md-6 my-2	">State Logo :
					<?php echo $errors[logofile];?>			  
				  <input type="file" class='form-control form-control-sm' name='logofile'/>			  
				  </div>
				  <div class="col-md-6 my-2	">State Map : <?php echo $errors[mapfile];?> 
				  <input type="file" class='form-control form-control-sm' name='mapfile'/>			  
				  </div>
				   <div class="col-md-12 my-2">About State* :  <?php echo $errors[aboutcountry];?>			  
				  <textarea name="aboutcountry" id="editor" style='resize:none;' class='form-control form-control-sm' rows="5"><?php echo $aboutcountry;?></textarea>		  
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
					<a href='State-Add' class="bold btn btn-sm bg-info px-3 mx-2">Reset </a>
				  </div>				  
				</div>			
			</form>
			
			
			</div>		 
		</div><br><br><br><br>
      </div>	  
    </section> 
  </div>  
<script>
function checkName(f)
{
 var country_id= f.country_id.value;
 var stateName= f.state_name.value; 
 if(country_id=='')
	 alert("Please select country....");
 else if(stateName)
 { 
  $.ajax({
  type: 'post',
  url: 'stateNameCheck.php',
  data: {
   country:country_id, 
   stateName:stateName, 
  },
  
  success: function (response) {
   $( '#err' ).html(response);
	}
  });
 }  
}  
</script>
<?php include_once('Master-Footer.php');?> 
<script type="text/javascript">
$(document).ready(function()
{
 CKEDITOR.replace('aboutcountry',{ height  : '150px' });
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



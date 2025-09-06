<?php 
$page='adv'; $innerpage='newadv';
include_once('Master-Header.php');

if (isset($_POST['submit'])) 
{
	$errors = array();
	if (empty($adv_title))
		$errors[adv_title] = "<span class='text-danger' id='titleerr'>Empty!</span>";
	else
	{ 
	  $length = strlen($adv_title);
	  if ($length > 500)
	  $errors[adv_title] = "<span class='text-danger' id='titleerr'>Too Long!</span>";	
	}
	if (empty($post_page))
		$errors[post_page] = "<span class='text-danger' id='apperr'>Empty!</span>";
	 if (empty($post_section))
		$errors[post_section] = "<span class='text-danger' id='apperr'>Empty!</span>";
	 
	if(!empty($_FILES ['advImg']['name']))
	{		
		$target_logo_file = basename ($_FILES ['advImg']['name']); 
		$LogoFileType = strtolower(pathinfo($target_logo_file,PATHINFO_EXTENSION));
		if($LogoFileType != "jpg"  &&  $LogoFileType != "png" && $LogoFileType !=  "jpeg" )
		{	
			$errors[advImg]="<span class='text-danger' id='logo_err'> Only JPEG, PNG </span>"; 
		}
		else
		{
			if ($_FILES ['advImg']['size'] > .5*1024*1024) 
			{
				$errors[advImg] = "<span class='text-danger' id='logo_err'> Max 500 kb!</span>";
			}
		}
	}
	else
	$errors[advImg] = "<span class='text-danger' id='logo_err'> Empty !</span>";		
	
	 
	if(empty($errors))
	{	 
		$adv_title = ucwords(mysqli_real_escape_string($conn, $adv_title)); 
		if(!empty($_FILES ['advImg']['name']))
		{
			$logo_file_name ='Logo-'. rand().'.'.$LogoFileType;
			$target_dir1 = "Adv_Img/";
			if(is_dir($target_dir1) === false )   	
			{        
			mkdir($target_dir1);   
			}	 
			$logo_move=$target_dir1 . basename($logo_file_name); 
		}
		
		$q = "insert into adv_data values(null,'$adv_title','$currentdt','$currentdt','Active','$post_page','$post_section','$logo_file_name','','','','')";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		}
		else
		{	 
			move_uploaded_file($_FILES ['advImg']['tmp_name'], $logo_move);  

			echo "<script>Swal.fire(
				  'Success!',
				  'Your record saved successfully!',
				  'success'
				)
				.then(function() {
				window.location = 'Add-Adv';
				});			
				</script>";   		  
		} 	  
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
	  <h3 class='bold text-danger'> Adv. Master  
	  <h6 class='text-primary bold mt-n3'>Add New Adv.</h6></h3>
	</div>	   
   </div><br>		
  </div>
	  
 <div class="container-fluid px-4 ">
   <div class="col-md-8 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>

	<div class='container-fluid '>	
	 <div class="row bold">
		<div class="col-6"> <a href="Add-Adv" class='bg-info px-3 ml-n2 py-1  rounded sd-1'>
			<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
		</div> 
		<div class="col-6 text-right"> <a href="Adv-List" class='bg-info px-3 mr-n2 py-1  rounded sd-1'>
			<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
		</div>
	  </div>
	</div> 
	
	<div>
	  <form action="Add-Adv" method="POST" enctype="multipart/form-data">
		<div class="row bold">		  
		  <div class="col-md-12 my-2">
		  Adv Title :  <?php echo $errors[adv_title];?> 
		    <input type="text" class='form-control form-control-sm' name="adv_title" value="<?php echo $adv_title;?>" />
		  </div>
		  
		  <div class="col-md-3 my-2">
		    Adv. Location :  <?php echo $errors[post_page];?> 
		    <select name="post_page" class='form-control form-control-sm'>
		    	<option value="">-- Select -- </option>
		    	<option value="Home" <?php if($post_page == 'Home') echo ' selected';?>>Home Page</option>
		    	<option value="College" <?php if($post_page == 'College') echo ' selected';?>>College Home Page</option>
		    	<option value="University" <?php if($post_page == 'University') echo ' selected';?>>University Home Page</option>
		    	<option value="Exam" <?php if($post_page == 'Exam') echo ' selected';?>>Exam Home Page</option>
		    	<option value="Course" <?php if($post_page == 'Course') echo ' selected';?>>Course Home Page</option>
		    	<option value="Admission" <?php if($post_page == 'Admission') echo ' selected';?>>Admission Page</option>
		    	<option value="Random" <?php if($post_page == 'Random') echo ' selected';?>>Random Page</option>
		    </select>
		  </div>
		  
		  <div class="col-md-3 my-2">
		    Adv. Section  : <?php echo $errors[post_section];?>
		    <select name="post_section" class='form-control form-control-sm'>
		    	<option value="">-- Select -- </option>
		    	<option value="Header" <?php if($post_section == 'Header') echo ' selected';?>>Header Section</option>
		    	<option value="Footer" <?php if($post_section == 'Footer') echo ' selected';?>>Footer Section</option>
		    	<option value="Left" <?php if($post_section == 'Left') echo ' selected';?>>Left Side Section</option>
		    	<option value="Right" <?php if($post_section == 'Right') echo ' selected';?>>Right Side Section</option>
		    	<option value="Random" <?php if($post_section == 'Random') echo ' selected';?>>Random Section</option>
		    </select>
		  </div>
		  
		  <div class="col-md-6 my-2	">Upload Logo : <?php echo $errors[advImg];?> 
			<input type="file"  name="advImg"  class="form-control form-control-sm" onchange="advImgCheck(this)" value="<?php echo $advImg ;?>" id="advImg"  accept="image/*">
		  </div>		  
		  
		  <div class="col-md-12 my-2 text-center"> <br>			
			<input type="submit" value='Submit' name='submit' class='mx-2 bold  btn btn-sm bg-info px-4'/>
			<a href='Add-Adv' class="bold btn btn-sm bg-info px-4 mx-2">Reset </a>
		  </div>		  
		</div>			
	  </form> 
	</div> 
	<br>
<?php
	$q1="select * from adv_data";
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
	$found_data=mysqli_num_rows($qr1);
	if($found_data > 0)
	{
?>
	<div class='text-center bg-cyanlt bold'>Previously Added List</div>
	<table class='table-bordered table table-sm table-hover'>
	  <tr class='bg-light bold text-center'>
	    <th>#</th>
	    <th>Title</th>
	    <th>Adv Location</th>
	    <th>Adv Section</th>
	    <th>Image</th>
	    <th>Status</th>
	    <th>Action</th>
	  </tr>
<?php
	  $sn=1;
	  while($r1=mysqli_fetch_object($qr1))
  	  {
		$adv_id  = $r1->adv_id ;
		$adv_title1 = $r1->adv_title;
		$adv_page1 = $r1->adv_page;
		$adv_section1 = $r1->adv_section;
		$adv_status1 = $r1->adv_status;
		$adv_file_name1 = $r1->adv_file_name;
		if(!empty($adv_file_name1))
		{
			$filelocation = 'Adv_Img/'.$adv_file_name1;
			if(file_exists($filelocation ))
			{
				$file='<a target="new" href="'.$filelocation.'">
				      <img src="'.$filelocation .'" style="height:50px; width:80px;" />
				     </a>';
			} 
			else $file="<b class='text-danger'>Not Found</b>";				
		}else
			 $file="<b class='text-danger'>Not Found</b>";
		?>
	  <tr class=' bold text-center'>
	    <td><?php echo $sn;?></td>
	    <td class='text-left'><?php echo $adv_title1;?> </td>
	    <td><?php echo $adv_page1;?> Section</td>
	    <td><?php echo $adv_section1;?> </td>
	    <td><?php echo $file;?></td>
	    <td>
			<?php 
				if($adv_status1 == 'Block') 
					echo "<b class='text-danger'>".$adv_status1."</b>";
				else
					echo "<b class=''>".$adv_status1."</b>";
			?>
		</td>
	    <td> 
			<a onclick="return confirm('Are you sure?')" href="deleteAdv.php?adv_id=<?php echo $adv_id;?>" class='bg-danger px-2'>Delete</a>
			<?php 
			if($adv_status1 == 'Active')
			{
			?>
			<a href="De-Activate.php?adv_id=<?php echo $adv_id;?>" class='bg-primary px-2 mx-2'>De-Activate</a>
			<?php
			}
			else if($adv_status1 == 'Block')
			{
			?>
			<a href="Activate.php?adv_id=<?php echo $adv_id;?>" class='bg-success px-2 mx-2'>Activate</a>
			<?php	
			}
			?>
		</td>
	  </tr>
	<?php
		$sn++;
	  }
	  ?>
	  
	</table>
	  <?php
	}
?>	
	
	
   </div><br><br><br><br>
 </div>
</div>
  <!-- /.content-wrapper -->
  
  
<script>
function advImgCheck()
{	 
	var oFile = document.getElementById("advImg").files[0]; 

	if (oFile.size > 512000) // 2 MiB for bytes.
	{
		alert("File size must under 500 KB!");
		document.getElementById("advImg").value = ''; 	
		return;
	}
	else
	{
		var fileInput = document.getElementById('advImg');

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
			document.getElementById("advImg").innerHTML = "";			
		}	
	}
}
</script> 
<?php include_once('Master-Footer.php');?>
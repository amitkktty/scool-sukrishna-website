<?php 
error_reporting(0);
$page='college'; $innerpage='collegeview';
include_once('Master-Header.php');
$college_name = $_SESSION['college_name'];
$_SESSION['backlink'] = 'addCollegeGallery';
if(empty($college_name))
{
	echo "<form action=College-View.php method=post name=main></form>
		<script>document.main.submit(); </script>";
}
if (isset($_POST['submit'])) 
{
 
	$errors = array();

	if (empty($album_title))
	$errors[album_title] = "<span class='text-danger'> Empty !</span>";
	else
	{
		
	  if (empty($_FILES ['image_gallery']['name']))
	  {
		  $errors[imagegallery]="<span class='text-danger'> Empty !</span>"; 
	  }		
	}
	if(empty($errors))
	{
		$imagetype = array(
		image_type_to_mime_type(IMAGETYPE_GIF), image_type_to_mime_type(IMAGETYPE_JPEG),image_type_to_mime_type(IMAGETYPE_PNG), 
		image_type_to_mime_type(IMAGETYPE_BMP)
		);

		$FOLDER = "College_Personal_Gallery/";
		if(is_dir($FOLDER) === false )   	
		{        
		  mkdir($FOLDER);   
		} 
		$myfile = $_FILES["image_gallery"];
		for ($i = 0; $i < count($myfile["name"]); $i++) 
		{
			if ($myfile["name"][$i] <> "" && $myfile["error"][$i] == 0) 
			{
			// uploaded file is OK
				if (in_array($myfile["type"][$i], $imagetype)) 
				{
				// get the extention of the file
				$file_extention = @strtolower(@end(@explode(".", $myfile["name"][$i])));

				// Setting an unique name for the file
				$file_name = $college_name.'-'. rand() . '.' . $file_extention;
					if (move_uploaded_file($myfile["tmp_name"][$i], $FOLDER . $file_name) ===    
					  FALSE) 
					{
						$errors[imagegallery]="<span class='text-danger'> Error while uploading the file</span>";  
					} 
					else 
					{

						$album_title = mysqli_real_escape_string($conn, $album_title);
						$q3 = "insert into college_image_gallery values(null,'$college_name','$album_title','$file_name','$currentdt','','','','','')";  	
						if (!mysqli_query($conn, $q3)) {
						$message = "Error description:  " . $q3 . "<br>" . mysqli_error($conn);
						echo $message;
						}	
						else
						{
							echo "<form action=addCollegeGallery method=post name=main></form>
							<script>document.main.submit(); </script>"; 
						}	

					//$result = "Total =". count($myfile["name"]) . " File uploaded successfully"; 
					}
				} 
				else 
				{
					$errors[imagegallery]="<span class='text-danger'> Only JPEG, PNG Format Allow</span>"; 
				}
			}
			else
			{
				$errors[imagegallery]="<span class='text-danger'> Empty !</span>";  
			}
		} 
		//header("location:College-View.php.php");	
		/* echo "<form action=College-View.php method=post name=main></form>
		<script>document.main.submit(); </script>";  */  
	}
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
		  <h6 class='text-primary bold mt-n3'>College View</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
   <div class="container-fluid px-4 ">
   <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
<?php 
  
?>	
	
	<div class='container-fluid '>	
	 <div class="row bold">
		<div class="col-md-3"> <a href="College-View" class='bg-info px-3 ml-n2 py-1  rounded sd-1'>
			<i class="fa fa-arrow-left pr-2" aria-hidden="true"></i> College View </a>
		</div>
		<div class="col-md-9 bg-greenlight bold lead text-center"> 
		  <strong><?php if($_SESSION['college_name']); echo $_SESSION['college_full_name'];?></strong>
		</div>
	  </div>
	</div> 
	
	<div>
	  <form action="addCollegeGallery" method="POST" enctype="multipart/form-data">
		<div class="row bold">
		  <div class="col-md-6 my-2">Album Title : <?php echo $errors[album_title];?>
		  <input type="text" class='form-control form-control-sm'  maxlength='255' name='album_title' value='<?php echo $album_title;?>' />	  
		  </div>
		  
		  <div class="col-md-6 my-2	">Image : 
		  <?php echo $errors[imagegallery];?> 
			<input type="file" class="form-control form-control-sm" accept="image/*" name="image_gallery[]" multiple=""  />  						  
		  </div>
		  
		  <div class="col-md-12 my-2 text-center"> 			
			<input type="submit" value='Submit' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/> 
		  </div>		  
		</div>			
	  </form> 
	</div>
<?php
$sn = 1;
$q1 = "select * from college_image_gallery where college_id='$college_name' order by gid DESC";
$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
$found_data=mysqli_num_rows($qr1);
if($found_data > 0)
{
?>
<h5 class='mt-5 text-center bg-cyanlt bold  py-2'>Added List</h5>
<div class="d-flex bg-greenlight mt-n2 justify-content-start flex-wrap">
<?php 
while ($r1 = mysqli_fetch_object($qr1)) 
 {
	$gid   = $r1->gid  ;
	$image_name = $r1->image_name; 
	?>
	<div class='p-3'>
		<div class='p-3 border border-info bg-white'  style=' box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;' >
			<img src="College_Personal_Gallery/<?php echo $image_name;?>" style="width:150px; height:120px;" class='img-fluid'/>
			<a href="deleteCollegeGallery?gid=<?php echo $gid;?>" onclick="return confirm('Are you sure?')">
			<div class='btn btn-block btn-danger'>Delete </div></a>
		</div>
	</div>
	
	<?php
	
 } 
?>
</div>
<?php  
}
?> 

	
   </div><br><br><br><br>
   </div>
</div>
  <!-- /.content-wrapper -->
  
<?php include_once('Master-Footer.php');?>
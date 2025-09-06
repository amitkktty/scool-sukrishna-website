<?php 
$page='college'; $innerpage='collegeview';
include_once('Master-Header.php');
$college_name = $_SESSION['college_name'];
$_SESSION['backlink'] = 'addCollegeVideo';
if(empty($college_name))
{
	echo "<form action=College-View.php method=post name=main></form>
		<script>document.main.submit(); </script>";
}
if (isset($_POST['submit'])) 
{
 
	$errors = array();

	if (empty($video_url))
	$errors[video_url] = "<span class='text-danger'> Empty !</span>";
	
	if(empty($errors))
	{
		$video_url = mysqli_real_escape_string($conn, $video_url);
		$q = "insert into college_video_gallery values(null,'$college_name','$video_url','','','','','' )";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		}
		else
		{
			echo "<form action=addCollegeVideo method=post name=main></form> <script>document.main.submit(); </script>"; 
		}	
		
		
		 
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
			<i class="fa fa-arrow-left pr-2" aria-hidden="true"></i> Go Back </a>
		</div>
		<div class="col-md-9 bg-greenlight bold lead text-center"> 
		  <strong><?php if($_SESSION['college_name']); echo $_SESSION['college_full_name'];?></strong>
		</div>
	  </div>
	</div> 
	
	<div>
	  <form action="addCollegeVideo" method="POST" enctype="multipart/form-data">
		<div class="row bold">
		  <div class="col-md-8 my-2">Video URL (Iframe Code) : <?php echo $errors[video_url];?>
		  <input type="text" class='form-control form-control-sm'  maxlength='255' name='video_url' value='<?php echo $video_url;?>' />	  
		  </div> 
		  <div class="col-md-4 my-2 text-center"><br> 			
			<input type="submit" value='Submit' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/> 
		  </div>		  
		</div>			
	  </form> 
	</div>
<?php
$sn = 1;
$q1 = "select * from college_video_gallery where college_id='$college_name' order by vid DESC";
$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
$found_data=mysqli_num_rows($qr1);
if($found_data > 0)
{
?>
<h5 class='mt-5 text-center bg-cyanlt bold  py-2'>Added List</h5>
<div class="d-flex bg-greenlight mt-n2 justify-content-center flex-wrap">
<?php 
while ($r1 = mysqli_fetch_object($qr1)) 
 {
	$vid   = $r1->vid  ;
	$video_url = $r1->video_url; 
	?>
	<div class='p-3'>
		<div class='p-3 border border-info bg-white'  style=' box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;' >
			<iframe width="420" height="180"
			src="<?php echo $video_url;?>">
			</iframe>			 
			<a href="deleteCollegeVideo?vid=<?php echo $vid;?>" onclick="return confirm('Are you sure?')">
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
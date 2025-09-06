<?php 
$page='university'; $innerpage='unicersityview';
include_once('Master-Header.php');
$college_name = $_SESSION['college_name'];
$_SESSION['backlink'] = 'addUniversityNotification';

if (isset($_POST['submit'])) 
{
 
	$errors = array();

	if (empty($notification_title))
	$errors[notification_title] = "<span class='text-danger'> Empty !</span>";
	if (empty($notification_date))
	$errors[notification_date] = "<span class='text-danger'> Empty !</span>";
	else
	{
		$n_date = date('d-m-Y', strtotime($notification_date));
		$n_date_code = strtotime($notification_date);
	}
	
	
	if(!empty($_FILES ['doc_file']['name']))
	{		
		$docfile = basename ($_FILES ['doc_file']['name']);  
		$docfiletype = strtolower(pathinfo($docfile,PATHINFO_EXTENSION));
		if($docfiletype != "jpg"  &&  $docfiletype != "png" && $docfiletype !=  "jpeg" && $docfiletype !=  "pdf" && $docfiletype !=  "doc" && $docfiletype !=  "docx" && $docfiletype !=  "xls" && $docfiletype !=  "xlsx" )
		{	
			$errors[doc_file]="<span class='text-danger'> Invalid File Tyle (Image/Word/Pdf/Excel File allow) </span>"; 
		}
		else
		{
			if ($_FILES ['doc_file']['size'] > 2*1024*1024) 
			{
				$errors[doc_file] = "<span class='text-danger'> Max 2 mb!</span>";
			}
		}
	}
	if(empty($errors))
	{ 
		$notification_title = ucwords(mysqli_real_escape_string($conn, $notification_title));
		$description = mysqli_real_escape_string($conn, $description);
		
		if(!empty($_FILES ['doc_file']['name']))
		{
			$doc_file_name =$college_name.'-'. rand().'.'.$docfiletype;
			$target_dir1 = "College_Notification/";
			if(is_dir($target_dir1) === false )   	
			{        
			mkdir($target_dir1);   
			}	 
			$doc_move=$target_dir1 . basename($doc_file_name); 
		}
		
		$q = "insert into college_personal_notification values(null,'$college_name','$notification_title','$description','$doc_file_name','$n_date','$n_date_code','','','','' )";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		}
		else
		{
			move_uploaded_file($_FILES ['doc_file']['tmp_name'], $doc_move);  
			
			echo "<form action=addUniversityNotification method=post name=main></form>
			<script>document.main.submit(); </script>"; 		   
		}	
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
		  <h3 class='bold text-danger'> University Master  
		 
		</div>	   
	   </div><br>		
      </div>
	  
	  
   <div class="container-fluid px-4 ">
   <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
<?php 
  
?>	
	
	<div class='container-fluid '>	
	 <div class="row bold">
		<div class="col-md-3"> 
		</div>
		<div class="col-md-9 bg-greenlight bold lead text-center"> 
		  <strong><?php if($_SESSION['college_name']); echo $_SESSION['college_full_name'];?></strong>
		</div>
	  </div>
	</div> 
	
	<div>
	  <form action="addUniversityNotification" method="POST" enctype="multipart/form-data">
		<div class="row bold">
		  <div class="col-md-9 my-2">Notification Title : <?php echo $errors[notification_title];?>
		  <input type="text" class='form-control form-control-sm'  maxlength='255' name='notification_title' value='<?php echo $notification_title;?>' />	  
		  </div>
		  <div class="col-md-3 my-2">Date : <?php echo $errors[notification_date];?>
		  <input type="date" class='form-control form-control-sm' name='notification_date' value='<?php echo $notification_date;?>' />	  
		  </div>
		  
		  <div class="col-md-12 my-2">Description: <?php echo $errors[description];?>
			<textarea name="description"  id='editor'  class='form-control form-control-sm' rows="3"><?php echo $description;?></textarea> 		  
		  </div>
		  
		  <div class="col-md-12 my-2	">Image : 
		  <?php echo $errors[doc_file];?> 
			<input type="file"  name="doc_file"  class="form-control form-control-sm" onchange="doc_fileCheck(this)" value="<?php echo $doc_file ;?>" id="doc_file" >  						  
		  </div>
		  
		  <div class="col-md-12 my-2 text-center"> 			
			<input type="submit" value='Submit' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/> 
		  </div>		  
		</div>			
	  </form> 
	</div>
<?php
$sn = 1;
$q1 = "select * from college_personal_notification where college_id='$college_name' order by nid DESC";
$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
$found_data=mysqli_num_rows($qr1);
if($found_data > 0)
{
?>
<h5 class='mt-5 text-center bg-cyanlt bold  py-2'>Added List</h5>
<table class='table table-sm mt-n2 border'>
<tr class='bg-greenlight bold '>
  <td class='text-center'>S.N.</td>
  <td class='text-center'>Date</td>
  <td width="20%">Tilte</td>
  <td width="40%">Description</td>
  <td class='text-center'>Attachment</td>
  <td></td>
</tr>
<?php 
$sn=1;
while ($r1 = mysqli_fetch_object($qr1)) 
 {
	$nid   = $r1->nid  ;
	$notification_date1 = $r1->notification_date; 
	$notification_title1 = $r1->notification_title; 
	$notification_description1 = $r1->notification_description; 
	$len=strlen($notification_description1);
	$notification_doc = $r1->notification_doc;
	if(!empty($notification_doc))
	{
		$file_location='College_Notification/'.$notification_doc;
		if(file_exists($file_location))
		$filefound = "<a href='".$file_location."' target='new'>View</a>";
		else
		$filefound	='NA';
	}
	?>
<tr>
   <td class='text-center'><?php echo $sn;?></td>
   <td class='text-center'><?php echo $notification_date1;?></td>
   <td><?php echo $notification_title1	;?></td>
   <td><div class='px-3' style='<?php if($len > 30) echo " overflow-y: scroll; height:150px; border:1px solid teal;";?> text-align:justify;'> <?php echo $notification_description1;?></div></td>
   <td class='text-center bold'><?php echo $filefound;?></td> 
   <td><a href="deleteCollegeNotification?nid=<?php echo $nid;?>" onclick="return confirm('Are you sure?')">
			<div class='badge badge-danger p-2 px-4'>Delete </div></a></td>

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
<script type="text/javascript">
ClassicEditor
		.create(document.querySelector('#editor'))
		

function doc_fileCheck()
{	 
	var oFile = document.getElementById("doc_file").files[0]; 

	if (oFile.size > 2048000) // 2 MiB for bytes.
	{
		alert("File size must under 2 MB!");
		document.getElementById("doc_file").value = '';
		bannerThumb.src='images/noimage.jpg';		
		return;
	}
	else
	{
		var fileInput = document.getElementById('doc_file');

		var filePath = fileInput.value;

		// Allowing file type
		var allowedExtensions = 
		/(\.jpg|\.jpeg|\.png|\.JPG|\.PNG|\.JPEG|\.doc|\.DOC|\.docx|\.DOCX|\.xls|\.XLS|\.xlsx|\.XLSX)$/i;

		if (!allowedExtensions.exec(filePath)) 
		{
			alert('Invalid Question Figure type. Only Image/Pdf/Doc/Excel file allow!');
			fileInput.value = '';
			bannerThumb.src='images/noimage.jpg';			
			return false;
		}
		else
		{			
			bannerThumb.src=URL.createObjectURL(event.target.files[0]);
			document.getElementById("doc_file").innerHTML = "";			
		}	
	}
}
</script>  
<?php include_once('Master-Footer.php');?>
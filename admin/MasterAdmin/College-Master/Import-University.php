<?php 
$page='university'; $innerpage='adduniversity';
include_once ('dbconnect.php');
if (isset($_POST['submit'])) 
{ 
 $filename=$_FILES["excel_file"]["tmp_name"];    
 if($_FILES["excel_file"]["size"] > 0)
 {
	$row=1; $added_row=0; $failed_row=0; $duplicte_record=0;
	$file = fopen($filename, "r");
	  while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	   {
		if($row==1){
		$row++; 
		continue;
		} 
		else
		{
			$id_sn=$getData[0];
			$college_name=$getData[1];
			$college_name = mysqli_real_escape_string($conn, $college_name); 
			
		    $popular_name=$getData[2];
		    $popular_name = mysqli_real_escape_string($conn, $popular_name);
		    $short_name=$getData[3];
		    $short_name = mysqli_real_escape_string($conn, $short_name);
		   $college_type='University';
		   $estd=$getData[4];
		   $ownership=$getData[5]; 
			$q0="select * from ownership_data where ownership_name ='$ownership'";
			$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
			$duplicte=mysqli_num_rows($qr0);
			if($duplicte <> 0)
			{
				$r0 = mysqli_fetch_object($qr0);
				$ownership_id  = $r0->ownership_id    ;
			}
			else
			{
				$ownership = ucwords(mysqli_real_escape_string($conn, $ownership));
				$q = "insert into ownership_data values(null,'$ownership','$currentdt', '', '', '', '', '')";
				mysqli_query($conn, $q);
				$ownership_id= mysqli_insert_id($conn);
			}
		  
			$acceptence=$getData[6];
		  $acceptence = explode(',',$acceptence); 	
		  $accept =''; 
			foreach( $acceptence as $accept)
			{	
			    $accept =  trim($accept); 
				$accept = ucwords(mysqli_real_escape_string($conn, $accept));				
			    $q00="select * from exam_type where exam_name='$accept'"; 				
				$qr00=mysqli_query($conn, $q00) or die($q00.mysqli_error($conn));
				$duplictes=mysqli_num_rows($qr00);
				if($duplictes <> 0)
				{
					$r00 = mysqli_fetch_object($qr00);
					$acceptence_id = $r00->exam_type_id;
				}
				else
				{
					$accept = ucwords(mysqli_real_escape_string($conn, $accept));
					$q = "insert into exam_type values(null,'$accept','$currentdt', '', '', '', '', '','')";
					mysqli_query($conn, $q);
					$acceptence_id = mysqli_insert_id($conn);
				}
				$accept .= $acceptence_id .',';
				
			}
			$accept = trim($accept,',');
			
		    
			$country=101;
		
			
		   $state=$getData[7];
		   $state = ucwords(mysqli_real_escape_string($conn, $state));
		    $q0="select * from state_data where country_id='101' AND statename='$state'"; 
		    $qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
			$duplicte=mysqli_num_rows($qr0);
			if($duplicte <> 0)
			{
				$r0 = mysqli_fetch_object($qr0);
				$state_id  = $r0->state_id ;
			}
			else
			{
				
				$q = "insert into state_data values(null,'$country_id','$state','','','','$currentdt','','','','','','')";
				mysqli_query($conn, $q);
				$state_id= mysqli_insert_id($conn);
			}
		   
		   $district=$getData[8];
		   $district = ucwords(mysqli_real_escape_string($conn, $district));
		   $q0="select * from district_data where country_id='101' AND state_id=$state_id AND district_name='$district'"; 
		    $qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
			$duplicte=mysqli_num_rows($qr0);
			if($duplicte <> 0)
			{
				$r0 = mysqli_fetch_object($qr0);
				$district_id = $r0->district_id  ;
				$district_name = $r0->district_name  ;
			}
			else
			{
				$district_name = ucwords(mysqli_real_escape_string($conn, $district));
				$q = "insert into district_data values(null,'$district_name',$state_id,'$country_id','','','$currentdt', '', '', '', '', '','' )";
				mysqli_query($conn, $q);
				$district_id= mysqli_insert_id($conn);
			}
		   
		   
		   $description=$getData[9];
		   
		   
			$slug = trim($college_name); 
			$slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug );  
			$slug= str_replace(' ','-', $slug); 
			$district_name_slug= str_replace(' ','-', $district_name); 
			$slug= $slug.'-'.$district_name_slug;
			$slug= strtolower($slug); 
			
		$q0="select * from college_data where college_name = '$college_name' AND college_seo_url  = '$slug' AND country1='101' AND state1=$state_id AND district1='$district_id'"; 
		$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
		$duplicte1=mysqli_num_rows($qr0);
		if($duplicte1 <> 0)
		{
			$duplicte_record =   $duplicte_record + 1 ;
		}
		else
		{
			$sql = "insert into college_data values('$id_sn','$college_name','$popular_name','$short_name','$slug','$college_type','$estd','$ownership_id','','$accept','$address','101','$state_id','$district_id','','','','','$description','','','','fa fa-university','$currentdt','','','','','','','','','','','','','' )";
			if (!mysqli_query($conn, $sql)) 
			{
			$error_message = "Error description:  " . $sql . "<br>" . mysqli_error($conn);  
			}
			else
			{				
			   $result = mysqli_query($conn, $sql);
				if(!isset($result))
				{
				  $failed_row =   $failed_row + 1 ; 
				}
				else 
				{ 
				   $added_row = $added_row + 1;
				} 
			}
		}		   
	   }
	}
   fclose($file);  
 }	
}  
include_once('Master-Header.php'); 
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
		  <h6 class='text-primary bold mt-n3'>Add University</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
   <div class="container-fluid px-4 ">
   <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
<?php  
?>	
	
	<div class='container-fluid '>	
	 <div class="row bold">
		<div class="col-5"> <a href="Import-University" class='bg-info px-3 ml-n2 py-1  rounded sd-1'>
			<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add University </a>
		</div>
		<div class="col-7 text-right"> 
		<a href="images/Book2.csv" class='bg-info px-3 mr-2 py-1  rounded sd-1'>
		<i class="px-2 fa fa-file-excel" aria-hidden="true"></i> Sample Download </a>
		
		<a href="University-List" class='bg-info px-3 mr-n2 py-1  rounded sd-1'>
		<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> University List </a>
		
		</div>
	  </div>
	</div> 
	<div class="container-fluid">
<?php

if(!empty($duplicte_record) or (!empty($added_row)) or (!empty($failed_row)) or (!empty($error_message)))
{
echo '
		<div class="mt-3 bold alert bg-cyanlt alert-dismissible fade show" role="alert">
		<div class="row text-center">	
		 <div class="col-md-12 bg-primary text-left">'.$error_message.'</div> 
		 <div class="col-md-4 bg-success">Added Record: '.$added_row.'</div> 
		 <div class="col-md-4 bg-danger">Record Not Added : '.$failed_row.'</div> 
		 <div class="col-md-4 bg-warning">Duplicate Record: '.$duplicte_record.'</div> 
		</div>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
}

?>
	</div>
	<div>
	  <form action="Import-University" method="POST" enctype="multipart/form-data">
		<div class="row bold p-4">
		  <div class="col-md-12 mt-2">Excel File * : <?php echo $errors[excel_file];?>
		  </div>
		  <div class="col-md-9 my-2"> <input type="file" class='form-control form-control-sm' name='excel_file' id='excel_file' value='<?php echo $excel_file;?>' onchange='fileCheck()'/>
		  </div>
		  
		  <div class="col-md-3 my-2 text-center"> 			
			<input type="submit" value='Submit' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/> 
		  </div>		  
		</div>			
	  </form> 
	</div>		 
   </div><br><br><br><br>
   </div>
</div>
  <!-- /.content-wrapper -->
  
  
<script> 

function fileCheck()
{	 
	var oFile = document.getElementById("excel_file").files[0]; 

	if (oFile.size > 2048000) // 2 MiB for bytes.
	{
		alert("File size must under 2 MB!");
		document.getElementById("excel_file").value = ''; 	
		return;
	}
	else
	{
		var fileInput = document.getElementById('excel_file');

		var filePath = fileInput.value;

		// Allowing file type
		var allowedExtensions = 
		/(\.csv|\.CSV)$/i;
		if (!allowedExtensions.exec(filePath)) 
		{
			alert('Invalid file type. Only CSV file allow!');
			fileInput.value = ''; 			
			return false;
		}
		else
		{			 	
			document.getElementById("excel_file").innerHTML = "";			
		}	
	}
} 
</script>
<?php include_once('Master-Footer.php');?>
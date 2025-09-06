<?php 
$page='college'; $innerpage='addcollege';
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
		   $college_type=ucwords(strtolower($getData[5]));
		   $estd=$getData[6];
		   $ownership=$getData[7]; 
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
		  $affiliation=$getData[8];
		  $affiliation = explode(',',$affiliation); 	
		  $affiliat =''; 
			foreach( $affiliation as $affiat)
			{	
			    $affiat =  trim($affiat); 
				$affiat = ucwords(mysqli_real_escape_string($conn, $affiat));				
			    $q0="select * from affiliation_name where affiliation_name='$affiat'"; 				
				$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
				$duplicte=mysqli_num_rows($qr0);
				if($duplicte <> 0)
				{
					$r0 = mysqli_fetch_object($qr0);
					$affiliation_id = $r0->affiliation_id;
				}
				else
				{
					$affiat = ucwords(mysqli_real_escape_string($conn, $affiat));
					$q = "insert into affiliation_name values(null,'$affiat','$currentdt', '', '', '', '', '')";
					mysqli_query($conn, $q);
					$affiliation_id = mysqli_insert_id($conn);
				}
				$affiliat .= $affiliation_id .',';
				
			}
			
			
			$affiliat = trim($affiliat,',');
			$acceptence=$getData[9];
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
			
		    $address=$getData[10];
			$address = ucwords(mysqli_real_escape_string($conn, $address));
			$country=$getData[11];
			$country = ucwords(mysqli_real_escape_string($conn, $country));
			$q0="select * from country_data where name ='$country'";
			$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
			$duplicte=mysqli_num_rows($qr0);
			if($duplicte <> 0)
			{
				$r0 = mysqli_fetch_object($qr0);
				$country_id = $r0->country_id;
			}
			else
			{ 
				$q = "insert into country_data values(null,'','$country','','','','','','','','','','','')";
				mysqli_query($conn, $q);
				$country_id= mysqli_insert_id($conn);
			}
			
		   $state=$getData[12];
		   $state = ucwords(mysqli_real_escape_string($conn, $state));
		    $q0="select * from state_data where country_id='$country_id' AND statename='$state'"; 
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
		   
		   $district=$getData[13];
		   $district = ucwords(mysqli_real_escape_string($conn, $district));
		   $q0="select * from district_data where country_id='$country_id' AND state_id=$state_id AND district_name='$district'"; 
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
		   $pincode=$getData[14];
		   $pincode = ucwords(mysqli_real_escape_string($conn, $pincode));
		   
		   $mobile=$getData[15];
		   $mobile = ucwords(mysqli_real_escape_string($conn, $mobile));
		   
		   $email_id=$getData[16];
		   $email_id = ucwords(mysqli_real_escape_string($conn, $email_id));
		   
		   $website=$getData[17];
		   $website = ucwords(mysqli_real_escape_string($conn, $website));
		   
		   $description=$getData[18];
		   $description = mysqli_real_escape_string($conn, $description);
		   
		    $also_known=$getData[32];
		   $also_known = mysqli_real_escape_string($conn, $also_known);
		   
		    $address2=$getData[33];
		   $address2 = mysqli_real_escape_string($conn, $address2);
		   
		    $address3=$getData[34];
		   $address3 = mysqli_real_escape_string($conn, $address3);
		   
		   $mobile2=$getData[35];
		   $mobile2 = mysqli_real_escape_string($conn, $mobile2);
		   
		   $mobile3=$getData[36];
		   $mobile3 = mysqli_real_escape_string($conn, $mobile3);
		   
			$slug = trim($college_name); 
			$slug= preg_replace('/[^a-zA-Z0-9 -]/','',$slug );  
			$slug= str_replace(' ','-', $slug); 
			$district_name_slug= str_replace(' ','-', $district_name); 
			$slug= $slug.'-'.$district_name_slug;
			$slug= strtolower($slug); 
			
		$q0="select * from college_data where college_name = '$college_name' AND college_seo_url  = '$slug' AND country1='$country_id' AND state1=$state_id AND district1='$district_id'"; 
		$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
		$duplicte1=mysqli_num_rows($qr0);
		if($duplicte1 <> 0)
		{
			$duplicte_record =   $duplicte_record + 1 ;
		}
		else
		{
			$sql = "insert into college_data values('$id_sn','$college_name','$popular_name','$short_name','$slug','$college_type','$estd','$ownership_id','$affiliat','$accept','$address','$country_id','$state_id','$district_id','$pincode','$mobile','$email_id','$website','$description','','','','fa fa-university','$currentdt','','','','','','','','','$also_known','$address2','$address3','$mobile2','$mobile3' )";
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
		  <h3 class='bold text-danger'> College Master  
		  <h6 class='text-primary bold mt-n3'>Add College</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
   <div class="container-fluid px-4 ">
   <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
<?php  
?>	
	
	<div class='container-fluid '>	
	 <div class="row bold">
		<div class="col-5"> <a href="Import-College" class='bg-info px-3 ml-n2 py-1  rounded sd-1'>
			<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
		</div>
		<div class="col-7 text-right"> 
		<a href="images/College_Sample.xlsx" class='bg-info px-3 mr-2 py-1  rounded sd-1'>
		<i class="px-2 fa fa-file-excel" aria-hidden="true"></i> Sample Download </a>
		
		<a href="College-List" class='bg-info px-3 mr-n2 py-1  rounded sd-1'>
		<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
		
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
	  <form action="Import-College" method="POST" enctype="multipart/form-data">
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
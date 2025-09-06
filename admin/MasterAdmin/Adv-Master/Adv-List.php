<?php 
$page='adv'; $innerpage='advlist';
include_once('Master-Header.php');
?>
<div class="content-wrapper"> 
  <div class="container-fluid text-uppercase ">
   <div class="row bg-white p-2" style='box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;'>
	<div>
	  <i class="fa fa-database text-danger fa-3x pl-1 pr-3" aria-hidden="true"></i> 
	</div>
	<div>
	  <h3 class='bold text-danger'> Adv. Master  
	  <h6 class='text-primary bold mt-n3'>List of Adv.</h6></h3>
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
	else echo "<h3 class='text-center p-3'>No any record found.</h3>";
	
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
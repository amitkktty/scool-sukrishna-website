<?php 
include_once ('dbconnect.php'); 
$college_name=$_SESSION['college_name'];
if(!empty($college_name))
{
?>
	<table class='table table-sm bg-white' id='facilities_list'>
	  <tr class='bg-cyanlight'>
		<td width="10%" class='text-center'>#</td>
		<td>Name</td> 
		<td class='text-center'>Icon</td> 
		<td width="10%"></td>
	  </tr>
	<?php 
	$sn = 1;
	$q1 = "select * from all_college_facilities where college_id='$college_name' order by failities_name";
	$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
	$found_data=mysqli_num_rows($qr1);
	if($found_data > 0)
	{
	  while ($r1 = mysqli_fetch_object($qr1)) 
	  {
		$f_id1    = $r1->f_id   ;
		$failities_name1 = $r1->failities_name; 
		$facilities_logo = $r1->facilities_logo; 
		if(!empty($facilities_logo))
		{
			$filelocation='../Master/College_Facilities/'.$facilities_logo;
			if(file_exists($filelocation))
			  $src_value=$filelocation;
			else
			  $src_value='../images/nologo.jpg';
		}
		else
		 $src_value='../images/nologo.jpg';
	?>
	  <tr class="header">
		<td class='text-center'><?php echo $sn; ?></td> 
		<td><?php echo $failities_name1; ?></td>
		<td class='text-center'><a href="<?php echo $src_value;?>" target="new">
		  <img src="<?php echo $src_value;?>" alt="" style='height:30px; width:30px;' /></a>
		</td>
		<td><span onclick="deleteFacilities('<?php echo $f_id1;?>')" class=' btn btn-sm btn-outline-danger'><i class='fa fa-trash '></i></span></td>
	  </tr>
	<?php
		$sn++;
	  }
	}
	?>
	</table>
<?php
} 
?>
<?php 
include_once ('dbconnect.php'); 
$college_name=$_SESSION['college_name'];
if(!empty($college_name))
{
?>
<table class='table table-sm bg-white' id='ranking_list'>
		  <tr class='bg-cyanlight'>
			<td width="6%" class='text-center'>#</td>
			<td>Body Name</td>
			<td class='text-center'>Rank Value</td>
			<td class='text-center'>Rank Position </td>
			<td class='text-center'>Rank Year </td>
			<td>Rank Field</td>
			<td width="10%"></td>
		  </tr>
		<?php 
		$sn = 1;
		$q1 = "select * from college_ranking_data where college_id='$college_name' order by ranking_body_name";
		$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
		$found_data=mysqli_num_rows($qr1);
		if($found_data > 0)
		{
		  while ($r1 = mysqli_fetch_object($qr1)) 
		  {
			$r_id1   = $r1->r_id  ;
			$ranking_body_name1 = $r1->ranking_body_name;
			$ranking_value1 = $r1->ranking_value;
			$ranking_position1 = $r1->ranking_position;
			$ranking_year1 = $r1->ranking_year;
			$ranking_field1 = $r1->ranking_field;
		?>
		  <tr class="header">
			<td class='text-center'><?php echo $sn; ?></td> 
			<td><?php echo $ranking_body_name1; ?></td>
			<td class='text-center'><?php echo $ranking_value1; ?></td>
			<td class='text-center'><?php echo $ranking_position1; ?></td>
			<td class='text-center'><?php echo $ranking_year1; ?></td>
			<td><?php echo $ranking_field1; ?></td>
			<td><span onclick="deleteRankingData('<?php echo $r_id1;?>')" class=' btn btn-sm btn-outline-danger'><i class='fa fa-trash '></i></span></td>
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
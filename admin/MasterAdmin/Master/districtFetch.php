<?php
include_once ('dbconnect.php');
unset($_SESSION['no_of_record']);
$no_of_record= $_POST['no_of_record'];
$_SESSION['no_of_record'] = $no_of_record;
include_once ('pagination_district.php');
$districtlist ='';
$districtlist  .='
	<table id="myTable" class="table table-sm table-bordered">
	<tr class="header bg-teal">
		<th width="5%">#</th>
		<th width="25%">Country Name</th>
		<th width="25%">State Name</th>
		<th width="25%">District Name</th> 
		<th class="text-center">Action</th>
	</tr>';
$sn=1;	  
	$q1="select * from district_data order by state_id limit $startfrom, $per_page_record"; 
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
	while($r1=mysqli_fetch_object($qr1))
	{ 
		$country_id1=$r1->country_id ;
		$state_id1=$r1->state_id ;
		$q0="select * from country_data where country_id = $country_id1";
		$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
		$r0=mysqli_fetch_object($qr0);
		$country_name=$r0->name ; 
		$q0="select * from state_data where state_id = $state_id1";
		$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
		$r0=mysqli_fetch_object($qr0);
		$state_name=$r0->statename ;  
		$name1=$r1->disctict_name;  
 
$districtlist  .='
		<tr class="header">
		<td>'.$sn.'</td>
		<td>'.$country_name.'</td>
		<td>'.$state_name.'</td>
		<td>'.$name1.'</td> 
		<td class="text-center">
			<a href="District-Modify?id='.$state_id1.'" class="badge badge-primary p-2 px-3"><i class="fa fa-edit" aria-hidden="true"></i></a> 
			<a href="#" class="badge badge-danger p-2 px-3"><i class="fa fa-trash" aria-hidden="true"></i></a>
		</td> 
		</tr>
		';
$sn++;
}
if($last_page > 1)
{
$districtlist  .=' 
	<tr> <td colspan=5>
		<div class="row mb-n3">
			<div class="bold col-md-6 text-bluedk">
				Page No :'
				.$page_number.
				' out of '
				.$last_page .
				'</div> <div class="float-right col-md-6">'
				.$pagination.
				'</div> </div></td></tr>';
}
echo $districtlist;
?>
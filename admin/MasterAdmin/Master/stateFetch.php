<?php
include_once ('dbconnect.php');
unset($_SESSION['no_of_record']);
$no_of_record= $_POST['no_of_record'];
$_SESSION['no_of_record'] = $no_of_record;
include_once ('pagination_state.php');
$statelist ='';
$statelist  .='
	<table id="myTable" class="table table-sm table-bordered">
	<tr class="header bg-teal">
	    <th width="5%">#</th>
		<th width="30%">Country Name</th>
		<th width="30%">State Name</th>
		<th class="text-center">Logo</th>
		<th class="text-center">Action</th>
	</tr>';
$sn=1;	 
	//$q1="select * from state_data order by name  limit 0, $no_of_record  ";
	$q1="select * from state_data order by statename limit $startfrom, $per_page_record"; 
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
	while($r1=mysqli_fetch_object($qr1))
	{ 
		$country_id1=$r1->country_id ;
		$q0="select * from country_data where country_id = $country_id1";
		$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
		$r0=mysqli_fetch_object($qr0);
		$country_name=$r0->name ; 
		$state_id1=$r1->state_id ;
		$name1=$r1->statename;
		$state_logo1=$r1->state_logo; 
		if(empty($state_logo1))			
		$logofile='Images/nologo.jpg';  
		else
		$logofile='State_Logo/'.$state_logo1;  
 
$statelist  .='
		<tr class="header">
		<td>'.$sn.'</td>
		<td>'.$country_name.'</td>
		<td>'.$name1.'</td> 
			<td class="text-center"><img src="'.$logofile.'" alt="'.country_logo1.'" style="width:50px; height:50px;"/></td>
			<td class="text-center">
				<a href="State-Modify?id='.$state_id1.'" class="badge badge-primary p-2 px-3"><i class="fa fa-edit" aria-hidden="true"></i></a> 
				<a href="#" class="badge badge-danger p-2 px-3"><i class="fa fa-trash" aria-hidden="true"></i></a></td> 
		</tr>
		';
$sn++;
}
if($last_page > 1)
{
$statelist  .=' 
	<tr> <td colspan=5>
		<div class="row mb-n3"> 
			<div class="bold col-6 text-bluedk">
				Page No :'
				.$page_number.
				' out of '
				.$last_page .
				'</div> <div class="float-right col-md-6">'
				.$pagination.
				'</div> </div></td></tr>';
}
echo $statelist;
?>
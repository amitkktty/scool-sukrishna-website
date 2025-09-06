<?php
include_once ('dbconnect.php');
unset($_SESSION['no_of_record']);
$no_of_record= $_POST['no_of_record'];
$_SESSION['no_of_record'] = $no_of_record;  
include_once ('pagination-college.php');
$collegelist ='';
$collegelist  .='
	<table id="myTable" class="table table-sm table-bordered">
			  <tr class="header bg-teal">
			<th width="5%">#</th>
			<th width="50%">College Name</th>
			<th class="text-center">Location</th>
			<th class="text-center">Logo</th>
			<th class="text-center">Gallery  </th>
			<th class="text-center">Notification  </i></th>
			<th class="text-center">Action</th>
	</tr>';
	$sn=1;	 
	$q1="select * from college_data order by college_name limit 0, $no_of_record"; 
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
	while($r1=mysqli_fetch_object($qr1))
	{ 
			$c_id=$r1->c_id ;
			$state1=$r1->state1 ;
			$district1=$r1->district1 ;
			$name1=$r1->college_name;
			$q0="select * from state_data where state_id = $state1";
			$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
			$r0=mysqli_fetch_object($qr0);
			$state_name=$r0->statename ; 
			$q0="select * from district_data where district_id = $district1";
			$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
			$r0=mysqli_fetch_object($qr0);
			$district_name=$r0->district_name ;  		
			$location=$district_name.', '.$state_name;
			$college_logo1=$r1->college_logo; 
			if(empty($college_logo1))			
				$logofile='Images/nologo.jpg';  
			else
				$logofile='College_Logo/'.$college_logo1; 

$collegelist  .=	 
			'<tr class="header">
				<td>'.$sn.'</td>
				<td>'.$name1.'</td>
				<td>'. $location.'</td>
				<td class="text-center"><img src="'.$logofile.'" alt="" style=
				width:50px; height:50px;
				/></td>
				<td class=
				text-center
				><a href="collegeGallery?c_id='.$c_id.'>" class="btn btn-sm btn-outline-success"><i class="fa fa-image" aria-hidden="true"></i></a> </td> 
				
				<td class="text-center"><a href="collegeNotification?c_id='.$c_id.'" class="btn btn-sm btn-outline-danger"><i class="fa fa-bell" aria-hidden="true"></i></a> </td> 
				
				<td class="text-center"><a href="Modify-College?c_id='.$c_id.'>" class="badge badge-primary p-2 px-3"><i class="fa fa-edit" aria-hidden="true"></i></a> </td> 
			</tr>';
 
			$sn++;
}
if(($totalrows > 1) && ($last_page > 1))
{
$collegelist  .=' 
			<tr>
				<td colspan=7>
				<div class="row">
					<div class="bold col-6"> Page No : '.$page_number.' out of '.$last_page.'</div>
					<div class=" col-6">'.$pagination.'</div>
				</div>
				</td>
			</tr>';
} 
echo $collegelist; 
?> 
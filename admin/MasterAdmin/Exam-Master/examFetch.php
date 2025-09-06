<?php
include_once ('dbconnect.php');
unset($_SESSION['no_of_record']);
$no_of_record= $_POST['no_of_record'];
$_SESSION['no_of_record'] = $no_of_record;  
include_once ('pagination-exam.php');
$examlist ='';
$examlist  .='
	<table id="myTable" class="table table-sm table-bordered">
		<th class="text-center" width="6%">#</th>
		<th class="text-center" width="15">Department</th>
		<th class="text-center" width="20%">Course</th>
		<th class="text-center" width="15%">Exam Name</th>
		<th class="text-center" width="30%">Exam Title</th> 
		<th class="text-center" width="14%" colspan=2>Action</th>
		</tr>';
$sn=1;	 
	//$q1="select * from country_data order by name  limit 0, $no_of_record  ";
	$q1="select * from exam_detail  limit $startfrom, $per_page_record"; 
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
	while($r1=mysqli_fetch_object($qr1))
	{  
		$id=$r1->ex_id;
		$stream_id=$r1->stream_id ;
		$course_id=$r1->course_id ; 
		$exam_name_id=$r1->exam_name_id;
		$exam_title=$r1->exam_title;
		
		$q0="select * from stream where stream_id = $stream_id";
		$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
		$r0=mysqli_fetch_object($qr0);
		$stream_name=$r0->stream_name ; 
		
		$q0="select * from course_name where course_id  = $course_id ";
		$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
		$r0=mysqli_fetch_object($qr0);
		$course_name=$r0->course_name ; 
		 
		
		$q0="select * from exam_type where exam_type_id = $exam_name_id ";
		$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
		$r0=mysqli_fetch_object($qr0);
		$exam_name=$r0->exam_name ; 
			 
 
$examlist  .='
		<tr class="header">
			<td class="text-center">'.$sn.'</td>
			<td>'.$stream_name.'</td>
			<td>'.$course_name.'</td> 
			<td>'.$exam_name.'</td>	
			<td>'.$exam_title.'</td>	
			
			<td class="text-center"><a href="Exam-Modify?id='.$id.'" class="badge badge-primary p-2 px-3"><i class="fa fa-edit" aria-hidden="true"></i></a> </td>
			
			<td width="7%" class="text-center"><a href="Delete-Exam-List?id='.$id.'" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
			
		</tr>
		';
$sn++;
}
if($last_page > 1)
{
$examlist  .=' 
	<tr>
		<td colspan=7>
		<div class="row">
			<div class="bold col-6"> Page No : 
			'.$page_number.'
			out of 
			'.$last_page.' </div>
			<div class=" col-6"> '.$pagination.'</div>
		</div>
		</td>
	</tr>';
} 
echo $examlist; 
?> 
<?php 
include_once ('dbconnect.php');
$college_id = $_SESSION['college_name'];
if(empty($college_id))
echo "<form action=College-View.php method=post name=main></form>
		<script>document.main.submit(); </script>";	
else
{
	
	$q1 = "select * from college_course_name where college_id='$college_id'";
	$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
	$found_data1 = mysqli_num_rows($qr1);
	
	$q1 = "select * from college_course_name_branch where college_id='$college_id'";
	$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
	$found_data2 = mysqli_num_rows($qr1);
	if($found_data1 AND $found_data1)
	{
		$sql1="select * from college_data 
		INNER JOIN district_data ON college_data.district1 = district_data.district_id 
		INNER JOIN state_data ON college_data.state1 = state_data.state_id 
		INNER JOIN country_data ON college_data.country1 = country_data.country_id  
		where c_id = '$college_id'";
		$qr1=mysqli_query($conn, $sql1) or die($sql1.mysqli_error($conn));
		$r1=mysqli_fetch_object($qr1);
		$college_name=$r1->college_name;
		$district_id=$r1->district_id;
		$district_name=$r1->district_name;
		$ownership_id=$r1->college_ownership;
		  $sql2="select * from ownership_data where ownership_id  ='$ownership_id'";
		  $qr2=mysqli_query($conn, $sql2) or die($sql2.mysqli_error($conn));
		  $r2=mysqli_fetch_object($qr2);
		  $ownership_name=$r2->ownership_name ;  
		$college_type=$r1->college_type;
		$address=$r1->address1;
		$college_estd=$r1->college_estd;
		$state_id=$r1->state_id;		
		$statename=$r1->statename;		
		$country_id =$r1->country_id ;		
		$country_name=$r1->name;		
		$college_seo_url=$r1->college_seo_url;		
		$college_logo=$r1->college_logo;		
		$college_icon=$r1->college_icon;		
		$college_banner=$r1->college_banner;		
		$college_brochure=$r1->college_brochure;		
		
	$q = "delete from college_approved_data where college_id = 
	'$college_id' AND branch_id =''";
	mysqli_query($conn, $q);
		
	$q1="select * from college_course_name where college_id ='$college_id'";
	$qr1=mysqli_query($conn, $q1) or die($q1.mysqli_error($conn));
	while($r1=mysqli_fetch_object($qr1))
	  { 
		$stream_id=$r1->stream_id ;	
		$stream_name=$r1->stream_name ;
		$course_id=$r1->course_id ;	
		$course_name=$r1->course_name ; 
		$q = "insert into college_approved_data values(null,'$college_id','$college_estd','$college_type','$college_name','$ownership_id','$ownership_name','$college_seo_url','$address','$country_id','$country_name','$state_id','$statename','$district_id','$district_name','$stream_id','$stream_name','$course_id','$course_name','$branch_id','$branch_name','$college_logo','$college_icon','$college_banner','$college_brochure','','','','' )";
		mysqli_query($conn, $q);
	  } 
	
		$q = "delete from college_approved_data  where college_id ='$college_id' AND branch_id !=''";
		mysqli_query($conn, $q); 
		$sql1="select * from college_course_name_branch  where college_id ='$college_id'";
		$qr1=mysqli_query($conn, $sql1) or die($sql1.mysqli_error($conn));
		while($r1=mysqli_fetch_object($qr1))
		{
			$stream_id=$r1->stream_id ;	
			$stream_name=$r1->stream_name ;
			$course_id=$r1->course_id ;	
			$course_name=$r1->course_name ;
			$branch_id=$r1->branch_id ;
			$branch_name=$r1->branch_name ;			
			
			$q = "insert into college_approved_data values(null,'$college_id','$college_estd','$college_type','$college_name','$ownership_id','$ownership_name','$college_seo_url','$address','$country_id','$country_name','$state_id','$statename','$district_id','$district_name','$stream_id','$stream_name','$course_id','$course_name','$branch_id','$branch_name','$college_logo','$college_icon','$college_banner','$college_brochure','','','','' )";
			mysqli_query($conn, $q);
		}
			echo "<script>alert('Added Suscessfully.');</script>";
			echo "<form action=College-View.php method=post name=main></form>
			<script>document.main.submit(); </script>";	
	}
	else
	{
		echo "<script>alert('Something Wrong. Add some Course data.');</script>";
		echo "<form action=College-View.php method=post name=main></form>
		<script>document.main.submit(); </script>";	
	}
 	
}
?>
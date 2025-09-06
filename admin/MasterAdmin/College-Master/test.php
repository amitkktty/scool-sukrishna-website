<?php include_once('dbconnect.php');   

$sql1="select * from college_data";
$qr1=mysqli_query($conn, $sql1) or die($sql1.mysqli_error($conn));
while($r1=mysqli_fetch_object($qr1))
{ 
$college_id = $r1->c_id; 
$college_name = $r1->college_name; 
$college_seo_url  = $r1->college_seo_url ; 
$ex_title  = '' ; 
$ex_details  ='' ;   


$college_name = mysqli_real_escape_string($conn, $college_name);
$college_seo_url = mysqli_real_escape_string($conn, $college_seo_url);
$q3 = "insert into college_data_extra values(null,'$college_id','$college_name','$college_seo_url ','$ex_title','$ex_details','$currentdt','','','','')";
if (!mysqli_query($conn, $q3)) 
{
$message = "Error description:  " . $q3 . "<br>" . mysqli_error($conn);
echo $message;
} 
}
 echo 'all done';

?>	

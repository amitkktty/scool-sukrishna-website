<?php
include_once ('dbconnect.php');  
$course_type_id= $_POST['course_type_id']; 
$stream_id= $_POST['stream_id']; 
?>  
<option value="">-- Select --</option>
<?php
$q10="select * from course_name where stream_id = $stream_id AND course_type_id=$course_type_id order by course_name";
$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
while($r10=mysqli_fetch_object($qr10))
{ 
$course_id1=$r10->course_id   ;
$course_name=$r10->course_name ;
echo '<option value="'.$course_id1.'">'.$course_name.'</option>';
}
?>

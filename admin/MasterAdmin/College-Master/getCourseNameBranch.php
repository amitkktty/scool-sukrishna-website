<?php
include_once ('dbconnect.php');  
$course_type_id= $_POST['course_type_id']; 
$stream_id= $_POST['stream_id']; 
$coursename_id= $_POST['coursename_id']; 
?>  
<option value="">-- Select --</option>
<?php
$q10="select * from course_name_branch where stream_id = '$stream_id' AND course_type_id='$course_type_id' AND course_name_id='$coursename_id' order by course_branch_name";
$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
while($r10=mysqli_fetch_object($qr10))
{ 
$course_branch_id1=$r10->course_branch_id   ;
$course_branch_name1=$r10->course_branch_name ;
echo '<option value="'.$course_branch_id1.'">'.$course_branch_name1.'</option>';
}
?>

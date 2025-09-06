<?php
$page = 'test'; $innerpage = 'test';
include_once('Master-Header.php');
$test_id =$_GET['id'];
if(empty($test_id  ))
{ 
  echo "<script>window.location.href='view-test';</script>";
}
else
{
	$sql="select * from test where test_id  =$test_id";
	$sql_qr=mysqli_query($conn, $sql);
	$res=mysqli_fetch_object($sql_qr);
	$found_data=mysqli_num_rows($sql_qr);
	if($found_data <> 1)
	 echo "<script>window.location.href='view-test';</script>";
}
if (isset($_POST['submit'])) {
	
	
		$title = mysqli_real_escape_string($conn, $_POST['title']);
	  
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$link = mysqli_real_escape_string($conn, $_POST['link']);
		
		$date=date('Y-m-d');
        
        if($_FILES["image"]["name"])
        {
		$name = $_FILES["image"]["name"];
        $tmp = $_FILES["image"]["tmp_name"];
        
                 
                
                $upload_dir = "Images/";
                 
            $pre = time();
            $name = $pre. $_FILES['image']['name'];

            $image = $upload_dir.$name;
                        move_uploaded_file($tmp, $image);
    $q = "update test set title = '$title',description='$description',link='$link',date='$date',image='$image' where test_id  =$test_id";                    

        }
        else
        {
		
		$q = "update test set title = '$title',description='$description',link='$link',date='$date' where test_id  =$test_id";
	}
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		} else {
			echo "<script>Swal.fire(  'Success!', 'Your record update successfully!','success' )	.then(function() {window.location = 'view-test';	});	</script>";
		}
	}


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section>
        <div class="container-fluid text-uppercase ">
            <div class="row bg-white p-2"
                style='box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;'>
                <div>
                    <i class="fa fa-database text-danger fa-3x pl-1 pr-3" aria-hidden="true"></i>
                </div>
                <div>
                    <h3 class='bold text-danger'> Master Data
                        <h6 class='text-primary bold mt-n3'>Ownership</h6>
                    </h3>
                </div>
            </div><br>
        </div>


        <div class="container-fluid px-4 ">
            <div class="col-md-10 mx-auto p-3 bg-white"
                style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>

                <div>
                    <form action="test-modify?id=<?php echo $test_id ;?>" method="POST" enctype="multipart/form-data">
				<div class="row bold">
				
				  <div class="col-md-6 my-2	">Title* :  
				  
				  <input type="text" class='form-control form-control-sm'  required='' value='<?php echo $res->title;?>' name='title' onkeyup='checkName(this.form)'/>				  
				  </div>
				   
				   <div class="col-md-6 my-2	">Image Upload* :  
				  
				  <input type="file" class='form-control form-control-sm'  name='image' />				  
				  </div>
				  
				  
				  <div class="col-md-12 my-2">News Description* :   
				  <textarea name="description" id='editor' class='form-control form-control-sm' rows="5"  ><?php echo $res->description;?></textarea>			  
				  </div>
				   <div class="col-md-12 my-2	">Link :  
				   
				  <input type="text" class='form-control form-control-sm' value='<?php echo $res->link;?>' name='link' onkeyup='checkName(this.form)'/>				  
				  </div>
				   
				  
				  
				  <div class="col-md-12 my-2 text-center"> 
					
					<input type="submit" value='Update' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/>
					<a href='Course-Name-Branch-Add' class="bold btn btn-sm bg-info px-3 mx-2">Reset </a>
				  </div>				  
				</div>			
			</form>
                </div>
                <table id="myTable" class='table table-sm table-bordered small bold'>
                    <thead>
				<tr>
				<th width="7%" class='text-center'>#</th>
				<th>Title</th>
				<th>Image</th> 
				<th>Description</th> 
				<th width="10%" class='text-center'>Link</th>  
				<th width="20%" class='text-center'>Action</th>
				</tr>
			 </thead>
                    <?php
					$sn = 1;
					$q1 = "select * from test where test_id='$test_id'";
					$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
					while ($r1 = mysqli_fetch_object($qr1)) 
					{
						
					?>
                    <tr class="header">
			<td class='text-center'><?php echo $sn;?></td>
				<td><?php echo $r1->title;?></td>
				<td><?php if(empty($r1->image)){ } else { ?><img src="<?php echo $r1->image; ?>" class="img-thumbnail" style="width:20%" /><?php } ?></td>
				<td><?php echo $r1->description;?></td>
				<td><a href="<?php echo $r1->link;?>" target="_blank"><?php echo $r1->link;?></a></td>
				
				<td class='text-center'><a href="test-modify?id=<?php echo $t1->test_id;?>" class='badge badge-primary p-2 px-3'><i class="fa fa-edit" aria-hidden="true"></i></a> <a href="view-test?dele=<?php echo $r1->test_id;?>" onclick="return confirm('Are you sure ?')" class='badge badge-danger p-2 px-3'><i class="fa fa-trash" aria-hidden="true"></i></a></td> 
			</tr>

                    <?php
						$sn++;
					}
					?>
                </table>
            </div>
        </div>
    </section>
</div>
<script>
function chechName(f) 
{
document.getElementById("err").style.display = "none";
}
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>  
<script>

ClassicEditor
	.create( document.querySelector( '#editor' ) )
	.catch( error => {
		console.error( error );
	} );
			

</script>
<?php include_once('Master-Footer.php'); ?>
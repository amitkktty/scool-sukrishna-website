<?php 
$page='news'; $innerpage='news';
include_once('Master-Header.php');
$news_id=$_REQUEST['id'];
if (isset($_POST['submit'])) 
{
	
	  $category = mysqli_real_escape_string($conn, $_POST['category']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
	  
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$pdate = $_POST['date'];
		$date = date('Y-m-d');
		if($_FILES["image"]["name"])
		{
			$name = $_FILES["image"]["name"];
        $tmp = $_FILES["image"]["tmp_name"];
        
                 
                
                $upload_dir = "Images/";
                 
            $pre = time();
            $name = $pre. $_FILES['image']['name'];

            $image = $upload_dir.$name;
                        move_uploaded_file($tmp, $image);

    $q = "update news set category='$category',title='$title',description='$description',pdate='$pdate',date='$date',image='$image' where news_id='$news_id'";
		}
		else
		{
		
		$q = "update news set category='$category',title='$title',description='$description',pdate='$pdate',date='$date' where news_id='$news_id'";
	}
		//$q = "insert into news(category,title,description,pdate,date)values('$category','$title','$description','$pdate','$date')";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		}
		else
		{
		
			
		 	echo "<script>Swal.fire(
				  'Success!',
				  'Your record update successfully!',
				  'success'
				)
				.then(function() {
				window.location = 'news-list';
				});			
				</script>";   
		} 
	  		
		
} 
?>
<?php
$sql=mysqli_query($conn,"select * from news where news_id='$news_id'");
$row=mysqli_fetch_object($sql);

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section >
      <div class="container-fluid text-uppercase ">
	   <div class="row bg-white p-2" style='box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;'>
	    <div>
		  <i class="fa fa-database text-danger fa-3x pl-1 pr-3" aria-hidden="true"></i> 
		</div>
	    <div>
		  <h3 class='bold text-danger'> News Master 
		  <h6 class='text-primary bold mt-n3'>News</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>		
			<div class='container-fluid '>
			 <div class="row bold pb-2">
				<div class="col-6"> <a href="news" class='bg-info px-3 ml-n2 py-1 rounded sd-1'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Create News </a>
				</div>
				<div class="col-6 text-right"> <a href="news-list" class='bg-info px-3 mr-n2 py-1 rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> News List </a>
				</div>
			  </div>
			</div> 
			
			<div>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="row bold">

					 <div class="col-md-6 my-2	">News Category* :  
				  
				  <select class="form-control" name="category" required>
				  	<option value="<?php echo $row->category;?>"><?php echo $row->category;?></option>
				  	<option value="Academic Information">Academic Information</option>
				  	<option value="Events News">Events News</option>
				  	<option value="Latest News">Latest News</option>
				  	
				  </select>			  
				  </div>
				<div class="col-md-6 my-2	">Image Upload* :  
				  
				  <input type="file" class='form-control form-control-sm'  name='image' />				  
				  </div>
				  <div class="col-md-12 my-2	">News Title* :  
				  
				  <input type="text" class='form-control form-control-sm'  required='' value="<?php echo $row->title;?>"  name='title' />				  
				  </div>
				   
				  
				  
				  
				  <div class="col-md-12 my-2">News Description* :   
				  <textarea name="description" id='editor' class='form-control form-control-sm' rows="5"  ><?php echo $row->description;?></textarea>			  
				  </div>
				   <div class="col-md-4 my-2	">Date :  
				   
				  <input type="date" class='form-control form-control-sm' value="<?php echo $row->pdate;?>"  name='date' />				  
				  </div>
				   
				  
				  
				  <div class="col-md-12 my-2 text-center"> 
					
					<input type="submit" value='Update' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/>
					
				  </div>				  
				</div>			
			</form>
			
			
			</div>		 
		</div>
      </div>	  
    </section> 
  </div>
 <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>  
<script>

ClassicEditor
	.create( document.querySelector( '#editor' ) )
	.catch( error => {
		console.error( error );
	} );
			

</script>
<?php include_once('Master-Footer.php');?>
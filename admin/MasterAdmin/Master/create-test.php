<?php 
$page='test'; $innerpage='test';
include_once('Master-Header.php');
if (isset($_POST['submit'])) 
{
	
	
	
	  
		$title = mysqli_real_escape_string($conn, $_POST['title']);
	  
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$link = mysqli_real_escape_string($conn, $_POST['link']);
		
		$date=date('Y-m-d');
		$name = $_FILES["image"]["name"];
        $tmp = $_FILES["image"]["tmp_name"];
        
                 
                
                $upload_dir = "Images/";
                 
            $pre = time();
            $name = $pre. $_FILES['image']['name'];

            $image = $upload_dir.$name;
                        move_uploaded_file($tmp, $image);
		
		$q = "insert into test(title,description,link,image,date)values('$title','$description','$link','$image','$date')";
		if (!mysqli_query($conn, $q)) 
		{
			$message = "Error description:  " . $q . "<br>" . mysqli_error($conn);
			echo $message;
		}
		else
		{
		
			
		 	echo "<script>Swal.fire(
				  'Success!',
				  'Your record saved successfully!',
				  'success'
				)
				.then(function() {
				window.location = 'create-test';
				});			
				</script>";   
		} 
	  		
		
} 
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
		  <h3 class='bold text-danger'> General Test 
		  <h6 class='text-primary bold mt-n3'>Create Test</h6></h3>
		</div>	   
	   </div><br>		
      </div>
	  
	  
	  <div class="container-fluid px-4 ">
        <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>		
			<div class='container-fluid '>
			 <div class="row bold pb-2">
				<div class="col-6"> <a href="create-test" class='bg-info px-3 ml-n2 py-1 rounded sd-1'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Create Test </a>
				</div>
				<div class="col-6 text-right"> <a href="view-test" class='bg-info px-3 mr-n2 py-1 rounded sd-1'>
				<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> View Test </a>
				</div>
			  </div>
			</div> 
			
			<div>
			<form action="create-test" method="POST" enctype="multipart/form-data">
				<div class="row bold">
				
				  <div class="col-md-6 my-2	">Title* :  
				  
				  <input type="text" class='form-control form-control-sm'  required=''  name='title' />				  
				  </div>
				   
				   <div class="col-md-6 my-2	">Image Upload* :  
				  
				  <input type="file" class='form-control form-control-sm'  name='image' />				  
				  </div>
				  
				  
				  <div class="col-md-12 my-2">News Description* :   
				  <textarea name="description" id='editor' class='form-control form-control-sm' rows="5"  ></textarea>			  
				  </div>
				   <div class="col-md-12 my-2	">Link :  
				   
				  <input type="text" class='form-control form-control-sm'  name='link' />				  
				  </div>
				   
				  
				  
				  <div class="col-md-12 my-2 text-center"> 
					
					<input type="submit" value='Submit' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/>
					
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
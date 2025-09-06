<?php
$page = 'slider'; $innerpage = 'slider';
include_once('Master-Header.php');
$slider_id=$_REQUEST['id'];
if (isset($_POST['submit'])) {
	
 $link = mysqli_real_escape_string($conn,$_POST['link']);
   
    $name = $_FILES["image"]["name"];
        $tmp = $_FILES["image"]["tmp_name"];
        
                 
                
                $upload_dir = "Images/";
                 list($width, $height) = getimagesize($tmp);
                  
                    if($width=="2133" && $height=="792" ){
            $pre = time();
            $name = $pre. $_FILES['image']['name'];

            $image = $upload_dir.$name;
                        move_uploaded_file($tmp, $image);
                        
                        $sql="update slider set image='$image',link='$link' where slider_id='$slider_id'";
                        $rs=mysqli_query($conn,$sql)or die("Error in Inserting brand Query: ".mysqli_error($conn));
                         }
                else{ ?>
                    <script>
                        alert('please upload image dimension 2133px x 792px!');
    
</script>
              <?php  }
               
 
    
    
                         if($rs){ ?>
        <script>
            alert(' Update successfully !');
            window.location.href="slider.php";
            </script>
                             
                         <?php  } 
	
		
	}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section>
        <div class="container-fluid text-uppercase">
            <div class="row bg-white p-2"
                style='box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;'>
                <div>
                    <i class="fa fa-database text-danger fa-3x pl-1 pr-3" aria-hidden="true"></i>
                </div>
                <div>
                    <h3 class='bold text-danger'> Slider
                        <h6 class='text-primary bold mt-n3'>Update Slider</h6>
                    </h3>
                </div>
            </div><br>
        </div>
  <?php
$slider_id=$_REQUEST['id'];

$sql=mysqli_query($conn,"select * from slider where slider_id='$slider_id'");
$res=mysqli_fetch_object($sql);

  ?>
        <div class="container-fluid px-4 ">
            <div class="col-md-8 mx-auto p-3 bg-white"
                style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>

                <div>
                    <form action="slider-modify?id=<?php echo $slider_id ;?>" method="POST" enctype="multipart/form-data">
                        <div class="row bold">
                            <div class="col-md-12">
                                Image Upload: (Image should be dimension 2133px x 792px)
                                
                            </div>
                            <div class="col-md-4 my-2">
                                <label>Image Upload: </label>
                                <input type="file" class='form-control form-control-sm' name='image'
                                    required />
                                    <span>(Image should be dimension 2133px x 792px)</span>
                            </div>
                            <div class="col-md-4 my-2">
                                <label>Link: </label>
                                <input type="text" class='form-control form-control-sm' name='link' value="<?php echo $res->link;?>" 
                                     />
                            </div>
                            <div class="col-md-4 my-2 text-center">
                                <input type="submit" value='Upload' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3' />
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                if(isset($_REQUEST['dele']))
                {
                    $delc = $_REQUEST['dele'];
                    $delQ = "DELETE FROM `slider` WHERE `slider_id` = $delc";
                    mysqli_query($conn, $delQ);
                    header("location: slider");
                } ?>
                <table id="myTable" class='table table-sm table-bordered small bold'>
                    <tr class="header bg-teal">
                        <th width='5%'>#</th>
                        <th>Image</th>
                        <th>Link</th>
                        <th width='35%' class='text-center'>Action</th>
                    </tr>
                    <?php
					$sn = 1;
					$q1 = "select * from slider where slider_id='$slider_id'";
					$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
					while ($r1 = mysqli_fetch_object($qr1)) {
						
					?>
                    <tr class="header">
                        <td><?php echo $sn; ?></td>
                        <td><img src="<?php echo $r1->image; ?>" style="width:40%" /></td>
                        <td><?php echo $r1->link;?></td>

                        <td class='text-center'><a href="slider-modify?id=<?php echo $r1->slider_id; ?>"
                                class='badge badge-primary p-2 px-3'><i class="fa fa-edit" aria-hidden="true"></i></a>
                            <a href="slider?dele=<?php echo $r1->slider_id;?>" onclick="return confirm('Are you sure ?')" class='badge badge-danger p-2 px-3'><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>

                    <?php
						$sn++;
					}
					?>
                </table>
            </div>
        </div>
    </section><br><br><br>
</div>
<script>
function checkName(f) {
    var courseTypeName = f.course_type_name.value; 
    if (courseTypeName) {
        $.ajax({
            type: 'post',
            url: 'courseTypeCheck.php',
            data: {
                course_type_name: courseTypeName,
            },
            success: function(response) {
                $('#err').html(response);
            }
        });
    }
}
</script>
<?php include_once('Master-Footer.php'); ?>
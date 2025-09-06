<?php
$page = 'gallery'; $innerpage = 'gallery';
include_once('Master-Header.php');
$video_id = $_REQUEST['id'];
if (isset($_POST['submit'])) {
	
 $category = mysqli_real_escape_string($conn,$_POST['category']);
   
 $url = mysqli_real_escape_string($conn,$_POST['url']);   
                        
                        $sql="update video set category_name='$category',url='$url' where video_id='$video_id'";
                        $rs=mysqli_query($conn,$sql)or die("Error in Inserting brand Query: ".mysqli_error($conn));
                         }
                
               
 
    
    
                         if($rs){ ?>
        <script>
            alert(' Updation successfully !');
            window.location.href="video";
            </script>
                             
                         <?php  } 

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
                    <h3 class='bold text-danger'> Gallery
                        <h6 class='text-primary bold mt-n3'>Video</h6>
                    </h3>
                </div>
            </div><br>
        </div>
<?php
$video_id = $_REQUEST['id'];

$sql=mysqli_query($conn,"select * from video where video_id='$video_id'");

$res=mysqli_fetch_object($sql);

?>
        <div class="container-fluid px-4 ">
            <div class="col-md-8 mx-auto p-3 bg-white"
                style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>

                <div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row bold">
                        	<div class="col-md-4 my-2">
                            	<label>Select Category : </label>
                               <select class="form-control" name="category" required >
                                  <option value="<?php echo $res->category_name;?>"><?php echo $res->category_name;?></option>
                                  <?php
                                $sql=mysqli_query($conn,"select * from category");
                                while($row=mysqli_fetch_object($sql))
                                {
                                  ?>
                                  <option value="<?php echo $row->category_name;?>"><?php echo $row->category_name;?></option> 
                              <?php } ?>
                               </select>
                            </div>
                            
                            <div class="col-md-4 my-2">
                            	<label>Youtube URL : </label>
                                <input type="text" class='form-control form-control-sm' name='url' value="<?php echo $res->url;?>"
                                    required />
                            </div>
                            <div class="col-md-4 my-2 text-center">
                                <input type="submit" value='Submit' name='submit' class='mx-2 mt-4 bold  btn btn-sm bg-info px-3' />
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                if(isset($_REQUEST['dele']))
                {
                    $delc = $_REQUEST['dele'];
                    $delQ = "DELETE FROM `video` WHERE `video_id` = $delc";
                    mysqli_query($conn, $delQ);
                    header("location: video");
                } ?>
                <table id="myTable" class='table table-sm table-bordered small bold'>
                    <tr class="header bg-teal">
                        <th width='5%'>#</th>
                        <th>Category</th>
                        <th>Video</th>
                        <th width='35%' class='text-center'>Action</th>
                    </tr>
                    <?php
					$sn = 1;
					$q1 = "select * from video where video_id='$video_id'";
					$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
					while ($r1 = mysqli_fetch_object($qr1)) {
						
					?>
                    <tr class="header">
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $r1->category_name; ?></td>
                        <td><?php $videolink = $r1->url; 
                                            $ytarray=explode("/", $videolink);
$ytendstring=end($ytarray);
$ytendarray=explode("?v=", $ytendstring);
$ytendstring=end($ytendarray);
$ytendarray=explode("&", $ytendstring);
$ytcode=$ytendarray[0]; ?>
<iframe width="255" height="170" src="https://www.youtube.com/embed/<?php echo $ytcode; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>

                        <td class='text-center'><a href="video-modify?id=<?php echo $r1->video_id; ?>"
                                class='badge badge-primary p-2 px-3'><i class="fa fa-edit" aria-hidden="true"></i></a>
                            <a href="video?dele=<?php echo $r1->video_id;?>" onclick="return confirm('Are you sure ?')" class='badge badge-danger p-2 px-3'><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<?php
$page = 'snews'; $innerpage = 'snews';
include_once('Master-Header.php');
$id=$_REQUEST['id'];
if (isset($_POST['submit'])) {
$id=$_REQUEST['id'];	
 $title = mysqli_real_escape_string($conn,$_POST['title']);
 
 $link = mysqli_real_escape_string($conn,$_POST['link']);
   
    
                        $sql="update scrollnews set title='$title',link='$link' where id='$id'";
                        
                        $rs=mysqli_query($conn,$sql)or die("Error in Updating brand Query: ".mysqli_error($conn));
                         }
                
               
 
    
    
                         if($rs){ ?>
        <script>
            alert(' Update successfully !');
            window.location.href="scrollnews";
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
                    <h3 class='bold text-danger'> Scroll News
                        <h6 class='text-primary bold mt-n3'>Scroll News</h6>
                    </h3>
                </div>
            </div><br>
        </div>

        <div class="container-fluid px-4 ">
            <div class="col-md-8 mx-auto p-3 bg-white"
                style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
<?php
$sql=mysqli_query($conn,"select * from scrollnews where id='$id'");
$row=mysqli_fetch_object($sql);
?>
                <div>
                    <form action="scrollnews-modify?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
                        <div class="row bold">
                        	<div class="col-md-4 my-2">
                            	<label>Title : </label>
                                <input type="text" class='form-control form-control-sm' name='title' value="<?php echo $row->title;?>"
                                    required />
                            </div>
                            
                            <div class="col-md-4 my-2">
                            	<label>Url link : </label>
                                <input type="text" class='form-control form-control-sm' name='link' value="<?php echo $row->link;?>"
                                    />
                            </div>
                            <div class="col-md-4 my-2 text-center">
                                <input type="submit" value='Update' name='submit' class='mx-2 mt-4 bold  btn btn-sm bg-info px-3' />
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </section><br><br><br>
</div>

<?php include_once('Master-Footer.php'); ?>
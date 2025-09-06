<?php
$page = 'snews'; $innerpage = 'snews';
include_once('Master-Header.php');
if (isset($_POST['submit'])) {
	
 $title = mysqli_real_escape_string($conn,$_POST['title']);
 
 $link = mysqli_real_escape_string($conn,$_POST['link']);
   
    
                        
                        $sql="insert into scrollnews(title,link)values('$title','$link')";
                        $rs=mysqli_query($conn,$sql)or die("Error in Inserting brand Query: ".mysqli_error($conn));
                         }
                
               
 
    
    
                         if($rs){ ?>
        <script>
            alert(' Thanks insert successfully !');
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

                <div>
                    <form action="scrollnews" method="POST" enctype="multipart/form-data">
                        <div class="row bold">
                        	<div class="col-md-4 my-2">
                            	<label>Title : </label>
                                <input type="text" class='form-control form-control-sm' name='title'
                                    required />
                            </div>
                            
                            <div class="col-md-4 my-2">
                            	<label>Url link : </label>
                                <input type="text" class='form-control form-control-sm' name='link'
                                    />
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
                    $delQ = "DELETE FROM `scrollnews` WHERE `id` = $delc";
                    mysqli_query($conn, $delQ);
                    header("location: scrollnews");
                } ?>
                <table id="myTable" class='table table-sm table-bordered small bold'>
                    <tr class="header bg-teal">
                        <th width='5%'>#</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th width='35%' class='text-center'>Action</th>
                    </tr>
                    <?php
					$sn = 1;
					$q1 = "select * from scrollnews order by id";
					$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
					while ($r1 = mysqli_fetch_object($qr1)) {
						
					?>
                    <tr class="header">
                        <td><?php echo $sn; ?></td>
                        <td><?php if($r1->link==NULL){ ?><a href=""><?php echo $r1->title; ?></a> <?php } else { ?><a href="<?php echo $r1->link; ?>" target="_blank"><?php echo $r1->title; ?></a><?php } ?></td>
                        <td><?php echo $r1->link; ?></td>

                        <td class='text-center'><a href="scrollnews-modify?id=<?php echo $r1->id; ?>"
                                class='badge badge-primary p-2 px-3'><i class="fa fa-edit" aria-hidden="true"></i></a>
                            <a href="scrollnews?dele=<?php echo $r1->id;?>" onclick="return confirm('Are you sure ?')" class='badge badge-danger p-2 px-3'><i class="fa fa-trash" aria-hidden="true"></i></a>
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

<?php include_once('Master-Footer.php'); ?>
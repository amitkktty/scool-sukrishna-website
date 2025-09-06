<?php
$page = 'result'; $innerpage = 'result';
include_once('Master-Header.php');
$year_id=$_REQUEST['id'];
if (isset($_POST['submit'])) {
	
 $year = mysqli_real_escape_string($conn,$_POST['year']);
  
                      $sql="update year set year='$year' where year_id='$year_id'";  
             
                        
                        $rs=mysqli_query($conn,$sql)or die("Error in Inserting brand Query: ".mysqli_error($conn));
                         
                
               
 
    
    
                         if($rs){ ?>
        <script>
            alert(' Update successfully !');
            window.location.href="resultcat";
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
                    <h3 class='bold text-danger'>Result Master
                        <h6 class='text-primary bold mt-n3'>Year</h6>
                    </h3>
                </div>
            </div><br>
        </div>
       
       <?php
                
                    $q1 = "select * from year where year_id='$year_id'";
                    $qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
                    $r1 = mysqli_fetch_object($qr1) ?>

        <div class="container-fluid px-4 ">
            <div class="col-md-8 mx-auto p-3 bg-white"
                style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>

                <div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row bold">
                        	<div class="col-md-8 my-2">
                            	<label>Year : </label>
                                <input type="text" value="<?php echo $r1->year;?>" class='form-control form-control-sm' name='year'
                                    required />
                            </div>
                            
                            
                            <div class="col-md-4 my-2 text-center">
                                <input type="submit" value='Update' name='submit' class='mx-2 mt-4 bold  btn btn-sm bg-info px-3' />
                            </div>
                        </div>
                    </form>
                </div>
                
                <table id="myTable" class='table table-sm table-bordered small bold'>
                    <tr class="header bg-teal">
                        <th width='5%'>#</th>
                        <th>Year</th>
                        
                        <th width='35%' class='text-center'>Action</th>
                    </tr>
                    <?php
					$sn = 1;
					$q1 = "select * from year where year_id='$year_id'";
					$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
					while ($r1 = mysqli_fetch_object($qr1)) {
						
					?>
                    <tr class="header">
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $r1->year; ?></td>
                        

                        <td class='text-center'><a href="year-modify?id=<?php echo $r1->year_id; ?>"
                                class='badge badge-primary p-2 px-3'><i class="fa fa-edit" aria-hidden="true"></i></a>
                           
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
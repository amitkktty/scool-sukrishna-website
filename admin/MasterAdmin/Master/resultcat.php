<?php
$page = 'result'; $innerpage = 'result';
include_once('Master-Header.php');
if (isset($_POST['course'])) {
	
 $cname=mysqli_real_escape_string($conn,$_POST['cname']);
                        
                        $sql="insert into course(course)values('$cname')";
                        $rs=mysqli_query($conn,$sql)or die("Error in Inserting brand Query: ".mysqli_error($conn));
                         
                
               
 
    
    
                         if($rs){ ?>
        <script>
            alert(' Thanks insert successfully !');
            window.location.href="resultcat";
            </script>
                             
                         <?php  } 
                     }


if (isset($_POST['years'])) {
    
 $year=mysqli_real_escape_string($conn,$_POST['year']);
                        
                        $sql="insert into year(year)values('$year')";
                        $rs=mysqli_query($conn,$sql)or die("Error in Inserting brand Query: ".mysqli_error($conn));
                         
                
               
 
    
    
                         if($rs){ ?>
        <script>
            alert(' Thanks insert successfully !');
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
                    <h3 class='bold text-danger'> Result Master
                        <h6 class='text-primary bold mt-n3'>Category/Year</h6>
                    </h3>
                </div>
            </div><br>
        </div>

        <div class="container-fluid">
            <div class="row">
            <div class="col-md-6 bg-white"
                style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>

                <div>
                    <h5 style="background-color: #203c55;color: #fff;padding:4px"><i class="fa fa-list"></i>&nbsp;Course Master</h5>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row bold">
                        	<div class="col-md-8 my-2">
                            	<label>Course Name : </label>
                                <input type="text" class='form-control form-control-sm' name='cname'
                                    required />
                            </div>
                            
                            
                            <div class="col-md-4 my-2 text-center">
                                <input type="submit" value='Submit' name='course' class='mx-2 mt-4 bold  btn btn-sm bg-info px-3' />
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                if(isset($_REQUEST['delec']))
                {
                    $delc = $_REQUEST['delec'];
                    $delQ = "DELETE FROM `course` WHERE `course_id` = $delc";
                    mysqli_query($conn, $delQ);
                    header("location: resultcat");
                } ?>
                <table id="myTable" class='table table-sm table-bordered small bold'>
                    <tr class="header bg-teal">
                        <th width='5%'>#</th>
                        <th>Course</th>
                       
                        <th width='35%' class='text-center'>Action</th>
                    </tr>
                    <?php
					$sn = 1;
					$q1 = "select * from course order by course_id";
					$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
					while ($r1 = mysqli_fetch_object($qr1)) {
						
					?>
                    <tr class="header">
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $r1->course; ?></td>
                       

                        <td class='text-center'><a href="course-modify?id=<?php echo $r1->course_id; ?>"
                                class='badge badge-primary p-2 px-3'><i class="fa fa-edit" aria-hidden="true"></i></a>
                            <a href="resultcat?delec=<?php echo $r1->course_id;?>" onclick="return confirm('Are you sure ?')" class='badge badge-danger p-2 px-3'><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>

                    <?php
						$sn++;
					}
					?>
                </table>
            </div>

             <div class="col-md-6 bg-white"
                style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>

                <div>
                    <h5 style="background-color: #203c55;color: #fff;padding:4px"><i class="fa fa-list"></i>&nbsp;Year Master</h5>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row bold">
                            <div class="col-md-8 my-2">
                                <label>Year : </label>
                                <input type="text" class='form-control form-control-sm' name='year'
                                    required />
                            </div>
                            
                            
                            <div class="col-md-4 my-2 text-center">
                                <input type="submit" value='Submit' name='years' class='mx-2 mt-4 bold  btn btn-sm bg-info px-3' />
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                if(isset($_REQUEST['deley']))
                {
                    $delc = $_REQUEST['deley'];
                    $delQ = "DELETE FROM `year` WHERE `year_id` = $delc";
                    mysqli_query($conn, $delQ);
                    header("location: resultcat");
                } ?>
                <table id="myTable" class='table table-sm table-bordered small bold'>
                    <tr class="header bg-teal">
                        <th width='5%'>#</th>
                        <th>Year</th>
                        
                        <th width='35%' class='text-center'>Action</th>
                    </tr>
                    <?php
                    $sn = 1;
                    $q1 = "select * from year order by year_id";
                    $qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
                    while ($r1 = mysqli_fetch_object($qr1)) {
                        
                    ?>
                    <tr class="header">
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $r1->year; ?></td>
                        

                        <td class='text-center'><a href="year-modify?id=<?php echo $r1->year_id; ?>"
                                class='badge badge-primary p-2 px-3'><i class="fa fa-edit" aria-hidden="true"></i></a>
                            <a href="resultcat?deley=<?php echo $r1->year_id;?>" onclick="return confirm('Are you sure ?')" class='badge badge-danger p-2 px-3'><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>

                    <?php
                        $sn++;
                    }
                    ?>
                </table>
            </div>
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
<?php
$page = 'college';
$innerpage = 'collegeview';
include_once('Master-Header.php');
$college_name = $_SESSION['college_name'];
$_SESSION['backlink'] = 'College-View';
?>

<div class="content-wrapper">
	<section>
		<div class="container-fluid text-uppercase ">
			<div class="row bg-white p-2" style='box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;'>
				<div>
					<i class="fa fa-database text-danger fa-3x pl-1 pr-3" aria-hidden="true"></i>
				</div>
				<div>
					<h3 class='bold text-danger'> College Master 
						<h6 class='text-primary bold mt-n3'>College View</h6>
					</h3>
				</div>
			</div><br>
		</div>


  <div class="container-fluid px-4 ">
	<div class="col-md-12 mx-auto p-3 bg-white sd-2" >
	  <div class='container-fluid '>
		<div class="row bold">
			<div class="col-6"> <a href="Add-College" class='bg-info px-3 ml-n2 py-1  rounded sd-1'>
					<i class="px-2 fa fa-plus" aria-hidden="true"></i> Add Record </a>
			</div>
			<div class="col-6 text-right"> <a href="College-List" class='bg-info px-3 mr-n2 py-1  rounded sd-1'>
					<i class="px-2 fa fa-list-ul" aria-hidden="true"></i> Record List </a>
			</div>
		</div>
	</div>

	<div> 
			<div class="row bold">
				<div class="col-md-12 my-2">College Name * : <?php echo $errors[college_name]; ?>
					<select required='' id='college_name' name="college_name" onchange='setCollege(this.value)' class='form-control form-control-sm chosen-select py-2'>
						<option value="">-- Select --</option>
						<?php
						$q10 = "select * from college_data order by college_name ";
						$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
						while ($r10 = mysqli_fetch_object($qr10)) {
							$c_id  = $r10->c_id;
							$college_name1 = $r10->college_name;
						?>
							<option value=<?php echo $c_id; ?> <?php if ($college_name == $c_id) echo ' selected'; ?>>
								<?php echo $college_name1; ?>
							</option>
						<?php
						}
						?>
					</select>
				</div>
	<!-- ----------- Add Approved By ------------- -->
				<div class="col-md-12 my-2 bg-greenlight">
					<div class="row">
						<div class="col-md-6 pt-2">
							AVAILABLE APPROVED BY &nbsp;(<i class='fa fa-plus'></i>)
							<div class="my-2 bg-white border border-info approved_list" style='height:200px; overflow-y:auto; '>
								<table class='table table-sm bg-white'>
									<tr class='bg-cyanlight'>
										<td width="20%">#</td>
										<td>Approved Body Name</td>
										<td width="20%"></td>
									</tr>
									<?php
									$sn = 1;
									$q1 = "select * from approved_by order by approver_name";
									$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));

									while ($r1 = mysqli_fetch_object($qr1)) {
										$approver_id1  = $r1->approver_id;
										$approver_name1 = $r1->approver_name;
									?>
										<tr class="header">
											<td><?php echo $sn; ?></td>
											<td><?php echo $approver_name1; ?></td>
											<td><span class='btn-sm px-3 btn-outline-success btn' onclick='addAppvordData("<?php echo $approver_id1; ?>")'>Add  <i class="fa fa-angle-double-right ml-1" aria-hidden="true"> </i></span></td>
										</tr>
									<?php
										$sn++;
									}
									?>
								</table>
							</div>

						</div>
						<div class="col-md-6 pt-2">ADDED LIST <i class="fa fa-list" aria-hidden="true"></i>
							<div class="my-2 border border-info bg-white approved_list" style='height:200px; overflow-y:auto;'>
								<table class='table table-sm bg-white' id='approvedlist'>
									<tr class='bg-cyanlight'>
										<td width="20%">#</td>
										<td>Approved Body Name</td>
										<td width="20%">Action</td>
									</tr>
									<?php
									$sn = 1;
									$q1 = "select * from college_approved_by where college_id='$college_name' order by approved_name";
									$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
									$found_data = mysqli_num_rows($qr1);
									if ($found_data > 0) {
										while ($r1 = mysqli_fetch_object($qr1)) {
											$college_approved_id1  = $r1->college_approved_id;
											$approved_name1 = $r1->approved_name;
									?>
											<tr class="header">
												<td><?php echo $sn; ?></td>
												<td><?php echo $approved_name1; ?></td>
												<td><span onclick="deleteApprovedBy('<?php echo $college_approved_id1; ?>')" class=' btn btn-sm btn-outline-danger'><i class='fa fa-trash '></i></span></td>
											</tr>
									<?php
											$sn++;
										}
									}
									?>
								</table>
							</div>


						</div>
					</div>
				</div>
	<!-- ----------- Add Approved By End ------------- -->
			</div>
		</div>
	</div> 
    <br> 
<!-- ----------- Add Stream ------------- -->
   <div class="col-md-12 mx-auto p-3 bg-white sd-2" >
	<div class='container-fluid '>
		<div class='bold text-center bg-cyan col-md-12'><h4><?php if($_SESSION['college_name']); echo "College : ".$_SESSION['college_full_name'];?></h4>
		</div>

		<div class="row bold">
		<div class="col-md-5">
		ADD STREAM <span id='errSteram'></span>
		<div class="row">
		  <div class="col-8">
			<select required='' id='addStream' name="addStream" class='form-control form-control-sm'>
			<option value="">-- Select --</option>
			<?php
			$q10 = "select * from stream order by stream_name ";
			$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
			while ($r10 = mysqli_fetch_object($qr10)) {
				$stream_id   = $r10->stream_id ;
				$stream_name = $r10->stream_name;
			?>
				<option value="<?php echo $stream_id ; ?>" >
					<?php echo $stream_name; ?>
				</option>
			<?php
			}
			?>
			</select>
		  </div>
		  <div class="col-4 text-center">
			<span class='btn-sm px-3 btn-info bold btn' onclick='addStream()'>Add This</span>
		  
		  </div>
		</div>			
		<div class="my-2 bg-white border border-info approved_list" style='height:200px; overflow-y:auto; '>
				<table class='table table-sm bg-white' id='stream_list'>
					<tr class='bg-cyanlight'>
						<td width="20%">#</td>
						<td>Stream Name</td>
						<td width="20%"></td>
					</tr>
					<?php 
$sn = 1;
$q1 = "select * from college_stream where college_id='$college_name' order by stream_name";
$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
$found_data=mysqli_num_rows($qr1);
if($found_data > 0)
{
 while ($r1 = mysqli_fetch_object($qr1)) 
 {
	$college_stream_id2  = $r1->college_stream_id ;
	$stream_name2 = $r1->stream_name;
?>
<tr class="header">
	<td><?php echo $sn; ?></td> 
	<td><?php echo $stream_name2; ?></td>
	<td><span onclick="deleteStream('<?php echo $college_stream_id2;?>')" class=' btn btn-sm btn-outline-danger'><i class='fa fa-trash '></i></span></td>
</tr>
<?php
						$sn++;
					}
}
					?>
				</table>
		</div>

		</div>
		<div class="col-md-7">ADD COURSE
		  <div class="col-12 px-0">
			<select id='stream' name="addStream" class='form-control form-control-sm' onchange="getCourseName(this.value)">
			<option value="">-- Select Stream --</option>  
			<?php
			$q10 = "select * from college_stream where college_id='$college_name' order by stream_name";
			$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
			while ($r10 = mysqli_fetch_object($qr10)) {
				$stream_id   = $r10->stream_id ;
				$stream_name = $r10->stream_name;
			?>
				<option value="<?php echo $stream_id ; ?>" >
					<?php echo $stream_name; ?>
				</option>
			<?php
			}
			?> 
			</select>
		  </div>
		  <div class="row">
			<div class="col-md-5 my-1">
			<select class='form-control form-control-sm' name='course_name' id='coursename' >
				<option value="">-- Select Courese--</option>	 
			</select>
			</div>
			<div class="col-md-4 my-1">
				<input type="number" min='0' name="course_fee" id='coursefee' class="form-control form-control-sm"/>
	   
			</div>
		   <div class="col-md-3 my-1 text-center">
		   <span class='btn-sm px-3 btn-info bold btn' onclick='addCourseName1()'>Add </span>
		   </div>	 
		  </div> 
		  <div class="my-2 border border-info bg-white approved_list" style='height:160px; overflow-y:auto;' >
		  <?php if(!empty($college_name))
		  {
		  ?> 
			<table class='table table-sm bg-white table-bordered' id='course_name_list'>
			<tr class='bg-cyanlight'>
				<td width="10%">#</td>
				<td>Stream Name</td>
				<td>Course Name</td>
				<td>Course Fee</td>
				<td width="10%"></td>
			</tr>
			<?php 
			$sn = 1;
			$q1 = "select * from college_course_name where college_id='$college_name' order by stream_name";
			$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
			$found_data=mysqli_num_rows($qr1);
			if($found_data > 0)
			{
			 while ($r1 = mysqli_fetch_object($qr1)) 
			 {
				$college_course_name_id2  = $r1->college_course_name_id ;
				$stream_name2 = $r1->stream_name;
				$course_name2 = $r1->course_name;
				$course_fee2 = $r1->course_fee;
			?>
			<tr class="header">
				<td><?php echo $sn; ?></td> 
				<td><?php echo $stream_name2; ?></td>
				<td><?php echo $course_name2; ?></td>
				<td><?php echo $course_fee2; ?></td>
				<td><span onclick="deleteCourseName('<?php echo $college_course_name_id2;?>')" class=' btn btn-sm btn-outline-danger'><i class='fa fa-trash '></i></span></td>
			</tr>
			<?php
					$sn++;
				}
			}
				?>
			</table>			
		<?php 
		}
		?>	
		  </div>
		</div> 
	  </div>
      </div>
    </div><br> 
<!-- ----------- Add Stream End------------- -->

<!-- ----------- Add Sub Course  ------------- -->
<div class="col-md-12 mx-auto p-3 bg-white sd-2" >
	<div class='container-fluid '> 
	<div class='bold text-center bg-cyan col-md-12'><h4><?php if($_SESSION['college_name']); echo "College : ".$_SESSION['college_full_name'];?></h4>
	</div>
	<h5 class='text-center bold bg-teal mt-n2'>Add Sub Course</h5>
	
  <div class="row bold">
	<div class="col-md-3 small bold">		
	
	<div class="my-1 mt-2">
	Stream  Name<span id='streamerr'></span> 
	  <select id='stream2' name="stream2" class='form-control form-control-sm' onchange='getCourseName1();' >
		<option value="">-- Select --</option>
		<?php
		$q10 = "select * from stream order by stream_name ";
		$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
		while ($r10 = mysqli_fetch_object($qr10)) {
			$stream_id   = $r10->stream_id ;
			$stream_name = $r10->stream_name;
		?>
			<option value="<?php echo $stream_id ; ?>" >
				<?php echo $stream_name; ?>
			</option>
		<?php
		}
		?>
	  </select>
    </div>  		
	<div class="my-1">
	Course Type :  <span id='type_err'></span>   
	<select id='coursecategory2' name="coursecategory2" class='form-control form-control-sm' onchange='getCourseName2();' >
	<option value="">-- Select --</option>
	<?php
	$q10="select * from course_type order by course_type_name";
	$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
	while($r10=mysqli_fetch_object($qr10))
	{ 
	$course_type_id1=$r10->course_type_id;
	$course_type_name=$r10->course_type_name ;
	?>
	<option value=<?php echo $course_type_id1;?> <?php if($course_category == $course_type_id1 )echo ' selected';?>> <?php echo $course_type_name;?></option>
	<?php	
	}
	?>
	</select>				  
	</div>

	<div class="my-1">Course Name :   
		<select class='form-control form-control-sm' name='coursename2' id='coursename2' onchange='getBranchName3(this.value);' >
		 <option value="">-- Select --</option> 
		</select> 			  
	</div> 	
	
	<div class="my-1">Branch Name :   
	<select class='form-control form-control-sm' name='branchname2' id='branchname2'>
	 <option value="">-- Select --</option>
	</select> 			  
	</div>
	<div class="my-1">Course Fee : 	
	<input type="number" min='0' name="course_fee2" id='coursefee2' class="form-control form-control-sm"/>
	</div>
	<div class="my-1 text-center">
		<span class='btn btn-sm btn-info px-3 bold'  onclick='addCourseName2()'>Add <i class="ml-3 fa fa-angle-double-right" aria-hidden="true"></i> </span>
	</div> 		
			 

</div>
<div class="col-md-9">ADD COURSE LIST
  <div class="my-2 border border-info bg-white approved_list" style='height:280px; overflow-y:auto; width:100%' >
<?php if(!empty($college_name))
{
?>	 
	
	<table class='table table-sm bg-white table-bordered' id='course_name_branch_list'>
<tr class='bg-cyanlight'>
	<td width="7%">#</td>
	<td>Stream</td>
	<td>Course Type</td>
	<td>Course Name</td>
	<td>Branch Name</td>
	<td>Course Fee</td>
	<td width="5%"></td>
</tr>
<?php 
$sn = 1;
$q1 = "select * from college_course_name_branch where college_id='$college_name' order by stream_name";
$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
$found_data=mysqli_num_rows($qr1);
if($found_data > 0)
{
 while ($r1 = mysqli_fetch_object($qr1)) 
 {
	$college_c_b_id  = $r1->college_c_b_id ;
	$stream_name3 = $r1->stream_name;
	$course_type3 = $r1->course_type_name;
	$course_name3 = $r1->course_name;
	$branch_name3 = $r1->branch_name;
	$course_fee3 = $r1->course_fee;
?>
<tr class="small bold">
	<td><?php echo $sn; ?></td> 
	<td><?php echo $stream_name3; ?></td>
	<td><?php echo $course_type3; ?></td>
	<td><?php echo $course_name3; ?></td>
	<td><?php echo $branch_name3; ?></td>
	<td><?php echo $course_fee3; ?></td>
	<td><span onclick="deleteCourseNameBranch('<?php echo $college_c_b_id;?>')" class=' btn btn-sm btn-outline-danger'><i class='fa fa-trash '></i></span></td>
</tr>
<?php
		$sn++;
	}
}
	?>
</table>
	</div>
<?php 
}
?>	
	</div>
</div> 

</div>
</div>


<!-- ----------- Add Sub Course End------------- -->
<br>
<!-- ----------- Add Rannking ------------- -->
<div class="col-md-12 mx-auto p-3 bg-white sd-2" >
	<div class='container-fluid '>
	<div class='bold text-center bg-cyan col-md-12'><h4><?php if($_SESSION['college_name']); echo "College : ".$_SESSION['college_full_name'];?></h4>
	</div>

	<div class="row bold mt-n2">
	<div class="col-md-12">
	  <h5 class='text-center bold bg-teal'>Add Rannking</h5>
	  <div class="row">
		<div class="col-md-2">Ranking Board *
		<select id='rankingboard' name="rankingboard" class='form-control form-control-sm' onchange='RankingErrorHide()'>
		<option value="">-- Select --</option>
		<?php
		$q10 = "select * from ranking_type order by body_name ";
		$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
		while ($r10 = mysqli_fetch_object($qr10)) {
		$rankid   = $r10->rank_id ;
		$bodyname = $r10->body_name;
		$rank_value = $r10->rank_value;
		?>
		<option value="<?php echo $rankid ; ?>" >
		<?php echo $bodyname .' (Value = ' .$rank_value. ')';; ?>
		</option>
		<?php
		}
		?>
		</select>
		 <span id='rank_err'></span>
		</div>
		<div class="col-md-2">Rank Value
		 <input type="text" class='form-control form-control-sm' name='rankposition' id='rankposition' onpaste="return false;" maxlength='5' placeholder='Rank' ondrop="return false;"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
		 <span id='value_err'></span>
		</div>
		<div class="col-md-2">Rank Year
		 <input type="text" class='form-control form-control-sm' name='rankyear' id='rankyear' onpaste="return false;" maxlength='4' placeholder='Year' ondrop="return false;"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" />
		 <span id='year_err'></span>
		</div>
		<div class="col-md-4">Ranking Field
		 <input type="text" class='form-control form-control-sm' name='rankfield' id='rankfield' maxlength='255' placeholder='Ranking Filed (if any)' />		 
		 <span id='field_err'></span>
		</div>
		<div class="col-md-2 text-center"><br>
		<span class='btn-sm px-3 btn-info bold btn' onclick='addRanking()'>Add This</span>

		</div>
	  </div>			
	  <div class="my-2 bg-white border border-info approved_list" style='height:200px; overflow-y:auto; '>
		<table class='table table-sm bg-white' id='ranking_list'>
		  <tr class='bg-cyanlight'>
			<td width="6%" class='text-center'>#</td>
			<td>Body Name</td>
			<td class='text-center'>Rank Value</td>
			<td class='text-center'>Rank Position </td>
			<td class='text-center'>Rank Year </td>
			<td>Rank Field</td>
			<td width="10%"></td>
		  </tr>
		<?php 
		$sn = 1;
		$q1 = "select * from college_ranking_data where college_id='$college_name' order by ranking_body_name";
		$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
		$found_data=mysqli_num_rows($qr1);
		if($found_data > 0)
		{
		  while ($r1 = mysqli_fetch_object($qr1)) 
		  {
			$r_id1   = $r1->r_id  ;
			$ranking_body_name1 = $r1->ranking_body_name;
			$ranking_value1 = $r1->ranking_value;
			$ranking_position1 = $r1->ranking_position;
			$ranking_year1 = $r1->ranking_year;
			$ranking_field1 = $r1->ranking_field;
		?>
		  <tr class="header">
			<td class='text-center'><?php echo $sn; ?></td> 
			<td><?php echo $ranking_body_name1; ?></td>
			<td class='text-center'><?php echo $ranking_value1; ?></td>
			<td class='text-center'><?php echo $ranking_position1; ?></td>
			<td class='text-center'><?php echo $ranking_year1; ?></td>
			<td><?php echo $ranking_field1; ?></td>
			<td><span onclick="deleteRankingData('<?php echo $r_id1;?>')" class=' btn btn-sm btn-outline-danger'><i class='fa fa-trash '></i></span></td>
		  </tr>
		<?php
			$sn++;
		  }
		}
		?>
		</table>
	  </div>
	</div>
	
</div> 
	
  
</div>
</div><br> 
<!-- ----------- Add Rannking End------------- -->

<!-- College Facilities And Notification -->
	<div class="col-md-12 mx-auto p-3 bg-white sd-2" > 
	<div class='bold text-center bg-cyan col-md-12'><h4><?php if($_SESSION['college_name']); echo "College : ".$_SESSION['college_full_name'];?></h4>
	</div>

	  <div class="row bold mt-n2">
		<div class="col-md-6">
		  <h5 class='text-center bold bg-teal'>Add Facilities  </h5>
		  <div class="row">
			<div class="col-md-8"> 
			<select id='facilities' name="facilities" class='form-control form-control-sm' onchange='FacilitiesErrorHide()'>
			<option value="">-- Select --</option>
			<?php
			$q10 = "select * from college_facilities order by facilities_name ";
			$qr10 = mysqli_query($conn, $q10) or die($q10 . mysqli_error($conn));
			while ($r10 = mysqli_fetch_object($qr10)) {
			$facilities_id    = $r10->facilities_id  ;
			$facilities_name1 = $r10->facilities_name;
			$facilities_img1 = $r10->facilities_img;
			?>
			<option value="<?php echo $facilities_id ; ?>" >
			<?php echo $facilities_name1; ?>
			</option>
			<?php
			}
			?>
			</select>
			 <span id='facilities_err'></span>
			</div>
			 
			<div class="col-md-4 text-center"> 
			<span class='btn-sm px-3 btn-info bold btn' onclick='addFacilities()'>Add This</span>

			</div>
		  </div>			
		  <div class="my-2 bg-white border border-info approved_list" style='height:200px; overflow-y:auto; '>
			<table class='table table-sm bg-white' id='facilities_list'>
			  <tr class='bg-cyanlight'>
				<td width="10%" class='text-center'>#</td>
				<td>Name</td> 
				<td class='text-center'>Icon</td> 
				<td width="10%"></td>
			  </tr>
			<?php 
			$sn = 1;
			$q1 = "select * from all_college_facilities where college_id='$college_name' order by failities_name";
			$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
			$found_data=mysqli_num_rows($qr1);
			if($found_data > 0)
			{
			  while ($r1 = mysqli_fetch_object($qr1)) 
			  {
				$f_id1    = $r1->f_id   ;
				$failities_name1 = $r1->failities_name; 
				$facilities_logo = $r1->facilities_logo; 
				if(!empty($facilities_logo))
				{
					$filelocation='../Master/College_Facilities/'.$facilities_logo;
					if(file_exists($filelocation))
					  $src_value=$filelocation;
					else
					  $src_value='../images/nologo.jpg';
				}
				else
				 $src_value='../images/nologo.jpg';
			?>
			  <tr class="header">
				<td class='text-center'><?php echo $sn; ?></td> 
				<td><?php echo $failities_name1; ?></td>
				<td class='text-center'><a href="<?php echo $src_value;?>" target="new">
				  <img src="<?php echo $src_value;?>" alt="" style='height:30px; width:30px;' /></a>
				</td>
				<td><span onclick="deleteFacilities('<?php echo $f_id1;?>')" class=' btn btn-sm btn-outline-danger'><i class='fa fa-trash '></i></span></td>
			  </tr>
			<?php
				$sn++;
			  }
			}
			?>
			</table>
		  </div>
		</div>
		
		<div class="col-md-6">
		  <h5 class='text-center bold bg-teal'>College Notification <a class='btn badge badge-danger px-2 mr-2 small  bold float-right' href='addCollegeNotification.php' ><i class='fa fa-plus px-2'></i>Add Here</a></h5>
		  <div class="my-2 bg-white border border-info approved_list" style='height:240px; overflow-y:auto; '>		  
			<?php 
			$q1 = "select * from college_personal_notification where college_id='$college_name' order by datecode DESC";
			$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
			$found_data=mysqli_num_rows($qr1);
			if($found_data > 0)
			{
			?> 
			<table class='table table-sm mt-n2 border'>
			<tr class='bg-cyanlight bold '>
			  <td class='text-center'>S.N.</td>
			  <td class='text-center'>Date</td>
			  <td width="35%">Tilte</td> 
			  <td class='text-center'>Attachment</td>
			  <td></td>
			</tr> 
			<?php 
			$sn2=1;
			while ($r1 = mysqli_fetch_object($qr1)) 
			 {
				$nid   = $r1->nid  ;
				$notification_date1 = $r1->notification_date; 
				$notification_title1 = $r1->notification_title; 
				$notification_description1 = $r1->notification_description;  
				$notification_doc = $r1->notification_doc;
				if(!empty($notification_doc))
				{
					$file_location='College_Notification/'.$notification_doc;
					if(file_exists($file_location))
					$filefound = "<a href='".$file_location."' target='new'>View</a>";
					else
					$filefound	= 'NA';
				}else
					$filefound	= 'NA';
				 
				 ?>
				<tr class='small bold'>
					<td class='text-center'><?php echo $sn2;?></td>
					<td class='text-center'><?php echo $notification_date1;?></td>
					<td><?php echo $notification_title1	;?></td>

					<td class='text-center bold'><?php echo $filefound;?></td> 
					<td><a href="deleteCollegeNotification?nid=<?php echo $nid;?>" onclick="return confirm('Are you sure?')">
					<div class='badge badge-danger p-2 px-4'>Delete </div></a></td>
				</tr>	
			<?php
			    $sn2++;
			  } 
			?>
			  </table>
			</div>
			<?php  
			}
			?> 	 
		  </div>
		</div>
		
	  </div> 	 
	<br> 
<!-- ----- Add College Facilities And Notification end ----- -->

<!-- ----------- Add College Gallery ------------- -->
	<div class="col-md-12 mx-auto p-3 bg-white sd-2" > 
	<div class='bold text-center bg-cyan col-md-12'><h4><?php if($_SESSION['college_name']); echo "College : ".$_SESSION['college_full_name'];?></h4>
	</div>

	  <div class="row bold mt-n2">		
		<div class="col-md-6">
		  <h5 class='text-center bold bg-teal'>College Gallery <a class='btn badge badge-danger px-2 mr-2 small  bold float-right' href='addCollegeGallery.php' ><i class='fa fa-plus px-2'></i>Add Image</a></h5>
		  <div class="my-2 bg-white border border-info approved_list" style='height:240px; overflow-y:auto; '>
			<?php 
			$q1 = "select * from college_image_gallery where college_id='$college_name' order by gid DESC";
			$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
			$found_data=mysqli_num_rows($qr1);
			if($found_data > 0)
			{
			?> 
			<div class="d-flex mt-n2 justify-content-start flex-wrap">
			<?php 
			while ($r1 = mysqli_fetch_object($qr1)) 
			 {
				$gid   = $r1->gid  ;
				$image_name = $r1->image_name; 
				?>
				<div class='p-3'>
					<div class='p-1 border border-info bg-white sd-1'  >
						<img src="College_Personal_Gallery/<?php echo $image_name;?>" style="width:100px; height:80px;" class='img-fluid'/> 
						<a href="deleteCollegeGallery?gid=<?php echo $gid;?>" onclick="return confirm('Are you sure?')">
						<div class='btn btn-block btn-danger'>Delete </div></a>
					</div>
				</div>
				
				<?php
				
			 } 
			?>
			</div>
			<?php  
			}
			?> 	 
		  </div>
		</div>
		
		<div class="col-md-6">
		  <h5 class='text-center bold bg-teal'>College Video Gallery <a class='btn badge badge-danger px-2 mr-2 small  bold float-right' href='addCollegeVideo.php' ><i class='fa fa-plus px-2'></i>Add Video</a></h5>
		  <div class="my-2  border border-info approved_list" style='height:240px; overflow-y:auto; '>
			<?php 
			$q1 = "select * from college_video_gallery where college_id='$college_name' order by vid DESC";
			$qr1 = mysqli_query($conn, $q1) or die($q1 . mysqli_error($conn));
			$found_data=mysqli_num_rows($qr1);
			if($found_data > 0)
			{
			?> 
			<div class="d-flex mt-n2 justify-content-start flex-wrap">
			<?php 
			while ($r1 = mysqli_fetch_object($qr1)) 
			 {
				$vid   = $r1->vid  ;
				$video_url = $r1->video_url; 
				?>
				<div class='p-3'>
					<div class='p-1 border border-info bg-white sd-1'  >
						<iframe width="145" height="80"
						src="<?php echo $video_url;?>">
						</iframe>			 
						<a href="deleteCollegeVideo?vid=<?php echo $vid;?>" onclick="return confirm('Are you sure?')">
							<div class='btn btn-block btn-danger'>Delete </div>
						</a>
					</div>
				</div>
				
				<?php
				
			 } 
			?>
			</div>
			<?php  
			}
			?> 	 
		  </div>
		</div>		
	  </div> 	 
	</div><br> <br> 
<!-- ----------- Add Gallery End------------- --> 
    <a href="finalSubmitData" class='btn btn-sm bg-teal px-3 bold text-white'>Final Submit</a>
	</div> 
 <br><br><br><br>
</div>
</div>
<!-- /.content-wrapper -->


<script>
	function setCollege(f) { 
		var cid = f;
		window.location.href = 'setCollege?cid=' + cid;
	}

	ClassicEditor
		.create(document.querySelector('#editor'))

	function addAppvordData(f) {
		var approved_by = f;
		if (approved_by) {
			$.ajax({
				type: 'post',
				url: 'addAppvordData.php',
				data: {
					approved_by_id: approved_by,
				},
				success: function(response) {
					if (response === 'ok') {
						loadApprovedData();
					} else if (response === 'added') {
						//alert('Already Added');
						Swal.fire('Already Added');
						loadApprovedData();
					} else if (response === 'fail') {
						//alert('Select college first');
						Swal.fire('Select college first');
						loadApprovedData();
					} else
						loadApprovedData();
				}
			});
		}
	}

	function deleteApprovedBy(f) {
		var college_approved_id = f;
		if (college_approved_id) {
			$.ajax({
				type: 'post',
				url: 'deleteAppvordData.php',
				data: {
					college_approved_id: college_approved_id,
				},
				success: function(response) {
					if (response === 'ok') {
						loadApprovedData();
					} else if (response === 'fail') {
						//alert('Select college first');
						Swal.fire('Select college first');
						loadApprovedData();
					} else if (response === 'error') {
						//alert('Something worng');
						Swal.fire('Something worng');
						loadApprovedData();
					} else
						loadApprovedData();
				}
			});
		}
	}

function loadApprovedData() {
	$.ajax({
		type: 'post',
		url: 'loadApprovedData.php',
		success: function(response) {
			$('#approvedlist').html(response);
		}
	});
}

function addStream() {	
	var streamid = document.getElementById('addStream').value; 
	if (streamid) {
		
		$.ajax({
			type: 'post',
			url: 'addStreamData.php',
			data: {
				streamid: streamid,
			},
			success: function(response) {
				if (response === 'ok') {
					loadStreamData();
					document.getElementById('addStream').value='';
					loadStreamData();
				} else if (response === 'added') {
					//alert('Already Added');
					Swal.fire('Already Added');
					
				} else if (response === 'fail') {
					//alert('Select College');
					Swal.fire('Select college first');
					loadStreamData();
				} else
					loadStreamData();
			}
		});
		
	} 
	else
	{
		$('#errSteram').html('<b class="ml-2 text-danger" id="alertmsg">Empty</b>');
		 loadStreamData();
	}
loadCourseStreamData()	
}
function deleteStream(f) {
  var college_stream_id = f;   
  if (college_stream_id) {
		$.ajax({
			type: 'post',
			url: 'deleteStream.php',
			data: {
				college_stream_id: college_stream_id,
			},
			success: function(response) { 
				if (response === 'ok') {
					loadStreamData();
					$('#errSteram').html(''); 
				} else if (response === 'fail') {
					//alert('Select college first');
					Swal.fire('Select college first');
					$('#errSteram').html(''); 
					loadStreamData();
				} else if (response === 'error') {
					//alert('Something worng');
					Swal.fire('Something worng');
					$('#errSteram').html(''); 
					loadStreamData();
				}else if (response === 'found') {
					//alert('Something worng');
					Swal.fire('Data added in course table');
					$('#errSteram').html(''); 
					loadStreamData();
				} else
					loadStreamData();
			}
		});
	}
	loadCourseStreamData()
}

function loadStreamData() {
  $.ajax({
	type: 'post',
	url: 'loadStreamData.php',
	success: function(response) {
		$('#stream_list').html(response);
	}
  });
  loadCourseStreamData();
}



function loadCourseStreamData() {
  $.ajax({
	type: 'post',
	url: 'loadCourseStreamData.php',
	success: function(response) {
		$('#stream').html(response); 
	}
  });
}	
function getCourseName(f)
{
	var streamid = f;  
	if (streamid) 
	{
		$.ajax({
		type: 'post',
		url: 'loadCourseData.php',
		data: {
				streamid: streamid,
			},
		success: function(response) {
			$('#coursename').html(response);
		}
		});
	}
    else	
	{
	  $( '#coursename' ).html('<option value="">-- Select Course --</option>')
	  document.getElementById('coursefee').value=''; 
	};		
}
	
function addCourseName1() 
{	
	var coursename = document.getElementById('coursename').value; 
	var stream = document.getElementById('stream').value; 
	var coursefee = document.getElementById('coursefee').value;
	if ((coursename) && (stream) && (coursefee)) 
	{	
		$.ajax({
			type: 'post',
			url: 'addCourseNameData1.php',
			data: {
				courseid: coursename,
				streamid: stream,
				coursefee: coursefee,
			},
			success: function(responseData) 
			{ 
				if (responseData === 'ok') {/*
					$( '#stream' ).html('<option value="">-- Select Stream --</option>')
					$( '#coursename' ).html('<option value="">-- Select Course --</option>') */
					document.getElementById('coursefee').value=''; 
					loadCourseDataList1();
				} else if (responseData === 'added') {
					alert('Already Added');
					//Swal.fire('Already Added');
					loadCourseDataList1();
					
				} else if (responseData === 'fail') { 
					Swal.fire('Some technical issue found.');
					loadCourseDataList1();
				} else if (responseData === 'empty') { 
					Swal.fire('Zero value not allow');
					loadCourseDataList1();
				} else
					loadCourseDataList1();
			}
		});
		
	} 
    else
	{
		Swal.fire('Fill all field');
	}		
    loadCourseDataList1();	
}	 
  
function loadCourseDataList1() { 
  $.ajax({
	type: 'post',
	url: 'loadCourseDataList1.php',
	success: function(response) {
		$('#course_name_list').html(response);
	}
  });
}

function deleteCourseName(f) {
  var college_course_name_id = f; 
  if (college_course_name_id) {
		$.ajax({
			type: 'post',
			url: 'deleteCourseName.php',
			data: {
				college_course_name_id: college_course_name_id,
			},
			success: function(response) {
				if (response === 'ok') {
					loadCourseDataList1();
				} else if (response === 'fail') {
					Swal.fire('Select college first');
					loadCourseDataList1();
				} else if (response === 'error') {
					Swal.fire('Something worng');
					loadCourseDataList1();
				} else
					loadCourseDataList1();
			}
		});
	}
	loadCourseDataList1();
}

function getCourseName1()
{
	$( '#streamerr' ).html('');
	$( '#coursename2' ).html('<option value="">-- Select --</option>');	
	$( '#branchname2' ).html('<option value="">-- Select --</option>');	
	var streamid2 = document.getElementById('stream2').value; 
	var coursecategory2 = document.getElementById('coursecategory2').value; 
    if(streamid2 == '')
	{ 
		$( '#coursename2' ).html('<option value="">-- Select --</option>');		
	}  	 
 if((streamid2) && (coursecategory2))
 {
  $.ajax({
	  type: 'post',
	  url: 'getCourseName.php',
	  data: {
	   course_type_id:coursecategory2,
	   stream_id:streamid2,
	  },
	  success: function (response) {
	   $( '#coursename2' ).html(response);
	  }
  });  
 }  
}

function getCourseName2()
{

	$( '#streamerr' ).html('');
	$( '#coursename2' ).html('<option value="">-- Select --</option>');		
	$( '#branchname2' ).html('<option value="">-- Select --</option>');	
	var streamid2 = document.getElementById('stream2').value; 
	var coursecategory2 = document.getElementById('coursecategory2').value; 
	var coursename2 = document.getElementById('coursename2').value; 	
    if(streamid2 == '')
	{
		$( '#streamerr' ).html('<b class="text-danger ml-2"> Empty </b>'); 
		$( '#coursename2' ).html('<option value="">-- Select --</option>');
	}
	else if(coursecategory2 == '')
	{
		$( '#coursename2' ).html('<option value="">-- Select --</option>');	
	}  	
 if((streamid2) && (coursecategory2))
 {
  $.ajax({
	  type: 'post',
	  url: 'getCourseName.php',
	  data: {
	   course_type_id:coursecategory2,
	   stream_id:streamid2,
	  },
	  success: function (response) {
	   $( '#coursename2' ).html(response);
	  }
  });  
 }  
}
function getBranchName3(f)
{
	$( '#streamerr' ).html(''); 
	var streamid2 = document.getElementById('stream2').value; 
	var coursecategory2 = document.getElementById('coursecategory2').value; 
	var coursename2 = f;  
	
	
 if((streamid2) && (coursecategory2) && (coursename2))
 {
  $.ajax({
	  type: 'post',
	  url: 'getCourseNameBranch.php',
	  data: {
	   course_type_id:coursecategory2,
	   stream_id:streamid2,
	   coursename_id:coursename2,
	  },
	  success: function (response) { 
	  
	   $( '#branchname2' ).html(response);
	  }
  });  
 }    
}
function addCourseName2()  
{
	var streamid2 = document.getElementById('stream2').value; 
	var coursecategory2 = document.getElementById('coursecategory2').value; 
	var coursename2 = document.getElementById('coursename2').value; 
	var coursefee2 = document.getElementById('coursefee2').value; 
	var branchname2 = document.getElementById('branchname2').value; 

	if ((streamid2) && (coursecategory2) && (coursename2) && (branchname2) && (coursefee2)) 
	{		
		 $.ajax({
			type: 'post',
			url: 'addCourseNameData2.php',
			data: {				
				streamid: streamid2,
				coursetype: coursecategory2,
				courseid: coursename2,
				branchid: branchname2,
				coursefee: coursefee2,
			},
			success: function(response) { 
			  if (response === 'ok') {
					loadCourseDataList2();
					/* document.getElementById('stream2').value='';
					document.getElementById('coursecategory2').value='';
					document.getElementById('coursename2').value=''; 
					document.getElementById('branchname2').value='';  */
					document.getElementById('coursefee2').value=''; 
				} else if (response === 'added') {
					//alert('Already Added');
					Swal.fire('Already Added');
					loadCourseDataList2();
					
				} else if (response === 'fail') {
					//alert('Select College');
					Swal.fire('Select college first');
					loadCourseDataList2();
				} else
					loadCourseDataList2();
			}
		}); 
		
	} 
    else
	{
		Swal.fire('All field are required');
	}  		
    loadCourseDataList2();	
}

function loadCourseDataList2() { 
  $.ajax({
	type: 'post',
	url: 'loadCourseDataList2.php',
	success: function(response) {
		$('#course_name_branch_list').html(response);
	}
  });
}

function deleteCourseNameBranch(f) {
  var college_c_b_id = f; 
  if (college_c_b_id) {
		$.ajax({
			type: 'post',
			url: 'deleteCourseNameBranch.php',
			data: {
				college_c_b_id: college_c_b_id,
			},
			success: function(response) {
				if (response === 'ok') {
					loadCourseDataList2();
				} else if (response === 'fail') {
					Swal.fire('Select college first');
					loadCourseDataList2();
				} else if (response === 'error') {
					Swal.fire('Something worng');
					loadCourseDataList2();
				} else
					loadCourseDataList2();
			}
		});
	}
	loadCourseDataList2();
}


function addRanking()  
{
	var rankingid = document.getElementById('rankingboard').value; 
	var rankposition = document.getElementById('rankposition').value; 
	var rankyear = document.getElementById('rankyear').value; 
	var rankfield = document.getElementById('rankfield').value; 
	
	if(!rankingid)	 
		$('#rank_err').html('<b class="text-danger bold">Empty</b>');
	else
		$('#rank_err').html('');
	
	if(!rankposition)	 
		$('#value_err').html('<b class="text-danger bold">Empty</b>');
	else
		$('#value_err').html('');
	if(!rankyear)	 
		$('#year_err').html('<b class="text-danger bold">Empty</b>');
	else
		$('#year_err').html('');
	
	
	if ((rankingid) && (rankposition) && (rankyear) ) 
	{		
		 $.ajax({
			type: 'post',
			url: 'addRanking.php',
			data: {				
				rankingid: rankingid,
				rankposition: rankposition,
				rankyear: rankyear,
				rankfield: rankfield, 
			},
			success: function(response) {  
			  if (response === 'ok') {
					loadRankingList();
					document.getElementById('rankingboard').value='';
					document.getElementById('rankposition').value='';
					document.getElementById('rankyear').value=''; 
					document.getElementById('rankfield').value='';  
				} else if (response === 'added') {
					//alert('Already Added');
					Swal.fire('Already Added');
					loadRankingList();
					
				} else if (response === 'fail') {
					//alert('Select College');
					Swal.fire('Select college first');
					loadRankingList();
				} else
					loadRankingList();
			}
		}); 
		
	}  		
    loadRankingList(); 
}
function RankingErrorHide()
{
	$('#rank_err').html('');
	$('#value_err').html('');
	$('#year_err').html('');
}
  
function loadRankingList() { 
  $.ajax({
	type: 'post',
	url: 'loadRankingList.php',
	success: function(response) {
		$('#ranking_list').html(response);
	}
  });
}
 
function deleteRankingData(f) {
  var r_id = f; 
  if (r_id) {
		$.ajax({
			type: 'post',
			url: 'deleteRankingData.php',
			data: {
				r_id: r_id,
			},
			success: function(response) {
				if (response === 'ok') {
					loadRankingList();
				} else if (response === 'fail') {
					Swal.fire('Select college first');
					loadRankingList();
				} else if (response === 'error') {
					Swal.fire('Something worng');
					loadRankingList();
				} else
					loadRankingList();
			}
		});
	}
	loadRankingList();
}
  

function addFacilities()  
{
	var facilities = document.getElementById('facilities').value; 
	if(!facilities)	 
		$('#facilities_err').html('<b class="text-danger bold">Empty</b>');
	else
		$('#facilities_err').html(''); 
	
	if ((facilities)) 
	{		
		 $.ajax({
			type: 'post',
			url: 'addFacilities.php',
			data: {				
				facilities: facilities,  
			},
			success: function(response) {  
			  if (response === 'ok') {
					loadFacilitiesList();
					document.getElementById('facilities').value='';
				} else if (response === 'added') {
					//alert('Already Added');
					Swal.fire('Already Added');
					loadFacilitiesList();
					
				} else if (response === 'fail') {
					//alert('Select College');
					Swal.fire('Select college first');
					loadFacilitiesList();
				} else
					loadFacilitiesList();
			}
		}); 
		
	}  		
    loadFacilitiesList(); 
}
function FacilitiesErrorHide()
{
	$('#facilities_err').html(''); 
}
  
function loadFacilitiesList() { 
  $.ajax({
	type: 'post',
	url: 'loadFacilitiesList.php',
	success: function(response) {
		$('#facilities_list').html(response);
	}
  });
}
 
function deleteFacilities(f) {
  var f_id = f; 
  if (f_id) {
		$.ajax({
			type: 'post',
			url: 'deleteFacilitiesData.php',
			data: {
				f_id: f_id,
			},
			success: function(response) {
				if (response === 'ok') {
					loadFacilitiesList();
				} else if (response === 'fail') {
					Swal.fire('Select college first');
					loadFacilitiesList();
				} else if (response === 'error') {
					Swal.fire('Something worng');
					loadFacilitiesList();
				} else
					loadFacilitiesList();
			}
		});
	}
	loadFacilitiesList();
}

setTimeout(function() {
    $('#alertmsg').fadeOut('fast');
}, 3000);	
</script>
<?php include_once('Master-Footer.php'); ?>
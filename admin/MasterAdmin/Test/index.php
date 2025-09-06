<?php include_once ('Master-Header.php');?>
  <section class="home-section">
    <div class="home-content bg-white">
      <i class='bx bx-menu' ></i> <hr>   
	</div>
	<div class="container-fluid  text-uppercase ">
	   <div class="row bg-white p-2" style='box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;'>
		<div>
		  <i class="fa fa-university text-danger fa-3x pl-1 pr-3" aria-hidden="true"></i> 
		</div>
		<div>
		  <h3 class='bold text-danger'> College Master
		  <h6 class='text-primary bold mt-n3'>Add College</h6></h3>
		</div>	   
	   </div><br>		
	</div>
	<div class="container-fluid px-4 ">
   <div class="col-md-11 mx-auto p-3 bg-white" style='box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;'>
<?php 
/*
if(!empty($errors))
{
	?>
	<span class='text-danger mb-2' id='err' style='background:cyan; display:block'>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Holy guacamole!</strong> You should check in on some of those fields below.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>		
	</span> 
<?php
} */
?>	
	
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
	  <form action="Add-College" method="POST" enctype="multipart/form-data">
		<div class="row bold">
		  <div class="col-md-12 my-2">College Name * : <?php echo $errors[college_name];?>
		  <input type="text" class='form-control form-control-sm'  required='' name='college_name' value='<?php echo $college_name;?>' />	  
		  </div>
		  <div class="col-md-8 my-2">Popular Name  :  <?php echo $errors[polpular_name];?>
		  <input type="text" class='form-control form-control-sm'name='polpular_name' value='<?php echo $polpular_name;?>'  />				  
		  </div>
		  
		  <div class="col-md-4 my-2	">College Type * :  <?php echo $errors[college_type];?> 
		   <select  required=''  id='college_type' name="college_type" class='form-control form-control-sm .js-example-basic-single' >
			<option value="">-- Select --</option> 
			<option value="College" <?php if($college_type == 'College') echo ' selected';?> >College</option>
			<option value="University" <?php if($college_type == 'University') echo ' selected';?> >University</option>
		   </select>				  
		  </div>
		  
		  <div class="col-md-3 my-2	">Estd. Year * : <?php echo $errors[estd_year];?>   
			 <input type="text" class='form-control form-control-sm'  required='' name='estd_year' value='<?php echo $estd_year;?>'/>	
		   </select>				  
		  </div>
		  
		  <div class="col-md-3 my-2	">Ownership * : <?php echo $errors[ownership_id];?>    
		   <select required='' id='ownership_id' name="ownership_id" class='form-control form-control-sm' >
			<option value="">-- Select --</option>
			<?php
			$q10="select * from ownership_data order by ownership_name ";
			$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
			while($r10=mysqli_fetch_object($qr10))
			{ 
			$ownership_id0 =$r10->ownership_id   ;
			$ownership_name0=$r10->ownership_name ; 
			?>	
			<option value=<?php echo $ownership_id0;?> <?php if($ownership_id == $ownership_id0 )echo ' selected';?>> <?php echo $ownership_name0;?>
			</option>
			<?php	
			}
			?>
		   </select>			  
		  </div>
		  
		  <div class="col-md-6 my-2	">Affiliated From * : <?php echo $errors[affiliation];?>   
		   <select  required=''  id='affiliation' name="affiliation[]" class="js-example-basic-multiple-limit form-control form-control-sm " multiple='multiple'   >
			<option value="">-- Select --</option>
			<?php
			$q10="select * from affiliation_name order by affiliation_name ";
			$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
			while($r10=mysqli_fetch_object($qr10))
			{ 
			$affiliation_id0 =$r10->affiliation_id   ;
			$affiliation_name0=$r10->affiliation_name ; 
			?>	
			<option value=<?php echo $affiliation_id0;?> <?php if($affiliation == $affiliation_id0 )echo ' selected';?>> <?php echo $affiliation_name0;?>
			</option>
			<?php
			}
			?>
		   </select>			  
		  </div>
		  
		  <div class="col-md-6 my-2	">Address 1 :<?php echo $errors[address1];?>  
			<div class="row">
				<div class="col-md-12 my-2">  
				<textarea name="address1" class='form-control form-control-sm' rows="3"><?php echo $address1;?></textarea>  
				</div>
				<div class="col-md-6 my-2">  
				Country * :<?php echo $errors[country_id1];?>      
				<select required='' id='country_id1' name="country_id1" class='form-control form-control-sm' onchange='getState1(this.value);' >
				    <option value="">-- Select --</option>
					<?php
					$q10="select * from country_data order by name ";
					$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
					while($r10=mysqli_fetch_object($qr10))
					{ 
					$country_id0=$r10->country_id ;
					$district_name0=$r10->name ;0
					?>	
					<option value=<?php echo $country_id0;?> <?php if($country_id1 == $country_id0 )echo ' selected';?>> <?php echo $district_name0;?>
					</option>
					<?php
					}
					?>
				   </select>	
				</div>
				<div class="col-md-6 my-2">  
				State * : <?php echo $errors[state_id1];?>   
				<select class='form-control form-control-sm' name='state_id1' id='state1'  required=''  onchange='getDistrict11(this.value);'>
				   <option value="">-- Select --</option>
					<?php
					if(!empty($country_id1))
					{					 
						$q10="select * from state_data where country_id ='$country_id1' order by statename";
						$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
						while($r10=mysqli_fetch_object($qr10))
						{ 
							$state_id0=$r10->state_id ;
							$state_name0=$r10->statename ;
						?>	
						<option value=<?php echo $state_id0;?> <?php if($state_id1 == $state_id0 )echo ' selected';?>> <?php echo $state_name0;?>
						</option>
						<?php	
						} 
					}
					?>				   
				</select>	
				</div>
				<div class="col-md-6 my-2">  
				District * :  <?php echo $errors[district_id1];?>   
				<select class='form-control form-control-sm' name='district_id1' id='district1'  required=''>
				   <option value="">-- Select --</option>
				   <?php
					if(!empty($state_id1))
					{					 
						$q10="select * from district_data where state_id ='$state_id1' order by district_name";
						$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
						while($r10=mysqli_fetch_object($qr10))
						{ 
							$district_id0 =$r10->district_id  ;
							$district_name0=$r10->district_name ; 
						?>	
						<option value=<?php echo $district_id0;?> <?php if($district_id1 == $district_id0 )echo ' selected';?>> <?php echo $district_name0;?>
						</option>
						<?php	
						} 
					}
					?>
				</select>	
				</div>
				<div class="col-md-6 my-2">  
				Pincode * :   <?php echo $errors[pincode1];?>
				<input type="text" class='form-control form-control-sm' required='' name='pincode1' value='<?php echo $pincode1;?>'/>	
				</div>				
			</div>			  
		  </div> 
		  
		  <div class="col-md-6 my-2	">Address 2 :  <?php echo $errors[address2];?>
			<div class="row">
				<div class="col-md-12 my-2">  
				<textarea name="address2" class='form-control form-control-sm' rows="3"><?php echo $address2;?></textarea>  
				</div>
				<div class="col-md-6 my-2">  
				Country * : <?php echo $errors[country_id2];?>   
				<select  id='country_id2' name="country_id2" class='form-control form-control-sm' onchange='getState2(this.value);' >
				    <option value="">-- Select --</option>
					<?php
					$q10="select * from country_data order by name ";
					$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
					while($r10=mysqli_fetch_object($qr10))
					{ 
					$country_id0=$r10->country_id ;
					$district_name0=$r10->name ; 
					?>
					<option value=<?php echo $country_id0;?> <?php if($country_id2 == $country_id0 )echo ' selected';?>> <?php echo $district_name0;?>
					</option>
					<?php
					}
					?>
				   </select>	
				</div>
				<div class="col-md-6 my-2">  
				State * :  <?php echo $errors[state_id2];?>   
				<select class='form-control form-control-sm' name='state_id2' id='state2'  onchange='getDistrict12(this.value);'>
				   <option value="">-- Select --</option>
				   <?php
					if(!empty($country_id2))
					{					 
						$q10="select * from state_data where country_id ='$country_id2' order by statename";
						$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
						while($r10=mysqli_fetch_object($qr10))
						{ 
							$state_id0=$r10->state_id ;
							$state_name0=$r10->statename ;
						?>	
						<option value=<?php echo $state_id0;?> <?php if($state_id2 == $state_id0 )echo ' selected';?>> <?php echo $state_name0;?>
						</option>
						<?php	
						} 
					}
					?>
				</select>	
				</div>
				<div class="col-md-6 my-2">  
				District * :  <?php echo $errors[district_id2];?>  
				<select class='form-control form-control-sm' name='district_id2' id='district2' >
				   <option value="">-- Select --</option>
				   <?php
					if(!empty($state_id2))
					{					 
						$q10="select * from district_data where state_id ='$state_id2' order by district_name";
						$qr10=mysqli_query($conn, $q10) or die($q10.mysqli_error($conn));
						while($r10=mysqli_fetch_object($qr10))
						{ 
							$district_id0 =$r10->district_id  ;
							$district_name0=$r10->district_name ; 
						?>	
						<option value=<?php echo $district_id0;?> <?php if($district_id2 == $district_id0 )echo ' selected';?>> <?php echo $district_name0;?>
						</option>
						<?php	
						} 
					}
					?>
				</select>	
				</div>
				<div class="col-md-6 my-2">  
				Pincode * :   <?php echo $errors[pincode2];?> 
				<input type="text" class='form-control form-control-sm'  name='pincode2' value='<?php echo $pincode2;?>'/>	
				</div>				
			</div>			  
		  </div>	  
		  
		  <div class="col-md-4 my-2">Contact Number  :  <?php echo $errors[contact_no];?>  
		  <input type="text" class='form-control form-control-sm'  required='' maxlength='10' name='contact_no' value='<?php echo $contact_no;?>'  />	  
		  </div>  
		  
		  <div class="col-md-4 my-2">Email Id :  <?php echo $errors[email_id];?> 
		  <input type="text" class='form-control form-control-sm'  required='' name='email_id' value='<?php echo $email_id;?>'  />		  
		  </div>
		  
		  <div class="col-md-4 my-2">Website :  <?php echo $errors[website];?> 
		  <input type="text" class='form-control form-control-sm'  required='' name='website' value='<?php echo $website;?>'  />		  
		  </div>
		  
		  <div class="col-md-12 my-2">About College :  <?php echo $errors[description];?> 
			<textarea name="description"  id='editor'  class='form-control form-control-sm' rows="3"><?php echo $description;?></textarea>  
			</div>
		  <div class="col-md-4 my-2	">College Logo : <?php echo $errors[logoImg];?> 
			<input type="file"  name="logoImg"  class="form-control form-control-sm" onchange="logoImgCheck(this)" value="<?php echo $logoImg ;?>" id="logoImg"  accept="image/*">
			<img id="logoThumb" src="images/noimage.jpg" width="100%" height="120px" draggable="false"/>						  
		  </div>
		  <div class="col-md-4 my-2	">College Banner : <?php echo $errors[bannerImg];?> 
			<input type="file"  name="bannerImg"  class="form-control form-control-sm" onchange="bannerImgCheck(this)" value="<?php echo $bannerImg ;?>" id="bannerImg"  accept="image/*">
			<img id="bannerThumb" src="images/noimage.jpg" width="100%" height="120px" draggable="false"/>	  
		  </div>		  
		  <div class="col-md-4 my-2	">College Brochure : <?php echo $errors[brochure];?>
			<input type="file"  name="brochure"  class="form-control form-control-sm" onchange="brocherCheck(this)" value="<?php echo $brochure ;?>" id="brochure"  accept="application/pdf">
			<img id="brochureThumb" src="images/noimage.jpg" width="100%" height="120px" draggable="false"/>	  
		  </div>
		  <div class="col-md-12 my-2 text-center"> 			
			<input type="submit" value='Submit' name='submit' class='mx-2 bold  btn btn-sm bg-info px-3'/>
			<a href='Country-Add' class="bold btn btn-sm bg-info px-3 mx-2">Reset </a>
		  </div>
		  
		  
		</div>			
	  </form> 
	</div>		 
   </div><br><br><br><br>
  </div>	  
</section> 
</div>  
<script>
function logoImgCheck()
{	 
	var oFile = document.getElementById("logoImg").files[0]; 

	if (oFile.size > 512000) // 2 MiB for bytes.
	{
		alert("File size must under 500 KB!");
		document.getElementById("logoImg").value = '';
		logoThumb.src='images/noimage.jpg';		
		return;
	}
	else
	{
		var fileInput = document.getElementById('logoImg');

		var filePath = fileInput.value;

		// Allowing file type
		var allowedExtensions = 
		/(\.jpg|\.jpeg|\.png|\.JPG|\.PNG|\.JPEG)$/i;

		if (!allowedExtensions.exec(filePath)) 
		{
			alert('Invalid Question Figure type. Only Image file allow!');
			fileInput.value = '';
			logoThumb.src='images/noimage.jpg';			
			return false;
		}
		else
		{			
			logoThumb.src=URL.createObjectURL(event.target.files[0]);
			document.getElementById("logoImg").innerHTML = "";			
		}	
	}
}
function bannerImgCheck()
{	 
	var oFile = document.getElementById("bannerImg").files[0]; 

	if (oFile.size > 512000) // 2 MiB for bytes.
	{
		alert("File size must under 500 KB!");
		document.getElementById("bannerImg").value = '';
		bannerThumb.src='images/noimage.jpg';		
		return;
	}
	else
	{
		var fileInput = document.getElementById('bannerImg');

		var filePath = fileInput.value;

		// Allowing file type
		var allowedExtensions = 
		/(\.jpg|\.jpeg|\.png|\.JPG|\.PNG|\.JPEG)$/i;

		if (!allowedExtensions.exec(filePath)) 
		{
			alert('Invalid Question Figure type. Only Image file allow!');
			fileInput.value = '';
			bannerThumb.src='images/noimage.jpg';			
			return false;
		}
		else
		{			
			bannerThumb.src=URL.createObjectURL(event.target.files[0]);
			document.getElementById("bannerImg").innerHTML = "";			
		}	
	}
}

function brocherCheck()
{	 
	var oFile = document.getElementById("brochure").files[0]; 

	if (oFile.size > 512000) // 2 MiB for bytes.
	{
		alert("File size must under 500 KB!");
		document.getElementById("brochure").value = '';
		brochureThumb.src='images/noimage.jpg';		
		return;
	}
	else
	{
		var fileInput = document.getElementById('brochure');

		var filePath = fileInput.value;

		// Allowing file type
		var allowedExtensions = 
		/(\.pdf|\.PDF)$/i;

		if (!allowedExtensions.exec(filePath)) 
		{
			alert('Invalid Question Figure type. Only PDF file allow!');
			fileInput.value = '';
			brochureThumb.src='images/noimage.jpg';			
			return false;
		}
		else
		{			
			brochureThumb.src='images/pdfimg.png';	
			document.getElementById("brochure").innerHTML = "";			
		}	
	}
}


ClassicEditor
	.create( document.querySelector( '#editor' ) )

function getState1(f)
{
 var country_id1=f;  
 if(country_id1)
 {
  $.ajax({
	  type: 'post',
	  url: 'getStateData1.php',
	  data: {
	   country_id:country_id1,
	  },
	  success: function (response) {
	   $( '#state1' ).html(response);
	  }
  });
 } 
} 
function getDistrict11(f)
{
 var state_id1=f; 
 if(state_id1)
 {
  $.ajax({
	  type: 'post',
	  url: 'getDistrictData1.php',
	  data: {
	   state_id1:state_id1,
	  },
	  success: function (response) {
	   $( '#district1' ).html(response);
	  }
  });
 } 
} 

function getState2(f)
{
 var country_id1=f;  
 if(country_id1)
 {
  $.ajax({
	  type: 'post',
	  url: 'getStateData2.php',
	  data: {
	   country_id:country_id1,
	  },
	  success: function (response) {
	   $( '#state2' ).html(response);
	  }
  });
 } 
} 
function getDistrict12(f)
{
 var state_id1=f; 
 if(state_id1)
 {
  $.ajax({
	  type: 'post',
	  url: 'getDistrictData2.php',
	  data: {
	   state_id1:state_id1,
	  },
	  success: function (response) {
	   $( '#district2' ).html(response);
	  }
  });
 } 
} 



/* 	
function chechName(f)
{
	var chechName=f; 	
	if(chechName)
	{
		$.ajax({
			type: 'post',
			url: 'countryNameCheck.php',
			data: {
				chechName:chechName,
				},
			success: function (response) {
				$( '#err' ).html(response);
			}
		});
	} 
} */ 
</script>
	
	 
</section>
<?php include_once ('Master-Footer.php');?>
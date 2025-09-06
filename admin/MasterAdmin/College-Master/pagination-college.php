<?php 
unset($_SESSION['sn']);
$_SESSION['sn'] = 1;
	// $paginationlink=$_SESSION['paginationlink'];
$q0="select count(*) as totalrecord from college_data ";
$qr0=mysqli_query($conn, $q0) or die($q0.mysqli_error($conn));
$r0=mysqli_fetch_object($qr0);
$totalrows=$r0->totalrecord ; 
	$pagination_button= 5;
if(empty($_SESSION['no_of_record']))	
	$per_page_record = 10;
else
	$per_page_record = $_SESSION['no_of_record']; 
	$page_number = (isset($_GET['page']) AND !empty($_GET['page']))? $_GET['page']:1;
	$last_page=ceil($totalrows/$per_page_record);
	$pagination = '';
	$pagination .= '<ul class="pagination justify-content-end"> ';
	if($page_number < 1)
		$page_number = 1;
	else if($page_number > $last_page)
		$page_number = $last_page;	

// Start:  Database limit query dispaly code	i.e. start_from, to 
	if($page_number > 1)
	{	
		unset($_SESSION['sn']);
		$startfrom= ($page_number-1)*$per_page_record;
		$sn =$startfrom+1; 
		$_SESSION['sn'] = $sn;
	}
	else 
	{ 	
		$_SESSION['sn'] = $sn;
		$startfrom=0;
	}
// End:    Database limit query dispaly code	i.e. start_from, to 

	$half=floor($pagination_button / 2);
	if($page_number < $pagination_button AND ($last_page == $pagination_button OR $last_page > $pagination_button))
	{
		for($i=1; $i<=$pagination_button; $i++)
		{
			if($i==$page_number)
			{
				$pagination .='<li class="">
								<a id="'.$i.'" class="mx-1 border border-dark   badge badge-info rounded p-2 bold text-white" href="College-List?page='.$i.'">'.$i.'</a></li>
								';
			}
			else
			{
				$pagination .='<li class="">
								<a id="'.$i.'" class=" border border-dark mx-1   badge bg-teal rounded p-2" href="College-List?page='.$i.'">'.$i.'</a>
								</li>';
			}
		}
		if($last_page > $pagination_button)
		{
			$pagination .='<li class="">
				<a id="'.$i.'" class=" border border-dark mx-1   badge bg-teal rounded p-2" href="'.$paginationlink.'?page='.($pagination_button+1).'"> <span class="fa fa-angle-double-right"></span></a></li>
				';
		}
	}
	else if(($page_number >= $pagination_button) AND ($last_page > $pagination_button))
	{
		if(($page_number+$half) >= $last_page)
		{
			$pagination .='<li class="">
							<a id="'.$i.'" class=" border border-dark mx-1   badge bg-teal rounded p-2" href="'.$paginationlink.'?page='.($last_page-$pagination_button).'"> <span class="fa fa-angle-double-left"></span></a> </li>
							';
			for($i=($last_page-$pagination_button)+1; $i<=$last_page; $i++)
			{
				if($i == $page_number)
				{
					$pagination .='<li class="">
						<a id="'.$i.'" class="mx-1 border border-dark   badge badge-info rounded p-2 bold text-white" href="College-List?page='.$i.'">'.$i.'</a></li>
						';
				}
				else
				{
					$pagination .='<li class="">
									<a id="'.$i.'" class=" border border-dark mx-1   badge bg-teal rounded p-2" href="College-List?page='.$i.'">'.$i.'</a></li>
									';
				}
			}	
		}
		else if(($page_number+$half) < $last_page)
		{
			$pagination .='<li class="">
				<a id="'.$i.'" class=" border border-dark mx-1   badge bg-teal rounded p-2" href="'.$paginationlink.'?page='.(($page_number-$half)-1).'"> <span class="fa fa-angle-double-left"></span></a> </li>
				';
			for($i=($page_number-$half); $i<=($page_number+$half); $i++)
			{
				if($i == $page_number)
				{
					$pagination .='<li class="">
						<a id="'.$i.'" class="mx-1 border border-dark   badge badge-info rounded p-2 bold text-white" href="College-List?page='.$i.'">'.$i.'</a></li>
						';
				}
				else
				{
					$pagination .='<li class="">
									<a id="'.$i.'" class=" border border-dark mx-1   badge bg-teal rounded p-2" href="College-List?page='.$i.'">'.$i.'</a></li>
									';
				}
			}
			$pagination .='<li class="">
				<a id="'.$i.'" class=" border border-dark mx-1   badge bg-teal rounded p-2" href="'.$paginationlink.'?page='.(($page_number+$half)+1).'"> <span class="fa fa-angle-double-right"></span></a> </li>
				';
		}
		
	}
	else if(($page_number >= $pagination_button) AND ($last_page == $pagination_button))
	{
		for($i=($last_page-$pagination_button)+1; $i<=$last_page; $i++)
		{
			if($i == $page_number)
			{
				$pagination .='<li class="">
					<a id="'.$i.'" class="mx-1 border border-dark   badge badge-info rounded p-2 bold text-white" href="College-List?page='.$i.'">'.$i.'</a></li>
					';
			}
			else
			{
				$pagination .='<li class="">
								<a id="'.$i.'" class=" border border-dark mx-1   badge bg-teal rounded p-2" href="College-List?page='.$i.'">'.$i.'</a></li>
								';
			}
		}
		
	}
	else if($page_number < $pagination_button AND ($last_page == $pagination_button OR $last_page < $pagination_button))
	{
		for($i=1; $i<=$last_page; $i++)
		{
			if($i == $page_number)
			{
				$pagination .='<li class="">
					<a id="'.$i.'" class="mx-1 border border-dark   badge badge-info rounded p-2 bold text-white" href="College-List?page='.$i.'">'.$i.'</a></li>
					';
			}
			else
			{
				$pagination .='<li class="">
								<a id="'.$i.'" class=" border border-dark mx-1   badge bg-teal rounded p-2" href="College-List?page='.$i.'">'.$i.'</a></li>
								';
			}
		}
		
	}
	$pagination .= '</ul>';
	//echo $pagination;
	?>
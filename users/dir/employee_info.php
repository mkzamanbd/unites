<?php
ob_start();
session_start();
error_reporting(0);
include_once('../../connection/connection.php');
include('../includes/vus.php');

if(isset($_POST['add_client_btn']))
{
    $client_name = $_POST['client_name'];
    $date = date('d/M/Y');
    $up_by = $_SESSION['user_name'];
    
    $client_image =time().mt_rand().$_FILES['client_image']['name'];
    $tmp_name=$_FILES['client_image']['tmp_name'];
    $location='../../site_images/';
    
    $q = mysqli_query($con,"INSERT INTO clients(client_name,client_image,date,up_by) VALUES('$client_name','$client_image','$date','$up_by')");
    
    if($q)
    {
        move_uploaded_file($tmp_name,$location.$client_image);
        echo "<script>alert('Success')</script>";
    }
    else
    {
        echo "<script>alert('Failed')</script>";
    }
    
}


?>

<!DOCTYPE html>
<html>
<head>
<?php include('../includes/head.php'); ?>
</head>

<body>

<div id="wrapper">
<?php include('../includes/menu.php'); ?>
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
</div>
</div>
    
<div class="row">
<!----------------- content area --------------->           
<div class="col-md-12">
<h4>Employee Information</h4>
<hr>
    
<table class="table table-responsive">
    <thead>
        <th>Name</th>
        <th>Department</th>
        <th>Designation</th>
        <th>Email</th>
        <th>Option</th>
    </thead>   

    
    <?php
                        
    // ====== Pagination ======
	$tbl_name="emp_info";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	

	$query = mysqli_query($con,"SELECT COUNT(*) as id FROM $tbl_name");
	$total_pages = mysqli_fetch_array($query);
	$total_pages = $total_pages['id'];
	
	/* Setup vars for query. */
	$targetpage = "employee_info.php"; 	//your file name  (the name of this file)
	$limit =10; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$pager_q1 = mysqli_query($con,"SELECT * FROM $tbl_name ORDER BY id DESC LIMIT $start,$limit");
	
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">previous</a>";
		else
			$pagination.= "<span class=\"disabled\">previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";			
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next</a>";
		else
			$pagination.= "<span class=\"disabled\">next</span>";
		$pagination.= "</div>\n";		
	}
// ====== Pagination Ends ======
   
// pagination output ========================

 while($get_row = mysqli_fetch_array($pager_q1))
 {    
    
    echo "<tr><td>".$get_row['name']."</td><td>".$get_row['department']."</td><td>".$get_row['designation']."</td><td>".$get_row['email']."</td></tr>";
   
}
                    
          
                    
                    
?>
</table>
    
<?php
 echo "<br>";
    echo "<div align='center'>".$pagination."</div>";
    echo "<br>";              
?>
</div>



<!---------------------------------------------->
</div>
            
</div>
</div>
<?php include('../includes/bottom_js.php'); ?>    

</body>

</html>

<?php
ob_start();
session_start();
include_once('../../connection/connection.php');
include('../includes/vus.php');

$id = $_GET['id'];

$sq = mysqli_query($con,"SELECT * FROM expenditures WHERE id='$id'");
$sq_state = mysqli_fetch_array($sq);

$status = $sq_state['approved'];

if($status=='Yes')
{
    $dis_state = 'disabled';
}
else
{
    $dis_state = '';
}

if(isset($_POST['approve_btn']))
{
    $approved = $_POST['approved'];
    
    if($approved=='Yes')
    {
        $aq = mysqli_query($con,"UPDATE expenditures SET approved='$approved' WHERE id='$id'");
        if($aq)
        {
            echo "<script>alert('Bill Approved')</script>";
            echo "<script>window.close();</script>";
        }
        else
        {
            echo "<script>alert('Failed')</script>";
        }
    }
    if($approved=='No')
    {
        $aq = mysqli_query($con,"UPDATE expenditures SET approved='$approved' WHERE id='$id'");
        if($aq)
        {
            echo "<script>alert('Bill Not Approved')</script>";
        }
        else
        {
            echo "<script>alert('Failed')</script>";
        }
    }
	
	header('location:reports.php'); 
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
                    <h3 class="page-header">Admin Dashboard</h3>
                </div>
            </div>

            <div class="row">
                <!---------------------------------------------------------->


<div class="col-md-12">

    <form action="approve_bill.php?id=<?php echo $id?>" method="post" class="well col-md-7">
        <div class="form-group">
            <label>Are you sure that, you want to approve this bill ?</label>
            <select name="approved" class="form-control" <?php echo $dis_state; ?>>
                <option>Please Select</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
        
        <div class="form-group">
            <input type="submit" name="approve_btn" class="btn btn-danger btn-sm pull-right" value="Approve" <?php echo $dis_state; ?>>
        </div>
    </form>
                  

</div>
                



<!------------------------------------------------------>
            </div>

        </div>
    </div>
    <?php include('../includes/bottom_js.php'); ?>

</body>

</html>
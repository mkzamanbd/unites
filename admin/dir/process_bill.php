<?php
ob_start();
session_start();
include_once('../../connection/connection.php');
include('../includes/vus.php');

$id = $_GET['id'];

if(isset($_POST['process_btn']))
{
    $processed = $_POST['processed'];
    
    if($processed=='Yes')
    {
        $aq = mysqli_query($con,"UPDATE expenditures SET processed='$processed' WHERE id='$id'");
        if($aq)
        {
            echo "<script>alert('Bill Processed')</script>";
            echo "<script>window.close();</script>";
        }
        else
        {
            echo "<script>alert('Failed')</script>";
        }
    }
    if($processed=='No')
    {
        $aq = mysqli_query($con,"UPDATE expenditures SET processed='$processed' WHERE id='$id'");
        if($aq)
        {
            echo "<script>alert('Bill Not Processed')</script>";
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

    <form action="process_bill.php?id=<?php echo $id?>" method="post" class="well col-md-7">
        <div class="form-group">
            <label>Are you sure that, you want to process this bill ?</label>
            <select name="processed" class="form-control">
                <option>Please Select</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
        
        <div class="form-group">
            <input type="submit" name="process_btn" class="btn btn-danger btn-sm pull-right" value="Process">
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
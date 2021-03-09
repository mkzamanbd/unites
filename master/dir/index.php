<?php
ob_start();
session_start();
include_once('../../connection/connection.php');
include('../includes/vus.php');

//to obtain SGD todays SGD rate ----------
    $sgd = mysqli_query($con,"SELECT * FROM currency ORDER BY id DESC LIMIT 1");
    $sgd_row = mysqli_fetch_array($sgd);
    $sgd_rate = $sgd_row['sg_rate'];
    $updated_date = $sgd_row['date'];

if(isset($_POST['currency_update_btn']))
{
    $sg_rate = $_POST['sg_rate'];
    $up_by = $_SESSION['user_name'];
    $date = date('Y-m-d');
    
    $cyrrency_update = mysqli_query($con,"INSERT INTO currency(sg_rate,date,up_by) VALUES('$sg_rate','$date','$up_by')");
    if($cyrrency_update)
    {
        echo "<script>alert('Currency Exchange Rate has been updated')</script>";
        header("Refresh:0");
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
                    <h3 class="page-header">Admin Dashboard</h3>
                </div>
            </div>

            <div class="row">
                <!---------------------------------------------------------->


<div class="col-md-12">
                    

                    
                    
                    
<table class="table table-bordered">
    <thead>
      <tr style="background-color:#DBE8E6">
        <th colspan="2">Info</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="pull-left">
            <strong>Today :
                <?php echo date('d/m/Y'); ?>
            </strong><br>
            <strong>SGD Rate is :
                <?php echo "<span style='color:#073181'>".$sgd_rate. "</span> Updated on <span style='color:#073181'>".$updated_date; ?>
            </strong>
            </div>
        </td>
        
      </tr>
      
      
    </tbody>
  </table>
                    

</div>
                
                


<div class="col-md-12">
    <div class="alert alert-info col-md-5">
        <?php
            $date = date('Y-m-d');
            $invq = mysqli_query($con,"SELECT * FROM expenditures WHERE date='$date'");
            $inv_qty = mysqli_num_rows($invq);
    
            echo "<strong>Total Invoice Uploaded Today : ".$inv_qty."</strong>";
    
        ?>
    </div>
</div>
                
  
<div class="col-md-12">
<div class="alert alert-success col-md-5">
        <?php
            $date = date('Y-m-d');
            $nonappq = mysqli_query($con,"SELECT * FROM expenditures WHERE date='$date' AND approved='Not Yet Assigned'");
            $non_a = mysqli_num_rows($nonappq);
    
            echo "<strong>Total Non Approved Uploaded Today : ".$non_a."</strong>";
    
        ?>
</div>         
</div>
                
    
<div class="col-md-12">
<div class="alert alert-danger col-md-5">
        <?php
            $date = date('Y-m-d');
            $appq = mysqli_query($con,"SELECT * FROM expenditures WHERE date='$date' AND approved='Yes'");
            $app_a = mysqli_num_rows($appq);
    
            echo "<strong>Total Approved Uploaded Today : ".$app_a."</strong>";
    
        ?>
</div>                
</div>





                <!------------------------------------------------------>
            </div>

        </div>
    </div>
    <?php include('../includes/bottom_js.php'); ?>

</body>

</html>
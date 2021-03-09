<?php
ob_start();
session_start();
include_once('../../connection/connection.php');
include('../includes/vus.php');

$voucher_no = "VCH-".date('ymd').time();


    
    
if(isset($_POST['upload_btn']))
{
    // to obtain employee name ---------
    $user_name = $_SESSION['user_name'];
    $eq = mysqli_query($con,"SELECT * FROM users WHERE user_name='$user_name'");
    $eq_row = mysqli_fetch_array($eq);
    $processed_by = $eq_row['name'];
    $inv_for = ucwords($_POST['inv_for']);
    $purpose_of_exp = $_POST['purpose_of_exp'];
    
    $voucher_no = $voucher_no;
    $processed_by = $processed_by;
    $amount_bdt = $_POST['amount_bdt'];
    
    // to calculate SGD amount ----------
    $sgd = mysqli_query($con,"SELECT * FROM currency ORDER BY id DESC LIMIT 1");
    $sgd_row = mysqli_fetch_array($sgd);
    $sgd_rate = $sgd_row['sg_rate'];
    $amount_sgd = round($amount_bdt / $sgd_rate,2);
    
    
    // to calculate USD amount ----------
    $usd = mysqli_query($con,"SELECT * FROM currency ORDER BY id DESC LIMIT 1");
    $usd_row = mysqli_fetch_array($usd);
    $usd_rate = $usd_row['usd_rate'];
    $amount_usd = round($amount_bdt / $usd_rate,2);
    
    
    $approved = "Not Yet Assigned";
    $processed = "Not Yet Assigned";
    $scan_doc =time().mt_rand().$_FILES['scan_doc']['name'];
    $tmp_name=$_FILES['scan_doc']['tmp_name'];
    $location='../../scanned_docs/';
    
    $up_by = $_SESSION['user_name'];
    $date = date('Y-m-d');
    
    $q = mysqli_query($con,"INSERT INTO expenditures(voucher_no,processed_by,inv_for,purpose_of_exp,amount_bdt,amount_sgd,amount_usd,approved,processed,scan_doc,date,up_by) VALUES('$voucher_no','$processed_by','$inv_for','$purpose_of_exp','$amount_bdt','$amount_sgd','$amount_usd','$approved','$processed','$scan_doc','$date','$up_by')");
    

    
    if($q)
    {
        move_uploaded_file($tmp_name,$location.$scan_doc);
        echo "<script>alert('Entry Successfull')</script>";
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
        <h3 class="page-header">Entry Form</h3>
    </div>
</div>
          
<div class="row">
<!---------------------------------------------------------->
<form action="entry_form.php" method="post" enctype="multipart/form-data" class="col-md-8 well">
    
    <div class="form-group">
        <label>Voucher No.</label>
        <input type="text" name="voucher_no" value="<?php echo $voucher_no; ?>" class="form-control" readonly>
    </div>
    
    <div class="form-group">
        <label>Employee Name</label>
        <input type="text" name="inv_for" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label>Purpose of Expenditure</label>
        <select name="purpose_of_exp" class="form-control">
            <?php
                $type_q = mysqli_query($con,"SELECT * FROM expenditure_types ORDER BY id");
                while($type_row=mysqli_fetch_array($type_q))
                {
                    echo "<option>".$type_row['e_type']."</option>";
                }
            ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Amoubt (BDT)</label>
        <input type="number" step="0.01" name="amount_bdt" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label>Upload Scanned File</label>
        <input type="file" name="scan_doc" class="form-control" accept="image/*" required>
    </div>
    
    <div class="form-group">
        <input type="submit" name="upload_btn" class="btn btn-primary btn-sm pull-right" value="Upload">
    </div>
</form>
<!------------------------------------------------------>                
</div>  
    
</div>
</div>
<?php include('../includes/bottom_js.php'); ?>    

</body>

</html>

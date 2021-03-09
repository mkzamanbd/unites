<?php
ob_start();
session_start();
include_once('../../connection/connection.php');
include('../includes/vus.php');

$id = $_GET['id'];


// for bill user validation ==================
$bill_q = mysqli_query($con,"SELECT * FROM expenditures WHERE id='$id' AND up_by='$u_name'");
$valid_user = mysqli_fetch_array($bill_q);
$aluser = $valid_user['up_by'];

if($aluser!==$u_name)
{
    header('location:reports.php');
}
if($aluser==$u_name)
{
    echo "";
}


$bill_q = mysqli_query($con,"SELECT * FROM expenditures WHERE id='$id'");
$row=mysqli_fetch_array($bill_q);
    
$voucher_no = $row['voucher_no'];
$inv_for = $row['inv_for'];
$purpose_of_exp = $row['purpose_of_exp'];
$amount_bdt = $row['amount_bdt'];
$amount_sgd = $row['amount_sgd'];
$approved = $row['approved'];
$processed = $row['processed'];
$scan_doc = $row['scan_doc'];
$processed_by = $row['processed_by'];
$date = $row['date'];
$up_by = $row['up_by'];



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
                    <h3 class="page-header">Dashboard</h3>
                </div>
            </div>

            <div class="row">
                <!---------------------------------------------------------->
                <div id="divToPrint"> 
                <div class="col-md-12">
                
                    
                    <div align="left">
                        <span style="font-weight:bold;">Voucher No. : <?php echo $voucher_no; ?></span>
                        <br><br><br>
                    </div>
                        <table class="table table-condensed table-hover">
                            <thead>
                              <tr>
                                <th colspan="3">Bill Details</th>
                              </tr>
                            </thead>
                            
                                <tr>
                                    <td> Employee Name</td>
                                    <td>:</td>
                                    <td><?php echo $inv_for; ?></td>
                                </tr>
                            
                                <tr>
                                    <td> Bill Purpose</td>
                                    <td>:</td>
                                    <td><?php echo $purpose_of_exp; ?></td>
                                </tr>
                            
                                <tr>
                                    <td> Amount in BDT.</td>
                                    <td>:</td>
                                    <td><?php echo $amount_bdt."/= Tk"; ?></td>
                                </tr>
                            
                                <tr>
                                    <td> Amount in SGD.</td>
                                    <td>:</td>
                                    <td><?php echo "S$. ".round($amount_sgd,2); ?></td>
                                </tr>
                            
                                <tr>
                                    <td> Bill Approval Status</td>
                                    <td>:</td>
                                    <td><?php echo $approved; ?></td>
                                </tr>
                            
                                <tr>
                                    <td> Bill Processing Status</td>
                                    <td>:</td>
                                    <td><?php echo $processed; ?></td>
                                </tr>
                            
                                <tr>
                                    <td> Scanned Copy of Bill</td>
                                    <td>:</td>
                                    <td><a target="_blank" href='../../scanned_docs/<?php echo $scan_doc; ?>'>View Scanned Bill</a></td>
                                </tr>
                            
                                <tr>
                                    <td> Date</td>
                                    <td>:</td>
                                    <td><?php echo $date; ?></td>
                                </tr>
                            
                                <tr>
                                    <td colspan="3"><br><br></td>
                                    
                                </tr>
                            
                                <tr>
                                    <td>Uploaded By</td>
                                    <td>:</td>
                                    <td><?php echo $processed_by; ?></td>
                                </tr>
                                
                            
                        </table>


                    
                </div>
                <br>
                
                
                    
                <a class="btn btn-info btn-sm pull-right" onclick="PrintDiv();"><i class="fas fa-print"></i> Print</a>
                <!------------------------------------------------------>
                </div>
                
                
            </div>

        </div>
    </div>
    <?php include('../includes/bottom_js.php'); ?>

</body>

</html>
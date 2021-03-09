<?php
ob_start();
session_start();
include_once('../../connection/connection.php');
include('../includes/vus.php');
error_reporting(0);
$voucher_no = "VCH-" . date('ymd') . time();





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
            <div class="row print-none">
                <div class="col-lg-12">
                    <h3 class="page-header">Reports</h3>
                </div>
                <form action="reports.php" method="post" class="col-md-12 well">

                    <div class="form-group col-md-3">
                        <label>Date From</label>
                        <input type="date" name="date_from" class="form-control">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Date To</label>
                        <input type="date" name="date_to" class="form-control">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Purpose of Expenditure</label>
                        <select name="purpose_of_exp" class="form-control">
                            <?php
                            $type_q = mysqli_query($con, "SELECT * FROM expenditure_types ORDER BY id");
                            while ($type_row = mysqli_fetch_array($type_q)) {
                                echo "<option>" . $type_row['e_type'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <br>

                    <div class="form-group col-md-3">
                        <input type="submit" name="search_btn" class="btn btn-primary btn-sm pull-right" value="Search">
                    </div>
                </form>
            </div>

            <div class="row">
                <!---------------------------------------------------------->
                <div class="col-md-12">
                    <div id="divToPrint">


                        <table class="table table-condensed">
                            <thead style="background-color:#94C4D5">
                                <tr>
                                    <th>Inv. For</th>
                                    <th>BDT Amount</th>
                                    <th>SGD Amount</th>
                                    <th>USD Amount</th>
                                    <th>Approved</th>
                                    <th>Porcessed</th>
                                    <th>Bill Date</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                if (isset($_POST['search_btn'])) {
                                    $date_from = $_POST['date_from'];
                                    $date_to = $_POST['date_to'];
                                    $purpose_of_exp = $_POST['purpose_of_exp'];


                                    if ($purpose_of_exp === 'All') {
                                        $q = mysqli_query($con, "SELECT * FROM expenditures WHERE date BETWEEN '$date_from' AND '$date_to'");
                                    } else {
                                        $q = mysqli_query($con, "SELECT * FROM expenditures WHERE purpose_of_exp='$purpose_of_exp' AND date BETWEEN '$date_from' AND '$date_to'");
                                    }
                                } else {
                                    $q = mysqli_query($con, "SELECT * FROM expenditures");
                                }



                                $num_rows = mysqli_num_rows($q);

                                $heading = "<div align='center'><h4>" . $purpose_of_exp . " Bill Report From <span style='color:#075C99'>" . $date_from . "</span> To <span style='color:#075C99'>" . $date_to . "</span></h4><h5> Total " . $num_rows . " Found</h5><hr></div>";
                                echo $heading;


                                // calculate total bdt amount for different types ===================== //
                                $bdt_q = mysqli_query($con, "SELECT SUM(amount_bdt) AS total_bdt FROM expenditures WHERE purpose_of_exp='$purpose_of_exp' AND date BETWEEN '$date_from' AND '$date_to'");
                                $bdtq_row = mysqli_fetch_array($bdt_q);

                                // calculate total sgd amount for different types ===================== //
                                $sgd_q = mysqli_query($con, "SELECT SUM(amount_sgd) AS total_sgd FROM expenditures WHERE purpose_of_exp='$purpose_of_exp' AND date BETWEEN '$date_from' AND '$date_to'");
                                $sgdq_row = mysqli_fetch_array($sgd_q);

                                // calculate total usd amount for different types ===================== //
                                $usd_q = mysqli_query($con, "SELECT SUM(amount_usd) AS total_sgd FROM expenditures WHERE purpose_of_exp='$purpose_of_exp' AND date BETWEEN '$date_from' AND '$date_to'");
                                $sgdq_row = mysqli_fetch_array($sgd_q);

                                // calculate total bdt amount for all types ===================== //
                                $bdt_q = mysqli_query($con, "SELECT SUM(amount_bdt) AS total_bdt FROM expenditures WHERE date BETWEEN '$date_from' AND '$date_to'");
                                $bdtq_row = mysqli_fetch_array($bdt_q);

                                // calculate total usd amount for all types ===================== //
                                $sgd_q = mysqli_query($con, "SELECT SUM(amount_sgd) AS total_sgd FROM expenditures WHERE date BETWEEN '$date_from' AND '$date_to'");
                                $sgdq_row = mysqli_fetch_array($sgd_q);

                                // calculate total usd amount for all types ===================== //
                                $usd_q = mysqli_query($con, "SELECT SUM(amount_usd) AS total_usd FROM expenditures WHERE date BETWEEN '$date_from' AND '$date_to'");
                                $usdq_row = mysqli_fetch_array($usd_q);


                                while ($row = mysqli_fetch_array($q)) {
                                    echo "<tr><td>" . $row['inv_for'] . "</td><td>BDT. " . $row['amount_bdt'] . "</td><td>S$ " . round($row['amount_sgd'], 2) . "</td><td>S$ " . round($row['amount_usd'], 2) . "</td><td><strong style='color:green'><a style='color:#000;text-decoration:none' target='_blank' href='approve_bill.php?id=" . $row['id'] . "'>" . $row['approved'] . "</a></strong></td><td>" . $row['porcessed'] . "</td><td>" . $row['date'] . "</td><td><a target='_blank' href='view_bill.php?id=" . $row['id'] . "' class='btn btn-success btn-xs'> <i class='far fa-eye'></i> View</a></td></tr>";
                                }

                                ?>
                                <tr style="font-weight:bold">
                                    <td></td>
                                    <td>BDT. <?php echo round($bdtq_row['total_bdt'], 2); ?></td>
                                    <td>S$ <?php echo round($sgdq_row['total_sgd'], 2); ?></td>
                                    <td>USD$. <?php echo round($usdq_row['total_usd'], 2); ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!------------------------------------------------------>
                </div>

                <a class="btn btn-info btn-sm pull-right" onclick="window.print();"><i class="fas fa-print"></i> Print</a>
            </div>

        </div>
    </div>
    <?php include('../includes/bottom_js.php'); ?>

</body>

</html>
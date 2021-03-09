<?php
ob_start();
session_start();
include_once('../../connection/connection.php');
include_once('vus.php');


if(isset($_POST['create_user_btn']))
{
    $name = ucwords($_POST['name']);
    $user_name = $_POST['user_name'];
    $user_password = md5($_POST['user_password']);
    
    $uchk = mysqli_query($con,"SELECT * FROM users WHERE user_name='$user_name'");
    $user_chk = mysqli_num_rows($uchk);
    if($user_chk>0)
    {
        echo "<script>alert('User already exist')</script>";
    }
    else
    {
        $user_q = mysqli_query($con,"INSERT INTO users(name,user_name,user_password) VALUES('$name','$user_name','$user_password')");
        
        if($user_q)
        {
            echo "<script>alert('User Created')</script>";   
        }
        else
        {
            echo "<script>alert('Failed')</script>";
        }
    }
       
}

// to create expendature type --------------------
if(isset($_POST['expenditure_types_btn']))
{
    $e_type = ucwords($_POST['e_type']);
    
     $e_q = mysqli_query($con,"INSERT INTO expenditure_types(e_type) VALUES('$e_type')");
        
        if($e_q)
        {
            echo "<script>alert('Expenditure Type Created')</script>";   
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill App</title>
    <link rel="icon" href="../../images/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <style>
      
    </style>
</head>
    
<body>
<div class="col-md-12">
    <br>
    <span class="pull-right"><a href="logout.php" class="btn btn-danger">Logout</a></span><br>
    <hr>
    <?php echo '<br>Current PHP version: ' . phpversion(); ?>
    <div class="well">
        <?php
            // for currency monitoring -----------------
                function convertCurrency($amount,$from_currency,$to_currency)
                {
                    //$apikey = 'your-api-key-here';

                    $from_Currency = urlencode($from_currency);
                    $to_Currency = urlencode($to_currency);
                    $query =  "{$from_Currency}_{$to_Currency}";

                    $json = file_get_contents("https://free.currencyconverterapi.com/api/v6/convert?q={$query}&compact=ultra");
                    $obj = json_decode($json, true);

                    $val = floatval($obj["$query"]);


                    $total = $val * $amount;
                    return number_format($total, 2, '.', '');
                }

            //uncomment to test
            echo "<b>1 S$ = BDT. ".convertCurrency(1, 'SGD', 'BDT')."/= Tk on ".date('d-m-Y');

            echo "<br>1 USD$ = BDT. ".convertCurrency(1, 'USD', 'BDT')."/= Tk on ".date('d-m-Y')."</b>";
        
        ?>
    </div>
    
</div>
    

<div class="col-md-12">
<?php
// total bill entry amount till now ----------------- 
    $bdt_q=mysqli_query($con,"SELECT SUM(amount_bdt) AS total_bdt FROM expenditures");
    $bdtq_row = mysqli_fetch_array($bdt_q);
    
// calculate total sgd amount for all types ===================== //
    $sgd_q=mysqli_query($con,"SELECT SUM(amount_sgd) AS total_sgd FROM expenditures");
    $sgdq_row = mysqli_fetch_array($sgd_q);
    
// calculate total usd amount for all types ===================== //
    $usd_q=mysqli_query($con,"SELECT SUM(amount_usd) AS total_usd FROM expenditures");
    $usdq_row = mysqli_fetch_array($usd_q);
?>

<div class="col-md-6 well">
<table class="table table-bordered">
<tr style="background-color:#93B2C1;font-weight:bold">
    <td colspan="2">Summery</td>
</tr>
<tr>
    <td>Total Bill Amount in BDT Till Now</td>
    <td><?php echo $bdtq_row['total_bdt']." /Tk"; ?></td>
</tr>  
<tr>
    <td>Total Bill Amount in SGD Till Now</td>
    <td><?php echo round($sgdq_row['total_sgd'],2)." S$"; ?></td>
</tr> 
    
<tr>
    <td>Total Bill Amount in USD Till Now</td>
    <td><?php echo round($usdq_row['total_usd'],2)." USD"; ?></td>
</tr> 
    
</table>    
</div>
    


</div>    
    
<div class="col-md-12">
    <div class="col-md-4 well">
        <table class="table table-bordered">
            <tr style="background-color:#93B2C1;font-weight:bold">
                <td colspan="3">Approval Users</td>    
            </tr>
            <tr>
                <td>Name</td>
                <td>User Name</td>
                <td>Date Created</td>
            </tr>
            <?php
                $muser_q = mysqli_query($con,"SELECT * FROM master_user");
                while($muser_row = mysqli_fetch_array($muser_q))
                {
                    echo "<tr><td>".$muser_row['name']."</td><td>".$muser_row['muser_name']."</td><td>".$muser_row['date']."</td></tr>";
                }
    
            ?>
    
        </table>    
    </div>  
    
    <div class="col-md-4 well">
        <table class="table table-bordered">
            <tr style="background-color:#93B2C1;font-weight:bold">
                <td colspan="3">Admin Users</td>    
            </tr>
            <tr>
                <td>Name</td>
                <td>User Name</td>
                <td>Date Created</td>
            </tr>
            <?php
                $auser_q = mysqli_query($con,"SELECT * FROM admin_users");
                while($auser_row = mysqli_fetch_array($auser_q))
                {
                    echo "<tr><td>".$auser_row['name']."</td><td>".$auser_row['auser_name']."</td><td>".$auser_row['date']."</td></tr>";
                }
    
            ?>
    
        </table>    
    </div> 
    
    <div class="col-md-4 well">
        <table class="table table-bordered">
            <tr style="background-color:#93B2C1;font-weight:bold">
                <td colspan="3">General Users</td>    
            </tr>
            <tr>
                <td>Name</td>
                <td>User Name</td>
                <td>Date Created</td>
            </tr>
            <?php
                $user_q = mysqli_query($con,"SELECT * FROM users");
                while($user_row = mysqli_fetch_array($user_q))
                {
                    echo "<tr><td>".$user_row['name']."</td><td>".$user_row['user_name']."</td><td>".$user_row['date']."</td></tr>";
                }
    
            ?>
    
        </table>    
    </div> 
    
</div>
    
<div class="col-md-12">
<div class="col-md-4 well">
    <h4>Create User</h4><hr>
        <form action="index.php" method="post">
            <div class="form-group">
                <label>Full Name Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            
            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="user_name" class="form-control">
            </div>
            
            <div class="form-group">
                <label>User Password</label>
                <input type="text" name="user_password" class="form-control">
            </div>
            
            <div class="form-group">
                <input type="submit" name="create_user_btn" value="Create User" class="btn btn-primary btn-sm pull-right">
            </div>
        </form>
</div> 
    

<div class="col-md-4 well">
    <h4>Create Expenditure Type</h4><hr>
        <form action="index.php" method="post">
            <div class="form-group">
                <label>Expenditure Type</label>
                <input type="text" name="e_type" class="form-control">
            </div>
            
            <div class="form-group">
                <input type="submit" name="expenditure_types_btn" value="Create Type" class="btn btn-primary btn-sm pull-right">
            </div>
        </form>
</div> 
</div>
    
<div class="col-md-12">
    <a href="database_backup.php">Database Backup</a>
</div>
</body>
</html>

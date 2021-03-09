<?php
ob_start();
session_start();
include_once('../connection/connection.php');

if(isset($_POST['login_btn']))
    {
    $user_name = $_POST['user_name'];
    $user_password = md5($_POST['user_password']);
    
    $check = mysqli_query($con,"SELECT * FROM users WHERE user_name='$user_name' AND user_password='$user_password'");
    
    $run_check = mysqli_num_rows($check);
    
    if($run_check==1)
    {   
        $_SESSION['user_name']= $user_name;
        $_SESSION['user_password']= $user_password;
        
        
        function convertCurrency($amount,$from_currency,$to_currency){
        $apikey = 'c3845d032b41ed1757ea';

        $from_Currency = urlencode($from_currency);
        $to_Currency = urlencode($to_currency);
        $query =  "{$from_Currency}_{$to_Currency}";

        // $json = file_get_contents("https://free.currencyconverterapi.com/api/v6/convert?q={$query}&compact=ultra"); // old api
        $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey=$apikey");
        $obj = json_decode($json, true);

        $val = floatval($obj["$query"]);


        $total = $val * $amount;
        return number_format($total, 2, '.', '');
            
            
        }
        
        $up_date = date('Y-m-d');
        // mysqli_query($con,"UPDATE currency SET sg_rate='$sg_rate',usd_rate='$usd_rate',date='$up_date',up_by='Auto API' WHERE id='1'");
		
		// check already inserted today's currency rate
		
		$currency_rate_existed_query = "SELECT * FROM currency where date='$up_date'";
		$currency_rate_existed_result = mysqli_query($con, $currency_rate_existed_query);		
		
		// if has not exists
		if(mysqli_num_rows($currency_rate_existed_result) < 1){
			
			//uncomment to test
			$sg_rate = convertCurrency(1, 'SGD', 'BDT');
			$usd_rate = convertCurrency(1, 'USD', 'BDT');
			
			$ratesgd = round($sg_rate,4);
			$rateusd = round($usd_rate,4);
			
			if($sg_rate == '0'){
				$sg_rate = '63.88';
			}
			
			if($usd_rate == '0'){
				$usd_rate = '84.79';
			}
			$up_by = "https://free.currconv.com";
		
			// insert today's currency rate
			$currency_rate_insert_query = "INSERT INTO currency (sg_rate, usd_rate, date, up_by) VALUES('$sg_rate', '$usd_rate', '$up_date', '$up_by')";
			
			mysqli_query($con, $currency_rate_insert_query);
		}
		
		
        header('location:dir/index.php'); 
    }
    else
    {
        echo "<script>alert('Wrong Login Information !!!')</script>";
    }
    }

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bill App</title>
    <link rel="icon" href="images/logo.png">
    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="index.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="user_name" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="user_password" type="password">
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <input class="btn btn-primary btn-sm" name="login_btn" type="submit" value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

</body>

</html>

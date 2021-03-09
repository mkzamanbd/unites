<?php
ob_start();
session_start();
include_once('../connection/connection.php');

if(isset($_POST['login_btn']))
    {
    $user_name = $_POST['user_name'];
    $user_password = md5($_POST['user_password']);
    
    $check = mysqli_query($con,"SELECT * FROM admin_users WHERE auser_name='$user_name' AND auser_password='$user_password'");
    
    $run_check = mysqli_num_rows($check);
    
    if($run_check==1)
    {   
        $_SESSION['auser_name']= $user_name;
        $_SESSION['auser_password']= $user_password;
        
       
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

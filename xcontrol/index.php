<?php
ob_start();
session_start();
include_once('../connection/connection.php');

if(isset($_POST['login_x_btn']))
    {
    $user_name = $_POST['xuser_name'];
    $user_password = md5($_POST['xuser_password']);
    
    $check = mysqli_query($con,"SELECT * FROM xuser WHERE xuser_name='$user_name' AND xuser_password='$user_password'");
    
    $run_check = mysqli_num_rows($check);
    
    if($run_check==1)
    {   
        $_SESSION['xuser_name']= $user_name;
        $_SESSION['xuser_password']= $user_password;
        
       
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
    <link rel="icon" href="../images/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
    
<body>
<div class="col-md-4"></div>
    
    <div align="center">
        <br><br>
        <div class="card col-md-4">
        
        <h4>X User Login</h4>
        <form action="index.php" method="post">
            <div class="form-group">
                <label>User ID</label>
                <input type="text" name="xuser_name" class="form-control" required>
            </div>
        
            <div class="form-group">
                <label>User Passkey</label>
                <input type="password" name="xuser_password" class="form-control" required>
            </div>
            
            <div class="form-group">
                <input type="submit" name="login_x_btn" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>
    </div>
    
<div class="col-md-4"></div>
</body>
</html>
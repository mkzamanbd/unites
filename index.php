<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bill App</title>
    <link rel="icon" href="images/logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
    <style>
        a{
            color: aliceblue;
            text-decoration: none;
        }
        a:hover{
            color: aliceblue;
            text-decoration: none;
        }
        li
        {
            list-style: none;
            margin: 15px;
            padding: 15px;
            background-color: cadetblue;
            color: aliceblue;
            font-weight: bold;
            font-size: 16px;
            border-radius: 5px;
        }
        li:hover
        {
            transition: .250s;
            box-shadow: 3px 3px 3px black;
            padding-left: 30px;
        }
        .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color:cadetblue;
                color: white;
                text-align: center;
                font-size: 10px;
            letter-spacing: .1em;
                }
    </style>
</head>
<body>
<div align="center">
    <div class="jumbotron">
        <h1>Bill App</h1>
        <p>Easy Online Bill Management System</p> 
        <span style="font-size:11px;">By Confidence Coder Group</p>
    </div>
  

<div align="center">
    
        <ul style="width:400px">
            <a href="master/index.php"><li><i class="far fa-thumbs-up"></i> Bill Approval Panel</li></a>
            <a href="admin/index.php"><li><i class="fas fa-chalkboard-teacher"></i> Bill Processing Panel</li></a>
            <a href="users/index.php"><li><i class="fas fa-file-invoice-dollar"></i> Bill Entry Panel</li></a>
        </ul>
        
</div>

    
    
<div class="footer">
    <div align="center">
        <b>By Confidence Coder Group</b><br>
        <b>+8801768137010</b>
    </div>
</div>
   
</div>
</body>
</html>
<?php
include_once('../../connection/connection.php');

$user_name = $_SESSION['user_name'];
$q = mysqli_query($con,"SELECT * FROM users WHERE user_name='$user_name'");
$row = mysqli_fetch_array($q);

$permission = $row['permission'];

if($permission=='No')
{
    $style='none';
}
else
{
    $style='';
}
?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"> Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li style="background-color:#AECAE8;"><a href="#" style="font-weight:bold;"><?php echo $row['name']; ?> </a>
                        </li>
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                      
                        
                        <li>
                            <a href="entry_form.php"><i class="fas fa-edit"></i> Bill Entry</a>
                        </li>
                        
                        <li>
                            <a href="reports.php"><i class="fas fa-clipboard-list"></i> Reports</a>
                        </li>
                        
                        <li>
                            <a href="bill_history.php"><i class="fas fa-history"></i> Bill History</a>
                        </li>
                    </ul>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    
                    <span style="font-size:9px;font-weight:bold;color:#073181">
                    <a href="../../developer.php">Developer</a>
                    </span>
                    
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
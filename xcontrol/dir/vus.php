<?php
ob_start();
include_once('../../connection/connection.php');
//==================== verify session user ====================
if (isset($_SESSION['xuser_name']) && $_SESSION['xuser_password'] == true) 
{
  $u_name = $_SESSION['xuser_name'];  
    
    
} 
else
{
   header('Location:../../index.php');
}
//=============================================================



?>
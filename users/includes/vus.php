<?php
ob_start();
include_once('../../connection/connection.php');
//==================== verify session user ====================
if (isset($_SESSION['user_name']) && $_SESSION['user_password'] == true) 
{
  $u_name = $_SESSION['user_name'];  
    
    
} 
else
{
   header('Location:../../index.php');
}
//=============================================================



?>
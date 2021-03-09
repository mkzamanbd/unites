<?php
ob_start();
include_once('../../connection/connection.php');
//==================== verify session user ====================
if (isset($_SESSION['auser_name']) && $_SESSION['auser_password'] == true) 
{
  $u_name = $_SESSION['auser_name'];  
} 
else 
{
   header('Location:../../index.php');
}
//=============================================================
?>
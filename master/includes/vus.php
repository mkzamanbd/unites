<?php
ob_start();
include_once('../../connection/connection.php');
//==================== verify session user ====================
if (isset($_SESSION['muser_name']) && $_SESSION['muser_password'] == true) 
{
  $u_name = $_SESSION['muser_name'];  
} 
else 
{
   header('Location:../../index.php');
}
//=============================================================
?>
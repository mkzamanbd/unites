<?php
session_start();
include_once('../../connection/connection.php');

   session_start();
    unset($_SESSION['username']);
    session_destroy();

    header("Location: ../../index.php");
exit;
    

?>

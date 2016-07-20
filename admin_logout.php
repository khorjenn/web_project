<?php

session_start();

if(session_destroy())
    {
    unset($_SESSION['adminSession']);
    header("Location: admin_login.php");
    }
?>
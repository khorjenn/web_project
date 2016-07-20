<?php

session_start();

if(session_destroy())
    {
    unset($_SESSION['userSession']);
    header("Location: index.php");
    }
?>
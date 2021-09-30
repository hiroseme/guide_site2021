<?php
session_start();
session_destroy(); //destroy the session - log out
header("Location:login.php"); //takes user back to log in
?>
<?php
session_start(); 
include "connection.php";

session_unset();
session_destroy();

header("location:login.php");
?>
<?php
include("connection.php");
session_start();
if(!isset($_SESSION['id'])){
    die(header("location:login.php"));
}
?>


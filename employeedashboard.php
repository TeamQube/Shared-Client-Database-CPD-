<?php
session_start();
if(!isset($_SESSION["emp"]))
{header("location:employee-login.php");}
else{include("employeeheader.php"); ?>
 
  

   
 
 
 
 <?php include("footer.php"); }?>


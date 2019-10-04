<?php 
session_start();
if(!isset($_SESSION['username']))
{header("location:login.php");}
else{include("header.php"); ?>   

        
<?php include("footer.php"); }?>
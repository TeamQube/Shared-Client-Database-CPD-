<?php
session_start();
if(!isset($_SESSION["facultyname"]))
{header("location:login.php");}
else{include("facultyheader.php"); ?>




<?php include("footer.php");} ?>

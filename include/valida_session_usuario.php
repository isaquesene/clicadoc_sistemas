<?php
session_start();

if(!isset($_SESSION["clicadoc_user_nom"])) {    
     header("Location: ./logout.php");
     exit;   
}
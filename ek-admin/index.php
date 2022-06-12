<?php 
require_once("../config.php");
if(!isset($_SESSION["XlXaG"])){
include("./login.tpl");	
}else{
include("header.php");

if(isset($_GET['do'])){
$do = $_GET['do'];
}else{
$do = "main";
}

if(file_exists("inc.{$do}.php")){
	include("inc.{$do}.php");
}else{
	include("inc.404.php");
}
include "footer.php";
}

?>
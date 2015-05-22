<?php 
session_start();
$_SESSION['back_url_user']=$_SERVER['REQUEST_URI'];
if(!isset($_SESSION['user_id']))
{
	header("Location:index.php");
}
?>
<?php
// session_start();
include('includes/dbconnection.php');
function check_login()
{
	if(!isset($_SESSION['odmsaid']))
	{		
		header("Location: login.php");
	}
}
?>
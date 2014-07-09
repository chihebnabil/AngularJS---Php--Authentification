<?php 
require "db.php";

	session_start();
	if( isset($_SESSION['USERNAME']) ) print 'authentified';
?>
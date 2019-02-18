<?php
	require "db-connect.php";
	session_destroy();
	header("location:login.php");

?>
<?php
	require "db-connect.php";
	$id = $_GET['id'];
	$query = mysqli_query($connect, "DELETE * FROM contact WHERE id = '{$id}'");
	if ($query) {
		# code...
		header("location: list-contact.php?rel=success");
	}
?>
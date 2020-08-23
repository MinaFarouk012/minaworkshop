<?php include 'functions.php'; 


	$id = $_GET['id'];

	$query = "DELETE FROM employee WHERE id = '$id' ";
	$result = $con->query($query);


	if ($result) {
		header("Location: viewEmployees.php");
	}




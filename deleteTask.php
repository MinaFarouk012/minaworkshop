<?php include 'functions.php'; 


	$id = $_GET['id'];

	$query = "DELETE FROM tasks WHERE task_id = $id ";
	// print_r($query);

	$result = $con->query($query);


	if ($result) {
		header("Location: allTasks.php");
	}




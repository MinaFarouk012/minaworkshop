<?php include 'functions.php'; 

	$task_id = $_GET['task_id'];
	$description = $_POST['desc'];
	$task_name = $_POST['task_name'];
	$deadline = $_POST['deadline'];
	$status = $_POST['status'];

	$description = validate_input($description);
	$task_name = validate_input($task_name);
	$deadline = validate_input($deadline);
	$status = validate_input($status);
	

	
	$query = "UPDATE  tasks  SET  name = '$task_name', status = '$status', deadline = '$deadline', description = '$description' WHERE task_id = $task_id";
	print_r($query);


	$result = $con->query($query);


	if ($result) {
		header("Location: allTasks.php");
	}




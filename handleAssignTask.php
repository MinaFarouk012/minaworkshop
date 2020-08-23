<?php include 'functions.php'; 

	$task_id = $_GET['task_id'];
	$emp_id = $_POST['emp_id'];
	$task_name = $_POST['task_name'];
	$deadline = $_POST['deadline'];

	$emp_id = validate_input($emp_id);
	$task_name = validate_input($task_name);
	$deadline = validate_input($deadline);
	

	
	$query = "UPDATE  tasks  SET  name = '$task_name', employee_id = $emp_id, deadline = '$deadline' WHERE task_id = $task_id";
	print_r($query);


	$result = $con->query($query);


	if ($result) {
		header("Location: allTasks.php");
	}




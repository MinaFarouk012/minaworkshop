<?php include 'functions.php'; 


	$emp_id = $_POST['emp_id'];
	$task_name = $_POST['task_name'];
	$desc = $_POST['desc'];
	$status = $_POST['status'];
	$deadline = $_POST['deadline'];


	if (empty($task_name)) {
		header("Location: addTask.php");
	}

	$emp_id = validate_input($emp_id);
	$task_name = validate_input($task_name);
	$desc = validate_input($desc);
	$status = validate_input($status);
	$deadline = validate_input($deadline);

	$query = "INSERT INTO `tasks`( `name`, `description`, `status`, `employee_id`, `deadline`) VALUES ('$task_name', '$desc', '$status','$emp_id','$deadline')";

	$result = $con->query($query);


	if ($result) {
		header("Location: allTasks.php");
	}




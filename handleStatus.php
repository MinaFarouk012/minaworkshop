<?php include 'functions.php'; 

	$emp_id = $_SESSION['id'];

	$tid = $_GET['tid'];
	
	$query = "SELECT tasks.status, tasks.task_id FROM tasks WHERE task_id = $tid AND employee_id = " . $emp_id;

	$result = $con->query($query);

	$row = $result->fetch_assoc();




	if ($row['status'] == 'in_progress') {
		$query = "UPDATE tasks SET status = 'completed' WHERE task_id = $tid";
	}
	elseif ($row['status'] == 'completed') {
		$query = "UPDATE tasks SET status = 'in_progress' WHERE task_id = $tid";
	}

	$result = $con->query($query);

	if ($result) {
		header('Location: myTasks.php');
	}



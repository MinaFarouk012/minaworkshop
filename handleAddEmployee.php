<?php include 'functions.php'; 


	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$city = $_POST['city'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$birthday = $_POST['birthday'];

	$name = validate_input($name);
	$email = validate_input($email);
	$password = validate_input($password);
	$city = validate_input($city);
	$gender = validate_input($gender);
	$phone = validate_input($phone);


	$query = "INSERT INTO employee( name, email, password, city, gender, phone, birthday) VALUES ('$name', '$email', '$password', '$city', '$gender', '$phone', '$birthday')";
	// print_r($query);die;

	$result = $con->query($query);


	if ($result) {
		header("Location: index.php");
	}




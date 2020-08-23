<?php include 'functions.php'; 

	$id = $_GET['id'];
	$name = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$city = $_POST['city'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$description = $_POST['description'];
	$image = $_FILES['image'];
	$image_src = $_FILES['image']['tmp_name'];
	$image_name = $_FILES['image']['name'];
	$image_name = time() . "_work_" . time() . $image_name;
	$targetFolder="images/";

	$name = validate_input($name);
	$lastName = validate_input($lastName);
	$email = validate_input($email);
	$password = validate_input($password);
	$city = validate_input($city);
	$gender = validate_input($gender);
	$phone = validate_input($phone);
	$description = validate_input($description);


	$path=$targetFolder.$image_name;
	if(move_uploaded_file($image_src,$path) == true)
	{
	    // echo "uploaded successfully <br/>";

	}else{
	    // echo "some error <br/>";
	}

	if (isset($_SESSION['is_admin'])) {
	    $status_user = $_SESSION['is_admin'];
	}
	else {
	    $status_user = '';
	}

	if ($email && $status_user != 'admin' ) {
	    $query = "UPDATE  employee  SET  name = '$name', description = '$description', email = '$email', image = '$image_name', phone = '$phone', password = '$password', city = '$city', gender = '$gender', last_name = '$lastName' WHERE id = '$id'";
	}
	elseif ($email && $status_user == 'admin') {
	    $query = "UPDATE  admins  SET  name = '$name', description = '$description', email = '$email', image = '$image_name', phone = '$phone', password = '$password', city = '$city', gender = '$gender', last_name = '$lastName' WHERE id = '$id'";
	}
	
	

	$result = $con->query($query);


	if ($result) {
		header("Location: index.php");
	}




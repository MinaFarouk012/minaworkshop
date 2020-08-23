<?php include 'functions.php'; 


$email = $_POST['email'] ? $_POST['email']: 'valid mail';
$password = $_POST['password'] ? $_POST['password']: 'valid password';


if (!$email or !$password) {
	header('Location: admLogin.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = validate_input($email);
	$password = validate_input($password);
}

	$query = "SELECT email, password FROM admins WHERE email = '$email' AND password = '$password' ";
	// echo $query;die;

	$result=$con->query($query);

	if ($result) {
		if ($result->num_rows > 0) {

			$_SESSION['email'] = $email;
			$_SESSION['is_admin'] = 'admin';

			header("Location: index.php");
		
		}
		else {

			$_SESSION['message'] = 'fail';

			header("Location: admLogin.php");
		}
	}





<?php include 'functions.php'; 


$email = $_POST['email'] ? $_POST['email']: 'valid mail';
$password = $_POST['password'] ? $_POST['password']: 'valid password';


if (!$email or !$password) {
	header('Location: empLogin.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = validate_input($email);
	$password = validate_input($password);
}

	$query = "SELECT id, name, email, password FROM employee WHERE email = '$email' AND password = '$password' ";

	$result=$con->query($query);
	$id = $result->fetch_assoc();

	if ($result) {
		if ($result->num_rows > 0) {

			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			$_SESSION['id'] = $id['id'];
			$_SESSION['name'] = $id['name'];

			header("Location: index.php");
		
		}
		else {

			$_SESSION['message'] = 'fail';

			header("Location: empLogin.php");
		}
	}





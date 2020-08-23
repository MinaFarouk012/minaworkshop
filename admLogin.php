<?php include 'header.php'; 
 if(isset($_SESSION['email'])){
 	header("Location: index.php");
 }


 
             
?>
<div class="loginbox">
    <img src="images/admin.png" class="avatar">
        <h1>Login Here</h1>
        <?php if (isset($_SESSION['message']) && $_SESSION['message'] == 'fail' ) {?>
        	<div class="alert alert-danger" role="alert">
        	  Valid or Empty Email or Password
        	</div>
        <?php session_unset(); } ?>
        <form action="handleAdmLogin.php" method="POST">
            <p>Email</p>
            <input type="text" name="email" placeholder="Enter Email Address" required="required">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required="required">
            <input type="submit" name="login-submit" value="Login">
        </form>   
</div>

<?php include 'footer.php'; ?>
<?php include 'header.php'; 
 include 'functions.php'; 

$email = $_SESSION['email'];
if (isset($_SESSION['is_admin'])) {
    $status_user = $_SESSION['is_admin'];
}
else {
    $status_user = '';
}

if ($email && $status_user != 'admin' ) {
    $query = "SELECT * FROM employee WHERE email = '$email' ";
}
elseif ($email && $status_user == 'admin') {
    $query = "SELECT * FROM admins WHERE email = '$email' ";
}


$result = $con->query($query);


// $row[''];
// $row['image'];
if ($result) {
$row = $result->fetch_assoc();

?>
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    
                    <form action="handleProfile.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">

                        <div class="d-flex justify-content-center">
                            <img class="rounded-circle" width="20%" height="20%" align="center" src="images/<?php echo $row['image']; ?>">
                        </div> 
                        <div class="input-group ">
                        <h2 class="title" >My Info</h2>
                        </div> 
                        <div class="row row-space">
                            <div class="col-5">
                                <div class="input-group">
                                  <p>First Name</p>
                                     <input class="input--style-1" type="text" name="firstName" value="<?php echo $row['name']; ?>"  />
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                  <p>Last Name</p>
                                    <input class="input--style-1" type="text" name="lastName" value="<?php echo $row['last_name']; ?>" >
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                          <p>Email</p>
                            <input class="input--style-1" type="email"  name="email" value="<?php echo $row['email']; ?>" >
                        </div>
                        <div class="input-group">
                          <p>Image</p>
                            <input class="input--style-1" type="file"  name="image" >
                        </div>

                        <div class="input-group">
                          <p>Password</p>
                            <input class="input--style-1" style="color: #666;" type="password"  name="password" value="<?php echo $row['password']; ?>" >
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-5">
                                <div class="input-group">
                                  <p>City</p>
                                    <input class="input--style-1" type="text" name="city" value="<?php echo $row['city']; ?>" >
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                  <p>Gender</p>
                                  <input class="input--style-1" type="text" name="gender" value="<?php echo $row['gender']; ?>" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-group">
                          <p>Phone Number</p>
                            <input class="input--style-1" type="text" name="phone" value="<?php echo $row['phone']; ?>" >
                        </div>
                        <div class="form-group">
                            <label style="color: #666;" for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control textarea-style" name="description" rows="3" width="100"><?php echo $row['description']; ?></textarea>
                        </div>


                        <div class="p-t-20 w-25" >
                            <input type="submit" value="Update Info" class="btn btn--radius btn--green" name="send" />
                            <!-- <button class="btn btn--radius btn--green"  name="send" >Update Info</button> -->
                        </div>
                    </form>
                        <?php
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
    
<?php include 'footer.php'; ?>
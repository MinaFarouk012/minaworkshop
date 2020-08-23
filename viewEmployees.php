<?php include 'header.php';
      include 'functions.php'; 

      $query = "SELECT * FROM employee";
      $result = $con->query($query);
?>

    <h2 class="task_title mb-5">Empolyees</h2>
    <div class="d-flex justify-content-center mb-5"><a href="/work.loc/addEmployee.php" class="btn btn-secondary">Add New Empolyee</a></div>
	<table>
        <tr>
			<th align = "center">Emp.ID</th>
      <th align = "center">Emp Photo</th>
			<th align = "center">Name</th>
			<th align = "center">Email</th>
			<th align = "center">Birthday</th>
			<th align = "center">Gender</th>
            <th align = "center">Options</th>
		</tr>
       <?php
       if ($result) {
           while($row = $result->fetch_assoc()){?> 
             <tr>
               <td><?php echo $row['id']; ?></td>
               <td><img class="rounded-circle" width="12%" src="images/<?php echo $row['image']; ?>"></td>
               <td><?php echo $row['name']; ?></td>
               <td><?php echo $row['email']; ?></td>
               <td><?php echo $row['birthday']; ?></td>
               <td><?php echo $row['gender']; ?></td>
               <td><a href="/work.loc/deleteEmployee.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
             </tr>
        <?php
            }
        }
        ?>
	</table>
<?php include 'footer.php'; ?>       
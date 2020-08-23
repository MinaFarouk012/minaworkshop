<?php include 'header.php'; 
    include 'functions.php';

    $query = "SELECT employee.id, employee.name as emp_name, tasks.name as task_name, tasks.deadline, tasks.description, tasks.status, tasks.task_id, tasks.employee_id FROM tasks JOIN employee ON tasks.employee_id = employee.id";
    $result = $con->query($query);

?>
    

    <h2 class="task_title" >Empolyee Leaderboard</h2>
    <div class="d-flex justify-content-center mb-5"><a href="/work.loc/addTask.php" class="btn btn-secondary">Add New Task</a></div>
    <table>

		<tr bgcolor="#000">
			<th align = "center">emp_id</th>
			<th align = "center">emp_name</th>
			<th align = "center">task_name</th>
			<th align = "center">desc</th>
            <th align = "center">status</th>
            <th align = "center">Deadline</th>
            <th align = "center">Action</th>
			       
        </tr>
        <?php
        if ($result) {
            while($row = $result->fetch_assoc()){?> 
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['emp_name']; ?></td>
                <td><?php echo $row['task_name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['deadline']; ?></td>
                <td>
                    <a href="/work.loc/editTask.php?id=<?php echo $row['task_id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="/work.loc/deleteTask.php?id=<?php echo $row['task_id']; ?>" class="btn btn-danger">Delete</a>
                    <a href="/work.loc/assignTask.php?id=<?php echo $row['task_id']; ?>" class="btn btn-primary">Assign to</a>
                </td>
              </tr>
         <?php
             }
         }
         ?>
            
            

	</table>
    
<?php include 'footer.php'; ?>
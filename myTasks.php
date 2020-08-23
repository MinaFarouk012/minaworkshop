<?php include 'header.php'; 
 include 'functions.php'; 

$email = $_SESSION['email'];

$query = "SELECT employee.id, employee.name as name_emp, tasks.task_id, tasks.name as name_task, tasks.deadline, tasks.description, tasks.status, tasks.employee_id FROM `tasks` JOIN employee ON employee.id = tasks.employee_id where employee.email = '$email'";

// echo $query;die;

$result = $con->query($query);

?>

<div class="container">
    <h2 class="task_title">Empolyee Leaderboard</h2>
      
    
    <table>

            <tr bgcolor="#000">
                <th align = "center">Employee id</th>
                <th align = "center">Task Name</th>
                <th align = "center">Task Description</th>
                <th align = "center">Task status</th>
                <th align = "center">Deadline</th>
                <th align = "center">Status</th>
                        
            </tr>
            <?php

            if ($result) {

                while($row = $result->fetch_assoc()){

                  ?>
                  
                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name_task']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td><?php echo $row['deadline']; ?></td>
                    <td> <?php if ($row['status'] == 'in_progress') {?>
                        <a href="/work.loc/handleStatus.php?tid=<?php echo $row['task_id']; ?>" class="btn btn-primary">Done</a>
                    <?php    }
                    else {?>
                        <a href="/work.loc/handleStatus.php?tid=<?php echo $row['task_id']; ?>" class="btn btn-danger">Back</a>
                    <?php }

                     ?>
                    </td>
                  </tr>
            <?php
                }
            }
            ?>

    </table>
</div>
<?php include 'footer.php'; ?>
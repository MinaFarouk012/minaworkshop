<?php include 'header.php'; 
  include 'functions.php'; 

  $task_id = $_GET['id'];

  $query2 = "SELECT employee.id, employee.name FROM employee";
  $result2 = $con->query($query2);
  

  $query = "SELECT employee.id as emp_id, employee.name as emp_name, tasks.deadline, tasks.name as task_name, tasks.task_id  FROM employee JOIN tasks ON employee.id = tasks.employee_id where tasks.task_id = $task_id";


  $result = $con->query($query);
  if ($result) {
    $row = $result->fetch_assoc();
  }

?>


  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
      <div class="wrapper wrapper--w680">
          <div class="card card-1">
              <div class="card-heading"></div>
              <div class="card-body">
                  <h2 class="title">Assign Project</h2>
                  <form action="handleAssignTask.php?task_id=<?php echo $row['task_id']; ?>" method="POST">
                       <div class="input-group">
                           <div class="rs-select2 js-select-simple select--no-search">
                               <select name="emp_id">
                                   <option selected="selected" value="<?php echo $row['emp_id']; ?>"><b><?php echo $row['emp_name']; ?></b></option>
                                   <?php 
                                    if ($result2) {
                                      while ($row2 = $result2->fetch_assoc()) {
                                        if ($row2['id'] == $row['emp_id']) {
                                          continue;
                                        }
                                        ?>
                                        <option value="<?php echo $row2['id']; ?>"><?php echo $row2['name']; ?></option>
                                      <?php 
                                      }
                                    }
                                   ?>
                               </select>
                               <div class="select-dropdown"></div>
                           </div>
                       </div>

                      <div class="input-group">
                          <input class="input--style-1" type="text" placeholder="Project Name" name="task_name" value="<?php echo $row['task_name']; ?>" required="required">
                      </div>

                      <div class="row row-space">
                          <div class="col-5">
                              <div class="input-group">
                                  <input class="input--style-1" type="date" placeholder="date" value="<?php echo $row['deadline']; ?>" name="deadline" required="required">
                                 
                              </div>
                          </div>                        
                      </div>
                      
                      <div class="p-t-20">
                          <button class="btn btn--radius btn--green" type="submit">Assign</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
    
<?php include 'footer.php'; ?>
<?php include 'header.php'; 
  include 'functions.php'; 

  $query = "SELECT employee.id, employee.name FROM employee";
  $result = $con->query($query);

  
?>
  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
      <div class="wrapper wrapper--w680">
          <div class="card card-1">
              <div class="card-heading"></div>
              <div class="card-body">
                  <h2 class="title text-center mb-4">Project Info</h2>
                  <form action="handleAddTask.php" method="POST">
                      <div class="input-group">
                          <div class="rs-select2 js-select-simple select--no-search">
                              <select name="emp_id">
                                  <option disabled="disabled" selected="selected">Select employee Type</option>

                                  <?php 
                                    if ($result) {
                                      while($row = $result->fetch_assoc()){ ?>
                                  <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?>  </option>
                                  <?php 
                                      }
                                    } 
                                  ?>
                              </select>
                              <div class="select-dropdown"></div>
                          </div>
                      </div>
                      <div class="input-group">
                          <input class="input--style-1" type="text" placeholder="Project name" name="task_name">
                      </div>
                      <div class="form-group">
                          <label style="color: #666;" for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" name="desc" rows="3"></textarea>
                      </div>
                      <div class="input-group">
                          <div class="rs-select2 js-select-simple select--no-search">
                              <select name="status">
                                  <option disabled="disabled" selected="selected">Task status</option>
                                  <option value="in_process">in process</option>
                                  <option value="completed">completed</option>
                              </select>
                              <div class="select-dropdown"></div>
                          </div>
                      </div>
                      <div class="input-group">
                          <input class="input--style-1" style="color: #666;" type="date" placeholder="Deadline" name="deadline">
                      </div>
                      <div class="p-t-20">
                          <input class="btn btn--radius btn--green" type="submit" value="Add Task" />
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
    
<?php include 'footer.php'; ?>
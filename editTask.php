<?php include 'header.php'; 
  include 'functions.php'; 

  $task_id = $_GET['id'];

  $query = "SELECT * FROM tasks where task_id = $task_id";


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
                  <h2 class="title text-center mb-4">Project Info</h2>
                  <form action="handleEditTask.php?task_id=<?php echo $task_id; ?>" method="POST">
                      <div class="input-group">
                          <input class="input--style-1" type="text" placeholder="Project name" name="task_name" value="<?php echo $row['name']; ?>">
                      </div>
                      <div class="form-group">
                          <label style="color: #666;" for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" name="desc" rows="3"><?php echo $row['description']; ?></textarea>
                      </div>
                      <div class="input-group">
                          <div class="rs-select2 js-select-simple select--no-search">
                              <select name="status">
                                  <option selected="selected"><?php echo $row['status']; ?></option>
                                  <?php if ($row['status'] == 'in_process') {?>
                                    <option value="completed">completed</option>
                                  <?php } 
                                  elseif ($row['status'] == 'completed') {?>
                                    <option value="in_process">in process</option>
                                     
                                   <?php } ?>
                                  
                              </select>
                              <div class="select-dropdown"></div>
                          </div>
                      </div>
                      <div class="input-group">
                          <input class="input--style-1" style="color: #666;" type="date" placeholder="Deadline" name="deadline" value="<?php echo $row['deadline']; ?>">
                      </div>
                      <div class="p-t-20">
                          <input class="btn btn--radius btn--green" type="submit" value="Save Task" />
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
    
<?php include 'footer.php'; ?>
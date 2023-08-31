<?php

    $title = "Task Manager";
    include("classes/TaskManager.php");
    $o1 = new TaskManager();

    if(isset($_POST['save'])){
        $o1->store($_POST);
    }
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo "$title"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container shadow mt-3">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="title">
                    <h2 class="display-5 text-primary pt-2">Task Manager</h2>
                    <p class="lead">This is a simple project. We are going to use HTML, Bootstrap, PHP and MYSQL</p>
                </div>
                <div class="allTask py-4">
                    <h2 class="display-5 text-primary">All Task</h2>
                    <table class="table table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Task</th>
                            <th>Task Image</th>
                            <th>Date</th>
                            <!-- <th>Action</th> -->
                        </tr>
                        
                        <?php
                            $dball = $o1->show();
                            // print_r($dball);
                            $i = 1;
                            while($row = mysqli_fetch_assoc($dball)){ ?>
                            
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['task_name']; ?></td>
                                    <!-- image show -->
                                    <td>
                                        <img src="upload/<?php echo $row['task_image']; ?>" alt="" width="70px" height="30px">
                                    </td>
                                    <!-- year-month-date -->
                                    <!-- <td><?php echo $row['task_date']; ?></td> -->
                                    <!-- date-month-year  -->
                                    <td><?php echo date("d-M-Y", strtotime($row['task_date'])); ?></td>
                                    <!-- <td>
                                        <a href="" class="btn btn-sm btn-outline-warning">Edit</a>
                                    </td> -->
                                </tr>
                        <?php
                            }
                        ?>

                    </table>
                </div>
                <div class="addTask">
                    <h2 class="display-5 text-primary pt-2">Add Task</h2>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="addTask">Add Task</label>
                            <input type="text" name="add_task" id="addTask" placeholder="Enter task details" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="taskImage">Add Task</label>
                            <input type="file" name="task_image" id="taskImage" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="addDate">Add Date</label>
                            <input type="date" name="add_date" id="addDate" class="form-control">
                        </div>
                        <div class="form-group mb-3"> 
                            <input type="submit" name="save" class="btn btn-dark" value="Add Task">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>
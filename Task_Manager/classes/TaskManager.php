<?php

    include("config/config.php");

    class TaskManager extends Connection{
        
        public function store($data){
            // all variables info was in $_POST index. came here in $data
            $taskName = $data['add_task'];
            

            // image upload super global var for getting the image
            $imageName = $_FILES['task_image']['name'];
            $tempName = $_FILES['task_image']['tmp_name'];

            $taskDate = $data['add_date'];

            // sending data to database
            $sql = "INSERT INTO `task`(`task_name`, `task_image`, `task_date`) VALUES ('$taskName','$imageName','$taskDate')";
            $res = $this->con->query($sql);

            if($res){
                // after inserting data move temp file to upload/
                // echo "Data Inserted Successfully";
                move_uploaded_file($tempName, "upload/".$imageName);
            }
        }

        public function show(){
            $sql = "SELECT * FROM `task`";
            return $this->con->query($sql);
        }
    }

?>



<?php
include '../form/connection.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $data ='';
    $name=$_POST['name'];
    $roll=$_POST['roll'];
    $class=$_POST['class'];
    $gender=$_POST['gender'];
    $hobbies=$_POST['hobbies'];
    //print_r($hobbies);
    foreach($hobbies as $key=>$value){
        $data = $value.','.$data;
    }
    // echo $data;
    $message=$_POST['message'];

   $sql="INSERT INTO data (name,roll,class,gender,hobbies,message)
   VALUES('$name','$roll','$class','$gender','$data','$message')";

//     $sql = "INSERT INTO `data`(`name`, `roll`, `class`, `gender`, `hobbies`, `message`) 
// VALUES('$name','$roll','$class','$gender','$hobbies','$message')";

    $conn= mysqli_query($conn, $sql);

    if (isset($conn)) {
        header('location:/student_form/index.php');

    
    }
    else
    {
        echo"data not inserted!";
    }



}
?>



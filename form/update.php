<?php
include './connection.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $data ='';
    $id = $_POST['id'];
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

   $sql="UPDATE `data` SET `name`='$name',
   `roll`='$roll',`class`='$class',`gender`='$gender',
   `hobbies`='$data',`message`='$message' WHERE id=".$id;
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



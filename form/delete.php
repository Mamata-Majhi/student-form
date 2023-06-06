<?php
include './connection.php';
if(isset($_GET['roll']))
{
    $roll=$_GET['roll'];

    $sql="DELETE FROM `data` WHERE roll=".$roll;
    $res=mysqli_query($conn,$sql);

    if($res){
      echo"delete successfull!";
    header('location:/student_form/index.php');

    }else{
        echo "not deleted";
    }

}

?>
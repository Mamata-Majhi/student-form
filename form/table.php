<style>
    table,
    td,
    th {
        border: 2px solid black;

    }
    td{
        padding: 2px;
    }
</style>
<?php
session_start();
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    session_unset();
}


?>
<?php

$sql = "SELECT * FROM data ";
$result = mysqli_query($conn, $sql);
?>
<table class="w-full">
    <tr>
        <th>S.N</th>
        <th>Name</th>
        <th>Roll.no</th>
        <th>Class</th>
        <th>Gender</th>
        <th>Hobbies</th>
        <th>Message</th>
        <th>Date</th>
        <th>Action</th>
    </tr>

    <?php
    $counter = 0;
    if (mysqli_num_rows($result) > 0) {
        while ($rows = mysqli_fetch_assoc($result)) {

    ?>
            <tr>
                <td><?php echo ++$counter ?></td>
                <td><?php echo $rows['name']; ?></td>
                <td><?php echo $rows['roll']; ?></td>
                <td><?php echo $rows['class']; ?></td>
                <td><?php echo $rows['gender']; ?></td>



                <td><?php echo $rows['hobbies']; ?></td>
                <td><?php echo $rows['message']; ?></td>
                <td><?php echo $rows['date']; ?></td>
                <td>
                    <button type="submit"><a href="./.././../student_form/addstudent/add.php?roll=<?php echo $rows['roll']; ?>">Update</a></button>
                    <button type="submit"><a href="./.././../student_form/form/delete.php?roll=<?php echo $rows['roll']; ?>">Delate</a></button>
                </td>
            </tr>

    <?php
        }
    }
    ?>

</table>
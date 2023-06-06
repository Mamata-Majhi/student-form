<?php
include './../form/connection.php';
if (isset($_GET['roll'])) {
    $id = $_GET['roll'];

    $sql = "SELECT * FROM `data` WHERE roll=" . $id;
    $res = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($res);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>form</title>
</head>

<body>

    <?php
    include '../form/navbar.php';
    ?>
    <div class="absolute bg-slate-300 p-5 border-2 border-indigo-600  z-10 w-full h-full text-2xl">
        <!-- login form -->
        <form action="<?php echo isset($data) ? '../form/update.php' : "studentadd.php"; ?>" method="post" class="pl-12">
            <h2 class="ms-48 text-3xl font-bold">Students fill up form</h2>
            <label for="name" id="name" name="name" class="font-bold">Your name:</label>
            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 
            text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700
             dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
             dark:focus:border-blue-500" placeholder="Your name" value="<?php echo isset($data) ? $data['name'] : ""; ?>" />
            
            <label for="roll" id="roll" class="font-bold">Roll.no:</label>
            <input type="number" id="roll" name="roll" class="bg-gray-50 border border-gray-300 text-gray-900 
            text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700
             dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
             dark:focus:border-blue-500" placeholder="roll" value="<?php echo isset($data) ? $data['roll'] : ""; ?>" />
            
            <label for="class" class="font-bold">Class:</label>
            <input type="text" id="class" name="class" placeholder="class" class="bg-gray-50 border border-gray-300 text-gray-900 
            text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700
             dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
             dark:focus:border-blue-500" value="<?php echo isset($data) ? $data['class'] : ""; ?>">
            
            <label for="gender" class="font-bold">Gender</label>
            <br />
            <!-- php code to update code -->

            <input type="radio" name="gender" value="male" <?php echo (isset($data) && $data['gender'] == 'male') ? 'checked' : ''; ?> />
            <label for="gender">Male</label>
            <input type="radio" name="gender" value="female" <?php echo (isset($data) && $data['gender'] == 'female') ? 'checked' : ''; ?>>
            <label for="gender">Female</label>
            <input type="radio" name="gender" value="other" <?php echo (isset($data) && $data['gender'] == 'other') ? 'checked' : ''; ?> />
            <label for="gender">Other</label>
            <br />
            <br>
            <label for="hobbies" class="font-bold">Hobbies</label>
            <br />
            <?php
            if (isset($data)) {
                $array = explode(",", $data['hobbies']);
            }

            ?>


            <input type="checkbox" name="hobbies[]" value="singing" <?php echo (isset($data['hobbies']) && in_array('singing', $array)) ? 'checked' : ''; ?> /><label for="hobbies">Singing</label>
            <input type="checkbox" name="hobbies[]" value="reading" <?php echo (isset($data['hobbies']) && in_array('reading', $array)) ? 'checked' : ''; ?> /><label for="hobbies">reading</label>
            <input type="checkbox" name="hobbies[]" value="sleeping" <?php echo (isset($data['hobbies']) && in_array('sleeping', $array)) ? 'checked' : ''; ?> /><label for="hobbies">sleeping</label>



            <br />
            <br>
            
            <label for="message" class="font-bold">Your message</label>
            <br>
            <input type="text" id="message" name="message" class="bg-gray-50 border border-gray-300 text-gray-900 
            text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700
             dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
             dark:focus:border-blue-500" placeholder="message" value="<?php echo isset($data) ? $data['message'] : ""; ?>">
            <br>
            <?php
            if (isset($data)) {

            ?>
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <?php
            }

            ?>
    
            <button class=" bg-blue-400 hover:bg-blue-300 text-white font-bold py-2 px-4 border-b-4 rounded">
                Submit
            </button>
        </form>
    </div>
</body>

</html>
<?php
$insert = false;
if (isset($_POST['submit'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("Connection failed due to" . mysqli_connect_error());

    }
    // echo "success connecting to the db";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];


    if ((isset($name) && ($email) != '') && (isset($phone) && ($desc) != '')) {


        if ($name) {
            $sql = "INSERT INTO `miniproject`. `contact_us`( `name`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$email', '$phone', '$desc', current_timestamp());";

            if ($con->query($sql) == true) {
                // echo "Succesfully inserted";
                $insert = true;
            } else {
                echo "ERRoR : $sql <br> $con->error";

            }
        }
    } else {
        echo "Please fill Name and Email";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Contact_us
    </title>
    <link rel="stylesheet" href="contact_us_style.css">
</head>

<body background-color:orange;>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a> </li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <!-- <li><a href="logout.php">Logout</a></li> -->
            </ul>
        </nav>
    </header>
    <div class="container">

        <h1>Contact Us</h1>
        <?php
        if ($insert == true) {
            echo "<p class='submitmsg'>Your response is Recived</p>";
        }
        ?>

        <form action="contact_us.php" method="post">

            <input type="text" name="name" id="name" placeholder="Enter Your name">


            <input type="email" name="email" id="email" placeholder="Enter Your Email">


            <input type="phone" name="phone" id="phone" placeholder="Enter Your Mobile number">


            <textarea name="desc" id="desc" placeholder="Enter Your Description"></textarea>


            <input type="submit" name="submit" value="Submit">

    </div>
    </form>
    <!-- </div> -->
</body>




</html>
<?php
include('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vidyarthi Portal</title>
    <link rel="stylesheet" href="index style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a> </li>
                <li><a href="admin_log_in.php">Admin</a> </li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <div class="logo">
        <img src="VP black logo.png" alt="Vidyarthi Portal Logo" class="src">
    </div>
    <div class="character">
        <div id="teacher">
            <img class="cimg" src="Dark Person.png" alt="Teacher Image">
            <button><a href="teacher_login.php">Teacher Login</a></button>
        </div>

        <div id="student">
            <img class="cimg" src="Light Person.png" alt="Student Image">
            <button><a href="student_login.Php">Student Login</a></button>
        </div>
    </div>
    <footer>
        <div class="copyright">
            <p>COPYRIGHT &copy; TO VIDYARTHI PORTAL</p>
        </div>
    </footer>
</body>

</html>
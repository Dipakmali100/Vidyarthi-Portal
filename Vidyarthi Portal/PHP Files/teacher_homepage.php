<?php
include('dbconnect.php');
session_start();
if(!isset($_SESSION['name'])){
    header("location: teacher_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Homepage</title>
    <link rel="stylesheet" href="teacher_homepage_style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="teacher_homepage.php">Home</a> </li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="welcome">
        <p>Welcome, <?php echo $_SESSION['name'] ?> Sir!!</p><br>
        <p>Subject: <?php echo $_SESSION['subject'] ?></p>
    </div>

    <form action="">
        <button><b><a href="update_attendance.php">Update Attendance</a></b></button>
        <button><b><a href="update_marks.php">Update Marks</a> </b></button>
        <button><b><a href="upload_document.php">Upload Documents</a> </b></button>
    </form>

    <!-- <footer>
        <div class="copyright">
            <p>COPYRIGHT &copy; TO VIDYARTHI PORTAL</p>
        </div>
    </footer> -->
</body>
<!-- <footer>
        <div class="copyright">
            <p>COPYRIGHT &copy; TO VIDYARTHI PORTAL</p>
        </div>
    </footer> -->
</html>
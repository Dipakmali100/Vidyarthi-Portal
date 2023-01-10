<?php
include('dbconnect.php');
session_start();
if(!isset($_SESSION['roll_no'])){
    header("location: student_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Homepage</title>
    <link rel="stylesheet" href="student_homepage_style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="student_homepage.php">Home</a> </li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="welcome">
        Welcome, <?php echo $_SESSION['f_name'] ?>!!
    </div>

    <form action="">
        <button><b><a href="view_attendance.php">View Attendance</a></b></button>
        <button><b><a href="view_marks.php">View Marks</a> </b></button>
        <button><b><a href="important_documents.php">Important Documents</a> </b></button>
    </form>


</body>
<!-- <footer>
        <div class="copyright">
            <p>COPYRIGHT &copy; TO VIDYARTHI PORTAL</p>
        </div>
    </footer> -->
</html>
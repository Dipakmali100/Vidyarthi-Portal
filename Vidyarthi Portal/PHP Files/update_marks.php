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
    <title>Update Marks</title>
    <link rel="stylesheet" href="student_homepage_style.css">
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
        Performance Of <?php echo $_SESSION['subject'];?> Subject!!
    </div>
    <form action="">
        <button><b><a href="student_performance.php">Student's Performance</a> </b></button>
    </form>
    <br>
    <hr>
    <div class="welcome">
        Update Marks Here!!
    </div>

    <form action="">
        <button><b><a href="ca1.php">CA-1</a></b></button>
        <button><b><a href="midsem.php">MID SEM</a> </b></button>
        <button><b><a href="ca2.php">CA-2</a> </b></button>
    </form>


</body>
    <!-- <footer>
        <div class="copyright">
            <p>COPYRIGHT &copy; TO VIDYARTHI PORTAL</p>
        </div>
    </footer> -->
</html>
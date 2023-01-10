<?php
include('dbconnect.php');
session_start();
if(!isset($_SESSION['name'])){
    header("location: teacher_login.php");
}

$table = $_SESSION['shortsub'];
$query = "select date_format(curdate(), '%Y-%m-%d')";
$result = $con->query($query);
$curDate = 0;

if (mysqli_num_rows($result) > 0) {
    while ($rowData = mysqli_fetch_array($result)) {
        $curDate = $rowData[0];
    }
}


if (isset($_POST['submit'])) {
    $present = $_POST['present'];
    
    $insertcolumn="ALTER TABLE `$table` ADD `$curDate` int(5)";
    $sql = "UPDATE `$table` Set `$curDate`='1' where Roll_no in ($present)";
    $sql1 = "UPDATE `$table` Set `$curDate`='0' where Roll_no not in ($present)";


    if ($con->query($insertcolumn) === TRUE) {
        if ($con->query($sql) === TRUE) {
            echo "<h3>Your Mention Students For Date $curDate Are Now Mark As Present!!! </h3>";
        } else {
            echo "<h2>Enter the Roll Numbers in Correct Format</h2>";
        }
        if ($con->query($sql1) === TRUE) {
            echo "<h3>And Remaining Students Are Mark As Absent!!! </h3>";
        } else {
            //
        }
    } else {
        $condition = false;
        if ($con->query($sql) === TRUE) {
            $condition = true;
            echo "<h3>Your Mention Students For Date $curDate Are Now Mark As Present!!! </h3>";
        } else {
            $condition = true;
            echo "<h2>Enter the Roll Numbers in Correct Format</h2>";
        }
        if ($con->query($sql1) === TRUE) {
            echo "<h3>And Remaining Students Are Mark As Absent!!! </h3>";
        } else {
            // echo "Error" . $con->error;
        }
        if(!$condition){
            echo "<h2>Attendance for the Date $curDate is already marked!!! Use UPDATE PREVIOUS Option...</h2>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Absent</title>
    <link rel="stylesheet" href="maxa.css">
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
    <div class="date">
        <span>
            <p class="normalp">Today's Date:
                <?php echo $curDate ?>
            </p>
        </span>
    </div>
    <div class="login-form">
        <form method="post">
            <h1><b>For Max Absent</b></h1>
            <div class="content">
                <div class="input-details">
                    <input name="present" type="text" placeholder="Enter the Present Roll Numbers e.g. 1,3,4" ></input>
                </div>
            </div>
            <div class="action">
                <!-- <button> <a href="Resister.html"> <b>Register</b> </a> </button> -->
                <!-- <button> <a href=""> <b>Submit</b> </a> </button> -->
                <input type="submit" name="submit" value="SUBMIT" class="submit-but">
            </div>
        </form>
    </div>
</body>
<!-- <footer>
        <div class="copyright">
            <p>COPYRIGHT &copy; TO VIDYARTHI PORTAL</p>
        </div>
    </footer> -->

</html>
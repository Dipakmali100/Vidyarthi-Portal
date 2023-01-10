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
    $date = $_POST['date'];
    $rollno = $_POST['rns'];
    $ap = $_POST['ap'];


    if($ap=='A'){
        $insertcolumn = "ALTER TABLE `$table` ADD `$date` int(5)";
        $sql = "UPDATE `$table` SET `$date`='0' WHERE Roll_no in ($rollno)";
        $sql1 = "UPDATE `$table` SET `$date`='1' WHERE Roll_no not in ($rollno)";
        if ($con->query($insertcolumn) === TRUE) {
            if ($con->query($sql) === TRUE) {
                echo "<h3>Your Mention Students For Date $date Are Now Mark As Absent!!! </h3>";
            } else {
                echo "<h2>Enter the Roll Numbers in Correct Format</h2>";
            }
            if ($con->query($sql1) === TRUE) {
                echo "<h3>And Remaining Students Are Mark As Present!!! </h3>";
            } else {
                //
            }
        } else {
            if ($con->query($sql) === TRUE) {
                echo "<h3>Your Mention Students For Date $date Are Now Mark As Absent!!! </h3>";
            } else {
                echo "<h2>Enter the Roll Numbers in Correct Format</h2>";
            }
            if ($con->query($sql1) === TRUE) {
                echo "<h3>And Remaining Students Are Mark As Present!!! </h3>";
            } else {
                // echo "Error" . $con->error;
            }
        }
    }else if($ap=='P'){
        $insertcolumn = "ALTER TABLE `$table` ADD `$date` int(5)";
        $sql = "UPDATE `$table` SET `$date`='1' WHERE Roll_no in ($rollno)";
        $sql1 = "UPDATE `$table` SET `$date`='0' WHERE Roll_no not in ($rollno)";
        if ($con->query($insertcolumn) === TRUE) {
            if ($con->query($sql) === TRUE) {
                echo "<h3>Your Mention Students For Date $date Are Now Mark As Present!!! </h3>";
            } else {
                echo "<h2>Enter the Roll Numbers in Correct Format</h2>";
            }
            if ($con->query($sql1) === TRUE) {
                echo "<h3>And Remaining Students Are Mark As Absent!!! </h3>";
            } else {
                //
            }
        } else {
            if ($con->query($sql) === TRUE) {
                echo "<h3>Your Mention Students For Date $date Are Now Mark As Present!!! </h3>";
            } else {
                echo "<h2>Enter the Roll Numbers in Correct Format</h2>";
            }
            if ($con->query($sql1) === TRUE) {
                echo "<h3>And Remaining Students Are Mark As Absent!!! </h3>";
            } else {
                // echo "Error" . $con->error;
            }
        }
    }else{
        echo "<h2>Enter Valid Details</h2>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Previous</title>
    <link rel="stylesheet" href="Update_Manually_Style.css">
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
    <div class="login-form">
        <form action="Update_Manually.php" method="post">
            <h1><b>Update Attendance Manually</b></h1>
            <div class="content">
                <div class="input-details">
                    <input name="date" type="date">
                </div>
                <div class="input-details">
                    <input name="rns" type="text" placeholder="Enter Roll Numbers e.g. 1,4,6">
                </div>
                <div class="input-details">
                    <input name="ap" type="text" style="text-transform: uppercase;" placeholder="A or P">
                </div>

            </div>
            <div class="action">
                <input name="submit" type="submit" value="SUBMIT"></input>
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
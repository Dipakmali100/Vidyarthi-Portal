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
// echo $curDate;
if (isset($_POST['allpresent'])) {
    $insertcolumn = "ALTER TABLE `$table` ADD `$curDate` int(5)";
    $sql = "UPDATE `$table` SET `$curDate`='1' WHERE Roll_no > 0";
    // mysqli_query($con, $insertcolumn);
    if ($con->query($insertcolumn) === TRUE) {
        if ($con->query($sql) === TRUE) {
            echo "<h3>All Student For Date $curDate Are Now Mark As Present!!! </h3>";
        } else {
            echo "<h2>Something Went Wrong</h2>";
        }
    } else {
        $condition = false;
        if ($con->query($sql) === TRUE) {
            $condition = true;
            echo "<h3>All Student For Date $curDate Are Now Mark As Present!!! </h3>";
        } else {
            $condition = true;
            echo "<h2>Something Went Wrong</h2>";
        }
        if(!$condition){
            echo "<h2>Attendance for the Date $curDate is already marked!!! Use UPDATE PREVIOUS Option...</h2>";
        }
    }
}
if (isset($_POST['allabsent'])) {

    $insertcolumn = "ALTER TABLE `$table` ADD `$curDate` int(5)";
    $sql = "UPDATE `$table` SET `$curDate`='0' WHERE Roll_no > 0";
    // mysqli_query($con, $insertcolumn);
    if ($con->query($insertcolumn) === TRUE) {
        if ($con->query($sql) === TRUE) {
            echo "<h3>All Student For Date $curDate Are Now Mark As Absent!!! </h3>";
        } else {
            echo "<h2>Something Went Wrong</h2>";
        }
    } else {
        $condition = false;
        if ($con->query($sql) === TRUE) {
            $condition = true;
            echo "<h3>All Student For Date $curDate Are Now Mark As Absent!!! </h3>";
        } else {
            $condition = true;
            echo "<h2>Something Went Wrong</h2>";
        }
        if(!$condition){
            echo "<h2>Attendance for the Date $curDate is already marked!!! Use UPDATE PREVIOUS Option...</h2>";
        }
    }

}
$con -> close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Attendance</title>
    <link rel="stylesheet" href="update_attendance_style.css">
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
    <div class="content">
        <div class="form1">
            <form action="update_attendance.php" method="post">
                <!-- <button onclick="fetch('attendance_homepage.php?allpresent=true');">All Present</button>
                <button onclick="fetch('attendance_homepage.php?allabsent=true');">All Absent</button> -->
                <input name="allpresent" type="submit" value="All Present">
                <input name="allabsent" type="submit" value="All Absent">
            </form>
        </div>

        <div class="form2">
            <form action="">
                <button><a href="max_present.php">For Max Present</a> </button>
                <button><a href="max_absent.php">For Max Absent</a> </button>
            </form>
        </div>

        <div class="form3">
            <form action="">
                <button><a href="Update_Manually.php">Update Manually</a> </button>
                <button><a href="view_full_attendance.php">View Full Attendance</a></button>
            </form>
        </div>

    </div>

    <!-- <div class="dateform" id="popup">
            <form action="">
                <input id="idate" type="date" placeholder="Enter the Date">
                <input id="isubmit" type="submit" value="Submit Date">
            </form>
        </div> -->

</body>
<!-- <footer>
        <div class="copyright">
            <p>COPYRIGHT &copy; TO VIDYARTHI PORTAL</p>
        </div>
    </footer> -->
</html>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'miniproject');
$query = "select date_format(curdate(), '%d/%m/%Y')";
$result = $conn->query($query);
$curDate = 0;

if (mysqli_num_rows($result) > 0) {
    while ($rowData = mysqli_fetch_array($result)) {
        $curDate = $rowData[0];
    }
}
// echo $curDate;
if (isset($_POST['allpresent'])) {
    $verify = "Select `$curDate` from present";
    $verifyresult = mysqli_query($conn, $verify);
    $rows = mysqli_num_rows($verifyresult);
    if ($rows > 0) {
        $sql = "UPDATE present SET `$curDate`='1' WHERE Roll_no > 0";
        $result=mysqli_query($conn, $sql);
        if($result){
            echo "<h3>All Student For Date $curDate Are Now Mark As Present!!! </h3>";
        }else {
            echo "<h2>Something Went Wrong</h2>";
        }
    } else {
        $insertcolumn = "ALTER TABLE present ADD `$curDate` int(5)";
        $sql = "UPDATE present SET `$curDate`='1' WHERE Roll_no > 0";
        // mysqli_query($conn, $insertcolumn);
        if ($conn->query($insertcolumn) === TRUE) {
            if ($conn->query($sql) === TRUE) {
                echo "<h3>All Student For Date $curDate Are Now Mark As Present!!! </h3>";
            } else {
                echo "<h2>Something Went Wrong</h2>";
            }
        } else {
            echo "<h2>Attendance for the Date $curDate is already mark!!! Use UPDATE PREVIOUS Option...</p>";
        }
    }
}
if (isset($_POST['allabsent'])) {

    $insertcolumn = "ALTER TABLE present ADD `$curDate` int(5)";
    $sql = "UPDATE present SET `$curDate`='0' WHERE Roll_no > 0";
    // mysqli_query($conn, $insertcolumn);
    if ($conn->query($insertcolumn) === TRUE) {

        if ($conn->query($sql) === TRUE) {

            echo "<h3>All Student For Date $curDate Are Now Mark As Absent!!! </h3>";
        } else {
            echo "<h2>Something Went Wrong</h2>";
        }
    } else {
        echo "<h2>Attendance for the Date $curDate is already mark!!! Use UPDATE PREVIOUS Option...</p>";
    }


}

// if (isset($_POST['allpresent'])) {

//         $insertcolumn = "ALTER TABLE present ADD `$curDate` int(5)";
//         $sql = "UPDATE present SET `$curDate`='1' WHERE Roll_no > 0";
//         // mysqli_query($conn, $insertcolumn);
//         if (!mysqli_query($conn,$insertcolumn)) {
//             echo("Error description: " . mysqli_error($conn));
//         }
//         // if($result){
//         //     $result1=$conn->query($sql);
//         //     if($result1){
//         //         echo "<p>All Student For Date $curDate Are Now Mark As Present </p>";
//         //     }else{
//         //         die('failed!' . $conn->error);
//         //     }
//         // }else{
//         //     die('failed!' . $conn->error);
//         // }


//         // if ($conn->query($insertcolumn) === TRUE) {
//         //     // echo "<p>Updated</p>";
//         //     // echo "Sucess";
//         // } else {
//         //     echo "<p>Attendance for the Date $curDate is already mark!!! Use UPDATE PREVIOUS Option...</p>";
//         // }
//         // if ($conn->query($sql) === TRUE) {
//         //     // echo "<p>Updated</p>";
//         //     // echo "Sucess";
//         //     echo "<p>All Student For Date $curDate Are Now Mark As Present </p>";
//         // } else {
//         //     echo "<p>Something Went Wrong</p>";
//         // }
//         $conn -> close();
// }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Attendance</title>
    <link rel="stylesheet" href="attendance_homepage_style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="teacher_homepage.php">Home</a> </li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <div class="date">
        <span>
            <p class="normalp">DATE:-
                <?php echo $curDate ?>
            </p>
        </span>
    </div>
    <div class="content">
        <div class="form1">
            <form action="attendance_homepage.php" method="post">
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
                <button><a href="Update_Previous.php">Update Previous</a> </button>
                <button><a href="">Download Full Attendance</a> </button>
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

</html>
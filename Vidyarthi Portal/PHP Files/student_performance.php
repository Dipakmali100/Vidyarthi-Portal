<?php
include('dbconnect.php');
session_start();
if(!isset($_SESSION['name'])){
    header("location: teacher_login.php");
}

$subject = $_SESSION['shortmark'];

//Max-Marks
$sql1 = "SELECT MAX(ca1) FROM $subject where Roll_No >0";
$result1 = mysqli_query($con, $sql1);
$ca1_max = mysqli_fetch_array($result1);

$sql2 = "SELECT MAX(midsem) FROM $subject where Roll_No >0";
$result2 = mysqli_query($con, $sql2);
$midsem_max = mysqli_fetch_array($result2);

$sql3 = "SELECT MAX(ca2) FROM $subject where Roll_No >0";
$result3 = mysqli_query($con, $sql3);
$ca2_max = mysqli_fetch_array($result3);

//Min-Marks
$sql4 = "SELECT MIN(ca1) FROM $subject where Roll_No >0";
$result4 = mysqli_query($con, $sql4);
$ca1_min = mysqli_fetch_array($result4);

$sql5 = "SELECT MIN(midsem) FROM $subject where Roll_No >0";
$result5 = mysqli_query($con, $sql5);
$midsem_min = mysqli_fetch_array($result5);

$sql6 = "SELECT MIN(ca2) FROM $subject where Roll_No >0";
$result6 = mysqli_query($con, $sql6);
$ca2_min = mysqli_fetch_array($result6);

//Number Of Passed Students
$sql7 = "SELECT ca1 FROM $subject where ca1>7";
$result7 = mysqli_query($con, $sql7);
$passcount1 = 0;
while ($ca1_pass = mysqli_fetch_array($result7)) {
    $passcount1++;
}

$sql8 = "SELECT midsem FROM $subject where midsem >7";
$result8 = mysqli_query($con, $sql8);
$passcount2 = 0;
while ($midsem_pass = mysqli_fetch_array($result8)) {
    $passcount2++;
}

$sql9 = "SELECT ca2 FROM $subject where ca2 >7";
$result9 = mysqli_query($con, $sql9);
$passcount3 = 0;
while ($ca2_pass = mysqli_fetch_array($result9)) {
    $passcount3++;
}

//Number Of Failed Students
$failcount1 = 62 - $passcount1;
$failcount2 = 62 - $passcount2;
$failcount3 = 62 - $passcount3;


//Passing Performance
$passingp1 = ($passcount1 / 62) * 100;
$passingp2 = ($passcount2 / 62) * 100;
$passingp3 = ($passcount3 / 62) * 100;


//Roll No Of Failed Students
$sql10 = "SELECT Roll_No FROM $subject where ca1<8";
$result10 = mysqli_query($con, $sql10);
$sql11 = "SELECT Roll_No FROM $subject where midsem<8";
$result11 = mysqli_query($con, $sql11);
$sql12 = "SELECT Roll_No FROM $subject where ca2<8";
$result12 = mysqli_query($con, $sql12);


//Average Marks
$sql13 = "SELECT SUM(ca1) FROM $subject";
$result13 = mysqli_query($con, $sql13);
$array1 = mysqli_fetch_array($result13);
$average1=$array1[0]/62;

$sql14 = "SELECT SUM(midsem) FROM $subject";
$result14 = mysqli_query($con, $sql14);
$array2 = mysqli_fetch_array($result14);
$average2=$array2[0]/62;

$sql15 = "SELECT SUM(ca2) FROM $subject";
$result15 = mysqli_query($con, $sql15);
$array3 = mysqli_fetch_array($result15);
$average3 = $array3[0]/62;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <link rel="stylesheet" href="student_performance_style.css">
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
    <div class="name">
        <p>Subject Name:
            <?php echo $_SESSION['subject']; ?>
        </p><br>
        <button><b><a href="view_full_marks.php">View All Marks</a> </b></button>
    </div>
    <div class="table">
        <table>
            <tr>
                <th height="70" width="100px" id="leftHeading">Topics</th>
                <th height="70" width="100px">CA-1</th>
                <th height="70" width="100px">MID-SEM</th>
                <th height="70" width="100px">CA-2</th>
            </tr>
            <tr>
                <th height="50" id="leftHeading">Max-Mark</th>
                <td height="50"><?php echo $ca1_max[0]; ?></td>
                <td height="50"><?php echo $midsem_max[0]; ?></td>
                <td height="50"><?php echo $ca2_max[0]; ?></td>
            </tr>
            <tr>
                <th height="50" id="leftHeading">Min-Mark</th>
                <td height="50"><?php echo $ca1_min[0]; ?></td>
                <td height="50"><?php echo $midsem_min[0]; ?></td>
                <td height="50"><?php echo $ca2_min[0]; ?></td>
            </tr>
            <tr>
                <th height="50" id="leftHeading">Average-Marks</th>
                <td height="50"><?php echo number_format($average1,0); ?></td>
                <td height="50"><?php echo number_format($average2,0); ?></td>
                <td height="50"><?php echo number_format($average3,0); ?></td>
            </tr>
            <tr>
                <th height="50" id="leftHeading">Number Of Passed</th>
                <td height="50"><?php echo $passcount1; ?></td>
                <td height="50"><?php echo $passcount2; ?></td>
                <td height="50"><?php echo $passcount3; ?></td>
            </tr>
            <tr>
                <th height="50" id="leftHeading">Number Of Failed</th>
                <td height="50"><?php echo $failcount1; ?></td>
                <td height="50"><?php echo $failcount2; ?></td>
                <td height="50"><?php echo $failcount3; ?></td>
            </tr>
            <tr>
                <th height="50" id="leftHeading">Passing Performance</th>
                <td height="50"><?php echo number_format($passingp1, 2), "%"; ?></td>
                <td height="50"><?php echo number_format($passingp2, 2), "%"; ?></td>
                <td height="50"><?php echo number_format($passingp3, 2), "%"; ?></td>
            </tr>
            <tr>
                <th height="50" id="leftHeading">Failed Roll Numbers</th>
                <td height="50">
                    <?php
                    while ($ca1_fail = mysqli_fetch_array($result10)) {
                        echo $ca1_fail[0] . ", ";
                    }
                    ?>
                </td>
                <td height="50">
                    <?php
                    while ($midsem_fail = mysqli_fetch_array($result11)) {
                        echo $midsem_fail[0] . ", ";
                    }
                    ?>
                </td>
                <td height="50">
                    <?php
                    while ($ca2_fail = mysqli_fetch_array($result12)) {
                        echo $ca2_fail[0] . ", ";
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
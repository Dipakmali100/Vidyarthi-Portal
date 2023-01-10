<?php
include('dbconnect.php');
session_start();
if(!isset($_SESSION['roll_no'])){
    header("location: student_login.php");
}

$rollno=$_SESSION['roll_no'];
$fname=$_SESSION['f_name'];
$mname=$_SESSION['m_name'];
$lname=$_SESSION['l_name'];
$password=$_SESSION['spassword'];

//Subject 1: Database Management System
$sql1 = "SELECT * FROM dbs WHERE Roll_No='$rollno'";
$result1 = $con->query($sql1);
$rowData1 = mysqli_fetch_row($result1);
// echo $rowData[1];
$countzero1 = 0;
for($i=0;$i<count($rowData1);$i++){
    if($rowData1[$i]==0){
        $countzero1++;
    }
}
$totalattendance1 = count($rowData1) - 4;
$sattendance1 = $totalattendance1 - $countzero1;
$subpercentage1 = 0;
if($totalattendance1==0 || $sattendance1==0){
    $subpercentage1 = 0;
}else{
    $subpercentage1 = ($sattendance1 / $totalattendance1) * 100;
}
// echo number_format($subpercentage1, 2);

//Subject 2: Theory Of Computation
$sql2 = "SELECT * FROM toc WHERE Roll_No='$rollno'";
$result2 = $con->query($sql2);
$rowData2 = mysqli_fetch_row($result2);
// echo $rowData[1];
$countzero2 = 0;
for($i=0;$i<count($rowData2);$i++){
    if($rowData2[$i]==0){
        $countzero2++;
    }
}
$totalattendance2 = count($rowData2) - 4;
$sattendance2 = $totalattendance2 - $countzero2;
$subpercentage2 = 0;
if($totalattendance2==0 || $sattendance2==0){
    $subpercentage2 = 0;
}else{
    $subpercentage2 = ($sattendance2 / $totalattendance2) * 100;
}
// echo number_format($subpercentage2, 2);

//Subject 3: Software Engineering
$sql3 = "SELECT * FROM se WHERE Roll_No='$rollno'";
$result3 = $con->query($sql3);
$rowData3 = mysqli_fetch_row($result3);
// echo $rowData[1];
$countzero3 = 0;
for($i=0;$i<count($rowData3);$i++){
    if($rowData3[$i]==0){
        $countzero3++;
    }
}
$totalattendance3 = count($rowData3) - 4;
$sattendance3 = $totalattendance3 - $countzero3;
$subpercentage3 = 0;
if($totalattendance3==0 || $sattendance3==0){
    $subpercentage3 = 0;
}else{
    $subpercentage3 = ($sattendance3 / $totalattendance3) * 100;
}
// echo number_format($subpercentage3, 2);

//Subject 4: Numerical Methods
$sql4 = "SELECT * FROM nm WHERE Roll_No='$rollno'";
$result4 = $con->query($sql4);
$rowData4 = mysqli_fetch_row($result4);
// echo $rowData[1];
$countzero4 = 0;
for($i=0;$i<count($rowData4);$i++){
    if($rowData4[$i]==0){
        $countzero4++;
    }
}
$totalattendance4 = count($rowData4) - 4;
$sattendance4 = $totalattendance4 - $countzero4;
$subpercentage4 = 0;
if($totalattendance4==0 || $sattendance4==0){
    $subpercentage4 = 0;
}else{
    $subpercentage4 = ($sattendance4 / $totalattendance4) * 100;
}
// echo number_format($subpercentage4, 2);

//Subject 5: Business Communication
$sql5 = "SELECT * FROM bc WHERE Roll_No='$rollno'";
$result5 = $con->query($sql5);
$rowData5 = mysqli_fetch_row($result5);
// echo $rowData[1];
$countzero5 = 0;
for($i=0;$i<count($rowData5);$i++){
    if($rowData5[$i]==0){
        $countzero5++;
    }
}
$totalattendance5 = count($rowData5) - 4;
$sattendance5 = $totalattendance5 - $countzero5;
$subpercentage5 = 0;
if($totalattendance5==0 || $sattendance5==0){
    $subpercentage5 = 0;
}else{
    $subpercentage5 = ($sattendance5 / $totalattendance5) * 100;
}
// echo number_format($subpercentage5, 2);

$averagePercentage = ($subpercentage1 + $subpercentage2 + $subpercentage3 + $subpercentage4 + $subpercentage5) / 5;
// echo number_format($averagePercentage, 2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <link rel="stylesheet" href="view_attendance_style.css">
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
    <div class="name">
        <p>Name: <?php echo $fname," ",$mname," ",$lname?></p><br>
        <p>Total Attendance: <?php echo number_format($averagePercentage,2)."%"?></p>
    </div>
    <div class="table">
        <table>
            <tr>
                <th height="70" width="160px" id="leftHeading" >Subjects</th>
                <th height="70" width="170px">Database System</th>
                <th height="70" width="170px">Theory Of Computation</th>
                <th height="70" width="170px">Software Engineering</th>
                <th height="70" width="170px">Numerical Methods</th>
                <th height="70" width="170px">Business Communication</th>
            </tr>
            <tr>
                <th height="50" id="leftHeading" >Attendance</th>
                <td height="50"><?php echo number_format($subpercentage1,2),"%" ?></td>
                <td height="50"><?php echo number_format($subpercentage2,2),"%" ?></td>
                <td height="50"><?php echo number_format($subpercentage3,2),"%" ?></td>
                <td height="50"><?php echo number_format($subpercentage4,2),"%" ?></td>
                <td height="50"><?php echo number_format($subpercentage5,2),"%" ?></td>
            </tr>
            <tr>
                <th height="50" id="leftHeading" >Total Lectures</th>
                <td height="50"><?php echo number_format($totalattendance1) ?></td>
                <td height="50"><?php echo number_format($totalattendance2) ?></td>
                <td height="50"><?php echo number_format($totalattendance3) ?></td>
                <td height="50"><?php echo number_format($totalattendance4) ?></td>
                <td height="50"><?php echo number_format($totalattendance5) ?></td>
            </tr>
            <tr>
                <th height="50" id="leftHeading" >Lecture Attended</th>
                <td height="50"><?php echo number_format($sattendance1) ?></td>
                <td height="50"><?php echo number_format($sattendance2) ?></td>
                <td height="50"><?php echo number_format($sattendance3) ?></td>
                <td height="50"><?php echo number_format($sattendance4) ?></td>
                <td height="50"><?php echo number_format($sattendance5) ?></td>
            </tr>
        </table> 
    </div>
</body>

</html>
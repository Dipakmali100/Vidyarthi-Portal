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
$sql1 = "SELECT ca1,midsem,ca2 FROM dbs_marks WHERE Roll_No='$rollno'";
$result1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_array($result1);
$dbs1=$row1['ca1'];
$dbs2=$row1['midsem'];
$dbs3=$row1['ca2'];

//Subject 2: Theory Of Compution
$sql2 = "SELECT ca1,midsem,ca2 FROM toc_marks WHERE Roll_No='$rollno'";
$result2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_array($result2);
$toc1=$row2['ca1'];
$toc2=$row2['midsem'];
$toc3=$row2['ca2'];

//Subject 3: Software Engineering
$sql3 = "SELECT ca1,midsem,ca2 FROM se_marks WHERE Roll_No='$rollno'";
$result3 = mysqli_query($con,$sql3);
$row3 = mysqli_fetch_array($result3);
$se1=$row3['ca1'];
$se2=$row3['midsem'];
$se3=$row3['ca2'];

//Subject 4: Numerical Methods
$sql4 = "SELECT ca1,midsem,ca2 FROM nm_marks WHERE Roll_No='$rollno'";
$result4 = mysqli_query($con,$sql4);
$row4 = mysqli_fetch_array($result4);
$nm1=$row4['ca1'];
$nm2=$row4['midsem'];
$nm3=$row4['ca2'];

//Subject 5: Business Communication
$sql5 = "SELECT ca1,midsem,ca2 FROM bc_marks WHERE Roll_No='$rollno'";
$result5 = mysqli_query($con,$sql5);
$row5 = mysqli_fetch_array($result5);
$bc1=$row5['ca1'];
$bc2=$row5['midsem'];
$bc3=$row5['ca2'];
   
mysqli_close($con);
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
        <p>Name:
            <?php echo $fname," ",$mname," ",$lname?>
        </p><br>
        <p>Roll No:
            <?php echo $rollno?>
        </p>
    </div>
    <div class="table">
        <table>
            <tr>
                <th height="70" width="250px" id="leftHeading">Subjects</th>
                <th height="70" width="170px">CA-1</th>
                <th height="70" width="170px">MID-SEM</th>
                <th height="70" width="170px">CA-2</th>
                <th height="70" width="170px">TOTAL OUT OF 40</th>
            </tr>
            <tr>
                <th height="50" id="leftHeading">Database System</th>
                <td height="50">
                    <?php echo $dbs1;?>
                </td>
                <td height="50">
                    <?php echo $dbs2;?>
                </td>
                <td height="50">
                    <?php echo $dbs3;?>
                </td>
                <td height="50">
                    <?php echo ($dbs1/2)+($dbs2)+($dbs3/2);?>
                </td>
            </tr>
            <tr>
                <th height="50" id="leftHeading">Theory Of Computation</th>
                <td height="50">
                    <?php echo $toc1;?>
                </td>
                <td height="50">
                    <?php echo $toc2;?>
                </td>
                <td height="50">
                    <?php echo $toc3;?>
                </td>
                <td height="50">
                    <?php echo ($toc1/2)+($toc2)+($toc3/2);?>
                </td>
            </tr>
            <tr>
                <th height="50" id="leftHeading">Software Engineering</th>
                <td height="50">
                    <?php echo $se1;?>
                </td>
                <td height="50">
                    <?php echo $se2;?>
                </td>
                <td height="50">
                    <?php echo $se3;?>
                </td>
                <td height="50">
                    <?php echo ($se1/2)+($se2)+($se3/2);?>
                </td>
            </tr>
            <tr>
                <th height="50" id="leftHeading">Numerical Methods</th>
                <td height="50">
                    <?php echo $nm1;?>
                </td>
                <td height="50">
                    <?php echo $nm2;?>
                </td>
                <td height="50">
                    <?php echo $nm3;?>
                </td>
                <td height="50">
                    <?php echo ($nm1/2)+($nm2)+($nm3/2);?>
                </td>
            </tr>
            <tr>
                <th height="50" id="leftHeading">Business Communication</th>
                <td height="50">
                    <?php echo $bc1;?>
                </td>
                <td height="50">
                    <?php echo $bc2;?>
                </td>
                <td height="50">
                    <?php echo $bc3;?>
                </td>
                <td height="50">
                    <?php echo ($bc1/2)+($bc2)+($bc3/2);?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
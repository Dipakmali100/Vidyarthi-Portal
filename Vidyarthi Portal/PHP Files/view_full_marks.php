<?php
include('dbconnect.php');
session_start();
if(!isset($_SESSION['name'])){
    header("location: teacher_login.php");
}
$stable = $_SESSION['shortmark'];
$query = "SELECT * FROM $stable";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Marks</title>
    <link rel="stylesheet" href="view_full_attendance_style.css">
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
        
    </div>
    <div class="table">
        <table>
            <tr>
                <th height="70" width="100px">Roll No</th>
                <th height="70" width="100px">First Name</th>
                <th height="70" width="100px">Mid Name</th>
                <th height="70" width="100px">Last Name</th>
                <th height="70" width="100px">CA-1</th>
                <th height="70" width="100px">MID-SEM</th>
                <th height="70" width="100px">CA-2</th>
            </tr>
            <?php
                while($rows=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td height="50"><?php echo $rows['Roll_No']; ?></td>
                <td height="50"><?php echo $rows['F_Name']; ?></td>
                <td height="50"><?php echo $rows['Mid_Name']; ?></td>
                <td height="50"><?php echo $rows['L_Name']; ?></td>
                <td height="50"><?php echo $rows['ca1']; ?></td>
                <td height="50"><?php echo $rows['midsem']; ?></td>
                <td height="50"><?php echo $rows['ca2']; ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>
<?php
include('dbconnect.php');
session_start();
if(!isset($_SESSION['name'])){
    header("location: teacher_login.php");
}


$stable = $_SESSION['shortsub'];


$sql = "SHOW COLUMNS FROM $stable";
$result1 = mysqli_query($con, $sql);
while($array=mysqli_fetch_array($result1)){
    $columns[] = $array['Field'];
}
//remove first field
// $columns = array_slice($columns, 1);
// foreach($columns as $column){
//     echo $column;
//     echo "\n";
// }
// for ($i = 0; $i < count($columns);$i++){
//     echo $columns[$i];
// }


$query = "SELECT * FROM $stable";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Full Attendance</title>
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
            <!-- Top Column -->
            <tr>
            <?php
                for ($i = 0; $i < count($columns);$i++){
            ?>
                    <th height="70" width="100px"><?php echo $columns[$i]; ?></th>
            <?php
                }
            ?>
            </tr>


            <!-- Remaining Columns -->
            <?php
                while($rows=mysqli_fetch_assoc($result)){
            ?>
                <tr>
                <?php
                    for ($i = 0; $i < count($columns);$i++){
                ?>
                        <td height="50"><?php echo $rows[$columns[$i]]; ?></td>
                <?php
                    }
                ?>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>

</html>
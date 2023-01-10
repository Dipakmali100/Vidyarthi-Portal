<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "miniproject";

$con = mysqli_connect($server, $username, $password, $db);
if (!$con) {
    echo "Database Is Not Connected";
}

// $server = "localhost";
// $username = "id20019725_root";
// $password = "Vportal@1234";
// $db = "id20019725_miniproject";

// $con = mysqli_connect($server, $username, $password, $db);
// if (!$con) {
//     echo "Database Is Not Connected";
// }
?>
<?php
include('dbconnect.php');
session_start();
if(!isset($_SESSION['roll_no'])){
    header("location: student_login.php");
}
$sql = "SELECT * FROM files";
$result = mysqli_query($con, $sql);
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($con, $sql);
    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];
    if (file_exists($filepath)) {
        header('Content-Type: application/octet-stream');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires:0');
        header('Cache-Control: must-revalidate');
        header('Pragma:public');
        header('Content-Length:' . filesize('uploads/' . $file['name']));

        readfile('uploads/' . $file['name']);
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($con, $updateQuery);
        exit;
    } else {
        echo "File Not Exist";
    }
}

$con->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Important Documents</title>
    <link rel="stylesheet" href="important_documents_style.css">
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
    <div class="table">
        <table>
            <thead>
                <th style="width: 130px;height: 50px">DOCUMENT ID</th>
                <th style="width: 400px;height: 50px">FILE NAME</th>
                <th style="width: 100px;height: 50px">SIZE</th>
                <th style="width: 120px;height: 50px">DOWNLOADS</th>
                <th style="width: 150px;height: 50px">ACTION</th>
            </thead>
            <tbody>
                <?php foreach ($files as $file): ?>
                <tr>
                    <td style="width: 20px;height: 40px">
                        <?php echo $file['id'] ?>
                    </td>
                    <td style="width: 20px;height: 40px">
                        <?php echo $file['dbname'] ?>
                    </td>
                    <td style="width: 20px;height: 40px">
                        <?php echo number_format($file['size'] / 1000, 0) . " KB"; ?>
                    </td>
                    <td style="width: 20px;height: 40px">
                        <?php echo $file['downloads'] ?>
                    </td>
                    <td style="width: 20px;height: 40px">
                        <a href="important_documents.php?file_id=<?php echo $file['id']; ?>">Download</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
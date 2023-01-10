<?php
if(isset($_POST['submit'])){
   include('dbconnect.php');
   $username = $_POST['username'];
   $password = $_POST['password'];
   $sql = "SELECT * FROM ty_students where Roll_No= '$username' and Password= '$password'";
   $result = mysqli_query($con, $sql) or Die("Query Failed");
   if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
         session_start();
         $_SESSION['roll_no'] = $row['Roll_No'];
         $_SESSION['f_name'] = $row['F_Name'];
         $_SESSION['m_name'] = $row['Mid_Name'];
         $_SESSION['l_name'] = $row['L_Name'];
         $_SESSION['spassword'] = $row['Password'];
         header("location: student_homepage.php");
      }
   }else{
      echo "<p>Invalid Roll Number And Password</p>";
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   <link rel="stylesheet" href="student_login_style.css">
</head>

<body>

   <div class="form-container">

      <form action="student_login.php" method="post">
         <h3>Student</h3>


         <input type="text" name="username" required placeholder="Enter Your Roll Number">
         <input type="password" name="password" required placeholder="Enter Your Password">
         <input type="submit" name="submit" value="login" class="form-btn">

      </form>

   </div>

</body>
<!-- <footer>
        <div class="copyright">
            <p>COPYRIGHT &copy; TO VIDYARTHI PORTAL</p>
        </div>
    </footer> -->

</html>
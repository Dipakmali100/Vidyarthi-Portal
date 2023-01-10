<?php
if(isset($_POST['submit'])){
   include('dbconnect.php');
   $name = $_POST['name'];
   $password = $_POST['password'];
   $sql = "SELECT * FROM teachers where Name= '$name' and Password= '$password'";
   $result = mysqli_query($con, $sql) or Die("Query Failed");
   if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
         session_start();
         $_SESSION['tid'] = $row['T_ID'];
         $_SESSION['name'] = $row['Name'];
         $_SESSION['tpassword'] = $row['Password'];
         $_SESSION['subject'] = $row['Subject'];
         $_SESSION['shortsub'] = $row['ShortSub'];
         $_SESSION['shortmark'] = $row['ShortMark'];
         header("location: teacher_homepage.php");
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

   <!-- custom css file link  -->
   <link rel="stylesheet" href="teacher_login_style.css">

</head>
<body>
   
<div class="form-container">

   <form action=" " method="post">
      <h3>Teacher</h3>
      
      <input type="text" name="name" required placeholder="Enter Your Name">
      <input type="password" name="password" required placeholder="Enter Your Password">
      <input type="submit" name="submit" value="login" class="form-btn" >
    
   </form>
</div>

</body>
<!-- <footer>
        <div class="copyright">
            <p>COPYRIGHT &copy; TO VIDYARTHI PORTAL</p>
        </div>
    </footer> -->
</html>
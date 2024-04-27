Config.php
<?php
$conn = mysqli_connect('localhost', 'root', '', 'login_form');
?>
Login_form.php
<?php
@include 'config.php';
session_start();
if (isset($_POST['submit'])) {
 $name = mysqli_real_escape_string($conn, $_POST['name']);
 $email = mysqli_real_escape_string($conn, $_POST['email']);
 $password = md5($_POST['password']);
 $cpassword = md5($_POST['cpassword']);
 $user_type = $_POST['user_type'];
 $select = " SELECT * FROM ​user_form WHERE  email='$email' && password = '$password' ";
 $result = mysqli_query($conn, $select);
 if (mysqli_num_rows($result) > 0) {
   $row = mysqli_fetch_array($result);
   if ($row['user_type'] == 'admin') {
     $_SESSION['admin_name'] = $row['name'];
     header('location:admin.php');
   } elseif ($row['user_type'] == 'user') {
     $_SESSION['user_name'] = $row['name'];
     header('location:user_page.php');
   }
 } else {
   $_error[] = 'incorrect email or password!!!';
 }};
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>login form</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="from-container">
   <form action="" method="post">
     <h3>login now</h3>
     <?php
     if (isset($error)) {
       foreach ($error as $error) {
         echo '<span class="error-msg">' . $error . '</span>';
       };
     ?>
     <input type="email" name="email" required placeholder="Enter your email">
     <input type="password" name="password" required placeholder="Enter your password">
     <input type="submit" name="submit" value="register now" class="form-btn">
     <p>don't have an account.. <a href="register_form.php">register now</a></p>
   </form>
 </div>
</body>
</html>
Register _form.php
<?php
@include 'config.php';
if (isset($_POST['submit'])) {
 $name = mysqli_real_escape_string($conn, $_POST['name']);
 $email = mysqli_real_escape_string($conn, $_POST['email']);
 $password = md5($_POST['password']);
 $cpassword = md5($_POST['cpassword']);
 $user_type = $_POST['user_type'];
 $select = " SELECT * FROM ​user_form WHERE  email='$email' && password = '$password' ";
 $result = mysqli_query($conn, $select);
 if (mysqli_num_rows($result) > 0) {
   $error[] = " Email already exist.";
 
 
 } else {
   if ($password != $cpaasword) {
     $error[] = " Password does not  match.";
   } else {
     $insert = "INSERT INTO  user_form(name,email,password, user_type) VALUES('$name', '$email','$password' ,'$user_type')";
     mysqli_query($conn, $insert);
     header('location:login_form.php');
   }
 }
}
;
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>register form</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="from-container">
   <form action="" method="post">
     <h3>Register now</h3>
     <?php
     if (isset($error)) {
       foreach ($error as $error) {
         echo '<span class="error-msg">' . $error . '</span>';
       } ;  };
     ?>
     <input type="text" name="name" required placeholder="Enter your name">
     <input type="email" name="email" required placeholder="Enter your email">
     <input type="password" name="password" required placeholder="Enter your password">
     <input type="password" name="cpassword" required placeholder="confirm your password">
     <select name="user_type">
       <option value="admin">admin</option>
       <option value="user">user</option>
     </select>
     <input type="submit" name="submit" value="register now" class="form-btn">
     <p>already have an account.. <a href="login_form.php">login now</a></p>
   </form>
 </div>
</body>
 
</html>
 
Logout.php
<?php
@include 'config.php';
session_start();
session_unset();
session_destroy();
header('location:')
 ?>
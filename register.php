<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $name = mysqli_real_escape_string($conn, $filter_name);
   $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $email = mysqli_real_escape_string($conn, $filter_email);
   $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
   $pass = mysqli_real_escape_string($conn, md5($filter_pass));
   $filter_cpass = filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);
   $cpass = mysqli_real_escape_string($conn, md5($filter_cpass));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:index.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>
  body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-image: url('images/home.jpg');
    background-size: cover;
    background-position: center;
  }
  
  .form-container {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
  }
  
  .form-container form {
    padding: 2rem;
    border-radius: .5rem;
    border: 1px solid #ccc; 
    background-color: #fff; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
    width: 50rem;
    text-align: center;
  }
  
  .form-container form h3 {
    font-size: 2.5rem;
    text-transform: uppercase;
    color: #000; 
    margin-bottom: 1rem;
  }
  
  .form-container form .box {
    width: 100%;
    padding: 1.2rem 1.4rem;
    font-size: 1.8rem;
    color: #000; 
    border: 1px solid #ccc; 
    background-color: #f8f9fa; 
    margin: 1rem 0;
    border-radius: .5rem;
  }
  
  .form-container form p {
    margin-top: 1.5rem;
    font-size: 2rem;
    color: #ccc; 
  }
  
  .form-container form p a {
    color: #ff69b4; 
  }
  
  .form-container form p a:hover {
    text-decoration: underline;
  }
</style>
</head>

<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
<section class="form-container">

   <form action="" method="post">
      <h3>🐾 register now - Pawtique 🐾</h3>
      <input type="text" name="name" class="box" placeholder="Username" required>
      <input type="email" name="email" class="box" placeholder="Email" required>
      <input type="password" name="pass" class="box" placeholder="Password" required>
      <input type="password" name="cpass" class="box" placeholder="Repeat Password" required>
      <input type="submit" class="btn" name="submit" value="Register Now">
      <p>Already have an account? <a href="index.php">Login Now</a></p>
   </form>

</section>

</body>
</html>
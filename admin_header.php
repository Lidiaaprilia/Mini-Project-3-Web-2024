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

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>header</title>

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

   <style>
      .header{

         position: sticky;
         top:0; left:0; right:0;
         z-index: 1000;
         background-color: var(--white);
         box-shadow: var(--box-shadow);
      }

      .header .flex .account-box div a{
         color:var(--pink);
      }
   </style>

</head>
<body>
   
   <header class="header">

      <div class="flex">


         <a href="admin_page.php" class="logo">Admin<span>Dashboard</span></a>

         <nav class="navbar">

            <a href="admin_page.php">Home</a>
            <a href="admin_products.php">Products</a>
            <a href="admin_orders.php">Orders</a>
            <a href="admin_users.php">Users</a>
            <a href="admin_contacts.php">Messages</a>
         </nav>

      <div class="icons">

         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>Username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>Email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">Logout</a>
         <div>New <a href="index.php">Login</a> | <a href="register.php">Register</a> </div>
      </div>

      </div>

   </header>
   
</body>
</html>


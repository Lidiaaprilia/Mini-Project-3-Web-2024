<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:index.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

   <style>
      .dashboard .box-container .box a{
   padding:1.5px;
   border-radius: .5rem;
   background-color: var(--light-bg);
   color:var(--light-color);
   border:var(--border);
   margin-top: 2rem;
   font-size: 2rem;
}
   </style>

</head>
<body>
   
<?php @include 'admin_header.php'; ?>

<section class="dashboard">

   <h1 class="title">dashboard</h1>

   <div class="box-container" >

      <div class="box" >
         <?php
            $total_pendings = 0;
            $select_pendings = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
            while($fetch_pendings = mysqli_fetch_assoc($select_pendings)){
               $total_pendings += $fetch_pendings['total_price'];
            };
         ?>
         <h3>$<?php echo $total_pendings; ?>/-</h3>
         <h3>-------</h3>
         <a href="admin_orders.php" style="background-color: pink;">Pending Payments</a>
      </div>

      <div class="box" >
         <?php
            $total_completes = 0;
            $select_completes = mysqli_query($conn, "SELECT * FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
            while($fetch_completes = mysqli_fetch_assoc($select_completes)){
               $total_completes += $fetch_completes['total_price'];
            };
         ?>
         <h3>$<?php echo $total_completes; ?>/-</h3>
         <h3>-----------</h3>
         <a href="admin_orders.php" style="background-color: pink;">Completed Payments</a>
      </div>

      <div class="box" >
         <?php
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <h3>-----</h3>
         <a href="admin_orders.php" style="background-color: pink;">Orders Placed</a>
      </div>

      <div class="box" >
         <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         <h3><?php echo $number_of_products; ?></h3>
         <h3>-----</h3>
         <a href="admin_products.php" style="background-color: pink;">Products</a>
      </div>

      <div class="box" >
         <?php
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         <h3><?php echo $number_of_users; ?></h3>
         <h3>-----</h3>
         <a href="admin_users.php" style="background-color: pink;">Users</a>
      </div>

      <div class="box" >
         <?php
            $select_admin = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
            $number_of_admin = mysqli_num_rows($select_admin);
         ?>
         <h3><?php echo $number_of_admin; ?></h3>
         <h3>-----</h3>
         <a href="admin_users.php" style="background-color: pink;">Admin</a>
      </div>

      <div class="box" >
         <?php
            $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <h3>-----</h3>
         <a href="admin_users.php" style="background-color: pink;">Total Accounts</a>
      </div>

      <div class="box" >
         <?php
            $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         <h3>-----</h3>
         <a href="admin_contacts.php" style="background-color: pink;">Messages</a>
      </div>

   </div>

</section>













<script src="js/admin_script.js"></script>

</body>
</html>
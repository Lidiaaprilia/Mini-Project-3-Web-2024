<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>About Pawtique</h3>
    <p> <a href="home.php">Home</a> / About </p>
</section>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/about 1.jpg" alt="">
        </div>

        <div class="content">
            <h3>why choose us?</h3>
            <p>Pawtique offers high-quality products for your pets. Each item available is carefully selected by our team of experts, so you can rest assured that you are getting the best for your pawfriend.</p>
            <a href="shop.php" class="btn">shop now</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>what we provide?</h3>
            <p>Pawtique offers a wide range of high-quality pet foods designed to meet your pet's nutritional and health needs. From dry food to wet food, we provide a carefully curated selection from trusted brands in the pet industry.</p>
            <a href="contact.php" class="btn">contact us</a>
        </div>

        <div class="image">
            <img src="images/about 2.jpg" alt="">
        </div>

    </div>

</section>













<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>
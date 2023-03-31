<?php 
   include_once 'connection.php';
   
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sveces</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    
<header>

    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="#" class="logo"> Sveces</a>

    <nav class="navbar">
        <a href="home.php">Sākums</a>

        <?php  if(!isset($_SESSION['user_id'])):?>
        <a href="login.php">Produkti</a>
        <?php endif; ?>
        <?php  if(isset($_SESSION['user_id'])):?>
        <a href="products.php">Produkti</a>
        <?php endif; ?>

        
        <a href="review.php">Atsauksmes</a>

        <?php  if(isset($_SESSION['user_id'])):?>
        <a href="write.php">Rakstīt atsauksmi</a>
        <?php endif; ?>

        <a href="contact.php">Saziņa</a>
        
      <?php  if(!isset($_SESSION['user_id'])):?>
        <a href="register.php">Reģistrēties</a>
        <a href="login.php">Ielogoties </a> 
        <?php endif; ?>

    <?php if(!isset($_SESSION['user_id'])):?>
        <?php elseif($_SESSION['role']==1):?>
               
  <a href="allusers.php">Visi lietotāji</a>
  <a href="insert.php">Pievienot produktu</a>
  <a href="messages.php">Ziņas</a>

</div>
        <?php endif; ?>

     

    </nav>
   

    <div class="icons">
         <?php if(isset($_SESSION['user_id'])):?>
        <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
        
        <a href="user.php?uid=<?=$_SESSION['user_id'];?>"><i class="fas fa-user"></i></a>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['user_id'])):?>
        <a href="logout.php"><i class=" fas fa-solid fa-door-open"></i></a>
        <?php endif; ?>
    </div>

     

</header>


<?php
include_once 'connection.php';
include_once 'header.php';
include_once 'functions.php';

$errors = [];

if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}

$ses_user=$_SESSION['user_id'];
$prof_user=$_GET['uid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $first_name = test_input($_POST['first_name']);
    $last_name = test_input($_POST['last_name']);
    $email = test_input($_POST['email']);

   
    if(empty($first_name)){
        $errors['first_name'] = 'Vārds nevar palikt tukšs!';
    } elseif(strlen($first_name) < 3){
        $errors['first_name'] = 'Vārdam jābūt vismaz 3 simbolus garam!';
    }

    if(empty($last_name)){
        $errors['last_name'] = 'Uzvārds nevar palikt tukšs!';
    } elseif(strlen($last_name) < 3){
        $errors['last_name'] = 'Uzvārdam jābūt vismaz 3 simbolus garam!';
    }

    if(empty($email)){
        $errors['email'] = 'E-pasts nevar palikt tukšs!';
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Nepareizs e-pasta formāts";
    }

    if (count($errors) == 0) {
        
        if(strlen($_POST['new_password']) > 0){
            $hashed_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            $query="UPDATE users SET password='$hashed_password' WHERE user_id = '$prof_user'";
            mysqli_query($conn, $query);
        }

       
        $query = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email' WHERE user_id='$prof_user'";
        if (mysqli_query($conn, $query)) {
           
            header("location: user.php?uid=$prof_user");
        } else {
            
            echo "Kļūda atjauninot produktu: " . mysqli_error($conn);
        }
    }
}


$query="SELECT * FROM users WHERE user_id ='$prof_user'";
if ($result = mysqli_query($conn, $query)): 
    $user = mysqli_fetch_assoc($result); 
?>

<?php
   if(isset($errors)){
      foreach($errors as $error){
         echo '
         <div class="errors_list">
         
            <span>'.$error.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>
<section class="userprof">
<div class="profile-container">
    <form action="" method="post">
        <div class="flex">
            <div class="inputBox">
                <h1 class="profile_heading"> Tavs profils </h1>
                <span>Tavs vārds : </span><br>
                <input type="text" name="first_name" required class="box" placeholder="Enter your first name" value="<?= $user['first_name']; ?>"><br><br>
                <span>Tavs uzvārds : </span><br>
                <input type="text" name="last_name" required class="box" placeholder="Enter your last name" value="<?= $user['last_name']; ?>"><br><br>
                <span>Tavs e-pasts : </span><br>
                <input type="email" name="email" required class="box" placeholder="enter your email" value="<?= $user['email']; ?>"><br><br>
                <span>Parole : </span><br>
                <input type="password" class="box" name="new_password" placeholder="Parole"/><br><br>
                <p> Tavs reģistrācijas datums: <?=$user["register_date"];?> </p><br>
                <p> Tava loma ir: <?php if($user["role"]==1):?>Administrātors<?php endif;?><?php if ($user["role"]==0):?>Lietotājs<?php endif;?></p>
                <a href="home.php" class="btn">Atpakaļ</a>
                <button type="submit" class="btn" name="update">Atjaunināt</button>
            </div>
        </div>
    </form>
</div>
</section>

<?php 
endif;
include_once 'footer.php';
?>

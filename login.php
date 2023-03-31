<?php

include 'connection.php';

include_once 'functions.php';

if(isset($_SESSION['user_id'])){
    header('location:home.php');
}
include_once 'header.php';
$errors = [];

if(isset($_POST['login'])){
    $email = test_input($_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $hashed_password = $user['password'];
       
        if(password_verify($password, $hashed_password)){
            //Pareizi dati
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['first_name'] = $user['first_name'];
            header('location: home.php');
        } else {
            $errors['email'] = 'Nepareizs e-pasts un/vai parole';
        }
    } else {
        $errors['email'] = 'Nepareizs e-pasts un/vai parole';
    }
}

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

<section class="login" id="login">

    <div class="logincontainer">
      <div class="loginwrapper">
        <div class="logintitle"><span>Autentifikācija</span></div>
        <form method="post">
          <div class="loginrow">
            <i class="fas fa-user"></i>
            <input type="email" name="email" placeholder="E-pasts" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"><br>
          </div>
          <div class="loginrow">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Parole" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"><br>
          </div>
          
          <div class="loginrow button">
          <input type="submit" name="login" value="Pieslēgties" >
          </div>
          <div class="loginsignup-link"> Tev nav konts? <a href="register.php">Reģistrējies tagad</a>
        </form>
      </div>
    </div>

    </div>

</section>

<?php include_once 'footer.php'; ?>
   



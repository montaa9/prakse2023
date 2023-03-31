<?php
include_once 'connection.php';
include_once 'functions.php';
include_once 'header.php';
    
$errors =[];//sākumā definē kļūdu masīvu
//Nodefinē iesniegtos datus pārbaudei
if(isset($_POST['register'])){ 
   
    $firstname = test_input($_POST['first_name']);
    $lastname = test_input($_POST['last_name']);
    $password = ($_POST['password']);
    $register_date = date('Y-m-d H:i:s');
    $email = test_input($_POST["email"]);

 //Vārda pārbaude
    if(empty($firstname)){
        $errors['first_name'] = 'Vārds nedrīkst palikt tukšs!';}
        elseif(strlen($firstname)< 3){
            $errors['first_name'] = 'Vārdam jābūt vismaz 3 simbolus garam!';}

 //Uzvārda pārbaude
 if(empty($lastname)){
    $errors['last_name'] = 'Uzvārds nedrīkst palikt tukšs!';}
    elseif(strlen($lastname)< 3){
        $errors['last_name'] = 'Uzvārdam jābūt vismaz 3 simbolus garam!';}
        
 //Paroles pārbaude
  if(empty($password)){
    $errors['password'] = 'Parole nedrīkst palikt tukša!';
  } elseif(strlen($password) < 8){
    $errors['password'] = 'Parolei jābūt vismaz 8 simbolus garai';
  } else { 
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  }
 //E-pasta pārbaude
 if(empty($email)){
    $errors['email'] = 'E-pasts nedrīkst palikt tukšs!';}
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Nepareizs e-pasta formāts!";
    }
    //Ja nav kļūdu lietotājs tiek reģistēts un dati nosūtīti uz datu bāzi
    if (count($errors) == 0){ 
        $query = "INSERT INTO users (first_name, last_name, email, password, register_date)
        VALUES('$firstname', '$lastname', '$email', '$hashed_password', '$register_date')";
        mysqli_query($conn, $query);
        header("location:login.php");
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

<div id="error"></div>

<section class="registers" id="register">

<div class="registercontainer">
      <div class="registerwrapper">
        <div class="registertitle"><span>Reģistrācija</span></div>
        <form action= "" method= "post">
          <div class="registerrow">
            <p class="registerp">Tavs vārds:</p>
            <input type="text" name="first_name" class="contactfield" placeholder="Tavs vārds" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>">
          </div>

          <div class="registerrow">
          <p class="registerp">Tavs uzvārds:</p>
          <input type="text" name="last_name" class="contactfield" placeholder="Tavs uzvārds" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>">
          </div>
          
          <div class="registerrow">
          <p class="registerp">Tavs e-pasts:</p>
          <input type="email" name="email" class="contactfield" placeholder="E-pasts" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" id="email">
          </div>

          <div class="registerrow">
          <p class="registerp">Parole:</p>
          <input type="password" name="password" class="contactfield" placeholder="Parole" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>">
          </div>

          <div class="registerrow button">
          <input type="submit" name="register" value="Reģistrēties" class="contactbtn" a href="login.php">
          </div>
          <div class="registersignup-link"> Tev jau ir konts? <a href="login.php">Pieslēdzies</a>
        </form>
      </div>
    </div>


</section>
   

<?php include_once 'footer.php'?>



<script>
window.onload =() =>{
    document.getElementById('email').onkeyup =(event) =>{
        let email=event.target.value;
        

        if (validateEmail(email)){
            document.getElementById('email').style.border="1px solid green";
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let response = JSON.parse(this.responseText)
                    console.log(response.emailExists) // No teksta pārveido uz objektu
                        if (response.emailExists) {
                            document.getElementById("error").innerHTML = "Šis e-pasts ir jau aizņemts!";
                            document.getElementById('email').style.border="1px solid yellow";
                        } else {
                            document.getElementById('email').style.border="1px solid green";
                            document.getElementById("error").innerHTML = "Šis e-pasts ir brīvs!";
                        }
                }
            };

            let data = {};
            data.email = email;
            data = JSON.stringify(data); // Pārveido uz tekstu

            xhttp.open("POST", "server.php", true);
            xhttp.send(data);
        } 
    };
 
    const validateEmail = (email) => {
        return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    };
}


</script> 




<?php
include_once 'connection.php';
include_once 'header.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
   
    $query = "INSERT INTO messages (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
    if ($result = mysqli_query($conn, $query)) {
        echo '<div class="errors_list">Message sent successfully!</div>';
    } else {
        echo '<div class="errors_list">Error: ' . $conn->error . '</div>';
    }
}
?>

<section class="contact" id="contact">

    <h1 class="heading"> Nosūti mums ziņu </h1>

    <div class="contactcontainer">
		<div class="contactcontact-box">
			<div class="contactleft"></div>
				<div class="contactright">
				<h2>Sūti ziņu</h2>
				<form method="post">
				    <input type="text" class="contactfield" placeholder="Tavs pilnais vārds" name="name" required>
				    <input type="text" class="contactfield" placeholder="Tavs e-pasts" name="email" required>
				    <input type="text" class="contactfield" placeholder="Tavs telefona nummurs" name="phone" required>
				    <textarea placeholder="Ziņa" class="contactfield" name="message" required></textarea>
				    <button class="contactbtn" type="submit" name="submit">Nosūtīt</button>
				</form>
			</div>
		</div>
	</div>

</section>

<?php
include 'footer.php';


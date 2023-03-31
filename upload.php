
<?php

include_once 'connection.php';
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$product_name = test_input($_POST["product_name"]);
	$product_description = test_input($_POST["product_description"]);
	$product_image = basename($_FILES["product_image"]["name"]);
    $product_price = test_input($_POST["product_price"]);

	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["product_image"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	

	
	if (move_uploaded_file($_FILES["product_image"]["name"], $target_file)) {
		echo "The file ". htmlspecialchars( basename( $_FILES["product_image"]["name"])). " tika pievienots.";
	} else {
		die("Notika kļūda pievienojot produktu.");
	}

	
	$query = "INSERT INTO products (product_name, product_description, product_image, product_price) VALUES ('$product_name', '$product_description', '$product_image', '$product_price')";
	if ($result = mysqli_query($conn, $query)) {
        header("location:products.php");
	} else {
		die("Kļūda pievienojot produktu: " . $conn->error);
	}
}



?>

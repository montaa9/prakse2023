<?php

include_once 'connection.php';
include 'functions.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$review_name = test_input($_POST["review_name"]);
	$review_text = test_input($_POST["review_text"]);
	

	
	$query = "INSERT INTO reviews (review_name, review_text) VALUES ('$review_name', '$review_text')";
	if ($result = mysqli_query($conn, $query)) {
        header("location:review.php");
	} else {
		die("Kļūda pievienojot produktu: " . $conn->error);
	}
}



?>

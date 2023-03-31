<?php

include_once 'connection.php';

if (isset($_POST['submit'])) {
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);

    $product_image = $_FILES['product_image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($product_image);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $allowed_types = array("jpg", "jpeg", "png", "gif");
    if (in_array($imageFileType, $allowed_types)) {
        move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);

        $query = "INSERT INTO products (product_name, product_description, product_price, product_image) VALUES ('$product_name', '$product_description', '$product_price', '$product_image')";
        mysqli_query($conn, $query);

        header('Location: products.php');
        exit();
    } else {
        echo "Nepareiza tipa fails.";
    }
}
?>

<?php include_once 'header.php'; ?>


<section class="addproduct"

  <div class="incontainer">
		<div class="incontact-box">
			
				<div class="contactright">
				<h2>Pievienot produktu</h2>
				<form method="post" enctype="multipart/form-data">

        <label for="product_name">Produkta nosaukums:</label>
    <input  name="product_name" required class="infield"><br><br>  

    <label for="product_description">Produkta apraksts:</label>
    <textarea name="product_description" required class="infield"></textarea><br><br>

    <label for="product_price">Produkta cena:</label>
    <input type="number" name="product_price" min="0" step="0.01" required class="infield"><br><br>

    <label for="product_image">Produkta attēls:</label>
    <input type="file" name="product_image" accept="image/*" required class="infield" ><br><br>
				   
				   
				    
    <input type="submit" name="submit" value="Pievienot" class="inbtn">
				</form>
			</div>
		</div>
	</div>

</section>
<?php include_once 'footer.php'; ?>



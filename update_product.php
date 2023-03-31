<?php 

include 'connection.php';
include 'header.php';
include 'functions.php';

$product_id = $_GET['uid'];
$query = "SELECT * FROM products WHERE product_id = '$product_id'";
if($result = mysqli_query($conn, $query)):
$product = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $product_name = test_input($_POST['product_name']);
    $product_description = test_input($_POST['product_description']);
    $product_image = $_FILES["product_image"]["name"];
    $product_price = test_input($_POST["product_price"]);
    $query="UPDATE products SET product_name='$product_name', product_description='$product_description', product_price='$product_price'" .
       (!empty($product_image) ? ", product_image='$product_image'" : "") .
       (isset($_POST['delete_image']) ? ", product_image=NULL" : "") .
       " WHERE product_id = '$product[product_id]'";
	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["product_image"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
		echo "The file ". htmlspecialchars( basename( $_FILES["product_image"]["name"])). " has been uploaded.";
	}
    mysqli_query($conn, $query);

    header("location:products.php?uid=$product[product_id]");

    }?>

   
<section class="addproduct"





<div class="incontainer">
		<div class="incontact-box">
			
				<div class="contactright">
				<h2>Atjaunināt produktu</h2>
        <form method="post" enctype="multipart/form-data" >

        <label for="product_name">Produkta nosaukums:</label>
    <input  name="product_name" required class="infield" value="<?= $product['product_name']; ?>"><br><br>  

    <label for="product_description">Produkta apraksts:</label>
    <input name="product_description" required class="infield" value="<?= $product['product_description']; ?>"><br><br>

    <label for="product_price">Produkta cena:</label>
    <input type="number" name="product_price" min="0" step="0.01" required class="infield" value="<?= $product['product_price']; ?>"><br><br>

    <label for="product_image">Produkta attēls:</label>
<input type="file" name="product_image" class="infield">
<?php if (!empty($product['product_image'])): ?>
    <br><br>
    <p>Jau produkta esošais attēls:</p>
    <img src="uploads/<?= $product['product_image'] ?>" alt="Product Image" height="100">
    <br><br>
<?php endif; ?>
				   
				    
<input type="submit" class="inbtn" name="update" value="Atjaunināt produktu">
				</form>
			</div>
		</div>
	</div>

  </section>





<?php
endif;?>
<?php 
include "footer.php";?>


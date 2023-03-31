<?php
include_once 'connection.php';
 include_once 'header.php';

?>

    <h1 class ="heading">Produktu saraksts</h1>

            
      <?php
      
            $query = "SELECT * FROM products ORDER BY product_id DESC";

            $result = mysqli_query($conn, $query);

            
            if (mysqli_num_rows($result) > 0):

                while($product = mysqli_fetch_assoc($result)): ?>

                    <div class="cont">
                    
                    <div class="prod">
                    <div class="name">  <br><?= $product["product_name"] ?> </div>
              <div class="ppic"><img class='product' src='uploads/<?=$product["product_image"]?>'></div>
              <div class="descrip"> <?= $product["product_description"] ?> </div>
              <div class="price" ><?= $product["product_price"] ?>$  </div>
              <div class="bbutn">
              <form method="post" action="cart.php">
        <input type="hidden" name="product_id" value="<?= $product['product_id']; ?>">
         <button type="submit" class="usbtn" name="buy">Pirkt</button>
                </form>
                </div>
                <div class="adbutn">
                <?php
               if($_SESSION['role']==1) {
                echo ' <td> <a href="update_product.php?uid=' . $product['product_id'] .'"><button name="update" class="usbtn">Atjaunināt</button></a></td>';
              echo '<td> <a href="deletep.php?uid=' . $product['product_id'] . '"><button class="usbtn">Izdzēst</button></a></td>';
                }
?> </div>
                </div> </div>
               
            
              
            
        
            
            <?php endwhile; ?>  
<?php endif; ?>
            

            
    

</body>
</html>


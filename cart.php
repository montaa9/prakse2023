<?php
include_once 'connection.php';
include_once 'header.php';

if (isset($_POST['buy'])) {
    $product_id = $_POST['product_id'];
    $query = "SELECT * FROM products WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $_SESSION['cart'][] = $product;
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $product_id = $product['product_id'];
            $query = "INSERT INTO cart (user_id, product_id) VALUES ('$user_id', '$product_id')";
            mysqli_query($conn, $query);
        }
    }
}

if (isset($_POST['remove'])) {
    $product_id = $_POST['product_id'];
    foreach ($_SESSION['cart'] as $key => $product) {
        if ($product['product_id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }

    
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $query = "DELETE FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
        mysqli_query($conn, $query);
    }
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT products.* FROM products INNER JOIN cart ON products.product_id = cart.product_id WHERE cart.user_id = '$user_id'";
    $result = mysqli_query($conn, $query);
    $_SESSION['cart'] = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['cart'][] = $row;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <h1 class="heading">Tavs iepirkuma grozs</h1>
    <section class="cart">
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>Produkta nosaukums</th>
                <th>Produkta apraksts</th>
                <th>Produkta attēls</th>
                <th>Produkta cena</th>
                <th>Izņemt no groza</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                $total_price = 0;
                foreach ($_SESSION['cart'] as $product) {
                    echo "<tr>";
                    echo "<td>" . $product["product_name"] . "</td>";
                    echo "<td>" . $product["product_description"] . "</td>";
                    echo "<td><img class='product' src='uploads/{$product["product_image"]}'></td>";
                    echo "<td>" . $product["product_price"] .   "$ </td>";
                    echo "<td><form method='post'>
                              <input type='hidden' name='product_id' value='" . $product["product_id"] . "'>
                              <button type='submit' name='remove'>Izņemt</button>
                          </form></td>";
                    echo "</tr>";
                    $total_price += $product["product_price"];
                }
                echo "<tr><td colspan='3'></td><td>Kopējā summa: " . $total_price . "$</td><td></td></tr>";
            } else {
                echo "<tr><td colspan='5'>Tavs grozs ir tukšs.</td></tr>";
            }
            ?>
        </tbody>
    </table>
       
</body>
</html>
</section>

         <?php include_once 'footer.php'; ?>          
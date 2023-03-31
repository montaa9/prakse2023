<?php
include_once 'connection.php';
include_once 'header.php';

$query = "SELECT * FROM messages ORDER BY sent_num DESC";
$result = mysqli_query($conn, $query);
echo "<section class='messages'>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='message-box'>";
        echo "<p><strong>No:</strong> " . $row['name'] . "</p>";
        echo "<p><strong>E-pasts:</strong> " . $row['email'] . "</p>";
        echo "<p><strong>Tālrunis:</strong> " . $row['phone'] . "</p>";
        echo "<p><strong>Ziņa:</strong> " . $row['message'] . "</p>";
        echo "</div>";
    }
} else {
    echo "Jums nav ziņu.";
}
echo "</section>";
include 'footer.php';
?>

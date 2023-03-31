<?php
include_once 'header.php';
?>


<h1 class="heading"> Atsauksmes no pircējiem </h1>



<?php
        $query = "SELECT * FROM reviews ORDER BY write_num DESC";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            while($review = mysqli_fetch_assoc($result)) {
                echo '<section class="review" id="review">';
                echo '<div class="box-container">';
                echo '<div class="box">';
                echo '<div class="user">';
                echo ' <div class="user-info">';
                echo "<p>". $review["review_name"] . "</p>";
                echo '</div>';
                echo '</div>';
                echo '<br>';
                echo "<p>" . $review["review_text"] . "</p>";
                echo '</div>'; 
                echo '<br>';
                echo '</section>';
            }
        }
        
        
        
        
        


include_once 'footer.php';
?>
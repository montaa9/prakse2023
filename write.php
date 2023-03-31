<?php
include_once 'header.php';


?>
<!DOCTYPE html>
<html>

<body>
<section class="write">



<div class="wrcontainer">
		<div class="wrcontact-box">
				<div class="wrright">
				<h2>Raksti atsauksmi</h2>
				<form action="rupload.php" method="post" enctype="multipart/form-data">

				<h2>Tavs pilnais vārds: </h2>
		<input type="text" class="wrfield" name="review_name" placeholder="Tavs vārds vai iesauka" required><br>

		<h2>Tava atsauksme:</h2>
		<textarea name="review_text" class="wrfield" placeholder="Tava atsauksme" required></textarea><br>

		<input type="submit" class="wrbtn" value="Sūtīt atsauksmi">
				</form>
			</div>
		</div>
	</div>
</section>

<?php include_once 'footer.php'; ?>

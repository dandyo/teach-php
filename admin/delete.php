<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('../db.php');
require_once('header.php');

$id= $_GET['id'];

if(isset($_POST["submit"])) {

	$sql = "DELETE FROM products WHERE id=$id";

	if ($conn->query($sql) === TRUE) {
	  	echo "Record deleted successfully";
	  	header( 'Location: products.php?message=success-delete' );
   		exit();
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}
?>
	<section class="py-5">
		<div class="container-xl">
			<h1 class="mb-4">Delete product</h1>
			
			<form method="post">
				<h4 class="mb-4">Are you sure you want to delete?</h4>
				<input type="submit" name="submit" value="Yes" class="btn btn-primary"> 
				<a href="products.php" class="btn btn-link">Cancel</a>
			</form>
		</div>
	</section>
<?php

require_once('footer.php');
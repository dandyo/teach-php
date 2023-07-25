<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('../db.php');
require_once('header.php');
	
$id= $_GET['id'];

$name = $description = $price = $size = "";

$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $name = $row['name'];
    $description =  $row['description'];
    $price = $row['price'];
    $size = $row['size'];
  }
} else {
  echo "0 results";
}

if(isset($_POST["submit"])) {
	// $id=$_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$size = $_POST['size'];

	$sql = "UPDATE products SET name='$name', description='$description', price='$price', size='$size' WHERE id=$id";

	if ($conn->query($sql) === TRUE) {
	  	echo "Record updated successfully";
	  	header( 'Location: products.php?message=success' );
   		exit();
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}
?>
	<section class="py-5">
		<div class="container-xl">
			<h1>Edit product</h1>
			
			<form method="post">
				<div class="mb-3">
					<label class="form-label">Name</label>
					<input type="text" name="name" class="form-control" value="<?php echo $name ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Price</label>
					<input type="text" name="price" class="form-control" value="<?php echo $price ?>">
				</div>
				<div class="mb-3">
					<label class="form-label">Size</label>
					<select name="size" class="form-control">
						<option value="S">Small</option>
						<option value="M">Medium</option>
						<option value="L">Large</option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Description</label>
					<textarea name="description" class="form-control"><?php echo $description ?></textarea>
				</div>
				<input type="submit" name="submit" value="Save" class="btn btn-primary">
			</form>
		</div>
	</section>
<?php

require_once('footer.php');
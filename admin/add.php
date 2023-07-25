<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('../db.php');
require_once('header.php');

$name = $description = $price = $size = "";

if (isset($_POST["submit"])) {
	$target_dir = "../images/products/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$newname = time() . basename($_FILES["image"]["name"]);
	$newname_file = $target_dir . $newname;
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	$imageFilename = '';

	// Check if image file is a actual image or fake image
	if (isset($_POST["submit"])) {
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if ($check !== false) {
			// echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}

	// Check if file already exists
	if (file_exists($newname_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}

	// Check file size
	if ($_FILES["image"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if (
		$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif"
	) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $newname_file)) {
			// echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
			// echo htmlspecialchars( basename( $_FILES["image"]["name"]));
			$imageFilename = htmlspecialchars($newname);
			// echo $imageFilename . "<br>";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}

	if ($uploadOk == 1) {

		$name = $_POST['name'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$size = $_POST['size'];

		$sql = "INSERT INTO products (name, description, price, size, image)
		VALUES ('$name', '$description', '$price', '$size', '$newname')";

		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();

		header("Location: add.php?msg=success");
		die();
	}
}
?>
<section class="py-5">
	<div class="container-xl">
		<h1>Add new product</h1>

		<form method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Image</label>
				<input type="file" name="image" class="form-control" required>
			</div>
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
			<input type="submit" name="submit" value="Save" class="btn btn-primary"> <a href="products.php" class="btn">Back</a>
		</form>
	</div>
</section>
<?php

require_once('footer.php');

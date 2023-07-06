<?php
require_once('db.php');
require_once('header.php');

$id = $_GET['id'];

// echo $id;

$sql = "SELECT * FROM products WHERE id=".$id;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // i-display ang products
    while ($row = $result->fetch_assoc()) {
?>
	<section class="py-5">
		<div class="container-xl py-md-4">
			<div class="row mb-5">
				<div class="col-md-6 mb-4 mb-md-0 pe-md-5">
					<!-- <img src="images/jacket.jpg"> -->
					<div id="carouselExample" class="carousel slide">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="images/products/<?php echo $row['image']?>" class="d-block w-100" alt="...">
							</div>
						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>
				<div class="col-md-4 ps-md-3">
					<h2><?php echo $row['name']?></h2>
					<h5 class="mb-4">$<?php echo $row['price']?></h5>

					<p><?php echo $row['description']?></p>

					<div class="row mb-3">
						<div class="col-6">
							<div class="d-flex qty-input">
								<button class="btn">-</button>
								<input type="text" name="" class="form-control" value="2">
								<button class="btn">+</button>
							</div>
						</div>
						<div class="col-6">
							<select class="form-control size-select">
								<option>XL</option>
								<option>L</option>
								<option>M</option>
							</select>
						</div>
					</div>

					<p><small>Height of model: 189 cm. / 6′ 2″ Size 41</small></p>

					<a href="" class="btn btn-black px-4">Add to Cart - $<?php echo $row['price']?></a>
				</div>
			</div>

		</div>
	</section>
	<?php }
} else {
    echo "0 results";
}
$conn->close(); ?>


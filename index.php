<?php
require_once('db.php');
require_once('header.php');
require_once('banner.php');
?>

<section class="py-5">
    <div class="container-xl">
        <div class="row mb-5">
            <div class="col-md-6">
                <ul class="nav nav-pills nav-fill nav-filter">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Sweaters</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jackets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hats</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-end flex-column filter-sort-wrap">
                <div class="d-flex align-items-center filter-sort">
                    <span class="me-3">Sort By</span>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Popular
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div>Showing 1003 Products</div>
            </div>
        </div>

        <div class="row">
            <?php
            // echo "home";

            $sql = "SELECT * FROM products ORDER BY price ASC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // i-display ang products
                while ($row = $result->fetch_assoc()) { ?>
                    <!-- echo "<h3>" . $row["name"] . "</h3>"; -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <a class="product" href="product.php?id=<?php echo $row['id']; ?>">
                            <img src="images/products/<?php echo $row['image'] ?>" alt="<?php $row['name']; ?>">

                            <div class="d-flex justify-content-between">
                                <h3><?php echo $row['name']; ?></h3>
                                <span><?php echo $row['size']; ?></span>
                            </div>
                            <p>$<?php echo $row['price']; ?></p>
                        </a>
                    </div>
            <?php }
            } else {
                echo "0 results";
            }
            $conn->close(); ?>
        </div>
    </div>
</section>
<?php

require_once('footer.php');

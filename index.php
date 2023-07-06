<?php
require_once('db.php');
require_once('header.php');
?>

<section class="py-5">
    <div class="container-xl">
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
                            <img src="/images/products/<?php echo $row['image'] ?>" alt="<?php $row['name']; ?>">

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

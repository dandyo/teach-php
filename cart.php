<?php
require_once('db.php');
require_once('header.php');
?>

<section class="py-5">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-7 pe-lg-5">
                <h1 class="h3">Your cart</h1>

                <p>Not ready to checkout? Continue Shopping</p>

                <div class="cart-list">
                    <?php
                    $total_quantity = 0;
                    $total_price = 0;

                    foreach ($_SESSION["cart"] as $k => $item) {
                        $item_price = $item["qty"] * $item["price"];
                    ?>
                        <div class="cart-item" data-key="<?php echo $k; ?>">
                            <img src="images/products/<?php echo $item["image"]; ?>">
                            <div class="cart-item-details">
                                <h4><?php echo $item["name"]; ?></h4>
                                <p>Size: <?php echo $item["size"]; ?></p>
                                <p>Quantity: <?php echo $item["qty"]; ?></p>

                                <div class="d-flex justify-content-between">
                                    <h5>$<?php echo $item["price"]; ?></h5>
                                    <a href="#" class="btn-remove-item" data-id="<?php echo $k; ?>">Remove</a>
                                </div>
                            </div>
                        </div>
                    <?php
                        $total_quantity += $item["qty"];
                        $total_price += ($item["price"] * $item["qty"]);
                    }
                    ?>
                </div>

                <br>
                <br>

                <h4>Order Information</h4>
                <hr class="mb-1">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Return Policy
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                This is our example return policy which is everything you need to know about our returns.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Shipping Options
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Shipping Options
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 px-lg-5 order-summary">
                <h4 class="pt-5 mb-4">Order Summary</h4>

                <form class="mb-3">
                    <input type="text" name="" class="form-control" placeholder="Enter coupon code here">
                </form>

                <p class="d-flex justify-content-between">
                    <span>Subtotal</span>
                    <span><?php echo "$ " . number_format($total_price, 2); ?></span>
                </p>
                <p class="d-flex justify-content-between">
                    <span>Shipping</span>
                    <span>Calculated at the next step</span>
                </p>
                <hr>
                <p class="d-flex justify-content-between">
                    <span>Total</span>
                    <span><?php echo "$ " . number_format($total_price, 2); ?></span>
                </p>

                <a href="checkout.php" class="btn btn-black w-100">Continue to checkout</a>
            </div>
        </div>
    </div>
</section>

<pre>
<?php
print_r($_SESSION['cart']); ?>
</pre>
<?php

require_once('footer.php');

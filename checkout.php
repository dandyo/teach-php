<?php
require_once('db.php');
require_once('header.php');
?>
<section class="py-5">
    <div class="container-xl">
        <div class="row justify-content-between">
            <div class="col-md-5">
                <h1 class="h3">Checkout</h1>
                <div class="checkout-breadcrumb mb-4">
                    <div class="active">Address</div>
                    <span></span>
                    <div class="">Shipping</div>
                    <span></span>
                    <div class="">Payment</div>
                </div>
                <h5 class="mb-4">Shipping Information</h5>
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Address">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Apartment Suite">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="City">
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <select class="form-control">
                                <option value="">Country</option>
                                <option value="Philippines">Philippines</option>
                                <option value="China">China</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <select class="form-control">
                                <option value="">City</option>
                                <option value="Philippines">Philippines</option>
                                <option value="China">China</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" name="" class="form-control" placeholder="Zipcode">
                        </div>
                    </div>
                    <input type="submit" value="Place Order" class="btn btn-black w-100">
                </form>
            </div>
            <div class="col-md-5 px-lg-5 myown-class">
                <p class="pt-5">Your Cart</p>
                <div class="cart-list">
                    <?php
                    $total_quantity = 0;
                    $total_price = 0;

                    foreach ($_SESSION["cart"] as $item) {
                        $item_price = $item["qty"] * $item["price"];
                    ?>
                        <div class="cart-item">
                            <img src="images/products/<?php echo $item["image"]; ?>">
                            <div class="cart-item-details">
                                <h4><?php echo $item["name"]; ?></h4>
                                <p>Size: <?php echo $item["size"]; ?></p>
                                <p>Quantity: <?php echo $item["qty"]; ?></p>

                                <div class="d-flex justify-content-between">
                                    <h5>$<?php echo $item["price"]; ?></h5>
                                    <a href="#">Remove</a>
                                </div>
                            </div>
                        </div>
                    <?php
                        $total_quantity += $item["qty"];
                        $total_price += ($item["price"] * $item["qty"]);
                    }
                    ?>
                </div>

                <div class="order-summary">
                    <form class="mb-3">
                        <input type="text" name="" class="form-control" placeholder="Enter coupon code here">
                    </form>

                    <p class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span><?php echo "$ " . number_format($total_price, 2); ?></span>
                    </p>
                    <p class="d-flex justify-content-between">
                        <span>Shipping</span>
                        <span>$0</span>
                    </p>
                    <hr>
                    <p class="d-flex justify-content-between">
                        <span>Total</span>
                        <span><?php echo "$ " . number_format($total_price, 2); ?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once('footer.php');

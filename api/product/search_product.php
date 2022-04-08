<?php

if ($_SERVER['HTTP_HOST'] == "localhost") {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

$search = mysqli_real_escape_string($conn, $_POST["search"]);

$products = mysqli_query($conn, "SELECT * FROM `products` WHERE `id` LIKE '%$search%' OR `name` LIKE '%$search%' OR `describtion` LIKE '%$search%';");

if (mysqli_num_rows($products) > 0) {
    while ($product =  mysqli_fetch_assoc($products)) {
        $product_id = $product["id"];
        $images = mysqli_query($conn, "SELECT `image` FROM product_image WHERE `product_id`=$product_id");
?>

        <div class="card" style="width: 350px;">
            <div id="<?php echo "product" . $product_id; ?>" class="carousel slide" data-ride="carousel" data-interval="false">
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < mysqli_num_rows($images); $i++) {
                        if ($i == 0) { ?>

                            <li data-target="#<?php echo "product" . $product_id; ?>" data-slide-to='<?php echo $i ?>' class=" active "></li>

                        <?php } else { ?>

                            <li data-target="#<?php echo "product" . $product_id; ?>" data-slide-to='<?php echo $i ?>'></li>

                    <?php }
                    } ?>
                </ol>
                <div class="carousel-inner">

                    <?php $flag = false;
                    while ($image = mysqli_fetch_assoc($images)) {
                        if (!$flag) { ?>

                            <div class="carousel-item active">
                                <img class="d-block w-100 product_images" src="uploads/<?php echo $image['image']; ?>" alt="<?php echo $product['name']; ?>">
                            </div>

                        <?php $flag = true;
                        } else { ?>

                            <div class="carousel-item">
                                <img class="d-block w-100 product_images" src="uploads/<?php echo $image['image']; ?>" alt="<?php echo $product['name']; ?>">
                            </div>

                    <?php }
                    } ?>

                </div>
                <a class="carousel-control-prev" href="#<?php echo "product" . $product_id; ?>" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#<?php echo "product" . $product_id; ?>" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="card-body">
                <h4 class="card-title"><?php echo $product["name"] ?></h4>
                <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
                <p class="card-text"><?php echo $product["describtion"] ?></p>

                <div class="buy d-flex justify-content-between align-items-center">
                    <div class="price text-success">
                        <h5 class="mt-4">Price: &#8377 <?php echo $product["price"] ?>.00</h5>
                    </div>
                    <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Buy Now </a>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo "<tr><td colspan='11' class='text-danger'><center><h2>No records found</h2></center></td></tr>";
}
?>
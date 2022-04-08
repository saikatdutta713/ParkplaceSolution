<?php
if ($_SERVER['HTTP_HOST'] == "localhost") {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="">

    <title>Book service</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> <!-- Google web font "Open Sans" -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="css/datepicker.css" />
    <link rel="stylesheet" href="css/tooplate-style.css">
    <link rel="stylesheet" href="css/Style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <style type="text/css">

    </style>
</head>

<body>

    <!-- Mobile Sidebar -->

    <div class="m-sidebar unselectable" id="mySidebar">
        <div class="m-sidebar-title">
            <a class="m-brand col" href="./">
                <img src="image/logo.png" height="30px" width="30px">
                Parkplace Solution
            </a>
            <h5>
                <a href="javascript:void(0)" class="m-closesidebar"><i class="fa fa-times"></i></a>
                <span class="m-sidebar-title-text"></span>
            </h5>
        </div>
        <div class="m-sidebar-content">
            <div class="m-sidebar-component">
                <a href="/">
                    <h5 style="color: black;">
                        Home
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </h5>
                </a>
            </div>
            <div class="m-sidebar-component">
                <a href="./professional.php">
                    <h5 style="color: black;">
                        Become a professional
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                    </h5>
                </a>
            </div>
            <div class="m-sidebar-component">
                <a href="./blog.php">
                    <h5 style="color: black;">
                        Blog
                        <i class="fa fa-rss" aria-hidden="true"></i>
                    </h5>
                </a>
            </div>
            <div class="m-sidebar-component">
                <a href="#contact">
                    <h5 style="color: black;">
                        Contact Us
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </h5>
                </a>
            </div>
            <div class="m-sidebar-component">
                <a href="./user-logout.php">
                    <h5 style="color: black;">
                        Log Out
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </h5>
                </a>
            </div>
        </div>
    </div>

    <!-- top-nav -->
    <div class="top-nav">
        <div class="container">
            <div class="row justify-content-around">
                <a class="navbar-brand col" href="./">
                    <img src="image/logo.png" height="30px" width="30px" style="border-radius: 10px;">
                    Parkplace Solution
                </a>
                <div class="search-box col justify-content-center">
                    <form class="search" action="" method="">
                        <div class="place-select">

                        </div>
                        <div class="search-inputbox d-flex flex-row">
                            <input type="text" name="search" class="search-input  tm-bg-black-shadow" placeholder="Search for a service...">
                            <button type="button" class="search-button search-btn">
                                <i class="fa fa-search search-btn"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="right-nav-container d-flex flex-row justify-content-around">
                    <a class="right-nav-item col-2 col-md-2 " href="./" style="min-width: 243px">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Home
                    </a>
                    <a class="right-nav-item col signup" href="./user-login.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        Sign up/sign in
                    </a>
                    <div class="right-nav-item">
                        <div class="dropdown col">
                            <button class="dropdown-button">
                                More
                                <i class="fa fa-sort-desc"></i>
                                <i class="fa fa-sort-asc"></i>
                            </button>
                            <div class="dropdown-content" id="dropdown-content">
                                <a class="more-signup" href="user-login.php">Sign up/sign in</a>
                                <a href="logout.php">Home</a>
                                <a href="seller-account-info.php">Blog</a>
                                <a href="login-info.php">Contact us</a>
                                <a href="seller-info.php">Log out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="main-content">

        <div class="product-container col">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Search</span>
                </div>
                <input type="text" class="form-control" id="product_search" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            </div>
            <hr style="border-top: 2px solid rgba(0,0,0,.1);">
            <div class="product-list row">
                <?php
                $products = mysqli_query($conn, "SELECT `id`,`name`,`describtion`,`price`  FROM `products`;");

                if (mysqli_num_rows($products) > 0) {
                    while ($product =  mysqli_fetch_assoc($products)) {
                        $product_id = $product["id"];
                        $images = mysqli_query($conn, "SELECT `image` FROM product_image WHERE `product_id`=$product_id")
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
                }
                ?>

            </div>
        </div>


    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="https://kit.fontawesome.com/95b99d7a50.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on("keyup", "#product_search", function() {

                let search = $("#product_search").val();

                $.ajax({
                    url: "api/product/search_product.php",
                    type: "POST",
                    data: {
                        search: search
                    },

                    success: function(response) {
                        $(".product-list").html(response);
                    }
                })
            })
        })
    </script>
</body>

</html>
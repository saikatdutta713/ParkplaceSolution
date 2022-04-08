<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
// upload directory
if ($_SERVER['HTTP_HOST'] == "localhost") {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');

    $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/uploads/';
    if (!is_dir($path)) {
        mkdir($path);
    }
} else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');

    $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/uploads/';
    if (!is_dir($path)) {
        mkdir($path);
    }
}

if (!empty($_POST['name']) && !empty($_POST['desc']) && !empty($_POST['price']) && $_FILES['image']) {

    $product_id = mysqli_fetch_row(mysqli_query($conn, "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'parkplacesolution' AND TABLE_NAME = 'products';"))[0];

    for ($index = 0; $index < sizeof($_FILES['image']['name']); $index++) {
        $img = $tmp = $ext = $final_image = null;

        if ($_SERVER['HTTP_HOST'] == "localhost") {
            $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/uploads/';
        } else {
            $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/uploads/';
        }

        $img = $_FILES['image']['name'][$index];
        $tmp = $_FILES['image']['tmp_name'][$index];
        // get uploaded file's extension
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        // can upload same image using rand function
        $final_image = rand(1000, 1000000) . "_" . $img;
        // check's valid format
        if (in_array($ext, $valid_extensions)) {
            $path = $path . strtolower($final_image);
            if (move_uploaded_file($tmp, $path)) {
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $desc = mysqli_real_escape_string($conn, $_POST['desc']);
                $price = mysqli_real_escape_string($conn, $_POST['price']);
                $uploadDate = date('Y-m-d H:i:s');

                if (mysqli_query($conn, "INSERT INTO product_image (`product_id`,`image`) VALUES ('" . $product_id . "','" . $final_image . "')")) {
                    $target_product = mysqli_query($conn, "SELECT id FROM products WHERE id = $product_id");
                    if (mysqli_num_rows($target_product) < 1) {
                        if (mysqli_query($conn, "INSERT INTO `products` (`id`,`name`,`describtion`,`price`,`date`) VALUES ($product_id,'" . $name . "','" . $desc . "','" . $price . "','" . $uploadDate . "');")) {
                            echo "Product added Successfully";
                        } else {
                            echo "Database Insertion Failed!";

                            $result = mysqli_query($conn, "SELECT `name` FROM `product_image` WHERE `product_id`=$product_id;");
                            if (mysqli_num_rows($result) > 0) {
                                while ($product_image = mysqli_fetch_assoc($result)) {
                                    $path = "../uploads/" . $product_image["image"];
                                    unlink($path);
                                }
                            }
                            mysqli_query($conn, "DELETE FROM product_image WHERE product_id = $product_id;");

                            exit();
                        }
                    }
                } else {
                    echo "Image Insertion to Database Failed!";

                    exit();
                }
            } else {
                echo "Image Uploading Failed!";

                exit();
            }
        } else {
            echo "Select any of this file format jpeg, jpg, png, gif !";

            exit();
        }
    }
} else {
    echo "Please fill all fields!";
}

<?php


if ($_SERVER['HTTP_HOST'] == "localhost") {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

$search = mysqli_real_escape_string($conn, $_POST['search']);

$result = mysqli_query($conn, "SELECT `id`,`city` FROM `city` WHERE `city` LIKE '%$search%';");

// print_r(mysqli_fetch_assoc($result));
while ($row = mysqli_fetch_assoc($result)) { ?>

    <div class="city-container">
        <span class="city"><?php echo $row['city'] ?></span>
        <i class="fas fa-times city-close" data-id="<?php echo $row['id']; ?>"></i>
    </div>

<?php
}
?>
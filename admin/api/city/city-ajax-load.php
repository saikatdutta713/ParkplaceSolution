<?php

if($_SERVER['HTTP_HOST'] == "localhost"){
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$city = mysqli_query($conn,"SELECT `id`,`city` FROM `city`");

// print_r(mysqli_fetch_assoc($result));
if(mysqli_num_rows($city) > 0){
    while($row=mysqli_fetch_assoc($city)){

        $city_name =  'pandua';
        
        // $result = mysqli_query($conn,"SELECT * FROM `city` where mobile_repair !=0 AND laptop_repair !=0 AND desktop_repair !=0 AND windows_7 !=0 
		// 						AND windows_8 !=0 AND windows_10 !=0 AND city = $row['city']") or die($row['city']) ?>

        <div class="city-container">
		    <span 
                class="city"
                <?php if(false){ ?>
                style="color:red;"
                <?php } ?>
            >
                <?php echo $row['city']; ?>
            </span>
    	    <i class="fas fa-times city-close" data-id="<?php echo $row['id']; ?>"></i>
	    </div>

<?php
    }
}
else {
    echo "<tr><td colspan='11'><center><h2>No records found</h2></center></td></tr>";
}
?>
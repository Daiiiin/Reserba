<div class="h4"><a class="fa-solid fa-circle-plus" style="color: green; text-decoration: none;" data-bs-toggle="modal" data-bs-target="#add-img-modal" href=""></a> Images</div><hr>
<div class="container">
    <div class="row row-cols-1 row-cols-md-2">
    <?php 
        session_start();
        require_once('../../src/php/initialize.php');
        $rID = $_SESSION['restaurantID'];
        $stmt = $con->prepare("SELECT * FROM restaurant_images WHERE restaurantID=?");
        $stmt->bind_param("i", $rID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        while($img = $result->fetch_assoc()) {
    ?>
    
        <div class="col pt-3">
            <div class="card shadow-lg ndx" style="width: 31.4rem;">
                <img src="<?php echo IMG_PATH . $img['image_name'] ?>" style="height: 500px; width:500px; object-fit: cover;"/>
                <div class="card-body">
                    <a class="btn btn-danger img-data" img-id="<?php echo $img['imageID'] ?>" data-bs-toggle="modal" data-bs-target="#delete-img-modal">Delete Image</a>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
<hr><div class="h4"><a class="fa-solid fa-circle-plus" style="color: green; text-decoration: none;" data-bs-toggle="modal" data-bs-target="#add-menu-modal" href=""></a> Menu</div><hr>
<div class="container">
    <?php 
        session_start();
        require_once('../../src/php/initialize.php');
        $rID = $_SESSION['restaurantID'];
        $sql =  "SELECT * FROM menu WHERE restaurantID=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $rID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        while($menu = $result->fetch_assoc()) {
            $mID = $menu['menuID']; ?>
    <div class="row">
        <div class="col h5 menu-edit">
            <a class="fa-solid fa-circle-plus fa-xs food-add" menu-id="<?php echo $menu['menuID']; ?>" data-bs-toggle="modal" data-bs-target="#add-food-modal" style="color: green; text-decoration: none;" href=""></a>
            <a class="fa-solid fa-pen-to-square fa-xs menu-edit" menu-name="<?php echo $menu['menu_name']; ?>" menu-id="<?php echo $menu['menuID']; ?>" data-bs-toggle="modal" data-bs-target="#edit-menu-modal" style="text-decoration: none;" href=""></a>
            <a class="fa-solid fa-x fa-xs menu-delete" menu-id="<?php echo $menu['menuID']; ?>" data-bs-toggle="modal" data-bs-target="#delete-menu-modal" style="color:red; text-decoration: none;" href=""></a>
            <?php echo $menu['menu_name']; ?></div>
    </div>
        <?php 
            $sql = "SELECT * FROM food WHERE menuID=?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $mID);
            $stmt->execute();
            $res = $stmt->get_result();
            $stmt->close();
            while($food = $res->fetch_assoc()) {
        ?>
    <div class="row">
        <div class="col-md-3 text-muted"><?php echo $food['food_name']; ?></div>
        <div class="col text-muted">₱<?php echo $food['food_price']; ?></div>
        <div class="col-md-1"><a class="fa-solid fa-pen-to-square fa-xs food-edit" food-id="<?php echo $food['foodID']; ?>" data-bs-toggle="modal" data-bs-target="#edit-food-modal" style="text-decoration: none;" href=""></a></div>
        <div class="col-md-1"><a class="fa-solid fa-x fa-xs food-delete" food-id="<?php echo $food['foodID']; ?>" data-bs-toggle="modal" data-bs-target="#delete-food-modal" style="color:red; text-decoration: none;" href=""></a></div>
    </div>
    <?php
            } 
            echo '<hr>';
        }
    ?>
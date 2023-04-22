<table class="table table-light table-bordered shadow-lg table-striped" id="rtable">
  <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Address</th>
        <th scope="col">No. of Tables</th>
        <th scope="col">Pax Capacity</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
  </thead>
  <tbody>
  <?php 
    require_once('../../src/php/initialize.php');
    $DoW = date("N");
    $sql = "SELECT * FROM restaurant";
    $result = mysqli_query($con, $sql);
    while($rest = mysqli_fetch_assoc($result)) { 
  ?>
    <tr>
      <th scope="row"><?php echo $rest['restaurantID']; ?></th>
      <td><?php echo $rest['restaurant_name']; ?></td>
      <td><?php echo $rest['description']; ?></td>
      <td><?php echo $rest['address']; ?></td>
      <td><?php echo $rest['no_of_table']; ?></td>
      <td><?php echo $rest['pax_capacity']; ?></td>
      <td><img src="<?php echo IMG_PATH . $rest['image'] ?>" class="card-img-top" height="90"/></td>
      <td>
        <center>
            <a class="fa-solid fa-pen-to-square edit-data" style="color: orange;" data-bs-toggle="modal" data-bs-target="#edit-restaurant-modal" href=""></a>
            <a class="fa-solid fa-trash delete-data" style="color: red;" data-bs-toggle="modal" data-bs-target="#delete-restaurant-modal" href=""></a>
        </center>
      </td>
    </tr>
  <?php 
    }
  ?>
  </tbody>
</table>
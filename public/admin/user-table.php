<table class="table table-light table-bordered shadow-lg table-striped" id="rtable" style=>
  <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">User Type</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th> 
        <th scope="col">Email</th>
        <th scope="col">Restaurant</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Action</th>
      </tr>
  </thead>
  <tbody>
  <?php 
    require_once('../../src/php/initialize.php');
    $sql = "SELECT u.*, r.restaurant_name FROM users u
            LEFT JOIN restaurant_admin ra 
              ON ra.userID = u.userID
            LEFT JOIN restaurant r 
              ON ra.restaurantID = r.restaurantID
            ORDER BY u.userID ASC";
    $result = mysqli_query($con, $sql);
    while($rest = mysqli_fetch_assoc($result)) { 
  ?>
    <tr>
      <th scope="row"><?php echo $rest['userID']; ?></th>
      <td><?php echo $rest['user_type']; ?></td>
      <td class="text-truncate"><?php echo $rest['fname']; ?></td>
      <td class="text-truncate"><?php echo $rest['lname']; ?></td>
      <td class="text-truncate"><?php echo $rest['email']; ?></td>
      <td class="text-truncate"><?php echo $rest['restaurant_name']; ?></td>
      <td><?php echo $rest['phone_number']; ?></td>
      <td>
        <center>
            <a class="fa-solid fa-pen-to-square edit-data" style="color: orange;" data-bs-toggle="modal" data-bs-target="#edit-user-modal" href=""></a>
            <a class="fa-solid fa-trash delete-data" style="color: red;" data-bs-toggle="modal" data-bs-target="#delete-user-modal" href=""></a>
        </center>
      </td>
    </tr>
    
  <?php 
    }
  ?>
  </tbody>
</table>
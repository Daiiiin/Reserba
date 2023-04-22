<div class="modal fade" id="new-user-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Add new account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal-a"></button>
      </div>
      <div class="modal-body">
        <form id="new-user-form" method="post">
                                
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="fname" placeholder="First Name" pattern="[a-zA-Z][a-zA-Z ]{2,}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Last Name" pattern="[a-zA-Z][a-zA-Z ]{2,}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>
            <!-- <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="phone" class="form-control" name="pnum" required>
            </div> -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="Password" minlength="6" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">+63</span>
                <input type="phone" name="pnum" class="form-control" placeholder="Phone Number" pattern="[0-9]+" minlength="10" maxlength="10" required>
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text">User Type</label>
                <select class="form-select restaurant" name="utype">
                  <option value="1">User</option>
                  <option value="2">Admin</option>
                  <option value="3">Restaurant Admin</option>
                </select>
                <select class="form-select d-none" name="rest" id="restaurant-select">
                  <?php 
                    $stmt = $con->prepare("SELECT restaurantID, restaurant_name FROM restaurant");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $stmt->close();
                    while($rest = mysqli_fetch_assoc($result)) {
                  ?>
                  <option value="<?php echo $rest['restaurantID']; ?>"><?php echo $rest['restaurant_name']; ?></option>
                  <?php } ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Message Modal -->
<div class="modal fade" id="user-add-message-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title col-12 text-center"><i class="fa-solid fa-circle-check fa-3x" style="color:white;"></i></h5>
      </div>
      <div class="body-add-message lead text-center pt-2 pb-2"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="user-add-message-error-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title col-12 text-center"><i class="fa-solid fa-circle-xmark fa-3x" style="color:white;"></i></h5>
      </div>
      <div class="body-add-message lead text-center pt-2 pb-2"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
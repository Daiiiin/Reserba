<div class="modal fade" id="edit-user-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Edit user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-edit-modal"></button>
        </div>
        <div class="modal-body">
            <form id="edit-user-form" method="post">    
                <input type="hidden" name="uID" id="uID">                
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="fname" id="fname" pattern="[a-zA-Z][a-zA-Z ]{2,}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lname" id="lname" pattern="[a-zA-Z][a-zA-Z ]{2,}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">+63</span>
                    <input type="phone" name="pnum" class="form-control" id="pnum" placeholder="Phone Number" pattern="[0-9]+" minlength="10" maxlength="10" required>
                </div>
                
                <div class="modal-footer justify-content-between">
                  <div>
                    <button type="submit" class="btn btn-primary" id="reset-pass">Reset Password</button>
                  </div>
                  <div>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success text-white" id="update">Update</button>
                  </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>

<!-- Message modal -->

<div class="modal fade" id="user-edit-message-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title col-12 text-center"><i class="fa-solid fa-circle-check fa-3x" style="color:white;"></i></h5>
      </div>
      <div class="body-edit-message lead text-center pt-2 pb-2"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="user-edit-message-error-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title col-12 text-center"><i class="fa-solid fa-circle-xmark fa-3x" style="color:white;"></i></h5>
      </div>
      <div class="body-edit-message lead text-center pt-2 pb-2"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
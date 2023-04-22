<div class="modal fade" id="edit-info-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Restaurant Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
      </div>
      <div class="modal-body">
        <form id="edit-info-form" method="post" enctype="multipart/form-data">
        <?php 
            $stmt = $con->prepare("SELECT * FROM restaurant WHERE restaurantID=?");
            $stmt->bind_param("i", $rID);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            
            while($rest = $result->fetch_assoc()) {
        ?>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" minlength="5" maxlength="250"><?php echo $rest['description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="<?php echo $rest['address']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">No. of Tables</label>
                <input type="number" class="form-control" min="1" name="tables" value="<?php echo $rest['no_of_table']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Pax Capacity</label>
                <input type="number" class="form-control" min="1" name="paxcap" value="<?php echo $rest['pax_capacity']; ?>">
            </div>
          <?php } ?>
            <div class="mb-3">
                <label class="form-label">Restaurant Logo</label>
                <input class="form-control" type="file" id="formFile" accept="image/png, image/gif, image/jpeg" name="myfile">
            </div>     
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="info-edit-message-modal" tabindex="-1" aria-hidden="true">
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
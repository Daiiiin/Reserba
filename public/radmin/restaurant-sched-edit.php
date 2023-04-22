<div class="modal fade" id="edit-sched-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Edit Schedule</h5>
        <button type="button" class="btn-close" id="close-edit-modal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="edit-sched-form" action="post">
            <input class="form-control-plaintext display-6 mb-6" style="width: 8em" id="DoW" name="DoW" readonly></input>
            <div class="mb-3">
              <label class="form-label">Status within the day</label>
                <select class="form-select" name="status" id="status">
                    <option value="1">Open</option>
                    <option value="2">Close</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Open Time</label>
                <input type="time" class="form-control" name="opentime" id="opentime">
            </div>
            <div class="mb-3">
                <label class="form-label">Close Time</label>
                <input type="time" class="form-control" name="closetime" id="closetime">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="sched-edit-message-modal" tabindex="-1" aria-hidden="true">
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

<div class="modal fade" id="sched-edit-error-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title col-12 text-center"><i class="fa-solid fa-circle-xmark fa-3x" style="color: white;"></i></i></h5>
      </div>
      <div class="body-edit-message lead text-center pt-2 pb-2"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="cancel-reservation-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white">Cancel Reservation</h5>
        <button type="button" class="btn-close" id="close-cancel-c" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="h5 pb-4">Are you sure you want to cancel this reservation?</div>
        <form id="reservation-cancel-form" method="post">
            <input type="hidden" name="rID" id="rID-c">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger delete-data">Cancel Reservation</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="reservation-cancel-message-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title col-12 text-center"><i class="fa-solid fa-circle-check fa-3x" style="color:white;"></i></h5>
      </div>
      <div class="body-delete-message lead text-center pt-2 pb-2"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
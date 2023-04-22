$(function () {
    $("#resv-table-body").load('../../public/user/reservations-table.php');
});

$(document).on('click', '.add-rate', function() {
    var row = $(this).closest("div");
    var rID = row.find("a").attr("res-id");
    $('#rID-r').val(rID);
});

$(function() {
    $('#rating-add-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../src/php/rating-add-action.php',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                $('#rating-add-form')[0].reset();
                $('#close-add-r').click();
                let result = JSON.parse(response);
                if(result['status'] == 200) {
                    $("#resv-table-body").load('../../public/user/reservations-table.php');
                    $("#rating-add-message-modal").modal("show");
                    $(".body-add-message").text(result["message"]);
                }
            }
        });
    });
});

$(document).on('click', '.cancel-res', function() {
    var row = $(this).closest("div");
    var rID = row.find("a").attr("res-id");
    $('#rID-c').val(rID);
});

$(function() {
    $('#reservation-cancel-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../src/php/reservation-cancel-action.php',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                $('#reservation-cancel-form')[0].reset();
                $('#close-cancel-c').click();
                let result = JSON.parse(response);
                if(result['status'] == 200) {
                    $("#resv-table-body").load('../../public/user/reservations-table.php');
                    $("#reservation-cancel-message-modal").modal("show");
                    $(".body-delete-message").text(result["message"]);
                }
            }
        });
    });
});
$(function() {
    $("#reserve-form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../src/php/user-reserve-action.php',
            data: new FormData(this),
            contentType: false,
            processData:false,
            success: function(response) {
                let result = JSON.parse(response);
                if(result["status"] == 200) {
                    $('#reserve-form')[0].reset();
                } 
                $('#close-modal').click();
                $("#reserve-form-message-modal").modal("show");
                $(".body-add-message").text(result["message"]);
            }
        });
    });
});
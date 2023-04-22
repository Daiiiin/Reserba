// Initialize table
$(function () {
    $("#user-table-body").load('../../public/admin/user-table.php');
});
// Adds user
$(function() {
    $("#new-user-form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../src/php/user-add-action.php',
            data: new FormData(this),
            contentType: false,
            processData:false,
            success: function(response) {
                let result = JSON.parse(response);
                // alert(result["message"]);
                $('#close-modal-a').click();
                if(result["status"] == 200) {
                    $("#restaurant-select").addClass("d-none");
                    $('#new-user-form')[0].reset();
                    $("#user-table-body").load('../../public/admin/user-table.php');
                    $("#user-add-message-modal").modal("show");
                } else {
                    $("#user-add-message-error-modal").modal("show");
                }   
                $(".body-add-message").text(result["message"]);
            }
        });
    });
});
// Fetches values for the edit form
$(document).on('click', '.edit-data', function() {
    var row = $(this).closest("tr");
    var uID = row.find("th").text()
    var fname = row.find("td:eq(1)").text();
    var lname = row.find("td:eq(2)").text();
    var email = row.find("td:eq(3)").text();
    var pnum = row.find("td:eq(5)").text();

    $('#uID').val(uID);
    $('#fname').val(fname);
    $('#lname').val(lname);
    $('#email').val(email);
    $('#pnum').val(pnum);
});
// Edits user
$(function() {
    $("#edit-user-form").submit(function(e) {
        e.preventDefault();
        var btn = $(this).find("button[type=submit]:focus").attr("id");
        var url = btn == "update" ? '../../src/php/user-edit-action.php' : '../../src/php/user-reset-pass-action.php';
        $.ajax({
            type: 'POST',
            url: url,
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                let result = JSON.parse(response);
                
                if(result["status"] == 200) {
                    $("#edit-user-form")[0].reset();
                    $("#user-table-body").load('../../public/admin/user-table.php');
                    $("#user-edit-message-modal").modal("show");
                } else {
                    $("#user-edit-message-error-modal").modal("show");
                }
                $('#close-edit-modal').click();
                $(".body-edit-message").text(result["message"]);
            }
        });
    });
});

// Deletes user
$(document).on('click', '.delete-data', function() {
    var row = $(this).closest("tr");
    var uID = row.find("th").text();
    var utype = row.find("td:eq(0)").text();
    // alert(rID);
    $("#delete-content").append().text('Delete this user?');
    $('.delete-confirm').unbind().click(function() {
        var data = 'uID=' + uID + '&utype=' + utype;
        $.ajax({
            type: 'POST',
            url: '../../src/php/user-delete-action.php',
            data: data,
            success: function(response) {
                let result = JSON.parse(response);
                // alert(result["message"]);
                $('#close-delete-modal').click();
                $("#user-delete-message-modal").modal("show");
                $(".body-delete-message").text(result["message"]);
                $("#user-table-body").load('../../public/admin/user-table.php');
            }
        });
    });
});

$(document).on('click', '.add-user', function() {
    $("select.restaurant").change(function(){
        var selectedRestaurant = $(this).children("option:selected").val();
        if(selectedRestaurant == 3) {
            $("#restaurant-select").removeClass("d-none");
        } else {
            $("#restaurant-select").addClass("d-none");
        }
    });
});


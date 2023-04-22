// Initialize table
$(function () {
    $("#rest-table-body").load('../../public/admin/restaurant-table.php');
});
// Adds restaurant
$(function() {
    $("#new-restaurant-form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../src/php/restaurant-add-action.php',
            data: new FormData(this),
            contentType: false,
            processData:false,
            success: function(response) {
                let result = JSON.parse(response);
                // alert(result["message"]);
                if(result["status"] == 200) {
                    $("#rest-table-body").load('../../public/admin/restaurant-table.php');
                    $('#new-restaurant-form')[0].reset();
                } 
                $('#close-modal').click();
                $("#restaurant-add-message-modal").modal("show");
                $(".body-add-message").text(result["message"]);
            }
        });
    });
});
// Fetches values for the restaurant form
$(document).on('click', '.edit-data', function() {
    var row = $(this).closest("tr");
    var rID = row.find("th").text();
    var name = row.find("td:eq(0)").text();
    var description = row.find("td:eq(1)").text();
    var address = row.find("td:eq(2)").text();
    var tables = row.find("td:eq(3)").text();
    var paxcap = row.find("td:eq(4)").text();
    var rating = row.find("td:eq(6)").text();
    // alert(rID);
    $('#rID').val(rID);
    $('#name').val(name);
    $('#description').text(description);
    $('#address').val(address);
    $('#tables').val(tables);
    $('#paxcap').val(paxcap);
    $('#rating').val(rating);
});
// Edits restaurant
$(function() {
    $("#edit-restaurant-form").submit(function(e) {
        e.preventDefault();
        var rID = $('#rID').val();
        var data = new FormData(this);
        data.append('rID', rID);
        // alert(data.getAll('rID'));
        $.ajax({
            type: 'POST',
            url: '../../src/php/restaurant-edit-action.php',
            data: data,
            contentType: false,
            processData: false,
            success: function(response) {
                let result = JSON.parse(response);
                // alert(result["message"]);
                if(result["status"] == 200) {
                    $("#rest-table-body").load('../../public/admin/restaurant-table.php');
                }
                $('#edit-restaurant-form')[0].reset();
                $('#close-edit-modal').click();
                $("#restaurant-edit-message-modal").modal("show");
                $(".body-edit-message").text(result["message"]);
            }
        });
    });
});
// Deletes restaurant
$(document).on('click', '.delete-data', function() {
    var row = $(this).closest("tr");
    var rID = row.find("th").text();
    var name = row.find("td:eq(0)").text();
    // alert(rID);
    $("#delete-content").append().text('Are you sure you want to delete ' + name + '?');
    $('.delete-confirm').unbind().click(function() {
        var data = 'rID=' + rID;
        $.ajax({
            type: 'POST',
            url: '../../src/php/restaurant-delete-action.php',
            data: data,
            success: function(response) {
                let result = JSON.parse(response);
                // alert(result["message"]);
                $('#close-delete-modal').click();
                $("#restaurant-delete-message-modal").modal("show");
                $(".body-delete-message").text(result["message"]);
                $("#rest-table-body").load('../../public/admin/restaurant-table.php');
            }
        });
    });
});
$(function () {
    $("#info-body").load('../../public/radmin/restaurant-info.php');
    $("#menu-body").load('../../public/radmin/restaurant-menu.php');
    $("#imgs-body").load('../../public/radmin/restaurant-imgs.php');
});
$(document).ready(function () {
    $('#restaurant_images').find('.item').first().addClass('active');
});

$(document).on('click', '.sched-edit', function() {
    var row = $(this).closest("div");
    var status = row.find("a").attr("status");
    var day = row.find("span:eq(0)").text();
    var opentime = row.find("span:eq(1)").text();
    var closetime = row.find("span:eq(2)").text();
    
    $('#DoW').val(day);
    $('#opentime').val(opentime);
    $('#closetime').val(closetime);
    if(status == 'closed') {
        $("#status option[value=2]").prop('selected', 'selected');
    }
});

$(function() {
    $("#edit-sched-form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../src/php/schedule-edit-action.php',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                let result = JSON.parse(response);
                $('#edit-sched-form')[0].reset();
                $('#close-edit-modal').click();
                if(result['status'] == 200) {
                    $("#info-body").load('../../public/radmin/restaurant-info.php');
                    $("#sched-edit-message-modal").modal("show");
                    $(".body-edit-message").text(result["message"]);
                } else {
                    $("#sched-edit-error-modal").modal("show");
                    $(".body-edit-message").text(result["message"]);
                }
            }
        });
    });
});

$(function() {
    $('#edit-info-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../src/php/info-edit-action.php',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                let result = JSON.parse(response);
                $('#edit-sched-form')[0].reset();
                $('#close-modal').click();
                if(result['status'] == 200) {
                    $("#info-body").load('../../public/radmin/restaurant-info.php');
                    $("#info-edit-message-modal").modal("show");
                    $(".body-edit-message").text(result["message"]);
                }
            }
        });
    });
});
$(function() {
    $('#add-menu-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../src/php/menu-add-action.php',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                let result = JSON.parse(response); 
                $('#close-menu-modal').click();
                if(result['status'] === 200) {
                    $('#add-menu-form')[0].reset();
                    $("#menu-body").load('../../public/radmin/restaurant-menu.php');
                    $("#menu-add-message-modal").modal("show");
                } else {
                    $("#menu-add-message-error-modal").modal("show");
                }
                $(".body-add-message").text(result["message"]);
            }
        });
    });
});

$(document).on('click', 'div a.menu-edit', function() {
    var row = $(this).closest("div");
    var menu_name = row.find("a").attr("menu-name");
    var mID = row.find("a").attr("menu-id");
    $('#menu_name').val(menu_name);
    $('#mID').val(mID);
});

$(function() {
    $('#menu-edit-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../src/php/menu-edit-action.php',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                let result = JSON.parse(response);
                $('#menu-edit-form')[0].reset();
                $('#close-edit').click();
                if(result['status'] == 200){
                    $("#menu-body").load('../../public/radmin/restaurant-menu.php'); 
                }
            }
        });
    });
});

$(document).on('click', 'div a.menu-delete', function() {
    var row = $(this).closest("div");
    var mID = row.find("a").attr("menu-id");
    $('#mID-d').val(mID);
});

$(document).on('click', '.delete-data', function() {
    var fetch = $(this).parent().parent();
    var mID = fetch.find("input:hidden").val();
    var data = "mID=" + mID;
    $.ajax({
        type: 'POST',
        url: '../../src/php/menu-delete-action.php',
        data: data,
        success: function(response) {
            let result = JSON.parse(response);
            $('#close-delete').click();
            if(result['status'] == 200) {
                $("#menu-body").load('../../public/radmin/restaurant-menu.php'); 
            }
        }
    });
});

$(document).on('click', 'div a.food-add', function() {
    var row = $(this).closest("div");
    var mID = row.find("a").attr("menu-id");
    $('#mID-a').val(mID);

});

$(function() {
    $('#food-add-form').submit(function(e) {
        e.preventDefault();
        var mID = $('#mID-a').val();
        var data = new FormData(this);
        data.append('mID', mID);
        $.ajax({
            type: 'POST',
            url: '../../src/php/food-add-action.php',
            data: data,
            contentType: false,
            processData: false,
            success: function(response) {
                let result = JSON.parse(response);   
                $('#close-add').click();
                if(result['status'] == 200) {
                    $('#food-add-form')[0].reset();
                    $("#menu-body").load('../../public/radmin/restaurant-menu.php');
                    $("#food-add-message-modal").modal("show");   
                } else {
                    $("#food-add-message-error-modal").modal("show");
                }
                $(".body-add-message").text(result["message"]);
            }
        });
    });
});

$(document).on('click', 'div a.food-edit', function() {
    var row = $(this).closest("div");
    var fetch = $(this).parent().parent();

    var fID = row.find("a").attr("food-id");
    var food_name = fetch.find("div:eq(0)").text();
    var food_price = fetch.find("div:eq(1)").text().replace('₱', '');

    $('#fID-e').val(fID);
    $('#food_name-e').val(food_name);
    $('#food_price-e').val(food_price);
});

$(function() {
    $('#food-edit-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../src/php/food-edit-action.php',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                let result = JSON.parse(response);
                $('#food-edit-form')[0].reset();
                $('#close-edit-e').click();
                if(result['status'] = 200) {
                    $("#menu-body").load('../../public/radmin/restaurant-menu.php');
                    $("#food-edit-message-modal").modal("show");
                    $(".body-add-message").text(result["message"]);
                }
            }
        });
    })
});

$(document).on('click', 'div a.food-delete', function() {
    var row = $(this).closest("div");
    var fID = row.find("a").attr("food-id");

    $('#fID-d').val(fID);
});
$(function() {
    $('#food-delete-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../src/php/food-delete-action.php',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                $('#food-delete-form')[0].reset();
                $('#close-delete-e').click();
                let result = JSON.parse(response)
                if(result['success']) {
                    $("#menu-body").load('../../public/radmin/restaurant-menu.php');
                    $("#food-delete-message-modal").modal("show");
                    $(".body-delete-message").text(result["message"]);
                }
            }
        });
    });
});

$(function() {
    $('#add-img-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../src/php/img-add-action.php',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                $('#close-img-modal-a').click();
                let result = JSON.parse(response);
                if(result['status'] == 200) {
                    $("#imgs-body").load('../../public/radmin/restaurant-imgs.php');
                    $("#img-add-message-modal").modal("show");
                    $(".body-add-message").text(result["message"]);
                }
            }
        });
    });
});

$(document).on('click', 'a.img-data', function() {
    var row = $(this).closest("div");
    var iID = row.find("a").attr("img-id");
    $('#iID-d').val(iID);
});

$(function() {
    $('#img-delete-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '../../src/php/img-delete-action.php',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                $('#img-delete-form')[0].reset();
                $('#close-delete-i').click();
                let result = JSON.parse(response);
                if(result['status'] == 200) {
                    $("#imgs-body").load('../../public/radmin/restaurant-imgs.php');
                    $("#img-delete-message-modal").modal("show");
                    $(".body-delete-message").text(result["message"]);
                }
            }
        });
    });
});
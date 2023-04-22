var xhttp = new XMLHttpRequest();

function signupSubmit(e){
    var data = $("#signupForm").serialize();
    $.ajax({
        type : 'POST',
        url : '../src/php/register_action.php',
        data : data,
        success : function(response) {
            var res = JSON.parse(response);
            alert(res["message"]);
            if(res["status"] == 200){
                $('#signupForm')[0].reset();
            }
        }
    });
    e.preventDefault();
}

function signinSubmit(e){
    var url = "../src/php/login_action.php";
    var data = $("#signinForm").serialize();
    var urlData = url+"?"+data;
    xhttp.open("GET", urlData, true);
    xhttp.send();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var res = JSON.parse(this.responseText);
            // var landing_url = res["landing_url"];
            if(res["status"] == 200){
            //     if(res["user_type"] == "user"){
                    $('#signinForm')[0].reset();
                    window.location.replace('/reserba/public/index.php');
            //     }else if(res["user_type"] == "admin"){
            //         $('#signinForm')[0].reset();
            //         window.location.replace(landing_url);
            //     }
            }else{
                // alert(res["message"]);
                $("#loginModal").modal("show");
                $(".modal-body").text(res["message"]);
                // $(".closeModal").click(function() {
                //     $("#signinForm")[0].reset();
                // });
            }
        }
    };
    e.preventDefault();
}

// function signoutClick(e){
//     var url = "../src/php/logout_action.php";
//     xhttp.open("GET", url, true);
//     xhttp.send();
//     xhttp.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status == 200){
//             var res = JSON.parse(this.responseText);
//             if(res["status"] == 200){
//                 window.location.replace('../public/login_page.php'); //replaces the current location
//                 //window.location = '../public/index.php'; //navigates to another location
//             }
//         }
//     };
// }
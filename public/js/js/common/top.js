$(document).ready(function () {

});

function loginout() {
    $.post('/managers/loginout', {}, function (data) {
        if (data == 1) {
            alert("退出成功");
            window.location.href = "/managers";
        }
    });
}


$(document).ready(function () {
    $(".btn").on("click", function () {
        login();
    });
});

function login() {
    var username = $("#username").val();
    var password = $("#password").val();
    if (username == '' || password == '') {
        alert("用户名或密码不能为空");
    } else {
        $.post('/managers/login', {
                username: username, password: password
            },
            function (data) {
                if (data == 1) {
                    alert("登录成功");
                    window.location.href = "/managers";
                } else {
                    alert("登录失败");
                }
            }
        )
    }

}


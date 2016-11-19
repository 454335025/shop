$(document).ready(function () {
    $("#addUserAddress").on("click", function () {
        addUserAddress();
    });
});

function addUserAddress() {
    var realname = $("#realname").val();
    var phone = $("#phone").val();
    var bio = $("#bio").val();
    var address = $("#address").val();
    if (realname != '' && phone != '' && address != '') {
        $.post("/shop/user/add_address", {
            realname: realname,
            phone: phone,
            bio: bio,
            address: address
        }, function (data) {
            if (data == 1) {
                alert("添加成功");
                window.location.href = "/shop/user/to_address";
            } else {
                alert("添加失败");
            }
        });
    } else {
        alert("*号为必填信息");
    }
}

function deleteUserAddress(id) {
    if(confirm("您确定要删除该地址么？")){
        $.post("/shop/user/delete_address", {
            id:id
        }, function (data) {
            if (data == 1) {
                alert("删除成功");
                window.location.href = "/shop/user/to_address";
            } else {
                alert("删除成功");
            }
        });
    }
}
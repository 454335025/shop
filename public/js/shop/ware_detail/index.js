$(document).ready(function () {
    $("#add_shopping").on("click", function () {
        add_shopping();
    });
});

function add_shopping() {
    var ware_id = $("#ware_id").val();
    $.post("/shop/shop_car/add_ware", {ware_id: ware_id}, function (data) {
        if (data == 1) {
            alert("添加成功");
            window.location.reload();
        } else {
            alert("添加失败");
        }
    });
}
$(document).ready(function () {
    $("#add_shopping").on("click", function () {
        add_shopping();
    });
});

function add_shopping() {
    var ware_id = $("#ware_id").val();
    $.post("/shop/shop_car/add_shopping", {ware_id: ware_id}, function (data) {
        if (data == 1) {
            alert("添加成功");
            // window.location.href = "/shop/ware_detail?ware_id=" + ware_id;
        } else {
            alert("添加失败");
        }
    });
}

function update_ware(id, action, num) {
    $.post("/shop/shop_car/update_number", {id: id, action: action, num: num}, function (data) {
        if (data == 1) {
            alert("修改成功");
            window.location.reload();
        } else {
            alert("修改失败");
        }
    })
}


function del_ware(id) {
    if (confirm("确定要删除商品么？")) {
        $.post("/shop/shop_car/delete_ware", {id: id}, function (data) {
            if (data == 1) {
                alert("删除成功");
                window.location.reload();
            } else {
                alert("删除失败");
            }
        })
    }
}

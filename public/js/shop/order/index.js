$(document).ready(function () {
    $(".address-box").on("click", function () {
        window.location.href = "/shop/order/to_address_update";
    });
    $(".left").on("click", function () {
        updateAddress($(this));
    });
    $(".item-outer").on("click", function () {
        updateAddress($(this));
    });
    $("#is_use").on("click", function () {
        useIntegral($(this));
    });
    $("#add_order").on("click", function () {
        add_order($(this));
    })
});

function updateAddress(obj) {
    var select = obj.find("span").attr("class");
    var id = obj.find("span").attr("id");
    if (select == 'icon-unchecked') {
        $(".icon-checked").attr("class", "icon-unchecked");
        obj.find("span").attr("class", "icon-checked");
        $.post("/shop/user/update_address", {id: id}, function (data) {
            if (data == 1) {
                window.location.href = "/shop/order";
            } else {
                alert("update address error");
            }
        });
    } else {
        window.location.href = "/shop/order";
    }
}

function useIntegral(obj) {
    var is_checked = obj.is(':checked');
    $.post("/shop/order/use_Integral", {is_use: is_checked}, function (data) {
        $("#cost_count").html(data);
        $("#cost_count1").html(data);
    });
    $.get("/shop/order/use_Integral", {is_use: is_checked}, function (data) {
        $("#cost_integral").html(data);
    });
}

function add_order() {
    var is_checked = $("#is_use").is(':checked');
    $.post("/shop/order/add_orders", {is_use: is_checked}, function (data) {
        var result =JSON.parse(data);
        alert(result.msg);
        if(result.data == 1){
            window.location.href = "/shop/user";
        }else if(result.data == 4){
            window.location.href = "/shop/user/to_address_add";
        }else if(result.data == 3){
            window.location.href = "/shop/user/to_main";
        }
    });
}
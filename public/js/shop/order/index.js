$(document).ready(function () {
    $(".address-box").on("click",function () {
        window.location.href = "/shop/order/to_address_update";
    });
    $(".left").on("click",function () {
        updateAddress($(this));
    });
    $(".item-outer").on("click",function () {
        updateAddress($(this));
    })
});

function updateAddress(obj) {
    var select = obj.find("span").attr("class");
    var id = obj.find("span").attr("id");
    if(select == 'icon-unchecked'){
        $(".icon-checked").attr("class","icon-unchecked");
        obj.find("span").attr("class","icon-checked");
        $.post("/shop/user/update_address", {id:id}, function (data) {
            if(data==1){
                window.location.href = "/shop/order";
            }else{
                alert("update address error");
            }
        });
    }else{
        window.location.href = "/shop/order";
    }
}
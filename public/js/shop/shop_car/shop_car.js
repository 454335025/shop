/**
 * Created by GE62 on 2016/10/27.
 */

function del_ware(openid, id) {

    if (confirm("确定要删除商品么？")) {

        window.location.href = "/shop/shop_car/delete_ware?openid=" + openid + "&id=" + id + "";

    }

}

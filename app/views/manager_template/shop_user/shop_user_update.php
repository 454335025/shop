<!-- START CONTAINER -->
<div class="container-padding">
    <!-- Start Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-title">
                    <?php echo $title; ?>
                    <ul class="panel-tools">
                        <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                        <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                        <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
                    </ul>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal">
                        <input type="hidden" id="shop_user_id" name="shop_user_id"
                               value="<?php echo $shop_user->id ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">用户名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username"
                                       value="<?php echo $shop_user->username ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">用户类型</label>
                            <div class="col-sm-10">
                                <select class="selectpicker" data-live-search="true" style="display: none;"
                                        id="shop_user_type_id"
                                        name="shop_user_type_id">
                                    <?php foreach ($shop_user_types as $shop_user_type) { ?>
                                        <option value="<?php echo $shop_user_type->id ?>"
                                                <?php if ($shop_user_type->id == $shop_user->user_type){ ?>selected="selected"<?php } ?>><?php echo $shop_user_type->type ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">真实姓名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="realname" name="realname"
                                       value="<?php echo $shop_user->realname ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">地址</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="address" name="address"
                                       value="<?php echo $shop_user->address ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">手机号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone" name="phone"
                                       value="<?php echo $shop_user->phone ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email"
                                       value="<?php echo $shop_user->email ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">积分</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="integral" name="integral"
                                       value="<?php echo $shop_user->integral ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-default">修改</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
</div>
<!-- END CONTAINER -->

<!-- ================================================
Moment.js
================================================ -->
<!--<script type="text/javascript" src="/js/moment/moment.min.js"></script>-->

<script>
    $(document).ready(function () {
        $(".btn-default").on("click", function () {
            update_shop_user();
        })
    });

    function update_shop_user() {
        var shop_user_id, username, shop_user_type_id, realname, address, phone, email, integral;
        shop_user_type_id = $("#shop_user_type_id option:selected").val();
        shop_user_id = $("#shop_user_id").val();
        username = $("#username").val();
        realname = $("#realname").val();
        address = $("#address").val();
        phone = $("#phone").val();
        email = $("#email").val();
        integral = $("#integral").val();

        $.post("/managers/shop_user/update_shop_user",
            {
                shop_user_id: shop_user_id,
                shop_user_type_id: shop_user_type_id,
                username: username,
                realname: realname,
                address: address,
                phone: phone,
                email: email,
                integral: integral

            },
            function (data) {
                if (data == 1) {
                    swal("修改成功!", "", "success");
                    setTimeout(function () {
                        window.location.href = "/managers/shop_user/to_shop_user";
                    }, 1500);
                } else {
                    swal("修改失败!", "", "error");
                }
            }
        )
        ;
    }
</script>
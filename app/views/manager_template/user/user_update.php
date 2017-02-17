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
                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $user->id ?>">
                        <input type="hidden" id="is_root" name="is_root" value="<?php echo $user->isroot ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">用户名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username"
                                       value="<?php echo $user->username; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">登录密码</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">确认密码</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="re_password" name="re_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">邮箱</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email"
                                       value="<?php echo $user->email; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">手机号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="phone" name="phone"
                                       value="<?php echo $user->phone; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label form-label">是否管理员</label>
                            <div class="col-sm-8">
                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" id="admin"
                                       name="admin">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-default">添加</button>
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

        setTimeout("updateToggleClass();",300);

        $(".btn-default").on("click", function () {
            update_user();
        });
    });
    function update_user() {
        var user_id, username, password, re_password, email, phone, admin;
        user_id = $("#user_id").val();
        username = $("#username").val();
        password = $("#password").val();
        re_password = $("#re_password").val();
        email = $("#email").val();
        phone = $("#phone").val();

        if ($(".toggle").attr("class") == 'toggle btn btn-success') {
            admin = 1;
        } else {
            admin = 0;
        }

        if (password == '') {
            swal("密码不能为空", "", "error");
            return;
        } else if (password != re_password) {
            swal("确认密码不对", "", "error");
            return;
        }

        $.post("/managers/user/update_user",
            {
                user_id: user_id,
                username: username,
                password: password,
                email: email,
                phone: phone,
                admin: admin
            }, function (data) {
                if (data == 1) {
                    swal("修改成功!", "", "success");
                    setTimeout(function () {
                        window.location.href = "/managers/user/to_user";
                    }, 1500);
                } else {
                    swal("修改失败!", "", "error");
                }
            });
    }

    function updateToggleClass() {
        var is_root = $("#is_root").val();
        if(is_root == 1){
            $(".toggle").attr("class",'toggle btn btn-success');
        }else{
            $(".toggle").attr("class",'toggle btn btn-light off');
        }
    }
</script>
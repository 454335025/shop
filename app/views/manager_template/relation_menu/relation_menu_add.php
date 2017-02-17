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
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">用户名</label>
                            <div class="col-sm-10">
                                <select class="selectpicker" data-live-search="true" style="display: none;" id="user_id"
                                        name="user_id">
                                    <?php foreach ($users as $user) { ?>
                                        <option value="<?php echo $user->id ?>"><?php echo $user->username ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">菜单权限</label>
                            <div class="col-sm-10">
                                <select class="selectpicker" data-live-search="true" style="display: none;" id="menu"
                                        name="menu">
                                    <?php foreach ($sub_menus as $sub_menu) { ?>
                                        <option
                                            value="<?php echo $sub_menu->menu_id ?>,<?php echo $sub_menu->id ?>"><?php echo $sub_menu->name ?></option>
                                    <?php } ?>
                                </select>
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
        $(".btn-default").on("click", function () {
            add_relation_menu();
        })
    });

    function add_relation_menu() {
        var user_id, menu, menu_id, sub_menu_id;
        user_id = $("#user_id option:selected").val();
        var strs= new Array();
        strs=$("#menu option:selected").val().split(","); //字符分割
        menu_id = strs[0];
        sub_menu_id = strs[1];
        $.post("/managers/relation_menu/add_relation_menu",
            {
                user_id: user_id,
                menu_id: menu_id,
                sub_menu_id: sub_menu_id
            }, function (data) {
                if (data == 1) {
                    swal("添加成功!", "", "success");
                    setTimeout(function () {
                        window.location.href = "/managers/relation_menu/to_relation_menu";
                    }, 1500);
                } else {
                    swal("添加失败!", "", "error");
                }
            });
    }
</script>
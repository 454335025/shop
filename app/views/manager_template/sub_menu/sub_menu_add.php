<!-- START CONTAINER -->
<div class="container-padding">
    <!-- Start Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-title">
                    <?php echo $title ?>
                    <ul class="panel-tools">
                        <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                        <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                        <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">父菜单名称</label>
                            <div class="col-sm-10">
                                <select id="menu_id" name="menu_id">
                                    <option value="">请选择</option>
                                    <?php foreach ($menus as $menu) { ?>
                                        <option value="<?php echo $menu->id ?>"><?php echo $menu->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">子菜单名称</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">跳转路径</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="url" name="url">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">排序</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sort" name="sort">
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

<script>
    $(document).ready(function () {

        $(".btn-default").on("click", function () {
            add_menu();
        })
    });

    function add_menu() {
        var menu_id, name, url, sort;
        menu_id = $("#menu_id option:selected").val();
        name = $("#name").val();
        url = $("#url").val();
        sort = $("#sort").val();
        $.get("/managers/sub_menu/add_sub_menu",
            {
                menu_id: menu_id,
                name: name,
                url: url,
                sort: sort
            }, function (data) {

                if (data == 1) {
                    swal("添加成功!", "", "success");
                    window.location.href = "/managers/sub_menu/to_sub_menu";
                } else {
                    swal("添加失败!", "", "error");
                }
            });
    }
</script>
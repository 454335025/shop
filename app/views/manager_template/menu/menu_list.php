<!-- START CONTENT -->
<div class="content">
    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">父菜单列表</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">菜单管理</a></li>
            <li class="active">父菜单列表</li>
        </ol>
    </div>
    <!-- End Page Header -->

    <!-- START CONTAINER -->
    <div class="container-padding">
        <!-- Start Row -->
        <div class="row">
            <!-- Start Panel -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-title">
                        父菜单列表
                        <div style="float:right ">
                            <a href="/managers/menu/to_menu_add" class="btn btn-danger"
                               style="background-color: #399bff;">
                                <i class="fa fa-pencil"></i>添加
                            </a>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table id="example0" class="table display">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>名称</th>
                                <th>排序</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($menus as $menu) { ?>
                                <tr>
                                    <td><?php echo $menu->id ?></td>
                                    <td><?php echo $menu->name ?></td>
                                    <td><?php echo $menu->sort ?></td>
                                    <td><?php echo $menu->created_at ?></td>
                                    <td>
                                        <a href="/managers/menu/to_menu_update?menu_id=<?php echo $menu->id ?>">修改</a>
                                        <a href="javascript:delete_menu(<?php echo $menu->id ?>)">删除</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Panel -->
        </div>
        <!-- End Row -->
    </div>
    <!-- END CONTAINER -->
</div>
<!-- End Content -->

<!-- ================================================
Data Tables
================================================ -->
<script src="<?php echo STATIC_COMMON; ?>/js/datatables/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example0').DataTable();
    });
    function delete_menu(menu_id) {
        sweetAlert({
            title: "你确定要删除么？",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "删除",
            cancelButtonText:"取消",
            closeOnConfirm: false
        }, function () {
            $.post("/managers/menu/delete_menu", {menu_id: menu_id}, function (data) {
                if (data == 1) {
                    swal("删除成功!", "", "success");
                    window.location.href = "/managers/menu/to_menu";
                } else {
                    swal("删除成功!", "", "error");
                }
            });
        });
    }
</script>


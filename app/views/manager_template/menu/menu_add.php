<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START CONTENT -->
<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">添加父菜单</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">菜单管理</a></li>
            <li><a href="#">父菜单列表</a></li>
            <li class="active">添加父菜单</li>
        </ol>
    </div>
    <!-- End Page Header -->
    <!-- START CONTAINER -->
    <div class="container-padding">
        <!-- Start Row -->
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="panel panel-default">

                    <div class="panel-title">
                        添加父菜单
                        <ul class="panel-tools">
                            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-2 control-label form-label">菜单名称</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name">
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
</div>
<!-- End Content -->

<script>
    $(document).ready(function () {

        $(".btn-default").on("click", function () {
            add_menu();
        })
    });

    function add_menu() {
        var name, sort;
        name = $("#name").val();
        sort = $("#sort").val();
        $.get("/managers/menu/add_menu",
            {
                name: name,
                sort: sort
            }, function (data) {
                if (data == 1) {
                    swal("添加成功!", "", "success");
                    window.location.href = "/managers/menu/to_menu";
                } else {
                    swal("添加失败!", "", "error");
                }
            });
    }
</script>
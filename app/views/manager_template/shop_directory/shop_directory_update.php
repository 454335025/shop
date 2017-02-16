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
                        <input type="hidden" id="shop_directory_id" name="shop_directory_id"
                               value="<?php echo $shop_directory->id ?>"/>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">名称</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name"
                                       value="<?php echo $shop_directory->name ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">url</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="url" name="url"
                                       value="<?php echo $shop_directory->url ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">sort</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sort" name="sort"
                                       value="<?php echo $shop_directory->sort ?>">
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

<script>
    $(document).ready(function () {
        $(".btn-default").on("click", function () {
            update_shop_directory();
        })
    });

    function update_shop_directory() {
        var shop_directory_id, name, url, sort;
        shop_directory_id = $("#shop_directory_id").val();
        name = $("#name").val();
        url = $("#url").val();
        sort = $("#sort").val();
        $.post("/managers/shop_directory/update_shop_directory",
            {
                shop_directory_id: shop_directory_id,
                name: name,
                url: url,
                sort: sort
            }, function (data) {
                if (data == 1) {
                    swal("修改成功!", "", "success");
                    window.location.href = "/managers/shop_directory/to_shop_directory";
                } else {
                    swal("修改失败!", "", "error");
                }
            });
    }
</script>
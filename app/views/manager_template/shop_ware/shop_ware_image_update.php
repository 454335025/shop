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
                    <form class="form-horizontal" id="image_form" method="post" action="update_shop_ware_image">
                        <input type="hidden" id="shop_ware_id" name="shop_ware_id"
                               value="<?php echo $shop_ware->id ?>"/>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">图片展示</label>
                            <div class="col-sm-10">
                                <img style="width: 300px;height: 300px;" src="<?php echo $shop_ware->main_img ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">图片</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="main_img" name="main_img">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" onclick="javascript:uploadImg();" class="btn btn-default">修改
                                </button>
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
<script src="<?php echo STATIC_COMMON; ?>/js/jquery.form.js"></script>
<script>
    function uploadImg() {
        $("#image_form").ajaxSubmit(function (data) {
            if (data == 1) {
                swal("修改成功!", "", "success");
                setTimeout(function () {
                    window.location.href = "/managers/shop_ware/to_shop_ware";
                }, 1500);
            } else {
                swal("修改失败!", "", "error");
            }
        });
    }
</script>
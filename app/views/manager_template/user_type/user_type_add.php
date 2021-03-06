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
                            <label class="col-sm-2 control-label form-label">用户类型</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="type" name="type">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">订单折扣(0.00-1.00)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="discount" name="discount">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">最低积分兑换</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="min_integral" name="min_integral">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">多少钱1分</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="exchange" name="exchange">
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
            add_user_type();
        })
    });

    function add_user_type() {
        var type, discount, min_integral, exchange;
        type = $("#type").val();
        discount = $("#discount").val();
        min_integral = $("#min_integral").val();
        exchange = $("#exchange").val();
        $.post("/managers/user_type/add_user_type",
            {
                type: type,
                discount: discount,
                min_integral: min_integral,
                exchange: exchange
            }, function (data) {
                if (data == 1) {
                    swal("添加成功!", "", "success");
                    window.location.href = "/managers/user_type/to_user_type";
                } else {
                    swal("添加失败!", "", "error");
                }
            });
    }
</script>
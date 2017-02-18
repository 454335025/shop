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
                            <label class="col-sm-2 control-label form-label">商品名称</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">描述</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" id="remark" name="remark"
                                          placeholder="商品描述"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">子目录名称</label>
                            <div class="col-sm-8">
                                <select class="selectpicker" data-live-search="true" style="display: none;"
                                        id="shop_directory"
                                        name="shop_directory">
                                    <?php foreach ($shop_sub_directories as $shop_sub_directory) { ?>
                                        <option
                                            value="<?php echo $shop_sub_directory->belongsToDirectories->id ?>,<?php echo $shop_sub_directory->id ?>"><?php echo $shop_sub_directory->name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">排序</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sort" name="sort">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">是否参与折扣</label>
                            <div class="col-sm-8">
                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="success"
                                       id="is_discount"
                                       name="is_discount">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">金额(x.00)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="original_money" name="original_money">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">实际金额(x.00)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="money" name="money">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">购买获得积分</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="integral" name="integral">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">商品详细参数</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" id="parameter" name="parameter"
                                          placeholder="参数1:描述1(结尾不要有分号)"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">是否参与积分兑换</label>
                            <div class="col-sm-8">
                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="success"
                                       id="is_integral"
                                       name="is_integral">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label form-label">兑换所需积分</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="cost_integral" name="cost_integral">
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
            add_shop_ware();
        })
    });

    function add_shop_ware() {
        var name, remark, shop_directory_id,shop_sub_directory_id, sort, is_discount, original_money, money, integral, parameter, is_integral, cost_integral;

        name = $("#name").val();
        remark = $("#remark").val();
        sort = $("#sort").val();
        original_money = $("#original_money").val();
        money = $("#money").val();
        integral = $("#integral").val();
        parameter = $("#parameter").val();
        cost_integral = $("#cost_integral").val();

        if ($("#is_discount").parents().attr("class") == 'toggle btn btn-success') {
            is_discount = 1;
        } else {
            is_discount = 0;
        }
        if ($("#is_integral").parents().attr("class") == 'toggle btn btn-success') {
            is_integral = 1;
        } else {
            is_integral = 0;
        }

        var strs = new Array();
        strs = $("#shop_directory option:selected").val().split(","); //字符分割
        shop_directory_id = strs[0];
        shop_sub_directory_id = strs[1];

        if(shop_directory_id == ''){
            swal("请选择子目录!", "", "error");return;
        }
        $.post("/managers/shop_ware/add_shop_ware",
            {
                name:name,
                remark:remark,
                shop_directory_id:shop_directory_id,
                shop_sub_directory_id:shop_sub_directory_id,
                sort:sort,
                is_discount:is_discount,
                original_money:original_money,
                money:money,
                integral:integral,
                parameter:parameter,
                is_integral:is_integral,
                cost_integral:cost_integral
    },
        function (data) {
            if (data == 1) {
                swal("添加成功!", "", "success");
                setTimeout(function () {
                    window.location.href = "/managers/shop_ware/to_shop_ware";
                }, 1500);
            } else {
                swal("添加失败!", "", "error");
            }
        }

    )
        ;
    }
</script>
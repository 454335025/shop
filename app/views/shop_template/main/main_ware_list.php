<div class="list_container" style="display: block; transform-origin: 0px 0px 0px; opacity: 1;">
    <?php foreach ($wares as $ware) { ?>
        <a href="/shop/ware?ware_id=<?php echo $ware->id ?>">
            <div class="item-product clearfix">
                <div class="item_image">
                    <img src="<?php echo $ware->main_img ?>" class="lazy product-img">
                </div>
                <div class="information">
                    <p><?php echo $ware->name ?></p>
                    <p> <?php echo $ware->remark ?></p>
                </div>
                <div class="price_info">
                    <div class="clearfix">
                        <div class="now_price pull_left">
                            <?php if ($ware->is_integral == 1) { ?>
                                <em><?php echo $ware->cost_integral ?></em>积分
                            <?php } else { ?>
                                ￥<em><?php echo $ware->money ?></em>
                            <?php } ?>
                            <span class="grey del">
                                <span>￥<?php echo $ware->original_money ?></span>
                            </span>
                        </div>
                    </div>
<!--                    <div class="clearfix buy_num">-->
<!--                        <div class="grey">xxx人已购买</div>-->
<!--                    </div>-->
                </div>
            </div>
        </a>
        <hr style="height:1px;border:none;border-top:1px solid #555555;" />
    <?php } ?>
</div>
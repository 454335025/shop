<div style="height:40px;" id="hearder_nav">
    <div id="nav-outer" style="background: #fff;">
        <div class="headerNav clearfix" id="nav-inner">
            <?php foreach ($directories as $directory) { ?>
                <div style="width:auto;padding:0px 15px" class="navTitle nt_mall ">
                    <a href='javascript:void(0)' onclick="javascript:toggle(this)">
                        <span><?php echo $directory->name ?></span>
                    </a>
                    <ul id="mall_sel" class="mall_sel" style="display:none;">
                        <?php foreach ($directory->hasManySubDirectories as $hasManySubDirectory) { ?>
                            <a href="/shop/main?sub_directory_id=<?php echo $hasManySubDirectory->id ?>">
                                <li><?php echo $hasManySubDirectory->name ?></li>
                            </a>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div id="search_page" class="hide" style="transform-origin: 0px 0px 0px; opacity: 1;">
    <div class="search_head">
        <a id="history_back" class="pull_left">
            <img src="<?php echo STATIC_COMMON; ?>/images/shop/main/NavButtonBack.png" alt="">
        </a>
        <div class="input_outer">
            <img src="<?php echo STATIC_COMMON; ?>/images/shop/main/search2.png" alt="" class="search_icon">
            <input type="text" class="search_input" placeholder="搜索商品名称" id="search_input">
        </div>
        <a class="search_btn" id="search_back" style="transform-origin: 0px 0px 0px; opacity: 1;">返回</a>
        <a class="search_btn" id="search_cancel" style="display: none;">搜索</a>
    </div>
    <ul class="search_links" style="height: 686px; transform-origin: 0px 0px 0px; opacity: 1;">
        <?php foreach ($directories as $directory) { ?>
            <li class="search_link"><?php echo $directory->name ?>
                <span class="arrow"></span>
                <ul class="search_subs">
                    <?php foreach ($directory->hasManySubDirectories as $hasManySubDirectory) { ?>
                        <li class="search_sub"><a
                                href="/shop/main?sub_directory_id=<?php echo $hasManySubDirectory->id ?>"><?php echo $hasManySubDirectory->name ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
    </ul>
</div>
<!-- START SIDEBAR -->
<?php use app\models\M_RelationMenus;?>
<div class="sidebar clearfix">
    <ul class="sidebar-panel nav">
        <li class="sidetitle">MAIN</li>
        <?php foreach (M_RelationMenus::where('user_id',$_SESSION['user']->id)->groupBy('menu_id')->get() as $relation){?>
        <li>
            <a href="#"><span class="icon color7"><i class="fa fa-flask"></i></span><?php echo $relation->belongsToMenu->name?><span class="caret"></span></a>
            <ul>
                <?php foreach (M_RelationMenus::where('user_id',$_SESSION['user']->id)->where('menu_id',$relation->menu_id)->get() as $sub_menu){?>
                <li>
                    <a href="<?php echo $sub_menu->belongsToSubMenu->url . '?relation_id=' . $sub_menu->id ?>">
                        <?php echo $sub_menu->belongsToSubMenu->name?>
                    </a>
                </li>
                <?php }?>
            </ul>
        </li>
        <?php }?>
    </ul>

</div>
<!-- END SIDEBAR -->


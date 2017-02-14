<!-- START SIDEBAR -->
<?php
use app\models\M_RelationMenus;

//if ($_SESSION['user']->isroot == 2) {
//    $menus_list = M_RelationMenus::all()->groupBy('menu_id');
//    $sub_menus_list = M_RelationMenus::all();
//} else {
    $menus_list = M_RelationMenus::where('user_id', $_SESSION['user']->id)->groupBy('menu_id')->get();
    $sub_menus_list = M_RelationMenus::where('user_id', $_SESSION['user']->id)->get();
//}

?>
<div class="sidebar clearfix">
    <ul class="sidebar-panel nav">
        <li class="sidetitle">MAIN</li>
        <?php foreach ($menus_list as $menu_list) { ?>
            <li>
                <a href="#">
                    <span class="icon color7"><i class="fa fa-flask"></i></span>
                    <?php print_r($menu_list->belongsToMenu->name); ?>
                    <span class="caret"></span>
                </a>
                <ul>
                    <?php foreach ($sub_menus_list as  $sub_menu_list) { ?>
                        <?php if ($menu_list->menu_id == $sub_menu_list->menu_id) { ?>
                            <li>
                                <a href="<?php echo $sub_menu_list->belongsToSubMenu->url . '?relation_id=' . $sub_menu_list->id ?>">
                                    <?php echo $sub_menu_list->belongsToSubMenu->name ?>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
    </ul>
</div>
<!-- END SIDEBAR -->


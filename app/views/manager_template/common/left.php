<!-- START SIDEBAR -->
<?php use app\models\M_RelationMenus;?>
<div class="sidebar clearfix">
    <ul class="sidebar-panel nav">
        <li class="sidetitle">MAIN</li>
        <?php foreach (M_RelationMenus::where('user_id',$_SESSION['user']->id)->groupBy('menu_id')->get() as $menu){?>
        <li>
            <a href="#"><span class="icon color7"><i class="fa fa-flask"></i></span><?php echo $menu->belongsToMenu->name?><span class="caret"></span></a>
            <ul>
                <?php foreach (M_RelationMenus::where('user_id',$_SESSION['user']->id)->where('menu_id',$menu->menu_id)->get() as $submenu){?>
                <li><a href="<?php echo $submenu->belongsToSubMenu->url?>"><?php echo $submenu->belongsToSubMenu->name?></a></li>
                <?php }?>
<!--                <li><a href="others.html">Others<span class="label label-danger">NEW</span></a></li>-->
            </ul>
        </li>
        <?php }?>
    </ul>
<!--    <div class="sidebar-plan">-->
<!--        Pro Plan<a href="#" class="link">Upgrade</a>-->
<!--        <div class="progress">-->
<!--            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">-->
<!--            </div>-->
<!--        </div>-->
<!--        <span class="space">42 GB / 100 GB</span>-->
<!--    </div>-->

</div>
<!-- END SIDEBAR -->


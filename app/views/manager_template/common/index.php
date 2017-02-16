<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
    <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive,"/>
    <title><?php echo $title ?></title>

    <?php include_once BASE_PATH . '/app/views/manager_template/common/head.php'; ?>

</head>
<body>
<!-- Start Page Loading -->
<div class="loading"><img src="/img/loading.gif" alt="loading-img"></div>
<!-- End Page Loading -->

<?php include_once BASE_PATH . '/app/views/manager_template/common/top.php'; ?>

<?php include_once BASE_PATH . '/app/views/manager_template/common/left.php'; ?>

<!-- START CONTENT -->
<div class="content">
    <!-- Start Page Header -->
    <?php if (isset($_SESSION['relation_id'])) { ?>
        <div class="page-header">
            <h1 class="title"><?php echo $title ?></h1>
            <ol class="breadcrumb">
                <li>
                    <a href="###">
                        <?php echo (app\models\M_RelationMenus::where('id', $_SESSION['relation_id'])->first())->belongsToMenu->name ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo (app\models\M_RelationMenus::where('id', $_SESSION['relation_id'])->first())->belongsToSubMenu->url . '?relation_id=' . $_SESSION['relation_id'] ?>">
                        <?php echo (app\models\M_RelationMenus::where('id', $_SESSION['relation_id'])->first())->belongsToSubMenu->name ?>
                    </a>
                </li>
                <li class="active"><?php echo $title ?></li>
            </ol>
        </div>
    <?php } ?>
    <?php include_once $ui; ?>
</div>
<!-- End Content -->

<?php include_once BASE_PATH . '/app/views/manager_template/common/right.php'; ?>

<?php include_once BASE_PATH . '/app/views/manager_template/common/foot.php'; ?>


</body>
</html>

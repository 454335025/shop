<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
    <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
    <title>Kode</title>

    <?php include_once BASE_PATH.'/app/views/manager_template/common/head.php'; ?>

</head>
<body>
<!-- Start Page Loading -->
<div class="loading"><img src="/images/manager/loading.gif" alt="loading-img"></div>
<!-- End Page Loading -->

<?php include_once BASE_PATH.'/app/views/manager_template/common/top.php'; ?>

<?php include_once BASE_PATH.'/app/views/manager_template/common/left.php'; ?>

<?php include_once BASE_PATH."/app/views/manager_template/$ui.php"; ?>

<?php include_once BASE_PATH.'/app/views/manager_template/common/right.php'; ?>

<?php include_once BASE_PATH.'/app/views/manager_template/common/foot.php'; ?>


</body>
</html>

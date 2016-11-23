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
    <script type="text/javascript" src="<?php echo STATIC_COMMON;?>/js/manager/login.js"></script>
    <style type="text/css">
        body{background: #F5F5F5;}
    </style>
</head>
<body>

<div class="login-form">
    <form>
        <div class="top">
            <img src="<?php echo STATIC_COMMON; ?>/img/kode-icon.png" alt="icon" class="icon">
            <h1>后台管理</h1>
            <h4>登录</h4>
        </div>
        <div class="form-area">
            <div class="group">
                <input type="text" class="form-control" id="username" name="username" placeholder="用户名">
                <i class="fa fa-user"></i>
            </div>
            <div class="group">
                <input type="password" class="form-control" id="password" name="password"  placeholder="密码">
                <i class="fa fa-key"></i>
            </div>
            <button type="button" class="btn btn-default btn-block">登录</button>
        </div>
    </form>
</div>

</body>
</html>
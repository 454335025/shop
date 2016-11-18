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
    <style type="text/css">
        body{background: #F5F5F5;}
    </style>
</head>
<body>

<div class="login-form">
    <form action="index.html">
        <div class="top">
            <img src="/images/manager/kode-icon.png" alt="icon" class="icon">
            <h1>后台管理</h1>
            <h4>登录</h4>
        </div>
        <div class="form-area">
            <div class="group">
                <input type="text" class="form-control" placeholder="Username">
                <i class="fa fa-user"></i>
            </div>
            <div class="group">
                <input type="password" class="form-control" placeholder="Password">
                <i class="fa fa-key"></i>
            </div>
<!--            <div class="checkbox checkbox-primary">-->
<!--                <input id="checkbox101" type="checkbox" checked>-->
<!--                <label for="checkbox101"> Remember Me</label>-->
<!--            </div>-->
            <button type="submit" class="btn btn-default btn-block">LOGIN</button>
        </div>
    </form>
<!--    <div class="footer-links row">-->
<!--        <div class="col-xs-6"><a href="#"><i class="fa fa-external-link"></i> Register Now</a></div>-->
<!--        <div class="col-xs-6 text-right"><a href="#"><i class="fa fa-lock"></i> Forgot password</a></div>-->
<!--    </div>-->
</div>

</body>
</html>
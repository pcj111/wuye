<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"F:\twothink\TwoThink\public/../application/admin/view/default/login\index.html";i:1521712368;}*/ ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>用户登录|TwoThink内容管理系统</title>

    <link href="__PUBLIC__/static/bootstrap/css/bootstrap.min.css" title="" rel="stylesheet" />
    <link href="__PUBLIC__/admin/login/login.css" title="" rel="stylesheet" />
    <link href="__PUBLIC__/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" >
    <script src="__PUBLIC__/admin/login/particles/particles.js"></script>
    <script src="__PUBLIC__/admin/login/particles/login.js"></script>
    <script src="__PUBLIC__/static/js/jquery.js" type="text/javascript"></script>
</head>

<body>
<div id="particles-js"></div>
<div class="container">
    <div class="row row-centered">
        <div class="well col-md-4 col-centered" id="itemBox">
            <form class="viform" action="<?php echo url('login/index'); ?>" method="post" class="layui-form">
                <h3 class="welcome"><i class="login-logo"></i>TwoThink管理平台</h3>
                <div class="form-group has-success has-feedback">
                    <label class="control-label sr-only"></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="username" placeholder="请输入用户名" class="form-control">
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <label class="control-label sr-only"></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" placeholder="请输入密码" class="form-control">
                    </div>
                </div>
                <div class="form-group has-success has-feedback">
                    <label class="control-label sr-only"></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <input type="text" name="verify" placeholder="请输入验证码" class="form-control">
                    </div>
                </div>
                <div class="form-group help verifyimg">
                    <?php echo captcha_img(); ?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn form-control btn-success" lay-submit lay-filter="demo1">登录</button>
                </div>
            </form>
        </div>

    </div>
</div>
</body>
<script src="__PUBLIC__/static/layui/layui.js"></script>
<script>
    layui.use(['layer'], function(){
        //初始化选中用户名输入框
        $("#itemBox").find("input[name=username]").focus();
        //刷新验证码
        $(".verifyimg img").click(function(){
            var verifyimg = $(".verifyimg img").attr("src");
            if( verifyimg.indexOf('?')>0){
                $(".verifyimg img").attr("src", verifyimg+'&random='+Math.random());
            }else{
                $(".verifyimg img").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
            }
        });
        //表单提交
        $("form").submit(function() {
            var self = $(this);
            $.post(self.attr("action"), self.serialize(), success, "json");
            return false;
            function success(data) {
                if (data.code) {
                    window.location.href = data.url;
                } else {
                    layer.msg(data.msg, {icon: 5});
                    //刷新验证码
                    $(".verifyimg img").click();
                }
            }
        });
    });
</script>
<style>
    .verifyimg img{
        width: 100%;
    }
    .check-tips {
        color: #ff0000;
    }
</style>
</html>
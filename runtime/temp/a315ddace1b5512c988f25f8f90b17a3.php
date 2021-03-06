<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"F:\twothink\TwoThink\public/../application/install\view\index\complete.html";i:1521712369;s:72:"F:\twothink\TwoThink\public/../application/install\view\public\base.html";i:1521712369;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TwoThink <?php echo TWOTHINK_VERSION; ?> 安装</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="__STATIC__/bootstrap/css/bootstrap.css" rel="stylesheet">

        <script src="__STATIC__/js/jquery.js"></script>
        <script src="__STATIC__/bootstrap/js/bootstrap.js"></script>
    </head>

    <body class="jumbotron">
        <div class="container" style="margin-bottom: 50px;">
            <div class="row">
                <div class="col-xs-12">
                    <h1>TwoThink</h1>
                    <div>
                        <ul class="nav nav-pills nav-justified step step-progress" data-step="4">
                            
    <li class="active"><a>安装协议<span class="caret"></span></a></li>
    <li class="active"><a>环境检测<span class="caret"></span></a></li>
    <li class="active"><a>创建数据<span class="caret"></span></a></li>
    <li class="active"><a><?php if(\think\Session::get('update') == '1'): ?>升级<?php else: ?>安装<?php endif; ?><span class="caret"></span></a></li>
    <li class="active"><a>完成<span class="caret"></span></a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-xs-12">
                    
    <h1>完成</h1>
    <p><?php if(\think\Session::get('update') == '1'): ?>升级<?php else: ?>安装<?php endif; ?>完成！</p>
	<?php if(isset($info)): ?>
	<?php echo $info; endif; ?>

                </div>
            </div>
        </div>

        <footer class="footer navbar-fixed-bottom">
            <div class="container">
                <div>
                	
    <a class="btn btn-primary btn-large" href="<?php echo 'http://'. $_SERVER['SERVER_NAME'] . rtrim(dirname(rtrim($_SERVER['SCRIPT_NAME'], '/')), '/');?>/admin/login/index">登录后台</a>
    <a class="btn btn-success btn-large" href="<?php echo 'http://'. $_SERVER['SERVER_NAME'] . rtrim(dirname(rtrim($_SERVER['SCRIPT_NAME'], '/')), '/');?>">访问首页</a>
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=59437834" charset="UTF-8"></script>

                </div>
            </div>
        </footer>
    </body>
<style>
.jumbotron {
    color: #fff;
    background: #008d4c ;
}
.container h1{
    text-align: center;
}
.table caption{
    color: #ffffff;
}
a:hover, a:focus {
    color: #ffffff !important;
}
.text-left{
    text-align: left !important;
}
.step {
    counter-reset: flag;
}
.step li {
    position: relative;
    transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
}
.step li a {
    cursor: pointer;
    padding: 10px 15px;
    transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
}
.step li a:before {
    content: counter(flag);
    counter-increment: flag;
    transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
}
.step li a:after {
    content: "";
    transition: all 0.3s ease-in-out;
    -webkit-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
}
.step-arrow {
    margin: 20px 0;
}
.step-arrow.unhover li a:hover,
.step-arrow.unhover li a:focus {
    background-color: #f6f6f6;
    color: #444444;
}
.step-arrow.unhover li a:hover:before,
.step-arrow.unhover li a:focus:before {
    background-color: #d2d2d2;
    color: #ffffff;
}
.step-arrow.unhover li:not(:last-child) a:hover:after,
.step-arrow.unhover li:not(:last-child) a:focus:after {
    background-color: #f6f6f6;
}
.step-arrow li {
    padding-right: 20px;
}
.step-arrow li:last-child {
    padding-right: 0;
}
.step-arrow li:nth-child(n+2) a {
    margin-left: -20px;
    border-radius: 0;
}
.step-arrow li:not(:last-child) a:after {
    position: absolute;
    top: -1px;
    right: -20px;
    width: 40px;
    height: 40px;
    transform: scale(0.707) rotate(45deg);
    z-index: 1;
    background-color: #f6f6f6;
    border-radius: 0 5px 0 50px;
    border-top: 1px solid #ffffff;
    border-right: 1px solid #ffffff;
    box-sizing: content-box;
}
.step-arrow li:not(:last-child) a:hover:after {
    background-color: #00b8f5;
}
.step-arrow li a {
    border-radius: 0;
    color: #444444;
    background-color: #f6f6f6;
}
.step-arrow li a:hover {
    background-color: #00b8f5;
    color: #ffffff;
}
.step-arrow li a:hover:before {
    background: #ffffff;
    color: #00b8f5;
}
.step-arrow li a:before {
    position: absolute;
    z-index: 2;
    width: 20px;
    height: 20px;
    line-height: 20px;
    border-radius: 20px;
    left: 3rem;
    font-weight: bold;
    font-size: 1rem;
    overflow: hidden;
    top: 10px;
    background: #d2d2d2;
    color: #ffffff;
}
.step-arrow li.active a:before {
    background: #ffffff;
    color: #00b8f5;
}
.step-arrow li.active a:after {
    background-color: #00b8f5;
}
.step-arrow li.active a,
.step-arrow li.active a:hover {
    background-color: #00b8f5;
    color: #ffffff;
}
.step-arrow li.active a:before,
.step-arrow li.active a:hover:before {
    background-color: #ffffff;
    color: #00b8f5;
}
.step-arrow li.active a:after,
.step-arrow li.active a:hover:after {
    background-color: #00b8f5 !important;
}
.step-square {
    margin-top: 40px;
}
.step-square > li:hover a:before,
.step-square > li:active a:before,
.step-square > li.active a:before {
    background-color: #00b8f5;
    color: #ffffff;
    border-color: #00b8f5;
}
.step-square > li:hover a:after,
.step-square > li:active a:after,
.step-square > li.active a:after {
    background-color: #00b8f5;
}
.step-square > li:first-child a:after {
    left: 50%;
    border-right: 1px solid #ffffff;
}
.step-square > li:last-child a:after {
    right: 50%;
    border-left: 1px solid #ffffff;
}
.step-square > li > a {
    color: #ebebeb;
}
.step-square > li > a:hover {
    background-color: #ffffff;
    color: #00b8f5;
}
.step-square > li > a:before {
    position: absolute;
    z-index: 2;
    top: -2rem;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: 2rem;
    height: 2rem;
    background-color: #ffffff;
    line-height: 20px;
    border: 1px solid #ebebeb;
}
.step-square > li > a:after {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    top: -35%;
    background-color: #ebebeb;
    z-index: 1;
    height: 2px;
    border: solid #ffffff;
    border-width: 0 1px;
}
.step-square > li.active > a,
.step-square > li.active > a:focus,
.step-square > li.active > a:hover {
    color: #00b8f5;
    background: transparent;
}
.step-round {
    margin-top: 40px;
}
.step-round > li:first-child > a:after {
    left: 30%;
    border-radius: 5px 0 0 5px;
}
.step-round > li:last-child > a:after {
    right: 30%;
    border-radius: 0 5px 5px 0;
}
.step-round > li.active > a,
.step-round > li.active > a:hover,
.step-round > li.active > a:focus {
    background: transparent;
    color: #00b8f5;
}
.step-round > li.active > a:before,
.step-round > li.active > a:hover:before,
.step-round > li.active > a:focus:before {
    background-color: #00b8f5;
    color: #ffffff;
}
.step-round > li.active > a:after,
.step-round > li.active > a:hover:after,
.step-round > li.active > a:focus:after {
    background-color: #00b8f5;
}
.step-round > li > a {
    color: #ebebeb;
}
.step-round > li > a:before {
    position: absolute;
    z-index: 2;
    top: -2rem;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    background-color: #ffffff;
    line-height: 2rem;
    box-shadow: 0 0 0 5px #ebebeb;
}
.step-round > li > a:after {
    position: absolute;
    left: 0;
    right: 0;
    top: -38%;
    background-color: #ebebeb;
    z-index: 1;
    height: 8px;
}
.step-round > li > a:after:after {
    background-color: #00b8f5;
}
.step-round > li > a:hover {
    background: transparent;
    color: #00b8f5;
}
.step-round > li > a:hover:before {
    background-color: #00b8f5;
    color: #ffffff;
}
.step-round > li > a:hover:after {
    background-color: #00b8f5;
}
.step-progress {
    margin-top: 60px;
}
.step-progress > li > a {
    color: #ebebeb;
    padding-top: 1.8rem;
}
.step-progress > li > a:before {
    position: absolute;
    z-index: 2;
    top: -35px;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    line-height: 2rem;
    box-shadow: 0 0 0 5px #ebebeb;
}
.step-progress > li > a:after {
    content: "";
    background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, rgba(0, 0, 0, 0) 25%, rgba(0, 0, 0, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(0, 0, 0, 0) 75%, rgba(0, 0, 0, 0));
    background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, rgba(0, 0, 0, 0) 25%, rgba(0, 0, 0, 0) 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, rgba(0, 0, 0, 0) 75%, rgba(0, 0, 0, 0));
    -webkit-background-size: 40px 40px;
    background-size: 40px 40px;
    background-color: #ebebeb;
    float: left;
    width: 100%;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    height: 10px;
    transition: all 0.5s ease-in-out;
    -webkit-transition: all 0.5s ease-in-out;
    -ms-transition: all 0.5s ease-in-out;
}
.step-progress > li > a span.caret {
    position: absolute;
    left: 0;
    right: 0;
    margin: 0 auto;
    transform: rotate(180deg);
    top: -4px;
}
.step-progress > li > a:hover {
    background: transparent;
    color: #00b8f5;
}
.step-progress > li > a:hover:before {
    color: #ffffff;
    background-color: #00b8f5;
}
.step-progress > li > a:hover:after {
    background-color: #00b8f5;
}
.step-progress > li.active > a,
.step-progress > li.active > a:hover,
.step-progress > li.active > a:focus {
    color: #00b8f5;
    background: transparent;
}
.step-progress > li.active > a:before,
.step-progress > li.active > a:hover:before,
.step-progress > li.active > a:focus:before {
    background-color: #00b8f5;
    color: #ffffff;
}
.step-progress > li.active > a:after,
.step-progress > li.active > a:hover:after,
.step-progress > li.active > a:focus:after {
    background-color: #00b8f5;
}
.step-progress > li.active > a:after {
    -webkit-animation: progress-bar-stripes 2s linear infinite;
    -o-animation: progress-bar-stripes 2s linear infinite;
    animation: progress-bar-stripes 2s linear infinite;
}
.step-progress > li:first-child a:after {
    border-radius: 5px 0 0 5px;
}
.step-progress > li:last-child a:after {
    border-radius: 0 5px 5px 0;
}
</style>
</html>

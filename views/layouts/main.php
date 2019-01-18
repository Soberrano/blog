<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>
<body>
<div class="header" id="ban">
    <div class="container">
        <div class="head-left wow fadeInLeft animated animated" data-wow-delay=".5s"
             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
        </div>
        <div class="header_right wow fadeInLeft animated animated" data-wow-delay=".5s"
             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <nav class="link-effect-7" id="link-effect-7">
                        <ul class="nav navbar-nav">
                            <li class="active act"><a href="<?= Url::home() ?>">Главная</a></li>
                            <li><a href="<?= Url::to(['blog/']) ?>">Оставить отзыв</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--start-main-->
<div class="header-bottom">
    <div class="container">
        <div class="logo wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
            <h1><a href="<?= Url::home() ?>">BLOG</a></h1>
            <p><label class="of"></label>LET'S MAKE A PERFECT BLOG<label class="on"></label></p>
        </div>
    </div>
</div>
<?= $content?>
<div class="footer">
    <div class="container">
        <div class="col-md-4 footer-middle wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
            <h4>Latest Tweet</h4>
            <div class="mid-btm">
                <p>Sed do eiusmod tempor Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
                <a href="http://bootstraptema.ru/">http://bootstraptema.ru</a>
            </div>

            <p>Consectetur adipisicing Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod .</p>
            <a href="http://bootstraptema.ru/">http://bootstraptema.ru</a>

        </div>
        <div class="col-md-4 footer-right wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
            <h4>Newsletter</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
            <div class="name">
                <form action="#" method="post">
                    <input type="text" placeholder="Your Name" required="">
                    <input type="text" placeholder="Your Email" required="">
                    <input type="submit" value="Subscribed Now">
                </form>

            </div>

            <div class="clearfix"></div>

        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="copyright wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
    <div class="container">
        <p>© 2016 Style Blog. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
    </div>

</div>

<?php $this->endBody() ?>
</body>
<script>
    new WOW().init();
</script>
</html>
<?php $this->endPage() ?>
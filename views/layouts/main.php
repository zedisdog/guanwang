<?php
use app\assets\FancyBoxAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
FancyBoxAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]>
<html class="ie ie6" lang="zh"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="zh"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="zh"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="zh"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="<?= Yii::$app->charset ?>">
    <title>Metaverse</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php echo Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body id="home">
<?php $this->beginBody() ?>
<header>
    <div class="top_line"></div>
    <div class="container">

        <div class="ten columns">
            <div class="logo"><img src="/images/logo.png" alt=""/><p>四川蓝色港湾科技有限公司</p></div>
        </div>

        <div class="six columns">
            <div class="social">
                <ul>
                    <li><a href="javascript:void(0);" id=""><img src="/images/icn_twitter.png" alt=""/></a></li>
                    <li><a href="#"><img src="/images/icn_dribbble.png" alt=""/></a></li>
                    <li><a href="#"><img src="/images/icn_pinterest.png" alt=""/></a></li>
                    <li><a href="#"><img src="/images/icn_zerply.png" alt=""/></a></li>
                    <li><a href="#"><img src="/images/icn_vimeo.png" alt=""/></a></li>
                    <li><a href="#"><img src="/images/icn_gplus.png" alt=""/></a></li>
                    <li><a href="#"><img src="/images/icn_linkedin.png" alt=""/></a></li>
                    <li><a href="#"><img src="/images/icn_facebook.png" alt=""/></a></li>
                    <li><a href="#"><img src="/images/icn_flickr.png" alt=""/></a></li>
                    <li><a href="#"><img src="/images/icn_forrst.png" alt=""/></a></li>
                </ul>
            </div>
            <!-- end social -->
            <div class="h_contact">
                <p>youremail@here.com</p>

                <p>Call us: 123 456 789</p>
            </div>
        </div>
        <!-- end six columns -->
    </div>
    <!-- end container -->

    <nav>
        <div class="container">

            <div class="thirteen columns">
                <div class="menu">
                    <ul class="main-menu">
                        <li <?php echo (Yii::$app->controller->id=='index' && Yii::$app->controller->action->id=='index')?'class="active"':'' ?>><a href="<?php echo Url::toRoute('index/index') ?>" id="homenav">首页</a></li>
                        <li <?php echo Yii::$app->controller->id=='hardware'?'class="active"':'' ?>><a href="<?php echo Url::toRoute('hardware/index') ?>">硬件产品</a></li>
                        <li <?php echo Yii::$app->controller->id=='software'?'class="active"':'' ?>><a href="<?php echo Url::toRoute('software/index') ?>">软件产品</a></li>
                        <li <?php echo Yii::$app->controller->id=='article'?'class="active"':'' ?>><a href="<?php echo Url::toRoute('article/index') ?>">新闻资讯</a></li>
                        <li <?php echo (Yii::$app->controller->id=='article' && Yii::$app->controller->action->id=='about')?'class="active"':'' ?>><a href="<?php echo Url::toRoute('index/about') ?>">关于我们</a></li>
                    </ul>
                </div>
            </div>
            <!-- end thirteen columns -->


            <!-- end three columns -->

        </div>
        <!-- end container -->
    </nav>
</header>
<?php echo $content?>
<div class="clear"></div>


<div id="footer">

    <div class="f_bg1"></div>
    <div class="f_bg2"></div>
    <div class="f_bg3"></div>
    <div class="f_bg4"></div>
    <div class="f_bg5"></div>

    <div class="container footer_wrap">

        <div class="three columns offset-by-one">
            <div class="f_about">
                <h5>About</h5>

                <p>What good is a reward if you ain't around to use it? Besides, attacking that battle station ain't my
                    idea of courage. It's more like?suicide. I'm surprised you had the courage to take the
                    responsibility yourself.</p>
            </div>
            <!-- end f_about -->
        </div>
        <!-- end three columns -->

        <div class="four columns">
            <div class="f_latest_posts">
                <h5>Latest posts</h5>

                <p class="f_post_title">A New Hope</p>

                <p class="f_post_text">It's not that I like the Empire...</p>

                <p class="f_post_title">The Empire Strikes Back</p>

                <p class="f_post_text">It's not that I like the Empire...</p>

                <p class="f_post_title">A New Hope</p>

                <p class="f_post_text">It's not that I like the Empire...</p>

            </div>
            <!-- f_latest_posts -->
        </div>
        <!-- end four columns -->

        <div class="four columns">
            <div class="last_tweets">
                <h5>Latest tweets</h5>

                <div id="twitter_update_list"></div>
            </div>
            <!-- end last_tweets -->
        </div>
        <!-- end four columns -->

        <div class="three columns">
            <div class="f_contact_info">
                <h5>Contact info</h5>

                <p>youremail@here.com</p>

                <p>+123 456 789</p>

                <p>767 Fifth Ave.<br/>
                    New York, NY 10153</p>
            </div>
            <!-- end f_contact_info -->
        </div>
        <!-- end three columns -->

        <div class="clear"></div>

        <div class="copyright">
            <p>&copy; 2013 All rights reserved.Collect from
                <a href="#" target="_blank" title="四川蓝色港湾科技有限公司">四川蓝色港湾科技有限公司</a></p>
        </div>

    </div>
    <!-- end container footer_wrap-->
</div>
<!-- end footer -->

<!-- End Document================================================== -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<?php
use yii\helpers\Html;
use app\assets\admin\AdminAsset;
use yii\helpers\Url;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $this->title ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php echo Html::csrfMetaTags() ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
</head>
<body class="skin-blue">
<?php $this->beginBody() ?>
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo \yii\helpers\Url::toRoute('index/index'); ?>" class="logo"><b>BLUE</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/images/admin_160x160.png" class="user-image" alt="User Image"/>
                            <span class="hidden-xs"><?php echo Yii::$app->session['admin']['user_name'] ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/images/admin_160x160.png" class="img-circle" alt="User Image" />
                                <p>
                                    <?php echo Yii::$app->session['admin']['user_name'] ?>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">

                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
<!--                                <div class="pull-left">-->
<!--                                    <a href="#" class="btn btn-default btn-flat">账户设置</a>-->
<!--                                </div>-->
                                <div class="pull-right">
                                    <a href="<?php echo \yii\helpers\Url::toRoute('default/logout') ?>" class="btn btn-default btn-flat">注销</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/images/admin_160x160.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo Yii::$app->session['admin']['user_name'] ?></p>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header"><b>菜单</b></li>
                <li class="treeview <?php echo Yii::$app->controller->id=='article' ||
                                               Yii::$app->controller->id=='article-type'?'active':NULL ?>">
                    <a href="#">
                        <i class="fa fa-asterisk"></i> <span><b>新闻管理</b></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?php echo Yii::$app->controller->id=='article-type'?'class="active"':NULL ?>><a href="<?php echo Url::toRoute('article-type/index') ?>"><i class="fa fa-circle-o"></i> 新闻分类管理</a></li>
                        <li <?php echo Yii::$app->controller->id=='article'?'class="active"':NULL ?>><a href="<?php echo Url::toRoute('article/index') ?>"><i class="fa fa-circle-o"></i> 新闻管理</a></li>
                    </ul>
                </li>
                <li class="treeview <?php echo Yii::$app->controller->id=='hardware' ||
                                               Yii::$app->controller->id=='brand' ||
                                               Yii::$app->controller->id=='brand-model' ||
                                               Yii::$app->controller->id=='hardware-type'?'active':NULL ?>">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span><b>硬件产品管理</b></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?php echo Yii::$app->controller->id=='brand'?'class="active"':NULL ?>><a href="<?php echo Url::toRoute('brand/index') ?>"><i class="fa fa-circle-o"></i> 硬件产品品牌管理</a></li>
                        <li <?php echo Yii::$app->controller->id=='brand-model'?'class="active"':NULL ?>><a href="<?php echo Url::toRoute('brand-model/index') ?>"><i class="fa fa-circle-o"></i> 硬件产品型号管理</a></li>
                        <li <?php echo Yii::$app->controller->id=='hardware-type'?'class="active"':NULL ?>><a href="<?php echo Url::toRoute('hardware-type/index') ?>"><i class="fa fa-circle-o"></i> 硬件产品分类管理</a></li>
                        <li <?php echo Yii::$app->controller->id=='hardware'?'class="active"':NULL ?>><a href="<?php echo Url::toRoute('hardware/index') ?>"><i class="fa fa-circle-o"></i> 硬件产品管理</a></li>
                    </ul>
                </li>
                <li class="treeview <?php echo Yii::$app->controller->id=='software' ||
                                               Yii::$app->controller->id=='software-type' ||
                                               Yii::$app->controller->id=='software' ||
                                               Yii::$app->controller->id=='enhance'?'active':NULL ?>">
                    <a href="#">
                        <i class="fa fa-desktop"></i> <span><b>软件产品管理</b></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?php echo Yii::$app->controller->id=='software-type'?'class="active"':NULL ?>><a href="<?php echo Url::toRoute('software-type/index') ?>"><i class="fa fa-circle-o"></i> 软件产品分类管理</a></li>
                        <li <?php echo Yii::$app->controller->id=='software'?'class="active"':NULL ?>><a href="<?php echo Url::toRoute('software/index') ?>"><i class="fa fa-circle-o"></i> 软件产品管理</a></li>
                        <li <?php echo Yii::$app->controller->id=='enhance'?'class="active"':NULL ?>><a href="<?php echo Url::toRoute('enhance/index') ?>"><i class="fa fa-circle-o"></i> 软件产品系统增强日志管理</a></li>
                    </ul>
                </li>

                <li class="treeview <?php echo Yii::$app->controller->id=='config' ||
                                               Yii::$app->controller->id=='admin'?'active':NULL ?>">
                    <a href="#">
                        <i class="fa fa-cog"></i> <span><b>系统</b></span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li <?php echo Yii::$app->controller->id=='config'?'class="active"':NULL ?>><a href="<?php echo Url::toRoute('config/index') ?>"><i class="fa fa-circle-o"></i> 设置</a></li>
                        <li <?php echo Yii::$app->controller->id=='admin'?'class="active"':NULL ?>><a href="<?php echo Url::toRoute('admin/index') ?>"><i class="fa fa-circle-o"></i> 管理员管理</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <?php echo $this->title ?>
            </h1>
        </section>
        <?php echo $content ?>
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
    </footer>
</div><!-- ./wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
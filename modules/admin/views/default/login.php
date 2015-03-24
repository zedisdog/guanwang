<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\admin\LoginAsset;

LoginAsset::register($this);
$this->title = 'BLUE';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $this->title; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
</head>
<body class="login-page">
<?php $this->beginBody() ?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>BLUE</b></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <?php $form = ActiveForm::begin(); ?>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="用户名" name="username" />
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="密码" name="password" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button name="sub" class="btn btn-primary btn-block btn-flat">登陆</button>
                </div><!-- /.col -->
            </div>
        <?php ActiveForm::end(); ?>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
<?php $this->endBody() ?>
<script>
    $(function () {
        $('button[name="sub"]').click(function(){
            if(!$('input[name="username"]').val()){
                alert('请填写用户名');
                return false;
            }
            if(!$('input[name="password"]').val()){
                alert('请填写密码');
                return false;
            }
            form = $('form').eq(0);
            $.ajax({
                type:'post',
                async:false,
                url:'<?php echo Url::to('/admin/default/ajax-do-login') ?>',
                dataType:'json',
                data:form.serialize(),
                success:function(data){
                    if(data.status=='ok'){
                        location.href='<?php echo Url::to('/admin/index/index') ?>';
                    }else{
                        alert('用户名或者密码错误');
                    }
                }
            });
            return false;
        });
    });
</script>
</body>
</html>
<?php $this->endPage() ?>
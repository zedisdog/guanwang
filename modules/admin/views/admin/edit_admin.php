<?php
use app\assets\admin\EditAsset;

EditAsset::register($this);
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <?php echo $item->id?'编辑':'添加' ?>管理员
                </div>
                <form action="<?php echo $ajaxUrl ?>" method="post" rel="<?php echo $redirectUrl ?>">
                    <div class="box-body">
                        <input type="hidden" name="id" value="<?php echo $item->id ?>" />
                        <div class="form-group">
                            <label>账户</label>
                            <input name="user_name" type="text" class="form-control" value="<?php echo $item->user_name ?>" <?php echo $item->id?'readonly':'' ?> placeholder="">
                            <label style="font-weight: normal;color:red" class="error-msg"></label>
                        </div>
                        <div class="form-group">
                            <label>密码</label>
                            <input name="pass" type="password" class="form-control check-null check-eq" value="" placeholder="">
                            <label style="font-weight: normal;color:red" class="error-msg"></label>
                        </div>
                        <div class="form-group">
                            <label>确认密码</label>
                            <input name="pass2" type="password" class="form-control check-null check-eq" value="" placeholder="">
                            <label style="font-weight: normal;color:red" class="error-msg"></label>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="submit" class="btn btn-primary" value="提交" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Modal Default</h4>
            </div>
            <div class="modal-body">
                <p class="modal-msg">One fine body…</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">确定</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
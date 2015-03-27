<?php
use app\assets\admin\EditAsset;
use app\assets\admin\DatePickerAsset;

EditAsset::register($this);
DatePickerAsset::register($this);
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <?php echo $item->id?'编辑':'添加' ?>日志
                </div>
                <form action="<?php echo $ajaxUrl ?>" method="post" rel="<?php echo $redirectUrl ?>">
                    <div class="box-body">
                        <input type="hidden" name="software_id" value="<?php echo $item->software_id?$item->software_id:$softwareId ?>" />
                        <input type="hidden" name="id" value="<?php echo $item->id ?>" />
                        <div class="form-group">
                            <label>时间</label>
                            <input name="date" type="text" class="form-control" id="datepicker" value="<?php echo $item->date ?>" readonly placeholder="">
                            <label style="font-weight: normal;color:red" class="error-msg"></label>
                        </div>
                        <div class="form-group">
                            <label>内容</label>
                            <textarea name="content" style="width: 100%;height:100px"><?php echo $item->content ?></textarea>
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
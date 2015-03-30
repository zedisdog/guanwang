<?php
use app\assets\admin\EditAsset;
use yii\helpers\Url;
use app\assets\admin\AjaxFileUploadAsset;

EditAsset::register($this);
AjaxFileUploadAsset::register($this);
?>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <?php echo $item->id?'编辑':'添加' ?>产品
                </div>
                <form action="<?php echo $ajaxUrl ?>" method="post" rel="<?php echo $redirectUrl ?>">
                    <div class="box-body">
                        <input type="hidden" name="id" value="<?php echo $item->id ?>" />
                        <div class="form-group">
                            <label>名称</label>
                            <input name="title" type="text" class="form-control" value="<?php echo $item->title ?>" placeholder="">
                            <label style="font-weight: normal;color:red" class="error-msg"></label>
                        </div>
                        <div class="form-group">
                            <label>类型</label>
                            <select name="type_id" class="form-control">
                                <option value="">-选择类型-</option>
                                <?php
                                foreach($types as $type){
                                    $select = $item->type_id==$type->id?'selected':'';
                                    echo '<option value="'.$type->id.'" '.$select.'>'.$type->title.'</option>';
                                }
                                ?>
                            </select>
                            <label style="font-weight: normal;color:red" class="error-msg"></label>
                        </div>
                        <div class="form-group upload-image">
                            <label>封面图</label>
                            <input class="upbutton" type="file" name="pic" id="pic1" rel="<?php echo Url::toRoute('software/ajax-up-load-image') ?>" />
                            <img id="img_pic1" src="<?php echo $item->image?$item->image:'/images/example_img.png' ?>" />
                            <input id="input_pic1" type="hidden" name="image" value="<?php echo $item->image ?>" />
                            <label style="font-weight: normal;color:red" class="error-msg"></label>
                        </div>
                        <div class="form-group">
                            <label>介绍</label>
                            <textarea id="content" name="content"><?php echo $item->content ?></textarea>
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
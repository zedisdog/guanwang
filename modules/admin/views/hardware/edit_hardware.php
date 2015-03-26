<?php
use app\assets\admin\EditAsset;
use yii\helpers\Url;

EditAsset::register($this);
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
                            <label>品牌</label>
                            <select id="select_gear" name="brand_id" class="form-control" rel="model_id">
                                <option value="">-选择品牌-</option>
                                <?php
                                foreach($brands as $brand){
                                    $select = $item->brand_id==$brand->id?'selected':'';
                                    echo '<option value="'.$brand->id.'" '.$select.'>'.$brand->title.'</option>';
                                }
                                ?>
                            </select>
                            <label style="font-weight: normal;color:red" class="error-msg"></label>
                        </div>
                        <div class="form-group" <?php echo $item->id?'style="display: block"':'style="display: none"' ?>>
                            <label>型号</label>
                            <select name="model_id" class="form-control" rel="<?php echo Url::toRoute('hardware/ajax-model-list') ?>">
                                <option value="">-选择型号-</option>
                                <?php
                                if($item->id){
                                    foreach($models as $model){
                                        $select = $item->model_id==$model->id?'selected':'';
                                        echo '<option value="'.$model->id.'" '.$select.'>'.$model->title.'</option>';
                                    }
                                }
                                ?>
                            </select>
                            <label style="font-weight: normal;color:red" class="error-msg"></label>
                        </div>
                        <div class="form-group">
                            <label>简介</label>
                            <textarea name="summary" style="width: 100%;height: 100px"><?php echo $item->summary ?></textarea>
                            <label style="font-weight: normal;color:red" class="error-msg"></label>
                        </div>
                        <div class="form-group">
                            <label>详情</label>
                            <textarea id="content" name="params"><?php echo $item->params ?></textarea>
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
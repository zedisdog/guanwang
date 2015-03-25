<?php
use app\assets\admin\EditAsset;
use yii\widgets\ActiveForm;

EditAsset::register($this);
?>
<section class="content">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <?php echo $item->id?'编辑':'添加' ?>文章
            </div>
            <div class="box-body">
                <form action="/admin/article/edit" method="post">
                    <input type="hidden" value="" />
                    <div class="form-group">
                        <label>标题</label>
                        <input name="title" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>来源</label>
                        <input name="source" type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>来源URL</label>
                        <input name="source_url" type="text" class="form-control" placeholder="">
                    </div>
                    <textarea id="content"></textarea>
                </form>
            </div>
        </div>
    </div>
</section>
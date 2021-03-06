<?php
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">品牌列表</h3>
                    <div class="box-tools">
                        <div style="display: inline-block;">
                            <select id="select-jump" class="form-control">
                                <option value="">-选择品牌-</option>
                                <?php
                                foreach($brands as $brand){
                                    $select = $brand->id==$brandId?'selected':'';
                                    echo '<option value="'.Url::toRoute(['brand-model/index','brandId'=>$brand->id]).'" '.$select.'>'.$brand->title.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <?php if($list){ ?>
                        <a href="<?php echo Url::toRoute(['brand-model/edit','brandId'=>$brandId]) ?>" class="btn btn-success btn-flat" style="color:#FFFFFF">添加</a>
                        <?php } ?>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>名称</th>
                            <th>操作</th>
                        </tr>
                        <?php
                        if($list){
                            foreach($list as $model){
                                echo '
                            <tr>
                                <td>'.$model->title.'</td>
                                <td>
                                    <a class="btn btn-social-icon btn-facebook" title="编辑" href="'.Url::toRoute(['brand-model/edit','brandId'=>$model->brand_id,'modelId'=>$model->id]).'"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-social-icon btn-danger del" title="删除" href="'.Url::toRoute(['brand-model/del','brandId'=>$model->brand_id,'modelId'=>$model->id]).'"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            ';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="box-footer clearfix">
                        <?php if($list){ ?>
                        <?php echo LinkPager::widget(['pagination' => $pager,'options'=>['class'=>'pagination pagination-sm no-margin pull-right']]); ?>
                        <?php } ?>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>
<div class="modal fade bs-example-modal-sm" id="delModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">系统提示</h4>
            </div>
            <div class="modal-body">
                <p>确定删除吗？</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left confirm-yes" data-dismiss="modal">确定</button>
                <button type="button" class="btn btn-primary confirm-no" data-dismiss="modal">取消</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
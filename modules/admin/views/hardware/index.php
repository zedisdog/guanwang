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
                    <h3 class="box-title">产品列表</h3>
                    <div class="box-tools">
                        <div style="display: inline-block;">
                            <select class="form-control select-jump">
                                <option value="<?php echo Url::toRoute(['hardware/index']) ?>">所有品牌</option>
                                <?php
                                foreach($brands as $brand){
                                    $select = $brand->id==$brandId?'selected':'';
                                    echo '<option value="'.Url::toRoute(['hardware/index','brandId'=>$brand->id,'modelId'=>$modelId]).'" '.$select.'>'.$brand->title.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <a href="<?php echo Url::toRoute('hardware/edit') ?>" class="btn btn-success btn-flat" style="color:#FFFFFF">添加</a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>标题</th>
                            <th>品牌</th>
                            <th>型号</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        <?php
                        foreach($hardwares as $hardware){
                            echo '
                            <tr>
                                <td>'.$hardware->title.'</td>
                                <td>'.$hardware->brand->title.'</td>
                                <td>'.$hardware->model->title.'</td>
                                <td>'.$hardware->create_time.'</td>
                                <td>'.$hardware->update_time.'</td>
                                <td>
                                    <a class="btn btn-social-icon btn-facebook" title="编辑" href="'.Url::toRoute(['hardware/edit','hardwareId'=>$hardware->id]).'"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-social-icon btn-danger del" title="删除" href="'.Url::toRoute(['hardware/del','hardwareId'=>$hardware->id]).'"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            ';
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="box-footer clearfix">
                        <?php echo LinkPager::widget(['pagination' => $pager,'options'=>['class'=>'pagination pagination-sm no-margin pull-right']]); ?>
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
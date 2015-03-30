<?php
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
                                <option value="<?php echo Url::toRoute('software/index') ?>">全部软件</option>
                                <?php
                                foreach($types as $type){
                                    $select = $type->id==$typeId?'selected':'';
                                    echo '<option value="'.Url::toRoute(['software/index','typeId'=>$type->id]).'" '.$select.'>'.$type->title.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <a href="<?php echo Url::toRoute('software/edit') ?>" class="btn btn-success btn-flat" style="color:#FFFFFF">添加</a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>标题</th>
                            <th>类型</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        <?php
                        foreach($softwares as $software){
                            echo '
                            <tr>
                                <td>'.$software->title.'</td>
                                <td>'.$software->type->title.'</td>
                                <td>'.$software->create_time.'</td>
                                <td>'.$software->update_time.'</td>
                                <td>
                                    <a class="btn btn-social-icon btn-facebook" title="编辑" href="'.Url::toRoute(['software/edit','softwareId'=>$software->id]).'"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-social-icon btn-danger del" title="删除" href="'.Url::toRoute(['software/del','softwareId'=>$software->id]).'"><i class="fa fa-times"></i></a>
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
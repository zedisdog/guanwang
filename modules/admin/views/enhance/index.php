<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">日志列表</h3>
                    <div class="box-tools">
                        <div style="display: inline-block;">
                            <select class="form-control select-jump">
                                <option value="">-选择产品-</option>
                                <?php
                                foreach($softwares as $software){
                                    $select = $software->id==$softwareId?'selected':'';
                                    echo '<option value="'.Url::toRoute(['enhance/index','softwareId'=>$software->id]).'" '.$select.'>'.$software->title.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <?php if($list){ ?>
                        <a href="<?php echo Url::toRoute(['enhance/edit','softwareId'=>$softwareId]) ?>" class="btn btn-success btn-flat" style="color:#FFFFFF">添加</a>
                        <?php } ?>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>时间</th>
                            <th>内容</th>
                            <th>操作</th>
                        </tr>
                        <?php
                        if($list){
                            foreach($list as $log){
                                echo '
                            <tr>
                                <td>'.$log->date.'</td>
                                <td>'.$log->content.'</td>
                                <td>
                                    <a class="btn btn-social-icon btn-facebook" title="编辑" href="'.Url::toRoute(['enhance/edit','softwareId'=>$softwareId,'logId'=>$log->id]).'"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-social-icon btn-danger del" title="删除" href="'.Url::toRoute(['enhance/del','softwareId'=>$softwareId,'logId'=>$log->id]).'"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            ';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="box-footer clearfix">
                        <?php echo $pager?LinkPager::widget(['pagination' => $pager,'options'=>['class'=>'pagination pagination-sm no-margin pull-right']]):''; ?>
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
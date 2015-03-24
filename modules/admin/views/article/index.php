<?php
use yii\helpers\StringHelper;
use yii\helpers\Url;
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">文章列表</h3>
                    <div class="box-tools">
                        <a href="<?php echo Url::toRoute('article/edit') ?>" class="btn btn-success btn-flat" style="color:#FFFFFF">添加</a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>标题</th>
                            <th>内容</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        <?php
                        foreach($articles as $article){
                            echo '
                            <tr>
                                <td>'.$article->title.'</td>
                                <td>'.StringHelper::truncate($article->content,20).'</td>
                                <td>'.$article->create_time.'</td>
                                <td>'.$article->update_time.'</td>
                                <td>
                                    <a class="btn btn-social-icon btn-facebook" title="编辑" href="'.Url::toRoute(['article/edit','articleId'=>$article->id]).'"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-social-icon btn-danger" title="删除" href="'.Url::toRoute(['article/del','articleId'=>$article->id]).'"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            ';
                        }
                        ?>
                        </tbody></table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>
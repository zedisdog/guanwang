<?php
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<div class="container pages_wrap">

    <div class="blog">
        <div class="container">


            <div class="ten columns offset-by-one">
                <?php
                if($softwares && count($softwares)>0){
                    foreach($softwares as $software){
                        echo '
                            <div class="post">
                                <a href="'. Url::toRoute(['software/detail','softwareId'=>$software->id]).'">
                                    <div class="post_image">
                                        <img src="'.$software->image.'" class="scale-with-grid" alt="">
                                    </div>
                                </a>
                                <div class="ten columns omega">
                                    <a href="'. Url::toRoute(['software/detail','softwareId'=>$software->id]).'"><p class="post_title">'.$software->title.'</p> </a>
                                    <p>'.StringHelper::truncate($software->content,100).'</p>
                                    <a href="'. Url::toRoute(['software/detail','softwareId'=>$software->id]).'"><div class="button">阅读更多</div></a>
                                    <a href="'. Url::toRoute(['software/enhance-list','softwareId'=>$software->id]).'"><div class="button">更新日志</div></a>
                                </div>
                            </div>
                            <div class="clear"></div>
                            <div class="div_line4"></div>
                        ';
                    }
                }else{
                    echo '<div class="post">没有相关内容</div><div class="clear"></div><div class="div_line4"></div>';
                }
                ?>
                <div class="page">
                    <?php echo $pager?LinkPager::widget(['pagination' => $pager]):''; ?>
                </div>
            </div> <!-- end ten columns -->


            <div class="four columns">
                <div class="sidebar">

                    <div class="tags">
                        <p class="sidebar_title">分类</p>
                        <?php
                        if($types && count($types)>0){
                            foreach($types as $type){
                                echo '<a href="'.Url::toRoute(['software/index','typeId'=>$type->id]).'" '.($typeId==$type->id?'class="active"':NULL).'>'.$type->title.'</a>';
                            }
                        }
                        ?>
                    </div> <!-- end tags -->

                </div> <!-- end sidebar -->
            </div> <!-- end four columns -->

        </div> <!-- end container -->
    </div> <!-- end blog -->
</div>
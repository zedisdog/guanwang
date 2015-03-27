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
                if($articles && count($articles)>0){
                    foreach($articles as $article){
                        echo '
                            <div class="post">
                                <div class="ten columns omega">
                                    <a href="'. Url::toRoute(['article/detail','articleId'=>$article->id]).'"><p class="post_title">'.$article->title.'</p> </a>
                                    <p>'.StringHelper::truncate($article->content,100).'</p>
                                    <a href="'. Url::toRoute(['article/detail','articleId'=>$article->id]).'"><div class="button">阅读更多</div></a>
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

            </div> <!-- end four columns -->

        </div> <!-- end container -->
    </div> <!-- end blog -->
</div>
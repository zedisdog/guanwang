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
                if($hardwares && count($hardwares)>0){
                    foreach($hardwares as $hardware){
                        echo '
                            <div class="post">
                                <div class="ten columns omega">
                                    <a href="'. Url::toRoute(['hardware/detail','hardwareId'=>$hardware->id]).'"><p class="post_title">'.$hardware->title.'</p> </a>
                                    <p>'.StringHelper::truncate($hardware->summary,100).'</p>
                                    <a href="'. Url::toRoute(['hardware/detail','hardwareId'=>$hardware->id]).'"><div class="button">阅读更多</div></a>
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
                        <p class="sidebar_title">品牌</p>
                        <?php
                        if($brands && count($brands)>0){
                            foreach($brands as $brand){
                                echo '<a href="'.Url::toRoute(['hardware/index','brandId'=>$brand->id]).'" '.($brandId==$brand->id?'class="active"':NULL).'>'.$brand->title.'</a>';
                            }
                        }
                        ?>
                    </div> <!-- end tags -->

                </div> <!-- end sidebar -->
            </div> <!-- end four columns -->

        </div> <!-- end container -->
    </div> <!-- end blog -->
</div>
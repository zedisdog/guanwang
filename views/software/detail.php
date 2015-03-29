<?php
use yii\helpers\Url;
?>
<div class="container pages_wrap">

    <div class="contact">
        <div class="container">
            <div class="fourteen columns offset-by-one">
                <h3><?php echo $item->title ?></h3>
                <p><a href="<?php echo Url::toRoute(['software/enhance-list','softwareId'=>$item->id]); ?>"><div class="button">更新日志</div></a></p>
            </div> <!-- end fourteen columns -->

            <div class="clear"></div>

            <div class="ten columns offset-by-one">
                <div class="contact">
                    <?php echo $item->content ?>
                </div> <!-- end contact_form -->
            </div> <!-- end eight columns -->

            <div class="four columns">
                <div class="sidebar">

                    <div class="tags">
                        <p class="sidebar_title">分类</p>
                        <?php
                        if($types && count($types)>0){
                            foreach($types as $type){
                                echo '<a href="'.Url::toRoute(['software/index','typeId'=>$type->id]).'">'.$type->title.'</a>';
                            }
                        }
                        ?>
                    </div> <!-- end tags -->

                </div> <!-- end sidebar -->
            </div> <!-- end six columns -->



        </div> <!-- end container -->
    </div> <!-- end contact -->
</div>
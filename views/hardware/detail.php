<?php
use yii\helpers\Url;
?>
<div class="container pages_wrap">

    <div class="contact">
        <div class="container">
            <div class="fourteen columns offset-by-one">
                <h3><?php echo $item->title ?></h3>
                <p><?php echo $item->summary ?></p>
            </div> <!-- end fourteen columns -->

            <div class="clear"></div>

            <div class="ten columns offset-by-one">
                <div class="contact">
                    <?php echo $item->params ?>
                </div> <!-- end contact_form -->
            </div> <!-- end eight columns -->

            <div class="four columns">
                <div class="sidebar">

                    <div class="tags">
                        <p class="sidebar_title">品牌</p>
                        <?php
                        if($brands && count($brands)>0){
                            foreach($brands as $brand){
                                echo '<a href="'.Url::toRoute(['hardware/index','brandId'=>$brand->id]).'">'.$brand->title.'</a>';
                            }
                        }
                        ?>
                    </div> <!-- end tags -->

                </div> <!-- end sidebar -->
            </div> <!-- end six columns -->



        </div> <!-- end container -->
    </div> <!-- end contact -->
</div>
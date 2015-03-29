<div class="container pages_wrap">
    <div class="about">
        <div class="container">
        <?php
        foreach($list as $k=>$v){
            if($k==0){
                echo '
                <div class="fourteen columns offset-by-one">
                    <h3>'.$v->date.'</h3>
                    <p>
                        '.$v->content.'
                    </p>
                    <div class="clear"></div>
                    <div class="div_line1"></div>
                    <div class="div_arrow1"></div>
                </div>
                ';
            }else{
                echo '
                <div class="team">
                    <div class="fourteen columns offset-by-one">
                        <h3>'.$v->date.'</h3>
                        <p>
                            '.$v->content.'
                        </p>
                        <div class="clear"></div>
                        <div class="div_line1"></div>
                        <div class="div_arrow1"></div>
                    </div>
                </div>
                ';
            }
        }
        ?>
        </div>
    </div>
</div>
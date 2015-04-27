<?php
use app\assets\IndexAsset;
use app\assets\FancyBoxAsset;
use yii\helpers\Url;

IndexAsset::register($this);
FancyBoxAsset::register($this);
?>

<!-- Primary Page Layout
================================================== -->

<div id="intro">

    <div class="bg0"></div>
    <div class="bg1"></div>
    <div class="bg2"></div>
    <div class="bg3"></div>
    <div class="bg4"></div>
    <div class="bg5"></div>
    <div class="bg6"></div>
    <div class="bg7"></div>

    <div class="container">
        <div class="sixteen columns">
            <div class="title" style="margin-top: 12%;">
                <h1 style="left:90%">BLUE</h1>

<!--                <h2>我们不做航母，只想做一个破冰船</h2>-->
            </div>
            <!-- end title -->
        </div>
        <!-- end sixteen columns -->
    </div>
    <!-- end container -->
</div>
<!-- end intro -->

<div class="container wrap">




    <div class="clear"></div>


    <div class="h_services">
        <div class="container">

            <div class="three columns offset-by-one">
                <h3>关于我们</h3>

                <p>四川蓝色港湾科技有限公司创立于1996年，公司总部设立于中国科技城绵阳市临园路东段78号。</p>
                <a href="<?php Url::toRoute('index/about') ?>">
                    <div class="button">更多</div>
                </a>
            </div>
            <!-- end  three columns -->

            <div class="ten columns offset-by-one">

                <div class="two columns alpha">
                    <img class="disp" src="/images/serv_icn1.png" alt=""/>
                </div>
                <!-- end two columns -->
                <div class="three columns omega h_serv">
                    <h4>Web Design</h4>

                    <p>Obi-Wan is here. The Force is with him. All right. Well, take care of yourself, Han.</p>
                </div>
                <!-- end three columns -->

                <div class="two columns alpha">
                    <img src="/images/serv_icn2.png" alt=""/>
                </div>
                <!-- end two columns -->
                <div class="three columns omega h_serv">
                    <h4>Development</h4>

                    <p>Obi-Wan is here. The Force is with him. All right. Well, take care of yourself, Han.</p>
                </div>
                <!-- end three columns -->

                <div class="clear"></div>

                <div class="two columns alpha">
                    <img src="/images/serv_icn3.png" alt=""/>
                </div>
                <!-- end two columns -->
                <div class="three columns omega h_serv">
                    <h4>Mobile</h4>

                    <p>Obi-Wan is here. The Force is with him. All right. Well, take care of yourself, Han.</p>
                </div>
                <!-- end three columns -->

                <div class="two columns alpha">
                    <img src="/images/serv_icn4.png" alt=""/>
                </div>
                <!-- end two columns -->
                <div class="three columns omega h_serv">
                    <h4>Wordpress</h4>

                    <p>Obi-Wan is here. The Force is with him. All right. Well, take care of yourself, Han.</p>
                </div>
                <!-- end three columns -->

            </div>
            <!-- end ten columns -->

        </div>
        <!-- end container -->
    </div>
    <!-- end services -->


    <div class="clear"></div>


    <div class="div_line1"></div>
    <div class="div_arrow1"></div>


    <div class="recent_work">
        <div class="container">
            <div class="three columns offset-by-one">
                <h3>软件产品</h3>

                <p>我们扎根在企业、医疗、教育、政府领域，深入业务层面，精耕细作，刻苦专研，做纯中国民族资本的软件企业。</p>
                <a href="<?php echo Url::toRoute('software/index') ?>">
                    <div class="button">软件产品列表</div>
                </a>
            </div>
            <!-- end four columns -->


            <div class="eleven columns">

                <div class="r_work1">
                    <a href="/images/example_img.png" class="single_image">
                        <div class="rw thumb"><img src="/images/thumb1.png" alt=""/></div>
                    </a>

                    <div class="caption">
                        <p class="rw_title">Project name</p>

                        <p class="rw_desc">HTML/CSS</p>
                    </div>
                    <!-- end caption -->
                </div>
                <!-- end r_work1 -->

                <div class="r_work2">
                    <a href="/images/example_img.png" class="single_image">
                        <div class="rw thumb"><img src="/images/thumb2.png" alt=""/></div>
                    </a>

                    <div class="caption">
                        <p class="rw_title">Project name</p>

                        <p class="rw_desc">HTML/CSS</p>
                    </div>
                    <!-- end caption -->
                </div>
                <!-- end r_work1 -->

                <div class="r_work3">
                    <a href="/images/example_img.png" class="single_image">
                        <div class="rw thumb"><img src="/images/thumb3.png" alt=""/></div>
                    </a>

                    <div class="caption">
                        <p class="rw_title">Project name</p>

                        <p class="rw_desc">HTML/CSS</p>
                    </div>
                    <!-- end caption -->
                </div>
                <!-- end r_work1 -->

            </div>
            <!-- end eleven columns -->

        </div>
        <!-- end container -->
    </div>
    <!-- end recent work -->


    <div class="clear"></div>


    <div class="div_line2"></div>
    <div class="div_arrow2"></div>


    <div class="latest_posts">
        <div class="container">

            <div class="three columns offset-by-one">
                <h3>硬件产品</h3>

                <p>取得联想电脑川北销售冠军、成为联想笔记本核心经销商、联想金牌服务店。</p>
                <a href="<?php echo Url::toRoute('hardware/index') ?>">
                    <div class="button">硬件产品列表</div>
                </a>
            </div>
            <!-- end four columns -->

            <div class="four columns">
                <a href="blog.html">
                    <div class="post_thumb1 thumb"></div>
                </a>

                <p class="t_post_title">Return of the Jedi</p>

                <p class="t_meta">17 May, 2012</p>

                <p class="t_post_text">It's not that I like the Empire, I hate it, but there's nothing I can do about it
                    right now?/p>
            </div>
            <!-- end four columns -->

            <div class="four columns">
                <a href="blog.html">
                    <div class="post_thumb1 thumb"></div>
                </a>

                <p class="t_post_title">Return of the Jedi</p>

                <p class="t_meta">17 May, 2012</p>

                <p class="t_post_text">It's not that I like the Empire, I hate it, but there's nothing I can do about it
                    right now?/p>
            </div>
            <!-- end four columns -->

            <div class="four columns">
                <a href="blog.html">
                    <div class="post_thumb1 thumb"></div>
                </a>

                <p class="t_post_title">Return of the Jedi</p>

                <p class="t_meta">17 May, 2012</p>

                <p class="t_post_text">It's not that I like the Empire, I hate it, but there's nothing I can do about it
                    right now?/p>
            </div>
            <!-- end four columns -->

        </div>
        <!-- end container -->
    </div>
    <!-- end latest_posts -->


    <div class="clear"></div>




</div>
<!-- end container wrap -->
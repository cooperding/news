<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo ($title); ?>-当真是，当真事？！</title>
        <meta name="keywords" content="<?php echo ($keywords); ?>" />
        <meta name="description" content="<?php echo ($description); ?>" />
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/v3.1.1/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/v3.1.1/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/css/alertify.css"/>
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/css/alertify.default.css"/>
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style); ?>/style/common.css"/>
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style); ?>/style/style.css"/>

    </head>
    <body>
        <div class="dogo-page">
            <header class="dogo-header">
                <div class="dogo-wp">
                    <div class="dogo-top">
                        <h1>matias gallipoli</h1>
                        <h2><a href="#lemon">互联网<span>/</span>物联网<span>/</span>移动互联网</a></h2>
                        <h4><span>©</span>2013 QiuYunTech</h4>
                        <h3>Qiu Yun Code</h3>
                    </div><!--dogo-top-->

                </div><!--dogo-wp-->
            </header>


            <section class="dogo-section dogo-black-bk">
                <div class="dogo-wp">
                    <div class="row">
                        <span class="col-md-12">
                            <h1 style="height: 55px;color: #fff;">QiuYunTech优秀站点</h1>
                        </span>
                    </div>
                    <div class="row">
                        <?php $_result=M('BlockList')->order("myorder asc")->limit(8)->where(" (`status`='20')  and (`sort_id` =4) ")->select(); if ($_result): $i=0;foreach($_result as $key=>$block):++$i;$mod = ($i % 2 );?><span class="col-md-3">

                                <div class="dogo-website">
                                    <div class="dogo-content dogo-radius">
                                        <img src="<?php echo ($block["title_img"]); ?>"/>
                                        <div class="dogo-mask dogo-mask-1">
                                            <a href="<?php echo ($block["field1"]); ?>" class=""><?php echo ($block["field2"]); ?></a>
                                        </div>
                                        <div class="dogo-mask dogo-mask-2">
                                            <a href="<?php echo ($block["url"]); ?>" target="_blank" class="btn dogo-tooltip btn-default" data-toggle="tooltip" data-placement="top" title="<?php echo ($block["description"]); ?>" data-original-title="<?php echo ($block["description"]); ?>"><?php echo ($block["field3"]); ?> >></a>
                                        </div>
                                    </div><!--dogo-content-->
                                </div><!--dogo-website-->
                            </span><?php endforeach; endif;?>
                        
                    </div>
                </div><!--dogo-wp-->
            </section><!--dogo-section-->


            <section class="dogo-section dogo-lemon">
                <div class="dogo-wp">
                    <div class="row">

                    </div>
                </div><!--dogo-wp-->
            </section><!--dogo-section-->

            <section class="dogo-section dogo-orange">
                <div class="dogo-wp">
                    <div class="row">

                    </div>
                </div><!--dogo-wp-->
            </section><!--dogo-section-->


            <section class="dogo-section dogo-gray">
                <div class="dogo-wp">

                </div><!--dogo-wp-->
            </section><!--dogo-section-->

            <section class="dogo-section dogo-purple">
                <div class="dogo-wp">
                    <div class="row">

                    </div>
                </div><!--dogo-wp-->
            </section><!--dogo-section-->


            <section class="dogo-section dogo-light-green">
                <div class="dogo-wp">

                </div><!--dogo-wp-->
            </section><!--dogo-section-->


            <section class="dogo-section dogo-blue">
                <div class="dogo-wp">

                </div><!--dogo-wp-->
            </section><!--dogo-section-->








<footer class="dogo-footer dogo-light-green">
    <div class="dogo-wp">
        <p></p>
    </div><!--dogo-wp-->
</footer><!--dogo-footer-->

<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/v3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/js/alertify.min.js"></script>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/js/jquery.cookie.js"></script>



</div><!--dogo-page-->

</body>
</html>
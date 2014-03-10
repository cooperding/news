<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo ($title); ?>-当真是，当真事？！</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="<?php echo ($keywords); ?>" />
        <meta name="description" content="<?php echo ($description); ?>" />
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/v3.1.1/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/v3.1.1/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/css/alertify.css"/>
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/css/alertify.default.css"/>
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/css/jquery.bxslider.css"/>
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style); ?>/style/common.css"/>
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style); ?>/style/index.css"/>
    </head>
    <body>
        <div class="dogo-page ">
            <section class="dogo-section dogo-rgba-light-green">
                <div class="container">
                    <div class="dogo-home-top">
                        <h1>{ / }</h1>
                        <h2>站长先生</h2>
                        <div class="dogo-blank"></div>
                        <div class="dogo-blank"></div>
                        <div class="dogo-blank"></div>
                        <div class="dogo-blank"></div>
                        <h4><a href="#lemon">互联网</a><span>/</span>
                            <a href="#lemon">物联网</a><span>/</span>
                            <a href="#lemon">移动互联网</a></h4>
                        <h4><span>©</span>2013-2014 秋允技术 QiuYunTech.com</h4>
                        <h3>Qiu Yun Code</h3>
                    </div>
                </div><!--container-->
            </section>

            <section class="dogo-section dogo-rgba-blue">
                <div class="container">
                    <div class="row dogo-index-row">
                        <?php $_result=M('BlockList')->order("myorder asc")->limit(12)->where(" (`status`='20')  and (`sort_id` =4) ")->select(); if ($_result): $i=0;foreach($_result as $key=>$block):++$i;$mod = ($i % 2 );?><div class="col-md-2 dogo-pd0">
                                <div class="dogo-index-thumb">
                                    <div class="dogo-thumb-pic"><img src="<?php echo ($block["title_img"]); ?>" class="img-responsive"/></div>
                                    <div class="dogo-thumb-title">
                                        <h4 class="dogo-align-center"><a href="<?php echo ($block["url"]); ?>"><?php echo ($block["title"]); ?></a></h4>
                                        <p><?php echo ($block["description"]); ?></p>
                                        <span class="dogo-align-center">
                                            <a id="section6Btn" href="#section6">查看信息>></a></span>
                                    </div>
                                </div>
                            </div><!--col-md--><?php endforeach; endif;?>
                    </div><!--row-->
                </div><!--container-->
            </section>


            <section class="dogo-section dogo-rgba-gray">
                <div class="container">

                    <div class="dogo-box dogo-test">
                        <div class="dogo-box-header"></div>
                        <div class="dogo-box-content">
                            <div class="row">
                                <div class="col-md-4 dogo-te">
                                    <div>
                                        <ul class="bxslider">
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492291.png" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492308.jpg" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492427.jpg" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492355.jpg" title="Funky roots"/></li>
                                        </ul>
                                    </div>
                                    <div class="dogo-text">
                                        <ul class="dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="col-md-5">

                                    <div class="dogo-text">
                                        <div class="dogo-text-header">
                                            <h3><a href="">酷站欣赏提供最新韩国酷站展示,欧美酷站、中国酷站展示及发布</a></h3>
                                            <p>酷站欣赏频道是一个收集了大量韩国、欧美及国内众多优秀设计的网站截图及网址欣赏频道，
                                                为广大网站设计爱好者提供优秀网站作品参考借鉴。</p>
                                        </div>

                                        <ul class=" dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                        </ul>


                                    </div><!--//dogo-text-->
                                </div>
                                <div class="col-md-3">
                                    <div class="dogo-text">
                                        <div class="dogo-text-header">
                                            <h3><a href="">CSS3</a></h3>
                                        </div>
                                        <ul class="dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                        </ul>
                                    </div><!--//dogo-text-->
                                </div>
                            </div>
                        </div><!--//dogo-box-content-->
                        <div class="dogo-box-footer"></div>
                    </div><!--dogo-box-->

                </div><!--container-->
            </section>




            <section class="dogo-section dogo-rgba-blue">
                <div class="container">

                    <div class="dogo-box dogo-test">
                        <div class="dogo-box-header"></div>
                        <div class="dogo-box-content">
                            <div class="row">
                                <div class="col-md-4 dogo-te">
                                    <div>
                                        <ul class="bxslider">
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492291.png" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492308.jpg" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492427.jpg" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492355.jpg" title="Funky roots"/></li>
                                        </ul>
                                    </div>
                                    <div class="dogo-text">
                                        <ul class="dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="col-md-5">

                                    <div class="dogo-text">
                                        <div class="dogo-text-header">
                                            <h3><a href="">酷站欣赏提供最新韩国酷站展示,欧美酷站、中国酷站展示及发布</a></h3>
                                            <p>酷站欣赏频道是一个收集了大量韩国、欧美及国内众多优秀设计的网站截图及网址欣赏频道，
                                                为广大网站设计爱好者提供优秀网站作品参考借鉴。</p>
                                        </div>

                                        <ul class=" dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                        </ul>


                                    </div><!--//dogo-text-->
                                </div>
                                <div class="col-md-3">
                                    <div class="dogo-text">
                                        <div class="dogo-text-header">
                                            <h3><a href="">CSS3</a></h3>
                                        </div>
                                        <ul class="dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                        </ul>
                                    </div><!--//dogo-text-->
                                </div>
                            </div>
                        </div><!--//dogo-box-content-->
                        <div class="dogo-box-footer"></div>
                    </div><!--dogo-box-->

                </div><!--container-->
            </section>

            <section class="dogo-section dogo-pink">
                <div class="container">
                    <div class="dogo-box dogo-test">
                        <div class="dogo-box-header"></div>
                        <div class="dogo-box-content">
                            <div class="row">
                                <div class="col-md-4 dogo-te">
                                    <div>
                                        <ul class="bxslider">
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492291.png" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492308.jpg" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492427.jpg" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492355.jpg" title="Funky roots"/></li>
                                        </ul>
                                    </div>
                                    <div class="dogo-text">
                                        <ul class="dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="col-md-5">

                                    <div class="dogo-text">
                                        <div class="dogo-text-header">
                                            <h3><a href="">酷站欣赏提供最新韩国酷站展示,欧美酷站、中国酷站展示及发布</a></h3>
                                            <p>酷站欣赏频道是一个收集了大量韩国、欧美及国内众多优秀设计的网站截图及网址欣赏频道，
                                                为广大网站设计爱好者提供优秀网站作品参考借鉴。</p>
                                        </div>

                                        <ul class=" dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                        </ul>


                                    </div><!--//dogo-text-->
                                </div>
                                <div class="col-md-3">
                                    <div class="dogo-text">
                                        <div class="dogo-text-header">
                                            <h3><a href="">CSS3</a></h3>
                                        </div>
                                        <ul class="dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                        </ul>
                                    </div><!--//dogo-text-->
                                </div>
                            </div>
                        </div><!--//dogo-box-content-->
                        <div class="dogo-box-footer"></div>
                    </div><!--dogo-box-->

                </div><!--container-->
            </section>


            <section class="dogo-section dogo-rgba-lemon" id="section6">
                <div class="container">
                    <div class="dogo-box dogo-test">
                        <div class="dogo-box-header"></div>
                        <div class="dogo-box-content">
                            <div class="row">
                                <div class="col-md-4 dogo-te">
                                    <div>
                                        <ul class="bxslider">
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492291.png" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492308.jpg" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492427.jpg" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492355.jpg" title="Funky roots"/></li>
                                        </ul>
                                    </div>
                                    <div class="dogo-text">
                                        <div class="dogo-text-header">
                                            <h3><a href="">CSS3</a></h3>
                                        </div>
                                        <ul class="dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="col-md-5">

                                    <div class="dogo-text">
                                        <div class="dogo-text-header">
                                            <h3><a href="">酷站欣赏提供最新韩国酷站展示,欧美酷站、中国酷站展示及发布</a></h3>
                                            <p>酷站欣赏频道是一个收集了大量韩国、欧美及国内众多优秀设计的网站截图及网址欣赏频道，
                                                为广大网站设计爱好者提供优秀网站作品参考借鉴。</p>
                                        </div>

                                        <ul class=" dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                        </ul>


                                    </div><!--//dogo-text-->
                                </div>
                                <div class="col-md-3">
                                    <div class="dogo-text">
                                        <div class="dogo-text-header">
                                            <h3><a href="">CSS3</a></h3>
                                        </div>
                                        <ul class="dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                        </ul>
                                    </div><!--//dogo-text-->
                                </div>
                            </div>
                        </div><!--//dogo-box-content-->
                        <div class="dogo-box-footer"></div>
                    </div><!--dogo-box-->

                </div><!--container-->
            </section>


            <section class="dogo-section dogo-rgba-purple">
                <div class="container">
                    <div class="dogo-box dogo-test">
                        <div class="dogo-box-header"></div>
                        <div class="dogo-box-content">
                            <div class="row">
                                <div class="col-md-4 dogo-te">
                                    <div>
                                        <ul class="bxslider">
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492291.png" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492308.jpg" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492427.jpg" title="Funky roots"/></li>
                                            <li><img src="http://localhost/dogocms/Public/Uploads/Images/20131103/1383492355.jpg" title="Funky roots"/></li>
                                        </ul>
                                    </div>
                                    <div class="dogo-text">
                                        <div class="dogo-text-header">
                                            <h3><a href="">CSS3</a></h3>
                                        </div>
                                        <ul class="dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="col-md-5">

                                    <div class="dogo-text">
                                        <div class="dogo-text-header">
                                            <h3><a href="">酷站欣赏提供最新韩国酷站展示,欧美酷站、中国酷站展示及发布</a></h3>
                                            <p>酷站欣赏频道是一个收集了大量韩国、欧美及国内众多优秀设计的网站截图及网址欣赏频道，
                                                为广大网站设计爱好者提供优秀网站作品参考借鉴。</p>
                                        </div>

                                        <ul class=" dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                        </ul>


                                    </div><!--//dogo-text-->
                                </div>
                                <div class="col-md-3">
                                    <div class="dogo-text">
                                        <div class="dogo-text-header">
                                            <h3><a href="">CSS3</a></h3>
                                        </div>
                                        <ul class="dogo-text-onelines">
                                            <li><a href="#">一步一步学android之控件篇——ListView自定义显示数据格式</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ListView基本使用</a></li>
                                            <li><a href="#">一步一步学android之控件篇——ScrollView</a></li>
                                            <li><a href="#">一步一步学android之事件篇——触摸事件</a></li>
                                        </ul>
                                    </div><!--//dogo-text-->
                                </div>
                            </div>
                        </div><!--//dogo-box-content-->
                        <div class="dogo-box-footer"></div>
                    </div><!--dogo-box-->

                </div><!--container-->
            </section>


            <section class="dogo-section dogo-rgba-gray">
                <div class="container">
                    <div class="row dogo-index-row">
                        <div class="col-md-12 dogo-pd0">
                            <div class="dogo-text">
                                <div class="dogo-text-header">
                                    <h3>友情链接</h3>
                                </div>

                                <div class="dogo-text-links">
                                    <?php $_result=M('Links')->limit(0,10)->where(" (`status`='20') ")->select(); if ($_result): $i=0;foreach($_result as $key=>$links):++$i;$mod = ($i % 2 );?><a href="<?php echo ($links["weburl"]); ?>" target="_blank" title="<?php echo ($links["webname"]); ?>"><?php echo ($links["webname"]); ?></a>
                                        <a href="<?php echo ($links["weburl"]); ?>" target="_blank" title="<?php echo ($links["webname"]); ?>"><?php echo ($links["webname"]); ?></a>
                                        <a href="<?php echo ($links["weburl"]); ?>" target="_blank" title="<?php echo ($links["webname"]); ?>"><?php echo ($links["webname"]); ?></a>
                                        <a href="<?php echo ($links["weburl"]); ?>" target="_blank" title="<?php echo ($links["webname"]); ?>"><?php echo ($links["webname"]); ?></a>
                                        <a href="<?php echo ($links["weburl"]); ?>" target="_blank" title="<?php echo ($links["webname"]); ?>"><?php echo ($links["webname"]); ?></a>
                                        <a href="<?php echo ($links["weburl"]); ?>" target="_blank" title="<?php echo ($links["webname"]); ?>"><?php echo ($links["webname"]); ?></a>
                                        <a href="<?php echo ($links["weburl"]); ?>" target="_blank" title="<?php echo ($links["webname"]); ?>"><?php echo ($links["webname"]); ?></a>
                                        <a href="<?php echo ($links["weburl"]); ?>" target="_blank" title="<?php echo ($links["webname"]); ?>"><?php echo ($links["webname"]); ?></a>
                                        <a href="<?php echo ($links["weburl"]); ?>" target="_blank" title="<?php echo ($links["webname"]); ?>"><?php echo ($links["webname"]); ?></a>
                                        <a href="<?php echo ($links["weburl"]); ?>" target="_blank" title="<?php echo ($links["webname"]); ?>"><?php echo ($links["webname"]); ?></a>
                                        <a href="<?php echo ($links["weburl"]); ?>" target="_blank" title="<?php echo ($links["webname"]); ?>"><?php echo ($links["webname"]); ?></a>
                                        <a href="<?php echo ($links["weburl"]); ?>" target="_blank" title="<?php echo ($links["webname"]); ?>"><?php echo ($links["webname"]); ?></a><?php endforeach; endif;?>
                                </div>
                            </div><!--//dogo-text-->
                        </div><!--col-md-->

                    </div><!--row-->
                </div><!--container-->
            </section>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    </div><!--col-md-->
                </div><!--row-->
                <footer class="dogo-footer">
    <div class="dogo-blank"></div>





    <div class="row">
        <div class="col-md-12 dogo-align-center">
            <p></p>
        </div><!--col-md-->
    </div><!--row-->
</footer>

<!-- Modal Login-->
<div class="modal fade dogo-dialog-modal dogo-dialog-login" tabindex="-1" role="dialog" aria-labelledby="dialog_emailauth" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header dogo-modal-title">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title "><span class="on">登录</span> <span class="dogo-click-signup cursor noon">注册</span></h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group">
                    <label for="inputLoginEmail" class="col-sm-3 control-label input-lg">邮箱：</label>
                    <div class="col-sm-9">
                        <input type="text" name="emailLogin" class="form-control input-lg" id="inputLoginEmail" placeholder="输入绑定的邮箱">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputLoginPwd" class="col-sm-3 control-label input-lg">密码：</label>
                    <div class="col-sm-9">
                        <input type="password" name="pwdLogin" class="form-control input-lg" id="inputLoginPwd" placeholder="密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputLoginYzm" class="col-sm-3 control-label input-lg">验证码：</label>
                    <div class="col-sm-5">
                        <input type="text" name="yzmLogin" class="form-control input-lg" id="inputLoginYzm" placeholder="验证码">
                    </div>
                    <div class="col-sm-4">
                        <span class="dogo-click-yzmurl cursor"><img class="" src="<?php echo U('User/Passport/verify');?>" title="看不清？点击更换另一个验证码。"/>换一张</span>
                    </div>
                </div>


            </div><!--modal-body-->
            <div class="modal-footer">

                <button type="button" class="btn btn-info dogo-click-sublogin" >提交登录</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 






<!-- Modal -->
<div class="modal fade dogo-dialog-modal dogo-dialog-signup" tabindex="-1" role="dialog" aria-labelledby="dialog_emailauth" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header dogo-modal-title">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span class="on">注册</span><span class="dogo-click-login cursor noon">登录</span> </h4>
            </div>
            <div class="modal-body form-horizontal">
                <div class="form-group">
                    <label for="inputSignupUsername" class="col-sm-3 control-label input-lg">用户名：</label>
                    <div class="col-sm-9">
                        <input type="text" name="usernameSignup" class="form-control input-lg" id="inputSignupUsername" placeholder="用户名">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSignupEmail" class="col-sm-3 control-label input-lg">邮箱：</label>
                    <div class="col-sm-9">
                        <input type="text" name="emailSignup" class="form-control input-lg" id="inputSignupEmail" placeholder="邮箱">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSignupPwd" class="col-sm-3 control-label input-lg">密码：</label>
                    <div class="col-sm-9">
                        <input type="password" name="pwdSignup" class="form-control input-lg" id="inputSignupPwd" placeholder="密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSignupPwd2" class="col-sm-3 control-label input-lg">确认密码：</label>
                    <div class="col-sm-9">
                        <input type="password" name="pwd2Signup" class="form-control input-lg" id="inputSignupPwd2" placeholder="确认密码">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSignupYzm" class="col-sm-3 control-label input-lg">验证码：</label>
                    <div class="col-sm-5">
                        <input type="text" name="yzmSignup" class="form-control input-lg" id="inputSignupYzm" placeholder="验证码">
                    </div>
                    <div class="col-sm-4">
                        <span class="dogo-click-yzmurl cursor"><img class="" src="<?php echo U('User/Passport/verify');?>" title="看不清？点击更换另一个验证码。"/>换一张</span>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info dogo-click-subsignup">提交注册</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 








<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/v3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/js/alertify.min.js"></script>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/js/scrolld.min.js"></script>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/js/jquery.bxslider.min.js"></script>
<script type="text/javascript">$("[id*='Btn']").stop(true).on('click', function(e) {
        e.preventDefault();
        $(this).scrolld();
    })</script>
<script>
    $(function() {
        $('.bxslider').bxSlider({
            mode: 'fade',
            captions: true,
            auto: true
        });
        $('.dogo-click-sublogin').click(function() {
            var email = $('input[name="emailLogin"]').val();
            var pwd = $('input[name="pwdLogin"]').val();
            var yzm = $('input[name="yzmLogin"]').val();
            var url = "<?php echo U('User/Passport/checkLogin');?>";
            var type = '10';
            //Alertify.dialog.alert(email);
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: {email: email, pwd: pwd, v_code: yzm, type: type},
                success: function(data) {
                    if (data.status == 0) {
                        setTimeout("$('.dogo-dialog-login').modal('hide')", 2000);
                        Alertify.log.success(data.msg, 3000);
                    } else if (data.status == 1) {
                        Alertify.log.error(data.msg, 3000);
                    }
                }//success
            });
        });
        $('.dogo-click-subsignup').click(function() {
            var name = $('input[name="usernameSignup"]').val();
            var email = $('input[name="emailSignup"]').val();
            var pwd = $('input[name="pwdSignup"]').val();
            var pwd2 = $('input[name="pwd2Signup"]').val();
            var yzm = $('input[name="yzmSignup"]').val();
            var url = "<?php echo U('User/Passport/register');?>";
            var type = '10';
            //Alertify.dialog.alert(email);
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: {uname: name, email: email, pwd: pwd, pwd2: pwd2, v_code: yzm, type: type},
                success: function(data) {
                    if (data.status == 0) {
                        setTimeout("$('.dogo-dialog-signup').modal('hide')", 2000);
                        setTimeout("$('.dogo-dialog-login').modal('show')", 2000);
                        Alertify.log.success(data.msg, 3000);
                    } else if (data.status == 1) {
                        Alertify.log.error(data.msg, 3000);
                    }
                }//success
            });
        });
        $('.dogo-click-logout').click(function() {
            var url = "<?php echo U('User/Passport/logout');?>";
            var type = '10';
            //Alertify.dialog.alert(email);
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: {type: type},
                success: function(data) {
                    if (data.status == 0) {
                        Alertify.log.success(data.msg, 3000);
                    } else if (data.status == 1) {
                        Alertify.log.error(data.msg, 3000);
                    }
                }//success
            });
        });
        $('.dogo-click-yzmurl').click(function() {
            var url = "<?php echo U('User/Passport/verify');?>?tm=" + Math.random();
            $('.dogo-click-yzmurl img').attr('src', url);
        });
        $('.dogo-click-login').click(function() {
            $('.dogo-dialog-login').modal('show');
            $('.dogo-dialog-signup').modal('hide');
        });
        $('.dogo-click-signup').click(function() {
            $('.dogo-dialog-login').modal('hide');
            $('.dogo-dialog-signup').modal('show');
        });
        $('.dogo-click-up').each(function() {
            var row_id = $(this).attr('data-row-id');
            var cookieid = $.cookie('row_id_' + row_id);
            if (cookieid == row_id) {
                $('.disabled_' + row_id).addClass('disabled');
            }
        });
        $('.dogo-box-content img').each(function() {
            $(this).addClass('img-responsive');
        });
        $('.dogo-click-up').click(function() {
            var row_id = $(this).attr('data-row-id');
            var url = "<?php echo U('Home/Ajax/vote');?>";
            var type = '10';
            var cookieid = $.cookie('row_id_' + row_id);
            if (cookieid == row_id) {
                alert('您已赞过该信息！');
                return false;
            }
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: {key_id: row_id, type: type},
                success: function(data) {
                    if (data.status == 0) {
                        $('.num_up_' + row_id).text(data.num);
                        $('.disabled_' + row_id).addClass('disabled');
                        $.cookie('row_id_' + row_id, row_id, {expires: 1});
                        Alertify.log.success("成功赞了一下", 3000);
                    } else if (data.status == 1) {
                        Alertify.log.error(data.msg, 3000);
                    } else if (data.status == 3) {
                        $('.dogo-dialog-login').modal('show');
                        Alertify.log.error(data.msg, 3000);
                    }
                }//success
            });
        });
        $('.dogo-click-down').click(function() {
            var row_id = $(this).attr('data-row-id');
            var url = "<?php echo U('Home/Ajax/vote');?>";
            var type = '11';
            var cookieid = $.cookie('row_id_' + row_id);
            if (cookieid == row_id) {
                alert('您已踩过该信息！');
                return false;
            }
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: {key_id: row_id, type: type},
                success: function(data) {
                    if (data.status == 0) {
                        $('.num_down_' + row_id).text(data.num);
                        $('.disabled_' + row_id).addClass('disabled');
                        $.cookie(row_id, row_id, {expires: 1});
                        Alertify.log.success(data.msg, 3000);
                    } else if (data.status == 1) {
                        Alertify.log.error(data.msg, 3000);
                    } else if (data.status == 3) {
                        $('.dogo-dialog-login').modal('show');
                        Alertify.log.error(data.msg, 3000);
                    }
                }//success
            });
        });
    });
</script>
            </div><!--container-->
        </div><!--dogo-page-->

    </body>
</html>
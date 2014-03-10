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
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style); ?>/style/common.css"/>
        <link rel="stylesheet" type="text/css" href="/qiuyun/dogocms32/Public<?php echo ($style); ?>/style/style.css"/>
    </head>
    <body>
        <div class="dogo-page ">
            <div class="container">
                <header class="dogo-header">
                    <nav class="navbar navbar-default navbar-static" role="navigation">
                        <div class="navbar-header">
                            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-js-navbar-collapse">
                                <span class="sr-only"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo U('Home/Index/index');?>">当真是，当真事？！</a>
                        </div>
                        <div class="collapse navbar-collapse bs-js-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <?php if(is_array($navhead)): $i = 0; $__LIST__ = $navhead;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$navlist): $mod = ($i % 2 );++$i;?><li class="dropdown">
                                    <?php if($navlist["children"] == ''): ?><a id="" href="/qiuyun/dogocms32<?php echo ($navlist["url"]); ?>" role="button" class="dropdown-toggle" data-toggle=""><?php echo ($navlist["text"]); ?> </a>
                                        <?php else: ?>
                                        <a id="" href="/qiuyun/dogocms32<?php echo ($navlist["url"]); ?>" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo ($navlist["text"]); ?> <b class="caret"></b></a><?php endif; ?>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="">
                                        <?php if(is_array($navlist["children"])): $i = 0; $__LIST__ = $navlist["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li role="presentation"><a role="menuitem" href="/qiuyun/dogocms32<?php echo ($vo["url"]); ?>"><?php echo ($vo["text"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <!--<li role="presentation" class="divider"></li>-->
                                    </ul>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li id="fat-menu" class="dropdown">
                                    <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">会员中心<b class="caret"></b></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                                        <?php if(session('LOGIN_M_STATUS')=='TRUE'){ ?>
                                        <li><a role="menuitem" href="<?php echo U('User/Index/index');?>"> <span class="glyphicon glyphicon-home"></span> 我的主页</a></li>
                                        <li><a role="menuitem" href="<?php echo U('User/Index/changePwd');?>"> <span class="glyphicon glyphicon-edit"></span> 修改密码</a></li>
                                        <li class="divider"></li>
                                        <li><a role="menuitem" href="<?php echo U('User/Passport/logout');?>"> <span class="glyphicon glyphicon-log-out"></span> 退出登录</a></li>
                                        <?php }else{ ?>
                                        <li><a role="menuitem" href="<?php echo U('User/Passport/login');?>" title="登录"> <span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
                                        <li><a role="menuitem" href="<?php echo U('User/Passport/signup');?>" title="注册"><span class="glyphicon glyphicon-plus-sign"></span>注册</a></li>
                                        <li><a role="menuitem" href="<?php echo U('User/Passport/resetPassword');?>"> <span class="glyphicon glyphicon-question-sign"></span> 忘记密码</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.nav-collapse -->
                    </nav>
                </header>






<div class="row">
    <div class="col-md-3">

        <div class="dogo-sidebar">
            <div class="list-group">
    <a href="javascript:void(0)" class="list-group-item dogo-nav-header">个人中心</a>
    <a href="<?php echo U('User/Index/index');?>" class="list-group-item <?php if(($sidebar_active) == "index"): ?>active<?php endif; ?>">我的主页</a>
    <a href="<?php echo U('User/Index/personal');?>" class="list-group-item <?php if(($sidebar_active) == "personal"): ?>active<?php endif; ?>">个人资料</a>
    <a href="<?php echo U('User/Index/email');?>" class="list-group-item <?php if(($sidebar_active) == "email"): ?>active<?php endif; ?>">邮箱修改</a>
    <a href="<?php echo U('User/Index/changePwd');?>" class="list-group-item <?php if(($sidebar_active) == "changepwd"): ?>active<?php endif; ?>">修改密码</a>
    <a href="javascript:void(0)" class="list-group-item dogo-nav-header">信息管理</a>
    <a href="<?php echo U('User/Index/newsAdd');?>" class="list-group-item <?php if(($sidebar_active) == "news_add"): ?>active<?php endif; ?>">说说当真SHI</a>
    <a href="<?php echo U('User/Index/newsList');?>" class="list-group-item <?php if(($sidebar_active) == "news_list"): ?>active<?php endif; ?>">我的当SHI<span class="badge"><?php echo ($count_newslist); ?></span></a>
    <!--
    <a href="javascript:void(0)" class="list-group-item dogo-nav-header">商务中心</a>
    <a href="<?php echo U('');?>" class="list-group-item <?php if(($sidebar_active) == ""): ?>active<?php endif; ?>">我的订单<span class="badge">20</span></a>
    <a href="<?php echo U('User/Index/addressList');?>" class="list-group-item <?php if(($sidebar_active) == "address"): ?>active<?php endif; ?>">收货地址<span class="badge"><?php echo ($count_address); ?></span></a>
    <a href="javascript:void(0)" class="list-group-item dogo-nav-header">消息管理</a>
    <a href="<?php echo U('');?>" class="list-group-item <?php if(($sidebar_active) == ""): ?>active<?php endif; ?>">我的留言<span class="badge">9999</span></a>
    <a href="<?php echo U('');?>" class="list-group-item <?php if(($sidebar_active) == ""): ?>active<?php endif; ?>">我的消息<span class="badge">42</span></a>
    <a href="javascript:void(0)" class="list-group-item dogo-nav-header">扩展管理</a>
    <a href="<?php echo U('User/Index/apiList');?>" class="list-group-item <?php if(($sidebar_active) == "apilist"): ?>active<?php endif; ?>">api接口<span class="badge"><?php echo ($count_apilist); ?></span></a>
    -->
    <a href="<?php echo U('User/Passport/logout');?>" class="list-group-item">退出登录</a>
</div>
        </div><!--dogo-sidebar-->
    </div><!--col-md-->
    <div class="col-md-9">
        <div class="dogo-member">
            <h4>修改密码</h4>
            <div class="dogo-blank"></div>
            <form class="form-horizontal" role="form" action="<?php echo U('User/Index/doChangePwd');?>" method="post">

                <div class="form-group">
                    <label for="oldpwd" class="col-sm-2 control-label input-lg">原密码：</label>
                    <div class="col-sm-10">
                        <input type="password" name="oldpwd" class="form-control input-lg" id="oldpwd" placeholder="原密码" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="newpwd" class="col-sm-2 control-label input-lg">新密码：</label>
                    <div class="col-sm-10">
                        <input type="password" name="newpwd" class="form-control input-lg" id="newpwd" placeholder="新密码" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="newpwd2" class="col-sm-2 control-label input-lg">确认密码：</label>
                    <div class="col-sm-10">
                        <input type="password" name="newpwd2" class="form-control input-lg" id="newpwd2" placeholder="确认新密码" required="required">
                    </div>
                </div>
                <button type="submit" class="btn btn-default col-lg-12 btn-lg dogo-color-white">提交</button>
            </form>
        </div><!--dogo-member-->




    </div><!--col-md-->
</div><!--row-->
<footer class="dogo-footer">
    <div class="dogo-blank"></div>

    <div class="row">
        <div class="col-md-12 dogo-align-center">
            <p><script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?8be1ef41ce5609208547993b220b71d8";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</p>
        </div><!--col-md-->
    </div><!--row-->
</footer>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/v3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/js/alertify.min.js"></script>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/js/jquery.cookie.js"></script>

<script>
    $(function() {
        $('.dogo-box-content img').each(function() {
            $(this).addClass('img-responsive');
        });
    });
</script>
</div><!--container-->
</div><!--dogo-page-->

</body>
</html>
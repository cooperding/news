<?php if (!defined('THINK_PATH')) exit(); echo ($header); ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo ($title); ?>-</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="<?php echo ($keywords); ?>" />
        <meta name="description" content="<?php echo ($description); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo ($style_cmomon); ?>/v3.1.0/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo ($style_cmomon); ?>/v3.1.0/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo ($style_cmomon); ?>/css/alertify.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo ($style_cmomon); ?>/css/alertify.default.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo ($style); ?>/style/common.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo ($style); ?>/style/style.css"/>
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
                            <a class="navbar-brand" href="/qiuyun/dogocms32"></a>
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
                                        <li><a role="menuitem" href="<?php echo U('Member/Index/index');?>"> <span class="glyphicon glyphicon-home"></span> 我的主页</a></li>
                                        <li><a role="menuitem" href="<?php echo U('Member/Index/changePwd');?>"> <span class="glyphicon glyphicon-edit"></span> 修改密码</a></li>
                                        <li class="divider"></li>
                                        <li><a role="menuitem" href="<?php echo U('Member/Passport/logout');?>"> <span class="glyphicon glyphicon-log-out"></span> 退出登录</a></li>
                                        <?php }else{ ?>
                                        <li><a role="menuitem" href="<?php echo U('Member/Passport/login');?>" title="登录"> <span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
                                        <li><a role="menuitem" href="<?php echo U('Member/Passport/signup');?>" title="注册"><span class="glyphicon glyphicon-plus-sign"></span>注册</a></li>
                                        <li><a role="menuitem" href="<?php echo U('Member/Passport/resetPassword');?>"> <span class="glyphicon glyphicon-question-sign"></span> 忘记密码</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.nav-collapse -->
                    </nav>
                </header>







<div class="row">
    <div class="col-md-12 ">
        <div class="dogo-member">
            <h4>会员登录</h4>
            <div class="dogo-blank"></div>
            <form role="form" action="<?php echo U('Member/Passport/checkLogin');?>" method="post">
                <div class="dogo-input input-group input-group-lg">
                    <span class="input-group-addon">邮箱：</span>
                    <input type="text" name="email" class="form-control" placeholder="邮箱" required="required">
                </div>
                <div class="dogo-blank"></div>

                <div class="dogo-input input-group input-group-lg">
                    <span class="input-group-addon">密码：</span>
                    <input type="password" name="pwd" class="form-control" placeholder="密码" required="required">
                </div>
                <div class="dogo-blank"></div>
                <div class="dogo-input input-group input-group-lg">
                    <span class="input-group-addon">验证码：</span>
                    <input type="text" name="v_code" class="form-control" placeholder="输入右侧验证码" required="required">
                    <span class="input-group-addon">
                        <img src="<?php echo U('Member/Passport/vercode');?>" onclick="this.src = '<?php echo U('Member/Passport/vercode');?>?tm=' + Math.random()" style="cursor: pointer;" title="看不清？点击更换另一个验证码。"/>
                    </span>
                </div>

                <div class="dogo-blank"></div>
                <button type="submit" class="btn btn-default col-lg-12 btn-lg dogo-color-white">登录</button>

            </form>
        </div><!--dogo-member-->
    </div><!--col-md-->
</div><!--row-->





</div><!--container-->
</div><!--dogo-page-->

</body>
</html>
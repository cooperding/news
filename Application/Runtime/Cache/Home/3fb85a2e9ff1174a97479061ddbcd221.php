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

            <header class="dogo-header">
                <nav class="navbar navbar-default navbar-fixed-top dogo-header-navbar" role="navigation">
                    <div class="container">
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
                                        <li><a role="menuitem" href="javascript:void(0)" class="dogo-click-logout"> <span class="glyphicon glyphicon-log-out"></span> 退出登录</a></li>
                                        <?php }else{ ?>
                                        <li><a role="menuitem" href="<?php echo U('User/Passport/login');?>" title="登录"> <span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
                                        <li><a role="menuitem" href="<?php echo U('User/Passport/signup');?>" title="注册"><span class="glyphicon glyphicon-plus-sign"></span>注册</a></li>
                                        <li><a role="menuitem" href="<?php echo U('User/Passport/resetPassword');?>"> <span class="glyphicon glyphicon-question-sign"></span> 忘记密码</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.nav-collapse -->

                    </div>
                </nav>
            </header>

            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="dogo-box dogo-test2 dogo-border-all dogo-bg">

                        </div>
                    </div>
                    <div class="col-md-3">
                        <aside>
                            <div class="dogo-box dogo-test3 dogo-border-all dogo-bg">
                                <div class="dogo-box-header">
                                    <div class="form-group dogo-test-input">
                                        <input type="email" class="form-control dogo-test4" id="exampleInputEmail1" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="dogo-box-content dogo-border-search">
                                    <ul>
                                        <li><a href="#">丁继才</a></li>
                                        <li><a href="#">丁继才</a></li>
                                        <li><a href="#">丁继才</a></li>
                                        <li><a href="#">丁继才</a></li>
                                    </ul>
                                </div>
                                <div class="dogo-box-footer">
                                    
                                </div>
                            </div><!--dogo-box-->
                        </aside>
                    </div>
                </div><!--row-->
            </div><!--container-->













<footer class="dogo-footer">
    <div class="dogo-blank"></div>





    
</footer>









<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/v3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/js/alertify.min.js"></script>
<script type="text/javascript" src="/qiuyun/dogocms32/Public<?php echo ($style_common); ?>/js/jquery.cookie.js"></script>

<script>
    $(function() {
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

</div><!--dogo-page-->

</body>
</html>
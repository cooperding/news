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
                <nav class="navbar navbar-default dogo-header-navbar" role="navigation">
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
                </nav>
            </header>











            <div class="container">







<div class="row">

    <div class="col-md-4">
        <div class="dogo-blank"></div>

        <aside class="dogo-box dogo-border-all dogo-pd515">
            <div class="dogo-box-header">

            </div>
            <div class="dogo-box-content">

            </div><!--dogo-box-content-->
            <div class="dogo-box-footer">

            </div><!--dogo-box-footer-->
        </aside><!--dogo-box-->
        <div class="dogo-blank"></div>

        <aside class="dogo-box dogo-border-all dogo-pd515">
            <div class="dogo-box-header">

            </div>
            <div class="dogo-box-content">

            </div><!--dogo-box-content-->
            <div class="dogo-box-footer">

            </div><!--dogo-box-footer-->
        </aside><!--dogo-box-->
    </div><!--col-md-->

    <div class="col-md-8">

        <?php if(is_array($list)): foreach($list as $i=>$vo): ?><section class="dogo-box dogo-border-all dogo-pd515">
                <div class="dogo-box-header">
                    <h4><span class="glyphicon glyphicon-hand-right"></span> <a href="<?php echo U('Home/Content/index',array('id'=>$vo['id']));?>"><?php echo ($vo["title"]); ?></a></h4>
                    <p>
                        <span class="glyphicon glyphicon-user"></span> <a href="<?php echo U('Home/User/index',array('uid'=>$vo['members_id']));?>"><?php echo ($vo["username"]); ?> </a>
                        <span class="glyphicon glyphicon-time"></span> <?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?>
                        <span class="glyphicon glyphicon-eye-open"></span> <?php echo ($vo["views"]); ?>
                    </p>
                </div>
                <div class="dogo-box-content">
                    <div class="row">
                        <div class="col-md-3">
                            <?php if($vo["titlepic"] != ''): ?><a href="<?php echo U('Home/Content/index',array('id'=>$vo['id']));?>"><img class="img-responsive" src="<?php echo ($vo["titlepic"]); ?>"/></a><?php endif; ?>
                        </div>
                        <div class="col-md-9 dogo-align">
                            <p>
                                <?php echo ($vo["description"]); ?>
                            </p>
                        </div>
                    </div><!--row-->
                </div><!--dogo-box-content-->
                <div class="dogo-box-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <span type="button" class="btn btn-default dogo-click-up disabled_<?php echo ($vo["id"]); ?>" data-row-id="<?php echo ($vo["id"]); ?>" title="顶"> <span class="glyphicon glyphicon-thumbs-up"></span> <span class="num_up_<?php echo ($vo["id"]); ?>"><?php echo ($vo["num_top"]); ?></span></span>
                            <span type="button" class="btn btn-default dogo-click-down disabled_<?php echo ($vo["id"]); ?>" data-row-id="<?php echo ($vo["id"]); ?>" title="踩"> <span class="glyphicon glyphicon-thumbs-down"></span> <span class="num_down_<?php echo ($vo["id"]); ?>"><?php echo ($vo["num_beat"]); ?></span></span>
                        </div>
                        <div class="col-md-6 dogo-align">
                            <a href="<?php echo U('Home/Content/index',array('id'=>$vo['id']));?>"><span type="button" class="btn btn-default" title="评论"> <span class="glyphicon glyphicon-comment"></span> <?php echo ($vo["num_comment"]); ?></span></a>
                            <span type="button" class="btn btn-default"> <span class="glyphicon glyphicon-plus-sign"></span> 分享</span>
                        </div>
                    </div><!--row-->
                </div><!--dogo-box-footer-->
            </section><!--dogo-box-->
            <div class="dogo-blank"></div><?php endforeach; endif; ?>
        <?php if(($list) == ""): ?>暂无信息<?php endif; ?>
        <ul class="pagination">
            <?php echo ($page); ?>
        </ul>
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
<?php

$array['list'] = array(
    array(
        'id'=>1,
        'title' => 'nginx配置https',
        'time' => time(),
        'desc' => '需求：在服务器上开通SFTP文件服务，允许某些用户上传及下载文件。但是这些用户只能使用SFTP传输文件，不能使用SSH终端访问服务器',
        'img' => 'http://adminsir.net/Uploads/Images/20150321/550d6f7d25470.jpg'
    ),
    array(
        'id'=>20,
        'title' => 'apicloud监听菜单事件代码',
        'time' => time(),
        'desc' => '曾经配置过nginx比较高版本的安装方法及流程，这次也是在阿里云服务器ubuntu14.04.1版本安装nginx+php+mysql的方法及流程',
        'img' => 'http://adminsir.net/Public/Uploads/Images/20141127/5476c9641a7c1.jpg'
    ),
    array(
        'id'=>31,
        'title' => 'discuzx nginx站点伪静态配置',
        'time' => time(),
        'desc' => 'nginx配置server 多站点详细信息',
        'img' => 'http://adminsir.net/Public/Uploads/Images/20141129/54793cd647441.gif'
    ),
    array(
        'id'=>4,
        'title' => 'nginx配置server 多站点详细信息',
        'time' => time(),
        'desc' => '自从谷歌开始在搜索结果旁边放广告以来，广告已经成了互联网行业默认的首选变现方式',
        'img' => 'http://adminsir.net/Public/Uploads/Images/20141127/5476e37417a14.gif'
    ),
    array(
        'id'=>5,
        'title' => '24种最常见的商业盈利模式：用户积累多了 赚钱门道自然“涌现”',
        'time' => time(),
        'desc' => '在配置中，所有的全部是nginx指令，指令都要以分号结尾；指令分为块指令和行指令；指令有配置域，只能在允许的块中配置',
        'img' => 'http://adminsir.net/Public/Uploads/Images/20141127/5476c9641a7c1.jpg'
    ),
    array(
        'id'=>62,
        'title' => 'Nginx实现多个站点使用一个端口(配置Tengine Nginx的虚拟主机)',
        'time' => time(),
        'desc' => 'Nginx 是一个轻量级高性能的 Web 服务器, 并发处理能力强, 消耗资源小, 无论是静态服务器还是网站, Nginx 表现更加出色, 作为 Apache 的补充和替代使用率越来越高',
        'img' => 'http://adminsir.net/Uploads/Images/20150730/55b9eb1636e66.png'
    ),
    array(
        'id'=>7,
        'title' => '在ubuntu上安装淘宝的开源Web服务器Tengine',
        'time' => time(),
        'desc' => '为了追求性能，很多站长都选择了Nginx作为web服务，而Tengine是由淘宝网发起的Web服务器项目。它在Nginx的基础上，针对大访问量网站的需求，添加了很多高级功能和特性',
        'img' => 'http://adminsir.net/Public/Uploads/Images/20141201/547c315c474c0.png'
    ),
);
echo json_encode($array);
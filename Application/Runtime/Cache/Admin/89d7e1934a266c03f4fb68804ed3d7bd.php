<?php if (!defined('THINK_PATH')) exit();?>
<div class="easyui-layout layout_adslist">
    <div data-options="region:'west',split:true" title="广告分类" style="width:150px;">
        <ul class="easyui-tree tree_adslist" data-options="url:'<?php echo U('Admin/Ads/jsonSortTree');?>'" style="padding: 10px 5px;">
            <!--
            <?php if(is_array($list)): foreach($list as $key=>$sort): ?><li><a href="javascript:viod(0);" cmshref="__GROUP__/Setting/settinglist?id=<?php echo ($sort["id"]); ?>"><?php echo ($sort["text"]); ?></a></li><?php endforeach; endif; ?>
            -->
        </ul>
    </div>
    <div data-options="region:'center'" style="">
        <div id="tabs_adslist" class="easyui-tabs"  fit="true" border="false">
        </div>
        <script>
            $(function() {
                var height = $('.indexcenter').height();
                var classId = 'adslist';
                $('.layout_' + classId).css('height', height - 50);

                $('.tree_' + classId).tree({
                    onClick: function() {
                        var node = $('.tree_' + classId).tree('getSelected');
                        var nid = node.id;
                        var url = '/qiuyun/dogocms32/admin/Ads/newslist/id/'+nid;
                        var subtitle = node.text;
                        if (!$('#tabs_' + classId).tabs('exists', subtitle)) {
                            $('#tabs_' + classId).tabs('add', {
                                title: subtitle,
                                content: subtitle,
                                closable: true,
                                href: url,
                                tools: [{
                                        iconCls: 'icon-mini-refresh',
                                        handler: function() {
                                            updateTab(classId, url, subtitle);
                                        }
                                    }]
                            });
                            return false;
                        } else {
                            $('#tabs_' + classId).tabs('select', subtitle);
                            return false;
                        }

                    }//onclick
                });

            })
        </script>
    </div>
</div>
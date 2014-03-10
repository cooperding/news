<?php if (!defined('THINK_PATH')) exit();?><table id="datagrid_brandlist">

</table>
<script>
    $(function() {
        var classId = 'brandlist';
        var urljson = '<?php echo U("Admin/BrandList/jsonList");?>';
        var hrefadd = '<?php echo U("Admin/BrandList/add");?>';
        var hrefedit = '<?php echo U("Admin/BrandList/edit");?>';
        var hrefcancel = '<?php echo U("Admin/BrandList/delete");?>';
        openDatagrid(classId, urljson, hrefadd, hrefedit, hrefcancel);
        $('#datagrid_' + classId).datagrid({
            columns: [[
                    {field: 'id', title: 'id', width: 50},
                    {field: 'name', title: '商家名称', width: 150},
                    {field: 'url', title: '链接地址', width: 200},
                    {field: 'status', title: '状态', width: 200},
                    {field: 'addtime', title: '添加时间', width: 200},
                    {field: 'myorder', title: 'myorder', width: 80},
                    {
                        field: 'action',
                        title: '操作',
                        width: 50,
                        formatter: function(value, row, index) {
                            return '<img class="btn_do" src="/qiuyun/dogocms32/Public/Easyui/themes/icons/pencil.png" onclick="ding_edit(\'' + hrefedit + '?id=' + row.id + '\',\'' + classId + '\')"  title="编辑"/>&nbsp;\n\
<img class="btn_do" src="/qiuyun/dogocms32/Public/Easyui/themes/icons/cancel.png" onclick="ding_cancel(\'' + row.id + '\',\'' + hrefcancel + '\',\'' + classId + '\')" title=" 删除"/>&nbsp;';
                        }
                    }
                ]],
            toolbar: [{
                    id: 'btnadd_' + classId,
                    text: '添加',
                    iconCls: 'icon-add',
                    handler: function() {
                        var title = '添加文档';
                        openDialog(classId, hrefadd, title);
                    }
                }, '-', {
                    id: 'btnedit_' + classId,
                    text: '编辑',
                    iconCls: 'icon-edit',
                    handler: function() {
                        var ids = [];
                        var rows = $('#datagrid_' + classId).datagrid('getSelections');
                        for (var i = 0; i < rows.length; i++) {
                            ids.push(rows[i].id);
                        }
                        if (ids == '') {
                            $.messager.alert('信息提示', '请选择要操作的项', 'error');
                            return false;
                        } else if (rows.length > 1) {
                            $.messager.alert('信息提示', '请选择一个要操作的项', 'error');
                            return false;
                        }
                        var href = hrefedit + '?id=' + ids;
                        var title = '编辑信息';
                        openDialog(classId, href, title);
                    }
                }, '-', {
                    id: 'btncanel_' + classId,
                    text: '删除',
                    iconCls: 'icon-cancel',
                    handler: function() {
                        var ids = [];
                        var rows = $('#datagrid_' + classId).datagrid('getSelections');
                        for (var i = 0; i < rows.length; i++) {
                            ids.push(rows[i].id);
                        }
                        if (ids == '') {
                            $.messager.alert('信息提示', '请选择要操作的项', 'error');
                            return false;
                        }
                        var href = hrefcancel;
                        var title = '删除信息';
                        dogoDelete(ids,title,href,classId);


                    }
                }, '-', {
                    id: 'btnsearch' + classId,
                    text: '<input class="ajax_brandlist" placeholder="商家名称|网址"></input> '
                }, {
                    id: 'btnsubmit' + classId,
                    //text: '搜索',
                    iconCls: 'icon-search',
                    handler: function() {
                        var title = $('.ajax_brandlist').val();
                        $('#datagrid_' + classId).datagrid('load', {
                            keywords: title
                        });
                    }
                }//
            ]//toolbar
        });
    });
</script>
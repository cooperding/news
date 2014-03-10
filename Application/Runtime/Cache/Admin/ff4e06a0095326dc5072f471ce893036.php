<?php if (!defined('THINK_PATH')) exit();?><table  id="datagrid_goodsrecycle" class="datagrid">

</table>


<script>
    $(function() {
        var height = $('.indexcenter').height();
        var classId = 'goodsrecycle';
        var hrefrevert = '<?php echo U("Admin/GoodsList/recycleRevert");?>';
        var hrefedit = '<?php echo U("Admin/GoodsList/edit");?>';
        var hrefcancel = '<?php echo U("Admin/GoodsList/deleteRec");?>';
        var urljson = '<?php echo U("Admin/GoodsList/listJsonId",array("id"=>$id,"is_recycle"=>"20"));?>';
        //openDatagrid(classId,urljson,hrefadd,hrefedit,hrefcancel);
        $('#datagrid_' + classId).datagrid({
            url: urljson,
            idField: 'id',
            pagination: true,
            rownumbers: true,
            fitColumns: true,
            checkbox: true,
            height: height - 50,
            columns: [[
                    {field: 'id', title: 'ID', width: 50, align: 'center'},
                    {field: 'title', title: '标题', width: 200},
                    {field: 'text', title: '所属分类', width: 80},
                    {field: 'stock', title: '库存', width: 80},
                    {field: 'addtime', title: '添加时间', width: 200},
                    {field: 'views', title: '浏览量', width: 50, align: 'center'},
                    {field: 'status', title: '状态', width: 50},
                    //{field:'parent_id',title:'parent_id',width:200},
                    {
                        field: 'action2',
                        title: '动作',
                        width: 50,
                        formatter: function(value, row, index) {
                            //alert(row.id);
                            //return row.index;
                            return '<img class="btn_do" src="/qiuyun/dogocms32/Public/Easyui/themes/icons/pencil.png" onclick="ding_edit(\'' + hrefedit + '?id=' + row.id + '\',\'' + classId + '\')"  title="编辑"/>&nbsp;\n\
<img class="btn_do" src="/qiuyun/dogocms32/Public/Easyui/themes/icons/cancel.png" onclick="ding_cancel(\'' + row.id + '\',\'' + hrefcancel + '\',\'' + classId + '\')" title=" 删除"/>&nbsp;';
                        }
                    }
                ]],
            //singleSelect:true,
            frozenColumns: [[
                    {
                        field: 'ck',
                        checkbox: true
                    }
                ]],
            toolbar: [{
                    id: 'btnrevert_' + classId,
                    text: '还原',
                    iconCls: 'icon-add',
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
                        var href = hrefrevert;
                        var title = '还原信息';
                        $.messager.confirm(title, href, function() {
                            $.ajax({
                                url: href,
                                type: 'post',
                                data: {
                                    id: ids
                                },
                                dataType: 'json',
                                success: function(data) {
                                    formAjax(data, classId);
                                }
                            });
                        });//$
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
                        $.messager.confirm(title, href, function() {
                            $.ajax({
                                url: href,
                                type: 'post',
                                data: {
                                    id: ids
                                },
                                dataType: 'json',
                                success: function(data) {
                                    formAjax(data, classId);
                                }
                            });
                        });//$


                    }
                }//
            ]//toolbar
        });
        var p = $('#datagrid_' + classId).datagrid('getPager');
        $(p).pagination({
            pageSize: 10, //每页显示的记录条数，默认为10
            pageList: [10, 20, 30, 40, 50, 100], //可以设置每页记录条数的列表
            beforePageText: '第', //页数文本框前显示的汉字
            afterPageText: '页    共 {pages} 页',
            displayMsg: '当前显示 {from} - {to} 条记录   共 {total} 条记录'
        });
    });
</script>
</div><!--pagecontent-->
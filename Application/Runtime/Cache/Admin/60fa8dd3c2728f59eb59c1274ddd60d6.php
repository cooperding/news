<?php if (!defined('THINK_PATH')) exit();?><table id="datagrid_attributesort">

</table>
<script>
    $(function() {
        var classId = 'attributesort';
        var urljson = '<?php echo U("Admin/AttributeSort/jsonList");?>';
        var hrefadd = '<?php echo U("Admin/AttributeSort/add");?>';
        var hrefedit = '<?php echo U("Admin/AttributeSort/edit");?>';
        var hrefcancel = '<?php echo U("Admin/AttributeSort/delete");?>';
        openDatagrid(classId, urljson, hrefadd, hrefedit, hrefcancel);
        $('#datagrid_' + classId).datagrid({
            columns: [[
                    {field: 'id', title: 'ID', width: 50, align: 'center'},
                    {field: 'cat_name', title: '类型名称', width: 200},
                    {field: 'status', title: '状态', width: 200},
                    {
                        field: 'action',
                        title: '操作',
                        width: 50,
                        formatter: function(value, row, index) {
                            return '<img class="btn_do" src="/qiuyun/dogocms32/Public/Easyui/themes/icons/pencil.png" onclick="ding_edit(\'' + hrefedit + '?id=' + row.id + '\',\'' + classId + '\')"  title="编辑"/>&nbsp;\n\
<img class="btn_do" src="/qiuyun/dogocms32/Public/Easyui/themes/icons/cancel.png" onclick="ding_cancel(\'' + row.id + '\',\'' + hrefcancel + '\',\'' + classId + '\')" title=" 删除"/>&nbsp;';
                        }
                    }
                ]]
        });
    });
</script>
<?php if (!defined('THINK_PATH')) exit();?><table id="datagrid_ads_sort" class="ads_sort">

</table>

<script>
    $(function() {
        var classId = 'ads_sort';
        var hrefadd = '<?php echo U("Admin/Ads/sortadd");?>';
        var hrefedit = '<?php echo U("Admin/Ads/sortedit");?>';
        var hrefcancel = '<?php echo U("Admin/Ads/sortdelete");?>';
        var urljson = '<?php echo U("Admin/Ads/sortJson");?>';
        openDatagrid(classId, urljson, hrefadd, hrefedit, hrefcancel);
        $('#datagrid_' + classId).datagrid({
            columns: [[
                    {field: 'id', title: 'id', width: 50},
                    {field: 'ename', title: '标题', width: 200},
                    {field: 'status', title: '状态', width: 100},
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
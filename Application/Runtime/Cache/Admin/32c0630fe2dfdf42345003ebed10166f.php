<?php if (!defined('THINK_PATH')) exit();?><form action="<?php echo U('Admin/Ads/insert');?>" class="form_dogocms" method="post" enctype="multipart/form-data">

    <div class="division">
        <table>
            <tbody>
                <tr>
                    <th>广告名称：</th>
                    <td><input type="text" name="name" value="<?php echo ($data["name"]); ?>" data-options="required:true" class="easyui-validatebox"/><span class="red">*</span></td>
                </tr>
                <tr>
                    <th>广告分组：</th>
                    <td><input name="sort_id" id="combotree" class="easyui-combotree combotree" data-options="url:'<?php echo U('Admin/Ads/jsonSortTree');?>',required:true" value="0" style="width:200px;"></td>
                </tr>
                <tr>
                    <th>链接地址：</th>
                    <td><input type="text" name="url" value="<?php echo ($data["url"]); ?>" /></td>
                </tr>
                <tr>
                    <th>状态：</th>
                    <td><input type="radio" checked="checked" name="status[]" value="20">可用<input type="radio" name="status[]" value="10">禁用</td>
            </tr>
            <tr>
                <th>广告图：</th>
                <td>
                    <input type="text" id="url1" name="pic" value="" />
                    <input type="button" id="image1" value="选择图片" />
                </td>
            </tr>
            <tr>
                <th>文字简介：</th>
                <td><input type="text" name="remark" value="<?php echo ($data["remark"]); ?>" /></td>
            </tr>
            <tr>
                <th><?php echo L("orderby");?>：</th><td><input type="text" name="myorder" value="<?php echo ($data["myorder"]); ?>" /></td>
            </tr>
            </tbody>
        </table>
    </div>


</form>
<script>
    $(function() {
        var editor = KindEditor.editor({
            allowFileManager: true,
            uploadJson: '<?php echo U("Admin/Upload/uploadImg");?>',
            fileManagerJson: '<?php echo U("Admin/Upload/fileManagerJson");?>'
        });
        KindEditor('#image1').click(function() {
            editor.loadPlugin('image', function() {
                editor.plugin.imageDialog({
                    imageUrl: KindEditor('#url1').val(),
                    clickFn: function(url, title, width, height, border, align) {
                        KindEditor('#url1').val(url);
                        editor.hideDialog();
                    }
                });
            });
        });
    });
</script>
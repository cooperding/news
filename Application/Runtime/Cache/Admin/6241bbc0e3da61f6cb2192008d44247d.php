<?php if (!defined('THINK_PATH')) exit();?><form action="<?php echo U('Admin/Links/update');?>" class="form_dogocms" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
    <div class="division">
        <table>
            <tbody>
                <tr>
                    <th>友情链接名称：</th>
                    <td><input type="text" name="webname" value="<?php echo ($data["webname"]); ?>" data-options="required:true" class="easyui-validatebox"/><span class="red">*</span></td>
                </tr>
                <tr>
                    <th>上级分组名：</th>
                    <td><input name="sort_id" id="combotree" class="easyui-combotree combotree" data-options="url:'<?php echo U('Admin/Links/jsonTree');?>',required:true"  value="<?php echo ($data["sort_id"]); ?>"  style="width:200px;"></td>
                </tr>
                <tr>
                    <th>链接地址：</th>
                    <td><input type="text" name="weburl" value="<?php echo ($data["weburl"]); ?>" /></td>
                </tr>
                <tr>
                    <th>状态：</th>
                    <td><input type="radio" checked="checked" name="status[]" value="20">可用<input type="radio" name="status[]" value="10">禁用</td>
            </tr>
            <tr>
                <th>友情链接图片：</th>
                <td><input type="text" id="url1" name="webpic" value="<?php echo ($data["webpic"]); ?>" />
                    <input type="button" id="image1" value="选择图片" />
                </td>
            </tr>
            <tr>
                <th>文字简介：</th>
                <td><input type="text" name="emark" value="<?php echo ($data["emark"]); ?>" /></td>
            </tr>
            <tr>
                <th><?php echo L("orderby");?>：</th><td><input type="text" name="myorder" value="<?php echo ($data["myorder"]); ?>" /></td>
            </tr>
            </tbody>
        </table></div>
</form>
<script>
    $(function() {

        KindEditor.create('#content', {
            themeType: 'simple',
            allowFileManager: true,
            uploadJson: '<?php echo U("Admin/Upload/uploadImg");?>',
            fileManagerJson: '<?php echo U("Admin/Upload/fileManagerJson");?>',
            afterBlur: function() {
                this.sync();
            }
        });
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
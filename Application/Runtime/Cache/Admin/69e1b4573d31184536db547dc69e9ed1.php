<?php if (!defined('THINK_PATH')) exit();?><form action="<?php echo U('Admin/Ads/sortupdate');?>" class="form_dogocms" method="post">
    <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>" />
    <div class="division">
        <table>
            <tbody>
                <tr>
                    <th>名称：</th>
                    <td><input type="text" name="ename" value="<?php echo ($data["ename"]); ?>" data-options="required:true" class="easyui-validatebox"/><span class="red">*</span></td>
                </tr>
                <tr>
                    <th>状态：</th>
                    <td><input type="radio" name="status[]" value="20">可用<input type="radio" name="status[]" value="10">禁用</td>
            </tr>
            </tbody>
        </table></div>
</form>
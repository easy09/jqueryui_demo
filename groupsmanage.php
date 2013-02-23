<?php
    error_reporting(0);
    //演示数据
    $rows=array(
      0=>array(
        'id'=>1,
        'name'=>'administrator',
        'title'=>'超级管理员'
      ),
      1=>array(
        'id'=>2,
        'name'=>'manager',
        'title'=>'管理员'
      ),
      2=>array(
        'id'=>3,
        'name'=>'editor',
        'title'=>'网站编辑'
      ),
      3=>array(
        'id'=>4,
        'name'=>'editor',
        'title'=>'普通用户'
      ),
      4=>array(
        'id'=>5,
        'name'=>'guest',
        'title'=>'访客'
      ),
    );
?>
<script type="text/javascript">
$(function(){
    $('#dialog').dialog('destroy');
    //删除确认
    $('.ui-icon-trash').bind('click',function(){
        if(confirm('确定要删除'+$(this).attr('grouptitle')+'吗？')){
            alert($(this).attr('grouptitle')+'删除成功');
        }
    });
    bindModify();
});
//修改分组
function bindModify(){
    var doSubmit=function(){   
        panelId=$('#panelId').attr('value');
        formId='#groupedit';
        var options={
            target:panelId
        };
        $(formId).ajaxSubmit(options);//dialog弹出表单暂不支持表单验证
        $('#dialog').dialog('close');
    };
    var doCancel=function(){
        $('#dialog').dialog('close');
    };
    $('.ui-icon-wrench').click(function(){
        $('#dialog').load('groupedit.php?id='+$(this).attr('groupid'));
        var dialogOpts={
            title:'修改用户分组',
            modal:true,
            buttons:{
                '取消':doCancel,
                '修改':doSubmit
            },
            height:300,
            width:350,
            top:100
        }
        $('#dialog').dialog(dialogOpts);
    });
}
</script>
<fieldset>
    <legend>用户分组管理</legend>
    <table class="sl-table">
        <thead>
        <tr><td>分组名称</td><td>分组标题</td><td>操作</td></tr>
        </thead>
        <tbody>
    <? foreach($rows as $row){
        $action="<span groupid=$row[id] grouptitle=$row[title] class='ui-icon ui-icon-trash' title='删除'></span><span groupid=$row[id] grouptitle=$row[title] title='修改' class='ui-icon ui-icon-wrench'></span>";
    ?>
        <tr>
            <td><?=$row[name]?></td>
            <td><?=$row[title]?></td>
            <td><?=$action?></td>
        </tr>
    <? }?>
    </table>
</fieldset>
<br/>

<fieldset>
    <legend>添加分组</legend>
    <form id="form-groupsmanage" name="form-groupsmanage" method="POST" action="groupsmanage.php">
        <input name="formId" type="hidden" value="form-addAddress"/>
<ul id="sl-addAddress" class="sl-table">
    <li><label>分组名称(英文字符)</label><input type="text" name="name" class="required"/></li>
    <li><label>分组标题</label><input type="text" name="title" class="required"/></li>
    <li><label>&nbsp;</label><input type="submit" id="addAddress-submit" name="addAddress-subimt" value="添加"/></li>
</ul>
        </form>
</fieldset>
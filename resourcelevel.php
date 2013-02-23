<?php
    error_reporting(0);
    //演示数据
    $rows=array(
      0=>array(
        'id'=>1,
        'name'=>'public',
        'title'=>'所有人均可访问的资源',
        'system'=>true
      ),
      1=>array(
        'id'=>2,
        'name'=>'register',
        'title'=>'注册用户才能访问的资源',
        'system'=>true
      ),
      2=>array(
        'id'=>3,
        'name'=>'member',
        'title'=>'内部工作人员的资源',
        'system'=>true
      ),
      3=>array(
        'id'=>4,
        'name'=>'manager',
        'title'=>'管理人员的资源',
        'system'=>true
      ),
      4=>array(
        'id'=>5,
        'name'=>'administrator',
        'title'=>'最高权限者的资源',
        'system'=>true
      ),
      5=>array(
        'id'=>6,
        'name'=>'owner',
        'title'=>'ID号对应者的资源',
        'system'=>true
      )
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
                '修改':doSubmit,
                '取消':doCancel
            },
            height:200,
            width:350,
            top:100
        }
        $('#dialog').dialog(dialogOpts);
    });
}
</script>
<fieldset>
    <legend>权限级别管理</legend>
    <table class="sl-table">
        <thead>
        <tr><td>级别名称</td><td>级别标题</td><td>操作</td></tr>
        </thead>
        <tbody>
    <? foreach($rows as $row){
        if(!$row['system']){
            $action="<span groupid=$row[id] grouptitle=$row[title] class='ui-icon ui-icon-trash' title='删除'></span><span groupid=$row[id] grouptitle=$row[title] title='修改' class='ui-icon ui-icon-wrench'></span>";
        }else{
            $action='<span class="ui-icon ui-icon-info" title="系统级别，不可更改"></span>';
        }
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
    <legend>添加自定义权限</legend>
    <form id="form-groupsmanage" name="form-groupsmanage" method="POST" action="groupsmanage.php">
        <input name="formId" type="hidden" value="form-addAddress"/>
<ul id="sl-addAddress" class="sl-table">
    <li><label>权限名称(英文字符)</label><input type="text" name="name" class="required"/></li>
    <li><label>权限标题</label><input type="text" name="title" class="required"/></li>
    <li><label>&nbsp;</label><input type="submit" id="addAddress-submit" name="addAddress-subimt" value="添加"/></li>
</ul>
        </form>
</fieldset>
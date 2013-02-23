<?php
    error_reporting(0);
    //演示数据
    $rows=array(
      0=>array(
        'id'=>1,
        'name'=>'mainmenu',
        'title'=>'主菜单'
      ),
      1=>array(
        'id'=>2,
        'name'=>'friendlinks',
        'title'=>'友情链接'
      ),
      2=>array(
        'id'=>3,
        'name'=>'questions',
        'title'=>'常见问题'
      ),
    );
    $items=array(
      0=>array(
        'id'=>1,
        'link'=>'http://www.sina.com',
        'title'=>'新浪'
      ),
      1=>array(
        'id'=>2,
        'link'=>'http://www.163.com',
        'title'=>'网易'
      ),
      2=>array(
        'id'=>3,
        'link'=>'http://www.sohu.com',
        'title'=>'搜狐'
      ),
    );
foreach($rows as $row){
    if($row['id']==$_GET['id']){
        break;
    }
}
?>
<script type="text/javascript">
$(function(){
    $('#dialog').dialog('destroy');
    //删除确认
    $('.ui-icon-trash').bind('click',function(){
        if(confirm('确定要删除'+$(this).attr('itemtitle')+'吗？')){
            alert($(this).attr('itemtitle')+'删除成功');
        }
    });
    bindModify();
});
//修改分组
function bindModify(){
    var doSubmit=function(){
        panelId=$('#panelId').attr('value');
        formId='#itemedit';
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
        $('#dialog').load('itemedit.php?id='+$(this).attr('itemid'));
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
<form id="menuedit" name="menuedit" action="menuedit.php" method="post">
    <ul class="sl-table">
        <li><label>菜单标题</label><input type="text" name="name" value="<?=$row['name']?>"></li>
        <li><label>菜单链接</label><input type="text" name="title" value="<?=$row['title']?>"></li>
        <li class="footer"><label>&nbsp;</label><input type="submit" name="submit" value="修改"></li>
    </ul>
</form>
</fieldset>

<fieldset>
    <legend>菜单选项管理</legend>
    <table class="sl-table">
        <thead>
        <tr><td>选项标题</td><td>选项链接</td><td>操作</td></tr>
        </thead>
        <tbody>
    <? foreach($items as $row){
        $action="<span itemid=$row[id] itemtitle=$row[title] class='ui-icon ui-icon-trash' title='删除'></span><span itemid=$row[id] itemtitle=$row[title] title='修改' class='ui-icon ui-icon-wrench'></span>";
    ?>
        <tr>
            <td><?=$row[title]?></td>
            <td><?=$row[link]?></td>
            <td><?=$action?></td>
        </tr>
    <? }?>
    </table>
</fieldset>
<br/>

<fieldset>
    <legend>添加菜单选项</legend>
    <form id="form-itemmanage" name="form-itemmanage" method="POST" action="itemmanage.php">
        <input name="formId" type="hidden" value="form-addAddress"/>
<ul id="sl-addAddress" class="sl-table">
    <li><label>选项标题</label><input type="text" name="title" class="required"/></li>
    <li><label>选项链接</label><input type="text" name="link" class="required"/></li>
    <li><label>&nbsp;</label><input type="submit" id="addAddress-submit" name="addAddress-subimt" value="添加"/></li>
</ul>
        </form>
</fieldset>



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
?>
<script type="text/javascript">
$(function(){
    $('#dialog').dialog('destroy');
    //删除确认
    $('.ui-icon-trash').bind('click',function(){
        if(confirm('确定要删除'+$(this).attr('menutitle')+'吗？')){
            alert($(this).attr('menutitle')+'删除成功');
        }
    });
    bindModify();
});
//修改分组
function bindModify(){
    $('.ui-icon-wrench').bind('click',function(){
       url='menuedit.php?id='+$(this).attr('menuid');
       tabName=$(this).attr('menutitle');
       $('#sl-tabs').tabs('add',url,tabName);
       newIndex=$('#sl-tabs').tabs('length')-1;
       $('#sl-tabs').tabs('select',newIndex);
    });
}

function renewmenutab(){
    $("#sl-tabs ul li").each(function(){
       $("#sl-tabs").tabs('remove',1);
    });
<?php
    foreach ($rows as $row){
?>
    url='menuitems.php?id=<?=$row['id']?>';
    tabName='<?=$row['title']?>';
    $("#sl-tabs").tabs('add',url,tabName);
<?php } ?>
}
</script>
<fieldset>
    <legend>自定义菜单管理</legend>
    <table class="sl-table">
        <thead>
        <tr><td>菜单名称</td><td>菜单标题</td><td>操作</td></tr>
        </thead>
        <tbody>
    <? foreach($rows as $row){
        $action="<span menuid=$row[id] menutitle=$row[title] class='ui-icon ui-icon-trash' title='删除'></span><span menuid=$row[id] menutitle=$row[title] title='修改' class='ui-icon ui-icon-wrench'></span>";
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
    <legend>添加菜单</legend>
    <form id="form-menumanage" name="form-menumanage" method="POST" action="menumanage.php">
        <input name="formId" type="hidden" value="form-addAddress"/>
<ul id="sl-addAddress" class="sl-table">
    <li><label>菜单名称(英文字符)</label><input type="text" name="name" class="required"/></li>
    <li><label>菜单标题</label><input type="text" name="title" class="required"/></li>
    <li><label>&nbsp;</label><input type="submit" id="addAddress-submit" name="addAddress-subimt" value="添加"/></li>
</ul>
        </form>
</fieldset>
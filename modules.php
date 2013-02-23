<?php
    error_reporting(0);
    //演示数据
    $rows=array(
      0=>array(
        'id'=>1,
        'name'=>'articles',
        'title'=>'文章组件'
      ),
      1=>array(
        'id'=>2,
        'name'=>'pictures',
        'title'=>'相册组件'
      ),
      2=>array(
        'id'=>3,
        'name'=>'downloads',
        'title'=>'下载组件'
      ),
      3=>array(
        'id'=>4,
        'name'=>'products',
        'title'=>'产品组件'
      ),
      4=>array(
        'id'=>5,
        'name'=>'guestbook',
        'title'=>'留言板'
      ),
    );
?>
<script type="text/javascript">
$(function(){
    $('#dialog').dialog('destroy');
    //删除确认
    $('.ui-icon-trash').bind('click',function(){
        if(confirm('确定要删除'+$(this).attr('moduletitle')+'吗？')){
            alert($(this).attr('moduletitle')+'删除成功');
        }
    });
    //设置默认模板确认
    $('.ui-icon-lightbulb').bind('click',function(){
        if(confirm('确定要设置'+$(this).attr('moduletitle')+'为默认模板吗？')){
            alert($(this).attr('moduletitle')+'设置成功');
        }
    });
});
</script>
<fieldset>
    <legend>有效组件</legend>
    <table class="sl-table">
        <thead>
        <tr><td>组件名称</td><td>组件说明</td><td>操作</td></tr>
        </thead>
        <tbody>
    <? foreach($rows as $row){
        $action="<span moduleid=$row[id] moduletitle=$row[title] class='ui-icon ui-icon-trash' title='删除'></span><span moduleid=$row[id] moduletitle=$row[title] title='卸载' class='ui-icon ui-icon-lightbulb'></span>";
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
    <legend>组件安装包</legend>
    <table class="sl-table">
        <thead>
        <tr><td>组件名称</td><td>组件说明</td><td>操作</td></tr>
        </thead>
        <tbody>
    <? foreach($rows as $row){
        $action="<span moduleid=$row[id] moduletitle=$row[title] class='ui-icon ui-icon-trash' title='删除'></span><span moduleid=$row[id] moduletitle=$row[title] title='安装' class='ui-icon ui-icon-lightbulb'></span>";
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
    <legend>添加组件</legend>
    <form id="form-modulesmanage" name="form-modulesmanage" method="POST" action="modules.php">
        <input name="formId" type="hidden" value="form-addAddress"/>
<ul id="sl-addAddress" class="sl-table">
    <li><label>组件文件(zip压缩包)</label><input type="file" name="module" class="required"/></li>
    <li><label>&nbsp;</label><input type="submit" id="addAddress-submit" name="addAddress-subimt" value="添加"/></li>
</ul>
        </form>
</fieldset>

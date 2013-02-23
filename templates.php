<?php
    error_reporting(0);
    //演示数据
    $rows=array(
      0=>array(
        'id'=>1,
        'name'=>'simple',
        'title'=>'简洁明快'
      ),
      1=>array(
        'id'=>2,
        'name'=>'red',
        'title'=>'烈焰焚情'
      ),
      2=>array(
        'id'=>3,
        'name'=>'cool',
        'title'=>'冰封王座'
      ),
      3=>array(
        'id'=>4,
        'name'=>'bule',
        'title'=>'蓝色忧郁'
      ),
      4=>array(
        'id'=>5,
        'name'=>'gold',
        'title'=>'金玉满堂'
      ),
    );
?>
<script type="text/javascript">
$(function(){
    $('#dialog').dialog('destroy');
    //删除确认
    $('.ui-icon-trash').bind('click',function(){
        if(confirm('确定要删除'+$(this).attr('templatetitle')+'吗？')){
            alert($(this).attr('templatetitle')+'删除成功');
        }
    });
    //设置默认模板确认
    $('.ui-icon-lightbulb').bind('click',function(){
        if(confirm('确定要设置'+$(this).attr('templatetitle')+'为默认模板吗？')){
            alert($(this).attr('templatetitle')+'设置成功');
        }
    });
});

</script>
<fieldset>
    <legend>默认模板</legend>
    <ul class="sl-table"><li>
    当前默认模板是：<strong>简洁明快（simple）</strong>
    </li></ul>
</fieldset>
<fieldset>
    <legend>模板管理</legend>
    <table class="sl-table">
        <thead>
        <tr><td>模板名称</td><td>模板说明</td><td>操作</td></tr>
        </thead>
        <tbody>
    <? foreach($rows as $row){
        $action="<span templateid=$row[id] templatetitle=$row[title] class='ui-icon ui-icon-trash' title='删除'></span><span templateid=$row[id] templatetitle=$row[title] title='设为默认模板' class='ui-icon ui-icon-lightbulb'></span>";
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
    <legend>添加模板</legend>
    <form id="form-templatesmanage" name="form-templatesmanage" method="POST" action="templates.php">
        <input name="formId" type="hidden" value="form-addAddress"/>
<ul id="sl-addAddress" class="sl-table">
    <li><label>模板文件(zip压缩包)</label><input type="file" name="template" class="required"/></li>
    <li><label>&nbsp;</label><input type="submit" id="addAddress-submit" name="addAddress-subimt" value="添加"/></li>
</ul>
        </form>
</fieldset>

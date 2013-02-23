<?php
    error_reporting(0);
    //演示数据

        $levels=array(
      0=>array(
        'id'=>1,
        'name'=>'public',
        'title'=>'所有人的资源',
        'system'=>true
      ),
      1=>array(
        'id'=>2,
        'name'=>'register',
        'title'=>'注册用户的资源',
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
    $options=getListString($catalogue);
//获取无限级分类option
function getListString($catalogue,$tab=NULL){
    foreach($catalogue as $row){
        if($row['id']==$_GET[id]){
            continue;
        }
        $string.=<<< STRING
            <option value="$row[id]">$tab$row[title]</option>
STRING;
        if(!empty($row['subclasses'])){
            $tab.='&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;&nbsp;';
            $string.=getListString($row['subclasses'],$tab);
            $tab=NULL;
        }
    }
    return $string;
}
?>
<fieldset>
<legend>分配核心系统管理权限</legend>
<ul class="sl-table">
    <li><h3>登录后台/后台首页</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li><h3>系统设置</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li><h3>组件管理</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li><h3>模板管理</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li><h3>用户管理</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li><h3>权限级别</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li><h3>菜单管理</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li><h3>图片管理</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li><h3>权限分配</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li class="footer"><span>&nbsp;</span><input type="submit" name="submit" value="确定"></li>
</ul>
</fieldset>

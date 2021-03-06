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
<legend>分配下载文件管理权限</legend>
<ul class="sl-table">
    <li><h3>添加下载文件</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li><h3>下载文件列表</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li><h3>下载文件分类管理</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li><h3>下载文件组件设置</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li class="footer"><span>&nbsp;</span><input type="submit" name="submit" value="确定"></li>
</ul>
</fieldset>
<br/>
<fieldset>
<legend>默认下载文件分类权限</legend>
<ul class="sl-table">
    <li><h3>下载文件前台阅读权限</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li><h3>下载文件后台管理权限</h3></li>
    <ul class="resource">
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
    </ul>
    <li class="footer"><span>&nbsp;</span><input type="submit" name="submit" value="确定"></li>
</ul>
</fieldset>
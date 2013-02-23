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
foreach($rows as $row){
    if($row['id']==$_GET['id']){
        break;
    }
}
    $resource=array(
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
        'title'=>'资源所有者ID号必须对应',
        'system'=>true
      )
    );
?>

<form id="groupedit" name="groupedit" action="groupedit.php" method="post">
    <ul class="sl-table">
        <li><label>分类名称</label><input type="text" name="name" value="<?=$row['name']?>"></li>
        <li><label>分类标题</label><input type="text" name="title" value="<?=$row['title']?>"></li>
        <ul>
            <? foreach($resource as $row){?>
            <li><input type="checkbox" name="resource[<?=$row[id]?>]" value="<?=$row['name']?>"><?=$row['title']?></li>
            <?}?>
        </ul>
        <li class="footer"></li>
    </ul>
</form>

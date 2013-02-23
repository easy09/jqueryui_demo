<?php
    error_reporting(0);
    //演示数据
    error_reporting(0);
    //演示数据
    $catalogue  =   array(
      0=>array(
        'id'=>1,
        'name'=>'webscript',
        'title'=>'网页编程语言',
        'subclasses'=>array(
            0=>array(
                'id'=>4,
                'name'=>'php',
                'title'=>'php语言',
                'subclasses'=>array()
            ),
            1=>array(
                'id'=>5,
                'name'=>'asp',
                'title'=>'asp语言',
                'subclasses'=>array()
            ),
            2=>array(
                'id'=>6,
                'name'=>'javascript',
                'title'=>'javascript语言',
                'subclasses'=>array(
                    0=>array(
                        'id'=>7,
                        'name'=>'jQuery',
                        'title'=>'jQuery框架',
                        'subclasses'=>array()
                    ),
                )
            ),
        )
      ),
      1=>array(
        'id'=>2,
        'name'=>'os',
        'title'=>'操作系统'
      ),
      2=>array(
        'id'=>3,
        'name'=>'others',
        'title'=>'其它'
      ),
    );
        $levels=array(
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
    foreach($catalogue as $cat){
        if($cat['id']==$_GET['id']){
            break;
        }
    }
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
<legend>分配本分类产品管理权限</legend>
<ul class="sl-table">
    <li><?=$cat['title']?>(<?=$cat['name']?>) 后台管理权限级别:</li>
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
</ul>
</fieldset>
<br/>
<fieldset>
<legend>分配本分类产品阅读权限</legend>
<ul class="sl-table">
    <li><?=$cat['title']?>(<?=$cat['name']?>)前台阅读权限级别:</li>
    <?php foreach($levels as $level){?>
        <li><input type="checkbox" name="levels[<?=$level[name]?>]"><?=$level[title]?></li>
    <?}?>
</ul>
</fieldset>
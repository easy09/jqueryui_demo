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
<legend>文章分类修改</legend>
<ul class="sl-table">
    <li><label>分类标题</label><input type="text" name="title" class="required" value="<?=$cat['title']?>"></li>
    <li><label>分类名称</label><input type="text" name="name" class="required" value="<?=$cat['name']?>"></li>
    <li><label>分类</label>
        <select name="fid">
            <?=$options?>
        </select></li>
    <li><label>Meta 关键词(多个关键词之间用英文逗号间隔)</label><input type="text" name="key" class="required"></li>
    <li><label>Meta 内容索引</label><textarea name="metacontent" cols="40" rows="5"></textarea></li>
    <li class="footer"><label>&nbsp;</label></li>
</ul>
</fieldset>
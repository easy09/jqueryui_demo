<?php
    error_reporting(0);
    //演示数据
    $catalogue  =   array(
      0=>array(
        'id'=>1,
        'title'=>'php',
      ),
      1=>array(
        'id'=>2,
        'title'=>'jquery'
      ),
      2=>array(
        'id'=>3,
        'title'=>'javascript'
      ),
    );
    require_once "js/ckeditor/ckeditor.php";
    $ckeditor=new ckeditor();
    $id="editorAddArticle";
    $ckeditor->basePath = 'js/ckeditor/';
    $ckeditor->replaceAll('editor');
?>
<fieldset>
<legend>图片发布</legend>
<ul class="sl-table">
    <li><label>图片标题</label><input type="text" name="title" class="required"></li>
    <li><label>图片照片(必须小于1M)</label><input type="file" name="image"></li>
    <li><label>分类</label>
        <select name="title">
            <?php foreach($catalogue as $row){ ?>
            <option value="<?=$row['id']?>"><?=$row['title']?></option>
            <?php }?>
        </select></li>
    <li><label>图片介绍</label></li>
    <li><textarea class="editor" id="editorAddArticle" name="editorAddArticle" cols="80" rows="10"></textarea></li>
    <li><label>Meta 关键词(多个关键词之间用英文逗号间隔)</label><input type="text" name="key" size="60" class="required"></li>
    <li><label>Meta 内容索引</label><textarea id="addMetaContent" cols="50" rows="5"></textarea></li>
    <li><label>&nbsp;</label><input type="submit" value="发布"></li>
</ul>
</fieldset>
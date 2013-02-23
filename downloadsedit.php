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
$downloads=array(
      0=>array(
          'id'=>1,
          'title'=>'测试文章一',
          'cattitle'=>'php',
          'posttime'=>'2010/08/01',
          'commend'=>0
      ),
      1=>array(
          'id'=>2,
          'title'=>'测试文章二',
          'cattitle'=>'php',
          'posttime'=>'2010/08/01',
          'commend'=>0
      ),
      2=>array(
          'id'=>3,
          'title'=>'测试文章三',
          'cattitle'=>'php',
          'posttime'=>'2010/08/01',
          'commend'=>0,
          'locked'=>0,
          'actived'=>1
      ),
      3=>array(
          'id'=>4,
          'title'=>'测试文章四',
          'cattitle'=>'php',
          'posttime'=>'2010/08/01',
          'commend'=>0,
          'locked'=>0,
          'actived'=>1
      ),
      4=>array(
          'id'=>5,
          'title'=>'测试文章五',
          'cattitle'=>'php',
          'posttime'=>'2010/08/01',
          'commend'=>0,
          'locked'=>0,
          'actived'=>1
      ),
      5=>array(
          'id'=>6,
          'title'=>'测试文章六',
          'cattitle'=>'php',
          'posttime'=>'2010/08/01',
          'commend'=>0,
          'locked'=>0,
          'actived'=>1
      ),
      6=>array(
          'id'=>7,
          'title'=>'测试文章七',
          'cattitle'=>'php',
          'posttime'=>'2010/08/01',
          'commend'=>0,
          'locked'=>0,
          'actived'=>1
      ),
      7=>array(
          'id'=>8,
          'title'=>'测试文章八',
          'cattitle'=>'php',
          'posttime'=>'2010/08/01',
          'commend'=>0,
          'locked'=>0,
          'actived'=>1
      ),
      8=>array(
          'id'=>9,
          'title'=>'测试文章九',
          'cattitle'=>'php',
          'posttime'=>'2010/08/01',
          'commend'=>0,
          'locked'=>0,
          'actived'=>1
      ),
      9=>array(
          'id'=>10,
          'title'=>'测试文章十',
          'cattitle'=>'php',
          'posttime'=>'2010/08/01',
          'commend'=>0,
          'locked'=>0,
          'actived'=>1
      ),
);
foreach($downloads as $download){
    if($download['id']==$_GET['id']){
        break;
    }
}
    require_once "js/ckeditor/ckeditor.php";
    $ckeditor=new ckeditor();
    $id="editorAdddownload";
    $ckeditor->basePath = 'js/ckeditor/';
    $ckeditor->replaceAll('editor');
?>
<fieldset>
<legend>下载文件修改</legend>
<ul class="sl-table">
    <li><label>下载文件标题</label><input type="text" name="title" class="required" value="<?=$download['title']?>"></li>
    <li><label>下载文件文件(不改留空)</label><input type="file" name="image" value=""></li>
    <li><label>分类</label>
        <select name="title">
            <?php foreach($catalogue as $row){ ?>
            <option value="<?=$row['id']?>"><?=$row['title']?></option>
            <?php }?>
        </select></li>
    <li><label>下载文件介绍</label></li>
    <li><textarea class="editor" id="editorModifydownload<?=$download['id']?>" name="editorModifydownload<?=$download['id']?>" cols="80" rows="10"></textarea></li>
    <li><label>Meta 关键词(多个关键词之间用英文逗号间隔)</label><input type="text" name="metakey" class="required"></li>
    <li><label>Meta 内容索引</label><textarea name="metacontent" cols="40" rows="5"></textarea></li>
    <li><label>&nbsp;</label><input type="submit" value="发布"></li>
</ul>
</fieldset>
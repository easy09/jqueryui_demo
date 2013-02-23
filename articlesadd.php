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
?>

<fieldset>
<legend>文章发布</legend>
<ul class="sl-table">
    <li><label>标题</label><input type="text" name="title" class="required"></li>
    <li><label>标题图片</label><input type="file" name="image"></li>
    <li><label>分类</label>
        <select name="title">
            <?php foreach($catalogue as $row){ ?>
            <option value="<?=$row['id']?>"><?=$row['title']?></option>
            <?php }?>
        </select></li>
    <li><label>内容</label></li>
    <li><textarea class="editor" id="editorAddArticle" name="editorAddArticle" cols="80" rows="10"></textarea></li>
    <li><label>Meta 关键词(多个关键词之间用英文逗号间隔)</label><input type="text" name="key" size="60" class="required"></li>
    <li><label>Meta 内容索引</label><textarea id="addMetaContent" cols="50" rows="5">sssssssssss</textarea></li>
    <li><label>&nbsp;</label><input type="submit" value="发布"></li>
    <li id="test"></li>
</ul>
</fieldset>
<script type="text/javascript" src="js/kedit/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8">

			var editor_id = 'demo_12_id';

			KE.init({

				id : editor_id,

				width : '700px',

				height : '300px'

			});

			KE.event.ready(function(){

				var textarea = document.createElement('textarea');

				textarea.id = editor_id;

				textarea.name = "content";

				document.getElementById('editor_area').appendChild(textarea);

				KE.create(editor_id);

			});

		</script>

		<div id="editor_area"></div>

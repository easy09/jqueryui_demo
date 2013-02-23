<?php
$images=array(
    0=>array(
        'id'=>1,
        'thumb'=>'1_thumb.jpg',
        'picture'=>'1.jpg',
        'title'=>'图片一'
    ),
    1=>array(
        'id'=>2,
        'thumb'=>'2_thumb.jpg',
        'picture'=>'2.jpg',
        'title'=>'图片二'
    ),
    2=>array(
        'id'=>3,
        'thumb'=>'3_thumb.jpg',
        'picture'=>'3.jpg',
        'title'=>'图片三'
    ),
    3=>array(
        'id'=>4,
        'thumb'=>'4_thumb.jpg',
        'picture'=>'4.jpg',
        'title'=>'图片四'
    ),
    4=>array(
        'id'=>5,
        'thumb'=>'5_thumb.jpg',
        'picture'=>'5.jpg',
        'title'=>'图片五'
    ),
    5=>array(
        'id'=>6,
        'thumb'=>'6_thumb.jpg',
        'picture'=>'6.jpg',
        'title'=>'图片六'
    ),
    6=>array(
        'id'=>7,
        'thumb'=>'7_thumb.jpg',
        'picture'=>'7.jpg',
        'title'=>'图片七'
    ),
    7=>array(
        'id'=>8,
        'thumb'=>'8_thumb.jpg',
        'picture'=>'8.jpg',
        'title'=>'图片八'
    ),
);
?>
<script src="js/jqzoom.pack.1.0.1.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
	$(".jqzoom").jqzoom();
});
</script>
<fieldset>
    <legend>图片管理</legend>
    <form id="form-imagesmanage" method="post" action="imagesmanage.php">
    <p id="deleteImages"><input type="submit" name="submit" value="删除选中图片"></p>
    <ul class="images">
        <? foreach($images as $image){?>
            <li>
                <input type="checkbox" name="delete[<?=$images['id']?>]">&nbsp;<?=$image['thumb']?><a href="uploads/images/<?=$image['picture']?>" class="jqzoom" style="" title="<?=$image['title']?>">
		<img src="uploads/images/<?=$image['thumb']?>"  title="<?=$image['title']?>"></a>
            </li>
        <? }?>
    </ul>
    </form>
    <p style="clear:both;"><span class="pagefooter"><a href="#">首页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">6</a><a href="#">7</a><a href="#">8</a><a href="#">9</a><a href="#">10</a>...<a href="#">尾页</a></span></p>
</fieldset>
<br/>
<fieldset>
    <legend>添加图片</legend>
    <form id="form-imagesadd" method="post" action="imagesadd.php">
        <ul class="sl-table">
            <li><span>图片标题</span><input type="text" name="title"></li>
            <li><span>图片文件</span><input type="file" name="picture"></li>
            <li class="footer"><span>&nbsp;</span><input type="submit" name="submit" value="上传"></li>
        </ul>
    </form>
</fieldset>
    

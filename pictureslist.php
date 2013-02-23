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
$pictures=array(
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
$(function(){
    //删除确认
    $('.ui-icon-trash').bind('click',function(){
        if(confirm('确定要删除'+$(this).attr('picturetitle')+'吗？')){
            alert($(this).attr('picturetitle')+'删除成功');
        }
    });
   bindModify();
   bindCommended();
   bindUncommended();
   bindUnlocked();
   bindLocked();
   bindActived();
   bindUnactived();
   $(".jqzoom").jqzoom();
});
function bindModify(){
    $('.ui-icon-wrench').bind('click',function(){
       url='picturesedit.php?id='+$(this).attr('pictureid');
       tabName=$(this).attr('picturetitle');
       $('#sl-tabs').tabs('add',url,tabName);
       newIndex=$('#sl-tabs').tabs('length')-1;
       $('#sl-tabs').tabs('select',newIndex);
    });
}
function bindCommended(){
    $('.ui-icon-pin-s').bind('click',function(){
        $(this).removeClass('ui-icon-pin-s');
        $(this).addClass('ui-icon-pin-w');
        $(this).attr('title','未推荐');
        bindUncommended();
    });
}
function bindUncommended(){
    $('.ui-icon-pin-w').bind('click',function(){
        $(this).removeClass('ui-icon-pin-w');
        $(this).addClass('ui-icon-pin-s');
        $(this).attr('title','已推荐');
        bindCommended();
    });
}
function bindUnlocked(){
    $('.ui-icon-unlocked').bind('click',function(){
        $(this).removeClass('ui-icon-unlocked');
        $(this).addClass('ui-icon-locked');
        $(this).attr('title','已锁定');
        bindLocked();
    });
}
function bindLocked(){
    $('.ui-icon-locked').bind('click',function(){
        $(this).removeClass('ui-icon-locked');
        $(this).addClass('ui-icon-unlocked');
        $(this).attr('title','未锁定');
        bindUnlocked();
    });
}
function bindActived(){
    $('.ui-icon-check').bind('click',function(){
        $(this).removeClass('ui-icon-check');
        $(this).addClass('ui-icon-cancel');
        $(this).attr('title','未发布');
        bindUnactived();
    });
}
function bindUnactived(){
    $('.ui-icon-cancel').bind('click',function(){
        $(this).removeClass('ui-icon-cancel');
        $(this).addClass('ui-icon-check');
        $(this).attr('title','已发布');
        bindActived();
    });
}
</script>
<fieldset>
    <legend>搜索照片</legend>
    <form id="form-searchpictures" name="form-searchpictures" method="POST" action="usersmanage.php">
    <ul class="sl-table">
        <li><label>照片分类</label>
            <select name="catalogue">
                <option value="0">不限分类</option>
                <?php foreach($catalogue as $class){?>
                <option value="<?=$class['id']?>"><?=$class['title']?></option>
                <?php }?>
            </select>
        </li>
        <li><label>标题中包含关键字</label><input type="text" name="title"></li>
        <li><label>发布时间</label><input type="text" id="postStart" name="postStart" />之后，<input type="text" id="postEnd" name="postEnd"/>之前</li>
        <li><label>照片状态</label><input type="checkbox" name="commend" value="1">已推荐 <input type="checkbox" name="locked" value="1">已锁定 <input type="checkbox" name="actived" value="0">未发布</li>
        <li class="footer"><label>&nbsp;</label><input type="submit" name="submit" value="搜索"></li>
    </ul>
</form>
</fieldset>
<br/>
<div class="ui-state-highlight">
<p><span class="ui-icon ui-icon-info"></span>
所有照片</p>
</div>
<br/>
<fieldset>
    <legend>图片管理</legend>
    <form id="form-picturesmanage" method="post" action="picturesmanage.php">
    <ul class="images">
        <? foreach($pictures as $picture){
           $action="<span pictureid=$picture[id] picturetitle=$picture[title] class='ui-icon ui-icon-trash' title='删除'></span><span pictureid=$picture[id] picturetitle=$picture[title] title='修改' class='ui-icon ui-icon-wrench'></span>";
               if($picture['commended']){
                   $action.='<span title="已推荐" class="ui-icon ui-icon-pin-s"></span>';
               }else{
                   $action.='<span title="未推荐" class="ui-icon ui-icon-pin-w"></span>';
               }
               if($picture['locked']){
                   $action.='<span title="已锁定" class="ui-icon ui-icon-locked"></span>';
               }else{
                   $action.='<span title="未锁定" class="ui-icon ui-icon-unlocked"></span>';
               }
               if($picture['actived']){
                   $action.='<span title="已发布" class="ui-icon ui-icon-check"></span>';
               }else{
                   $action.='<span title="未发布" class="ui-icon ui-icon-cancel"></span>';
               }
        ?>
            <li>
                <?=$picture['thumb']?>&nbsp;<?=$action?><a href="uploads/images/<?=$picture['picture']?>" class="jqzoom" style="" title="<?=$picture['title']?>">
		<img src="uploads/images/<?=$picture['thumb']?>"  title="<?=$picture['title']?>"></a>
            </li>
        <? }?>
    </ul>
    </form>
    <p style="clear:both;"><span class="pagefooter"><a href="#">首页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">6</a><a href="#">7</a><a href="#">8</a><a href="#">9</a><a href="#">10</a>...<a href="#">尾页</a></span></p>
</fieldset>
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
$products=array(
    0=>array(
        'id'=>1,
        'thumb'=>'1_thumb.jpg',
        'product'=>'1.jpg',
        'title'=>'产品一'
    ),
    1=>array(
        'id'=>2,
        'thumb'=>'2_thumb.jpg',
        'product'=>'2.jpg',
        'title'=>'产品二'
    ),
    2=>array(
        'id'=>3,
        'thumb'=>'3_thumb.jpg',
        'product'=>'3.jpg',
        'title'=>'产品三'
    ),
    3=>array(
        'id'=>4,
        'thumb'=>'4_thumb.jpg',
        'product'=>'4.jpg',
        'title'=>'产品四'
    ),
    4=>array(
        'id'=>5,
        'thumb'=>'5_thumb.jpg',
        'product'=>'5.jpg',
        'title'=>'产品五'
    ),
    5=>array(
        'id'=>6,
        'thumb'=>'6_thumb.jpg',
        'product'=>'6.jpg',
        'title'=>'产品六'
    ),
    6=>array(
        'id'=>7,
        'thumb'=>'7_thumb.jpg',
        'product'=>'7.jpg',
        'title'=>'产品七'
    ),
    7=>array(
        'id'=>8,
        'thumb'=>'8_thumb.jpg',
        'product'=>'8.jpg',
        'title'=>'产品八'
    ),
);
?>
<script src="js/jqzoom.pack.1.0.1.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
    //删除确认
    $('.ui-icon-trash').bind('click',function(){
        if(confirm('确定要删除'+$(this).attr('producttitle')+'吗？')){
            alert($(this).attr('producttitle')+'删除成功');
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
       url='productsedit.php?id='+$(this).attr('productid');
       tabName=$(this).attr('producttitle');
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
    <legend>搜索产品</legend>
    <form id="form-searchproducts" name="form-searchproducts" method="POST" action="usersmanage.php">
    <ul class="sl-table">
        <li><label>产品分类</label>
            <select name="catalogue">
                <option value="0">不限分类</option>
                <?php foreach($catalogue as $class){?>
                <option value="<?=$class['id']?>"><?=$class['title']?></option>
                <?php }?>
            </select>
        </li>
        <li><label>标题中包含关键字</label><input type="text" name="title"></li>
        <li><label>发布时间</label><input type="text" id="postStart" name="postStart" />之后，<input type="text" id="postEnd" name="postEnd"/>之前</li>
        <li><label>产品状态</label><input type="checkbox" name="commend" value="1">已推荐 <input type="checkbox" name="locked" value="1">已锁定 <input type="checkbox" name="actived" value="0">未发布</li>
        <li class="footer"><label>&nbsp;</label><input type="submit" name="submit" value="搜索"></li>
    </ul>
</form>
</fieldset>
<br/>
<div class="ui-state-highlight">
<p><span class="ui-icon ui-icon-info"></span>
所有产品</p>
</div>
<br/>
<fieldset>
    <legend>产品管理</legend>
    <form id="form-productsmanage" method="post" action="productsmanage.php">
    <ul class="images">
        <? foreach($products as $product){
           $action="<span productid=$product[id] producttitle=$product[title] class='ui-icon ui-icon-trash' title='删除'></span><span productid=$product[id] producttitle=$product[title] title='修改' class='ui-icon ui-icon-wrench'></span>";
               if($product['commended']){
                   $action.='<span title="已推荐" class="ui-icon ui-icon-pin-s"></span>';
               }else{
                   $action.='<span title="未推荐" class="ui-icon ui-icon-pin-w"></span>';
               }
               if($product['locked']){
                   $action.='<span title="已锁定" class="ui-icon ui-icon-locked"></span>';
               }else{
                   $action.='<span title="未锁定" class="ui-icon ui-icon-unlocked"></span>';
               }
               if($product['actived']){
                   $action.='<span title="已发布" class="ui-icon ui-icon-check"></span>';
               }else{
                   $action.='<span title="未发布" class="ui-icon ui-icon-cancel"></span>';
               }
        ?>
            <li>
                <?=$product['thumb']?>&nbsp;<?=$action?><a href="uploads/images/<?=$product['product']?>" class="jqzoom" style="" title="<?=$product['title']?>">
		<img src="uploads/images/<?=$product['thumb']?>"  title="<?=$product['title']?>"></a>
            </li>
        <? }?>
    </ul>
    </form>
    <p style="clear:both;"><span class="pagefooter"><a href="#">首页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">6</a><a href="#">7</a><a href="#">8</a><a href="#">9</a><a href="#">10</a>...<a href="#">尾页</a></span></p>
</fieldset>
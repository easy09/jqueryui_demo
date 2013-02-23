<?php
$guestbook=array(
    0=>array(
      'id'=>1,
      'name'=>'张三',
      'address'=>'zhanshan@163.com',
      'content'=>'请问什么是jquery?'
    ),
    1=>array(
      'id'=>2,
      'name'=>'李四',
      'address'=>'0574-87788866',
      'content'=>'业务联系，请求合作'
    ),
    2=>array(
      'id'=>3,
      'name'=>'王五',
      'address'=>'QQ:57409999',
      'content'=>'你好，请加我QQ详聊'
    ),
);
?>
<fieldset>
    <legend>留言本</legend>
    <?php foreach($guestbook as $message){?>
    <ul class="sl-table">
        <li><label>姓名</label><?=$message['name']?></li>
        <li><label>联系方式</label><?=$message['address']?></li>
        <li><label>留言内容</label><?=$message['content']?></li>
        <li><label>回复</label><textarea name="replay" cols="50" rows="5"></textarea></li>
        <li><label>&nbsp;</label><input type="submit" name="submit" value="回复"><input type="submit" name="delete" value="删除"></li>
    </ul>
    <?php }?>
</fieldset>

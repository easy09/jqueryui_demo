<?php
//演示数据
$users=array(
    1=>array('id'=>1,'nickname'=>'zhansan','realname'=>'张三','email'=>'zhansan@163.com','group'=>'administrator','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    2=>array('id'=>2,'nickname'=>'lisi','realname'=>'李四','email'=>'lisi@163.com','group'=>'manager','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    3=>array('id'=>3,'nickname'=>'wangwu','realname'=>'王五','email'=>'wangwu@163.com','group'=>'editor','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    4=>array('id'=>4,'nickname'=>'zhaoliu','realname'=>'赵六','email'=>'zhaoliu@163.com','group'=>'users','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    5=>array('id'=>5,'nickname'=>'houqi','realname'=>'侯七','email'=>'houqi@163.com','group'=>'guest','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    6=>array('id'=>6,'nickname'=>'maba','realname'=>'马八','email'=>'maba@163.com','group'=>'guest','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    7=>array('id'=>7,'nickname'=>'zhanglong','realname'=>'张龙','email'=>'zhanglong@163.com','group'=>'guest','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    8=>array('id'=>8,'nickname'=>'zhaohu','realname'=>'赵虎','email'=>'zhaohu@163.com','group'=>'guest','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    9=>array('id'=>9,'nickname'=>'wangchao','realname'=>'王朝','email'=>'wangchao@163.com','group'=>'guest','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    10=>array('id'=>10,'nickname'=>'mahan','realname'=>'马汉','email'=>'mahan@163.com','group'=>'guest','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
);
$groups=array(
    'administrator'=>'超级管理员',
    'manager'=>'管理员',
    'editor'=>'网站编辑',
    'users'=>'普通用户',
    'guest'=>'访客'
);
foreach($users as $user){
    if($user['id']==$_GET['id']){
        break;
    }
}
?>
<form name="useredit" id="useredit" method="post" action="useredit.php">
    <ul class="sl-table">
        <li><label>Email</label><input type="text"  class="required" name="email" value="<?=$user['email']?>"></li>
        <li><label>用户分组</label>
            <select name="group">
                <?php foreach($groups as $key=>$group){?>
                <option value="<?=$key?>" <? if($user['group']==$key){?>selected<? }?>><?=$group?></option>
                <?php }?>
            </select>
        </li>
        <li><label>昵称</label><input type="text" name="nickname"  class="required" value="<?=$user['nickname']?>"></li>
        <li><label>真实姓名</label><input type="text" name="realname" value="<?=$user['realname']?>"></li>
        <li><label>是否锁定</label><input type="radio" name="locked" value="0"  <? if(!$user['locked']){?>checked<? }?>>未锁定 <input type="radio" name="locked" value="1" <? if($user['locked']){?>checked<? }?>>已锁定</li>
        <li><label>是否生效</label><input type="radio" name="activated" value="1"  <? if($user['actived']){?>checked<? }?>>已启用 <input type="radio" name="activated" value="0" <? if(!$user['actived']){?>checked<? }?>>未启用</li>
        <li class="footer"></li>
    </ul>
</form>

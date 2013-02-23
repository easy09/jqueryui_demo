<?php
//演示数据
$users=array(
    1=>array('id'=>1,'nickname'=>'zhansan','realname'=>'张三','email'=>'zhansan@163.com','password'=>'123456','group'=>'administrator','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    2=>array('id'=>2,'nickname'=>'lisi','realname'=>'李四','email'=>'lisi@163.com','password'=>'123456','group'=>'manager','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    3=>array('id'=>3,'nickname'=>'wangwu','realname'=>'王五','email'=>'wangwu@163.com','password'=>'123456','group'=>'editor','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    4=>array('id'=>4,'nickname'=>'zhaoliu','realname'=>'赵六','email'=>'zhaoliu@163.com','password'=>'123456','group'=>'users','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    5=>array('id'=>5,'nickname'=>'houqi','realname'=>'侯七','email'=>'houqi@163.com','password'=>'123456','group'=>'guest','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    6=>array('id'=>6,'nickname'=>'maba','realname'=>'马八','email'=>'maba@163.com','password'=>'123456','group'=>'guest','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    7=>array('id'=>7,'nickname'=>'zhanglong','realname'=>'张龙','email'=>'zhanglong@163.com','password'=>'123456','group'=>'guest','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    8=>array('id'=>8,'nickname'=>'zhaohu','realname'=>'赵虎','email'=>'zhaohu@163.com','password'=>'123456','group'=>'guest','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    9=>array('id'=>9,'nickname'=>'wangchao','realname'=>'王朝','email'=>'wangchao@163.com','password'=>'123456','group'=>'guest','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    10=>array('id'=>10,'nickname'=>'mahan','realname'=>'马汉','email'=>'mahan@163.com','password'=>'123456','group'=>'guest','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
);
foreach($users as $user){
    if($user['id']==$_GET['id']){
        break;
    }
}
?>
<form name="userpassword" id="userpassword" action="userpassword.php">
<label>请输入<?=$user['nickname']?>新密码：</label><input type="text" name="password" value="<?=$password?>">
</form>

<?php
$state=0;
//演示数据
$users=array(
    1=>array('id'=>1,'nickname'=>'zhansan','realname'=>'张三','email'=>'zhansan@163.com','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    2=>array('id'=>2,'nickname'=>'lisi','realname'=>'李四','email'=>'lisi@163.com','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    3=>array('id'=>3,'nickname'=>'wangwu','realname'=>'王五','email'=>'wangwu@163.com','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    4=>array('id'=>4,'nickname'=>'zhaoliu','realname'=>'赵六','email'=>'zhaoliu@163.com','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    5=>array('id'=>5,'nickname'=>'houqi','realname'=>'侯七','email'=>'houqi@163.com','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    6=>array('id'=>6,'nickname'=>'maba','realname'=>'马八','email'=>'maba@163.com','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    7=>array('id'=>7,'nickname'=>'zhanglong','realname'=>'张龙','email'=>'zhanglong@163.com','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    8=>array('id'=>8,'nickname'=>'zhaohu','realname'=>'赵虎','email'=>'zhaohu@163.com','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    9=>array('id'=>9,'nickname'=>'wangchao','realname'=>'王朝','email'=>'wangchao@163.com','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
    10=>array('id'=>10,'nickname'=>'mahan','realname'=>'马汉','email'=>'mahan@163.com','lastlogin'=>'2010-08-02','locked'=>FALSE,'actived'=>TRUE),
);
$groups=array(
    'administrator'=>'超级管理员',
    'manager'=>'管理员',
    'editor'=>'网站编辑',
    'users'=>'普通用户',
    'guest'=>'访客'
);
?>
<script type="text/javascript">
$(function(){
    $('#dialog').dialog('destroy');
    //日历控件
    $.datepicker.setDefaults("zh-CN");
    $("#registerStart").datepicker();
    $("#registerStart").datepicker()
    $("#registerEnd").datepicker();
    $("#lastloginStart").datepicker();
    $("#lastloginEnd").datepicker();
    //删除确认
    $('.ui-icon-trash').bind('click',function(){
        if(confirm('确定要删除'+$(this).attr('nickname')+'吗？')){
            alert($(this).attr('nickname')+'删除成功');
        }
    });
    bindUnlocked();
    bindLocked();
    bindActived();
    bindUnactived();
    bindModify();
    bindPassword();
});
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
        $(this).attr('title','已激活');
        bindUnactived();
    });
}
function bindUnactived(){
    $('.ui-icon-cancel').bind('click',function(){
        $(this).removeClass('ui-icon-cancel');
        $(this).addClass('ui-icon-check');
        $(this).attr('title','未激活');
        bindActived();
    });
}
function bindModify(){
    var doSubmit=function(){
        panelId=$('#panelId').attr('value');
        formId='#useredit';
        var options={
            target:panelId
        };
        $(formId).ajaxSubmit(options);//dialog弹出表单暂不支持表单验证
        $('#dialog').dialog('close');
    };
    var doCancel=function(){
        $('#dialog').dialog('close');
    };
    $('.ui-icon-wrench').click(function(){
        
        $('#dialog').load('useredit.php?id='+$(this).attr('userid'));
        var dialogOpts={
            title:'修改用户',
            modal:true,
            buttons:{
                '修改':doSubmit,
                '取消':doCancel
            },
            height:320,
            width:350,
            top:100
        }
        $('#dialog').dialog(dialogOpts);
    });
}
function bindPassword(){
    var doSubmit=function(){
        panelId=$('#panelId').attr('value');
        formId='#userpassword';
        var options={
            target:panelId
        };
        $(formId).ajaxSubmit(options);//dialog弹出表单暂不支持表单验证
        $('#dialog').dialog('close');
    };
    var doCancel=function(){
        $('#dialog').dialog('close');
    };
    $('.ui-icon-key').click(function(){
        $('#dialog').load('userpassword.php?id='+$(this).attr('userid'));
        var dialogOpts={
            title:'修改密码',
            modal:true,
            buttons:{
                '修改':doSubmit,
                '取消':doCancel
            },
            height:130,
            width:350,
            top:100
        }
        $('#dialog').dialog(dialogOpts);
    });
}
</script>

<fieldset id="sl-systemsetting">
    <legend>搜索用户</legend>
    <form id="form-searchuser" name="form-searchuser" method="POST" action="usersmanage.php">
    <ul class="sl-table">
        <li><label>Email</label><input type="text" name="email"></li>
        <li><label>用户分组</label>
            <select name="group">
                <?php foreach($groups as $key=>$group){?>
                <option value="<?=$key?>"><?=$group?></option>
                <?php }?>
            </select>
        </li>
        <li><label>昵称</label><input type="text" name="nickname"></li>
        <li><label>真实姓名</label><input type="text" name="realname"></li>
        <li><label>注册时间</label><input type="text" id="registerStart" name="registerStart" />之后，<input type="text" id="registerEnd" name="registerEnd"/>之前</li>
        <li><label>最后登录时间</label><input type="text" id="lastloginStart" name="lastloginStart">之后，<input type="text" id="lastloginEnd" name="registerEnd">之前</li>
        <li class="footer"><label>&nbsp;</label><input type="submit" name="submit" value="搜索"></li>
    </ul>
</form>
</fieldset>
<?php
if($state==1){?>
}
}
<div class="ui-state-highlight">
<p><span class="ui-icon ui-icon-info"></span>
发布成功时显示！</p>
</div>
<?php }elseif($state==2){?>
<div class="ui-state-error">
<p class="ui-state-error-text"><span class="ui-icon ui-icon-alert"></span>
发布失败时显示！</p>
</div>
<?php }?>
<fieldset id="sl-systemsetting">
    <legend>用户列表</legend>
    <table class="sl-table">
        <thead>
        <tr><td>昵称</td><td>真实姓名</td><td>电子邮件</td><td>最后登录时间</td><td>操作</td></tr>
        </thead>
        <tbody>
        <?php
            foreach($users as $user){
               $action="<span userid=$user[id] nickname=$user[nickname] class='ui-icon ui-icon-trash' title='删除'></span><span userid=$user[id] title='修改' class='ui-icon ui-icon-wrench'></span>";
               $action.="<span userid=$user[id] title='修改密码' class='ui-icon ui-icon-key'></span>";
               if($user['locked']){
                   $action.='<span title="已锁定" class="ui-icon ui-icon-locked"></span>';
               }else{
                   $action.='<span title="未锁定" class="ui-icon ui-icon-unlocked"></span>';
               }
               if($user['actived']){
                   $action.='<span title="已激活" class="ui-icon ui-icon-check"></span>';
               }else{
                   $action.='<span title="未激活" class="ui-icon ui-icon-cancel"></span>';
               }
               echo "<tr><td>$user[nickname]</td><td>$user[realname]</td><td>$user[email]</td><td>$user[lastlogin]</td><td>$action</td></tr>";
            }
        ?>
        </tbody>
    </table>
    <span class="pagefooter"><a href="#">首页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">6</a><a href="#">7</a><a href="#">8</a><a href="#">9</a><a href="#">10</a>...<a href="#">尾页</a></span></td>
</fieldset>
<fieldset id="sl-systemsetting">
    <legend>添加用户</legend>
    <form id="form-adduser" name="form-adduser" method="POST" action="usersmanage.php">
    <ul class="sl-table">
        <li><label>Email</label><input type="text" name="email"></li>
        <li><label>用户分组</label>
            <select name="group">
                <?php foreach($groups as $key=>$group){?>
                <option value="<?=$key?>"><?=$group?></option>
                <?php }?>
            </select>
        </li>
        <li><label>昵称</label><input type="text" name="nickname"></li>
        <li><label>真实姓名</label><input type="text" name="realname"></li>
        <li><label>密码</label><input type="text" name="password" value="123456"></li>
        <li><label>是否锁定</label><input type="radio" name="locked" value="0" checked>未锁定 <input type="radio" name="locked" value="1" >已锁定</li>
        <li><label>是否生效</label><input type="radio" name="activated" value="1" checked>启用 <input type="radio" name="activated" value="0">暂不启用</li>
        <li class="footer"><label>&nbsp;</label><input type="submit" name="submit" value="添加"></li>
    </ul>
    </form>
</fieldset>

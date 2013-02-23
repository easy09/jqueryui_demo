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
        <li class="footer"></li>
    </ul>
</form>
<?php
    error_reporting(0);
    //演示数据
    $catalogue  =   array(
      0=>array(
        'id'=>1,
        'name'=>'webscript',
        'title'=>'网页编程语言',
        'subclasses'=>array(
            0=>array(
                'id'=>4,
                'name'=>'php',
                'title'=>'php语言',
                'subclasses'=>array()
            ),
            1=>array(
                'id'=>5,
                'name'=>'asp',
                'title'=>'asp语言',
                'subclasses'=>array()
            ),
            2=>array(
                'id'=>6,
                'name'=>'javascript',
                'title'=>'javascript语言',
                'subclasses'=>array(
                    0=>array(
                        'id'=>7,
                        'name'=>'jQuery',
                        'title'=>'jQuery框架',
                        'subclasses'=>array()
                    ),
                )
            ),
        )
      ),
      1=>array(
        'id'=>2,
        'name'=>'os',
        'title'=>'操作系统'
      ),
      2=>array(
        'id'=>3,
        'name'=>'others',
        'title'=>'其它'
      ),
    );
    $table=getListString($catalogue);

//获取无限级分类表格
function getListString($catalogue,$tab=NULL){
    foreach($catalogue as $row){
        $action="<span downloadid=$row[id] downloadtitle=$row[title] class='ui-icon ui-icon-trash' title='删除'></span><span downloadid=$row[id] downloadtitle=$row[title] title='修改' class='ui-icon ui-icon-wrench'></span><span downloadid=$row[id] downloadtitle=$row[title] title='分配权限' class='ui-icon ui-icon-key'></span>";
        $string.=<<< STRING
        <tr>
            <td>$tab$row[title]</td>
            <td>$row[name]</td>
            <td>$action</td>
        </tr>
STRING;
        if(!empty($row['subclasses'])){
            $tab.='&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;&nbsp;';
            $string.=getListString($row['subclasses'],$tab);
            $tab=NULL;
        }
    }
    return $string;
}
?>
<script type="text/javascript">
$(function(){
    $('#dialog').dialog('destroy');
    //删除确认
    $('.ui-icon-trash').bind('click',function(){
        if(confirm('确定要删除'+$(this).attr('downloadtitle')+'吗？')){
            alert($(this).attr('downloadtitle')+'删除成功');
        }
    });
    bindModify();
    bindResource();
});
//修改分类
function bindModify(){
    var doSubmit=function(){   
        panelId=$('#panelId').attr('value');
        formId='#downloadedit';
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
        $('#dialog').load('downloadcatalogueedit.php?id='+$(this).attr('downloadid'));
        var dialogOpts={
            title:'修改下载文件分类',
            modal:true,
            buttons:{
                '取消':doCancel,
                '修改':doSubmit
            },
            height:450,
            width:350,
            top:100
        }
        $('#dialog').dialog(dialogOpts);
    });
}
//修改分类
function bindResource(){
    var doSubmit=function(){
        panelId=$('#panelId').attr('value');
        formId='#downloadedit';
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
        $('#dialog').load('downloadsresourcelevel.php?id='+$(this).attr('downloadid'));
        var dialogOpts={
            title:'分配下载文件分类权限',
            modal:true,
            buttons:{
                '取消':doCancel,
                '修改':doSubmit
            },
            height:450,
            width:350,
            top:100
        }
        $('#dialog').dialog(dialogOpts);
    });
}
</script>
<fieldset>
    <legend>下载文件分类管理</legend>
    <table class="sl-table">
        <thead>
        <tr><td>分类标题</td><td>分类名称</td><td>操作</td></tr>
        </thead>
        <tbody>
            <?=$table?>
        </tbody>
    </table>
</fieldset>
<br/>

<fieldset>
    <legend>添加分类</legend>
    <form id="form-downloadscatalogue" name="form-downloadscatalogue" method="POST" action="downloadscatalogue.php">
        <input name="formId" type="hidden" value="form-addAddress"/>
<ul id="sl-addAddress" class="sl-table">
    <li><label>分类名称(英文字符)</label><input type="text" name="name" class="required"/></li>
    <li><label>分类标题</label><input type="text" name="title" class="required"/></li>
    <li><label>&nbsp;</label><input type="submit" id="addAddress-submit" name="addAddress-subimt" value="添加"/></li>
</ul>
        </form>
</fieldset>
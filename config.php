<?php
error_reporting(0);
$title='jQuery UI标准后台页面演示系统';
$edition=' 0.2 Release 20100803';

$modules=array(
    'kenel'=>'核心系统',
    'articles'=>'文章',
    'pictures'=>'相册',
    'downloads'=>'下载',
    'products'=>'产品',
    'guestbook'=>'留言板'
);
$items=array(
    'kenel'=>array(
        'admin'         =>  '后台首页',
        'systemsetting' =>  '系统设置',
        'modules'       =>  '组件管理',
        'templates'     =>  '模板管理',
        'users'         =>  '用户管理',
        'resourcelevel' =>  '权限级别',
        'menus'         =>  '菜单管理',
        'images'        =>  '图片管理',
        'resource'      =>  '权限分配'
    ),
    'articles'=>array(
        'add'           =>  '添加文章',
        'manage'        =>  '文章列表',
        'classes'       =>  '分类管理',
        'setting'       =>  '组件设置'
    ),
    'pictures'=>array(
        'add'           =>  '添加照片',
        'manage'        =>  '照片列表',
        'classes'       =>  '分类管理',
        'setting'       =>  '组件设置'
    ),
    'downloads'=>array(
        'add'           =>  '添加文件',
        'manage'        =>  '文件列表',
        'classes'       =>  '分类管理',
        'setting'       =>  '组件设置'
    ),
    'products'=>array(
        'add'           =>  '添加产品',
        'manage'        =>  '产品列表',
        'classes'       =>  '分类管理',
        'setting'       =>  '组件设置'
    ),
    'guestbook'=>array(
        'manage'        => '留言管理',
        'setting'       => '组件设置'
    )
);
$tabs=array(
    'kenel-admin'=>array(
        0=>array('url'=>'admin.php','tabName'=>'后台首页'),
        1=>array('url'=>'systeminfo.php','tabName'=>'系统信息'),
        2=>array('url'=>'helper.html','tabName'=>'演示说明'),
    ),
    'kenel-systemsetting'=>array(
        0=>array('url'=>'systemsetting.php','tabName'=>'基本设置'),
        1=>array('url'=>'address.php','tabName'=>'联系方式')
    ),
    'kenel-modules'=>array(
        0=>array('url'=>'modules.php','tabName'=>'组件设置'),
    ),
    'kenel-templates'=>array(
        0=>array('url'=>'templates.php','tabName'=>'模板设置'),
    ),
    'kenel-users'=>array(
        0=>array('url'=>'usersmanage.php','tabName'=>'用户管理'),
        1=>array('url'=>'groupsmanage.php','tabName'=>'分组管理'),
    ),
    'kenel-menus'=>array(
        0=>array('url'=>'menusmanage.php','tabName'=>'自定义菜单'),
    ),
    'kenel-resourcelevel'=>array(
        0=>array('url'=>'kenelresource.php','tabName'=>'权限级别'),
    ),
    'kenel-images'=>array(
        0=>array('url'=>'imagesmanage.php','tabName'=>'图片管理')
    ),
    'kenel-resource'=>array(
        0=>array('url'=>'kenelresource.php','tabName'=>'权限分配')
    ),
    'articles-add'=>array(
        0=>array('url'=>'articlesadd.php','tabName'=>'添加文章'),
    ),
    'articles-manage'=>array(
        0=>array('url'=>'articleslist.php','tabName'=>'文章列表'),
    ),
    'articles-classes'=>array(
        0=>array('url'=>'articlescatalogue.php','tabName'=>'文章分类'),
    ),
    'articles-setting'=>array(
        0=>array('url'=>'articlessetting.php','tabName'=>'组件设置'),
        1=>array('url'=>'articlesresource.php','tabName'=>'权限分配')
    ),
    'pictures-add'=>array(
        0=>array('url'=>'picturesadd.php','tabName'=>'添加图片'),
    ),
    'pictures-manage'=>array(
        0=>array('url'=>'pictureslist.php','tabName'=>'图片管理'),
    ),
    'pictures-classes'=>array(
        0=>array('url'=>'picturescatalogue.php','tabName'=>'相册分类'),
    ),
    'pictures-setting'=>array(
        0=>array('url'=>'picturessetting.php','tabName'=>'组件设置'),
        1=>array('url'=>'picturesresource.php','tabName'=>'权限分配')
    ),
    'downloads-add'=>array(
        0=>array('url'=>'downloadsadd.php','tabName'=>'添加下载文件'),
    ),
    'downloads-manage'=>array(
        0=>array('url'=>'downloadslist.php','tabName'=>'下载管理'),
    ),
    'downloads-classes'=>array(
        0=>array('url'=>'downloadscatalogue.php','tabName'=>'下载文件分类'),
    ),
    'downloads-setting'=>array(
        0=>array('url'=>'downloadssetting.php','tabName'=>'组件设置'),
        1=>array('url'=>'downloadsresource.php','tabName'=>'权限分配')
    ),
    'products-add'=>array(
        0=>array('url'=>'productsadd.php','tabName'=>'添加产品'),
    ),
    'products-manage'=>array(
        0=>array('url'=>'productslist.php','tabName'=>'产品管理'),
    ),
    'products-classes'=>array(
        0=>array('url'=>'productscatalogue.php','tabName'=>'产品分类'),
    ),
    'products-setting'=>array(
        0=>array('url'=>'productssetting.php','tabName'=>'组件设置'),
        1=>array('url'=>'productsresource.php','tabName'=>'权限分配')
    ),
    'guestbook-manage'=>array(
        0=>array('url'=>'guestbook.php','tabName'=>'留言管理')
    ),
    'guestbook-setting'=>array(
        0=>array('url'=>'guestbooksetting.php','tabName'=>'组件设置'),
        1=>array('url'=>'guestbookresource.php','tabName'=>'权限分配')
    )
);

<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> <?php echo ($f_siteTitle); ?> <?php echo ($f_siteName); ?></title>
<meta name="keywords" content="<?php echo ($f_metaKeyword); ?>" />
<meta name="description" content="<?php echo ($f_metaDes); ?>" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<script>var SITEURL='';</script>

<script src="<?php echo RES;?>/js/common.js" type="text/javascript"></script>
</head>
<body id="nv_member" class="pg_CURMODULE">
<div id="wp" class="wp"><link href="<?php echo RES;?>/css/style-1.css?id=103" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style_2_common.css?BPm" />
<link rel="shortcut icon" href="<?php echo RES;?>/images/favicon.ico" />
<style>
a.a_upload,a.a_choose{border:1px solid #3d810c;box-shadow:0 1px #CCCCCC;-moz-box-shadow:0 1px #CCCCCC;-webkit-box-shadow:0 1px #CCCCCC;cursor:pointer;display:inline-block;text-align:center;vertical-align:bottom;overflow:visible;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;vertical-align:middle;background-color:#f1f1f1;background-image: -webkit-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); background-image: -moz-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); background-image: -ms-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); color:#000;border:1px solid #AAA;padding:2px 8px 2px 8px;text-shadow: 0 1px #FFFFFF;font-size: 14px;line-height: 1.5;
}

.pages{padding:3px;margin:3px;text-align:center;}
.pages a{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#036cb4;text-decoration:none;}
.pages a:hover{border:#999 1px solid;color:#666;}
.pages a:active{border:#999 1px solid;color:#666;}
.pages .current{border:#036cb4 1px solid;padding:2px 5px;font-weight:bold;margin:2px;color:#fff;background-color:#036cb4;}
.pages .disabled{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#ddd;}
</style>
 <script src="<?php echo STATICS;?>/jquery-1.4.2.min.js" type="text/javascript"></script>
 <?php if(session('isQcloud') == true): ?><link type="text/css" rel="stylesheet" href="http://qzonestyle.gtimg.cn/qcloud/app/open/v1/css/wxcloud.min.css" />


<style>
.px {
	background:#fff;

	border-color:#c9c9c9;

}


input[type=radio] {

	border-radius:55px;

	border: none;

}
.btnGreen {
	border:1px solid #FFFFFF;
	box-shadow:0 1px 1px #0A8DE4;
	-moz-box-shadow:0 1px 1px #0A8DE4;
	-webkit-box-shadow:0 1px 1px #0A8DE4;
	padding:5px 20px;
	cursor:pointer;
	display:inline-block;
	text-align:center;
	vertical-align:bottom;
	overflow:visible;
	border-radius:3px;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
*zoom:1;
	background-color:#5ba607;
	background-image:linear-gradient(bottom, #107BAD  3%, #18C2D1 97%, #18C2D1 100%);
	background-image:-moz-linear-gradient(bottom, #107BAD  3%, #0A8DE40 97%, #18C2D1 100%);
	background-image:-webkit-linear-gradient(bottom, #107BAD  3%,#0A8DE4 97%, #18C2D1 100%);
	color:#fff; font-size:14px; line-height: 1.5;
}
.btnGreen:hover {
	background-color:#5ba607;
	background-image:linear-gradient(bottom, #2F8BC9 3%, #2F8BC9 97%, #6AA2D6  100%);
	background-image:-moz-linear-gradient(bottom, #2F8BC9 3%, #2F8BC9 97%, #6AA2D6  100%);
	background-image:-webkit-linear-gradient(bottom, #2F8BC9 3%, #2F8BC9 97%, #6AA2D6  100%);
	color:#fff
}
.btnGreen:active {
	background-color:#5ba607;
	background-image:linear-gradient(bottom, #69b310 3%, #3d810c 97%, #fff 100%);
	background-image:-moz-linear-gradient(bottom, #69b310 3%, #3d810c 97%, #fff 100%);
	background-image:-webkit-linear-gradient(bottom, #69b310 3%, #3d810c 97%, #fff 100%);
	color:#fff
}

.btnGreen{border:1px solid #3d810c;box-shadow:0 1px 1px #aaa;-moz-box-shadow:0 1px 1px #aaa;-webkit-box-shadow:0 1px 1px #aaa;padding:5px 20px;cursor:pointer;display:inline-block;text-align:center;vertical-align:bottom;overflow:visible;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;*zoom:1;background-color:#5ba607;background-image:linear-gradient(bottom,#4d910c 3%,#69b310 97%,#fff 100%);background-image:-moz-linear-gradient(bottom,#4d910c 3%,#69b310 97%,#fff 100%);background-image:-webkit-linear-gradient(bottom,#4d910c 3%,#69b310 97%,#fff 100%);color:#fff;font-size:14px;line-height:1.5;}.btnGreen:hover{background-color:#5ba607;background-image:linear-gradient(bottom,#3d810c 3%,#69b310 97%,#fff 100%);background-image:-moz-linear-gradient(bottom,#3d810c 3%,#69b310 97%,#fff 100%);background-image:-webkit-linear-gradient(bottom,#3d810c 3%,#69b310 97%,#fff 100%);color:#fff}.btnGreen:active{background-color:#5ba607;background-image:linear-gradient(bottom,#69b310 3%,#3d810c 97%,#fff 100%);background-image:-moz-linear-gradient(bottom,#69b310 3%,#3d810c 97%,#fff 100%);background-image:-webkit-linear-gradient(bottom,#69b310 3%,#3d810c 97%,#fff 100%);color:#fff}

</style><?php endif; ?>
<?php
if (!isset($_SESSION['isQcloud'])){ ?>
<div class="topbg">
<div class="top">
<div class="toplink">
<style>
.topbg{background:url(<?php echo RES;?>/images/top.gif) repeat-x; height:30px; /*box-shadow:0 0 10px #000;-moz-box-shadow:0 0 10px #000;-webkit-box-shadow:0 0 10px #000;*/}
.top {
    margin: 0px auto; width: 988px; height: 30px;
}

.top .toplink{ height:30px; line-height:27px;font-size:12px;}
.top .toplink .welcome{ float:left;}
.top .toplink .memberinfo{ float:right;}
.top .toplink .memberinfo a{ /*color:#999;*/}
.top .toplink .memberinfo a:hover{ color:#F90}
.top .toplink .memberinfo a.green{ background:none; color:#0C0}

.top .logo {width: 990px; color: #333; height:70px; font-size:16px;}
.top h1{ font-size:25px;float:left; width:230px; margin:0; padding:0; margin-top:6px; }
.top .navr {WIDTH:750px; float:right; overflow:hidden;}
.top .navr ul{ width:850px;}
.navr li {text-align:center; float: left; height:70px; font-size:1em; width:103px; margin-right:5px;}
.navr li a {width:103px; line-height:70px; float: left; height:100%; color: #333; font-size: 1em; text-decoration:none;}
.navr li a:hover { background:#ebf3e4;}
.navr li.menuon {background:#ebf3e4; display:block; width:103px;}
.navr li.menuon a{color:#333;}
.navr li.menuon a:hover{color:#333;}
.banner{height:200px; text-align:center; border-bottom:2px solid #ddd;}
.hbanner{ background: url(img/h2003070126.jpg) center no-repeat #B4B4B4;}
.gbanner{ background: url(img/h2003070127.jpg) center no-repeat #264C79;}
.jbanner{ background: url(img/h2003070128.jpg) center no-repeat #E2EAD5;}
.dbanner{ background: url(img/h2003070129.jpg) center no-repeat #009ADA;}
.nbanner{ background: url(img/h2003070130.jpg) center no-repeat #ffca22;}
</style>
<div class="welcome">欢迎使用多用户微信营销服务平台!</div>
    <div class="memberinfo"  id="destoon_member">	
		<?php if($_SESSION[uid]==false): ?><a href="<?php echo U('Index/login');?>">登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<a href="<?php echo U('Index/login');?>">注册</a>
			<?php else: ?>
			<a href="<?php echo U('Index/index');?>">>>我的公众号</a>&nbsp;你好,<a href="/#" hidefocus="true"  ><span style="color:red"><?php echo (session('uname')); ?></span></a>（uid:<?php echo (session('uid')); ?>）
			<a href="<?php echo U('System/Admin/logout');?>" >退出</a><?php endif; ?>	
	</div>
	</div>
    </div>
</div>
<div id="aaa"></div>
<?php
} ?>

  <!--中间内容-->
 
  <div class="contentmanage"<?php if (isset($_SESSION['isQcloud'])){?> style="width:100%"<?php }?>>
  <?php
if (!isset($_SESSION['isQcloud'])){ ?>
    <div class="developer">
       <div class="appTitle normalTitle2">
        <div class="vipuser">


<div class="logo">
<img src="<?php echo ($wecha["headerpic"]); ?>" width="100" height="100">
</div>

<div id="nickname">
<strong><?php echo ($wecha["wxname"]); ?></strong><a href="#" target="_blank" class="vipimg vip-icon<?php echo $userinfo['taxisid']-1; ?>" title=""></a></div>
<div id="weixinid">微信号:<?php echo ($wecha["weixin"]); ?></div>
</div>

        <div class="accountInfo">
<table class="vipInfo" width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td><strong>VIP有效期：</strong><?php echo (date("Y-m-d",$thisUser["viptime"])); ?></td>
<td><strong>图文自定义：</strong><?php echo ($thisUser["diynum"]); ?>/<?php echo ($userinfo["diynum"]); ?></td>
<td><strong>请求数：</strong><?php echo ($thisUser["connectnum"]); ?>/<?php echo ($userinfo["connectnum"]); ?></td>
</tr>
<tr>
<td><strong>请求数剩余：</strong><?php echo ($userinfo['connectnum']-$_SESSION['connectnum']); ?></td>
<td><strong>已使用：</strong><?php echo $_SESSION['diynum']; ?></td>
<td><strong>当月剩余请求数：</strong><?php echo $userinfo['connectnum']-$_SESSION['connectnum']; ?></td>
</tr>

</table>
    </div>
        <div class="clr"></div>
      </div>
      <!--左侧功能菜单-->

 
<style type="text/css">
#sideBar{
border-right: 0px solid #D3D3D3 !important;
float: left;
padding: 0 0 10px 0;
width: 170px;
background: #fff;
}
.tableContent {
background: none repeat scroll 0 0 #f5f6f7;
padding: 0;
}
.tableContent .content {
border-left: 1px solid #D7DDE6 !important;
}
ul#menu, ul#menu ul {
  list-style-type:none;
  margin: 0;
  padding: 0;
  background: #fff;
}

ul#menu a {
  display: block;
  text-decoration: none;
}

ul#menu li {
  margin: 1px;
}
ul#menu li ul li{
  margin: 1px 0;
}
ul#menu li a {
  background: #EBEEF1;
  color: #464D6A;
  padding: 0.5em;
}
ul#menu li .nav-header{
font-size:14px;
border-bottom: 1px solid #D7DDE6;
}
ul#menu li .nav-header:hover {
  background: #DDE4EB;
}

ul#menu li ul li a {
  background: #FCFCFC;
  color: #8288A4;
  padding-left: 20px;
}
ul#menu li ul li:last-child {
    border-bottom: 1px solid #D7DDE6;
}
ul#menu li ul li a:hover {
  background: #fff;
  border-left: 5px #4A98E0 solid;

}
ul#menu li.selected a{
  background: #fff;
  border-left: 5px #4A98E0 solid;
  padding-left: 15px;
  color: #4A98E0;
}
.code { border: 1px solid #ccc; list-style-type: decimal-leading-zero; padding: 5px; margin: 0; }
.code code { display: block; padding: 3px; margin-bottom: 0; }
.code li { background: #ddd; border: 1px solid #ccc; margin: 0 0 2px 2.2em; }
.indent1 { padding-left: 1em; }
.indent2 { padding-left: 2em; }
.tableContent .content{min-height: 1328px;}

a.nav-header{background:url(/tpl/static/images/arrow_click.png) center right no-repeat;cursor:pointer}
a.nav-header-current{background:url(/tpl/static/images/arrow_unclick.png) center right no-repeat;}
</style> 
<?php
} ?>
      <div class="tableContent">
        <?php
if (!isset($_SESSION['isQcloud'])){ ?>
        <!--左侧功能菜单-->
 <div  class="sideBar" id="sideBar">
<div class="catalogList">
<ul id="menu">
<?php
$menus=array( array( 'name'=>'基础设置', 'iconName'=>'base', 'display'=>0, 'subs'=>array( array('name'=>'关注时回复与帮助','link'=>U('Areply/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Areply')), array('name'=>'微信－文本回复','link'=>U('Text/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Text')), array('name'=>'微信－图文回复','link'=>U('Img/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Img')), array('name'=>'自定义菜单','link'=>U('Diymen/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Diymen')), array('name'=>'回答不上来的配置','link'=>U('Other/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Other')), )), array( 'name'=>'分销管理', 'iconName'=>'crm', 'display'=>0, 'subs'=>array( array('name'=>'分销设置','link'=>U('Distribution/set',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Distribution','a'=>'set')), array('name'=>'分销提醒页','link'=>U('Distribution/forwardSet',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Distribution','a'=>'forwardSet')), )), array( 'name'=>'会员管理', 'iconName'=>'card', 'display'=>0, 'subs'=>array( array('name'=>'会员列表','link'=>U('Distribution/member',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Distribution','a'=>'member')), array('name'=>'红包列表','link'=>U('Distribution/redList',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Distribution','a'=>'redList')), array('name'=>'红包发放详情','link'=>U('Distribution/audit',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Distribution','a'=>'audit')), array('name'=>'提现记录列表','link'=>U('Distribution/moneylist',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Distribution','a'=>'moneylist')), )), array( 'name'=>'商城系统', 'iconName'=>'store', 'display'=>0, 'subs'=>array( array('name'=>'微信商城系统','link'=>U('Store/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Store')), )), array( 'name'=>'拼团系统', 'iconName'=>'ptuser', 'display'=>0, 'subs'=>array( array('name'=>'商品管理','link'=>U('Ptsys/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Ptsys')), array('name'=>'订单管理','link'=>U('Order/team',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Order',)), array('name'=>'参团会员','link'=>U('Member/index',array('token'=>$token)),'new'=>0,'selectedCondition'=>array('m'=>'Member',)), )), ); ?>
<?php
$i=0; $parms=$_SERVER['QUERY_STRING']; $parms1=explode('&',$parms); $parmsArr=array(); if ($parms1){ foreach ($parms1 as $p){ $parms2=explode('=',$p); $parmsArr[$parms2[0]]=$parms2[1]; } } $subMenus=array(); $t=0; $currentMenuID=0; $currentParentMenuID=0; foreach ($menus as $m){ $loopContinue=1; if ($m['subs']){ $st=0; foreach ($m['subs'] as $s){ $includeArr=1; if ($s['selectedCondition']){ foreach ($s['selectedCondition'] as $condition){ if (!in_array($condition,$parmsArr)){ $includeArr=0; break; } } } if ($includeArr){ if ($s['exceptCondition']){ foreach ($s['exceptCondition'] as $epkey=>$eptCondition){ if ($epkey=='a'){ $parm_a_values=explode(',',$eptCondition); if ($parm_a_values){ if (in_array($parmsArr['a'],$parm_a_values)){ $includeArr=0; break; } } }else { if (in_array($eptCondition,$parmsArr)){ $includeArr=0; break; } } } } } if ($includeArr){ $currentMenuID=$st; $currentParentMenuID=$t; $loopContinue=0; break; } $st++; } if ($loopContinue==0){ break; } } $t++; } foreach ($menus as $m){ $displayStr=''; if ($currentParentMenuID!=0||0!=$currentMenuID){ $m['display']=0; } if (!$m['display']){ $displayStr=' style="display:none"'; } if ($currentParentMenuID==$i){ $displayStr=''; } $aClassStr=''; if ($displayStr){ $aClassStr=' nav-header-current'; } if($i == 0){ echo '<a class="nav-header'.$aClassStr.'" style="border-top:none !important;"><b class="'.$m['iconName'].'"></b>'.$m['name'].'</a><ul class="ckit"'.$displayStr.'>'; }else{ echo '<a class="nav-header'.$aClassStr.'"><b class="'.$m['iconName'].'"></b>'.$m['name'].'</a><ul class="ckit"'.$displayStr.'>'; } if ($m['subs']){ $j=0; foreach ($m['subs'] as $s){ $selectedClassStr='subCatalogList'; if ($currentParentMenuID==$i&&$j==$currentMenuID){ $selectedClassStr='selected'; } $newStr=''; if ($s['test']){ $newStr.='<span class="test"></span>'; }else { if ($s['new']){ $newStr.='<span class="new"></span>'; } } if ($s['name']!='微信墙'&&$s['name']!='摇一摇'){ echo '<li class="'.$selectedClassStr.'"> <a href="'.$s['link'].'">'.$s['name'].'</a>'.$newStr.'</li>'; }else { switch ($s['name']){ case '微信墙': case '摇一摇': if (file_exists($_SERVER['DOCUMENT_ROOT'].'/PigCms/Lib/Action/User/WallAction.class.php')&&file_exists($_SERVER['DOCUMENT_ROOT'].'/PigCms/Lib/Action/User/ShakeAction.class.php')){ echo '<li class="'.$selectedClassStr.'"> <a href="'.$s['link'].'">'.$s['name'].'</a>'.$newStr.'</li>'; } break; } } if ($s['name']=='模板管理'&&is_dir($_SERVER['DOCUMENT_ROOT'].'/cms')&&!strpos($_SERVER['HTTP_HOST'],'pigcms')){ echo '<li class="subCatalogList"> <a href="/cms/manage/index.php">高级模板</a><span class="new"></span></li>'; } $j++; } } echo '</ul>'; $i++; } ?>


</ul>
</div>
</div>
<?php
} ?>
<script type="text/javascript">

	$(document).ready(function(){
		$(".nav-header").mouseover(function(){
			$(this).addClass('navHover');
		}).mouseout(function(){
			$(this).removeClass('navHover');
		}).click(function(){
			$(this).toggleClass('nav-header-current');
			$(this).next('.ckit').slideToggle();
		})
	});

</script>
<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.css" />
<script src="<?php echo STATICS;?>/kindeditor/kindeditor.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/lang/zh_CN.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/kindeditor/plugins/code/prettify.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="<?php echo STATICS;?>/artDialog/plugins/iframeTools.js"></script>
<script>

var editor;
KindEditor.ready(function(K) {
editor = K.create('#info', {
resizeType : 1,
allowPreviewEmoticons : false,
allowImageUpload : true,
uploadJson : '/index.php?g=User&m=Upyun&a=kindedtiropic',
items : [
            'source','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
            'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
            'insertunorderedlist', '|', 'emoticons', 'image', 'multiimage', 'link', 'music', 'video']
});

});
</script>

<div class="content">

          <div class="cLineB">
          <h4>商品设置</h4>
          <a href="javascript:history.go(-1);"  class="right btnGrayS vm" style="margin-top:-27px" >返回</a></div>
          
          <form method="post"   action=""  enctype="multipart/form-data" >
          <div class="msgWrap form">

              <TABLE class="userinfoArea" border="0" cellSpacing="0" cellPadding="0" width="100%">
              <input type="hidden" name="add_time" value="
              <?php echo time();?>">
              <THEAD>
                <TR>
                  <TH style="width:120px" valign="top">
                  <span style="color:red">*</span>商品名称：</TH>
                  <TD>
                  <input type="text" class="px"  value="<?php echo ($vo["goods_name"]); ?>"  name="goods_name" style="width:580px;">
                </TR>
              </THEAD>

              <TBODY>

<!--               <TH valign="top"><span style="color:red">*</span>简介：</TH>
<TD>
<textarea  class="px" id="Hfcontent"  name="goods_brief" style="width:580px;  height:100px"><?php echo ($vo["goods_brief"]); ?>
</textarea><br />限制200字内
</TD>
 -->
 <!--              <tr>
     <TH style="width:120px" valign="top">商品货号：</TH>
     <TD>
     <input type="text" class="px"  value="<?php echo ($vo["goods_sn"]); ?>"  name="goods_sn" style="width:100px;">
     如果您不输入商品货号，系统将自动生成一个唯一的货号。
     </TD>
 </tr> -->
              
              <tr>
                  <TH style="width:120px" valign="top"><span style="color:red">*</span>本店售价：</TH>
                  <TD><input type="text" class="px"  value="<?php echo ($vo["shop_price"]); ?>"  name="shop_price" style="width:100px;">
                   如果是团购请设置
                  </TD>
              </tr>

              

              <tr>
                  <TH style="width:120px" valign="top"><span style="color:red">*</span>团购价格：</TH>
                  <TD><input type="text" class="px"  value="<?php echo ($vo["team_price"]); ?>"  name="team_price" style="width:100px;">
                  如果是团购请设置
                  </TD>
              </tr>

              <tr>
                  <TH style="width:120px" valign="top"><span style="color:red">*</span>市场价格：</TH>
                  <TD><input type="text" class="px"  value="<?php echo ($vo["market_price"]); ?>"  name="market_price" style="width:100px;">
                  如果是团购请设置
                  </TD>
              </tr>
              
              <tr>
                  <TH style="width:120px" valign="top"><span style="color:red">*</span>参团人数：</TH>
                  <TD><input type="text" class="px" name="team_num" value="<?php echo ($vo["team_num"]); ?>"  style="width:100px;">
                  如果是团购请设置
                  </TD>
              </tr>



    <!--           <tr>
        <TH style="width:120px" valign="top">商品重量：</TH>
        <TD><input type="text" class="px"  value="<?php echo ($vo["goods_weight"]); ?>"  name="goods_weight" style="width:100px;">  &nbsp Kg
        </TD>
    </tr> -->

              <tr>
                  <TH style="width:120px" valign="top"><span style="color:red">*</span>库存数量：</TH>
                  <TD><input type="text" class="px"  value="<?php echo ($vo["goods_number"]); ?>"  name="goods_number" style="width:100px;">
                  商品的库存数量
                  </TD>
              </tr>

              <tr>
                  <TH style="width:120px" valign="top"><span style="color:red">*</span>运费：</TH>
                  <TD><input type="text" class="px"  value="<?php echo ($vo["mail_price"]); ?>"  name="mail_price" style="width:100px;">
                 运费
                  </TD>
              </tr>

              <tr>
                  <TH style="width:120px" valign="top"><span style="color:red">*</span>排序：</TH>
                  <TD><input type="text" class="px"  value="<?php echo ($vo["sort_order"]); ?>"  name="sort_order" style="width:100px;">
                 数字越大越靠前
                  </TD>
              </tr>

<!--               <TR>
    <TH valign="top"><span style="color:red">*</span>团购限制次数：</TH>
    <TD>
    是<input class="radio" type="radio" name="limit_buy_one" value="1" <?php if(($vo["limit_buy_one"]) == "1"): ?>checked<?php endif; ?> > 
    否<input class="radio" type="radio" name="limit_buy_one" value="0" <?php if(($vo["limit_buy_one"]) == "0"): ?>checked<?php endif; ?>>
    <span>一个会员只能购买一次</span>                  
    </TD>
</TR> -->

              <TR>
                  <TH valign="top">加入推荐：</TH>

                  <TD>
                      <input type="checkbox" name="is_best" value="1"   
                      <?php if(($vo["is_best"]) == "1"): ?>checked<?php endif; ?>>精品
                      <input type="checkbox" name="is_new"  value="1"   
                      <?php if(($vo["is_new"]) == "1"): ?>checked<?php endif; ?>>新品
                      <input type="checkbox" name="is_hot"  value="1"   
                      <?php if(($vo["is_hot"]) == "1"): ?>checked<?php endif; ?>>热销
                  </TD>

              </TR>

             <TR>
                  <TH valign="top">上架：</TH>

                  <TD>
                  是
                      <input type="radio" name="is_on_sale" value="1"   
                      <?php if(($vo["is_on_sale"]) == "1"): ?>checked<?php endif; ?>>
                  否    
                   <input type="radio" name="is_on_sale" value="0"   
                      <?php if(($vo["is_on_sale"]) == "0"): ?>checked<?php endif; ?>>

                  </TD>

              </TR>
  
              <TR>
                  <TH valign="top"><span style="color:red">*</span>商品分类：</TH>
                  <TD>
                  <select name="cat_id" id="">

                  <?php if($cat1 != null): ?><option value="<?php echo ($cat1["cat_id"]); ?>">
                    <?php echo ($cat1["cat_name"]); ?></option>               
                      
                    <?php else: ?>
                    <option value="">---请选择---</option><?php endif; ?>
                    <?php echo ($cat); ?>
                  </select>
                  </TD>
              </TR>




              <TR>
                <TH valign="top"><span style="color:red">*</span>商品图片：</TH>
                <TD>
                <input type="text" class="px"  name="goods_img" id="pic" value="<?php echo ($vo["goods_img"]); ?>" style="width:580px;"  />  
                <script src="<?php echo STATICS;?>/upyun.js?<?php echo date('YmdHis',time());?>">
                </script>

                <a href="###" onclick="upyunPtuserPicUpload('pic',700,420,'<?php echo ($token); ?>')" class="a_upload">上传</a> 
                <a href="###" onclick="viewImg('pic')">预览</a>
                </TD>
              </TR>
      

<!--               <TR>
  <TH valign="top"><span style="color:red">*</span>商品缩略图：</TH>
  <TD>

  <input type="text" class="px"  name="little_img" id="pic" value="<?php echo ($vo["little_img"]); ?>" style="width:580px;"  />  

  <script src="/tpl/static/upyun.js?<?php echo date('YmdHis',time());?>">
  </script>
  <a href="###" onclick="upyunPtuserPicUpload('pic',700,420,'<?php echo ($token); ?>')" class="a_upload">上传</a> 
  <a href="###" onclick="viewImg('pic')">预览</a>
  </TD>
</TR>
            -->
<!-- 
              <TR>
                <TH valign="top">拼团矩形图：</TH>
                <TD>
                <input type="text" class="px"  name="goods_thumb" id="pic" value="<?php echo ($vo["goods_thumb"]); ?>" style="width:580px;"  />  
                <script src="/tpl/static/upyun.js?<?php echo date('YmdHis',time());?>">
                </script>
                <a href="###" onclick="upyunPicUpload('pic',700,420,'<?php echo ($token); ?>')" class="a_upload">上传</a> 
                <a href="###" onclick="viewImg('pic')">预览</a>
                </TD>
              </TR> -->

                <TR>
                  <TH valign="top"><span style="color:red">*</span>详细描述：</TH>

                  <TD>
                  <textarea name="goods_desc" id="info"  rows="5" style="width:590px;height:360px"   >
                   <?php echo ($vo["goods_desc"]); ?>
                  </textarea>
                  </TD>
                </TR>
                
                <TR>
                  <TH></TH>
                  <TD><input type="submit" value="保存"  class="btnGreen left">　
                  <a href="<?php echo U('Ptsys/index');?>"  class="btnGray vm">取消</a>
                  </TD>
                </TR>
              </TBODY>
            </TABLE>
            
          </div>
          </form>

        </div>     
 
        <div class="clr"></div>
      </div>
    </div>
  </div> 
<!--底部-->
    </div>
<?php if(session('isQcloud') != true): ?></div>
</div>
</div>

<style>
.IndexFoot {
	BACKGROUND-COLOR: #0A8FDB; WIDTH: 100%; HEIGHT: 39px
}
.foot{ width:988px; margin:0px auto; font-size:12px; line-height:39px;}
.foot .foot_page{ float:left; width:600px;color:white;}
.foot .foot_page a{ color:white; text-decoration:none;}
#copyright{ float:right; width:380px; text-align:right; font-size:12px; color:#FFF;}
</style>
<div class="IndexFoot" style="height:120px;clear:both">
<div class="foot" style="padding-top:20px;">
<div class="foot_page" >
<a href="<?php echo ($f_siteUrl); ?>"><?php echo ($f_siteName); ?>,微信公众平台营销</a><br/>
帮助您快速搭建属于自己的营销平台,构建自己的客户群体。
</div>
<div id="copyright" style="color:white;">
	<?php echo ($f_siteName); ?>(c)版权所有 <a href="http://www.miibeian.gov.cn" target="_blank" style="color:white"><?php echo C('ipc');?></a><br/>
	技术支持：微广互动</a>

</div>
    </div>
</div>
<div style="display:none">
<?php echo ($alert); ?> 
<?php echo base64_decode(C('countsz'));?>
<!-- <script src="http://s15.cnzz.com/stat.php?id=5524076&web_id=5524076" language="JavaScript"></script>
 --></div>

</body>
</html><?php endif; ?>
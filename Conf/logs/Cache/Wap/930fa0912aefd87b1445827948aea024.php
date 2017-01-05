<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>用户中心</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
<link rel="stylesheet" href="<?php echo RES;?>/distri/css/jquery.mobile-1.3.2.min.css">
<script src="<?php echo RES;?>/distri/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo RES;?>/distri/js/jquery.mobile-1.3.2.min.js"></script>
<style>
.ui-content{padding:0}
.ui-btn{text-align:left}
.header{display:-webkit-box;-webkit-box-align:center;}
.header img{width:25%;display:block}
.header div{padding-left:5%;font-size:16px;line-height:25px;font-weight:bold}
.middleShow{display:-webkit-box;text-align:center;height:50px;line-height:50px;color:#fff;}
.middleShow span{display:block;background:url(<?php echo RES;?>/distri/images/bg2014.jpg) repeat;width:50%;}
.middleShow span.leftInfo{border-right:1px #fff solid;border-top:1px #fff solid}
.middleShow span.rightInfo{border-top:1px #fff solid}
</style>
</head>
<body >

<div data-role="page" id="pageone" style="background:#fff4a7">
  <div data-role="content" data-theme="e">
   <div style="padding:30px 20px;background:url(<?php echo ($set["topbg"]); ?>) repeat">
     <div class="header"><img <?php if(($my["headimgurl"]) == ""): ?>src="<?php echo RES;?>/distri/images/portrait.jpg"<?php else: ?>src="<?php echo ($my["headimgurl"]); ?>"<?php endif; ?>><div><span>分店ID：<?php echo $my['id']+$set['startNums'];?></span><br/>
	 <span>昵称：<?php if(($my["headimgurl"]) == ""): ?>未获取<?php else: echo ($my["nickname"]); endif; ?></span><br/>
	 <span>关注时间：<?php echo (date('Y-m-d',$my["createtime"])); ?></span><br/>
	 <span>来自好友：<?php if(($my["recommended"]) == ""): ?>红日化妆品<?php else: echo ($my["recommended"]); endif; ?></span><br/>
	 <span>分店：<?php if(($my["distritime"]) == "0"): ?>否<a href="<?php echo C('site_url');?>/index.php?g=Wap&m=Store&a=product&token=mhfcjx1421158741&id=12" rel="external" style="color:red">(点此购买成为分店)</a><?php else: ?>是<?php endif; ?></span></div></div>
   </div>
   <div class="middleShow">
		<span class="leftInfo">余额：<?php echo sprintf("%.2f",($order['status_4']-$my['alreadyGetMoney'])/100);?>元</span><span class="rightInfo">积分：<?php echo intval($totalScore);?>分</span>
   </div>
   <div style="padding:30px 20px;">
		<?php if(($_GET['notBe']) == "1"): ?><div style="color:red;text-align:center;line-height:40px;">您目前还未获得分店资格！</div><?php endif; ?>
		<a href="<?php echo U('Store/my',array('token'=>$token,'wecha_id'=>$wecha_id));?>" data-role="button" data-icon="arrow-r" rel="external" data-iconpos="right">我的订单</a>
		<a href="<?php echo U('Distribution/myDistribution',array('token'=>$_GET['token'],'wecha_id'=>$wecha_id));?>" rel="external" data-role="button" data-icon="arrow-r"  data-iconpos="right">我的分店</a>
		<a href="<?php echo U('Distribution/collection',array('token'=>$token,'wecha_id'=>$wecha_id));?>" rel="external" data-role="button" data-icon="arrow-r" data-iconpos="right">我的收藏</a>
		<a href="<?php echo U('Distribution/myInfo',array('token'=>$token,'wecha_id'=>$wecha_id));?>" data-role="button" rel="external" data-icon="arrow-r" data-iconpos="right">我的资料</a>
		<a href="<?php echo U('Distribution/myScanner',array('token'=>$token,'mid'=>$my['id']));?>" data-role="button" rel="external" data-icon="arrow-r" data-iconpos="right">我的推广二维码</a>
		<a <?php if(($update) == "1"): ?>href="#popupBasic"<?php else: ?>href="#popupBasicNo"<?php endif; ?> data-role="button" data-rel="popup" data-icon="arrow-r" data-iconpos="right">更新头像昵称</a>
   </div>
   <div data-role="popup" id="popupBasic">
	<div style="padding:20px;">
	<p>每天只能更新一次，您确定要更新吗？</p> 
	<a href="<?php echo U('Distribution/updateMyInfo',array('token'=>$token,'wecha_id'=>$wecha_id));?>" rel="external" data-role="button" style="text-align:center">是</a>
	<a href="#" data-role="button" data-rel="back" style="text-align:center">否</a>
	</div>
  </div>
   <div data-role="popup" id="popupBasicNo">
	<div style="padding:20px;">
	<p>您今天已经更新过了</p> 
	<a href="#" data-role="button" data-rel="back" style="text-align:center">关闭</a>
	</div>
  </div>
</div> 
<script>
function onBridgeReady(){
 WeixinJSBridge.call('hideOptionMenu');
}

if (typeof WeixinJSBridge == "undefined"){
    if( document.addEventListener ){
        document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
    }else if (document.attachEvent){
        document.attachEvent('WeixinJSBridgeReady', onBridgeReady); 
        document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
    }
}else{
    onBridgeReady();
}
</script>
</body>
</html>
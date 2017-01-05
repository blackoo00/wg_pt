<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" /><meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta name="format-detection" content="telephone=no"/>
<title><?php echo ($metaTitle); ?></title>
<script src="<?php echo RES;?>/css/store/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="<?php echo RES;?>/css/store/js/jquery.lazyload.js" type="text/javascript"></script>
<script src="<?php echo RES;?>/css/store/js/notification.js" type="text/javascript"></script>
<script src="<?php echo RES;?>/css/store/js/swiper.min.js" type="text/javascript"></script>
<script src="<?php echo RES;?>/css/store/js/main.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="<?php echo RES;?>/css/store/css/style_touch10.css">
</head>
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
<body>
<div id="top"></div>
<div id="scnhtm5" class="m-body">
<div class="m-detail-mainout">
<div><img src="http://tzhrmy.tzwg.net/uploads/m/mhfcjx1421158741/e/d/f/f/thumb_557ba1890ffb2.jpg" width="100%"></div>
<div class="m-hd" style="position:relative">
<div style="position:absolute;top:-44px;left:10px;"><img src="http://tzhrmy.tzwg.net/uploads/m/mhfcjx1421158741/d/7/0/5/thumb_5593b1ce10a76.jpg" style="width:80px;border-radius:8px;border:1px solid #C9C9C9"></div>
<div style="position:absolute;top:-34px;left:100px;font-size:20px;color:#fff; font-family:Microsoft YaHei;text-shadow:#000 5px 5px 5px;">红日玩赚商城</div>
<!--div><a href="javascript:history.go(-1);" class="back">返回</a></div-->
<div class="tit"></div>
<div><a href="<?php echo U('Store/products',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id']));?>" class="all"><span style="display:block;padding-top:40px;text-align:center">全部宝贝</span></a></div>
<div><a href="<?php echo U('Store/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id']));?>" class="cart"><span style="display:block;padding-top:40px;text-align:center">购物车</span><i class="cart_com"><?php if($totalProductCount != 0): echo ($totalProductCount); endif; ?></i></a></div>
<div><a href="<?php echo U('Store/my',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id']));?>" class="uc"><span style="display:block;padding-top:40px;text-align:center">我的订单</span></a></div>
<div><a href="<?php echo U('Store/cats',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id']));?>" class="cat"><span style="display:block;padding-top:40px;text-align:center">商品分类</span></a></div>
<span style="width:10px;display:block"></span>
</div>
<ul class="sub-menu-list">
<li><a href="<?php echo U('Store/cats',array('token' => $_GET['token'], 'catid' => $hostlist['id'], 'wecha_id' => $wecha_id));?>">首页</a></li>
<?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hostlist): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Store/products',array('token' => $_GET['token'], 'catid' => $hostlist['id'], 'wecha_id' => $wecha_id));?>"><?php echo ($hostlist["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>

<!--form id="search_form" name="search_form" action="" method="post">
	<div class="m-l-search">
		<input type="hidden" name="wecha_id" value="<?php echo ($wecha_id); ?>">
		<input type="hidden" name="token" value="<?php echo ($token); ?>">
		<input id="search_name" class="inp-search" name="search_name" type="search" value="" placeholder="输入关键字搜索">
		<input class="btn-search" name="search-btn" type="submit" value="">
	</div>
</form-->

<!--div class="m-select c666 order_control">
<span><a href="javascript:" order="time" class="arrow-down">时间<i><em></em></i></a></span>
<span><a href="javascript:" order="salecount">销量<i><em></em></i></a></span>
<span><a href="javascript:" order="price">价格<i><em></em></i></a></span>
<span><a href="javascript:" order="discount">折扣<i><em></em></i></a></span>
<input type="hidden" id="view_list" value="">
<!-- <span class="filter"><a href="javascript:;" class="ary li">排列</a><a href="javascript:;" class="flt">筛选</a></span> -->
</div-->
<?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?><div class="cate"><span class="more"><a href="<?php echo U('Store/products',array('token' => $_GET['token'], 'catid' => $cat['id'], 'wecha_id' => $wecha_id));?>" style="color:#fff">更多></a></span><span class="title"><?php echo ($cat["name"]); ?></span></div>
<ul id="m_list" class="m-list " style="overflow:hidden">
<?php if(is_array($cat["products"])): $i = 0; $__LIST__ = $cat["products"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hostlist): $mod = ($i % 2 );++$i;?><li>
		<div style="width:95%;margin:0 auto;background:#fff;">
		<span class="pic">
			<a href="<?php echo U('Store/product',array('token' => $_GET['token'], 'id' => $hostlist['id'], 'wecha_id' => $_GET['wecha_id']));?>">
			<img src="<?php echo ($hostlist["logourl"]); ?>" data-original="<?php echo ($hostlist["logourl"]); ?>" style="width:100%;height:120px;">
			</a>
			<a class="t" href="<?php echo U('Store/product',array('token' => $_GET['token'], 'id' => $hostlist['id'], 'wecha_id' => $_GET['wecha_id']));?>"><?php echo (msubstr($hostlist["name"],0,15)); ?></a><br/>
			<b>￥<?php echo ($hostlist["price"]); ?></b><del>￥<?php echo ($hostlist["oprice"]); ?></del>
		</span>
		</div>
	</li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul><?php endforeach; endif; else: echo "" ;endif; ?> 
</body>
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Store",
            "moduleID":"<?php echo ($products[0]['id']); ?>",
            "imgUrl": "<?php echo ($products[0]['logourl']); ?>", 
            "timeLineLink": "<?php echo C('site_url') . U('Store/products',array('token' => $_GET['token']));?>",
            "sendFriendLink": "<?php echo C('site_url') . U('Store/products',array('token' => $_GET['token']));?>",
            "weiboLink": "<?php echo C('site_url') . U('Store/products',array('token' => $_GET['token']));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</html>
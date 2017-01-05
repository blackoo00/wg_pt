<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
<meta name="Generator" content="haohaios v1.0" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta name="Keywords" content="一聚就惠" />
<meta name="Description" content="昊海拼团，优质水果新鲜直供，大家一起来玩吧！!" />
<title><?php echo ($company["name"]); ?></title>
<link rel="shortcut icon" href="favicon.ico" />

<link href="<?php echo RES;?>/ptuan/css/haohaios.css" rel="stylesheet" />
<link href="<?php echo RES;?>/ptuan/css/font-awesome.min.css" rel="stylesheet" />
<link href="<?php echo RES;?>/ptuan/css/swiper.min.css" rel="stylesheet" >
<link href="<?php echo RES;?>/ptuan/css/notification.css" rel="stylesheet" >


<script type="text/javascript" src="<?php echo RES;?>/ptuan/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/ptuan/js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo RES;?>/ptuan/js/haohaios.js"></script>
<script src="<?php echo RES;?>/ptuan/js/notification.js" type="text/javascript"></script>

</head>


<body id="scnhtm5">
<div class="container">
        <div class="nav_fixed">
            <a href="<?php echo U('Share/orderList');?>" class="fixed_nav_item  <?php if(empty($_GET['type'])): ?>nav_cur<?php endif; ?>"><span class="nav_txt">全部订单</span></a>
            <a href="<?php echo U('Share/orderList',array('type'=>'paid'));?>" class="fixed_nav_item <?php if(($_GET['type']) == "paid"): ?>nav_cur<?php endif; ?>"><span class="nav_txt nav_payment">待付款<?php echo ($type); ?></span></a>
            <a href="<?php echo U('Share/orderList',array('type'=>'sent'));?>" class="fixed_nav_item <?php if(($_GET['type']) == "sent"): ?>nav_cur<?php endif; ?> "><span class="nav_txt nav_receiving">待收货</span></a>
        </div>
        <div id="dealliststatus1" >
            <?php if(is_array($orders)): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="order">
                <div class="order_hd">
                    订单编号:<?php echo ($item["orderid"]); ?>　成交时间:<?php echo (date("Y-m-d",$item["add_time"])); ?>
                </div>
                <div class="order_bd">
                    <div class="order_glist">

                        <div class="order_goods" onclick="window.location='<?php echo U('Share/orderDetail',array('order_id'=>$item['order_id']));?>'">
                            <div class="order_goods_img">
                                <img alt="<?php echo ($item["goods"]["goods_name"]); ?>" src="<?php echo ($item["goods"]["goods_img"]); ?>">
                            </div>
                            <div class="order_goods_info">
                                <div class="order_goods_name"><?php echo ($item["goods"]["goods_name"]); ?></div>
                                <div class="order_goods_attr">
                                    <div class="order_goods_attr_item">
                                        <div class="order_goods_price"><i>¥</i><?php echo ($item["goods"]["goods_price"]); ?><i>/件</i></div>数量：<?php echo ($item["goods"]["goods_number"]); ?>
                                    </div>
                                    <p class="order_goods_attr_item"><?php echo (nl2br($item["goods"]["goods_attr"])); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="order_ft">
                            <div class="order_total">
                                <span class="order_total_info">共1件商品 ，
                                <?php if(($item["mail_price"]) == "0"): ?>免运费
                                <?php else: ?>
                                运费：<?php echo ($item["mail_price"]); endif; ?>
                                </span>
                                <span class="order_price">总金额：<b>¥<?php echo ($item["price"]); ?></b></span>
                                <span class="coupon_icon" ms-if="order.coupons.length>0"></span>
                            </div>
                            <div class="order_opt">
                                <span class="order_status">
                                    <?php if(($item["refund_sign"]) == "0"): switch($item["paid"]): case "1": ?>已付款,<?php break;?>
                                        <?php case "0": ?>未付款,<?php break; endswitch;?>
                                    <?php switch($item["shipping_status"]): case "0": ?>未发货<?php break;?>
                                        <?php case "1": ?>已发货<?php break;?>
                                        <?php case "2": ?>已收货<?php break; endswitch;?>
                                    <?php else: ?>
                                        <?php if(($item["refund_sign"]) == "1"): ?>申请退款中
                                            <?php else: ?>
                                            退款已完成<?php endif; endif; ?>

                                </span>
                                <div class="order_btn">
                                
                                    <a href="<?php echo U('Share/orderDetail',array('order_id'=>$item['order_id']));?>">查看详情</a>
                                    <?php if(($item["paid"]) == "0"): ?><a class="order_btn_buy" href="<?php echo U('Share/orderPayNow',array('order_id'=>$item['order_id']));?>">去支付</a>
                                      <!-- <a click="orderCancel(order.order_id)">取消订单</a> --><?php endif; ?>
                                    <?php if(($item["shipping_status"]) == "1"): ?><!-- <a class="order_btn_receive" href="#">查看物流</a> -->
                                        <a class="order_btn_receive" onclick="orderReceive(<?php echo ($item["order_id"]); ?>)">确认收货</a<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <!-- #BeginLibraryItem "/library/pages.lbi" --><!-- #EndLibraryItem -->
            
    <!-- 
            <div class="list" id="invoice" style="display:none;">
                <h3>物流跟踪</h3>
                <div id="retData"></div>
            </div>
           -->  

        </div>
</div>


<footer class="footer">
    <ul>
    	<li><a href="<?php echo U('Share/index');?>" class="nav-controller <?php if((ACTION_NAME) == "index"): ?>active<?php endif; ?>"><i class="fa fa-home"></i>首页</a></li>
        <li><a href="<?php echo U('Share/rank',array('act'=>'is_hot'));?>" class="nav-controller <?php if((ACTION_NAME) == "rank"): ?>active<?php endif; ?>"><i class="fa fa-trophy"></i>热榜</a></li>
        <li><a href="<?php echo U('Share/cats');?>" class="nav-controller <?php if((ACTION_NAME) == "cats"): ?>active<?php endif; ?>"><i class="fa fa-list"></i>分类</a></li>
        <li><a href="<?php echo U('Share/user');?>" class="nav-controller <?php if((ACTION_NAME) == "user"): ?>active<?php endif; ?>"><i class="fa fa-user"></i>个人中心</a></li>
    </ul>
</footer>

<script>
	var action_name = "<?php echo ACTION_NAME;?>";
	console.log(action_name);
function onBridgeReady(){
	if(action_name == 'user' || action_name == 'orderList' || action_name == 'addressList' || action_name == 'teamList'){
 		WeixinJSBridge.call('hideOptionMenu');
	}else{
 		WeixinJSBridge.call('showOptionMenu');
	}
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
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Share",
            "moduleID":"<?php echo ($res['id']); ?>",
            "imgUrl": "<?php echo ($company['logo']); ?>", 
            "timeLineLink": "<?php echo C('site_url').U('Share/index');?>",
            "sendFriendLink": "<?php echo C('site_url').U('Share/index');?>",
            "weiboLink": "<?php echo C('site_url').U('Share/index');?>",
            "tTitle": "<?php echo ($company["name"]); ?>",
            "tContent": "<?php echo ($company["brief"]); ?>"
        };
</script>
<?php echo ($shareScript); ?>





</body>
  
<script type="text/javascript">
    function orderReceive(order_id){
        confirm =floatNotify.confirm("确认收货？", "",
            function(t, n) {
                if(n==true){
                    location.href="<?php echo U('Share/orderReceive',array('order_id'=>'"+order_id+"'));?>";
                }
                this.hide();
            }),
            confirm.show();
    }
</script>
</html>
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
    <div class="mod_container"   id="dealliststatus1">
        <div id="detailCon" class="wx_wrap">
            <div class="
            <?php if(($order["shipping_status"]) == "2"): ?>state state_3<?php endif; ?>
            <?php if(($order["shipping_status"]) == "1"): ?>state state_2<?php endif; ?>
            <?php if(($order["paid"]) == "1"): ?>state state_1<?php endif; ?>">
                <div class="state_step">
                    <ul>
                        <li class="state_step_1"></li>
                        <li class="state_step_2"></li>
                        <li class="state_step_3"></li>
                    </ul>
                <span class="state_arrow">
                <i class="state_arrow_i"></i>
                <i class="state_arrow_o"></i>
                </span>
                </div>
                <div class="address">
                    <div class="address_row">
                        <div class="address_tit">订单状态：</div>
                        <div class="address_cnt">
                            <b>
                                <?php switch($order["order_status"]): case "0": ?>未付款<?php break;?>
                                    <?php case "1": ?>已付款<?php break;?>
                                    <?php case "2": ?>已发货<?php break;?>
                                    <?php case "3": ?>已收货<?php break;?>
                                    <?php case "4": ?>申请退款<?php break;?>
                                    <?php case "5": ?>退款完成<?php break; endswitch;?>
                            </b>
                        </div>
                    </div>
                    <!-- 
                    <div class="address_row">
                        <div class="address_tit">支付状态：</div>
                        <div class="address_cnt">
                            <b><?php echo ($order["pay_status"]); ?></b>
                        </div>
                    </div>
                    <div class="address_row">
                        <div class="address_tit">配送状态：</div>
                        <div class="address_cnt">
                            <b><?php echo ($order["shipping_status"]); ?></b>
                        </div>
                    </div> -->
                    <div class="address_row">
                        <div class="address_tit">总 额：</div>
                        <div class="address_cnt">
                            <span class="address_price"><?php echo ($order["price"]); ?></span>
                            <span class="address_paytype">（<?php echo ($order["pay_name"]); ?>）</span>
                        </div>
                    </div>
                    <div class="address_row">
                        <div class="address_tit">送 至：</div>
                        <div class="address_cnt"><?php echo ($order["address"]); ?></div>
                    </div>
                    <div class="address_row">
                        <div class="address_tit">收 货 人：</div>
                        <div class="address_cnt"><?php echo ($order["consignee"]); ?> <?php echo ($order["mobile"]); ?></div>
                    </div>
                    <div class="address_row">
                        <div class="address_tit">订单编号：</div>
                        <div class="address_cnt"><?php echo ($order["orderid"]); ?></div>
                    </div>
                    <div class="address_row">
                        <div class="address_tit">下单时间：</div>
                        <div class="address_cnt"><?php echo (date("Y-m-d H:i:s",$order["add_time"])); ?></div>
                    </div>
                    <!-- <div class="address_row">
                        <div class="address_tit">配送方式：</div>
                        <div class="address_cnt"><?php echo ($order["shipping_name"]); ?><br><?php echo ($order["invoice_no"]); ?></div>
                    </div> -->
                </div>
               <!--{if 1} -->
                <div class="state_btn">
                <?php echo ($order["handler"]); ?> 
                </div>
                <div class="state_btn"> </div>
                <!-- {/if} -->
            </div>
            <div class="ptit">商品信息
            </div>
            <div class="order order_height">
                <div class="order_bd">
                    <div class="order_glist">
                        <div class="order_item">
                            <!-- {foreach from=$goods_list item=goods} -->
                            <a href="goods.php?id={$goods.goods_id}" class="order_goods" style="float:left;border-bottom:none;">
                                <div class="order_goods_img">
                                    <img src="<?php echo ($order["goods"]["goods_img"]); ?>">
                                </div>
                            </a>
                            <div class="order_goods_info">
                                <a class="order_goods" href="<?php echo U('Share/goods',array('goodid'=>$order['goods']['goods_id']));?>">
                                    <div class="order_goods_name"><?php echo ($order["goods"]["goods_name"]); ?></div>
                                    <div class="order_goods_attr">
                                        <div class="order_goods_attr_item">数量：<?php echo ($order["goods"]["goods_number"]); ?>
                                            <div class="order_goods_price"><i>¥</i><?php echo ($order["goods"]["goods_price"]); ?><i>/件</i></div>
                                        </div>
                                        <p class="order_goods_attr_item"><?php echo (nl2br($order["goods"]["goods_attr"])); ?></p>
                                    </div>
                                </a>
                            </div>
                            <!-- {/foreach} -->
                        </div>
                    </div>
                    <div>
                        <?php if(($order["shipping_status"]) == "1"): ?><a class ="mt_status_lk1 marg_right" href="<?php echo U('Share/orderReceive',array('order_id'=>$order['order_id']));?>">确认收货</a><?php endif; ?>
                    <?php if(($order["team_sign"]) != "0"): ?><a class ="mt_status_lk1 marg_right" href="<?php echo U('Share/teamDetail',array('team_sign'=>$order['team_sign']));?>">查看团详情</a>
                        <?php else: ?>
                        <?php if(($order['shipping_status'] != 1) AND ($order['refund_sign'] == 0) AND ($order['paid'] == 1) ): ?><a class ="mt_status_lk1 marg_right" onclick="applyRefund(<?php echo ($order['order_id']); ?>)">申请退款</a><?php endif; endif; ?>
                    </div>
                    
                    
                </div>
            </div>
            
                
        </div>
    </div>
  
  <div class="express_box" id="invoice" style="display:none;">
        <!-- 
        <h3>物流跟踪</h3>
        <ul>
         <div id="retData"></div> 
         </ul>-->
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
    function applyRefund(order_id){
        confirm =floatNotify.confirm("确认申请退款吗？", "",
            function(t, n) {
                if(n==true){
                    location.href="<?php echo U('Share/applyRefund',array('order_id'=>'"+order_id+"'));?>";
                }
                this.hide();
            }),
            confirm.show();
    }
</script>
  
</html>
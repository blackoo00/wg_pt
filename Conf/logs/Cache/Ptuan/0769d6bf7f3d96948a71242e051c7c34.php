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


<body>
<div class="container">
    <section class="main-view">
        <div class="my">
            <div class="my_head">
                <div class="my_head_pic">
                    <img class="my_head_img" width="130" height="130" src="<?php echo ($user["headimgurl"]); ?>">
                </div>
                <div class="my_head_info">
                    <h4 class="my_head_name "><?php echo ($user["user_name"]); ?></h4>
                </div>
            </div>
        </div>
        <div>
            <div class="nav">
                <ul class="nav_list">
                    <li class="nav_item nav_order">
                        <a href="<?php echo U('Share/orderList',array('uid'=>$user['user_id']));?>">
                            <div class="nav_item_hd">我的订单</div>
                        </a>
                        <div class="nav_item_bd">
                            <a href="<?php echo U('Share/orderList');?>"><span class="nav_item_txt">全部</span></a>
                            <a href="<?php echo U('Share/orderList',array('type'=>'paid'));?>">
                                <span class="nav_item_txt">待付款<i class="<?php echo U('Share/ordList',array('uid'=>$user['user_id']));?>" id="need_pay_count"  style="display:none">0</i></span>
                            </a>
                            <a href="<?php echo U('Share/orderList',array('type'=>'sent'));?>">
                                <span class="nav_item_txt">待收货<i class="nav_item_num" id="need_recv_count" style="display:none">0</i></span>
                            </a>
                        </div>
                    </li>
                    <li class="nav_item nav_cheap">
                        <div class="nav_item_hd"><a href="<?php echo U('Share/teamList',array('uid'=>$user['user_id']));?>"> 我的拼团 </a></div>
                    </li>
                    <li class="nav_item nav_cart">
                        <div class="nav_item_hd"><a href="javascript:;" onclick="addJump('<?php echo U('Share/addressList');?>')">我的地址 </a></div>
                    </li>
                        <li class="nav_item nav_cart">
                        <div class="nav_item_hd_coupons"><a class="coupons_a" href="<?php echo U('Share/getMoney');?>">我的余额 <item style="float: right; margin-right: 10px;"><?php echo ($user[user_money]); ?></item></a></div>
                        </li>
                    <!-- <li class="nav_item nav_cart">
                        <div class="nav_item_hd_coupons_sale"><a class="coupons_a" href="article.php?id=38">售后服务 </a></div>
                    </li> -->
                </ul>
            </div>
        </div>
            <!-- 去关注 -->
            <!-- <?php if(($$user["is_subscribe"]) == "0"): ?><div class="guanzhu" id="guanzhu">
                关注我们有更多惊喜，
                <a href="http://mp.weixin.qq.com/s?__biz=MzA5NTQwNTk4MQ==&mid=400757678&idx=1&sn=fda95ee24c46e45adc72a09483266f90">立即去关注</a>
                <span onclick="document.getElementById('guanzhu').style.display='none';"><i class="fa fa-remove"></i></span>
                </div><?php endif; ?> -->
    </section>
    <script>
        function addJump(url){
            $.post("<?php echo U('Share/delShopping');?>",function(){
                location.href = url;
            })
        }
    </script>
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
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
<div id="loading">
	

    <style type="text/css">
    body{
        overflow:hidden;
    }
    .spinner {
        width: 34px;
        height: 34px;
        position: relative;
        margin: 0 auto;
        top: 150px;
        z-index: 1;
    }
    
    .container1 > div,
    .container2 > div,
    .container3 > div {
        width: 10px;
        height: 10px;
        background-color: #DF2127;
        border-radius: 100%;
        position: absolute;
        -webkit-animation: bouncedelay 1.2s infinite ease-in-out;
        animation: bouncedelay 1.2s infinite ease-in-out;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }
    
    .spinner .spinner-container {
        position: absolute;
        width: 100%;
        height: 100%;
    }
    
    .container2 {
        -webkit-transform: rotateZ(45deg);
        transform: rotateZ(45deg);
    }
    
    .container3 {
        -webkit-transform: rotateZ(90deg);
        transform: rotateZ(90deg);
    }
    
    .circle1 {
        top: 0;
        left: 0;
    }
    
    .circle2 {
        top: 0;
        right: 0;
    }
    
    .circle3 {
        right: 0;
        bottom: 0;
    }
    
    .circle4 {
        left: 0;
        bottom: 0;
    }
    
    .container2 .circle1 {
        -webkit-animation-delay: -1.1s;
        animation-delay: -1.1s;
    }
    
    .container3 .circle1 {
        -webkit-animation-delay: -1.0s;
        animation-delay: -1.0s;
    }
    
    .container1 .circle2 {
        -webkit-animation-delay: -0.9s;
        animation-delay: -0.9s;
    }
    
    .container2 .circle2 {
        -webkit-animation-delay: -0.8s;
        animation-delay: -0.8s;
    }
    
    .container3 .circle2 {
        -webkit-animation-delay: -0.7s;
        animation-delay: -0.7s;
    }
    
    .container1 .circle3 {
        -webkit-animation-delay: -0.6s;
        animation-delay: -0.6s;
    }
    
    .container2 .circle3 {
        -webkit-animation-delay: -0.5s;
        animation-delay: -0.5s;
    }
    
    .container3 .circle3 {
        -webkit-animation-delay: -0.4s;
        animation-delay: -0.4s;
    }
    
    .container1 .circle4 {
        -webkit-animation-delay: -0.3s;
        animation-delay: -0.3s;
    }
    
    .container2 .circle4 {
        -webkit-animation-delay: -0.2s;
        animation-delay: -0.2s;
    }
    
    .container3 .circle4 {
        -webkit-animation-delay: -0.1s;
        animation-delay: -0.1s;
    }
    
    @-webkit-keyframes bouncedelay {
        0%, 80%, 100% {
            -webkit-transform: scale(0.0)
        }
        40% {
            -webkit-transform: scale(1.0)
        }
    }
    
    @keyframes bouncedelay {
        0%, 80%, 100% {
            transform: scale(0.0);
            -webkit-transform: scale(0.0);
        }
        40% {
            transform: scale(1.0);
            -webkit-transform: scale(1.0);
        }
    }
    </style>

        <div class="spinner">
            <div class="spinner-container container1">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
            <div class="spinner-container container2">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
            <div class="spinner-container container3">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
        </div>


</div>
<div class="container" id="container" style="display:none;">
	<!-- 导航栏 -->
    <div class="main_menu">
        <ul>
            <li><a href="<?php echo U('Share/index');?>" <?php if(empty($cat_id)): ?>class="cur"<?php endif; ?>>首页</a></li>

			<?php if(is_array($cats)): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a <?php if(($vo["cat_id"]) == $show_cat): ?>class="cur"<?php endif; ?> href="<?php echo U('Share/index',array('cat_id'=>$vo['cat_id']));?>"><?php echo ($vo["cat_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
	<!-- 轮播图 -->
 	<section class="main-view" style=" margin-top:40px;">

 		<!-- S 轮播 --> 	

 		<div class="swiper-container">
 			<div class="swiper-wrapper">
 				<?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="swiper-slide" style="padding:0 10px;">
     					<a href="<?php echo ($item["url"]); ?>">
     						<img src="<?php echo ($item["picurl"]); ?>" width="100%">
     					</a>
     				</div><?php endforeach; endif; else: echo "" ;endif; ?>
 			</div>
 			<div class="swiper-pagination"></div>
 		</div>
 	</section>
	<!-- goodslist -->
    <section class="main-view">
        <div id="tuan" class="tuan" style="padding-top: 10px; display: block;">
            <div ms-repeat-item="goods_list" id="goods-wrap">

			<?php if(is_array($good)): $i = 0; $__LIST__ = $good;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="tuan_g" >
                    <a href="<?php echo U('Share/goods',array('goodid'=> $vo['goods_id']));?>">
                        <div class="tuan_g_img">
                            <img src="<?php echo ($vo["goods_img"]); ?>">                

                            <?php if(($vo['goods_number']) < "1"): ?><span class="sell_f"></span><?php endif; ?>

                            <span class="tuan_mark tuan_mark2">
                                <span><?php echo ($vo["team_num"]); ?>人团</span>
                            </span>
                        </div>

                        <div class="tuan_g_info">
                            <p class="tuan_g_name"><?php echo ($vo["goods_name"]); ?></p>
                            <p class="tuan_g_cx"><?php echo ($vo["goods_brief"]); ?></p>
                        </div>

                        <div class="tuan_g_core">
                            <div class="tuan_g_price">
                                <span><?php echo ($vo["team_num"]); ?>人团</span> <b>¥<?php echo ($vo["team_price"]); ?></b>
                            </div>
                            <div class="tuan_g_btn">去开团</div>
                        </div>

                        <div class="tuan_g_mprice">
                            市场价： <del>¥<?php echo ($vo["market_price"]); ?></del>
                        </div>
                    </a>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </section>
 
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


<script>
    $(window).bind("scroll",function() {
        if ($(document).scrollTop() + $(window).height() >= $(document).height()) {
            var count = $('.tuan_g').length;
            var cat_id = "<?php echo ($cat_id); ?>";
            $.ajax({
                url:"<?php echo U('Share/scrollLoadGoods');?>",
                data:{count:count,cat_id:cat_id},
                dataType:'json',
                success:function(data){
                        console.log(data);
                    if(data.status == 1){
                        $('#goods-wrap').append(data.data);
                    }
                }
            });
        }
    });
</script>
<script>
	window.onload=function(){
		$('#loading').remove();
		document.getElementById('container').style.display='';
		
			var swiper = new Swiper('.swiper-container', {
	        pagination: '.swiper-pagination',
	        paginationClickable: true,
	        spaceBetween: 30,
	        centeredSlides: true,
	        autoplay: 2500,
	        autoplayDisableOnInteraction: false
	    });
	}
</script>
</body>
</html>
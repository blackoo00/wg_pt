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
<div id="loading"></div>
<div class="container" id="container" style="display:none;">
	<!-- 导航栏 -->
	<div class="nav_fixed">
		<a href="<?php echo U('Share/rank',array('act'=>'is_hot'));?>" class="fixed_nav_item <?php if(($_GET['act']) == "is_hot"): ?>nav_cur<?php endif; ?> "><span class="nav_txt">热榜</span></a>
        <a href="<?php echo U('Share/rank',array('act'=>'is_new'));?>" class="fixed_nav_item <?php if(($_GET['act']) == "is_new"): ?>nav_cur<?php endif; ?> "><span class="nav_txt nav_payment">新榜</span></a>
        <a href="<?php echo U('Share/rank',array('act'=>'is_best'));?>" class="fixed_nav_item <?php if(($_GET['act']) == "is_best"): ?>nav_cur<?php endif; ?>"><span class="nav_txt nav_receiving">精品</span></a>
    </div>

	<!-- goodslist -->
    <section class="main-view" style = "padding-top:40px;">
        <div id="tuan" class="tuan" style="padding-top: 10px; display: block;">
            <div ms-repeat-item="goods_list" id="goods-wrap">

			<?php if(is_array($good)): $i = 0; $__LIST__ = $good;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="tuan_g" >
                    <a href="<?php echo U('Share/goods',array('goodid'=>$vo['goods_id']));?>">
                        <div class="tuan_g_img">
                            <img src="<?php echo ($vo["goods_img"]); ?>">

                            <?php if(($vo['goods_number']) < "1"): ?><span class="sell_f"></span><?php endif; ?>

                            <span class="tuan_mark tuan_mark2">	
                           
	
                            <!-- <b>
								<?php echo round(($vo['team_price']/$vo['market_price']*100),1); ?>
                            折</b> -->
                            <span><?php echo ($vo["team_num"]); ?>人团</span>
                            </span>
                        </div>

                        <div class="tuan_g_info">
                            <p class="tuan_g_name"><?php echo ($vo["goods_name"]); ?></p>
                            <p class="tuan_g_cx"><?php echo ($vo["goods_brief"]); ?></p>
                        </div>

                        <div class="tuan_g_core">
                            <div class="tuan_g_price">
                                <span><?php echo ($vo["team_num"]); ?>人团</span>
                                <b>¥2.50</b>
                            </div>
                            <div class="tuan_g_btn">去开团</div>
                        </div>

                        <div class="tuan_g_mprice">市场价：
                            <del>¥<?php echo ($vo["market_price"]); ?></del>
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
	        var act = "<?php echo ($act); ?>";
	        $.ajax({
	            url:"<?php echo U('Share/scrollLoadGoods');?>",
	            data:{count:count,act:act},
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
		document.getElementById('loading').style.display='none';
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
<!--script type="text/javascript">
	$(function() {
		var swiper = new Swiper('.swiper-container', {
	        pagination: '.swiper-pagination',
	        paginationClickable: true,
	        spaceBetween: 30,
	        centeredSlides: true,
	        autoplay: 2500,
	        autoplayDisableOnInteraction: false
	    });
	});
</script-->
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script language="javascript" type="text/javascript">

	wx.config({
	    debug: false,//这里是开启测试，如果设置为true，则打开每个步骤，都会有提示，是否成功或者失败
	    appId: '1111',
	    timestamp: '1478230476',//这个一定要与上面的php代码里的一样。
	    nonceStr: '1478230476',//这个一定要与上面的php代码里的一样。
	    signature: '4de6810ac0a924c5a23ee5f7e48cb5de42512b82',
	    jsApiList: [
	      // 所有要调用的 API 都要加到这个列表中
	        'onMenuShareTimeline',
	        'onMenuShareAppMessage',
	        'onMenuShareQQ',
	        'onMenuShareWeibo'
	        
	    ]
	});

	var title="这个商品帅呆了，大家一起来拼单吧，赶紧行动吧！GOGOGOGO！";
	var link= "http://localhost/pttest/index.php";
	var imgUrl="http://wx.qlogo.cn/mmopen/jjEmt1GUK02ZHPtkXvFSBPtBNZDdJNhkrPZRuPysu2aSmxa2YctJHT3FMITDP8Nqjkh5oyLgnCyoaXcoZ1SOiczqhuBGS16yL/0";
	var desc= "这个商品帅呆了，大家一起来拼单吧，赶紧行动吧！GOGOGOG";
	wx.ready(function () {
	    wx.onMenuShareTimeline({//朋友圈
	        title: title, // 分享标题
	        link: link, // 分享链接
	        imgUrl: imgUrl, // 分享图标
	        success: function () { 
	            // 用户确认分享后执行的回调函数
	        	statis(2,1);
	        },
	        cancel: function () { 
	            // 用户取消分享后执行的回调函数
	        	statis(2,2);
	        }
	    });
	    wx.onMenuShareAppMessage({//好友
	        title: title, // 分享标题
	        desc: desc, // 
	        link: link, // 分享链接
	        imgUrl: imgUrl, // 分享图标
	        type: '', // 分享类型,music、video或link，不填默认为link
	        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	        success: function () { 
	        	// 用户确认分享后执行的回调函数
	            statis(1,1);    
	        },
	        cancel: function () { 
	            // 用户取消分享后执行的回调函数
	        	statis(1,2);
	        }
	    });
	  
	    wx.onMenuShareQQ({
	        title: title, // 分享标题
	        desc: desc, // 分享描述
	        link: link, // 分享链接
	        imgUrl: imgUrl, // 分享图标
	        success: function () { 
	           // 用户确认分享后执行的回调函数
	        	statis(4,1);
	        },
	        cancel: function () { 
	           // 用户取消分享后执行的回调函数
	        	statis(4,2);
	        }
	    });
	    wx.onMenuShareWeibo({
	        title: title, // 分享标题
	        desc: desc, // 分享描述
	        link: link, // 分享链接
	        imgUrl: imgUrl, // 分享图标
	        success: function () { 
	           // 用户确认分享后执行的回调函数
	        	statis(3,1);
	        },
	        cancel: function () { 
	            // 用户取消分享后执行的回调函数
	        	statis(3,2);
	        }
	    });
	    
	    
	});
	
	function statis(share_type,share_status){
		$.ajax({
            type:"post",//请求类型
            url:"share.php",//服务器页面地址
            data:"act=link&share_status="+share_status+"&share_type="+share_type+"&link_url=http%3A%2F%2Flocalhost%2Fpttest%2Findex.php",
            dataType:"json",//服务器返回结果类型(可有可无)
            error:function(){//错误处理函数(可有可无)
                //alert("ajax出错啦");
            },
            success:function(data){
                
            }
        });
	}

</script>
</body>
</html>
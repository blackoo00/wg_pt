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
<div style="width:100%;height:50px;line-height:50px;background:#fff;text-align:center"><span style="float:right;padding-right:10px;"><a href="<?php echo U('Store/index',array('token' => $_GET['token'], 'catid' => $hostlist['id'], 'wecha_id' => $wecha_id));?>"><img src="<?php echo RES;?>/css/store/css/img/home1.jpg"></a></span><span style="padding-left:10px;float:left"><a href="javascript:history.go(-1)"><img src="<?php echo RES;?>/css/store/css/img/return1.jpg" ></a></span><span style="font-size:16px"><?php echo (msubstr($metaTitle,0,10)); ?></span></div>
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
<ul id="m_list" class="m-list ">
<?php if(is_array($products)): $i = 0; $__LIST__ = $products;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hostlist): $mod = ($i % 2 );++$i;?><li>
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
</ul>
<div style="background:#4B514F;position:fixed;left:10px;bottom:10px;border-radius:5px;padding:5px 10px;background-color:rgba(0,0,0,0.7);font-size:16px;z-index:9999">
	<a href="<?php echo U('Store/cart',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id']));?>" style="color:#fff">
	购物车(<i class="cart_com" style="font-size:16px;"><?php echo ($totalProductCount); ?></i>)
	</a>
	<a href="<?php echo U('Store/my',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id']));?>"style="color:#fff">
	<span style="border-left:1px solid #fff;padding-left:5px;">我的订单</span>
	</a>
</div>
<div class="more" style="width:100%;text-align:center;line-height:40px;overflow:hidden;display:none;" id="show_more" page="2" href="javascript:void(0);">加载中...请稍候</div>
<input type="hidden" value="1" id="pageid" />
<input type="hidden" id="canScroll" value="1" />
<script type="text/javascript">
$(function() {
	$('#search_form').submit(function() {
		var search_name = $('#search_name').val();
		if (search_name == '') {
			return false;
		}
	});

	//点击排序
	var base_url = '<?php echo U('Store/products',array('token'=>$_GET['token'],'catid'=>$thisCat['id'],'wecha_id'=>$_GET['wecha_id']));?>';
	var b_url = '<?php if($isSearch != 1): echo U('Store/ajaxProducts',array('token'=>$_GET['token'],'catid'=>$thisCat['id'],'wecha_id'=>$_GET['wecha_id'])); else: echo U('Store/ajaxProducts',array('token'=>$_GET['token'],'keyword'=>$_GET['keyword'],'wecha_id'=>$_GET['wecha_id'])); endif; ?>'
		method = 'DESC',
		_get_method = '<?php echo ($method); ?>',
		order = '<?php echo ($order); ?>',
		_get_order  = '';
	if (_get_order != '') {
		order = _get_order;
	}
	$('.order_control a').removeClass('arrow-down');
	if (_get_method == 'DESC')  {
		method = 'ASC';
		$('.order_control a[order="' + order + '"]').addClass('arrow-up');
	} else {
		$('.order_control a[order="' + order + '"]').addClass('arrow-down');
	}
	$('.order_control a').click(function() {
		var order = $(this).attr('order');
		var url = base_url + '&order=' + order+'&method='+method;
		location.href = url;
	});

	/*---------------------加载更多--------------------*/
	var total = <?php echo ($count); ?>,
		pagesize = 8,
		pages = Math.ceil(total / pagesize);
	var com_link = '<?php echo U('Store/product',array('token'=>$_GET['token'],'wecha_id'=>$_GET['wecha_id']));?>';
	var label_arr = ["\u8bf7\u9009\u62e9\u6807\u7b7e","\u70ed\u5356","\u7206\u6b3e"];
	if (pages > 1) {
		var _page = $('#show_more').attr('page');
		$(window).bind("scroll",function() {
			if ($(document).scrollTop() + $(window).height() >= $(document).height()) {
				$('#show_more').show().html('加载中...请稍候');
				if (_page > pages) {
					$('#show_more').show().html('没有更多了');
					return;
				}
				if($('#canScroll').val()==0){//不要重复加载
					return;
				}
				$('#canScroll').attr('value',0);
				$.ajax({
					type : "GET",
					data : {'page' : _page, 'inajax' : 1},
					url :  b_url + '&order=' + order + '&method=' + _get_method + '&pagesize='+pagesize,
					dataType : "json",
					success : function(RES) {
						$('#canScroll').attr('value',1);
						$('#show_more').hide().html('加载更多');
						data = RES.products;
						if(data.length){
							$('#show_more').attr('page',parseInt(_page)+1);
						}
						_page = $('#show_more').attr('page');
						var _tmp_html = '';
						$.each(data, function(x, y) {
							_tmp_html +=    '<li><div style="width:95%;margin:0 auto;background:#fff;"><span class="pic">' +
							'<a href="' + com_link + '&id=' + y.id + '">' +
							'<img src="' +y.logourl + '" style="width:100%;height:120px"/>' +
							'</a><a class="t" href="' + com_link + '&id=' + y.id + '">' + y.name + '</a><br/><b>￥'+ y.price +'&nbsp;元</b><del>￥' + y.oprice + '</del></span></div></li>';
						});
						$('#m_list').append(_tmp_html);
					}
				});
			}
		});
	}
});
</script>
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
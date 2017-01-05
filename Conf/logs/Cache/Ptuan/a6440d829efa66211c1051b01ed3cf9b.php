<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" /><meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta content="yes" name="apple-mobile-web-app-capable" />
	<meta content="black" name="apple-mobile-web-app-status-bar-style" />
	<meta name="format-detection" content="telephone=no"/>
	<title>地址列表</title>
	<script src="<?php echo RES;?>/ptuan/js/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="<?php echo RES;?>/ptuan/js/notification.js" type="text/javascript"></script>
	<link rel="stylesheet" href="<?php echo RES;?>/address/iconfont.css">
	<link rel="stylesheet" href="<?php echo RES;?>/address/style.css">
<link href="<?php echo RES;?>/ptuan/css/haohaios.css" rel="stylesheet" />
<link href="<?php echo RES;?>/ptuan/css/font-awesome.min.css" rel="stylesheet" />

</head>
<body id="scnhtm5">
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="address">
		     <div class="address_all">
		         <div class="address_name"><?php echo ($list["consignee"]); ?></div>
		         <div class="address_phone"><?php echo ($list["mobile"]); ?></div>
		         <div class="clear"></div>
		         <div class="address_dizhi"><?php echo ($list["address"]); ?></div>
		     </div>
		     <div class="line"></div>
		     <div class="xuanzhong iconfont unchoose <?php if(($list['address_id']) == $user['address_id']): ?>choose<?php endif; ?>" data-id="<?php echo ($list["address_id"]); ?>"></div><div style="float: left;line-height: 31px;">设为默认地址</div>
		     <div class="wrap">
			        <div class="box-163css iconfont">
			        	  <span class="update iconfont" data-id="<?php echo ($list["address_id"]); ?>" onclick="del(this)">&#xe601;</span>
		 	              <!-- <input type="button" value="<?php echo ($list["id"]); ?>" onclick="del(this)"> -->
		            </div>
		    </div>
		    <a href="<?php echo U('Share/editAddress',array('id'=>$list['address_id']));?>">
		     	<div class="update iconfont">&#xe600;</div>
		    </a>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
	<?php if(!empty($shopping)): ?><a id="submit" style="display: block;background-color: #56B72B;" href="<?php echo ($shopping); ?>">继续支付</a><?php endif; ?>
	<a href="<?php echo U('Share/addAddress');?>">
		<div id="submit">新增地址</div>
	</a>
	<?php if(empty($_GET['type'])): ?><footer class="footer">
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
<?php echo ($shareScript); endif; ?>
<script>
	var del_id;
	function del(obj){
		del_id=$(obj).data("id");
		confirm =floatNotify.confirm("确实要删除该地址吗？", "",
		    function(t, n) {
		        if(n==true){
		            location.href="<?php echo U('Share/delAddress',array('id'=>'"+del_id+"'));?>";
		        }
		    	this.hide();
		    }),
		    confirm.show();
		}
	(function($){
		var address=$(".address");
		address.on('click',".xuanzhong,.address_all",function(){
			var obj=$(this).parents(".address").find(".xuanzhong");
			var id=obj.data("id");
			console.log(id);
			$.ajax({
				url:"<?php echo U('Share/chooseAdd');?>",
				data:{id:id},
				dataType:"json",
				success:function(data){
					console.log(data);
					address.each(function(){
						$(this).find(".xuanzhong").removeClass("choose");
					})
					obj.addClass("choose");
				}
			});
		})
	})(jQuery);
</script>
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
<script type="text/javascript">
window.shareData = {  
            "moduleName":"Store",
            "moduleID":"0",
            "imgUrl": "<?php echo C('site_url') . U('Store/orderCart',array('token' => $_GET['token']));?>", 
            "timeLineLink": "<?php echo C('site_url') . U('Store/orderCart',array('token' => $_GET['token']));?>",
            "sendFriendLink": "<?php echo C('site_url') . U('Store/orderCart',array('token' => $_GET['token']));?>",
            "weiboLink": "<?php echo C('site_url') . U('Store/orderCart',array('token' => $_GET['token']));?>",
            "tTitle": "<?php echo ($metaTitle); ?>",
            "tContent": "<?php echo ($metaTitle); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta content="yes" name="apple-mobile-web-app-capable" />
	<meta content="black" name="apple-mobile-web-app-status-bar-style" />
	<meta name="format-detection" content="telephone=no"/>
	<title>地址列表</title>
	<script src="<?php echo RES;?>/ptuan/js/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="<?php echo RES;?>/ptuan/js/notification.js" type="text/javascript"></script>
	<link rel="stylesheet" href="<?php echo RES;?>/address/iconfont.css">
	<link rel="stylesheet" href="<?php echo RES;?>/address/style.css"></head>
<body  id="scnhtm5">
	<style>
		input {
		    border: 0 none;
		    -webkit-appearance: none;
		}
	</style>
	<div id="add_top">提示填写真实准确的地址哦</div>
	<form method="post" action="#" id="FromID">
		<input type="hidden" name="user_id" value="<?php echo ($user["user_id"]); ?>">
		<?php if(!empty($info['address_id'])): ?><input type="hidden" name="address_id" value="<?php echo ($info["address_id"]); ?>"><?php endif; ?>
		<input type="hidden" name="mid" value="<?php echo ($my["id"]); ?>">
		<div class="add_all">
			<div class="add_name">收货人姓名</div>
			<div class="add_name1">
				<input name="consignee" id="consignee" value="<?php echo ($info["consignee"]); ?>" type="text"></div>
		</div>
		<div class="clear"></div>
		<div class="add_all">
			<div class="add_name">联系电话</div>
			<div class="add_name1">
				<input name="mobile" id="mobile" value="<?php echo ($info["mobile"]); ?>" type="tel"></div>
		</div>
		<div class="clear"></div>

		<div class="add_all">
			<div class="add_name">所在地区</div>
			<div class="add_name1">
				<input type="hidden" name="province" id="province" value="">
				<select id="provinceNo" name="provinceNo" style="width: 140px;">
					<option value="0">--选择地区--</option>
					<?php if(is_array($location)): $i = 0; $__LIST__ = $location;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i; if(($list['depth']) == "0"): ?><option value="<?php echo ($list["id"]); ?>" <?php if(($info['province']) == $list["id"]): ?>selected<?php endif; ?>
							><?php echo ($list["name"]); ?>
						</option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
	</div>
	<div class="clear"></div>

	<div class="add_all">
		<div class="add_name">所在市</div>
		<div class="add_name1">
			<input type="hidden" name="city" id="city" value="">
			<select id="cityNo" name="cityNo" style="width: 140px;">
				<option value="0">--选择市--</option>
				<?php if(!empty($info['city'])): if(is_array($location)): $i = 0; $__LIST__ = $location;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i; if(($list['pid']) == $info["province"]): ?><option value="<?php echo ($list["id"]); ?>" <?php if(($info['city']) == $list["id"]): ?>selected<?php endif; ?>
							><?php echo ($list["name"]); ?>
						</option><?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
		</select>
	</div>
</div>
<div class="clear"></div>

<div class="add_all">
	<div class="add_name">所在县/区</div>
	<div class="add_name1">
		<input type="hidden" name="county" id="county" value="">
		<select id="countyNo" name="countyNo" style="width: 140px;">
			<option value="0">--选择县/区--</option>
			<?php if(!empty($info['district'])): if(is_array($location)): $i = 0; $__LIST__ = $location;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i; if(($list['pid']) == $info["city"]): ?><option value="<?php echo ($list["id"]); ?>" <?php if(($info['district']) == $list["id"]): ?>selected<?php endif; ?>
						><?php echo ($list["name"]); ?>
					</option><?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
	</select>
</div>
</div>
<script>
	(function($){
		//编辑自动赋值区域名
		var province_name = $('#provinceNo option[selected]').text();
		var city_name = $('#cityNo option[selected]').text();
		var district_name = $('#countyNo option[selected]').text();
		$('#province').val(province_name);
		$('#city').val(city_name);
		$('#county').val(district_name);
		var provinceNo=$("#provinceNo");
		var cityNo=$("#cityNo");
		var countyNo=$("#countyNo");

		var province=$("#province");
		var city=$("#city");
		var county=$("#county");
		provinceNo.on("change",function(){
			var pid=$(this).val();
			var name=$(this).find("option:selected").text();
			province.val(name);
			$.ajax({
				url:"<?php echo U('Share/getCityInfo');?>",
				data:{pid:pid},
				dataType:"json",
				success:function(data){
					console.log(data);
					cityNo.html(data.data);
				}
			});
		})
		cityNo.on("change",function(){
			var cid=$(this).val();
			var name=$(this).find("option:selected").text();
			city.val(name);
			$.ajax({
				url:"<?php echo U('Share/getCityInfo');?>",
				data:{cid:cid},
				dataType:"json",
				success:function(data){
					console.log(data);
					countyNo.html(data.data);
				}
			});
		})
		countyNo.on("change",function(){
			var name=$(this).find("option:selected").text();
			county.val(name);
		})
	})(jQuery)
</script>
<div class="clear"></div>

<div class="add_all">
<div class="add_name">详细地址</div>
<div class="add_name1">
	<input name="address" id="address" value="<?php echo ($info["address"]); ?>" type="text"></div>
</div>
<div class="clear"></div>
<!-- 
<div class="add_all">
<div class="add_name">邮政编码</div>
<div class="add_name1">
	<input name="code" id="code" value="<?php echo ($info["code"]); ?>" type="tel"></div>
</div>
<div class="clear"></div>

<div class="add_all">
<div class="add_name">身份证号码</div>
<div class="add_name1">
	<div class="text">
		<input type="text" name="idNumber" id="idNumber" value="<?php echo ($info["idNumber"]); ?>" class="text-css1" value="身份证号码（保税商品必须填写）" onBlur="if(this.value==''){this.value='身份证号码（保税商品必须填写）'};" onFocus="if(this.value=='身份证号码（保税商品必须填写）'){this.value=''};"/>
	</div>
</div>
</div> -->
<!-- <div class="clear"></div> -->

<!-- <div class="add_all1">海关要求购买人必须提供身份证信息。</div> -->

<div class="add_all" id="default_add">
<input type="hidden" id="choose" name="choose" value="1">
<div class="xuanzhong iconfont unchoose <?php if(empty($info)): ?>choose
	<?php else: ?>
	<?php if(($info['choose']) == "1"): ?>choose<?php endif; endif; ?>
">
</div>
<div class="moren">设为默认地址</div>
</div>
</form>
<div class="clear"></div>

<script>
	(function($){
		var address=$("#default_add");
		var icon=address.find(".xuanzhong")
		var choose=$("#choose");
		address.on("click",function(){
			var condition=icon.hasClass("choose");
			if(condition){
				icon.removeClass("choose");
				choose.val(0);
			}else{
				address.each(function(){
					icon.removeClass("choose");
				})
				icon.addClass("choose");
				choose.val(1);
			}
		})
	})(jQuery);
</script>

<div id="submit">保存</div>
<script>
var scale = "<?php echo ($setting['score']); ?>";
// var totalscore = "<?php echo ($info['total_score']); ?>";
$(document).ready(function(){
	var total = parseInt($("#totalmoney").html());
	$("#score").keyup(function(){
		var num = parseInt($(this).val());
		if (isNaN(num)) {
			num = 0;
		}
		// if (num > totalscore) {
		// 	$(this).val(totalscore);
		// 	return floatNotify.simple('您填写的积分超过了您的可用积分');
		// 	return false;
		// }
		var t = total - num/scale;
		if (t <= 0) {
			$(this).val(total * scale);
			t = 0;
		}
		$("#totalmoney").html(t);
	});
	$("#submit").click(function(){
		var userName=$('#consignee').val();
		if($.trim(userName) == ""){
			return floatNotify.simple('请填写姓名');
			return false;
		}
		var userPhone = $("#mobile").val()
		if ($.trim(userPhone) == "") {
			return floatNotify.simple('请填写您的手机号码');
			return false;
		}
		if (userPhone.length != 11) {
			return floatNotify.simple('请填写11位手机号码');
			return false;
		}
		/*var patrn = /^(1(([35][0-9])|(47)|(85)|[8][01256789]))\d{8}$/;
		if (!patrn.exec($.trim(userPhone))) {
			return floatNotify.simple('手机号格式错误');
			return false;
		}*/
		/*var classid = $('#classid').val();
		var flag = 0;
		$('#typeSpan select').each(function(){
			if($(this).val()==-1){
				flag = 1;
			}
		});
		if(flag==1){
			return floatNotify.simple('请选择所属地区');
			return false;
		}*/
		var provinceNo = $("#provinceNo").val();
		if(provinceNo == 0){
			return floatNotify.simple('请选择地区');
			return false;
		}
		var cityNo = $("#cityNo").val();
		if(cityNo == 0){
			return floatNotify.simple('请选择市');
			return false;
		}
		var countyNo = $("#countyNo").val();
		if(countyNo == 0){
			return floatNotify.simple('请选择县/区');
			return false;
		}
		console.log(countyNo);
		var address = $("#address").val();
		if(address == ""){
			return floatNotify.simple('请输入详细地址');
			return false;
		}
		var code = $("#code").val();
		// var idNumber = $("#idNumber").val();
		// if(idNumber == ""){
		// 	return floatNotify.simple('请输入身份证号码');
		// }
		$("#FromID").submit();
		return false;
	});
});
</script></body>
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
</html>
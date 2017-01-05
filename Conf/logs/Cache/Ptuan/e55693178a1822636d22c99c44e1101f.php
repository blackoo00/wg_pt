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


<link href="<?php echo RES;?>/ptuan/css/flexslider.css" rel="stylesheet" >
<script type="text/javascript" src="<?php echo RES;?>/ptuan/js/jquery.flexslider-min.js"></script>
<style>
.back-index a {
	display: block;
	border: none;
	background: #8acf1c;
	width: 100%;
	height: 45px;
	line-height: 45px;
	text-align: center;
	color: white;
	font-size: 20px;	
	border-radius: 2px;
}
</style>

<body>

<div class="container" id="scnhtm5">
    <section class="main-view">
        <div class="flexslider" style="margin-bottom:10px;">
            <ul class="slides" >
                                <li><img src="<?php echo ($goods["goods_img"]); ?>"/></li>
                            </ul>
        </div>
        <script type="text/javascript">
            $(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    slideDirection: "horizontal"
                });
            });
        </script> 
        <div class="tm">
        	<input type="hidden" id="good-limit-num" value="<?php echo ($goods["limit_buy_one"]); ?>">
        	<input type="hidden" id="good-number" value="<?php echo ($goods["goods_number"]); ?>">
            <form action="javascript:addToCart(41)" method="post" name="HHS_FORMBUY" id="HHS_FORMBUY" >
            <div class="td2">
                <div class="td2_name"><?php echo ($goods["goods_name"]); ?></div>
                <div class="td2_cx"><?php echo ($goods["brief"]); ?></div>
                <div class="td2_info">
                    <div class="td2_price">市场价：¥<b><?php echo ($goods["market_price"]); ?></b></div>
                    <div class="td2_num">已售：<span><?php echo ($goods["sales_num"]); ?></span>件</div>

                    <a href="<?php echo U('Share/goodsInfo',array('goodid'=>$goods['goods_id']));?>" class="td2_btn">查看商品详情 <i class="fa fa-angle-right"></i></a>
                </div>
                <div class="td2_hb">
				    <span class="td2_hb_ico"><i></i></span>
					<span class="td2_hb_txt">支付开团并邀请<?php echo ($goods["team_num"]); ?>人参团，人数不足自动退款，详见下方拼团玩法具体说明</span>
			    </div>
            </div>
                       
            <div class="buynum">
            <label>数量：</label>
                <a href="javascript:void(0);" onclick="goods_cut();changePrice()"><i class="fa fa-minus"></i></a>
                <input name="number" type="text" id="number" class="text" value="1" size="4" onblur="changePrice();"/>
                <a href="javascript:void(0);"  onclick="goods_add();changePrice()"><i class="fa fa-plus"></i></a>
                </div>
                          
            <div class="kt">
                <a class="kt_item" style="margin-right:2%;" onclick="if(changePrice()){OrderCart('team_goods')}"  href="javascript:;">
                    <div class="kt_price">￥<b id="tuan_more_price"><?php echo ($goods["team_price"]); ?></b><i> / </i>件</div>
                    <div class="kt_btn"><b id="tuan_more_number"><?php echo ($goods["team_num"]); ?>人团</b></div>
                </a>
                <a class="kt_item kt_item_buy" onclick="if(changePrice()){OrderCart()}" onclick="changePrice()" href="javascript:;">
                    <div class="kt_price">￥<b><?php echo ($goods["shop_price"]); ?></b><i> / </i>件</div>
                    <div class="kt_btn">单独购买</div>
                </a>
            </div>
            
            
            
                
        <!--a href="GroupPurchase.php?goods_id=41">附近的团  <i class="fa fa-map-marker"></i></a-->
        
                
            </form>
        </div>
        <div class="step">
            <div class="step_hd">
                拼团玩法<a class="step_more" href="<?php echo U('Share/tuanRule');?>">查看详情</a>
            </div>
            <div id="footItem" class="step_list">
                <div class="step_item step_item_on">
                    <div class="step_num">1</div>
                    <div class="step_detail">
                        <p class="step_tit">选择
                            <br>心仪商品</p>
                    </div>
                </div>
                <div class="step_item ">
                    <div class="step_num">2</div>
                    <div class="step_detail">
                        <p class="step_tit">支付开团
                            <br>或参团</p>
                    </div>
                </div>
                <div class="step_item ">
                    <div class="step_num">3</div>
                    <div class="step_detail">
                        <p class="step_tit">等待好友
                            <br>参团支付</p>
                    </div>
                </div>
                <div class="step_item">
                    <div class="step_num">4</div>
                    <div class="step_detail">
                        <p class="step_tit">达到人数
                            <br>团购成功</p>
                    </div>
                </div>
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


<script type="text/javascript">
var goods_id = 41;
var goodsattr_style = 1;
var gmt_end_time = 0;
var day = "天";
var hour = "小时";
var minute = "分钟";
var second = "秒";
var end = "结束";
var goodsId = 41;
var now_time = 1478222354;
onload = function(){
  changePrice();
}
function goods_cut(){
	var num_val=document.getElementById('number');
	var new_num=num_val.value;
	 if(isNaN(new_num)){alert('请输入数字');return false}
	var Num = parseInt(new_num);
	if(Num>1)Num=Num-1;
	num_val.value=Num;
}
function goods_add(){
	var num_val=document.getElementById('number');
	var new_num=num_val.value;
	 if(isNaN(new_num)){alert('请输入数字');return false}
	var Num = parseInt(new_num);
	Num=Num+1;
	num_val.value=Num;
}
function changeAtt(t) {
t.lastChild.checked='checked';
for (var i = 0; i<t.parentNode.childNodes.length;i++) {
        if (t.parentNode.childNodes[i].className == 'cattsel') {
            t.parentNode.childNodes[i].className = '';
        }
    }
t.className = "cattsel";
changePrice();
}
function changePrice()
{
  var attr = getSelectedAttributes(document.forms['HHS_FORMBUY']);
  var qty = parseInt(document.forms['HHS_FORMBUY'].elements['number'].value);
  if(isNaN(qty)){
  	alert('请输入商品数量');
  	return false;
  }else{
  	return true;
  }
  //判断限购
  var limit_num = parseInt($('#good-limit-num').val());
  if(limit_num != 0){
  	if(qty > limit_num){
  		alert('超出商品限购数量');
  		return false;
  	}else{
  		return true;
  	}
  }
  //判断库存
  var goods_number = parseInt($('#good-number').val());

  if(qty > goods_number){
  	alert('超出商品库存');
  	return false;
  }else{
  	return true;
  }
  //Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
}
function OrderCart(type){
	var qty = document.forms['HHS_FORMBUY'].elements['number'].value;
  $.ajax({
    url:"<?php echo U('Share/addToCart');?>",
    data:{goods_id:<?php echo ($goods['goods_id']); ?>,count:qty,type:type},
    dataType:'json',
    success:function(data){
      console.log(data);
      if(data.status != 1){
        floatNotify.simple(data.info)
      }else{
        if($.type(type) == 'undefined'){
          type = '';
        }
        var url = "<?php echo U('Share/checkout',array('type'=>'"+type+"'));?>";
        jump_url(url);
      }
    }
  });
	// var url = "<?php echo U('Share/checkout',array('good_id'=>$goods['goods_id'],'buy_num'=>'"+qty+"','type'=>'team_goods'));?>";
	// jump_url(url);
}
function changePriceResponse(res)
{

  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
	document.forms['HHS_FORMBUY'].elements['number'].value = res.number;
  }
  else
  {
    document.forms['HHS_FORMBUY'].elements['number'].value = res.qty;
    if (document.getElementById('HHS_GOODS_AMOUNT'))
      document.getElementById('HHS_GOODS_AMOUNT').innerHTML = res.result;
  }
}
</script>
</html>
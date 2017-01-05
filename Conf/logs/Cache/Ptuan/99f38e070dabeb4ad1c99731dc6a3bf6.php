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
<div class="container" id="scnhtm5">
    <form action="flow.php" method="post" name="theForm" id="theForm" >
        <a class="send_address" href="<?php echo U('Share/addressList',array('type'=>'order'));?>">
            <?php if(!empty($address)): ?><div id="sendTo">
                    <div class="address address_defalut" ms-visible="mobile != ''&&!isLouShare">
                        <h3> <b class="send_margin">送至</b>
                            <br></h3>
                        <input name="address_id"  type="hidden"  value="309" />
                        <ul id="editAddBtn">
                            <li><?php echo ($address["total_address"]); ?></li>
                            <li> <strong><?php echo ($address["consignee"]); ?></strong>
                                <?php echo ($address["mobile"]); ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php else: ?>
                <div id="sendTo">
                    <div class="address address_defalut" ms-visible="mobile != ''&&!isLouShare">
                        <h3 style="padding: 9px;"> <b class="send_margin">点击添加地址</b>
                            <br></h3>
                        <ul id="editAddBtn"></ul>
                    </div>
                </div><?php endif; ?>
        </a>

        <div class="order">
            <div class="order_bd">
                <div id="orderList" class="order_glist">
                    <div class="only">
                        <div class="order_goods">
                            <div class="order_goods_img">
                                <img alt="<?php echo ($good["goods_name"]); ?>" src="<?php echo ($good["goods_img"]); ?>"></div>
                            <div class="order_goods_info">
                                <div class="order_goods_name">
                                    <span id="tuanLbl"></span>
                                    <?php echo ($good["goods_name"]); ?>
                                </div>
                                <div class="order_goods_attr">
                                    <div class="order_goods_attr_item">
                                        <span class="order_goods_attr_tit">数量：</span>
                                        <div class="order_goods_num" id="goods-num"><?php echo ($num); ?></div>
                                        <div id="goodsPrice" class="order_goods_price">
                                            <?php if(!empty($_GET['type'])): ?><label id="goods-single-price">
                                                        <?php echo ($good["team_price"]); ?> 
                                                </label>
                                                <?php else: ?>
                                                <label id="goods-single-price">
                                                        <?php echo ($good["shop_price"]); ?> 
                                                </label><?php endif; ?>
                                            <i>/件</i>
                                        </div>
                                    </div>
                                    <p class="order_goods_attr_item"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div id="pay_area">
            <div class="makeorder_from">
                <div class="makeorder_from_num_box">
                    <li class="reduce" onclick="cut_number();">
                        <a href="javascript:void(0);" >-</a>
                    </li>
                    <li class="in">
                        <input id="number"  type="text" value="<?php echo ($num); ?>" size="2" readonly="true">件</li>
                    <li class="add" onclick="add_number();">
                        <a href="javascript:void(0);" >+</a>
                    </li>
                </div>
            </div>
            <div id='content'>
                <!-- <script type="text/javascript" src="js/utils.js"></script> -->
                <div id="HHS_ORDERTOTAL" class="total">
                    <input type="hidden" id="goods-single-mailprice" value="<?php echo ($good["mail_price"]); ?>">
                    快递：¥<label id="goods-mailprice"><?php echo sprintf('%.2f',$num * $good['mail_price']);?></label> 总价：
                    <span id="totalPrice" class="total_price">
                        <?php if(!empty($_GET['type'])): echo sprintf('%.2f',$num * $good['mail_price'] + $num * $good['team_price']);?>
                        <?php else: ?>
                        <?php echo sprintf('%.2f',$num * $good['mail_price'] + $num * $good['shop_price']); endif; ?>
                    </span>
                </div>
            </div>
            <div class="pay2">
                <div class="pay2_hd">支付方式</div>
                <div id="payList" class="pay2_list">

                    <div onclick="select_pay(this,2)" class="pay2_item  pay2_wx pay2_selected">
                        <span class="pay2_item_state"></span>
                        <span class="pay4_item_ico"></span>
                        <span class="pay2_item_tit">余额支付(<?php echo ($user["user_money"]); ?>)</span>
                    </div>

                    <div onclick="select_pay(this,1)" class="pay2_item  pay2_wx">
                        <span class="pay2_item_state"></span>
                        <span class="pay2_item_ico"></span>
                        <span class="pay2_item_tit">微信支付</span>
                    </div>


                    <!--  <div onclick="select_pay(this,5)" class="pay2_item  pay2_cft">
                    <span class="pay2_item_state"></span>
                    <span class="pay2_item_ico"></span>
                    <span class="pay2_item_tit">支付宝</span>
                </div>
                -->
                <input type="hidden" id="payment" name="payment" value="2"  />
            </div>

            <input type='hidden' value="" name="bonus" id="HHS_BONUS" >
            <div>
                <input type="button" id="pay-now" value="立即支付" class="pay2_btn"/>
                <input type="hidden" name="step" value="done" />
            </div>

            <!-- <div>
            <input type="hidden" name="lat" id="lat" value="34.24600" />
            <input type="hidden" name="lng" id="lng" value="108.94913" />
            <input type="submit" name="share_pay"  id="share_pay"  value="找人代付" class="pay2_btn" />
        </div>
        -->
    </div>
</div>
</form>
<br/>
<div class="step">
<div class="step_hd">
    拼团玩法
    <a class="step_more" href="<?php echo U('Share/tuanRule');?>">查看详情</a>
</div>
<div class="step_list">
    <div class="step_item">
        <div class="step_num">1</div>
        <div class="step_detail">
            <p class="step_tit">
                选择
                <br>心仪商品</p>
        </div>
    </div>
    <div class="step_item step_item_on">
        <div class="step_num">2</div>
        <div class="step_detail">
            <p class="step_tit">
                支付开团
                <br>或参团</p>
        </div>
    </div>
    <div class="step_item">
        <div class="step_num">3</div>
        <div class="step_detail">
            <p class="step_tit">
                等待好友
                <br>参团支付</p>
        </div>
    </div>
    <div class="step_item">
        <div class="step_num">4</div>
        <div class="step_detail">
            <p class="step_tit">
                达到人数
                <br>团购成功</p>
        </div>
    </div>
</div>
</div>
</div>
    <script>

function select_pay(thisobj,pay_id){
    $(thisobj).parent().children().removeClass('pay2_selected');
    $(thisobj).addClass('pay2_selected');
    $('#payment').val(pay_id);
}

function goods_cut(){
    var num_val=document.getElementById('number');
    var new_num=num_val.value;
     if(isNaN(new_num)){alert('请输入数字');return false}
    var Num = parseInt(new_num);
    if(Num>1)Num=Num-1;
    num_val.value=Num;
    changeNum(41);
}
function goods_add(){
    var num_val=document.getElementById('number');
    var new_num=num_val.value;
     if(isNaN(new_num)){alert('请输入数字');return false}
    var Num = parseInt(new_num);
    Num=Num+1;
    num_val.value=Num;
    changeNum(41);
}

var goods_number = <?php echo ($good["goods_number"]); ?>;


/*修改数量*/
function add_number()
{
    if(document.getElementById("number").value < goods_number){
        document.getElementById("number").value++;
        var number = document.getElementById("number").value;
        // Ajax.call('flow.php', 'step=update_cart&rec_id=3130&number=' + number+'&goods_id=41' , changePriceResponse, 'GET', 'JSON');
        changeNum(number);
    }else{
        floatNotify.simple('商品库存不足!');
    }
}
function cut_number()
{

    if (document.getElementById("number").value>1)
    {
        document.getElementById("number").value--;
    }
    var number = document.getElementById("number").value;
    changeNum(number);
    // Ajax.call('flow.php', 'step=update_cart&rec_id=3130&number=' + number+'&goods_id=41' , changePriceResponse, 'GET', 'JSON');
}  
function changeNum(num){
    $.ajax({
        url:"<?php echo U('Share/changeShoppingCount');?>",
        data:{count:num},
        dataType:'json',
        success:function(data){
            if(data.status == 1){
                //赋值商品数量
                $('#goods-num').text(num);
                //重新计算总价
                var goods_price = parseFloat($('#goods-single-price').text());//商品单价
                var goods_single_mailprice = parseFloat($('#goods-single-mailprice').val());//快递单价
                var price_wrap = $('#totalPrice');
                var mailprice_wrap = $('#goods-mailprice');
                mailprice_wrap.text((goods_single_mailprice * num).toFixed(2));//赋值快递费用
                price_wrap.text(((goods_price + goods_single_mailprice) * num).toFixed(2));//赋值总价
            }else{
                floatNotify.simple(data.info)
            }
        }
    });
    
}
function changePriceResponse(res)
{
    
    if(res.error==1)
    {
        alert(res.message);
        document.getElementById("number").value =res.number;
    }
    else
    {
        document.getElementById('content').innerHTML = res.content;//购物车商品价
    }

} 

//立即支付
$('#pay-now').click(function(){
    var payment = $('#payment').val();
    //判断余额
    if(payment == 2){
        var money = parseFloat($('#totalPrice').text());
        $.ajax({
            url:"<?php echo U('Share/judgeMyMoney');?>",
            data:{money:money},
            dataType:'json',
            success:function(data){
                if(data.status == 1){
                    confirm =floatNotify.confirm("确定使用余额支付？", "",
                    function(t, n) {
                        if(n==true){
                            location.href = "<?php echo U('Share/ordersave',array('payment'=>'"+payment+"'));?>";
                        }
                        this.hide();
                    }),
                    confirm.show();
                }else{
                    floatNotify.simple(data.info);
                }
            }
        });
    }else{
        location.href = "<?php echo U('Share/ordersave',array('payment'=>'"+payment+"'));?>";
    }
}) 
</script>
<script>
function onBridgeReady(){
 WeixinJSBridge.call('showOptionMenu');
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
            "imgUrl": "<?php echo ($goods['logo']); ?>", 
            "timeLineLink": "<?php echo C('site_url').U('Share/checkout',array('team_sign'=>$order_info['team_sign']));?>",
            "sendFriendLink": "<?php echo C('site_url').U('Share/checkout',array('team_sign'=>$order_info['team_sign']));?>",
            "weiboLink": "<?php echo C('site_url').U('Share/checkout',array('team_sign'=>$order_info['team_sign']));?>",
            "tTitle": "<?php echo ($company["name"]); ?>",
            "tContent": "<?php echo ($company["brief"]); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</body>
</html>
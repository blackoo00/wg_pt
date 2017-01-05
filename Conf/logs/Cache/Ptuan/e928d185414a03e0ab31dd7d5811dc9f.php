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
    <div>
        <div class="H5_con">
        
<!--{if $team_info.team_status eq 1 }-->    
<?php if(($team_info["team_status"]) == "1"): ?><div class="tips topStateWrap tips_succ tips_succ2">
    <div class="tips_ico"></div>
    <?php if(($is_team) == "1"): ?><div class="tips_tit">快来入团吧</div>
        <div class="tips_txt">就差你了</div>
    <?php else: ?>
        <?php if(($order["team_first"]) == "1"): ?><div class="tips_tit">开团成功</div>
        <?php else: ?>
            <div class="tips_tit">参团成功</div><?php endif; ?>
    
        <div class="tips_txt">快去邀请好友加入吧</div><?php endif; ?>
</div><?php endif; ?>
 
<?php if(($team_info["team_status"]) == "2"): if(($is_teammen) > "0"): ?><div class="tips topStateWrap tips_succ tips_succ2">
             <div class="tips_ico"></div>
             <div class="tips_tit">团购成功</div>
             <div class="tips_txt">我们会尽快为您发货，请耐心等待</div>
        </div> 
    <?php else: ?>
        <div class="tips topStateWrap tips_err">
            <div class="tips_ico"></div>
            <div class="tips_tit">来晚了一步 此团满员啦</div>
            <div class="tips_txt">你可以点击底部红色按钮再开一个团 </div>
        </div><?php endif; endif; ?>

<?php if(($team_info["team_status"] == 3) OR ($team_info["team_status"] == 4)): if(($is_teammen) > "0"): ?><div class="tips topStateWrap tips_err">
            <div class="tips_ico"></div>
            <div class="tips_tit">团购失败</div>
            <div class="tips_txt">你可以点击底部红色按钮重新开团</div>
        </div> 
    <?php else: ?>
        <div class="tips topStateWrap tips_err">
            <div class="tips_ico"></div>
            <div class="tips_tit">来晚了一步！</div>
        </div><?php endif; endif; ?>
        
        </div>
        <?php if(($team_info["team_status"]) == "1"): ?><div class="share_box">
            <a class="share_link" id="share_button" href="javascript:void(0);" onclick="document.getElementById('share_img').style.display='';">直接分享好友参团</a>
<!--            <a class="share_pic" id="share_button" href="javascript:void(0);" onclick="document.getElementById('share_pic').style.display='';">二维码分享好友参团</a>
-->        </div><?php endif; ?>
        <div class="H5_con">
               
        <div id="group_detail" class="tm <?php if(($team_info["team_status"]) == "2"): ?>tm_succ<?php endif; ?> <?php if(($team_info["team_status"]) > "2"): ?>tm_err<?php endif; ?>"><!--团购成功-->
            
                <!--  -->
                <a class="goItemPage" href="<?php echo U('Share/goods',array('goodid'=>$goods['goods_id']));?>">
                    <div class="td tuanDetailWrap">
                        <div class="td_img"><img src="<?php echo ($goods["goods_img"]); ?>"></div>
                        <div class="td_info">
                            <p class="td_name"><?php echo ($goods["goods_name"]); ?></p>
                            <p class="td_mprice"> <span class="tuanTotal"><?php echo ($team_info['team_num']); ?></span>人团： <i>¥</i><b><?php echo ($goods["goods_price"]); ?></b><i> /件</i></p>
                            <!-- <p>查看详情</p> -->
                            <p></p>
                        </div>
                    </div>
                </a>
                <!--  -->
            </div>
            <div class="pp">
                <div class="pp_users" id="pp_users">
                    <?php if(is_array($team_mem)): $i = 0; $__LIST__ = $team_mem;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><a class="pp_users_item pp_users_normal" href="#"><img src="<?php echo ($list["user"]["headimgurl"]); ?>"></a><?php endforeach; endif; else: echo "" ;endif; ?>

                    <?php $__FOR_START_14024__=0;$__FOR_END_14024__=$need_num;for($i=$__FOR_START_14024__;$i < $__FOR_END_14024__;$i+=1){ ?><a class="pp_users_item pp_users_blank" href="#"><img src="<?php echo RES;?>/ptuan/images/avatar_4_64.png"></a><?php } ?>
                  
                </div>

                <?php if(($team_info["team_status"]) == "2"): ?><div class="pp_tips" id="flag_1_a" >对于诸位大侠的相助，团长感激涕零</div>
                <?php else: ?>
                    <div class="pp_tips" id="flag_1_a" >优质商品，大家一起玩吧</div><?php endif; ?>
   
                <?php if(($team_info["team_status"]) == "1"): ?><div class="pp_tips" id="flag_0_a" >还差<b><?php echo ($need_num); ?></b>人，盼你如南方人盼暖气~</div>
                   
                    <div class="pp_state" id="flag_0_b" >
                        <div class="pp_time">
                            剩余<font id="time"></font>结束
                        </div>
                    </div><?php endif; ?>
                <?php if(($team_info["team_status"]) == "2"): ?><div class="pp_state_txt" id="flag_1_b" >团购成功，我们会尽快为您发货，请耐心等待</div><?php endif; ?>
            </div>
            <div class="pp_list">
                <div id="showYaoheList">
                    <?php if(is_array($team_mem)): $i = 0; $__LIST__ = $team_mem;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item["team_first"]) == "1"): ?><div class="pp_list_item">
                                <img class="pp_list_avatar" alt="" src="<?php echo ($item["user"]["headimgurl"]); ?>">
                                <div class="pp_list_info" id="pp_list_info">
                                    <span class="pp_list_name">团长<b><?php echo ($item["user"]["user_name"]); ?></b></span>
                                    <span class="pp_list_time"><?php echo ($item["date"]); ?>开团</span>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="pp_list_item">
                                <img class="pp_list_avatar" alt="" src="<?php echo ($item["user"]["headimgurl"]); ?>">
                                <div class="pp_list_info" id="pp_list_info">
                                    <span class="pp_list_name"><b><?php echo ($item["user"]["user_name"]); ?></b></span>
                                    <span class="pp_list_time"><?php echo ($item["date"]); ?>参团</span>
                                </div>
                            </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <?php if(($team_info["team_status"]) == "1"): ?><div id="chamemeber" class="pp_list_blank">
                        还差
                        <span><?php echo ($need_num); ?></span> 人，让小伙伴们都来组团吧！
                    </div><?php endif; ?>
            </div>
        </div>
        <!--div id="shareit">
            <img class="arrow" src="http://dev.vxtong.com/cases/nuannan/imgs/share-it.png">
        </div-->
        <div class="step">
            <div class="step_hd">
                拼团玩法<!-- <a class="step_more" href="tuan_rule.php">查看详情</a> -->
            </div>
            <div id="footItem" class="step_list">
                <div class="step_item">
                    <div class="step_num">1</div>
                    <div class="step_detail">
                        <p class="step_tit">选择
                            <br>心仪商品</p>
                    </div>
                </div>
                <div class="step_item">
                    <div class="step_num">2</div>
                    <div class="step_detail">
                        <p class="step_tit">支付开团
                            <br>或参团</p>
                    </div>
                </div>
                <div class="step_item <?php if(($team_info["team_status"]) == "1"): ?>step_item_on<?php endif; ?>">
                    <div class="step_num">3</div>
                    <div class="step_detail">
                        <p class="step_tit">等待好友
                            <br>参团支付</p>
                    </div>
                </div>
                <div class="step_item <?php if(($team_info["team_status"]) == "2"): ?>step_item_on<?php endif; ?>" >
                    <div class="step_num">4</div>
                    <div class="step_detail">
                        <p class="step_tit">达到人数
                            <br>团购成功</p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="H5_con fixopt" style="display:block;">

            <?php if(($team_info["team_status"]) > "1"): ?><div class="fixopt_item">
                        <a class="fixopt_btn bottomBtn" href="<?php echo U('Share/goods',array('goodid'=>$goods['goods_id']));?>">我也开个团，点击回商品列表</a>
                    </div>
                <?php else: ?>
                
                <?php if(($is_team) == "1"): ?><div class="fixopt_item fixopt_item1">
                        <a class="fixopt_home" href="<?php echo U('Share/index');?>" ></a>
                        <a class="fixopt_share" id="share_button" href="javascript:void(0);" onclick="document.getElementById('share_img').style.display='';"></a>
                        <input type="hidden" id="team_price" value="<?php echo ($team_infp['price']); ?>">
                        <a class="fixopt_btn" href="javscript:;" onclick="checkBalance(<?php echo ($team_info["price"]); ?>)">我也要参团</a>
                    </div>
                <?php else: ?>
                    <div class="fixopt_item fixopt_item2">
                        <a class="fixopt_home" href="<?php echo U('Share/index');?>" ></a>
                        <a class="fixopt_btn"  id="share_button" href="javascript:void(0);" onclick="document.getElementById('share_img').style.display='';">还差<?php echo ($need_num); ?>人组团成功</a>
                    </div><?php endif; endif; ?>
        </div>
</div>


<div id="share_img" class="share_img" style="display: none;" onclick="document.getElementById('share_img').style.display='none';">
    <p><img class="arrow" src="<?php echo RES;?>/ptuan/images/share.png" ></p>
    <p style="margin-top:120px; margin-right:50px;">点击右上角，</p>
    <p style="margin-right:50px;">将它分享给好友</p>
    <p style=" text-align:center; font-size:30px; line-height:80px;">参团人数+1</p>
    <p align="center">还差<?php echo ($team_info['team_num'] - $team_info['teammen_num']);?>人就能组团成功</p>
    <p align="center">快邀请小伙伴参团吧</p>
</div>
<script>
    //判断余额
    function checkBalance(money){
        $.ajax({
            url:"<?php echo U('Share/judgeMyMoney');?>",
            data:{money:money},
            dataType:'json',
            success:function(data){
                console.log(data);
                if(data.status == 1){
                    confirm =floatNotify.confirm("是否使用余额支付？", "",
                    function(t, n) {
                        if(n==true){
                            location.href="<?php echo U('Share/joinInTeam',array('order_id'=>$team_info['order_id'],'payment'=>2));?>";
                        }else{
                            location.href="<?php echo U('Share/joinInTeam',array('order_id'=>$team_info['order_id']));?>";
                        }
                        this.hide();
                    }),
                    confirm.show();
                }else{
                    location.href="<?php echo U('Share/joinInTeam',array('order_id'=>$team_info['order_id']));?>";
                }
            }
        })
    }
</script>

<!--<div id="share_pic" style="position:fixed;top:0;right:0;z-index:999;display:none; background:#000;opacity:0.8;filter:alpha(opacity=90);width:100%;height:100%; padding:30px 0; text-align:right;" onclick="document.getElementById('share_pic').style.display='none';"><img src="http://qr.liantu.com/api.php?text=http://127.0.0.1/share.php?team_sign=1146&w=200&m=10"><p style="margin:0 30px; line-height:30px; font-size:16px;"><br/>长按二维码保存，发送给朋友或分享到朋友圈，让你的团尽快成功！</p></div>-->
</body>
<script type="text/javascript">
<!---->
var daysms = 24 * 60 * 60 * 1000;
var hoursms = 60 * 60 * 1000;
var Secondms = 60 * 1000;
var microsecond = 1000;
var DifferHour = 0;
var DifferMinute = 0;
var DifferSecond = 0;
    
var systime=<?php echo ($systemtime); ?>;
// var team_start=<?php echo ($team_info["pay_time"]); ?>*1000;
var team_end = <?php echo ($team_info["end_time"]); ?>*1000;
var team_status = <?php echo ($team_info["team_status"]); ?>;
// console.log(systime);
// console.log(team_end);
if(team_end/1000 > systime && team_status ==1){
    setInterval("systime_clock()",1000);
    window.setInterval("clock()", 1000); 
}
function systime_clock(){
    systime++;
}

var time = new Date();
function clock()
{   
    //当前时间
  var time = new Date();
  // time.setTime(systime*1000);

  var Diffms = team_end - time.getTime();
  var Diffms1=Diffms;
  var a='';
  var b='';
  var c='';
  var d='';
  DifferHour = Math.floor(Diffms / daysms);
  Diffms -= DifferHour * daysms;
  DifferMinute = Math.floor(Diffms / hoursms);
  Diffms -= DifferMinute * hoursms;
  DifferSecond = Math.floor(Diffms / Secondms);
  Diffms -= DifferSecond * Secondms;
  var dShhs = Math.floor(Diffms / microsecond);
  if(Diffms1>=0){
       a="还剩<strong class='tcd-h'>"+DifferHour+"</strong>天;";
       b="<span >"+DifferMinute+"</span>时";
       c="<span >"+DifferSecond+"</span>分";
       d="<span>"+dShhs+"</span>秒";
      document.getElementById('time').innerHTML =a+b+c+d;
     
  }else{//已结束
  /*
      document.getElementById('handler').innerHTML="<button type='button' onclick='window.location=\'index.php\';'>我也要开个团，点此到商品列表</button>";
      
       document.getElementById('flag_0_a').style.display ="none";
       document.getElementById('flag_0_b').style.display ="none";*/
      window.location.reload();
  }
}
 
<!--  -->

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
            "imgUrl": "<?php echo ($team_info["goods"]["goods_img"]); ?>", 
            "timeLineLink": "<?php echo C('site_url').U('Share/teamDetail',array('team_sign'=>$team_info['team_sign']));?>",
            "sendFriendLink": "<?php echo C('site_url').U('Share/teamDetail',array('team_sign'=>$team_info['team_sign']));?>",
            "weiboLink": "<?php echo C('site_url').U('Share/teamDetail',array('team_sign'=>$team_info['team_sign']));?>",
            "tTitle": "<?php echo ($team_info["goods"]["goods_name"]); ?>",
            "tContent": "<?php echo ($team_info["goods"]["goods_name"]); ?>"
        };
</script>
<?php echo ($shareScript); ?>
</html>
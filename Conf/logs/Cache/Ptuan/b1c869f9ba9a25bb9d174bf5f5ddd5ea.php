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
<div class="nav_fixed">
            <a href="<?php echo U('Share/teamList',array('type'=>'going'));?>" class="fixed_nav_item  <?php if(($_GET['type']) == "going"): ?>nav_cur<?php endif; ?>"><span class="nav_txt">进行中</span></a>
            <a href="<?php echo U('Share/teamList',array('type'=>'suc'));?>" class="fixed_nav_item <?php if(($_GET['type']) == "suc"): ?>nav_cur<?php endif; ?>"><span class="nav_txt nav_payment">成功</span></a>
            <a href="<?php echo U('Share/teamList',array('type'=>'fail'));?>" class="fixed_nav_item <?php if(($_GET['type']) == "fail"): ?>nav_cur<?php endif; ?> "><span class="nav_txt nav_receiving">失败</span></a>
        </div>
        <div style="height: 30px;"></div>
<div class="con">
    <div class="mt_order">
        <?php if(is_array($ordlist)): $i = 0; $__LIST__ = $ordlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="groups_line"></div>
        <div class="mt_g">
            <div class="mt_g_img" >
                <a href="goods.php?id=77"><img src="<?php echo ($vo["goods"]["goods_img"]); ?>"></a>
            </div>
            <div class="mt_g_info" >
                <p class="mt_g_name"><?php echo ($vo["goods"]["goods_name"]); ?></p>
                <p class="mt_g_price">成团价：<span><b>¥<?php echo ($vo["goods"]["goods_price"]); ?></b>/件 </span><i></i></p>
            </div>
        </div>
        <div class="mt_status">

            <span class="mt_status_txt">

                <?php switch($vo["team_status"]): case "1": ?>团购正在进行中<?php break;?>
                    <?php case "2": ?>团购成功<?php break;?>
                    <?php case "3": ?>团购失败<?php break;?>
                    <?php case "4": ?>团购已退款<?php break; endswitch;?>

            </span>

            <a class ="mt_status_lk1" href="<?php echo U('Share/orderDetail',array('order_id'=>$vo['order_id']));?>"> 查看订单详情 </a>
            <a class ="mt_status_lk1 marg_right" href="<?php echo U('Share/teamDetail',array('team_sign'=>$vo['team_sign']));?>"> 查看团详情 </a>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>       
<!-- <form name="selectPageForm" action="/pttest/user.php" method="get">


 <div id="pager" class="pagebar">
  <span class="f_l f6" style="margin-right:10px;">总计 <b>39</b>  个记录</span>
                      <span class="page_now">1</span>
                      <a href="user.php?act=team_list&page=2">[2]</a>
                      <a href="user.php?act=team_list&page=3">[3]</a>
                      <a href="user.php?act=team_list&page=4">[4]</a>
            
  <a class="next" href="user.php?act=team_list&page=2">下一页</a>    </div>


</form> -->
<script type="Text/Javascript" language="JavaScript">
<!--
function selectPage(sel)
{
  sel.form.submit();
}
//-->
</script>
                
    </div>
</div>
<div style="height:58px;visibility:hidden "></div>
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


>
</body>
<script type="text/javascript">
var msg_title_empty = "留言标题为空";
var msg_content_empty = "留言内容为空";
var msg_title_limit = "留言标题不能超过200个字";
function toggle(thisObj){
	if(thisObj.className.indexOf('slideleft')!==-1){
		thisObj.className='coup_one slide_width ';
	}else{
		thisObj.className="coup_one slide_width slideleft";
	}
}
</script>
  
<script language="javascript">
	function cancel_invoice(){
		document.body.style.overflow = "";
		document.getElementById('invoice').style.display='none';
		document.getElementById('dealliststatus1').style.display='';
		document.getElementById("dealliststatus1").style.backgroundColor="";
		document.getElementById("dealliststatus1").style.opacity = '';
	}
    function get_invoice(expressid,expressno){	
    	document.getElementById("invoice").style.display="";
    	document.getElementById("invoice").innerHTML="<center>正在查询物流信息，请稍后...</center>";
    	if(document.getElementById("dealliststatus1")){
    		//document.getElementById("dealliststatus1").style.display="none";
    		
    		document.body.style.overflow = "hidden";
    		document.getElementById("dealliststatus1").style.backgroundColor="#EEEEEE";
    		document.getElementById("dealliststatus1").style.opacity = 50/100;
    		/**/
    	}
    	
    	/*
    	var expressid = document.getElementById("shipping_name").innerHTML;
    	var expressno = document.getElementById("invoice_no").innerHTML;
    	
    	var expressid="";
    	var expressno=""; 
    	*/ 

    	Ajax.call('/plugins/juhe/kuaidi.php?com='+ expressid+'&nu=' + expressno,'showtest=showtest', 
    			get_invoice_reponse, 'GET', 'JSON');
    }
	function get_invoice_reponse(result){ 
		/*
		  {"message":"ok","status":"1","state":"3","data":
            [{"time":"2012-07-07 13:35:14","context":"客户已签收"},
             {"time":"2012-07-07 09:10:10","context":"离开 [北京石景山营业厅] 派送中，递送员[温]，电话[]"},
             {"time":"2012-07-06 19:46:38","context":"到达 [北京石景山营业厅]"},
             {"time":"2012-07-06 15:22:32","context":"离开 [北京石景山营业厅] 派送中，递送员[温]，电话[]"},
             {"time":"2012-07-06 15:05:00","context":"到达 [北京石景山营业厅]"},
             {"time":"2012-07-06 13:37:52","context":"离开 [北京_同城中转站] 发往 [北京石景山营业厅]"},
             {"time":"2012-07-06 12:54:41","context":"到达 [北京_同城中转站]"},
             {"time":"2012-07-06 11:11:03","context":"离开 [北京运转中心驻站班组] 发往 [北京_同城中转站]"},
             {"time":"2012-07-06 10:43:21","context":"到达 [北京运转中心驻站班组]"},
             {"time":"2012-07-05 21:18:53","context":"离开 [福建_厦门支公司] 发往 [北京运转中心_航空]"},
             {"time":"2012-07-05 20:07:27","context":"已取件，到达 [福建_厦门支公司]"}
            ]} 
		*/
/*
		if((result.status==0||result.status==3||result.status==5)&&result.message=='ok'){
			var str="";
			$.each(result.data,function(i,e){
				str+=e.context+"	".e.time;
			})
			document.getElementById("retData").innerHTML=str;
		}else{
			document.getElementById("retData").innerHTML=result.message;
		}*/
		
		document.getElementById("invoice").innerHTML=result;
	}
</script>
</html>
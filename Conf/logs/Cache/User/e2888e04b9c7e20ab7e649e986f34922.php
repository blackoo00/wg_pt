<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微信公众平台</title>
<meta http-equiv="MSThemeCompatible" content="Yes" />
<link rel="stylesheet" type="text/css" href="<?php echo RES;?>/css/style_2_common.css?BPm" />
<script src="<?php echo RES;?>/js/common.js" type="text/javascript"></script>
<link href="<?php echo RES;?>/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body id="nv_member">
<div style="line-height:200%;padding:10px 20px;">
支付状态：
<?php if($thisOrder["paid"] == 1): ?>已付款<?php else: ?>未付款<?php endif; ?><br>
下单人：<?php echo ($thisOrder["consignee"]); ?><br>
电话：<?php echo ($thisOrder["mobile"]); ?><br>
地址：<?php echo ($thisOrder["address"]); ?><br>
备注信息：<?php echo ($thisOrder["how_oos"]); ?><br>
总数：<?php echo ($thisOrder["goods_amount"]); ?><br>
<!-- 总价：<span style="color:#f30;font-size:16px;font-weight:bold"><?php echo ($thisOrder["price"]); ?></span>元 -->
</div>

<form class="form" method="post" id="form" action=""> 

    <input type="hidden" name="discount" id="discount" value="<?php echo ($set["discount"]); ?>" />
    <div class="msgWrap bgfc"> 
     <table class="userinfoArea" style=" margin:0;" border="0" cellspacing="0" cellpadding="0" width="100%"> 
      <tbody> 
      <tr> 
        <th><span class="red">*</span>支付状态：</th> 
        <td>
        <select name="paid">
        <option value="0" <?php if($thisOrder["paid"] == 0): ?>selected<?php endif; ?>>未付款</option>
        <option value="1" <?php if($thisOrder["paid"] == 1): ?>selected<?php endif; ?>>已付款</option>
        </select></td> 
       </tr> 
       <tr> 
        <th><span class="red">*</span>发货状态：</th> 
        <td>
        <select name="shipping_status">
        <option value="0" <?php if($thisOrder["shipping_status"] == 0): ?>selected<?php endif; ?>>未发货</option>
        <option value="1" <?php if($thisOrder["shipping_status"] == 1): ?>selected<?php endif; ?>>已发货</option>
        </select>
        </td> 
       </tr>
     <tr> 
        <th><span class="red">*</span>收货状态：</th> 
        <td>
        <select name="receive">
        <option value="0" <?php if($thisOrder["receive"] == 1): ?>selected<?php endif; ?>>未收货</option>
        <option value="1" <?php if($thisOrder["receive"] == 2): ?>selected<?php endif; ?>>已收货</option>
        </select>
        </td> 
       </tr>
     <!-- <tr> 
        <th><span class="red">*</span>退款状态：</th> 
        <td><select name="returnMoney"><option value="0" <?php if($thisOrder["returnMoney"] == 0): ?>selected<?php endif; ?>>未申请</option><option value="1" <?php if($thisOrder["returnMoney"] == 1): ?>selected<?php endif; ?>>未退款</option><option value="2" <?php if($thisOrder["returnMoney"] == 2): ?>selected<?php endif; ?>>已退款</option></select></td> 
       </tr>  -->
       <tr> 
        <th><span class="red">*</span>快递公司：</th>
        <td><input type="text" name="shipping_name" value="<?php echo ($thisOrder["shipping_name"]); ?>" class="px" style="width:200px;" /></td> 
       </tr>
        <tr> 
        <th><span class="red">*</span>快递单号：</th>
        <td><input type="text" name="shipping_id" value="<?php echo ($thisOrder["shipping_id"]); ?>" class="px" style="width:200px;" /></td> 
       </tr>
       
       <tr>         
       <th>&nbsp;</th>
       <td>
      <input type="hidden" name="groupon" value="1" />
       <button type="submit"  class="btnGreen">保存</button> </td> 
       </tr> 
      </tbody> 
     </table> 
     </div>
    
   </form> 
   
<table class="ListProduct" border="0" cellspacing="0" cellpadding="0" width="100%">
<thead>
<tr>
<th width="120" align="center" style="text-align:center">名称</th>
<th class="60" align="center" style="text-align:center">详情</th>
<th width="160" align="center" style="text-align:center">单价（元）</th>
</tr>
</thead>
<tbody>
<tr></tr>
<tr>
<td align="center">
<img src="<?php echo ($goods["little_img"]); ?>"  width="100"/><br><?php echo ($goods["goods_name"]); ?>
</td>
<td align="center">
货号：<?php echo ($goods["goods_sn"]); ?> <br />
数量：<?php echo ($thisOrder["order_amount"]); ?>
</td>
<td align="center">￥<?php echo ($goods["goods_price"]); ?>
</td>

</tr>
</tbody>
</table>
</body>
</html>
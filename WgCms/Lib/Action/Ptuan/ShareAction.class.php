<?php
	class ShareAction extends WapAction{
		public $user;
		public $global_order_time;
		public function _initialize(){
			
			parent::_initialize();
			// $this->global_order_time = 86400;
			//设置全局账号信息
			$user = M('Pt_users')->where(array('openid'=>$this->wecha_id))->find();
			if($user){
				$this->user = $user;
			}else{
				//赋值拼团用户信息
				$member = M('Distribution_member')->where(array('wecha_id'=>$this->wecha_id))->find();
				if($member){
					$data = array(
						'user_name' => $member['nickname'],
						'sex' => $member['sex'],
						'reg_time' => time(),
						'openid' => $member['wecha_id'],
						'headimgurl' => $member['headimgurl'],
						'is_subscribe' => 1,
					);
					M('Pt_users')->add($data);
					$user = M('Pt_users')->where(array('openid'=>$this->wecha_id))->find();
					$this->user = $user;
				}
			}
			$this->assign('user',$user);
			//赋值公司名
			$company = M('Pt_set')->find();
			$this->assign('company',$company);
		}

		function test(){

		}

		public function index(){

			$cat_id = $_GET['cat_id'];

			$where['is_on_sale']    = 1;
			$where['is_along_sale'] = 1;
			$where['is_along_sale'] = 0;

			if($cat_id){
				$where['cat_id'] = $cat_id;
				$this->assign('cat_id',$cat_id);
			}
			$goods = M('Pt_goods')->where($where)->order('sort_order desc,add_time desc')->limit(5)->select();

			$cats  = M('Pt_category')->where(array('parent_id'=>0,'is_show'=>1))->select();
			//判断显示的分类
			foreach ($cats as $k => $v) {
				if($cat_id == $v['cat_id']){
					$show_cat_id = $cat_id;
				}
			}
			if(!$show_cat_id){
				$cat = 	M('Pt_category')->where(array('cat_id'=>$cat_id))->find();
				$show_cat_id = $cat['parent_id'];
			}
			//轮播图
			$banner = M('Pt_guanggao')->select();
			$this->assign('cat_id',$cat_id);
			$this->assign('banner',$banner);
			$this->assign('show_cat',$show_cat_id);
			$this->assign('cats',$cats);
			$this->assign('good',$goods);
			$this->display();	
		}
		//滑动加载
		public function scrollLoadGoods(){
			$count = $this->_get('count');
			$cat_id = $this->_get('cat_id');
			$act = $this->_get('act');
			if($cat_id){
				$where['cat_id'] = $cat_id;
			}
			if($act){
				$where[$act] = 1;
			}
			$where['is_on_sale']    = 1;
			$goods = M('Pt_goods')->where($where)->order('sort_order desc,add_time desc')->limit($count,3)->select();
			$str = '';
			if($goods){
				foreach ($goods as $k => $v) {
					$str .="<div class='tuan_g'>";
					$str .="    <a href='".U('Share/goods',array('goodid'=> $v['goods_id']))."'>";
					$str .="        <div class='tuan_g_img'>";
					$str .="            <img src='".$v['goods_img']."'>";
					if($v['goods_number'] < 1){
						$str .="                <span class='sell_f'></span>";
					}
					$str .="            <span class='tuan_mark tuan_mark2'>";
					$str .="                <span>".$v['team_num']."人团</span>";
					$str .="            </span>";
					$str .="        </div>";
					$str .="        <div class='tuan_g_info'>";
					$str .="            <p class='tuan_g_name'>".$v['goods_name']."</p>";
					$str .="            <p class='tuan_g_cx'>".$v['goods_brief']."</p>";
					$str .="        </div>";
					$str .="        <div class='tuan_g_core'>";
					$str .="            <div class='tuan_g_price'>";
					$str .="                <span>".$v['team_num']."人团</span> <b>¥".$v['team_price']."</b>";
					$str .="            </div>";
					$str .="            <div class='tuan_g_btn'>去开团</div>";
					$str .="        </div>";
					$str .="        <div class='tuan_g_mprice'>";
					$str .="            市场价： <del>¥".$v['market_price']."</del>";
					$str .="        </div>";
					$str .="    </a>";
					$str .="</div>";
				}
			}
			if($str){
				$this->ajaxReturn($str,'',1);
			}else{
				$this->ajaxReturn('','',-1);
			}
		}

		//热榜
		public function rank(){

			$where['is_on_sale']    = 1;
			$where['is_alone_sale'] = 1;
			$where['is_delete'] = 0;
			
			$act = $_GET['act'];
			$where[$act] = 1;
			$list = M('Pt_goods')->where($where)->order('sort_order desc,add_time desc')->limit(5)->select();
			$this->assign('act',$act);
			$this->assign('good',$list);
			$this->display();
		}


		//用户
		public function user(){
			$this->display();
		}
		//提现
		public function getMoney(){
			// $condition = array(
			// 	'order_status' => 5,
			// 	'wecha_id' => $this->wecha_id,
			// );
			// $order['status_4'] = M('Pt_order_info')->where($condition)->sum('price');//已审核
			// $alreadyGetMoney = M('Pt_applystore')->where(array('wecha_id'=>$this->wecha_id))->sum('money');

			// $getmoney=sprintf("%.2f",$order['status_4']-$alreadyGetMoney/100);
			// $this->assign('getmoney',$getmoney);

			if(IS_POST){
				$name = $this->_post('name');
				$tele = $this->_post('tele');
				$bankname = $this->_post('bankname');
				$banknumber = $this->_post('banknumber');
				$aliname = $this->_post('aliname');
				$alinumber = $this->_post('alinumber');
				$paytype = $this->_post('paytype');
				$money = intval($this->_post('money'));
				if($money<=0){
					$arr = array('success'=>-1,'info'=>'提现金额不能为零或负值');
					echo json_encode($arr);
					exit;
				}
				if($money<50||$money>50000){
					$arr = array('success'=>-1,'info'=>'每次提现金额在50到5万之间');
					echo json_encode($arr);
					exit;
				}
				if($name!=''&&$tele!=''&&$money!=''){
					$data['name'] = $name;
					$data['tele'] = $tele;
					$data['bankName'] = $bankname;
					$data['bankNumber'] = $banknumber;
					$data['aliName'] = $aliname;
					$data['aliNumber'] = $alinumber;
					$data['mid'] = $this->user['id'];
					$data['wecha_id'] = $this->wecha_id;
					$data['money'] = $money*100;
					$data['token'] = $this->token;
					$data['applytime'] = time();
					$data['paytype'] = $paytype;
					if($this->user['user_money']<$money){
						$arr = array('success'=>-1,'info'=>'提现金额超出可提现佣金');
						echo json_encode($arr);
						exit;
					}
					$result = M('Pt_applystore')->add($data);
					if($result){
						//记录账号余额
						$this->accountLog($this->user['user_id'],$result,-$money,$this->user['user_name'].'申请提现',5);
						$arr = array('success'=>1,'info'=>'提现申请成功，请等待审核');
						echo json_encode($arr);
						exit;
					}else{
						$arr = array('success'=>0,'info'=>'提现失败');
						echo json_encode($arr);
						exit;
					}
				}else{
					$arr = array('success'=>-1,'info'=>'所有内容不能为空');
					echo json_encode($arr);
					exit;
				}
			}else{
				$this->display();
			}
		}
		//提现记录
		function myBill(){
			$db = M('Pt_applystore');
			$applymoney = $db->where(array('wecha_id'=>$this->wecha_id,'status'=>2))->sum('money')/100;
			$list = $db->where(array('wecha_id'=>$this->wecha_id))->select();
			$this->assign('list',$list);
			$this->assign('applymoney',$applymoney);
			$this->display();
		}

		//商品列表
		public function goods(){

			$goodsID   = $_GET['goodid'];
			$goodsInfo = M('Pt_goods')->where(array('goods_id'=>$goodsID))
								   ->find();
			$this->assign('goods',$goodsInfo);
			$this->display();
		}
		//拼团规则
		public function tuanRule(){
			$this->display();
		}
		//商品详情
		public function goodsInfo(){
			$goodid = $this->_get('goodid');
			$goods_desc = M('Pt_goods')->where(array('goods_id'=>$goodid))->getField('goods_desc');
			$goods_desc = htmlspecialchars_decode($goods_desc);
			$this->assign('goods_desc',$goods_desc);
			$this->display();
		}
		//订单详情
		public function ordList(){

			$uid = $_GET['uid'];
			$where['user_id'] = $uid;
			$ordlist = M('Pt_order_info')->where($where)->select();
			$this->display();
		}
		//拼团详情团列表
		public function teamList(){
			$type = $this->_get('type');

			switch ($type) {
				case 'going':
					$where['team_status'] = 1;
					break;
				
				case 'suc':
					$where['team_status'] = 2;
					break;

				case 'fail':
					$where['team_status'] = array('gt',2);
					break;

				default:
					$where['team_status']    =  array('gt',0);		
					break;
			}
			$where['user_id']        = $this->user['user_id'];
			$where['extension_code'] = 'team_goods';

			$ordInfo = D('Pt_order_info');
			$myTeam  = $ordInfo->relation(true)->where($where)->order('add_time desc')->select();
			$this->assign('ordlist',$myTeam);
			$this->display();
		}

		//拼团详情	
		public function teamDetail(){
			$db = D('Pt_order_info');
			$team_sign = $this->_get('team_sign');
			//团长订单
			$team_first_order = $db->where(array('team_sign'=>$team_sign,'team_first'=>1))->relation(true)->find();
			if(!$team_first_order){
				$this->error('该团订单不存在',U('Share/index'));
			}
			$this->assign('team_info',$team_first_order);
			//判断订单是否过期
			if($team_first_order['team_status'] == 1 && $team_first_order['end_time'] < time()){
				$db->where(array('team_sign'=>$team_sign))->save(array('team_status'=>3,'order_status'=>4));
			}
			//所有参团信息
			$orders = $db->where(array('team_sign'=>$team_sign,'team_status'=>array('gt',0),'paid'=>1))->order('add_time asc')->relation(true)->select();
			$this->assign('team_mem',$orders);
			//还需多少人
			$need_num = $team_first_order['team_num'] - $team_first_order['teammen_num'];
			$this->assign('need_num',$need_num);
			//商品信息
			$goods = M('Pt_order_goods')->where(array('order_id'=>$team_first_order['team_sign']))->find();
			$this->assign('goods',$goods);
			
			//$is_team 是否可以参团 $is_teammen 是否在团里
			//is_team=1 :团正在进行且未参团 is_teammen=1 已在团
			$check_team = $db->where(array('team_sign'=>$team_sign,'user_id'=>$this->user['user_id']))->find();

			if((!$check_team || $check_team['paid'] == 0) && $team_first_order['team_status'] == 1){
				$is_team = 1;
				$is_teammen = 0;
			}else if($check_team && $check_team['paid'] == 1){
				$is_team = 0;
				$is_teammen = 1;
				$this->assign('order',$check_team);
			}
			$this->assign('is_team',$is_team);
			$this->assign('is_teammen',$is_teammen);
			$this->assign('systemtime',$this->gmtime());
			$this->display();
		}
		//拼团订单详情
		function orderDetail(){
			$order_id = $this->_get('order_id');
			$order = D('Pt_order_info')->where(array('order_id'=>$order_id))->relation(true)->find();
			if($order){
				$this->assign('order',$order);
				$this->display();
			}else{
				$this->error('订单不存在',U('Share/teamList'));
			}
		}
		//我的订单
		function orderList(){
			$db = D('Pt_order_info');
			$type = $this->_get('type');
			$where = array(
				'user_id'=>$this->user['user_id'],
				'extension_code'=>array('neq','team_goods'),
			);
			switch ($type) {
				case 'paid':
					$where['paid'] = 0;
					break;
				case 'sent':
					$where['shipping_status'] = 1;
					break;
			}
			$my_orders = $db->where($where)->relation(true)->order('add_time desc')->select();
			$this->assign('orders',$my_orders);
			$this->display();
		}
		//我的订单立即支付
		function orderPayNow(){
			$order_id = $this->_get('order_id','intval');
			$order = M('Pt_order_info')->where(array('order_id'=>$order_id))->find();
			if($order){
				$this->rePayOrder($order['order_id']);
			}else{
				$this->error('订单不存在');
			}
		}
		//确认收货
		function orderReceive(){
			$order_id = $this->_get('order_id','trim');
			$order = D('Pt_order_info')->where(array('order_id'=>$order_id))->find();
			if($order){
				if($order['paid'] == 0){
					$this->error('订单未支付');
				}else{
					$data = array(
						'order_status' => 3,
						'shipping_status' => 2,
						'confirm_time' => time(),
					);
					$re = D('Pt_order_info')->where(array('order_id'=>$order_id))->save($data);
					if($re){
						//记录订单操作
						$this->orderAction($order['order_id'],$this->user['user_name'],3,$order['shipping_status'],$order['paid'],0,'确认收货',time());

						$this->success('确认成功');
					}else{
						$this->error('确认失败');
					}
				}
			}else{
				$this->error('订单不存在');
			}
		}
		//申请退款
		function applyRefund(){
			$order_id = $this->_get('order_id');
			$order = D('Pt_order_info')->where(array('order_id'=>$order_id))->find();
			if($order){
				if($order['paid'] == 0){
					$this->error('订单未支付');
				}else{
					if($order['shipping_status'] == 2){
						$this->error('发货订单不能申请退款');
					}
					if($order['refund_sign']){
						$this->error('不能重复申请退款');
					}

					$data = array(
						'order_status' => 4,
						'refund_time' => time(),
						'refund_sign' => 1,
					);
					$re = D('Pt_order_info')->where(array('order_id'=>$order_id))->save($data);
					if($re){
						//记录订单操作
						$this->orderAction($order['order_id'],$this->user['user_name'],4,$order['shipping_status'],$order['paid'],0,'申请退款',time());

						$this->success('申请成功');
					}else{
						$this->error('申请失败');
					}
				}
			}else{
				$this->error('订单不存在');
			}
		}
		//会员参与拼团
		function joinInTeam(){
			$db = D('Pt_order_info');
			$order_id = $this->_get('order_id');
			$first_order = $db->where(array('order_id'=>$order_id))->relation(true)->find();
			//团长订单
			if($first_order){
				//判断是否参团
				$my_team_order = $db->where(array('team_sign'=>$first_order['team_sign'],'user_id'=>$this->user['user_id']))->find();
				$payment = $this->_get('payment');
				if(!$my_team_order){
					$orderid = substr($this->wecha_id, -1, 4) . date("YmdHis");
					$address = M('Pt_user_address')->where(array('address_id'=>$this->user['address_id']))->find();
					if(!$address){
						$this->error('地址未选择',U('Share/addressList'));
					}
					if(!$payment){
						$payment = 1;
					}else{
						if($this->user['user_money'] < $first_order['price']){
							$this->error('余额不足');
						}
					}
					//重新赋值订单
					unset($first_order['order_id']);
					$data = $first_order;
					$data['orderid'] = $orderid;
					$data['token'] = $this->token;
					$data['wecha_id'] = $this->wecha_id;
					$data['user_id'] = $this->user['user_id'];
					$data['consignee'] = $this->user['user_name'];
					$data['province'] = $address['province'];
					$data['city'] = $address['city'];
					$data['district'] = $address['district'];
					$data['address'] = $address['total_address'];
					$data['mobile'] = $address['mobile'];
					$data['pay_name'] = '微信支付';
					$data['add_time'] = time();
					$data['team_first'] = 2;
					$data['paid'] = 0;
					$data['pay_time'] = 0;
					$data['setInc'] = 0;
					$data['payment'] = $payment;
					$result = M('Pt_order_info')->add($data);
					if($result){
						$re = $this->addOrderGoods($result,$first_order['goods']['goods_id'],$first_order['goods']['goods_number'],$first_order['goods']['extension_code']);
						if($re){
							// header('Location:/wg_pt/index.php?g=Ptuan&m=Share&a=new_return_url&out_trade_no='.$orderid.'&token=mhfcjx1421158741&from=Share');
							if($payment == 2){
								$this->payByBalance($orderid);
							}else{
								$this->success('正在提交中...', U('Ptuan/Alipay/pay',array('token' => $this->token, 'wecha_id' => $this->wecha_id, 'success' => 1, 'from'=> 'Share', 'orderName' => $orderid, 'single_orderid' => $orderid, 'price' => $first_order['price'])));
							}
						}
					}
				}else{
					$this->rePayOrder($my_team_order['order_id'],$payment);
				}
			}else{
				$this->error('订单不存在');
			}
		}
		//重新支付订单
		function rePayOrder($order_id,$payment){
			$db = M('Pt_order_info');
			$order = $db->where(array('order_id'=>$order_id))->find();
			if($payment == 2){
				$this->payByBalance($order['orderid']);
			}else{
				$neworderid = substr($this->wecha_id, -1, 4) . date("YmdHis");
				$db->where(array('order_id'=>$order_id,'user_id'=>$this->user['user_id']))->setField('orderid',$neworderid);
				// header('Location:/wg_pt/index.php?g=Ptuan&m=Share&a=new_return_url&out_trade_no='.$neworderid.'&token=mhfcjx1421158741&from=Share');
				$this->success('支付跳转中...', U('Ptuan/Alipay/pay',array('token' => $this->token, 'wecha_id' => $this->wecha_id, 'success' => 1, 'from'=> 'Share', 'orderName' => $neworderid, 'single_orderid' => $neworderid, 'price' => $order['price'])));
			}
		}
		/**
		 * 获得当前格林威治时间的时间戳
		 *
		 * @return  integer
		 */
		function gmtime()
		{
		    return (time() - date('Z'));
		    // return time();
		}

		//商品分类
		public function cats(){

			$where['parent_id'] = 0;
			$where['is_show'] = 1;
			$pcat = M('Pt_category')->where($where)->order('sort_order desc')->select();

			foreach ($pcat as $key => $value) {

				$where1['parent_id'] = $value['cat_id']; 
				$ccat = M('Pt_category')->where($where1)->order('sort_order desc')->select();
				$pcat[$key]['child'] = $ccat;

			}			
			$this->assign('pcat',$pcat);
			$this->display();
		}
		//优惠券
		public function bonus(){

			$this->display();
		}
		//加入购物车
		public function addToCart(){
			session('shopping_cart',null);
			$goods_id = $this->_get('goods_id');
			$type = $this->_get('type');
			$count = $this->_get('count');
			if($this->judgeGoodsNum($goods_id,$type,$count)){
				$shopping_info = array(
					'goods_id' => $this->_get('goods_id'),
					'count' => $this->_get('count'),
					'type' =>$this->_get('type'),
				);
				session('shopping_cart',serialize($shopping_info));
				$this->ajaxReturn('','',1);
			}else{
				$this->ajaxReturn('','商品库存不足',-1);
			}
		}

		//支付
		public function checkout(){
			if(!session('shopping_cart')){
				$this->error('购物车为空',U('Share/index'));
			}else{
				$shopping_info = unserialize(session('shopping_cart'));
				$goods_id = $shopping_info['goods_id'];
				$num = $shopping_info['count'];
				$good = M('Pt_goods')->where(array('goods_id'=>$goods_id))->find();
				if($good){
					$num = $shopping_info['count'];
					$this->assign('num',$num);
					$this->assign('good',$good);
				}else{
					$this->error('商品不存在',U('Share/index'));
					exit();
				}
				//选择地址
				$address = M('Pt_user_address')->where(array('address_id'=>$this->user['address_id']))->find();
				if($address){
					$this->assign('address',$address);
				}
				$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				session("quick_buy_address_url",$url);
				$this->display();
			}
		}
		//清除支付跳转地址
		function delShopping(){
			session("quick_buy_address_url",null);
			$this->ajaxReturn('','',1);
		}

		//修改
		public function changeShoppingCount(){
			$count = $this->_get('count');
			$shopping_info = unserialize(session('shopping_cart'));
			if($this->judgeGoodsNum($shopping_info['goods_id'],$shopping_info['type'],$count)){
				$shopping_info['count'] = $count;
				session('shopping_cart',serialize($shopping_info));
				$this->ajaxReturn('',$shopping_info,1);
			}else{
				$this->ajaxReturn('','商品库存不足',-1);
			}
		}
		//判断商品库存
		public function judgeGoodsNum($goods_id,$type,$count){
			$goods = M('Pt_goods')->where(array('goods_id'=>$goods_id))->find();
			//判断是团购还是单独购买
			if($type == 'team_goods' && ($count * $goods['team_num']) > $goods['goods_number']){
				return false;
			}else if($count > $goods['goods_number']){
				return false;
			}
			return true;
		}
		//判断余额（AJAX）
		public function judgeMyMoney(){
			$money = $this->_get('money');
			if($this->user['user_money'] < $money){
				$this->ajaxReturn('','余额不足',-1);
			}else{
				$this->ajaxReturn($this->user['user_money'],$money,1);
			}
		}

		//立即支付
		public function ordersave(){
			//判断session订单是否失效
			if(!session('shopping_cart')){
				$this->error('订单失效',U('Share/index'));
			}else{
				//判断账号是否存在
				if(!$this->user){
					$this->error('账号信息读取失败',U('Share/index'));
				}
				//判断地址是否选择
				$address = M('Pt_user_address')->where(array('address_id'=>$this->user['address_id']))->find();
				if(!$address){
					$this->error('地址未选择');
				}
				$cart = unserialize(session('shopping_cart'));
				//获取商品信息
				$goods = M('Pt_goods')->where(array('goods_id'=>$cart['goods_id']))->find();
				//判断是拼团还是单独购买
				if($cart['type'] == 'team_goods'){
					$goods_price = $goods['team_price'];
				}else{
					$goods_price = $goods['shop_price'];
				}
				//判断库存
				if(!$this->judgeGoodsNum($cart['goods_id'],$cart['type'],$cart['count'])){
					$this->error('库存不足',U('Share/index'));
				}
				$total_price = ($goods_price + $goods['mail_price']) * $cart['count'];
				//写入订单表
				$orderid = substr($this->wecha_id, -1, 4) . date("YmdHis");
				$payment = $this->_get('payment');
				if(!$payment){
					$this->error('支付有误',U('Share/index'));
				}else if($payment == 2){
					//判断余额
					if($this->user['user_money'] < $total_price){
						$this->error('余额不足',U('Share/index'));
					}
				}
				switch ($payment) {
					case '1':
						$pay_name = '微信支付';
						break;
					
					case '2':
						$pay_name = '余额支付';
						break;
				}
				$data = array(
					'orderid' => $orderid,
					'token' => $this->token,
					'user_id' => $this->user['user_id'],
					'wecha_id' => $this->wecha_id,
					'consignee' => $this->user['user_name'],
					'province' => $address['province'],
					'city' => $address['city'],
					'district' => $address['district'],
					'address' => $address['total_address'],
					'mobile' => $address['mobile'],
					'pay_name' => $pay_name,
					'payment' => $payment,
					'goods_amount' => $cart['count'],
					'price' => $total_price,
					'mail_price' => $goods['mail_price'],
					'add_time' => time(),
				);
				//判断是拼团还是单独购买
				if($cart['type'] == 'team_goods'){
					$data['extension_code'] = $cart['type'];
					$data['team_first'] = 1;
					$data['team_num'] = $goods['team_num'];
				}else{
					$data['is_separate'] = 1;
				}
				$result = M('Pt_order_info')->add($data);
				session('shopping_cart',null);
				session('quick_buy_address_url',null);
				if($result){
					//判断是拼团还是单独购买
					if($cart['type'] == 'team_goods'){
						M('Pt_order_info')->where(array('order_id'=>$result))->setField('team_sign',$result);
					}
					$re = $this->addOrderGoods($result,$cart['goods_id'],$cart['count'],$cart['type']);
					if($re){
						//判断是余额支付还是微信支付
						if($payment == 2){
							$this->payByBalance($orderid);
						}else{
							$this->success('正在提交中...', U('Ptuan/Alipay/pay',array('token' => $this->token, 'wecha_id' => $this->wecha_id, 'success' => 1, 'from'=> 'Share', 'orderName' => $orderid, 'single_orderid' => $orderid, 'price' => $total_price)));
						}
						//测试支付
						// header('Location:/wg_pt/index.php?g=Ptuan&m=Share&a=new_return_url&out_trade_no='.$orderid.'&token=mhfcjx1421158741&from=Share');
					}
				}else{
					$this->error('订单生成失败',U('Share/index'));
				}
			}
		}
		//余额支付
		public function payByBalance($out_trade_no){
			$order = D('Pt_order_info')->where(array('orderid'=>$out_trade_no))->relation(true)->find();
			if($order['setInc']==0){
				$pay_data = array(
					'paid' => 1,
					'pay_time' => time(),
					'order_status' => 1,
				);
				D('Pt_order_info')->where(array('orderid'=>$out_trade_no))->save($pay_data);
				//判断是团订单还是个人订单
				if($order['team_sign']){
					//判断是开团还是参团
					if($order['team_first'] == 1){
						$team_data = array(
							'team_status' => 1,
							'teammen_num' => 1,
							'end_time' => time() + 86400,
						);
						M('Pt_order_info')->where(array('orderid'=>$out_trade_no))->save($team_data);
					}else{//参团
						$team_data = array(
							'teammen_num' => $order['teammen_num'] + 1,
						);
						//判断团购是否成功
						if(($order['teammen_num'] + 1 ) == $order['team_num']){
							$team_data['team_status'] = 2;
							$team_data['end_time'] = time();
						}
						$re = M('Pt_order_info')->where(array('team_sign'=>$order['team_sign']))->save($team_data);
						if($re && $team_data['team_status'] == 2){
							//发送拼团成功信息
							$team_orders = D('Pt_order_info')->where(array('team_sign'=>$order['team_sign']))->relation(true)->select();
							$access_token = $this->get_access_token($_GET['token']);
							foreach ($team_orders as $k => $v) {
								// $data = '{"touser":"'.$v['wecha_id'].'","msgtype":"text","text":{"content":"拼团成功！"}}';
								$suc_con = '恭喜您拼团成功!\n订单编号:'.$v['orderid'].'\n团购商品:'.$v['goods']['goods_name'];
								$data_p = '{"touser":"'.$v['wecha_id'].'","msgtype":"news","news":{"articles":[{"title":"团购成功通知","description":"'.$suc_con.'","url":"'.C('site_url').U('Ptuan/Share/teamdetail',array('team_sign'=>$v['team_sign'])).'","picurl":""}]}}';
								$this->api_notice_increment('https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token,$data_p);
							}
						}
					}
				}
				//记录订单操作
				$this->orderAction($order['order_id'],$order['consignee'],1,0,1,0,'支付成功',time());
				//记录账号余额使用记录
				if($order['team_sign']){
					if($order['team_first'] == 1){
						$change_desc = '开团';
					}else{
						$change_desc = '参团';
					}
					$status = 3;
				}else{
					$change_desc = '单独购买商品';
					$status = 4;
				}
				$this->accountLog($order['user_id'],$order['order_id'],-$order['price'],$this->user['user_name'].'使用余额'.$change_desc,$status);
				//修改商品信息
				$goods_id = $order['goods']['goods_id'];
				$goods_data['goods_number']=array('exp','goods_number-'.$order['goods']['goods_number']);//库存
				$goods_data['sales_num']=array('exp','sales_num+'.$order['goods']['goods_number']);//销量
				M('Pt_goods')->where(array('goods_id'=>$goods_id))->save($goods_data);
				//$this->distriOrderStatus($_GET['token'],$order['id'],1);
				//个人消息推送
				$access_token = $this->get_access_token($_GET['token']);
				$data = '{"touser":"'.$order['wecha_id'].'","msgtype":"text","text":{"content":"亲：您已成功付款！"}}';
				$result = $this->api_notice_increment('https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token,$data);
				M('Pt_order_info')->where(array('orderid'=>$out_trade_no))->setField('setInc',1);
				$this->redirect(U('Share/payReturn',array('orderid'=>$order['orderid'])));
			}else{
				$this->error('订单已经处理');
			}
		}
		//新版微信支付同步数据处理
		public function new_return_url(){
			$out_trade_no = $this->_get('out_trade_no');
			Log::write('out_trade_no1='.$out_trade_no,'DEBUG');
			if(1) {
				//after
				$payHandel=new payHandle($_GET['token'],$_GET['from'],'weixin');
				$orderInfo=$payHandel->afterPay($out_trade_no,$_GET['transaction_id'],$_GET['transaction_id']);
				//此处应该更新一下订单状态，商户自行增删操作
				Log::write('out_trade_no='.$out_trade_no,'DEBUG');
				//订单处理
				$order = D('Pt_order_info')->where(array('orderid'=>$out_trade_no))->relation(true)->find();
				if($order['setInc']==0){
					//判断是团订单还是个人订单
					if($order['team_sign']){
						//判断是开团还是参团
						if($order['team_first'] == 1){
							$team_data = array(
								'team_status' => 1,
								'teammen_num' => 1,
								'end_time' => time() + 86400,
							);
							M('Pt_order_info')->where(array('orderid'=>$out_trade_no))->save($team_data);
						}else{//参团
							$team_data = array(
								'teammen_num' => $order['teammen_num'] + 1,
							);
							//判断团购是否成功
							if(($order['teammen_num'] + 1 ) == $order['team_num']){
								$team_data['team_status'] = 2;
							}
							$re = M('Pt_order_info')->where(array('team_sign'=>$order['team_sign']))->save($team_data);
							if($re && $team_data['team_status'] == 2){
								//发送拼团成功信息
								$team_orders = M('Pt_order_info')->where(array('team_sign'=>$order['team_sign']))->select();
								$access_token = $this->get_access_token($_GET['token']);
								foreach ($team_orders as $k => $v) {
									$data = '{"touser":"'.$v['wecha_id'].'","msgtype":"text","text":{"content":"拼团成功！"}}';
									$this->api_notice_increment('https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token,$data);
								}
							}
						}
					}
					//记录订单操作
					$this->orderAction($order['order_id'],$order['consignee'],1,0,1,0,'支付成功',time());
					//修改商品信息
					$goods_id = $order['goods']['goods_id'];
					$goods_data['goods_number']=array('exp','goods_number-'.$order['goods']['goods_number']);//库存
					$goods_data['sales_num']=array('exp','sales_num+'.$order['goods']['goods_number']);//销量
					M('Pt_goods')->where(array('goods_id'=>$goods_id))->save($goods_data);
					//$this->distriOrderStatus($_GET['token'],$order['id'],1);
					//个人消息推送
					$access_token = $this->get_access_token($_GET['token']);
					$data = '{"touser":"'.$order['wecha_id'].'","msgtype":"text","text":{"content":"亲：您已成功付款！"}}';
					$result = $this->api_notice_increment('https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$access_token,$data);
					M('Pt_order_info')->where(array('orderid'=>$out_trade_no))->setField('setInc',1);
				}
				$log_name = LOG_PATH."weixin_notify.log";//log文件路径
				Log::write("执行日期：".strftime("%Y-%m-%d-%H：%M：%S",time())."【支付成功】:\n".$xml."\n",'INFO','',$log_name);
				header('Location:/wg_pt/index.php?g=Ptuan&m=Share&a=payReturn&orderid='.$out_trade_no);
			}else {
				exit('付款失败');
			}
		}

		//添加订单商品
		function addOrderGoods($order_id,$goods_id,$goods_number,$extension_code){
			//记录订单操作
			if($extension_code == 'team_goods'){
				$note = '拼团订单生成';
			}else{
				$note = '订单生成';
			}
			$this->orderAction($order_id,$this->user['user_name'],0,0,0,0,$note,time());

			$goods = M('Pt_goods')->where(array('goods_id'=>$goods_id))->find();
			$order_goods_data = array(
				'order_id' => $order_id,
				'goods_id' => $goods['goods_id'],
				'goods_name' => $goods['goods_name'],
				'goods_img' => $goods['goods_img'],
				'goods_sn' => $goods['goods_sn'],
				'goods_number' => $goods_number,
				'market_price' => $goods['market_price'],
				'goods_price' => $goods['goods_price'],
				'mail_price' => $goods['mail_price'],
				'extension_code' => $extension_code,
			);
			if($extension_code){
				$order_goods_data['goods_price'] = $goods['team_price'];
			}else{
				$order_goods_data['goods_price'] = $goods['shop_price'];
			}
			$re = M('Pt_order_goods')->add($order_goods_data);
			if($re){
				return true;
			}else{
				return false;
			}
		}

		//地址列表
		public function addressList(){
			$address_list = M('Pt_user_address')->where(array('user_id'=>$this->user['user_id']))->select();
			$this->assign('list',$address_list);
			if(session('quick_buy_address_url')){
				$this->assign("shopping",session("quick_buy_address_url"));
			}
			$this->display();
		}
		//获取城市信息
		public function getCityInfo(){
			$db=M("class_city");
			$pid=$this->_get("pid");
			$cid=$this->_get("cid");
			if($pid){
				$city=$db->where("pid=".$pid)->select();
				$str="<option value='0'>--选择市--</option>";
				foreach ($city as $k => $v) {
					$str.="<option value='".$v['id']."'>".$v['name']."</option>";
				}
				$this->ajaxReturn($str,"",1);
			}
			if($cid){
				$county=$db->where("pid=".$cid)->select();
				$str="<option value='0'>--选择县/区--</option>";
				foreach ($county as $k => $v) {
					$str.="<option value='".$v['id']."'>".$v['name']."</option>";
				}
				$this->ajaxReturn($str,"",1);
			}
		}
		//添加地址
		public function addAddress(){
			//城市区域
			$location=M("class_city")->where(array('depth'=>array("lt",3)))->select();
			$this->assign("location",$location);
			$db = D("Pt_user_address");
			if(IS_POST){
				$_POST['total_address'] = $this->_post('province','trim').$this->_post('city','trim').$this->_post('county','trim').$this->_post('address','trim');
				$_POST['province'] = $_POST['provinceNo'];
				$_POST['city'] = $_POST['cityNo'];
				$_POST['district'] = $_POST['countyNo'];
				if ($db->create() === false) {
				    $this->error($db->getError());
				} else {
				    $id = $db->add();
				    if ($id == true) {
				    	//是否设为默认地址
				    	if($_POST['choose'] == 1){
				    		M('Pt_users')->where(array('user_id'=>$this->user['user_id']))->setField('address_id',$id);
				    	}
				        $this->success('操作成功', U("Share/addressList"));
				    } else {
				        $this->error('操作失败', U("Share/addressList"));
				    }
				}
			}else{
				$this->assign("metaTitle","我的地址");
				$this->display("addDetails");
			}
		}
		//编辑地址
		public function editAddress(){
			$db = M("Pt_user_address");
			$location=M("class_city")->where(array('depth'=>array("lt",3)))->select();
			$this->assign("location",$location);
			$address_id = $this->_get('id');
			if(IS_POST){
				$_POST['total_address'] = $this->_post('province','trim').$this->_post('city','trim').$this->_post('county','trim').$this->_post('address','trim');
				$_POST['province'] = $_POST['provinceNo'];
				$_POST['city'] = $_POST['cityNo'];
				$_POST['district'] = $_POST['countyNo'];
				if ($db->create() === false) {
				    $this->error($db->getError());
				} else {
				    $id = $db->save();
				    if ($id == true) {
				    	if($_POST['choose']==1){
				    		M('Pt_users')->where(array('user_id'=>$this->user['id']))->setField('address_id',$id);
				    	}
				        $this->success('操作成功', U("Share/addressList"));
				    } else {
				        $this->error('操作失败', U("Share/addressList"));
				    }
				}
			}else{
				$info=$db->where("address_id=".$address_id)->find();
				if($info){
					$this->assign("info",$info);
					$this->display("addDetails");
				}else{
					$this->error('地址不存在',U("Share/addressList"));
				}
			}
		}
		//删除地址
		public function delAddress(){
			$id=$this->_get("id");
			$db = M("Pt_user_address");
			$result=$db->where(array('address_id'=>$id))->delete();
			if($result){
				$this->success('操作成功', U("Share/addressList"));
			}else{
				$this->error('操作失败', U("Share/addressList"));
			}
		}
		//选择默认地址(AJAX)
		public function chooseAdd(){
			$id=$this->_get("id");
			$db = M("Pt_user_address");
			$address_id = $db->where(array('address_id'=>$id))->getField('address_id');
			$result = M('Pt_users')->where(array('user_id'=>$this->user['user_id']))->setField('address_id',$address_id);
			if($result){
				$this->ajaxReturn("","",1);
			}else{
				$this->ajaxReturn('','',-1);
			}
		}
		//支付回调函数
		function payReturn(){
			$orderid = $_GET['orderid'];
			$order = M('Pt_order_info')->where(array('orderid'=>$orderid))->find();
			//判断是单独购买还是拼团
			if($order['team_sign']){//拼团
				$this->redirect(U('Share/teamDetail',array('team_sign'=>$order['team_sign'])));
			}else{//单独购买
				$this->redirect(U('Share/orderDetail',array('order_id'=>$order['order_id'])));
			}
		}
		//服务端计时器
		public function autoHandle(){
			Log::write('autoHandle','DEBUG');
			$this->handleOrder();
		}
		private function handleOrder(){
			$product_cart_model = M('Pt_order_info');
			//对还在拼团中的团员消息提醒
			$notime = array(
				'team_status' =>1,
				'end_time' => array('lt',time() + 3600 * 6),
			);
			$notime_orders = $product_cart_model->where($notime)->select();
			if($notime_orders){
				foreach ($notime_orders as $k => $v) {
					$this->sendMessage($notime_orders['wecha_id'],'拼团时间提醒','您的拼团仅剩最后6个小时',U('Share/teamList'));
				}
			}
			//对拼图失败发送消息提醒
			$fail = array(
				'team_status' =>1,
				'end_time' => array('lt',time()),
			);
			$fail_orders = $product_cart_model->where($fail)->select();
			if($fail_orders){
				foreach ($fail_orders as $k => $v) {
					if($v['team_status'] != 3){
						//记录订单操作
						$this->orderAction($v['order_id'],$v['consignee'],4,$v['shipping_status'],$v['paid'],0,'组团失败',time());
						$data = array(
							'team_status' => 3,
						);
						$product_cart_model->where(array('order_id'=>$v['order_id']))->save($data);
						$this->accountLog($v['user_id'],$v['order_id'],$v['price'],'拼团失败',1);
						$this->sendMessage($notime_orders['wecha_id'],'拼团失败提醒','您的拼团已失败',U('Share/teamList'));
					}
				}
			}
		}
	}
?>
<?php
class PtOrderAction extends UserAction{

	//团购列表
	public function team(){
		
		if(IS_POST){

			$where['team_status'] = $_POST['team_status'];
			$where['team_first']  = 1; 	
			//$where['team_status|order_id'] = $_POST['searchkey'];
			$order = D('Pt_order_info')->relation(true)->where($where)->select();	
			//dump($order);
			//exit();
		}else{	

			$where['team_first']  = 1; 
			$where['team_status'] = array('gt',0);
			$count = D('Pt_order_info')->relation(true)->where($where)->count();

			$where1['team_status'] = 3;
			$failcount = D('Pt_order_info')->where($where1)->count();

			$this->assign('unhandledCount',$failcount);

			$page  = new Page($count,20);
			$order = D('Pt_order_info')->relation(true)->where($where)->limit($page->firstRow.','.$page->listRows)->select();

			/*dump($order);
			exit();*/
			$this->assign('page',$page->show());

		}	

		$this->assign('orders',$order);
		$this->display();		
	}

	//订单列表
	public function order(){
		
		$sign = $_GET['teamid'];

		if($_POST){

			if($_POST['shipping_status']!=null){
				$where['shipping_status'] = $_POST['shipping_status'];				
			}

			if($_POST['receive']!=null){
				$where['receive'] = $_POST['receive'];				
			}

			if($_POST['order_status']!=null){
				if($_POST['order_status'] ==1){
					$where['paid'] =1;
				}else{
					$where['order_status'] = $_POST['order_status'];
				}
			}

			if($_POST['is_separate']!=null){
				$where['is_separate'] = $_POST['is_separate'];				
			}

			if($_POST['team_status']!=null){
				$where['team_status'] = $_POST['team_status'];								
			}

			if($_POST['searchkey']!=null){

				$key = $_POST['searchkey'];
				$where['order_id|consignee'] = array('like',"%$key%");
			}
			$order = D('Pt_order_info')->relation(true)->where($where)->select();	

		}else{

			if($sign){

			$order = D('Pt_order_info')->relation(true)->where('team_sign='.$sign)->select();	

			}else{

				$count = D('Pt_order_info')->count();
				$page  = new Page($count,20);	
				$order = D('Pt_order_info')->relation(true)->limit($page->firstRow.','.$page->listRows)->select();	
				$this->assign('page',$page->show());
			}
		}	
			$this->assign('orders',$order);	
			$this->display();	
	}

	//订单删除
	public function deleteOrder(){

		$order_id = $_GET['id'];

		$res = M('Pt_order_info')->where('order_id='.$order_id)->delete();

		if($res){
			$this->success('删除成功');
		}else{
			$this->error('操作失败');
		}

	}

	public function teamInfo(){

		$this->display();
	}

	//订单操作
	public function orderInfo(){

		$order_id = $_GET['id'];

		if(IS_POST){

			/*if($_POST['shipping_status']==1){
				Sms::sendSms($this->token, "您在本商城购买的商品，商家已经给您发货了，请您注意查收", $thisOrder['tel']);
			}*/

			//修改订单状态
			if($_POST['shipping_status']==1){

				M('Pt_order_info')->where('order_id='.$order_id)->data(array('order_status'=>2))->save();
			}

			if($_POST['receive']==1){

				M('Pt_order_info')->where('order_id='.$order_id)->data(array('order_status'=>3,'shipping_status'=>2))->save();
			}

			$res = M('Pt_order_info')->where('order_id='.$order_id)->data($_POST)->save();
			if($res){
				$this->success('修改成功',U('PtOrder/orderInfo',array('id'=>$order_id)));
				exit();
			}else{
				$this->error('操作失败');
			}
		}

		//dump($order_id);

		$order       = M('Pt_order_info')->where('order_id='.$order_id)->find();

		$order_goods = D('Pt_order_goods')->relation(true)->where('order_id='.$order_id)->find();


		$this->assign('goods',$order_goods);
		$this->assign('thisOrder',$order);
		$this->display();
	}
	function returnMoney(){
		$order = M('Pt_order_info');
		$id = $this->_get('id');
		$token = $this->_session('token');
		if($id){
			if($order->where(array('order_id'=>$id,'token'=>$token,'order_status'=>4))->find()){
				$data['order_status'] = 5;
				if($order->where(array('order_id'=>$id,'token'=>$token,'order_status'=>4))->save($data)){
					$this->success('退款完成成功');
				}else{
					$this->error('退款完成失败');
				}
			}else{
				$this->error('异常访问');
			}
		}else{
			$this->error('异常操作');
		}
	}
	public function test(){

		//dump(STATICS);
	}
}
?>
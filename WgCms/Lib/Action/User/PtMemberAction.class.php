<?php 
	class PtMemberAction extends UserAction {

		//用户列表
		public function index(){

			if(IS_POST){
				$keyword = $_POST['keyword'];
				$where['user_name']  = array('like',"%$keyword%");
				$count  = M('Pt_users')->where($where)->count();
				$page   = new Page($count,20);
				$member = D('Pt_users')->relation(true)->where($where)->limit($page->firstRow.','.$page->listRows)->select();
			}else{
				$count  = M('Pt_users')->count();
				$page   = new Page($count,20);
				$member = D('Pt_users')->relation(true)->limit($page->firstRow.','.$page->listRows)->select();
				//dump($member);
				//exit();				
			}

			$this->assign('page',$page->show());
			$this->assign('member',$member);
			$this->display();
		}

		//历史订单
		public function orders(){
			$user_id = $_GET['user_id'];

			$count   = M('Pt_order_info')->where('user_id='.$user_id)->count();
			$page    = new Page($count,20);
			$orders  = D('Pt_order_info')->relation(true)->where('user_id='.$user_id)->limit($page->firstRow.','.$page->listRows)->select();
			$this->assign('page',$page->show());
			$this->assign('orders',$orders);
			$this->display();
		}

		//用户信息重置
		public function setMember(){
			$this->display();
		}


		//用户信息统计
		public function memberDtail(){
			
			$user_id = $_GET['user_id'];

			$member  = D('Pt_users')->relation(true)->where('user_id='.$user_id)->limit($page->firstRow.','.$page->listRows)->find();
			
			$order_info = M('Pt_order_info');

			$info = array();
			//总的购买金额
			$info['totalMoney'] = $order_info->where(array('user_id'=>$user_id,'order_status'=>3))->sum('price');
			//单独购买金额
		    $info['alonMoney']  = $order_info->where(array('user_id'=>$user_id,'order_status'=>3,'is_separate'=>1))->sum('price');
		    //拼团购买金额
			$info['teamMoney']  = $order_info->where(array('user_id'=>$user_id,'order_status'=>3,'is_separate'=>0))->sum('price');
			//退款总金额
			$info['refunMoney'] = $order_info->where(array('user_id'=>$user_id,'order_status'=>5))->sum('price');
			//单独购买次数
			$info['alonetimes'] = $order_info->where(array('user_id'=>$user_id,'order_status'=>3,'is_separate'=>1))->count();
			//拼团次数
			$info['teamtimes']  = $order_info->where(array('user_id'=>$user_id,'order_status'=>3,'is_separate'=>0))->count();
			//退款次数
			$info['refuntimes'] = $order_info->where(array('user_id'=>$user_id,'order_status'=>5))->count();

			$this->assign('info',$info);
			$this->assign('member',$member);
			$this->display();
		}

		public function memberInfo(){
			$this->display();
		}
	}
 ?>
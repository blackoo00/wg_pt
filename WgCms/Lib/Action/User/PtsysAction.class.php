<?php
class PtsysAction extends UserAction {

	public function _initialize(){

		parent::_initialize();

		session('token','mhfcjx1421158741');
	}

	public function index(){
		
		$catid = intval($_GET['cat_id']);
		$product_model = M('Pt_goods');
		$product_cat_model = M('Pt_category');
		$where = array('token' => session('token'), 'groupon' => 0, 'dining' => 0);

		if ($catid){
			$where['cat_id'] = $catid;
		}

        if(IS_POST){
            $key = $this->_post('searchkey');
            if(empty($key)){
                $this->error("关键词不能为空");
            }

            $map['token'] = $this->get('token'); 
            $map['goods_name'] = array('like',"%$key%"); 
            $list  = $product_model->where($map)->select(); 
            $count = $product_model->where($map)->count();       
            $Page  = new Page($count,20);
        	$show  = $Page->show();
        } else {

        	$count  = $product_model->where($where)->count();
        	$Page   = new Page($count,20);
        	$show   = $Page->show();
        	$list 	= $product_model->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        }
		$this->assign('page',$show);		
		$this->assign('list',$list);
		$this->assign('isProductPage',1);
		$this->assign('catid', $catid);
		$this->display();		
	}

	//商品设置
	public function  goodsSet(){

		$goods_id = $_GET['goods_id'];

		if(IS_POST){

			$goods = D('Pt_goods');	
			$where['goods_id'] = $goods_id;

			if($goods->create()){				
				$res = $goods ->where($where)->save();
				if($res){
					$this->success('数据更新成功',U('Ptsys/index'));
					exit();
				}else{
					$this->error('数据更新失败');
				}
			}else{
				$this->error($goods->getError());
			}
		}
			
		if($goods_id){
			$goodInfo = M('Pt_goods')->where(array('goods_id'=>$goods_id))->find();
			$where1['cat_id'] = $goodInfo['cat_id'];
			$cat1 = M('Pt_category')->where($where1)->find();
			$this->assign('cat1',$cat1);
			$this->assign('vo',$goodInfo);
			//dump($goodInfo['goods_desc']);
		}

		$str ="";
		$cat =M('Pt_category')->select();
		foreach ($cat as $key => $value) {
				$str  .= "<option value=".$value['cat_id'].">".$value['cat_name']."</option>";			
		}


		$this->assign('cat',$str);
		$this->display();	
	}

	//增加商品
	public function goodsAdd(){

		$cat_id = $_GET['cat_id'];

		if(IS_POST){

			$goods = D('Pt_goods');	

			$where['goods_id'] = $goods_id;

		/*	//商品货号
			if($_POST['goods_sn']==null){

				 $goods   = M('Pt_goods')->order('goods_id desc')->find();
				 $good_sn = $goods['goods_id']+1;
				 $good_sn = sprintf("%06d",$good_sn);

				 $sn = "HHS".$good_sn;

				 $_POST['goods_sn'] = $sn;
			}*/

			if($goods->create()){

				$res = $goods ->where($where)->add();

				if($res){

					$this->success('数据添加成功');
					exit();

				}else{
					$this->error('数据添加失败');
				}
			}else{

				$this->error($goods->getError());
			}
		}

		if($cat_id){

			$cat1 = M('Pt_category')->where('cat_id='.$cat_id)->find();
			$this->assign('cat1',$cat1);
		}

		$str ="";
		$cat =M('Pt_category')->select();
		foreach ($cat as $key => $value) {
				$str  .= "<option value=".$value['cat_id'].">".$value['cat_name']."</option>";			
		}

		$this->assign('cat',$str);
		$this->display('goodsSet');
	}

	public function goodsDel(){

		$goods_id = $_GET['goods_id'];
		$res =  M('Pt_goods')->where('goods_id='.$goods_id)->delete();
		
		if($res){

			$this->success('删除成功！');

		}else{

			$this->error('操作失败！');
		}

	}
	//分类列表
	public function cat(){

		$parentid = isset($_GET['parentid']) ? intval($_GET['parentid']) : 0;
		$data     = M('Pt_category');
		$where    = array('cid' => $this->_cid, 'parentid' => $parentid);

        if (IS_POST) {
            $key = $this->_post('searchkey');
            if(empty($key)){
                $this->error("关键词不能为空");
            }

            //$map['token']    = $this->get('token'); 
            $map['name|des'] = array('like',"%$key%"); 

            $list   = $data->where($map)->order("sort_order ASC, cat_id DESC")->select(); 
            $count  = $data->where($map)->count();       
            $Page   = new Page($count,20);
        	$show   = $Page->show();
        } else {
        	$count  = $data->where($where)->count();
        	$Page   = new Page($count,20);
        	$show   = $Page->show();
        	$list   = $data->where($where)->order("sort_order ASC, cat_id DESC")->limit($Page->firstRow.','.$Page->listRows)->select();
        }
		$this->assign('page',$show);		
		$this->assign('list',$list);

		if ($parentid){
			$parentCat = $data->where(array('id'=>$parentid))->find();
		}

		$this->assign('parentCat',$parentCat);
		$this->assign('parentid',$parentid);
		$this->display();
	}

	public function catAdd(){

		if (IS_POST) {
			
			if (D('Pt_category')->add($_POST)) {

				$this->success('修改成功', U('Ptsys/cat', array('token' => session('token'), 'cid' => $this->_cid, 'parentid' => $parentid)));
			}

		} else {

			$parentid = isset($_GET['parentid']) ? intval($_GET['parentid']) : 0;
			if ($parentid) {
				$checkdata = M('Pt_category')->where(array('cat_id' => $parentid, 'cid' => $this->_cid))->find();
			}

			$this->assign('parentid', $parentid);

			if(strpos(strtolower($queryname),strtolower('website')) !== false){
				$this->assign('has_website',true);
			}
			
			$this->display('catSet');
		}


	}


	//分类修改	
	public function catSet(){

        $id = $this->_get('id'); 
		$checkdata = M('Pt_category')->where(array('cat_id'=>$id))->find();
		if(empty($checkdata)){
            $this->error("没有相应记录.您现在可以添加.",U('Ptsys/catAdd'));
        }
		if (IS_POST) {
			
            $data = D('Pt_category');
            $where=array('cat_id'=>$this->_post('cat_id'));
			$check=$data->where($where)->find();
			if($check==false)$this->error('非法操作');

			//dump($where);

			if($data->create()){

				$res = $data->where($where)->save($_POST);
				if($res){
					$this->success('修改成功',U('Ptsys/cat',array('token'=>session('token'),'parentid'=>$this->_post('parentid'))));	
				}else{

					$this->error('操作失败');
				}

			}else{

				$this->error($data->getError());
			}
		}else{ 
			$this->assign('parentid',$checkdata['parentid']);
			$this->assign('set',$checkdata);
			$this->display();	
		
		}
	}
	
	
	 //删除分类	 
	public function catDel() {

		if($this->_get('token')!=session('token')){$this->error('非法操作');}
        $id = $this->_get('id');

        if(IS_GET){   

            $where=array('cat_id'=>$id);
            $data=M('Pt_category');

            $check=$data->where($where)->find();
            if($check==false)   $this->error('非法操作');

            $product_model=M('Pt_goods');

            $productsOfCat=$product_model->where(array('cat_id'=>$id))->select();

            if (count($productsOfCat)){

            	$this->error('本分类下有商品，请删除商品后再删除分类',U('Ptsys/cat',array('token'=>session('token'),'dining'=>$this->isDining)));
            }

            $back=$data->where($where)->delete();

            if($back==true){
            	if (!$this->isDining){
                $this->success('操作成功',U('Ptsys/cat',array('token'=>session('token'),'parentid'=>$check['parentid'])));
            	}else {
            		$this->success('操作成功',U('Ptsys/cat',array('token'=>session('token'),'parentid'=>$check['parentid'],'dining'=>1)));
            	}
            }else{
                 $this->error('服务器繁忙,请稍后再试',U('Ptsys/cat',array('token'=>session('token'))));
            }
        }        
	}

	//轮播图列表
	public function  banner(){

		$data = M('Pt_guanggao');

		$where = array('token' => session('token'));

        if (IS_POST) {
            $key = $this->_post('searchkey');
            if(empty($key)){
                $this->error("关键词不能为空");
            }
            $map['token'] = $this->get('token'); 
            $map['name|des'] = array('like',"%$key%"); 
            $list  = $data->where($map)->select(); 
            $count = $data->where($map)->count();       
            $Page  = new Page($count,20);
        	$show  = $Page->show();
        } else {
        	$count  = $data->where($where)->count();
        	$Page   = new Page($count,20);
        	$show   = $Page->show();
        	$list   = $data->limit($Page->firstRow.','.$Page->listRows)->order('sort desc,id asc')->select();
        }


		$this->assign('page',$show);		
		$this->assign('list',$list);

		if ($parentid){
			$parentCat = $data->where(array('id'=>$parentid))->find();
		}


		$this->assign('parentCat',$parentCat);
		$this->assign('parentid',$parentid);
		$this->display();		
	}

	//新增轮播图
	public function bannerAdd(){

		if(IS_POST){
			$this->insert('Pt_guanggao','/banner');
			exit();
		}else{
			$parentid=intval($_GET['parentid']);
			$parentid=$parentid==''?0:$parentid;
			$this->assign('parentid',$parentid);
			$this->display('bannerSet');
		}

		$this->display('bannerSet');
	}
	//设置轮播图
	public function bannerSet(){

        $id = $this->_get('id'); 
		$checkdata = M('Pt_guanggao')->where(array('id'=>$id))->find();
		if(empty($checkdata)){
            $this->error("没有相应记录.您现在可以添加.",U('Ptsys/bannerAdd'));
        }
		if (IS_POST) {
            $data = D('Pt_guanggao');
            $where=array('id'=>$this->_post('id'),'token'=>session('token'));
			$check=$data->where($where)->find();

			if($check==false)$this->error('非法操作');

			if($data->create()){
				if($data->where($where)->save($_POST)){
					$this->success('修改成功',U('Ptsys/banner',array('token'=>session('token'),'parentid'=>$this->_post('parentid'))));
					exit();
				}else{
					$this->error('操作失败');
				}
			}else{
				$this->error($data->getError());
			}
		}else{ 
			$this->assign('parentid',$checkdata['parentid']);
			$this->assign('set',$checkdata);
			$this->display();			
		}		
	}
	//删除轮播图
	public function bannerDel() {

		if($this->_get('token')!=session('token')){$this->error('非法操作');}
        $id = $this->_get('id');

        if(IS_GET){  

            $where = array('id'=>$id);
            $data  = M('Pt_guanggao');
            $check = $data->where($where)->find();

            if($check==false)   $this->error('非法操作');
            $back=$data->where($where)->delete();
            if($back==true){
                $this->success('操作成功',U('Ptsys/banner',array('token'=>session('token'),'parentid'=>$check['parentid'])));
            }else{
                 $this->error('服务器繁忙,请稍后再试',U('Ptsys/banner',array('token'=>session('token'))));
            }
        }        
	}

	public function test(){
		echo C('site_url');
	}
}
?>
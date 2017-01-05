<?php 
	class Pt_goodsModel extends Model{

		protected $_validate = array(

			array('goods_name','require','商品名不能为空!'),
			array('shop_price','require','售价不能为空'),
			array('team_num','require','拼团人数不能为空'),
			array('team_price','require','团购价不能为空'),
			array('good_weight','require','商品重量不能为空'),
			array('goods_number','require','库存不能为空'),
			array('goods_img','require','商品图片不能为空'),
			array('goods_desc','require','描述不能为空'),
			
			);
	}
 ?>
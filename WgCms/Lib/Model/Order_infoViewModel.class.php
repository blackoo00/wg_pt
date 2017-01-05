<?php
	class Order_infoViewModel extends ViewModel {
		public $viewFields = array(
			'Goods' => array('_table=>'=>'Pt_order_goods'),
		    'Order'=>array('_on'=>'Goods.order_id=Order.order_id','_table'=>'Pt_order_info'),
	   	);
	}
?>
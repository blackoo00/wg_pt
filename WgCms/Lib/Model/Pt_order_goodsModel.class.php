<?php 
	class Pt_order_goodsModel extends RelationModel{

		public $_link = array(

			'goods' => array(
				'mapping_type'   =>   BELONGS_TO,
				'foreign_key'  	 =>  'goods_id',
				'class_name'   	 =>  'Pt_goods',
				'mapping_fields' =>  'little_img,goods_brief',
				'as_fields'      =>  'little_img,goods_brief'
				)
		);
	}

 ?>
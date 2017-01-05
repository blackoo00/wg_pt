<?php
	class Pt_order_infoModel extends RelationModel{
		protected $tableName = 'Pt_order_info';
		public $_link = array(
			'goods' =>array(				
				 'class_name'    =>  'Pt_order_goods',
				 'mapping_type'  =>  HAS_ONE,				 
 				 'foreign_key'   =>  'order_id',
 				 'mapping_key' => 'team_sign',
 				),

			'user' =>array(
				'mapping_type'  =>  BELONGS_TO,
				'class_name'    =>  'Pt_users',
				'foreign_key'   =>  'user_id',
				'mapping_fields'=>  'user_name,headimgurl',
				)
			);
	}
?>
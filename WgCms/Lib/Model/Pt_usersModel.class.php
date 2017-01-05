<?php
	class Pt_usersModel extends RelationModel{

		public $_link = array(

			'address' =>array(				
				 'class_name'    =>  'Pt_user_address',
				 'mapping_type'  =>  BELONGS_TO,				 
 				 'foreign_key'   =>  'address_id',
 				 'mapping_fields'=>  'address,mobile',
 				 'as_fields'     =>  'address,mobile'
 				),


			);
	}
?>
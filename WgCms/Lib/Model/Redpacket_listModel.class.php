<?php
    class Redpacket_listModel extends RelationModel{
	protected $_link = array(
        //关联角色
        'Redpacket' => array(
            'mapping_type' => BELONGS_TO,
            'class_name' => 'Redpacket',
            'foreign_key' => 'pid',
        )
    );
}

?>
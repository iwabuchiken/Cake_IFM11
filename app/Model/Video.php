<?php

class Video extends AppModel {
	
	var $name = 'Video';
	
	var $belongsTo = 'Genre';
	
	var $hasMany = array(
				
			'Position' => array(
						
					'className' => 'Position'
			)
				
	);
	
	
	
}
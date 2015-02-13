<?php

class Genre extends AppModel {

	var $hasMany = array(
	
			'Video' => array(
	
					'className' => 'Video'
			)
	
	);
	
}
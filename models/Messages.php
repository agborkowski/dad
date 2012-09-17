<?php

namespace dad\models;

use dad\models\People;

class Messages extends \dad\extensions\data\BaseModel {

	protected $_meta = [
		'connection' => false,
		'source' => false,
		'locked' => true,
		'key' => 'id'
	];

	protected $_schema = [
		'id'           => ['type' => 'string'],
		'content'      => ['type' => 'string'],
		'creator'      => ['type' => 'object'],
		'creator.id'   => ['type' => 'string'],
		'creator.name' => ['type' => 'string'],
		'created_at'   => ['type' => 'date'],
		'updated_at'   => ['type' => 'date']
	];

	public $validates = [
		'content' => 'Cowardly refusing to save an empty message.'
	];

	public function creator($message) {
		return People::first($message->creator->id);
	}
}

?>
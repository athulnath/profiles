<?php
namespace app\components;

use yii\base\Object;

class Foo 
{
	private $_label;
	
	public function getLabel()
	{
		return $this->_label;
	}
	
	public function setLabel($value)
	{
		$this->_label = trim($value);
	}
}
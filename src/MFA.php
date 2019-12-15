<?php
namespace MayCad\MFA;

/**
 * 
 */
class MFA extends WebService
{
	public function __construct(array $credentials)
	{
		parent::__construct($credentials);
	}

	public function with(array $params = array())
	{
		return $this->setParams($params);
	}
}
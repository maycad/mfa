<?php
namespace MayCad\MFA;

/**
 * 
 */
class MFA extends WebService
{
	public function __construct(array $data = array())
	{
		parent::__construct($data);
	}

	public function process()
	{
		$req = $this->getClient()->post('operations/create', [
                'form_params' => $this->getData(),
        ]);

        return json_decode($req->getBody());
	}
}